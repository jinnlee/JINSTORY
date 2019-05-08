<?php
//세션시작
session_start();
// 헤더 시작
include "../../header.html";

//DB 연결하기
include "../../dbconnect.php";


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/join-theme.css">
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
<div class="container">
    <h2 style="text-align: center;">QnA</h2>
    <table class="table table-hover">
        <thead>
        <!-- 리스트 타이틀 부분 -->
        <tr>
            <th width='5%' class="no">no</th>
            <!-- <th width='15%' class="item">item</th> -->
            <th width='50%' class="title">title</th>
            <th width='10%' class="name">name</th>
            <th width='15%' class="date">date</th>
        </tr>
        </thead>
        <!-- 리스트 타이틀 끝 -->
        <!-- 리스트 부분 시작 -->
        <?php
        // 페이징
        //    1. 페이징 전 기본 세팅한다.
        //1-1. 데이터베이스에서 총 게시글 수를 가져온다 : 7000개
        $sql = "SELECT no, user_name, qna_title, qna_created FROM QnA ORDER BY no DESC";
        $result = mysqli_query($conn, $sql);
        $all_post_num = mysqli_num_rows($result);

        if ($result === false) {
            echo "<script>alert(\"저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요\");</script>";
            error_log(mysqli_error($conn));
            exit;
        }


        //1-2. 한 페이지 당 게시글 개수를 정한다
        $post_num_per_page = 20; // 한 페이지 당 게시글 개수


        //1-3. 한 블록 당 페이지 개수를 정한다
        $page_num_per_block = 10; // 한 블록 당 페이지 개수
        $page = ($_GET['page']) ? $_GET['page'] : 1; // $page : 현재 페이지
        //        if($page>1){
        //            // $page : 현재 페이지
        //            // 가져오는 페이지가 없으면, 1이 나옴
        //        }
        // 페이지 번호가 있는 경우, 페이지 번호를 가져오고 없으면 1을 가져온다


        //1-4. 총 페이지 수 = 올림(총 게시글 수 / 한 페이지 당 게시글 수)
        //    - 7000 / 30 = 233.33 올림(ceil)하면 234
        $all_page_num = ceil($all_post_num / $post_num_per_page);


        //1-5. 총 블록 수 = 올림(총 페이지 수 / 한 블록 당 페이지 수)
        //    - 234 / 10 = 23.4 올림하면 24
        $all_block_num = ceil($all_page_num / $page_num_per_block);

        //1-6. 현재 블록 위치 : 올림(현재페이지 / 한 블록 당 페이지 개수)
        $nowBlock = ceil($page / $page_num_per_block);


        // 2. 페이지 당 게시글 목록 구현

        //2-1. 각 페이지 당 게시글의 첫 번호를 구한다
        // 한 페이지에서 게시물 첫 번호 : (현재페이지-1) * 페이지 당 게시글 수
        $start_post = ($page - 1) * $post_num_per_page;


        //2-2. 반복문을 사용해서 해당 페이지에 맞게 게시글 목록을 만든다 (가져올 게시글이 없으면, break한다)
        //        $sql = "SELECT no, user_name, qna_title, qna_created FROM QnA ORDER BY no DESC LIMIT 0,1";
        $sql = "SELECT no, user_name, qna_title, qna_created FROM QnA ORDER BY no DESC LIMIT $start_post, $post_num_per_page";
        //        $sql = "SELECT no, product_name, cate, product_type, priced, selling_price, image_list, delivery_fee FROM product_board ORDER BY no DESC LIMIT 0,1";
        // ex ) LIMIT 4 : 4개 가져오기
        // ex ) LIMIT 5, 10 : 5번째부터 10개 가져옴 (5~14)
        $result = mysqli_query($conn, $sql);

        //        if($sql){
        //          echo "sql성공";
        //         }else {
        //          echo "sql실패";
        //         }

        if ($result == false) {
            echo "<script>alert(\"불러오는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요\");</script>";
            error_log(mysqli_error($conn));
            exit;
        }

        ?>
        <tbody>
        <?php
        for ($num_post = $start_post;
             $num_post < $all_post_num;
             $num_post++) {
            //            echo $num_post;
            $row = mysqli_fetch_assoc($result);
            if ($row == false) {
                break;
            }
            ?>
            <tr>
                <!-- 번호 -->
                <td class="no"><?php echo $row['no']; ?></td>
                <!-- 제목 -->
                <td class="title"><a href="read.php?board_no=<?= $row['no'] ?>"><?php echo $row['qna_title']; ?></a>
                </td>
                <!-- 이름 -->
                <td class="name"><?php echo $row['user_name']; ?></td>
                <!-- 날짜 -->
                <td class="date"><?php echo $row['qna_created']; ?></td>
            </tr>
        <? } ?>
        </tbody>
    </table>
    <a id='write.php' class="pull-right btn btn-default" onclick="location.href='write.php'">글쓰기</a>
</div>
<div style="text-align: center">
    <?php

    //3. 블록 당 페이지 목록 구현
    //3-1. 각 블록 당 페이지 시작 번호와 페이지 마지막 번호를 설정한다
    // 한 블록에서 페이지 시작 번호 : 현재블록 *  한 블록 당 페이지 개수 - ( 한 블록 당 페이지 개수 -1)
    $start_page = $nowBlock * $page_num_per_block - ($page_num_per_block - 1);
    // 한 블록에서 페이지 끝 번호 : 현재블록 * 한 블록 당 페이지 개수
    $end_page = $nowBlock * $page_num_per_block;


    //3-2. 반복문을 사용해서 게시글 하단에 페이징 넘버를 만든다
    //3-3. 이전버튼과 다음버튼을 만든다.
    ?>

    <ul class="pagination">
        <!--        이전 블록 버튼-->
        <? if ($nowBlock > 1) {  ?>
            <li><a href="list.php?cate=<?= $cate ?>&page=<? echo $start_page-10; ?>">이전</a></li>
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
                        href="list.php?boardName=QnA&page=<?php echo $num_page; ?>" ><?php echo $num_page; ?></a></li>
        <? }
//        if ($page < $all_page_num) { ?>
<!--            <!--        다음버튼-->
<!--            <li><a href="list.php?boardName=QnA&page=--><?php //echo $_GET['page'] + 1; ?><!--"> ></a></li>-->
<!--        --><?// } ?>
<!--        다음 블록 버튼-->
        <? if ($nowBlock < $all_block_num) {
            ?>
            <li><a href="list.php?cate=<?= $cate ?>&page=<? echo $end_page+1; ?>">다음</a></li>
        <? } ?>
    </ul>

    <?php
    //푸터시작
    include "../../footer.html"; ?>
</div>
</body>
</html>
