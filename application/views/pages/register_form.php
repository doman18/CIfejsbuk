<div class="right_box">
						<div class="right_box_title">Zarejestruj się</div>
						<div class="right_box_content">
							<table>
							<?php 
							
							echo form_open(base_url('guest/register'));?>
								<tr>
									<td><?php 
									$imie = array('name' => 'user_name', 'placeholder' => 'podaj swoje imie');
									echo form_input($imie);?></td>
				
								</tr>
								<tr>
									<td><?php 
									$nazwisko = array('name' => 'user_surname', 'placeholder' => 'podaj swoje nazwisko');
									echo form_input($nazwisko);?></td>
				
								</tr>
																<tr>
									<td><?php 
									$mail = array('name' => 'user_mail', 'placeholder' => 'podaj swoj adres email');
									echo form_input($mail);?></td>
				
								</tr>
																<tr>
									<td><?php 
									$password = array('name' => 'user_password', 'placeholder' => 'podaj swoje haslo');
									echo form_password($password);?></td>
				
								</tr>
								<tr>
									<td><?php 
									echo form_submit('submit', 'Zatwierdź');?></td>
				
								</tr>
								<?php echo form_close(); ?>
							</table>
						</div>
					</div>