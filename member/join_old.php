<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<h3>JOIN</h3>
	<form name="write_form_member" action ="../../../Desktop/member/join_result.php" method="post">
		<table width="940" style="padding:5px 0 5px 0; "><tr height="2" bgcolor="#FFC8C3"><td colspan="2"></td></tr>
			<tr>
				<th>아이디</th>
				<td><input type="text" maxlength=10 name="user_id">(영문소문자/숫자, 4~16자)</td>
			</tr>
			<tr>	
				<th>비밀번호</th>
				<td><input type="password" size=10 maxlength=10 name="user_pwd">(영문 대소문자/숫자 4자~16자)</td>
			</tr>
			<tr>
				<th>비밀번호 확인</th>
				<td><input type="password" size=10 maxlength=10 name="user_pwd2"></td>
			</tr>
			<tr>
				<th>이름</th>
				<td><input type="text" size=10 maxlength=10 name="user_name"></td>
			</tr>
			<tr>
				<th>주소</th>
				<td><input type="text" size=60 name="addr"></td>
			</tr>
			<tr>
				<th>휴대전화</th>
				<td>
					<select name="tel1">
						<option value="010" selected="selected">010</option>
						<option value="011">011</option>
						<option value="016">016</option>
						<option value="017">017</option>
						<option value="018">018</option>
						<option value="019">019</option>
					</select>
					-
					<input type="text" size=4 name="tel2" maxlength=4 defalut=>
					-
					<input type="text" size=4 name="tel3" maxlength=4>
				</td>
			</tr>
			<tr>
				<th>SMS 수신여부</th>
				<td class="sns">
					<label>
						<input type="radio" name="check_sns" value="O" checked> 수신함
					</label>
					<label>
						<input type="radio" name="check_sns" value="X"> 수신안함
					</label>
					<br>
					쇼핑몰에서 제공하는 유익한 이벤트 소식을 SMS로 받으실 수 있습니다.
				</td>
			</tr>

			<tr>
				<th>이메일</th>
				<td>
					<input type="text" name="email_id">@
					<input type="text" name="email_dns">
					<!-- 이메일 도메인 선택시 email_dns에 값 집어넣기 -->
					<select name="email_addr" onchange="this.form.email_dns.value=this[this.selectedIndex].value">
						<option value="" selected="selected">직접입력</option>
						<option value="naver.com">naver.com</option>
						<option value="daum.net">daum.net</option>
						<option value="nate.com">nate.com</option>
						<option value="yahoo.com">yahoo.com</option>
						<option value="gmail.com">gmail.com</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>이메일 수신여부</th>
				<td class="email">
					<label>
						<input type="radio" name="check_mail" value="O" checked> 수신함
					</label>
					<label>
						<input type="radio" name="check_mail" value="X" > 수신안함
					</label>
					<br>
					쇼핑몰에서 제공하는 유익한 이벤트 소식을 이메일로 받으실 수 있습니다.
				</td>
			</tr>

			<tr height="2" bgcolor="#FFC8C3"><td colspan="2"></td></tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="회원가입">
					<input type="reset" value="취소">
				</td>
			</tr>
		</table>
	</form>

</body>
</html>