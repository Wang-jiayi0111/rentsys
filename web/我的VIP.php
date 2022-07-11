<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的VIP</title>
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
            color: white;
            font-size: 20px;
            font-weight: bolder;
            padding-left: 150px;
        }

        .vip_title {
            color: #715C5C;
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

        .myvip {
            width: 760px;
            height: 52px;
            background-color: #bbb1b1;
            margin-left: 330px;
            margin-top: 40px;
        }

        .vip_text {
            color: #4D2222;
            font-size: 18px;
            font-weight: bold;
            margin-left: 30px;
            padding-top: 15px;
        }

        .vip_box {
            width: 760px;
            height: 670px;
            background-color: white;
            margin-left: 330px;
            /*margin-top: -20px;*/
        }

        .photo_text {
            font-size: 13px;
            font-weight: bolder;
            color: #A29F9F;
            margin-top: -73px;
            margin-left: 210px;
        }

        .open_box {
            display: flex;
            margin-left: 100px;
            margin-top: 60px;
        }

        .open_text {
            font-size: 16px;
            font-weight: bolder;
            color: black;
        }

        .pride_box {
            margin-top: -30px;
            margin-left: 110px;
            text-align: center;
        }

        .pride_text {
            font-size: 14px;
            color: black;
            font-weight: bolder;
        }

        .pride {
            font-size: 20px;
            font-weight: bold;
            color: #AC3232;
            margin-top: -8px;
            margin-bottom: 10px;
        }

        .right_box {
            display: flex;
            margin-left: 100px;
            margin-top: 60px;
        }

        .right_text {
            font-size: 16px;
            font-weight: bolder;
            color: black;
        }

        .right {
            font-size: 13px;
            color: black;
            font-weight: bolder;
            margin-left: 75px;
            margin-top: -1px;
        }

        .renew_box {
            display: flex;
            margin-left: 100px;
            margin-top: 60px;
        }

        .renew_text {
            font-size: 16px;
            font-weight: bolder;
            color: black;
        }

    </style>
</head>
<body>
    <?php 
        include_once '../PHP/conn.php';
        $sql = "select * from tenant where tn_name = '".$_SESSION['loggedUsername']."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            $info = mysqli_fetch_array($result);//得到数组，下标为列名称
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
            <a href="我的订单-房屋订单.php"><span class="oder_title">我的订单</span></a>
            <span class="vip_title">我的VIP</span>
        </div>

        <!-- 头像 -->
        <?php   
            if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] <> ''){ //
        ?>
        <div class="photo">
            <a href="我的资料."><img src="<?php echo $info['tn_photo'] ?>" alt="some_text" width="50" height="50" style="border-radius: 50%;margin-top: 25px;margin-left: 122px;"></a>     
        </div>
        <?php
            }
            else{
        ?>  
        <div class="photo">
            <a href="我的资料."><img src="photo.png" alt="some_text" width="50" height="50" style="border-radius: 50%;margin-top: 25px;margin-left: 122px;"></a>     
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
    <section class="myvip">
        <p class="vip_text">VIP服务</p>
    </section>

    <!--我的VIP-->
    <section class="vip_box">
        <img src="<?php echo $info['tn_photo'] ?>" alt="some_text" width="100" height="100" style="border-radius: 50%;margin-top: 30px; margin-left: 80px;">
        <div class="photo_text">
            <p>您还不是VIP会员</p>
            <p>开通VIP享受更多服务哦</p>
        </div>

        <hr style="border: none;background-color:gray; width: 90%;margin-top: 50px;height: 1px;">

        <div class="open_box">
            <p class="open_text">开通VIP</p>
            <div class="pride_box">
                <p class="pride_text">新人特惠每月</p>
                <p class="pride">¥15</p>
                <input type="button" name="upload_photo" value="确认协议并立即开通" style="border: 0;border-radius: 16px;background-color: #826D6D; color: white;font-size: 12px; width: 200px;height: 28px;">
            </div>       
        </div>

        <hr style="border: none;background-color:gray; width: 90%;margin-top: 45px;height: 1px;">

        <div class="right_box">
            <p class="right_text">VIP特权</p>
            <p class="right">房主可根据房客的租房意向，若有符合的房源可向该租客推送信息，联系租客。<br>房主非VIP每天享受3次推送服务，开通VIP后享受5次推送服务，有更高概率将<br>房屋出租。</p>
        </div>

        <hr style="border: none;background-color:gray; width: 90%;margin-top: 40px;height: 1px;">

        <div class="renew_box">
            <p class="renew_text">续费管理</p>
            <input type="button" name="upload_photo" value="自动续费" style="margin-top: 9px;margin-left: 100px;border: 0;border-radius: 14px;background-color: #826D6D; color: white;font-size: 12px; width: 100px;height: 28px;">
            <input type="button" name="upload_photo" value="取消续费" style="margin-top: 9px;margin-left: 70px;border: 0;border-radius: 14px;background-color: #826D6D; color: white;font-size: 12px; width: 100px;height: 28px;">
        </div>
    </section>
    
</body>
</html>