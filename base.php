<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width", initial-scale="1">
	<title>JINS</title>
	<meta charset="utf-8">
	<link rel ="stylesheet" href="../css/bootstrap.css">
	<link rel ="stylesheet" href="../css/base.css">

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
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid"> <!-- 내비게이션바는 보통 container-fluid를 만들어 줌 -->
			<div class="navbar-header"> <!-- 네이게이션에서 헤더 부분 -->
				<button type="button" class ="navbar-toggle collapsed" data-toggle="collapse"
				data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> 
				<!-- 참고 ) 제타위키 '부트스트랩 내비게이션바 자동접기 navbar-collapse' -->
				<!-- 화면너비가 넓으면 navbar-collapse이 표시되고, navbar-toggle은 숨겨짐 -->
				<!-- 화면너비가 작으면 navbar-collapse은 숨겨지고, navbar-toggle은 표시됨 -->
				<span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<!-- 내비게이션바 기본세팅 -->
			</button>
			<a class="navbar-brand" href="../index.php">JINS</a>
			<!-- brand : 상표나 홈페이지 제목이 들어가는 곳 -->
		</div> <!-- 여기 까지 헤더부분 -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../member/login.php">LOGIN<span class="sr-only"></span></a></li>
				<li><a href="../member/join.php">JOIN</a></li>
				<li><a href="../member/login.php">CART</a></li>
				<li><a href="../member/login.php">ORDER</a></li>
				<li><a href="../member/login.php">MY PAGE</a></li>
				<!-- 검색창 -->
				<li>
					<form name="search" class="navbar-form" name="search" method="get"
                          action="product/search.php?keyword=<?php $_GET['keyword']; ?>" onsubmit="return keyword_check()">
					<!-- action : submit시 이동경로, onsubmit : submit 클릭시 호출 조건 (true 일 때, action으로 넘어감) -->
					<div class="form-group">
						<input type="text" class="form-control" name="keyword" value="">
						<!-- placeholder	: hint 주는 말  -->
					</div>
					<button type="submit" class="btn btn-default">SEARCH</button>
				</form>
			</li>
		</ul>
		<!-- 개별적인 링크가 들어갈 수 있는 곳 -->
		<!-- 사용자 정보넣을 수 있는 네비게이션바 -->
	</div>
</div>
</nav>
<div class="container">
	<br>
	<br>
	<br>
	<h1 style="text-align: center;"><a href="index.php">JINS</a></h1>
</div>

<div class = "navbar-default2">
	<ul class="nav navbar-nav navbar-left">
		<li class="active"><a href="http://localhost/product/list.php?cateName=BEST">BEST<span class="sr-only"></span></a></li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="ture" aria-expanded="false">OUTER<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="/product/list.php?cateName=outer&outerName=coat">COAT</a></li>
				<li><a href="/product/list.php?cateName=outer&outerName=jacket_jumper">JACKET/JUMPER</a></li>
			</ul>
		</li>
		<li><a href="http://localhost/product/list.php?cateName=bottom">BOTTOM</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="/member/login.php">Q&A</a></li>
		<li><a href="/member/login.php">REVIEW</a></li>
		<li><a href="/member/login.php">NOTICE</a></li>
	</ul>
	<!-- 개별적인 링크가 들어갈 수 있는 곳 -->
	<!-- 사용자 정보넣을 수 있는 네비게이션바 -->
</div>



<footer style="color:#000000">
	<hr>
	<div class="container">
		<div class="row">
			<!-- 열에 여러 행이 들어갈 수 있도록 -->
			<div class="col-sm-2" style="text-align: left;">
				<!-- col-sm-2 : 12 중에 2만큼 차지함 col-sm 숫자들이 다 합쳐서 12가 되어야 함.-->
				<h5>COMMUNITY</h5>
				<ul>
					<li>NOTICE</li>
					<li>Q&A</li>
					<li>REVIEW</li>
				</ul>
			</div>
			<div class="col-sm-4" style="text-align: left;">
				<!-- col-sm-2 : 12 중에 2만큼 차지함 col-sm 숫자들이 다 합쳐서 12가 되어야 함.-->
				<h5>CONTACT</h5>
				<ul>
					<li>070-0000-0000</li>
					<li>010-2529-1929</li>
					<li>카카오톡 상담 lje8888</li>
					<li>OPEN  / mon ~ fry / am10:00 ~ pm6:00</li>
					<li>CLOSE / sat.sun.holiday off</li>
				</ul>
			</div>
			<div class="col-sm-3" style="text-align: left;">
				<!-- col-sm-2 : 12 중에 2만큼 차지함 col-sm 숫자들이 다 합쳐서 12가 되어야 함.-->
				<h5>BANK INFO</h5>
				<ul>
					<li>NOTICE</li>
					<li>Q&A</li>
					<li>REVIEW</li>
				</ul>
			</div>
			<div class="col-sm-3" style="text-align: left;">
				<!-- col-sm-2 : 12 중에 2만큼 차지함 col-sm 숫자들이 다 합쳐서 12가 되어야 함.-->
				<h5>COMPANY INFO</h5>
				<ul>
					<li>NOTICE</li>
					<li>Q&A</li>
					<li>REVIEW</li>
					<li>Copyright &copy; 2018</li>
				</ul>
			</div>
		</div>
	</footer>

</body>
</html>