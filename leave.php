<?php
session_unset();//free all session variable
session_destroy();//销毁一个会话中的全部数据
header('location:http://localhost:8080/club/login.html');
?>