
 <!-- 세션시작 -->
  <?session_start(); ?>
<!-- 헤더 시작 -->
<?php include "header.html"; ?>

<!DOCTYPE html>
<html>
<head>
	<link rel ="stylesheet" href="css/bootstrap.css">
	<link rel ="stylesheet" href="css/base.css">

	<!-- 검색창 자바스크립트 -->
	<script type="text/javascript">
		function keyword_check(){ 
			if(document.search.keyword.value==""){ //검색어가 없을 경우
				alert('검색어를 입력하세요'); //경고창 띄움
				document.search.keyword.focus(); //다시 검색창으로 돌아감
				return false;
			}else return true;
		}
	</script>

	<!-- 팝업창 -->
	<script language="javascript"> 
		function OpenWindow() {
			window.open("popup.php","_blank","top=0,left=0,width=330,height=390,resizable=1,scrollbars=no,menubar=no, status=no, toolbar=no");
		} 
	</script>
</head>

<?php
if(isset($_COOKIE["popup_cookie"])){
	echo '<body style="padding-bottom: 70px;">';
}else{
	echo '<body onLoad="OpenWindow()" style="padding-bottom: 70px;">';
}
?>

<!-- 팝업레이어 -->
	<!-- <div id="popup_layer" style="position:absolute; left:10; top:80;z-index:500; display:inline;">
		<iframe id="popup_frame" name="popup_frame" width="400" height="600" src="popup.php" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
	</div> -->
	


	<a href="#"><img class="media-object" width="100%" src="images/natalie_pc.jpg" alt="메인이미지"></a>
	

	<br>
	<!-- 푸터시작 -->
	<?php include "footer.html"; ?>
</body>
</html>