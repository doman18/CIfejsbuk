<div id="add_post_form">
						<form>
							<input type="text" class="add_post_input" />
							<input type="submit" class="submit_button" value="Dodaj wpis"/>
						</form>
					</div>
					
					<div id="site_content">
					<?php foreach ($entry as $key) { 
						echo '<div class="postbox">
							<div class="postbox_avatar"><a href="'.base_url('user/show_user_id/'.$key['user_id']).'" title="Pokaż profil usera"><img src="'.base_url('avatary/'.$key['user_avatar']).'" width="50" height="50" /></a></div>
							<div class="postbox_content">
								<div class="user_data"><a href="'.base_url('user/show_user_id/'.$key['user_id']).'" title="Pokaż profil usera">'.ucfirst($key['user_name']).' '.ucfirst($key['user_surname']).'</a></div>
								<div class="post_data">
									<p>'.$key['entry_content'].'</p>
									<p>';
									echo form_open('main/add_comment/'.$key['entry_id']);
									$comment_content = array('name'=>'comment_content', 'placeholder'=>'Skomentuj..');
									echo form_input($comment_content);
									echo form_submit('submit', 'Wyslij');
									//echo '<a href='.base_url('main/show_comments/').'></a>';
									echo form_close();
									echo '<hr/>';
									
									if ($comments !== FALSE){
									foreach ($comments as $key){
									echo $key['user_name'].' '.$key['user_surname'].' '.$key['comment_cdate'].'<br/>';
									echo $key['comment_content'];
									echo '<hr/>';
									}
									}
									else {
									echo 'Brak komentarzy. Bądź pierwszy!';
									}
									echo '</p>
								
								</div>
							</div>
							<div class="fix"></div>
						</div>';
						}
						?>
					
					</div>