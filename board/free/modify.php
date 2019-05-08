<?php
 //세션시작
  session_start();
// 헤더 시작
include "../../header.html";

//DB 연결하기
include "../../dbconnect.php";

$sql = "SELECT user_name, qna_title, qna_memo FROM QnA WHERE no=".$_GET['board_no'];
$result = mysqli_query($conn, $sql);

if($result === false){
	echo "<script>alert(\"저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요\");</script>";
	error_log(mysqli_error($conn));
	exit;
}

$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel ="stylesheet" href="/css/bootstrap.css">
	<link rel ="stylesheet" href="/css/base.css">
	<link rel ="stylesheet" href="/css/join-theme..css">

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
    <div style="margin-top : 45px"; class="container_join">
        <div class="row">
            <div class='col-md-4'></div>
            <div class="col-md-4">
                <div class="join-box well">
                    <form action="./process.php?mode=modify" method="post">
                        <input type="hidden" name="board_no" value="<?=$_GET['board_no']?>" />
                        <legend>Q&A</legend>
                        <p> 문의내용에 따른 메뉴를 선택해 게시물을 남겨주시면 더욱 빠르고 정확한 답변을 받아보실 수 있습니다 </p>
                        <div class="form-group">
                            <p>제목</p>
                            <input name="qna_title" type="text" class="form-control" value="<?=htmlspecialchars($row['qna_title'])?>"/>
                        </div>
                        <div class="form-group">
                            <textarea name="qna_memo" type ="text" cols="30" rows="10" class="form-control"><?=htmlspecialchars($row['qna_memo'])?></textarea>
                        </div>
                        <div class="form-group">
                            <p>비밀번호</p>
                            <input name="board_pass" type="password" class="form-control" />

                            <input type="hidden" name="user_id" value= <?php echo $_SESSION['user_id']; ?> />
                            <input type="hidden" name="user_name" value = <?php echo $_SESSION['user_name']; ?> />
                            <input type="submit" value="수정" onclick="return confirm('수정하시겠습니까?')"/>
                            <input type="button" onclick="location.href='list.php?boardName=Q&A'" value="취소" />
                        </div>
                    </form>

                    <!-- <div class="formCheck">
                        <input type="hidden" name="idCheck" class="idCheck" />
                        <input type="hidden" name="pw2Check" class="pwCheck2" />
                        <input type="hidden" name="eMailCheck" class="eMailCsheck" />
                    </div> -->

                </div>
            </div>
            <div class='col-md-4'></div>
        </div>
    </div>
<div>
    <!-- 푸터시작 -->
    <?php include "../../footer.html"; ?>
</div>
</body>
</html>
