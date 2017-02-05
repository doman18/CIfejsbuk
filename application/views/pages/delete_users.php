<?php
echo '<table>';
foreach ($users as $key){
echo '<tr>';
echo '<td><img src="'.base_url('avatary/'.$key['user_avatar']).'" alt="'.$key['user_name'].'" height="25" width="25"></td><td>'.$key['user_name'].'</td><td>'.$key['user_surname'].'</td><td>'.$key['user_mail'].'</td><td><a href="'.base_url('admin/delete_user_id/'.$key['user_id']).'">Usuń</a></td><td>';
if ($key['is_admin'] == TRUE)
{echo '<a href="'.base_url('admin/unset_admin/'.$key['user_id']).'">';}
else
{ echo '<a href="'.base_url('admin/set_admin/'.$key['user_id']).'">';}
echo '<img src="'.base_url('img/admin_'.$key['is_admin'].'.jpg').'" alt="Smiley face" height="20" width="20"></a>';
echo '</td>';
echo '</tr>';
}
echo '</table>';
?>