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
    <link rel="stylesheet" href="..//css/bootstrap.css">
    <link rel="stylesheet" href="..//css/base.css">
    <link rel="stylesheet" href="../css/join-theme..css">
    <link rel="stylesheet" href="../css/animsition..css">

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
<div>
<?php
// 상세페이지 시작
$cate = $_GET['cate'];
$no = $_GET['no'];
$sql = "SELECT * FROM product_board WHERE cate='" . $cate . "'AND no= $no";
$result = mysqli_query($conn, $sql);

if ($result === false) {
echo "<script>alert(\"저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요\");</script>";
error_log(mysqli_error($conn));
exit;
}

$row = mysqli_fetch_assoc($result); ?>
    <?php echo $row[no]; ?>
    <?php echo 'hi'; ?>
</div>
<div class="container bgwhite p-t-35 p-b-80">
    <div class="flex-w flex-sb">
        <div class="w-size14 p-t-30 respon5">
            <h4 class="product-detail-name m-text16 p-b-13">
                <?= $row['product_name']; // 상품이름 ?>
            </h4>

            <span class="m-text17">
					<?= $row['selling_price']; // 상품가격 ?>
				</span>

            <p class="s-text8 p-t-10">
                <?= $row['reference']; // 상품설명 ?>
            </p>

            <div class="p-t-33 p-b-60">
                <div class="flex-r-m flex-w p-t-10">
                    <div class="w-size16 flex-m flex-w">
                        <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                            </button>

                            <input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>

                        <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                            <!-- Button -->
                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-b-45">
                <span class="s-text8 m-r-35">SKU: MUG-01</span>
                <span class="s-text8">Categories: Mug, Design</span>
            </div>

            <!--  -->
            <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    Description
                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                </h5>

                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8">
                        Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
                    </p>
                </div>
            </div>

            <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    Additional information
                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                </h5>

                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8">
                        Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
                    </p>
                </div>
            </div>

            <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    Reviews (0)
                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                </h5>

                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8">
                        Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

/* 상세페이지끝 */

<div>
    <!-- 푸터시작 -->
    <?php include "../footer.html"; ?>
</div>
</body>
</html>