<?php
session_start();
$aback = $_REQUEST['aback'];
$ano = $_REQUEST['ano'];
$sno = $_SESSION['sno'];

$con = mysql_connect("localhost","root","123456");
mysql_select_db("clubs",$con);
$sqls = "update takepart set aback='$aback' where sno='$sno'";
// var_dump($sqls);
if(mysql_query($sqls)){
    echo"ok";
}else{
    echo"no";
}
?>