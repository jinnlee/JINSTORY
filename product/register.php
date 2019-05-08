<?php
//세션시작
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('로그인 후 이용해주세요.'); location.replace('/member/login.php'); </script>)";
}
//헤더 시작
include "../header.html";
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
        <form action="./process.php?mode=insert" method="post" enctype="multipart/form-data">
            <table class="table table-boardered">
                <tr>
                    <td>상품명</td>
                    <td><input type="text" class="form-control" name="product_name"></td>
                </tr>
                <tr>
                    <td>상품소개글</td>
                    <td><input type="text" class="form-control" name="reference"></td>
                </tr>

                <tr>
                    <td>상품카테고리</td>
                    <td>
                        <select name="cate" class="form-control">
                            <option value="outer" selected="selected">outer</option>
                            <option value="top">top</option>
                            <option value="bottom">bottom</option>
                            <option value="dress">dress</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>상품유형</td>
                    <td>
                        <select name="product_type" class="form-control">
                            <option value="general" selected="selected">일반상품</option>
                            <option value="best">best상품</option>
                            <option value="recommendation">추천상품</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>상품가격</td>
                    <td><input type="text" class="form-control" name="priced"></td>
                </tr>
                <tr>
                    <td>상품할인가격</td>
                    <td><input type="text" class="form-control" name="selling_price"></td>
                </tr>
                <tr>
                    <td>배송비</td>
                    <td><input type="text" class="form-control" name="delivery_fee"></td>
                </tr>
                <tr>
                    <td>상품이미지</td>
                    <!--						<td><input name="image_list" type="file" />-->
                    <?php //echo $row[image_list] ?><!--</td>-->
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
                    <td><input name="image_contents" type="file"/></td>
                </tr>
                <tr>
                    <td>상품설명</td>
                    <td>
                        <textarea type="text" rows="5" cols="40" name="product_desc" class="form-control"></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="text-center">
                        <input type="submit" class="btn btn-primary" value="등록">
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