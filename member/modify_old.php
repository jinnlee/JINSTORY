<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<h3>MEMBERSHIP INFO</h3>
	<form name="write_form_member" action ="modifySave.php" method="post">
		<table width="940" style="padding:5px 0 5px 0; "><tr height="2" bgcolor="#FFC8C3"><td colspan="2"></td></tr>
			<tr>
				<th>아이디</th>
				<td><input type="text" maxlength=10 name="user_id" value=<?php echo $_POST['user_id']; ?> disabled >(영문소문자/숫자, 4~16자)</td>
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
				<td><input type="text" maxlength=10 name="user_id" value=<?php echo $_POST['user_name']; ?> disabled ></td>
			</tr>
			<tr>
				<th>주소</th>
				<td><input type="text" size=60 name="user_addr" value= <?php echo $_POST['user_addr']; ?>> </td>
			</tr>
			<tr>
				<th>휴대전화</th>
				<td>
					<select name="tel1">
						<option value="010" <?php if($_POST['tel1'] == '010') echo"selected"; ?>>010</option>
						<option value="011" <?php if($_POST['tel1'] == '011') echo"selected"; ?>>011</option>
						<option value="016" <?php if($_POST['tel1'] == '016') echo"selected"; ?>>016</option>
						<option value="017" <?php if($_POST['tel1'] == '017') echo"selected"; ?>>017</option>
						<option value="018" <?php if($_POST['tel1'] == '018') echo"selected"; ?>>018</option>
						<option value="019" <?php if($_POST['tel1'] == '019') echo"selected"; ?>>019</option>
					</select>
					-
					<input type="text" size=4 name="tel2" maxlength=4 value= <?php echo $_POST['tel2']; ?>>
					-
					<input type="text" size=4 name="tel3" maxlength=4 value= <?php echo $_POST['tel3']; ?>>
				</td>
			</tr>
			<tr>
				<th>SMS 수신여부</th>
				<td class="sns">
					<label>
						<input type="radio" name="check_sns" value="O" <?php if($_POST['check_sns'] == 'O') echo"checked"; ?> checked> 수신함
					</label>
					<label>
						<input type="radio" name="check_sns" value="X" <?php if($_POST['check_sns'] == 'X') echo"checked"; ?> > 수신안함
					</label>
					<br>
					쇼핑몰에서 제공하는 유익한 이벤트 소식을 SMS로 받으실 수 있습니다.
				</td>
			</tr>

			<tr>
				<th>이메일</th>
				<td>
					<input type="text" name="email_id" value= <?php echo $_POST['email_id']; ?>>@
					<input type="text" name="email_dns" value= <?php echo $_POST['email_dns']; ?>>
					<select name="email_addr" onchange="this.form.email_dns.value=this[this.selectedIndex].value">
						<option value="" selected="selected">직접입력</option>
						<option value="naver.com" <?php if($_POST['email_addr'] == 'naver.com') echo"selected"; ?>>naver.com</option>
						<option value="daum.net" <?php if($_POST['email_addr'] == 'daum.net') echo"selected"; ?>>daum.net</option>
						<option value="nate.com" <?php if($_POST['email_addr'] == 'nate.com') echo"selected"; ?>>nate.com</option>
						<option value="yahoo.com" <?php if($_POST['email_addr'] == 'yahoo.com') echo"selected"; ?>>yahoo.com</option>
						<option value="gmail.com" <?php if($_POST['email_addr'] == 'gmail.com') echo"selected"; ?>>gmail.com</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>이메일 수신여부</th>
				<td class="email">
					<label>
						<input type="radio" name="check_mail" value="O" <?php if($_POST['check_mail'] == 'O') echo"checked"; ?> checked> 수신함
					</label>
					<label>
						<input type="radio" name="check_mail" value="X" <?php if($_POST['check_mail'] == 'X') echo"checked"; ?>> 수신안함
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