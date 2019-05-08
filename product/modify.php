<?php
//세션시작
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('로그인 후 이용해주세요.'); location.replace('/member/login.php'); </script>)";
}
//헤더 시작
include "../header.html";


//DB 연결하기
include "../dbconnect.php";

$sql = "SELECT no, product_name, cate, product_type, priced, selling_price, image_list, delivery_fee FROM product_board WHERE no=" . $_POST['board_no'];

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
<div class="col-sm-2"></div>
<div class="col-sm-7">
    <div class="table-responsive">
        <h2 class="text-center">상품등록</h2>
        <form action="./process.php?mode=modify" method="post" enctype="multipart/form-data">
            <table class="table table-boardered">
                <tr>
                    <td>상품명</td>
                    <td><input type="text" class="form-control" name="product_name"
                               value="<?= htmlspecialchars($row['product_name']) ?>"></td>
                </tr>
                <tr>
                    <td>상품소개글</td>
                    <td><input type="text" class="form-control" name="reference"
                               value="<?= htmlspecialchars($row['product_name']) ?>"></td>
                </tr>

                <tr>
                    <td>상품카테고리</td>
                    <td>
                        <select name="cate" class="form-control">
                            <option value="outer" <?php if ($row['cate'] == 'outer') echo "selected"; ?>>outer</option>
                            <option value="top" <?php if ($row['cate'] == 'top') echo "selected"; ?>>top</option>
                            <option value="bottom" <?php if ($row['cate'] == 'bottom') echo "selected"; ?>>bottom
                            </option>
                            <option value="dress" <?php if ($row['cate'] == 'dress') echo "selected"; ?>>dress</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>상품유형</td>
                    <td>
                        <select name="product_type" class="form-control">
                            <option value="general" <?php if ($row['product_type'] == 'general') echo "selected"; ?>>
                                일반상품
                            </option>
                            <option value="best" <?php if ($row['product_type'] == 'best') echo "selected"; ?>>best상품
                            </option>
                            <option value="recommendation" <?php if ($row['product_type'] == 'recommendation') echo "selected"; ?>>
                                추천상품
                            </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>상품가격</td>
                    <td><input type="text" class="form-control" name="priced"
                               value="<?= htmlspecialchars($row['priced']) ?>"></td>
                </tr>
                <tr>
                    <td>상품할인가격</td>
                    <td><input type="text" class="form-control" name="selling_price"
                               value="<?= htmlspecialchars($row['selling_price']) ?>"></td>
                </tr>
                <tr>
                    <td>배송비</td>
                    <td><input type="text" class="form-control" name="delivery_fee"
                               value="<?= htmlspecialchars($row['delivery_fee']) ?>"/></td>
                </tr>
                <tr>
                    <td>상품이미지</td>
                    <td>
                        <? if ($row['image_list']) {
                            echo $row['image_list']; ?>
                            &nbsp;&nbsp; &nbsp
                            <a href="#"
                               onclick="window.open('./del_file.php','open''width=450, height=150, top=50, left=5, scrollbars=no, resizable=no')">[삭제]</a>
                        <?php } ?>
                        <input type="file" name="image_list"/>
                    </td>
                </tr>
                <tr>
                    <td>내용이미지</td>
                    <td><input name=" image_contents" type="file"/>
                    </td>
                </tr>
                <tr>
                    <td>상품설명</td>
                    <td>
                        <textarea type="text" rows="5" cols="40" name="product_desc" class="form-control"
                                  value="<?= htmlspecialchars($row['product_desc']) ?>"></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="text-center">
                        <input type="submit" class="btn btn-primary" value="수정">
                        <input type="reset" class="btn btn-danger" value="취소">
                    </td>
                </tr>
            </table>
        </form>

    </div>
    <div class="col-sm-3"></div>
    <!-- 푸터시작 -->
    <?php include "../footer.html"; ?>
</body>
</html>
