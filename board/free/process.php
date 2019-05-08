<?php

//DB 연결하기
include "../../dbconnect.php";


// echo $_POST['user_id'];
// echo $_POST['user_name'];
// echo $_POST['board_title'];
// echo $_POST['board_pass'];
// echo $_POST['board_memo'];
// echo date('Y-m-d');


// if($conn){
//   echo "성공";
// }else {
//   echo "실패";
// }

// '{$_POST['user_id']}'
//     '{$_POST['user_name']}'
//     '{$_POST['board_title']}',
//     '{$_POST['board_pass']}',
//     '{$_POST['board_memo']}',

switch($_GET['mode']){
    case 'insert':

    $dateTime = date_create('now')->format('Y-m-d H:i:s');

    $sql = "
    INSERT INTO QnA
    (user_id, user_name, qna_title, qna_pass, qna_memo, qna_created)
    VALUES(
    '".$_POST['user_id']."',
    '".$_POST['user_name']."',
    '".$_POST['board_title']."',
    '".$_POST['board_pass']."',
    '".$_POST['board_memo']."',
    '$dateTime'
    )
    ";

// if($sql){
//   echo "sql성공";
// }else {
//   echo "sql실패";
// }

    $result = mysqli_query($conn,$sql);
// header('Location:list.php?boardName=Q&A');
    // // $sql = "
    // // insert into QnA set
    // // user_id = '$_POST['user_id']',
    // // user_name = '$_POST['user_name']'
    // // qna_title = '$_POST['board_title']',
    // // qna_pass = '$_POST['board_pass']',S
    // // qna_memo = '$_POST['board_memo']',
    // // qna_created = date('Y-m-d',time()),
    // // ";
    // $result = mysqli_query("INSERT INTO QnA (user_id, user_name, qna_title, qna_pass, qna_memo, qna_created) VALUES ('$_POST['user_id']', '$_POST['user_name']', '$_POST['qna_title']','$_POST['qna_pass']','$_POST['qna_memo']',now())");

    // echo "hi1";
    // // $result = mysqli_query($conn, $sql);
    if($result === false){
        echo "<script>alert('저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.'); history.back(); </script>";
    }
    header("Location:list.php?boardName=Q&A");
    break;
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    case 'delete':
    $query = "DELETE FROM QnA WHERE no = ".$_POST['board_no'];
    $result=mysqli_query($conn, $query);
    if($result === false){
        echo $query;
        echo "<script>alert('저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.'); history.back(); </script>";
        error_log(mysqli_error($conn));
    }
    header("Location:list.php?boardName=Q&A");
    break;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    case 'modify':
     $query = "UPDATE QnA SET qna_title = '".$_POST['qna_title']."', qna_memo = '".$_POST['qna_memo']."' WHERE no =".$_POST['board_no'];
     $result=mysqli_query($conn, $query);
     echo $query;
     if($result === false){
        echo "<script>alert('저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.'); history.back(); </script>";
        error_log(mysqli_error($conn));
    }
    header("Location: read.php?board_no=".$_POST['board_no']);
    break;
}
?>
