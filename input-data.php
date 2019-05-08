<?php

//DB 연결하기
include "dbconnect.php";

$sql = "
    INSERT INTO product_board
    (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list, image_contents, product_desc)
    VALUES(
    'lje8888',
    '',
    '".$_POST['board_title']."',
    '".$_POST['board_pass']."',
    '".$_POST['board_memo']."',
    '$dateTime'
    )
    ";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);

?>
