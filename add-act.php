<?php
session_start();
$ano = $_REQUEST['ano'];
$cno = $_REQUEST['cno'];
$sno = $_SESSION['sno'];


$con = mysql_connect("localhost","root","123456");
mysql_select_db("clubs",$con);
$sql1 = "select cno from student where sno=$sno";
$result = mysql_query($sql1); 
$row = mysql_fetch_array($result);
if($row[0] == $cno){
$sqls = "insert into takepart values ('{$sno}','{$ano}','')";
if(mysql_query($sqls)){
    echo"ok";
}else{
    echo"no";
}
}else{
    echo"no";
}
?>