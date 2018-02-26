<?php
session_start();
$cno = $_REQUEST['cno'];
$sno = $_SESSION['sno'];


$con = mysql_connect("localhost","root","123456");
mysql_select_db("clubs",$con);
$sql1 = "select cno from student where sno=$sno";
$result = mysql_query($sql1);
$row = mysql_fetch_array($result);
if(!$row[0]){
// $sqls = "update student set cno=$cno where sno=$sno";
// $sql2 = "update student set rno='1' where sno=$sno";
// $result1 = mysql_query($sql2);
// if(mysql_query($sqls)){
    $sql3 = "insert into request values('$sno','$cno')";
    $result1 = mysql_query($sql3);
    echo"ok";
// }else{
    // echo"no";
}
else{
    echo"no";
}
?>