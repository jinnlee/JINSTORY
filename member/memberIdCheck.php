<?php

//DB 연결하기
include "../dbconnect.php";

    $memberId = $_POST['user_id'];

    $sql = "SELECT * FROM user_info WHERE user_id = '{$memberId}'";

    $res = $dbConnect->query($sql);


    if($res->num_rows >= 1){
        echo json_encode(array('res'=>'bad'));
    }else{
        echo json_encode(array('res'=>'good'));
    }

?>
