<?php
session_start();
?>
<!-- 我的资料的部分得有用户登录才能正常显示 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的资料</title>
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

        .sign_out {
            margin-top: -810px;
            margin-left: 250px;
            font-size: 16px;
            border-bottom: 1px solid gray;
            color: black;
            width: 35px;

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
            color: #715C5C;
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

        .mymessage {
            width: 760px;
            height: 52px;
            background-color: #bbb1b1;
            margin-left: 330px;
            margin-top: 40px;
        }

        .message_text {
            color: #4D2222;
            font-size: 18px;
            font-weight: bold;
            margin-left: 30px;
            padding-top: 15px;
        }

        .message_box {
            width: 760px;
            height: 700px;
            background-color: white;
            margin-left: 330px;
            margin-top: -20px;
        }

        /*.photo_box {
            display: inline-block;
        }*/

        .photo_title {
            margin-left: 60px;
            padding-top: 60px;
            font-size: 16px;
            font-weight: bolder;
            color: black;
        }

        .upload_photo {
            display: block;
            margin-left: 300px;
            margin-top: -10px;
        }

        .upload_text {
            font-size: 10px;
            color: #A29F9F;
        }

        .name_box {
            display: flex;
            margin-left: 60px;
            margin-top: 30px;
        }

        .name_text {
            font-size: 16px;
            font-weight: bolder;
            color: black;
        }

        .sex_box {
            display: flex;
            margin-left: 60px;
            margin-top: 30px;
        }

        .sex_text {
            font-size: 16px;
            font-weight: bolder;
            color: black;
        }

        .phonenumber_box {
            display: flex;
            margin-left: 60px;
            margin-top: 30px;
        }

        .phonenumber_text {
            font-size: 16px;
            font-weight: bolder;
            color: black;
        }

        .email_box {
            display: flex;
            margin-left: 60px;
            margin-top: 30px;
        }

        .email_text {
            font-size: 16px;
            font-weight: bolder;
            color: black;
        }

        .address_box {
            display: flex;
            margin-left: 60px;
            margin-top: 30px;
        }

        .address_text {
            font-size: 16px;
            font-weight: bolder;
            color: black;
        }

        .preserve {
            margin-left: 185px;
            margin-top: 70px;
        }

    </style>
</head>
<body>
    <?php 
        include_once '../PHP/conn.php';
        $sql = "select * from landlord where ll_name = '".$_SESSION['loggedUsername']."'";
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
            <p>租立方</p>
        </div>

        <!-- 顶部导航 -->
        <div class="nav_box">
            <span class="message_title">我的资料</span>
            <a href="lo_我的订单-房屋订单.php"><span class="oder_title">我的订单</span></a>
            <a href="lo_我的VIP.php"><span class="vip_title">我的VIP</span></a>
        </div>

        <!-- 头像 -->
        <?php   
            if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] <> ''){ //
        ?>
        <div class="photo">
            <a href="lo_我的资料.php"><img src="<?php echo $info['ll_photo'] ?>" alt="some_text" width="50" height="50" style="border-radius: 50%;margin-top: 25px;margin-left: 122px;"></a>     
        </div>
        <?php
            }
            else{
        ?>  
        <div class="photo">
            <a href="lo_我的资料.php"><img src="photo.png" alt="some_text" width="50" height="50" style="border-radius: 50%;margin-top: 25px;margin-left: 122px;"></a>     
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
            <a href="lo_我的资料.php"><img src= "<?php echo $info['ll_photo'] ?>" alt="用户头像" width="75" height="75" style="border-radius: 50%;margin-top: 15px;"></a>     
        </div>
        <span class="username"><?php echo $_SESSION['loggedUsername'];?></span>
        <!-- 用户不存在 -->
        <?php
            }
            else{
        ?>   
        <div>
            <a href="lo_我的资料.php"><img src="photo.png" alt="some_text" width="75" height="75" style="border-radius: 50%;margin-top: 15px;"></a>     
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
    <section class="mymessage">
        <p class="message_text">个人信息</p>
    </section>

    <!-- 填写/修改个人信息 -->
    <section class="message_box">
    <form action="../PHP/lord_postInfo.php" method="post">
        <!-- 头像 -->
        <div class="photo_box">
            <p class="photo_title">头像</p>
            <div class="upload_photo">
                <input type="button" name="upload_photo" id="uploadbox" value="本地照片" style="border: 0;background-color: #826D6D; color: white;font-size: 12px; width: 100px;height: 28px;">
                <span class="upload_text">上传支持JPG、PNG格式</span>
            </div>
        </div>
        <?php   
            if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] <> ''){ //
        ?>
        <div>
            <img src="<?php echo $info['ll_photo'] ?>" alt="some_text" width="100" height="100" style="border-radius: 50%;margin-top: -90px; margin-left: 180px;">
        </div>
        <?php
            }
            else{
        ?>   
        <div>
            <img src="photo.png" alt="some_text" width="100" height="100" style="border-radius: 50%;margin-top: -90px; margin-left: 180px;">
        </div>
        <?php
            }
        ?>
        <!-- 昵称，只读不可改 -->
        <div class="name_box">
            <p class="name_text">昵称</p>
                <input type="text" name="username" readonly value="<?php echo $info['ll_name']?>" style="height: 28px; margin-left: 90px;margin-top: 10px;">
        </div>
        <!-- 性别 -->
        <div class="sex_box">
            <p class="sex_text">性别</p>
                <input name="sex" type="radio" value="男" <?php if($info['ll_sex'] == '男'){?> checked <?php }?> style="margin-top: 5px;margin-left: 90px;"/><label>男&nbsp;&nbsp;</label>
                <input name="sex" type="radio" value="女" <?php if($info['ll_sex'] == '女'){?> checked <?php }?>/><label>女</label>
        </div>
        <!-- 手机号 -->
        <div class="phonenumber_box">
            <p class="phonenumber_text">手机号</p>
                <input type="text" name="phone" value="<?php echo $info['ll_phonenum']?>" style="height: 28px; margin-left: 74px;margin-top: 10px;">
        </div>
        <!-- 邮箱 -->
        <div class="email_box">
            <p class="email_text">邮箱</p>
            <input type="email" name="email" value="<?php echo $info['ll_email']?>" 
                        style="height: 28px; margin-left: 90px;margin-top: 10px;">
        </div>
        <!-- 地址 -->
        <div class="address_box">
            <p class="address_text">现居地址</p>
                <input type="text" name="address"  value="<?php echo $info['ll_address']?>" 
                        style="height: 28px; width:320px; margin-left: 60px;margin-top: 10px;">
        </div>

        <div class="preserve">
            <input type="submit" value="提交" 
                    style="border: 0;background-color: #826D6D; color: white;font-size: 12px; width: 100px;height: 28px;">
        </div>

    </form>    
    </section>    
    
</body>
</html>