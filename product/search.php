<?php
//세션시작
session_start();

//if(!isset($_SESSION['user_id'])){
//    echo "<script>alert('로그인 후 이용해주세요.'); location.replace('/member/login.php'); </script>)";
//}

//헤더 시작
include "../header.html";
?>

<!DOCTYPE html>
<html>
<head>
    <link rel ="stylesheet" href="/css/bootstrap.css">
    <link rel ="stylesheet" href="/css/base.css">
    <link rel ="stylesheet" href="../../css/join-theme..css">

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



    <!-- 푸터시작 -->
    <?php include "../footer.html"; ?>
</body>
</html>