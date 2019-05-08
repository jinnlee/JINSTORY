<?php

//DB 연결하기
include "../dbconnect.php";

if ($conn) {
    echo "성공";
} else {
    echo "실패";
}

// QnA게시판 게시글 추가하기
$sql0 = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
    VALUES(
    'lje8888',
    '더블버튼 플레어 롱 원피스',
    '하객룩으로 강추드려요 :) 러블리 여신원피스♥',
    'dress',
    'general',
    '50000',
    '39000',
    '2500',
    '1.jpg',
    '',
    ''
    )
    ";

$sql1 = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
    VALUES(
    'lje8888',
    '미니 코튼 크롭 자켓',
    '깔끔하고 스타일리쉬한 버튼 크롭 자켓',
    'outer',
    'general',
    '40000',
    '29000',
    '2500',
    '2.gif',
    '',
    ''
    )
    ";

$sql2 = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
    VALUES(
    'lje8888',
    '프레쉬 언발 스트라이프 셔츠',
    '퀄리티 높은 소재와 깔끔한 디자인의 루즈핏 스트라이프 셔츠!',
    'top',
    'general',
    '50000',
    '39000',
    '2500',
    '3.jpg',
    '',
    ''
    )
    ";

$sql3 = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
    VALUES(
    'lje8888',
    '도트 레이스 시스루 블라우스',
    '레이어드는 물론 단품으로도 정말 예뻐요!',
    'top',
    'general',
    '30000',
    '15000',
    '2500',
    '4.gif',
    '',
    ''
    )
    ";

$sql4 = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
    VALUES(
    'lje8888',
    '유리엘 원피스',
    '화사한 컬러감과 패턴으로 지금부터 입기 딱! 좋은 쉬폰원피스',
    'dress',
    'general',
    '70000',
    '56000',
    '2500',
    '5.gif',
    '',
    ''
    )
    ";

$sql5 = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
    VALUES(
    'lje8888',
    '나탈리옆트임 트렌치코트',
    '클래식한 트렌치와는 또 다른! 스타일리시하게 연출 가능한 트렌치코트',
    'outer',
    'general',
    '250000',
    '119000',
    '2500',
    '6.gif',
    '',
    ''
    )
    ";

$sql6 = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
    VALUES(
    'lje8888',
    '니트 밴딩 플리츠 스커트',
    '차르르 떨어지는 플리츠 라인이 우아한 롱스커트',
    'bottom',
    'general',
    '46700',
    '21000',
    '2500',
    '7.jpg',
    '',
    ''
    )
    ";

$sql7 = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
    VALUES(
    'lje8888',
    '생크림 데님치마바지',
    '깨끗한 화이트 컬러와 같은 원단의 팬츠가 안감으로 있어 더욱 입기 좋은 스커트!',
    'bottom',
    'general',
    '40000',
    '32000',
    '2500',
    '8.gif',
    '',
    ''
    )
    ";

$sql8 = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
    VALUES(
    'lje8888',
    '슬림트임 스트라이프티셔츠',
    '어깨 트임으로 사랑스러운 포인트와 여리여리함을 어필해 줄 스트라이프 티셔츠',
    'top',
    'general',
    '40000',
    '34000',
    '2500',
    '9.gif',
    '',
    ''
    )
    ";

$sql9 = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
    VALUES(
    'lje8888',
    '클린퓨어 섀틴스커트',
    '360도 허리 밴딩, 언발 길이감, 섀틴처럼 약간의 광택이 도는 엣지있는 스커트',
    'bottom',
    'general',
    '40000',
    '28000',
    '2500',
    '10.gif',
    '',
    ''
    )
    ";

$sql10 = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
    VALUES(
    'lje8888',
    '우디 린넨자켓',
    '단독 혹은 세트로! 지금부터 활용도 백점만점인 린넨자켓',
    'outer',
    'general',
    '80000',
    '68000',
    '2500',
    '11.gif',
    '',
    ''
    )
    ";

$sql11 = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
    VALUES(
    'lje8888',
    '파리지앵 배색맨투맨',
    '네이비에 레드 포인트! 유니크한 레터링으로 스트릿 감성 물씬 파리지앵 맨투맨',
    'top',
    'general',
    '50000',
    '32000',
    '2500',
    '12.gif',
    '',
    ''
    )
    ";

$sql12 = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
    VALUES(
    'lje8888',
    '브이넥 레이온 반팔 T셔츠',
    '차르르 떨어지는 부드러운 원단의 브이넥 티셔츠',
    'top',
    'general',
    '12000',
    '7500',
    '2500',
    '13.gif',
    '',
    ''
    )
    ";

$sql13 = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
    VALUES(
    'lje8888',
    '브러쉬 데님원피스',
    '포인트 골드 단추와 다양한 이너 아이템으로 색다른 느낌을 주는 멜빵 데님 원피스',
    'dress',
    'general',
    '60000',
    '48000',
    '2500',
    '14.gif',
    '',
    ''
    )
    ";
//
//$result = mysqli_query($conn,$sql);

//for ($count = 0; $count < 100; $count++) {
////    for ($count1 = 0; $count1 <= 13; $count1++) {
////        $result . $count1 = mysqli_query($conn, $sql . $count1);
//    $result0 = mysqli_query($conn, $sql0);
//    $result1 = mysqli_query($conn, $sql1);
//    $result2 = mysqli_query($conn, $sql2);
//    $result3 = mysqli_query($conn, $sql3);
//    $result4 = mysqli_query($conn, $sql4);
//    $result5 = mysqli_query($conn, $sql5);
//    $result6 = mysqli_query($conn, $sql6);
//    $result7 = mysqli_query($conn, $sql7);
//    $result8 = mysqli_query($conn, $sql8);
//    $result9 = mysqli_query($conn, $sql9);
//    $result10 = mysqli_query($conn, $sql10);
//    $result11 = mysqli_query($conn, $sql11);
//    $result12 = mysqli_query($conn, $sql12);
//    $result13 = mysqli_query($conn, $sql13);
//    //}
//}


echo $result0;
if ($result0 === false && $result1 === false && $result2 === false && $result3 === false && $result4 === false && $result5 === false && $result6 === false) {
    echo " 게시물 저장 실패";
} else {
    echo " 게시물 저장 성공";
}

?>
