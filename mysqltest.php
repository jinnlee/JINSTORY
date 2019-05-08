<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>MySql-PHP TEST</title>
</head>
<body>

<?php
echo "MySql TEST<br>";

$db = mysql_connect("localhost", "root", "wl5630", "world");

if($db){
    echo "connect : success<br>";
}
else{
    echo "disconnect : fail<br>";
}

?>

</body>
</html>

