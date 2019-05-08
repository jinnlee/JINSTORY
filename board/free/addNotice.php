<?php
include "../../dbconnect.php";

// if($conn){
//   echo "성공";
// }else {
//   echo "실패";
// }

// QnA게시판 게시글 추가하기
$dateTime = date_create('now')->format('Y-m-d H:i:s');

$sql = "
    INSERT INTO NOTICE
    (user_id, user_name, qna_title, qna_pass, qna_memo, qna_created)
    VALUES(
    'lje8888',
    '이지은',
    '기타문의:)',
    '1111',
    '',
    '$dateTime'
    )
    ";

$sql1 = "
    INSERT INTO NOTICE
    (user_id, user_name, qna_title, qna_pass, qna_memo, qna_created)
    VALUES(
    'sunghee',
    '조성희',
    '배송문의:)',
    '1111',
    '옷이 안와요ㅠ',
    '$dateTime'
    )
    ";

$sql2 = "
    INSERT INTO NOTICE
    (user_id, user_name, qna_title, qna_pass, qna_memo, qna_created)
    VALUES(
    'yoonseo',
    '최윤서',
    '상품문의:)',
    '1111',
    '옷이 이상해요',
    '$dateTime'
    )
    ";

$sql3 = "
    INSERT INTO NOTICE
    (user_id, user_name, qna_title, qna_pass, qna_memo, qna_created)
    VALUES(
    'suhee',
    '석수희',
    '배송문의:)',
    '1111',
    '옷이 안와요ㅠ',
    '$dateTime'
    )
    ";

$sql4 = "
    INSERT INTO NOTICE
    (user_id, user_name, qna_title, qna_pass, qna_memo, qna_created)
    VALUES(
    'lyeonghee',
    '권령희',
    '재입고문의:)',
    '1111',
    '옷이 언제쯤 입고 되나요?',
    '$dateTime'
    )
    ";

$sql5 = "
    INSERT INTO NOTICE
    (user_id, user_name, qna_title, qna_pass, qna_memo, qna_created)
    VALUES(
    'sophia',
    '남소연',
    '교환환불문의:)',
    '1111',
    '환불해주세요',
    '$dateTime'
    )
    ";

$sql6 = "
    INSERT INTO NOTICE
    (user_id, user_name, qna_title, qna_pass, qna_memo, qna_created)
    VALUES(
    'thfk8760',
    '박소라',
    '배송문의:)',
    '1111',
    '옷이 안와요ㅠ',
    '$dateTime'
    )
    ";


//$result = mysqli_query($conn,$sql);

//for($count=0; $count<1000; $count++){
//    $result = mysqli_query($conn,$sql);
//    $result1 = mysqli_query($conn,$sql1);
//    $result2 = mysqli_query($conn,$sql2);
//    $result3 = mysqli_query($conn,$sql3);
//    $result4 = mysqli_query($conn,$sql4);
//    $result5 = mysqli_query($conn,$sql5);
//    $result6 = mysqli_query($conn,$sql6);
//}

if($result === false && $result1 === false && $result2 === false && $result3 === false && $result4 === false && $result5 === false && $result6 === false){
    echo " QnA 게시물 저장 실패";
}else{
    echo " QnA 게시물 저장 성공";
}
?>
