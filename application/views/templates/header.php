<!doctype html>
<html lang="pl">
	<head>
		<meta charset="utf-8"/>
		<title>Fejsbuk</title>
		<link rel="Stylesheet" type="text/css" href="<?php echo base_url('css/reset.css');?>" media="all"/>
		<link rel="Stylesheet" type="text/css" href="<?php echo base_url('css/style.css');?>" media="all"/>
	</head>
	<body>
		<div id="header_bar">
			<div class="content">
				<div class="left_col">
					<div id="logo"><a href="<?php echo base_url('main'); ?>"><img src="<?php echo base_url('img/logo.jpg');?>"/ ></a></div>
				</div>
				<div class="middle_col">
					<div id="search_box"></div>
				</div>
				<div class="right_col">
				<table class="user_header_nav">
				
				<?php 
				if($this->session->userdata('user_id')){
				echo '<table class="user_header_nav">
				<tr>
					<td><a href="'.base_url('user/show_user_id/'.$this->session->userdata('user_id')).'" title="Pokaż profil usera"><img src="'.base_url('avatary/'.$this->session->userdata('user_avatar')).'" width="25" height="25" /></a></td>
					<td><a href="'.base_url('user/show_user_id/'.$this->session->userdata('user_id')).'" title="Pokaż profil usera">'.ucfirst($this->session->userdata('user_name')).' '.ucfirst($this->session->userdata('user_surname')).'</a></td>
					<td><a href="'.base_url('guest/logout').'" title="wyloguj">Wyloguj</a></td>
				</tr>
				</table>
';
				}
				else{
				echo '<tr>';
				echo '<td>';
				echo form_open(base_url('guest/log_me_in'));
				$mail = array ('name' => 'user_mail', 'placeholder' => 'twój email', 'class' => 'login_input');
				echo form_input($mail);
				echo '</td>';
				echo '<td>';
				$password = array ('name' => 'user_password', 'placeholder' => 'twoje haslo', 'class' => 'login_input');
				echo form_password($password);
				echo '</td>';
				echo '<td>';
				$submit = array ('name' => 'submit', 'value' => 'Zaloguj', 'class' => 'submit_button');
				echo form_submit($submit);
				echo '</td>';
				echo '</tr>';
				echo form_close();
				}
				
				?>
				</table>
				</div>
				<div class="fix"></div>
			</div>
		</div>
		
		<div id="main_site">
			<div class="content">