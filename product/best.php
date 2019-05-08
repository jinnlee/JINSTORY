<?php
//세션시작
session_start();
// 헤더 시작
include "../header.html";

//DB 연결하기
include "../dbconnect.php";

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../../css/paginateion.css">

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
    <!-- 검색창 시작 // 내용-->
    <?php
    # $Search_mode = $_GET['Search_mode'];
    # $Search_text = $_GET['Search_text'];
    # $cate = $_GET['cate'];
    #
    # $href = "&Search_mode=$Search_mode&Search_text=$Search_text&cate=$cate";

    //검색단어 입력
    //	if($Search_text){
    //		if($Search_mode==1) $where="product_name like '%$product_name%'";  //product_name만 검색
    //		if($Search_mode==2) $where="reference like '%$reference%'"; //reference만 검색
    //		if($Search_mode==3) $where="cate like '%$cate%'"; //cate만 검색
    //		if($Search_mode==4) {$where="(product_name like '%$product_name%' or reference like '%$reference%'or cate like '%$cate%')";} // 전체 검색
    //	}
    //
    //	$sql = "SELECT product_name, reference, cate, priced, selling_price, image_list FROM pruduct_board WHERE $where ORDER BY no DESC";
    //	$result = mysqli_query($conn, $sql);
    //
    //	if($result === false){
    //		echo "<script>alert('상품을 불러오는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.'); history.back(); </script>";
    //		error_log(mysqli_error($conn));
    //	}
    //
    //	while($row=mysqli_fetch_assoc($result)){
    // break;
    //	}
    ?>
    <!-- 검색창 끝-->


    <!-- 상품리스트 시작 : 게시물이 들어가는 곳-->

    <?php
    //    1. 페이징 전 기본 세팅한다.
    //1-1. 데이터베이스에서 총 게시글 수를 가져온다 : 140개
    $sql = "SELECT * FROM product_board WHERE product_type = 'best' ORDER BY no DESC ";
    $result = mysqli_query($conn, $sql);
    $all_post_num = mysqli_num_rows($result);

    if ($result === false) {
        echo "<script>alert(\"저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요\");</script>";
        error_log(mysqli_error($conn));
        exit;
    }
    //1-2. 한 페이지 당 게시글 개수를 정한다
    $post_num_per_page = 8; // 한 페이지 당 게시글 개수
    // + 한 줄에 보일 리스트 개수를 정한다
    $num_rows = 4; // 한 줄에 보일 리스트 수

    //1-3. 한 블록 당 페이지 개수를 정한다
    $page_num_per_block = 10; // 한 블록 당 페이지 개수
    $page = ($_GET['page']) ? $_GET['page'] : 1; // $page : 현재 페이지
    // 페이지 번호가 있는 경우, 페이지 번호를 가져오고 없으면 1을 가져온다


    //1-4. 총 페이지 수 = 올림(총 게시글 수 / 한 페이지 당 게시글 수)
    $all_page_num = ceil($all_post_num / $post_num_per_page);


    //1-5. 총 블록 수 = 올림(총 페이지 수 / 한 블록 당 페이지 수)
    $all_block_num = ceil($all_page_num / $page_num_per_block);

    //1-6. 현재 블록 위치 : 올림(현재페이지 / 한 블록 당 페이지 개수)
    $nowBlock = ceil($page / $page_num_per_block);


    // 2. 페이지 당 게시글 목록 구현

    //2-1. 각 페이지 당 게시글의 첫 번호를 구한다
    // 한 페이지에서 게시물 첫 번호 : (현재페이지-1) * 페이지 당 게시글 수
    $start_post = ($page - 1) * $post_num_per_page;

    //2-2. 반복문을 사용해서 해당 페이지에 맞게 게시글 목록을 만든다 (가져올 게시글이 없으면, break한다)
    //        $sql = "SELECT no, user_name, qna_title, qna_created FROM QnA ORDER BY no DESC LIMIT 0,1";
    $sql = "SELECT *  FROM product_board WHERE product_type='best' ORDER BY no DESC  LIMIT $start_post, $post_num_per_page";
    //        $sql = "SELECT no, product_name, cate, product_type, priced, selling_price, image_list, delivery_fee FROM product_board ORDER BY no DESC LIMIT 0,1";
    // ex ) LIMIT 4 : 4개 가져오기
    // ex ) LIMIT 5, 10 : 5번째부터 10개 가져옴 (5~14)
    $result = mysqli_query($conn, $sql);
    //        if($sql){
    //          echo "sql성공";
    //         }else {
    //          echo "sql실패";
    //         }

    if ($result === false) {
        echo "<script>alert(\"불러오는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요\");</script>";
        error_log(mysqli_error($conn));
        exit;
    }

    ?>

    <!-- 이미지 게시판 정렬-->
    <!------------------------------------------------------------------------------------------------------------->
    <!--        <table>-->
    <!--            <tr>-->
    <!--                --><? //
    //
    //                for($i=0;$i<15;$i++) {
    //                    if(($i%4)==0) {
    //                        echo   "</tr><tr>";
    //                    }
    //                    echo "<td>".$i."</td>";
    //                }
    //                ?>
    <!--            </tr>-->
    <!--        </table>-->
    <!------------------------------------------------------------------------------------------------------------->

    <!--<table>-->
    <!--    <tr>-->
    <!--        <td>-->
    <!--            --><?php //echo $row['no'].'와'.$row['image_list']; ?>
    <!--        </td>-->
    <!---->
    <!--        <td>-->
    <!---->
    <!--        </td>-->
    <!--    </tr>-->
    <!--</table>-->


    <!--이미지 게시판에 상품 넣기 틀-->
    <table border="0" width="1280" align="center" valign="top" cellspacing="0" cellpadding="0" bgcolor="ffffff">
        <!--valign="top" : 셀의 위쪽 가장자리와 셀의 내용을 정렬-->
        <!-- cellspacing : 셀과 셀의 간격을 조절 -->
        <!-- cellpadding : 데이터와 셀의 간격(셀 안쪽)을 조절 -->
        <tr>
            <?php for ($num_post = $start_post;
            $num_post < $all_post_num;
            $num_post++) {
            $row = mysqli_fetch_assoc($result);
            if ($row == false) {
                break;
            }

            if ($num_post % $num_rows == 0) { ?>
        </tr>
        <tr>
            <? } ?>
            <!--        <td height="10" align="center" bgcolor="#ffffff">&nbsp;</td> -->
            <!--        <td height="10" align="center" bgcolor="#ffffff">&nbsp;</td> -->
            <!--        <td height="10" align="center" bgcolor="#ffffff">&nbsp;</td> -->
            <!--        <td height="10" align="center" bgcolor="#ffffff">&nbsp;</td> -->
            <!--        <td height="10" align="center" bgcolor="#ffffff">&nbsp;</td> -->
            <!--        <td height="10" align="center" bgcolor="#ffffff">&nbsp;</td> -->
            <!--        <td height="10" align="center" bgcolor="#ffffff">&nbsp;</td> -->
            <!--    </tr>

            <!--이미지 게시판에 상품 넣기 -->
            <td>
                <table border='0' width='240' bgcolor='#FFFFFF' cellspacing='0' cellpadding='0' align='center'
                       valign='middle'>
                    <br><br><br>
                    <tr>
                        <!--                    이미지-->
                        <td width='180' height='230' align='center' valign='middle'>
                            <? if ($row['image_list']) {  //데이터에 이미지가 있는경우 ?>

                                <a Class='filters' href='detail.php?no=<?= $row['no'] ?>&cate=<?= $row['cate'] ?>&page=<?= $page ?>>'
                                   onfocus='this.blur()' title='<?= $row['product_name'] ?>'>
                                    <img src='./image/<?= $row['image_list'] ?>' width='240' height='330' border='0'
                                         onmouseover='this.style.filter="alpha(opacity=60)"'
                                         onmouseout='this.style.filter=""'>
                                </a>
                            <? } else { //데이터에 이미지가 없는경우 //이미지 준비중?>
                                <a Class='filters'
                                   href='detail.php?no=<?= $row['no'] ?>&cate=<?= $row['cate'] ?>&page=<?= $page ?>&Search_mode=<?= $Search_mode ?>&Search_text=<?= $Search_text ?>'
                                   onfocus='this.blur()' title='no image'>
                                    <img src='../images/no_image.gif' width='240' height='330' border='0'>
                                </a>
                            <? }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <!--                    상품이름-->
                        <td width='230' height='80' align='center' valign='middle'>
                            <a href='detail.php?no=<?= $row['no'] ?>&cate=<?= $row['cate'] ?>&page=<?= $page ?>&Search_mode=<?= $Search_mode ?>&Search_text=<?= $Search_text ?>'
                               onfocus="this.blur()">
                <span style='font-size:10pt; font-family:verdana,Tahoma; color:#6D6D6B'>
                    <?= $product_name = mb_substr($row['product_name'], 0, 25, 'UTF-8');  //문자열자르기                  ?>
                </span>
                                <br>
                                <!--                            --><? // if ($row[$product_type]) { ?>
                                <!--                                <img src='./image/-->
                                <? //= $row['image_list'] ?><!--' width='24' height='12' border='0'>-->
                                <!--                            --><? // } ?>
                                <span style='font-size:9pt; font-family:verdana,Tahoma; color:#6C81E9'>
                    <?= $reference = mb_substr($row['reference'], 0, 40, 'UTF-8');  //문자열자르기;                  ?>
                </span>
                                <br>

                                <span style='font-size:10pt; font-family:Tahoma; color:#868585'><s><?= number_format($row['priced']) ?>원</s></span>
                                <!--                <s> </s> : 취소선-->
                                <!--            &nbsp;-->
                                <span style='font-size:10pt; font-family:verdana,Tahoma; color:#102AAB'>
                                    <?= number_format($row['selling_price']) ?>원
            </span>
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
            <? } ?>
        </tr>
    </table>


    <!-- 상품리스트 끝-->

    <!-- <div>
		<?php
    //echo $_GET['cateName'];
    //include $_GET['cateName'].'.php';
    //echo file_get_contents($_GET['cateName'].'.php');

    //echo file_get_contents('best.php');

    ?>


		<?php
    //echo "test";
    //echo $_GET['cateName'];
    //include ("./".$_GET['cateName'].".php");
    ?>

	</div> -->
