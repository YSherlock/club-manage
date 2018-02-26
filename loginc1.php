<?php
session_start();
$sno = $_REQUEST['sno'];
$password = $_REQUEST['password'];

$con = mysql_connect("localhost","root","123456");
mysql_select_db("clubs",$con);
$sql = "select * from user where sno='{$sno}'";
$result = mysql_query($sql); 
$num = mysql_num_rows($result);
if($num)
{
    $_SESSION['sno'] = $sno;
    header("location:http://localhost:8080/club/main.php");

}else{

}
?>