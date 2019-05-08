<?php 
$value = $_GET['id'];
setCookie("id_remember_cookie", $value, time()+60*60*24*30);
header('Location:../index.php');
exit;
?>