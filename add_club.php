<?php
session_start();
$sno = $_SESSION['sno'];
$cname = $_REQUEST['cname'];
$ccontent = $_REQUEST['ccontent'];
$cno = $_REQUEST['cno'];
$cdate = date("Ymd");

$con = mysql_connect("localhost","root","123456");
mysql_select_db("clubs",$con);
$sql = "insert into club values ('{$cno}','{$cname}','{$ccontent}','{$cdate}','{$sno}')";
$sqls = "update student set cno = '{$cno}' where sno={$sno}";
$sqlst = "update student set rno = '2' where sno={$sno}";
$result = mysql_query($sql); 
$results = mysql_query($sqls);
$resultst = mysql_query($sqlst);
echo"ok";
?>