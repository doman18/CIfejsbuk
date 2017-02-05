<div id="add_post_form">
						
							<?php
							echo form_open(base_url('main/add_entry'));
							$content = array('name' => 'entry_content', 'class' => 'add_post_input', 'placeholder' => 'Napisz nam o czym teraz myslisz');
							$submit = array('name' => 'submit','value' => 'Wyślij', 'class'=> 'submit_button');							
							echo form_input($content);
							echo form_submit($submit);
							echo form_close();
							?>
							
					</div>
					
					<div id="site_content">
					<?php foreach ($entry as $key) { 
						echo '<div class="postbox">
							<div class="postbox_avatar"><a href="'.base_url('user/show_user_id/'.$key['user_id']).'" title="Pokaż profil usera"><img src="'.base_url('avatary/'.$key['user_avatar']).'" width="50" height="50" /></a></div>
							<div class="postbox_content">
								<div class="user_data"><a href="'.base_url('user/show_user_id/'.$key['user_id']).'" title="Pokaż profil usera">'.ucfirst($key['user_name']).' '.ucfirst($key['user_surname']).'</a></div>
								<div class="post_data">
									<p>'.substr($key['entry_content'],0, $this->config->item('entry_length')).'</p>';
									echo strlen($key['entry_content'])> $this->config->item('entry_length') ? '<p><a href="'.base_url('main/show_entry_id/'.$key['entry_id']).'">Czytaj dalej...</a>' : '<a href="'.base_url('main/show_entry_id/'.$key['entry_id']).'">Pokaż komentarze</a>';

										if ($this->session->userdata('user_id') == $key['author_id'] || $this->session->userdata('is_admin') == TRUE){
										
										echo '<a href="'.base_url('main/delete_entry_id/'.$key['entry_id']).'">Skasuj Wpis</a></p>';
									}
									echo form_open('main/add_comment/'.$key['entry_id']);
									$comment_content = array('name'=>'comment_content', 'placeholder'=>'Skomentuj..');
									echo form_input($comment_content);
									echo form_submit('submit', 'Wyslij');
									//echo '<a href='.base_url('main/show_comments/').'></a>';
									$i = 0;
									echo form_close();
									foreach ($comments as $key1){
											
											if($key1['comment_entry']==$key['entry_id'] && $i<3) {
											echo $key1['user_name'].' '.$key1['user_surname'].' '.$key1['comment_cdate'].'<br/>';
											echo $key1['comment_content'].'</br><hr/>';
											$i++;
											}
									}
									echo '
								</div>
							</div>
							<div class="fix"></div>
						</div>';
						}
						echo $this->pagination->create_links();
						?>
					
					</div>