</div>
<div style="text-align: center; margin: 50px" ;>
    <?
    //3. 블록 당 페이지 목록 구현
    //3-1. 각 블록 당 페이지 시작 번호와 페이지 마지막 번호를 설정한다
    // 한 블록에서 페이지 시작 번호 : 현재블록 *  한 블록 당 페이지 개수 - ( 한 블록 당 페이지 개수 -1)
    $start_page = $nowBlock * $page_num_per_block - ($page_num_per_block - 1);
    // 한 블록에서 페이지 끝 번호 : 현재블록 * 한 블록 당 페이지 개수
    $end_page = $nowBlock * $page_num_per_block;

    if ($all_page_num <= $end_page) {
        $end_page = $all_page_num;
    }


    //3-2. 반복문을 사용해서 게시글 하단에 페이징 넘버를 만든다
    //3-3. 이전버튼과 다음버튼을 만든다.
    ?>
    <ul class="pagination">
        <!--        이전 블록 버튼-->
        <? if ($nowBlock > 1) {  ?>
            <li><a href="best.php?page=<? echo $start_page-10; ?>">이전</a></li>
        <? } ?>
        <!--    이전버튼-->
        <!--        --><?// if ($page > 1) { ?>
        <!--            <li><a href="list.php?boardName=QnA&page=--><?php //echo($_GET['page'] - 1); ?><!--">< </a></li>-->
        <!--        --><?// }

        for ($num_page = $start_page;
             $num_page <= $end_page;
             $num_page++) { ?>
            <!--        각각 링크걸기-->
            <li><a <? if ($page == $num_page) {
                    // 현재 페이지 표시
                    echo "class = 'active'";
                } ?>
                    href="best.php?page=<?php echo $num_page; ?>" ><?php echo $num_page; ?></a></li>
        <? }
        //        if ($page < $all_page_num) { ?>
        <!--            <!--        다음버튼-->
        <!--            <li><a href="list.php?boardName=QnA&page=--><?php //echo $_GET['page'] + 1; ?><!--"> ></a></li>-->
        <!--        --><?// } ?>
        <!--        다음 블록 버튼-->
        <? if ($nowBlock < $all_block_num) {
            ?>
            <li><a href="best.php?page=<? echo $end_page+1; ?>">다음</a></li>
        <? } ?>
    </ul>
    <!-- 푸터시작 -->
    <?php include "../footer.html"; ?>
</div>
</body>
</html>
