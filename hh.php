
<?//
//$mod = 100;
//$size = 200;
//
//echo "<table border='1' width='100%' align='center' cellpadding='0' cellspacing='0'>\n";
//echo "<tr>\n<td valign=top width=50%>\n";
//
//for($i=0;$i<$size;$i++) {
//
//   if ($i && $i%$mod==0) { echo "</td><td valign=top width=50%>\n"; }
//
//   echo "<table width=98% cellpadding=0 align=center border=0><tr>";
//   echo "<td height=30>$i</td>";
//   echo "</tr></table>\n";
//
//}
//
//echo "</td></tr></table>";
//?>

<?//
//$num_rows = 4; // 한줄에 보일 리스트 수
//$size = 10; // 데이타 수
//?>
<!--<table border="1"  align="center" cellpadding="0" cellspacing="0">-->
<!--    --><?//
//    for($i=0;$i<$size;$i++) {
//
//        $co++;
//        $mod_co = $co%$num_rows;
//
//        if ( ($i % $num_rows) == 0 ) echo "<tr>\n";
//
//        echo "<td>".$i."</td>\n";
//
//        if(($co==$size)&&$mod_co != 0) echo str_repeat("<td> </td>\n",$num_rows - $mod_co);
//
//        if($mod_co == "0") { echo "</tr>\n"; }
//        if(($co==$size)&&$mod_co != 0) echo str_repeat("</tr>\n",1);
//    }
//    ?>
<!--</table>-->

<!--<table>-->
<!--    <tr>-->
<!--        --><?//
//
//for($i=0;$i<15;$i++) {
//   if(($i%4)==0) {
//      echo   "</tr><tr>";
//   }
//   echo "<td>".$i."</td>";
//}
//?>
<!--    </tr>-->
<!--</table>-->
<!---->
<?//

$result ="테스트";
for($i=0; $i<14; $i++) {
    echo $result . $i;
}
?>
