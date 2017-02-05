<?php
foreach ($user as $key){
echo form_open_multipart('user/update_user');
$name = array ('name' =>'user_name', 'value' => $key['user_name']);
$surname = array ('name' =>'user_surname', 'value' => $key['user_surname']);
$mail = array ('name' =>'user_mail', 'value' => $key['user_mail']);
$city = array ('name' =>'user_city', 'value' => $key['user_city']);
$photo = array ('name' => 'user_avatar');

echo form_upload($photo).'<br/>';
echo form_input($name).'<br/ >';
echo form_input($surname).'<br/ >';
echo form_input($mail).'<br/ >';
echo form_input($city).'<br/ >';
echo form_submit('submit', 'Zatwierdź');
echo form_close();

}
?>