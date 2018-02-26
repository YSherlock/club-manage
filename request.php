<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <title>申请列表</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/layer/mobile/need/layer.css">
    <link rel="stylesheet" href="css/sweetalert.css">
    <link rel="stylesheet" href="css/main.css">
    
    
    <script>
        var CONST = {
           
        };
    </script>
    </head>
    <body>
        <div class="top">
            <div class="logo" style="width:150px;height:30px;float: left;margin-left: 50px;">
                <img src="img/logo.png" alt="" style="width:150px;height:30px;margin: 10px 0;">
            </div>

            <div class="leave"><p>退出登录</p></div>
            <div class="username"><p>
                <?php
                    session_start();
                    $sno = $_SESSION['sno'];
                    $con = mysql_connect("localhost","root","123456");
                    mysql_select_db("clubs",$con);
                    $sql = "select sname from student where sno='{$sno}'";
                    $result = mysql_query($sql); 
                    $row = mysql_fetch_array($result);
                    echo"$row[0]";
                ?>
            </p></div>
        </div>

        <div class="left_nav">
            <ul>
                <a href="http://localhost:8080/club/main.php"><li>社团列表</li></a>

                <?php
                $sno = $_SESSION['sno'];
                $con = mysql_connect("localhost","root","123456");
                mysql_select_db("clubs",$con);
                $sql = "select ano from takepart where sno='{$sno}'";
                if(mysql_query($sql)){
                echo'<a href="http://localhost:8080/club/active.php"><li>已参加活动列表</li></a>';
                }
                ?>

                <?php
                $sno = $_SESSION['sno'];
                $con = mysql_connect("localhost","root","123456");
                mysql_select_db("clubs",$con);
                $sql = "select rno from student where sno='{$sno}'";
                $result = mysql_query($sql); 
                $row = mysql_fetch_array($result);
                if($row[0] == 2){
                echo'<a href="http://localhost:8080/club/request.php"><li  class="active">申请列表</li></a>';
                }
                ?>
            </ul>
        </div>
            
        <div class="main">
        <div class="main_content">
            

            <?php
            $con = mysql_connect("localhost","root","123456");
            if(!$con)
            {
                die("could not connect");
            }
            mysql_select_db("clubs",$con);
            $sno = $_SESSION['sno'];
            $result1 = mysql_query("select rno from student where sno=$sno");
            $row1 = mysql_fetch_array($result1);
            if($row1[0] == 2){
            $result = mysql_query("select cno from student where student.sno=$sno");
            $cnos = mysql_fetch_array($result);
            $result3 = mysql_query("select * from request where cno={$cnos['cno']}");
            echo "<table class='table' style='background: #fff;'>
            <thead>
            <tr>
            <th>学生号</th>
            <th>操作</th>
            </tr>
            </thead>

            <tbody>";
            while($row = mysql_fetch_array($result3)){
                echo"<tr>";
                echo"<td>" .$row['qno']. "</td>" ;
                echo"<td><a href='javascript:;' class='agree'>同意</a><a href='javascript:;' class='disagree'  style='margin-left: 20px;'>拒绝</a></td>" ;
            }
            echo "</tbody>";
        }
            ?>
        </div>
        </div>

        <?php
        echo"
        <script src='js/jquery-3.2.1.min.js'></script>
        <script src='css/layer/layer.js'></script>
        <script src='js/main.js'></script>
        <script src='js/sweetalert.min.js'></script>"
        ?>
    </body>

    
</html>