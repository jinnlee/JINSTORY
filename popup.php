<!DOCTYPE html>
<html>
<head>
	<script>
		function setNoPop() {
			location.href = "click.php";
			self.close();
		}
	</script>
</head>
<body>
	<img src="/images/popup_notice.jpg" onclick="self.close()" /> <br>
	<div>
		<span style="float: left;">
			오늘 하루 열지 않음 <input type="checkbox" name="popup_notice_check" id="noPop" onclick="setNoPop()" >
		</span>
		<span style="float: right;">
			<a href ="javascript:self.close()">닫기</a>
		</span>
	</div>
</body>
</html>
<!--test-->