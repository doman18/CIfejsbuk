<?php
if ($user){
		foreach ($user as $key)
		{
		echo 'Imie '.$key['user_name'].'<br/>';
		echo 'Nazwisko '.$key['user_surname'].'<br/>';
		echo 'Email '.$key['user_mail'].'<br/>';
		echo 'Miejscowosc '.$key['user_city'].'<br/>';
		}
	}
	else{
	echo show_404();
	}
?>