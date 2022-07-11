<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的订单-服务订单</title>
    <style>
        body {
            background-color: #ded4d4;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }

        .head {
            display: flex;
            width: 100%;
            height: 98px;
            line-height: 20px;
            opacity: 0.9;
            background-color: rgba(217, 179, 163, 86);
            text-align: center;
            border: 1px solid rgba(187, 187, 187, 100);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
        }

        .logo_box {
            margin-top: 5px;
            width: 148px;
            height: 56px;
            margin-left: 87px;
            color: rgba(255, 255, 255, 100);
            font-size: 36px;
            text-align: left;
            font-weight: bold;
            font-family: SourceHanSansSC-bold;
        }

        .nav_box {
            margin-left: 170px;
            margin-top: 43px;
            display: inline-block;
            min-height:80px;
            list-style-type: none;
            text-decoration: none;
        }

        .message_title {
            color: white;
            font-size: 20px;
            font-weight: bolder;
        }

        .oder_title {
            color: #715C5C;
            font-size: 20px;
            font-weight: bolder;
            padding-left: 150px;
        }

        .vip_title {
            color: white;
            font-size: 20px;
            font-weight: bolder;
            padding-left: 150px;
        }

        .mem_box {
            background-color: white;
            height: 190px;
            width: 150px;
            display: block;
            border-radius: 10px;
            margin-top: 160px;
            margin-left: 100px;
            position: fixed;
            text-align: center;
        }

        .username {
            font-size: 17px;
            color: #4D2222;
            font-weight: bold;
            text-align: center;
            border-bottom: 2px solid gray;
        }

        .mem_text {
            display: block;
            font-size: 15px;
            font-weight: bolder;
            color: #a55b5b;
            margin-top: 20px;
            text-align: center;
        }

        .switch_account {
            margin-right: 35px;
            margin-left: 37px;
            text-align: center;
        }

        .myoder {
            width: 760px;
            height: 52px;
            background-color: #bbb1b1;
            margin-left: 330px;
            margin-top: 40px;
        }

        .oder_text {
            color: #4D2222;
            font-size: 18px;
            font-weight: bold;
            margin-left: 30px;
            padding-top: 15px;
        }

        .oder_box {
            width: 760px;
            height: 500px;
            background-color: white;
            margin-left: 330px;
            /*margin-top: -20px;*/
        }

        .title {
            padding-top: 30px;
            margin-left: 20px;
            display: block;
            font-weight: bold;
            font-size: 16px;
            width: 80px;
            text-align: center;
        }

        .house_title {
            color: #888585;
        }

        .service_title {
            color: #4F4545;
            padding-top: 30px;
            border-bottom: 1px solid grey;
        }

        .classify_box {
            margin-top: -115px;
            margin-left: 120px;
            font-size: 15px;
        }
        

    </style>
</head>
<body>
    
</body>
    <?php 
        include_once '../PHP/conn.php';
        $sql = "select * from tenant where tn_name = '".$_SESSION['loggedUsername']."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            $info = mysqli_fetch_array($result);//得到数组，下标为列名称
            $search = "Select service.* from service,tenant where tenant.tenant_id = service.tenant_id and tenant.tn_name = '".$_SESSION['loggedUsername']."'";
            $res = mysqli_query($conn, $search);
        }
        else{
            die("未找到有效用户！");
        }
    ?>
    <!-- 顶部功能块 -->
    <header class="head" id="head">

        <!-- logo -->
        <div class="logo_box">
        <a href="租房.php" style="color: white;"><p>租立方</p></a>
        </div>

        <!-- 顶部导航 -->
        <div class="nav_box">
            <a href="我的资料.php"><span class="message_title">我的资料</span></a>
            <span class="oder_title">我的订单</span>
            <a href="我的VIP.php"><span class="vip_title">我的VIP</span></a>
        </div>

        <!-- 头像 -->
        <?php   
            if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] <> ''){ //
        ?>
        <div class="photo">
            <a href="我的资料.php"><img src="<?php echo $info['tn_photo'] ?>" alt="some_text" width="50" height="50" style="border-radius: 50%;margin-top: 25px;margin-left: 122px;"></a>     
        </div>
        <?php
            }
            else{
        ?>  
        <div class="photo">
            <a href="我的资料.php"><img src="photo.png" alt="some_text" width="50" height="50" style="border-radius: 50%;margin-top: 25px;margin-left: 122px;"></a>     
        </div>
        <?php
            }
        ?>
    </header>

    <!-- 切换账号+退出登录 -->
    <section class="mem_box">
        <!-- 用户存在且不为空时显示头像，昵称 -->
        <?php   
            if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] <> ''){ //
        ?>
        <div>
            <a href="我的资料.php"><img src= "<?php echo $info['tn_photo'] ?>" alt="用户头像" width="75" height="75" style="border-radius: 50%;margin-top: 15px;"></a>     
        </div>
        <span class="username"><?php echo $_SESSION['loggedUsername'];?></span>
        <!-- 用户不存在 -->
        <?php
            }
            else{
        ?>   
        <div>
            <a href="我的资料.php"><img src="photo.png" alt="some_text" width="75" height="75" style="border-radius: 50%;margin-top: 15px;"></a>     
        </div>

        <span class="username">用户昵称</span>
        <?php
            }
        ?>

        <div class="mem_text">
            <a href="房客登录注册.html"><span class="switch_account">切换账号</span></a>
            <a href="../PHP/logout.php"><span class="logout">退出登录</span></a>
        </div> 
    </section>

    <!-- title -->
    <section class="myoder">
        <p class="oder_text">订单管理</p>
    </section>

    <!--我的订单-->
    <section class="oder_box">
        <div class="title">
            <a href="我的订单-房屋订单.php"><span class="house_title">房屋订单<br><br><br></span></a>
            <a href="#"><span class="service_title">服务订单</span></a>
            <div id="Layer1" style="margin-top: -113px;margin-left: 100px;position:absolute; width:1px; height:500px; z-index:1; background-color: #BBBBBB; border: 1px none #BBBBBB;"></div>
        </div>

        <div class="classify_box">
        <table border="1rpx" align="center" cellpadding="8" cellspacing="0" width="640px" height="150px" bordercolor="#BBBBBB">
            <tr align="center" height="60px" bgcolor="#A29F9F">
                <th>服务类型</th>
                <th>订单编号</th>
                <th>房屋编号</th>
                <th>下单时间</th>
                <th>实付</th>
            </tr>
            <?php
                while($ord = mysqli_fetch_array($res)){?>
            <tr align="center">
                <td><?php echo $ord['service_type']?></td>
                <td><?php echo $ord['service_id']?></td>
                <td><?php echo $ord['house_id']?></td>
                <td><?php echo $ord['time']?></td>
                <td><?php echo $ord['mony']?></td>
            </tr>
            <?php
                }
            ?>
            <!-- <tr align="center">
                <td>XXX服务</td>
                <td>XXXXX号</td>
                <td>XXXXX号</td>
                <td>XX年X月X日<br>XX:XX</td>
                <td>XXXX元</td>
            </tr> -->
            <!-- <tr align="center">
                <td>XXX服务</td>
                <td>XXXXX号</td>
                <td>XXXXX号</td>
                <td>XX年X月X日<br>XX:XX</td>
                <td>XXXX元</td>
            </tr> -->
        </table>
        </div>
        
    </section>

</html>