<div class="left_col">
					<div id="profile_avatar">
						<table class="left_table">
							<tr>
								<?php echo'<td><a href="'.base_url('user/show_user_id/'.$this->session->userdata('user_id')).'" title="Pokaż profil usera"><img src="'.base_url('avatary/'.$this->session->userdata('user_avatar')).'" width="50" height="50" /></a></td>
					<td><a href="'.base_url('user/show_user_id/'.$this->session->userdata('user_id')).'" title="Pokaż swój profil">'.ucfirst($this->session->userdata('user_name')).' '.ucfirst($this->session->userdata('user_surname')).'</a>
								<br/>
								<a href="'.base_url('user/edit_user').'" title="Edytuj swój profil">Edytuj profil</a>
								</td>';?>
							</tr>
						</table>
					</div>
					<div id="left_navigation">
						<p><?php
						if($this->session->userdata('is_admin') ==TRUE) {
						echo '<ul>';
						echo '<li><a href ="'.base_url('admin/show_all_users').'">Zarządzaj użytkownikami</a></li>';
						echo '</ul>';
						}
						
						
						?></p>
					</div>
				</div>
				