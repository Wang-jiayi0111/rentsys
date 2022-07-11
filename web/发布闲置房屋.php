<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>发布闲置房屋</title>
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
            margin-left: 420px;
            margin-top: 43px;
            display: inline-block;
            min-height:80px;
            list-style-type: none;
            text-decoration: none;
        }

        .home_page {
            color: white;
            font-size: 21px;
            font-weight: bolder;
        }

        .rent_house {
            color: white;
            font-size: 21px;
            font-weight: bolder;
            padding-left: 40px;
        }

        .houser {
            color: #715C5C;
            font-size: 21px;
            font-weight: bolder;
            padding-left: 40px;
        }

        .service {
            color: white;
            font-size: 21px;
            font-weight: bolder;
            padding-left: 40px;
        }

        /*img {
            border-radius: 50%;
            margin-top: 25px;
            margin-left: 122px;
        }*/

        .search_box {
            
            position: absolute; 
            z-index: 999;
            text-align: center;
            margin-left: 295px;
            margin-top: -58px;
            
        }

        .search {
            height: 20px;
            width: 200px;
            border-radius: 40px;
            border: 1px solid rgba(255, 255, 255, 100);
        }

        .release {
            width: 760px;
            height: 52px;
            background-color: #bbb1b1;
            margin-left: 270px;
            margin-top: 40px;
        }

        .release_text {
            color: #4D2222;
            font-size: 18px;
            font-weight: bold;
            margin-left: 30px;
            padding-top: 15px;
        }

        .release_box {
            width: 760px;
            height: 960px;
            background-color: white;
            margin-left: 270px;
            margin-bottom: 30px;
        }

        .title_box {
            display: flex;
            margin-left: 60px;
            padding-top: 30px;
        }

        .title_text {
            font-size: 18px;
            font-weight: bolder;
            color: black;
        }

        .address_box {
            display: flex;
            margin-left: 60px;
            padding-top: 20px;
        }

        .address_text {
            font-size: 18px;
            font-weight: bolder;
            color: black;
        }

        .region_box {
            display: flex;
            margin-left: 60px;
            padding-top: 20px;
        }

        .region_text {
            font-size: 18px;
            font-weight: bolder;
            color: black;
        }

        .type_box {
            display: flex;
            margin-left: 60px;
            margin-top: 20px;
        }

        .type_text {
            font-size: 18px;
            font-weight: bolder;
            color: black;
        }

        .unit_box {
            display: flex;
            margin-left: 60px;
            margin-top: 20px;
        }

        .unit_text {
            font-size: 18px;
            font-weight: bolder;
            color: black;
        }

        .area_box {
            display: flex;
            margin-left: 60px;
            margin-top: 20px;
        }

        .area_text {
            font-size: 18px;
            font-weight: bolder;
            color: black;
        }

        .style_box {
            display: flex;
            margin-left: 60px;
            margin-top: 20px;
        }

        .style_text {
            font-size: 18px;
            font-weight: bolder;
            color: black;
        }

        .detail_box {
            display: flex;
            margin-left: 60px;
            margin-top: 20px;
        }

        .detail_text {
            font-size: 18px;
            font-weight: bolder;
            color: black;
        }

        .price_box {
            display: flex;
            margin-left: 60px;
            margin-top: 20px;
        }

        .price_text {
            font-size: 18px;
            font-weight: bolder;
            color: black;
        }

        .release_submit {
            margin-left: 185px;
            margin-top: 60px;
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
            die("未找到有效用户！请用房主账号登录。");
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
            <a href="首页.html"><span class="home_page">首页</span></a>
            <a href="租房.php"><span class="rent_house">租房</span></a>
            <span class="houser">房主</span>
            <a href="服务.php"><span class="service">服务</span></a>
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
            <a href="lo_我的资料.php"><img src="photo.png" alt="some_text" width="50" height="50" style="border-radius: 50%;margin-top: 25px;margin-left: 250px;"></a>     
        </div>
        <?php
            }
        ?>

    </header>

    <!--搜索-->
    <form action="" class="search_box">
        <input class="search" type="text" name="search" id="searchBox" placeholder=" 请输入搜索内容">
        <input type="button" name="submit" id="searchButton" value="搜索" style="border: none;background-color: rgba(217, 179, 163, 86);opacity: 0.79;">
        <script>
            var searchEle = document.getElementById("searchBox");
            var c = searchEle.placeholder;
            searchEle.onfocus = function () {
                if (searchEle.placeholder === c){
                    searchEle.placeholder = ""
                }
            };
            searchEle.onblur = function () {
                if (!searchEle.placeholder.trim()){
                    searchEle.placeholder = c;
                }
            };
        </script>
    </form>

    <!-- title -->
    <section class="release">
        <p class="release_text">发布闲置房屋</p>
    </section>

    <!--填写房屋信息-->
    <section class="release_box">
    <form action="../PHP/lo_house.php" method="post">
        <div class="title_box">
            <p class="title_text">房屋标题</p>
                <input type="text" name="title" placeholder="具体标题" style="height: 28px; width: 330px;margin-left: 80px;margin-top: 15px;">
        </div>

        <div class="address_box">
            <p class="address_text">位置</p>
                <input type="text" name="address" placeholder="具体位置" style="height: 28px; width: 330px;margin-left: 117px;margin-top: 15px;">
        </div>

        <div class="price_box">
            <p class="price_text">租金</p>
                <input type="text" name="rent" placeholder="每月租金" style="height: 28px; width: 130px;margin-left: 117px;margin-top: 15px;">
        </div>

        <div class="region_box">
            <p class="region_text">区域</p>
                <!-- <input checked type="radio" name="region" value="region1" /><label>不限&nbsp;&nbsp;</label> -->
                <input name="region" type="radio" value="惠城" style="margin-top: 20px;margin-left: 117px;"/><label>惠城区&nbsp;&nbsp;</label>
                <input name="region" type="radio" value="惠阳"/><label>惠阳区&nbsp;&nbsp;</label>
                <input name="region" type="radio" value="惠东"/><label>惠东县&nbsp;&nbsp;</label>
                <input name="region" type="radio" value="博罗"/><label>博罗县&nbsp;&nbsp;</label>
        </div>

        <div class="type_box">
            <p class="type_text">类型</p>
                <!-- <input checked type="radio" name="type" value="type1"/><label>不限&nbsp;&nbsp;</label> -->
                <input name="type" type="radio" value="合租" style="margin-top: 20px;margin-left: 117px;"/><label>合租&nbsp;&nbsp;</label>
                <input name="type" type="radio" value="整租"/><label>整租&nbsp;&nbsp;</label>
                <input name="type" type="radio" value="公寓"/><label>公寓&nbsp;&nbsp;</label>
                <input name="type" type="radio" value="loft"/><label>loft&nbsp;&nbsp;</label>
        </div>


        <div class="unit_box">
            <p class="unit_text">户型</p>
                <!-- <input checked type="radio" name="unit" value="unit1" /><label>不限&nbsp;&nbsp;</label> -->
                <input name="unit" type="radio" value="一室一厅" style="margin-top: 20px;margin-left: 117px;"/><label>一室一厅&nbsp;&nbsp;</label>
                <input name="unit" type="radio" value="两室一厅"/><label>两室一厅&nbsp;&nbsp;</label>
                <input name="unit" type="radio" value="三室两厅"/><label>三室两厅&nbsp;&nbsp;</label>
                <input name="unit" type="radio" value="四室两厅"/><label>四室两厅&nbsp;&nbsp;</label>
        </div>

        <div class="area_box">
            <p class="area_text">面积</p>
                <!--<input type="text" name="area" placeholder="具体面积" style="height: 28px; width: 200px;margin-left: 117px;margin-top: 15px;">-->
                <!-- <input checked type="radio" name="area" value="area1" /><label>不限&nbsp;&nbsp;</label> -->
                <input name="area" type="radio" value="50以下" style="margin-top: 20px;margin-left: 117px;"/><label>50m²以下&nbsp;&nbsp;</label>
                <input name="area" type="radio" value="50-80"/><label>50~80m²&nbsp;&nbsp;</label>
                <input name="area" type="radio" value="80-100"/><label>80~100m²&nbsp;&nbsp;</label>
                <input name="area" type="radio" value="100以上"/><label>100m²以上&nbsp;&nbsp;</label>
        </div>

        <div class="style_box">
            <p class="style_text">装修风格</p>
                <!-- <input checked type="radio" name="style" value="style1" /><label>不限&nbsp;&nbsp;</label> -->
                <input name="style" type="radio" value="精装修" style="margin-top: 20px;margin-left: 80px;"/><label>精装修&nbsp;&nbsp;</label>
                <input name="style" type="radio" value="粗装修"/><label>粗装修&nbsp;&nbsp;</label>
                <input name="style" type="radio" value="ins风格"/><label>ins风格&nbsp;&nbsp;</label>
                <input name="style" type="radio" value="复古风格"/><label>复古风格&nbsp;&nbsp;</label>
                <input name="style" type="radio" value="温馨风格"/><label>温馨风格&nbsp;&nbsp;</label>
        </div>

        <div class="detail_box">
            <p class="detail_text">房屋详情</p>
                <textarea rows="10" cols="60" name="detail" placeholder="请详细介绍自己的房屋吧！" style="margin-left: 80px;margin-top: 15px;"></textarea>
        </div>

        <div class="release_submit">
            <input type="submit" name="release"  value="提交" style="border: 0;background-color: #826D6D; color: white;font-size: 12px; width: 100px;height: 28px;">
        </div>
    </form>
    </section>
    
</body>
</html>