<?php //헤더 시작
 //세션시작 
  session_start(); 
// 헤더 시작
include "../../header.html"; ?>

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

	<div style="margin-top : 45px"; class="container_join">
		<div class="row">

			<div class="col-md-4">
				<div class="join-box well">
					<form action="./process.php?mode=insert" method="post">
						<legend>Q&A</legend>
						<p> 문의내용에 따른 메뉴를 선택해 게시물을 남겨주시면 더욱 빠르고 정확한 답변을 받아보실 수 있습니다 </p>
						<div class="form-group">
							<p>제목</p>
							<input name="board_title" type="text" class="form-control" />
						</div>
						<div class="form-group">
							<textarea name="board_memo" type ="text" cols="30" rows="10" class="form-control"></textarea>
						</div>
						<div class="form-group">
<!--							<p>비밀번호</p>-->
<!--							<input name="board_pass" type="password" class="form-control" />-->

							<input type="hidden" name="user_id" value= <?php echo $_SESSION['user_id']; ?> />
							<input type="hidden" name="user_name" value = <?php echo $_SESSION['user_name']; ?> />
							<input type="submit" value="등록"/>
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
<!-- 푸터시작 -->
<?php include "../../footer.html"; ?>
</body>
</html>