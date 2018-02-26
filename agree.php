<?php
session_start();
$sym = $_REQUEST['sym'];
$sno = $_REQUEST['sno'];
$isno = $_SESSION['sno'];

if($sym == 1){
$con = mysql_connect("localhost","root","123456");
mysql_select_db("clubs",$con);
$re = mysql_query("select cno from student where sno=$isno");
$cno = mysql_fetch_array($re);
$sql1 = "delete from request where qno=$sno";
if(mysql_query($sql1)){
$sqls = "update student set cno={$cno['cno']} where sno=$sno";
$sql2 = "update student set rno='1' where sno=$sno";
$result1 = mysql_query($sql2);
if(mysql_query($sqls)){
    echo"ok";
}else{

    echo"no";
}
}else{
    echo"no";
}

}else if($sym == 2){
    $con = mysql_connect("localhost","root","123456");
    mysql_select_db("clubs",$con);
    $re = mysql_query("select cno from student where sno=$isno");
    $cno = mysql_fetch_array($re);
    $sql1 = "delete from request where qno=$sno";
    if(mysql_query($sql1)){
    
        echo"ok";
    
    }else{
        echo"no";
    }
}
?>