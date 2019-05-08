<?php
// 세션시작
session_start();

//DB 연결하기
include "../dbconnect.php";

switch ($_GET['mode']) {
    case 'insert':

        // '".$_POST['product_name']."',
        //     '".$_POST['reference']."',
        //     '".$_POST['cate']."',
        //     '".$_POST['type']."',
        //     '".$_POST['priced']."',
        //     '".$_POST['selling_price']."',
        //     '".$_POST['delivery_fee']."',
        //     '".$_FILES['image_list']['name']."',
        //     '".$_FILES['image_contents']['name']."',
        //     '".$_POST['product_desc']."'
        //     )
        //     ";
//입력 값 검사
        if (trim($_POST['product_name']) == "") {
            echo "<script>alert('상품명을 입력해 주세요.'); history.back(); </script>";
        }
        if (trim($_POST['reference']) == "") {
            echo "<script>alert('상품소개글을 입력해주세요.'); history.back(); </script>";
        }
        if (trim($_POST['priced']) == "") {
            echo "<script>alert('상품가격을 입력해 주세요.'); history.back(); </script>";
        }
        if (!is_numeric($_POST['priced'])) {
            echo "<script>alert('상품가격을 숫자로 입력해 주세요.'); history.back(); </script>";
        }
        if (trim($_POST['selling_price']) == "") {
            echo "<script>alert('상품할인가격을 입력해 주세요.'); history.back(); </script>";
        }
        if (!is_numeric($_POST['selling_price'])) {
            echo "<script>alert('상품할인가격을 숫자로 입력해 주세요.'); history.back(); </script>";
        }
        if (trim($_POST['delivery_fee']) == "") {
            echo "<script>alert('배송비를 입력해 주세요.'); history.back(); </script>";
        }
        if (!is_numeric($_POST['delivery_fee'])) {
            echo "<script>alert('배송비를 숫자로 입력해 주세요.'); history.back(); </script>";
        }

        // 상품대표이미지
        // 파일용량확인
        if ($_FILES['image_list']['name']) {
            $size = $_FILES['image_list']['size'];
            // 2MB = 2097152 Byte
            if ($size > 2097152) {
                echo "<script>alert('파일용량은 2MB로 제한합니다.'); history.back(); </script>";
            }
            $image_list_name = strtolower($_FILES['image_list']['name']);  // 파일명과 확장자를 소문자로 변경
            $image_list_split = explode(".", $image_list_name); //파일명과 확장자를 분리(. 기준으로)
            $explode1 = $image_list_split[count($image_list_split) - 2.3]; //파일명만 가져오기
            $image_list_type = $image_list_split[count($image_list_split) - 1]; //확장자만 가져오기

            //파일체크
            $img_type = array('jpg', 'jpeg', 'gif', 'png'); //이미지 확장자 종류를 배열에 넣는다
            if (array_search($image_list_type, $img_type) === false) { //배열 검색 : 내가 가지고 오려는 파일확장자, 허용할 수 있는 확장자
                echo "<script>alert('이미지 파일이 아닙니다.'); history.back(); </script>";
            }
            //파일 중복 저장 방지
            $regate = date("mdhis", time()); //날짜 (월, 일, 시, 분, 초)
            $newFileName_list = chr(rand(97, 122)) . chr(rand(97, 122)) . $regate . rand(1, 9) . rand(1, 9) . "." . $image_list_type;  //파일명 생성
            $dir = "./image/"; //업로드할 디렉터리 지정
            move_uploaded_file($_FILES['image_list']['tmp_name'], $dir . $newFileName_list); //파일올리기 ([파일 이름][임시경로],파일경로. 실제파일이름
            //  파일을 저장할 때는 임시파일 경로가 필요!
            chmod($dir . $newFileName_list, 0777);
            //  chmod : 파일 사용권한
            // 0777 : 최고 권한 (읽기, 쓰기가 가능)
        } else {
            echo "<script>alert('상품 대표이미지를 등록해주세요.'); history.back(); </script>";
        }

        // 상품상세이미지
        // 파일용량확인
        if ($_FILES['image_contents']['name']) {
            $size = $_FILES['image_contents']['size'];
            // 2MB = 2097152 Byte
            if ($size > 2097152) {
                echo "<script>alert('파일용량은 2MB로 제한합니다.'); history.back();</script>";
            }
            $image_contents_name = strtolower($_FILES['image_contents']['name']);  // 파일명과 확장자를 소문자로 변경
            $image_contents_split = explode(".", $image_contents_name); //파일명과 확장자를 분리(. 기준으로)
            $explode2 = $image_contents_split[count($image_contents_split) - 2.3]; //파일명만 가져오기
            $image_contents_type = $image_contents_split[count($image_contents_split) - 1]; //확장자만 가져오기

            //파일체크
            $img_type = array('jpg', 'jpeg', 'gif', 'png'); //이미지 확장자 종류를 배열에 넣는다
            if (array_search($image_contents_type, $img_type) === false) { //배열 검색 : 내가 가지고 오려는 파일확장자, 허용할 수 있는 확장자
                echo "<script>alert('이미지 파일이 아닙니다.'); history.back(); </script>";
            }
            //파일 중복 저장 방지
            $regate = date("mdhis", time()); //날짜 (월, 일, 시, 분, 초)
            $newFileName_contents = chr(rand(97, 122)) . chr(rand(97, 122)) . $regate . rand(1, 9) . rand(1, 9) . "." . $image_contents_type;  //파일명 생성
            $dir = "./image/"; //업로드할 디렉터리 지정
            move_uploaded_file($_FILES['image_contents']['tmp_name'], $dir . $newFileName_contents); //파일올리기 ([파일 이름][임시경로],파일경로. 실제파일이름
            //  파일을 저장할 때는 임시파일 경로가 필요!
            chmod($dir . $newFileName_contents, 0777);
            //  chmod : 파일 사용권한
            // 0777 : 최고 권한 (읽기, 쓰기가 가능)
        }

        $sql = "
        INSERT INTO product_board
        (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
        VALUES(
        '" . $_SESSION['user_id'] . "',
        '" . $_POST['product_name'] . "',
        '" . $_POST['reference'] . "',
        '" . $_POST['cate'] . "',
        '" . $_POST['product_type'] . "',
        '" . $_POST['priced'] . "',
        '" . $_POST['selling_price'] . "',
        '" . $_POST['delivery_fee'] . "',
        '" . $newFileName_list . "',
        '" . $newFileName_contents . "',
        '" . $_POST['product_desc'] . "'
        )
        ";

//         if($sql){
//           echo "sql성공";
//       }else {
//           echo "sql실패";
//       }

        $result = mysqli_query($conn, $sql);

//    // echo "hi1";
        if ($result === false) {
            echo "<script>alert('저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.'); history.back(); </script>";
            error_log(mysqli_error($conn));
        } else {
            // echo "<script>alert('상품이 등록되었습니다.'); </script>";
            echo "<script>alert('상품이 등록되었습니다.'); location.replace('/product/admin_product_list.php'); </script>)";
            // header("Location:list.php");
        }
        break;
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    case 'delete':
        //작성자와 로그인한 유저가 다르다면 권한이 없다고 알리고 돌아감
        if ($_POST['writer'] != $_SESSION['user_id']) {
            echo "<script>alert('권한이 없습니다.'); history.back(); </script>";
        }

        $query = "SELECT * FROM product_board WHERE no = '$_POST[board_no]' and user_id='$_SESSION[user_id]'";
        $result = mysqli_query($conn, $query);
        if ($result === false) {
            echo $query;
            echo "<script>alert('상품정보를 불러오는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.'); history.back(); </script>";
            error_log(mysqli_error($conn));
            exit;
        }
        $row = mysqli_fetch_assoc($result);
// 상품 대표이미지 첨부파일 지우기
        if ($row['image_list']) {
            $del_file = './image/' . $row['image_list'];
            // 첨부파일이 있다면, image 폴더에서 해당 파일 삭제시키기
            if ($row['image_list'] && is_file($del_file)) {
                unlink($del_file);
            }
        }
// 상품 상세이미지 첨부파일 지우기
        if ($row['image_contents']) {
            $del_file = './image/' . $row['image_contents'];
            // 첨부파일이 있다면, image 폴더에서 해당 파일 삭제시키기
            if ($row['image_contents'] && is_file($del_file)) {
                unlink($del_file);
            }
        }

        $query = "DELETE FROM product_board WHERE no = " . $_POST['board_no'];
//        ." and user_id=".$_SESSION['user_id']
        $result = mysqli_query($conn, $query);
        if ($result === false) {
            echo $query;
            echo "<script>alert('상품정보를 삭제하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.'); history.back(); </script>";
            error_log(mysqli_error($conn));
            exit;
        }
        header("Location:/product/admin_product_list.php");
        break;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    case
    'modify':

        //입력 값 검사
        if (trim($_POST['product_name']) == "") {
            echo "<script>alert('상품명을 입력해 주세요.'); history.back(); </script>";
        }
        if (trim($_POST['reference']) == "") {
            echo "<script>alert('상품소개글을 입력해주세요.'); history.back(); </script>";
        }
        if (trim($_POST['priced']) == "") {
            echo "<script>alert('상품가격을 입력해 주세요.'); history.back(); </script>";
        }
        if (!is_numeric($_POST['priced'])) {
            echo "<script>alert('상품가격을 숫자로 입력해 주세요.'); history.back(); </script>";
        }
        if (trim($_POST['selling_price']) == "") {
            echo "<script>alert('상품할인가격을 입력해 주세요.'); history.back(); </script>";
        }
        if (!is_numeric($_POST['selling_price'])) {
            echo "<script>alert('상품할인가격을 숫자로 입력해 주세요.'); history.back(); </script>";
        }
        if (trim($_POST['delivery_fee']) == "") {
            echo "<script>alert('배송비를 입력해 주세요.'); history.back(); </script>";
        }
        if (!is_numeric($_POST['delivery_fee'])) {
            echo "<script>alert('배송비를 숫자로 입력해 주세요.'); history.back(); </script>";
        }

        // 상품대표이미지
        // 파일용량확인
        if ($_FILES['image_list']['name']) {
            $size = $_FILES['image_list']['size'];
            // 2MB = 2097152 Byte
            if ($size > 2097152) {
                echo "<script>alert('파일용량은 2MB로 제한합니다.'); history.back(); </script>";
            }
            $image_list_name = strtolower($_FILES['image_list']['name']);  // 파일명과 확장자를 소문자로 변경
            $image_list_split = explode(".", $image_list_name); //파일명과 확장자를 분리(. 기준으로)
            $explode1 = $image_list_split[count($image_list_split) - 2.3]; //파일명만 가져오기
            $image_list_type = $image_list_split[count($image_list_split) - 1]; //확장자만 가져오기

            //파일체크
            $img_type = array('jpg', 'jpeg', 'gif', 'png'); //이미지 확장자 종류를 배열에 넣는다
            if (array_search($image_list_type, $img_type) === false) { //배열 검색 : 내가 가지고 오려는 파일확장자, 허용할 수 있는 확장자
                echo "<script>alert('이미지 파일이 아닙니다.'); history.back(); </script>";
            }
            //파일 중복 저장 방지
            $regate = date("mdhis", time()); //날짜 (월, 일, 시, 분, 초)
            $newFileName_list = chr(rand(97, 122)) . chr(rand(97, 122)) . $regate . rand(1, 9) . rand(1, 9) . "." . $image_list_type;  //파일명 생성
            $dir = "./image/"; //업로드할 디렉터리 지정
            move_uploaded_file($_FILES['image_list']['tmp_name'], $dir . $newFileName_list); //파일올리기 ([파일 이름][임시경로],파일경로. 실제파일이름
            //  파일을 저장할 때는 임시파일 경로가 필요!
            chmod($dir . $newFileName_list, 0777);
            //  chmod : 파일 사용권한
            // 0777 : 최고 권한 (읽기, 쓰기가 가능)
        } else {
            echo "<script>alert('상품 대표이미지를 등록해주세요.'); history.back(); </script>";
        }

        // 상품상세이미지
        // 파일용량확인
        if ($_FILES['image_contents']['name']) {
            $size = $_FILES['image_contents']['size'];
            // 2MB = 2097152 Byte
            if ($size > 2097152) {
                echo "<script>alert('파일용량은 2MB로 제한합니다.'); history.back();</script>";
            }
            $image_contents_name = strtolower($_FILES['image_contents']['name']);  // 파일명과 확장자를 소문자로 변경
            $image_contents_split = explode(".", $image_contents_name); //파일명과 확장자를 분리(. 기준으로)
            $explode2 = $image_contents_split[count($image_contents_split) - 2.3]; //파일명만 가져오기
            $image_contents_type = $image_contents_split[count($image_contents_split) - 1]; //확장자만 가져오기

            //파일체크
            $img_type = array('jpg', 'jpeg', 'gif', 'png'); //이미지 확장자 종류를 배열에 넣는다
            if (array_search($image_contents_type, $img_type) === false) { //배열 검색 : 내가 가지고 오려는 파일확장자, 허용할 수 있는 확장자
                echo "<script>alert('이미지 파일이 아닙니다.'); history.back(); </script>";
            }
            //파일 중복 저장 방지
            $regate = date("mdhis", time()); //날짜 (월, 일, 시, 분, 초)
            $newFileName_contents = chr(rand(97, 122)) . chr(rand(97, 122)) . $regate . rand(1, 9) . rand(1, 9) . "." . $image_contents_type;  //파일명 생성
            $dir = "./image/"; //업로드할 디렉터리 지정
            move_uploaded_file($_FILES['image_contents']['tmp_name'], $dir . $newFileName_contents); //파일올리기 ([파일 이름][임시경로],파일경로. 실제파일이름
            //  파일을 저장할 때는 임시파일 경로가 필요!
            chmod($dir . $newFileName_contents, 0777);
            //  chmod : 파일 사용권한
            // 0777 : 최고 권한 (읽기, 쓰기가 가능)
        }

//        $sql = "
//        INSERT INTO product_board
//        (user_id, product_name, reference, cate, product_type, priced, selling_price, delivery_fee, image_list,image_contents,product_desc)
//        VALUES(
//        '" . $_SESSION['user_id'] . "',
//        '" . $_POST['product_name'] . "',
//        '" . $_POST['reference'] . "',
//        '" . $_POST['cate'] . "',
//        '" . $_POST['product_type'] . "',
//        '" . $_POST['priced'] . "',
//        '" . $_POST['selling_price'] . "',
//        '" . $_POST['delivery_fee'] . "',
//        '" . $newFileName_list . "',
//        '" . $newFileName_contents . "',
//        '" . $_POST['product_desc'] . "'
//        )
//        ";
        $query = "UPDATE product_board SET product_name = '" . $_POST['product_name'] . "', reference = '" . $_POST['reference'] . "', cate = '" . $_POST['cate'] . "'
        , product_type = '" . $_POST['product_type'] . "', priced = '" . $_POST['priced'] . "', selling_price = '" . $_POST['selling_price'] . "', delivery_fee = '" . $_POST['delivery_fee'] . "', image_list = '$newFileName_list', image_contents = '$newFileName_contents', product_desc = '" . $_POST['product_desc'] . "' WHERE no =" . $_POST['board_no'];


//         if($sql){
//           echo "sql성공";
//       }else {
//           echo "sql실패";
//       }

        $result = mysqli_query($conn, $sql);

//    // echo "hi1";
        if ($result === false) {
            echo "<script>alert('저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.'); history.back(); </script>";
            error_log(mysqli_error($conn));
        } else {
            echo "<script>alert('상품이 등록되었습니다.'); location.replace('/product/admin_product_list.php'); </script>)";
        }
        break;
}
?>
