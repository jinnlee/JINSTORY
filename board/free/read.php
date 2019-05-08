<?php

//세션시작
session_start();
// 헤더 시작
include "../../header.html";

//DB 연결하기
include "../../dbconnect.php";

// 게시글 번호에 따라 QnA 테이블에서 회원이름, 게시글 제목, 내용 가져오기
$sql = "SELECT user_name, qna_title, qna_memo, user_id FROM QnA WHERE no=" . $_GET['board_no'];
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo "<script>alert(\"저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요\");</script>";
    error_log(mysqli_error($conn));
    exit;
}

$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="../../css/join-theme..css">

    <script type="text/javascript">
        function keyword_check() {
            if (document.search.keyword.value == "") { //검색어가 없을 경우
                alert('검색어를 입력하세요'); //경고창 띄움
                document.search.keyword.focus(); //다시 검색창으로 돌아감
                return false;
            } else return true;
        }
    </script>
</head>
<body>

<div style="margin-top : 45px" class="container_join">
    <div class="row">
        <div class='col-md-3'></div>
        <div class="col-md-6">
            <div class="join-box well">
                <table class="table">
                    <tr>
                        <th>제목</th>
                        <td><?php echo htmlspecialchars($row['qna_title']) ?></td>
                    </tr>
                    <tr>
                        <th>작성자</th>
                        <td><?php echo htmlspecialchars($row['user_name']) ?></td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td><?php echo htmlspecialchars($row['qna_memo']) ?></td>
                    </tr>
                    <!-- <tr>
						<th>비밀번호</th>
						<td><input name="board_pass" type="password" class="form-control" />
						</td>
					</tr>
					<tr>
						<input type="button" onclick="location.href='modify.php?board_no=<?= $_GET['board_no'] ?>'" value="수정"/>
						<form method="POST" action="process.php?mode=delete">
							<input type="hidden" name="board_no" value="<?= $_GET['board_no'] ?>" />
							<input type="submit" value="삭제" />
						</form>
					</tr> -->
                </table>
                <?php if ($_SESSION['user_id'] == $row['user_id']) { ?>
                    <div class="form-group">
<!--                        <p>비밀번호</p>-->
<!--                        <input name="board_pass" type="password" class="form-control" />-->
                        <input type="button" onclick="location.href='modify.php?board_no=<?= $_GET['board_no'] ?>'" value="수정"/>
                        <form method="POST" action="process.php?mode=delete" style="display:inline-block">
                            <input type="hidden" name="board_no" value="<?= $_GET['board_no'] ?>"/>
                            <input type="submit" value="삭제" onclick="return confirm('삭제하시겠습니까?')" />
                        </form>
                    </div>
                <? } ?>
            </div>
            <div class='col-md-3'></div>
        </div>
    </div>
</div>
<!-- 푸터시작 -->
<?php include "../../footer.html"; ?>
</body>
</html>
