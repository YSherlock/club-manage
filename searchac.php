<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <title>活动列表</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
            <form action="searchac.php" method="get">
                <div class="search-item">
                    <label for="">活动名</label>
                    <input class="form-control" type="text" name="cname">
                </div>

                <button type="submit" class="btn btn-primary btn-sm" style="margin: 7.5px 0;">搜索</button>
            </form>
            </div>

            <?php
            $aname = $_REQUEST['aname'];
            $id = $_REQUEST['id'];
            $con = mysql_connect("localhost","root","123456");
            if(!$con)
            {
                die("could not connect");
            }

            mysql_select_db("clubs",$con);
            $sq = "select * from activity where aname='{$aname}'";
            $result = mysql_query($sq);
            echo "<table class='table' style='background: #fff;'>
            <thead>
            <tr>
            <th>编号</th>
            <th>活动名</th>
            <th>时间</th>
            <th>操作</th>
            </tr>
            </thead>

            <tbody>";
            $sno = $_SESSION['sno'];
            $con = mysql_connect("localhost","root","123456");
                    mysql_select_db("clubs",$con);
            $sql = "select rno from student where sno='{$sno}'";
            $results = mysql_query($sql);
            $row = mysql_fetch_array($results);
            while($row = mysql_fetch_array($result)){
                echo"<tr>";
                echo"<td>" .$row['ano']. "</td>" ;
                echo"<td>" .$row['aname']. "</td>" ;
                echo"<td>" .$row['adate']. "</td>" ;
                echo"<td>";
                if($row[0] == 1 || $row[0] == 2){
                    echo"<a href='javascript:;' class='' >参加</a>";
                }
                
                echo"</td>" ;
            }
            echo "</tbody>";
            ?>
        </div>
        </div>

        <?php
        echo"
        <script src='js/jquery-3.2.1.min.js'></script>
        <script src='js/main.js'></script>
        <script src='js/sweetalert.min.js'></script>"
        ?>



    </body>

</html>