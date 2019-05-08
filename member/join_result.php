 <!-- 세션시작 -->
  <?session_start(); ?>
<!-- 헤더 시작 -->
<?php include "../header.html"; ?>

<!DOCTYPE html>
<html>
<head>
	<link rel ="stylesheet" href="../css/bootstrap.css">
	<link rel ="stylesheet" href="../css/base.css">
    <link rel ="stylesheet" href="../css/join-theme.css">
	<script type="text/javascript">
		function keyword_check(){
			if(document.search.keyword.value==""){ //검색어가 없을 경우
				alert('검색어를 입력하세요'); //경고창 띄움
				document.search.keyword.focus(); //다시 검색창으로 돌아감
				return false;
			}else return true;
		}

	</script>
</head>
<body>

	<?php
  //DB 연결하기
  include "../dbconnect.php";

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
		echo "<script>alert(\"저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요\");</script>";
		error_log(mysqli_error($conn));
        // exit;
	}
	?>

    <div class="container_login">
        <div class="row">
            <div class='col-md-4'></div>
            <div class="col-md-3">
                <div class="join-box well">
                    <h5 align="center">회원가입이 완료 되었습니다.</h5>
                    <table class="table">
                        <tr>
                            <th>아이디</th>
                            <td><?php echo $_POST['user_id']; ?></td>
                        </tr>
                        <tr>
                            <th>이름</th>
                            <td><?php echo $_POST['user_name']; ?></td>
                        </tr>
                        <tr>
                            <th>이메일</th>
                            <td><?php echo $_POST['user_email'] ?></td>
                        </tr>
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <input class="btn btn-default btn-block m-t-md" style="display:inline-block;" type="button" name="login" value="로그인" onclick="location.href='http://localhost/member/login.html'">-->
<!--                                <input class="btn btn-default btn-block m-t-md" type="button" name="main" value="메인으로 이동" onclick="location.href='http://localhost/index.php'">-->
<!--                            </td>-->
<!--                        </tr>-->
                        <input class="btn btn-default btn-block m-t-md" type="button" name="login" value="로그인" onclick="location.href='http://localhost/member/login.html'">
                        <input class="btn btn-default btn-block m-t-md" type="button" name="main" value="메인으로 이동" onclick="location.href='http://localhost/index.php'">
                    </table>

                </div>
            </div>
            <div class='col-md-5'></div>
        </div>
    </div>

	<!-- 푸터시작 -->
	<?php include "../footer.html"; ?>

</body>
</html>
