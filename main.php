<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <title>社团列表</title>
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
                <a href="http://localhost:8080/club/main.php"><li  class="active">社团列表</li></a>

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
                echo'<a href="http://localhost:8080/club/request.php"><li>申请列表</li></a>';
                }
                ?>
            </ul>
        </div>
            
        <div class="main">
        <div class="main_content">
            <div class="search">
            <form action="search.php" method="get">
                <div class="search-item">
                    <label for="">社团名</label>
                    <input class="form-control" type="text" name="cname">
                </div>

                <button type="submit" class="btn btn-primary btn-sm" style="margin: 7.5px 0;">搜索</button>

                <button type="button" class="btn btn-primary btn-sm add_club" style="float:right;margin: 7.5px 10px;">新建社团</button>
            </form>
            </div>

            <?php
            $con = mysql_connect("localhost","root","123456");
            if(!$con)
            {
                die("could not connect");
            }

            mysql_select_db("clubs",$con);

            $result = mysql_query("select * from club,student where club.sno=student.sno order by club.cno");

            echo "<table class='table' style='background: #fff;'>
            <thead>
            <tr>
            <th>社团号</th>
            <th>社团名</th>
            <th>宗旨</th>
            <th>成立时间</th>
            <th>创始人</th>
            <th>操作</th>
            </tr>
            </thead>

            <tbody>";
            while($row = mysql_fetch_array($result)){
                echo"<tr>";
                echo"<td>" .$row['cno']. "</td>" ;
                echo"<td>" .$row['cname']. "</td>" ;
                echo"<td>" .$row['ccontent']. "</td>" ;
                echo"<td>" .$row['cdate']. "</td>" ;
                echo"<td>" .$row['sname']. "</td>" ;
                echo"<td><a href='javascript:;' class='join-club'>加入</a><a href='javascript:;' class='detail' data-id='" .$row['cno']. "' style='margin-left: 20px;'>查看活动</a></td>" ;
            }
            echo "</tbody>";
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