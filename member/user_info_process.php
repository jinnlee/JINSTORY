<?php
include "../include/dbconnect";

$user_id=$_POST['user_id'];
$user_name=$_POST['user_name'];
$user_pass=md5($_POST['user_pass']);
$user_tel=$_POST['user_tel'];
$user_addr=$_POST['user_addr'];
$user_email=$_POST['user_email'];

$sql = "
insert into user_info set
user_id = '$user_id', 
user_name = '$user_name',
user_pass = '$user_pass',
user_tel = '$user_tel',
user_addr = '$user_addr',
user_email = '$user_email'
";

$result = mysqli_query($conn, $sql);
if($result === false){
	alert('저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요');
	error_log(mysqli_error($conn));
}else{
	header('Location:../modify.php');
}
?>