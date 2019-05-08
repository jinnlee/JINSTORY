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
	<script type="text/javascript" src="../js/mySignupForm.js"></script>
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

	<div  class="container_join">
		<div class="row">
			<div class='col-md-4'></div>
			<div class="col-md-4">
				<div class="join-box well">
					<form action="user_info_process.php" method="post">
						
						<p> MEMBERSHIP INFO </p>
						<div class="form-group">
							<p>아이디</p>
							<input name="user_id" value='' type="id" class="form-control" id="user_id" />
							(영문소문자/숫자, 4~16자)
						</div>
						<div class="form-group">
							<p>이름</p>
							<input name="user_name" value='' type="text" class="form-control" id="user_name" />
						</div>
						<div class="form-group">
							<p>비밀번호</p>
							<input name="user_pass" value='' type="password" class="form-control" id="user_pass" />(영문소문자/숫자, 4~16자)
						</div>
						<div class="form-group">
							<p>비밀번호 확인</p>
							<input name="user_pass2" value='' type="password" class="form-control" id="user_pass2"/>

						</div>
						<div class="form-group">
							<p>주소</p>
							<input name="user_addr" value='' type="text" class="form-control" id="user_addr"/>
						</div>
						<div class="form-group">
							<p>휴대전화</p>
							<input name="user_tel" value='' type="text" class="form-control" id="user_tel"/>

						</div>
						<div class="form-group">
							<p>이메일</p>
							<input name="user_email" value='' type="text" class="form-control" ids="user_email"/>
							
						</div>

						<div class="form-group">
							<input type="submit" value="회원정보 수정"/>
							<input type="button" onclick="location.href='../index.php'" value="취소" />
							<input type="submit" value="회원탈퇴"/>
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
<?php include "../footer.html"; ?>

</body>
</html>