<?php
// $conn = dbconn();

//DB 연결하기
include "../dbconnect.php";

// 아이디, 비밀번호를 로그인페이지에서 전달받아옴
$post_id=$_POST['user_id'];
$post_pass1=$_POST['user_pass'];
$post_pass2=md5($post_pass1);

// 전달받은 아이디, 비밀번호가 DB에 있는지 검색
$sql="SELECT * FROM user_info WHERE user_id='".$post_id."' AND user_pass='".$post_pass2."'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result); // 해당 아이디와 비밀번호가 일치하는 행의 개수
$row = mysqli_fetch_array($result); // 해당 아이디와 비밀번호가 있는 행의 내용들

// 검색해서 나온 행에서 원하는 값 가져오기
$user_id=$row['user_id'];
$user_name=$row['user_name'];

// DB안에 아이디와 비밀번호가 있다면,
if($count==1){
	// 아이디 저장 체크한 경우
	if(isset($_POST['remember'])){
		setCookie("id_remember_cookie", $user_id, time()+60*60*24*30); // 30일동안 유지
		// 세션 시작, 세션변수에 회원 아이디, 이름 저장, index로 이동
		session_start();
		$_SESSION['user_id']=$user_id;
		$_SESSION['user_name']=$user_name;
		header('Location:../index.php');
		exit;
	// 아이디 저장 체크 안 한 경우
	}else{
		// 저장된 쿠키가 있는 경우
		if(isset($_COOKIE["id_remember_cookie"])){
			// 쿠키지우기
			setCookie("id_remember_cookie", $user_id, time()-60*60*24*30);
			// 세션 시작, 세션변수에 회원 아이디, 이름 저장, index로 이동
			session_start();
			$_SESSION['user_id']=$user_id;
			$_SESSION['user_name']=$user_name;
			header('Location:../index.php');
			exit;
		//저장된 쿠키가 없는 경우
		}else{
			// 세션 시작, 세션변수에 회원 아이디, 이름 저장, index로 이동
			session_start();
			$_SESSION['user_id']=$user_id;
			$_SESSION['user_name']=$user_name;
			header('Location:../index.php');
			exit;
		}
	}
// DB안에 아이디와 비밀번호가 없다면,
}else{
	echo "<script>alert('아이디 또는 비밀번호를 다시 확인해주세요.'); history.back(); </script>";
	// error_log(mysqli_error($conn));

}
?>
