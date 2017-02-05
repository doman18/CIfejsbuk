					<?php 
					
	
					echo '
					<div class="right_box">
						<div class="right_box_title">';
						if($city_users !== FALSE){
						echo $this->session->userdata('user_city')? 'Osoby z Twojego miasta' : 'Użytkownicy';
						echo '</div>
						<div class="right_box_content">
							<table>';
							foreach ($city_users as $key) { 
							echo'	<tr>
									<td><a href="'.base_url('user/show_user_id/'.$key['user_id']).'" title="Pokaż profil usera"><img src="'.base_url('avatary/'.$key['user_avatar']).'" width="25" height="25" /></a></td>
									<td><a href="'.base_url('user/show_user_id/'.$key['user_id']).'" title="Pokaż profil usera">'.ucfirst($key['user_name']).' '.ucfirst($key['user_surname']).'</a><td>
								</tr>';
								}
								
						
						echo '
							</table>';
					}
					else{
					echo 'Brak uzytkownikow do wyswietlenia';
					}
					echo'	</div>
					</div> ';
					?>
			
					