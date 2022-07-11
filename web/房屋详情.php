<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>房屋详情</title>
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
            color: #715C5C;
            font-size: 21px;
            font-weight: bolder;
            padding-left: 40px;
        }

        .houser {
            color: white;
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

        .introduce_box {
            margin-top: -490px;
            margin-left: 780px;
            
        }

        .big_title {
            text-align: left;
            display: block;
        }

        .house_title {
            font-size: 30px;
            font-weight: bold;
            color: #4F4545;
        }

        .price {
            font-size: 25px;
            font-weight: bold;
            color: #AC3232;
            margin-top: -12px;
        }

        .small_title {
            margin-top: 30px;
            display: flex;

        }

        .type_box {
            width: 100px;
            padding-right: 70px;
        }

        .type1 {
            font-size: 22px;
            color: #841515;
            font-weight: bolder;
        }

        .type2 {
            font-size: 17px;
            color: #A29F9F;
        }

        .unit_box {
            width: 200px;
            padding-right: 70px;
        }

        .unit1 {
            font-size: 22px;
            color: #841515;
            font-weight: bolder;
        }

        .unit2 {
            font-size: 17px;
            color: #A29F9F;
        }

        .area_box {
            width: 50px;
            padding-right: 120px;
        }

        .area1 {
            font-size: 22px;
            color: #841515;
            font-weight: bolder;
        }

        .area2 {
            font-size: 17px;
            color: #A29F9F;
        }

        .position_box {
            margin-top: 30px;
            display: flex;
            
        }

        .position_title {
            font-size: 22px;
            font-weight: bold;
            color: gray;
            width: 70px;
        }

        .position {
            font-size: 20px;
            color: #841515;
            padding-left: 50px;
            width: 250px;
        }

        .style_box {
            margin-top: 30px;
            display: flex;
            
        }

        .style_title {
            font-size: 20px;
            font-weight: bold;
            color: gray;
            width: 90px;
        }

        .style {
            font-size: 20px;
            color: #841515;
            padding-left: 31px;
            width: 110px;
        }

        .contact_box {
            width: 320px;
            height: 150px;
            margin-top: 30px;
            background-color: white;
            display: flex;
            border-radius: 10px;
        }

        .houser_id {
            margin-top: 42px;
            margin-left: 10px;
            font-size: 16px;
            font-weight: bolder;
            color: black;
            width: 100px;
        }

        .contact_button {
            margin-top: 100px;
            margin-left: -160px;
        }

        .detail_box {
            display: block;
            margin-top: -130px;
            margin-left: 70px;
            width: 625px;
        }

        .detail_title {
            font-size: 20px;
            color: #4F4545;
            font-weight: bold;
        }

        .detail {
            font-size: 17px;
            color: #4F4545;
            margin-top: -10px;
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
            die("未找到有效用户！请使用租客账号登录。");
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
            <span class="rent_house">租房</span>
            <a href="房主.php"><span class="houser">房主</span></a>
            <a href="服务.php"><span class="service">服务</span></a>
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
            <a href="我的资料.php"><img src="photo.png" alt="some_text" width="50" height="50" style="border-radius: 50%;margin-top: 25px;margin-left: 250px;"></a>     
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

    <!-- 轮播图 -->
    <section>
        <div>
            <img src="../web/coverage/房屋详情图1.jpg" style="width: 650px;height: 450px;margin-top: 50px;margin-left: 60px;">
        </div>
    </section>

    <!-- 房屋介绍 -->
    <section>
        <form action="../PHP/post_rent.php" method="post">
        <div class="introduce_box">
            <div class="big_title">
                <p class="house_title">幸福花园的二居室</p>
                <p class="price">¥1500/月</p>
            </div>
            <hr style="border: none;background-color:#BBBBBB; width: 80%;margin-top: 20px;margin-left:0px;height: 1px;">
            
            <div class="small_title">
                <div class="type_box">
                    <span class="type1">公寓</span>
                    <span class="type2">类型</span>
                </div>
                <div class="unit_box">
                    <span class="unit1">二室一厅</span>
                    <span class="unit2">户型</span>
                </div>
                <div class="area_box">
                    <span class="area1">65m²</span>
                    <span class="area2">面积</span>
                </div>
            </div>
            <hr style="border: none;background-color:#BBBBBB; width: 80%;margin-top: 30px;margin-left:0px;height: 1px;">

            <div class="position_box">
                <span class="position_title">位置</span>
                <span class="position">广东省惠州市惠城区河南岸演达大道金山湖路34号</span>  
            </div>
            <hr style="border: none;background-color:#BBBBBB; width: 80%;margin-top: 30px;margin-left:0px;height: 1px;">
        
            <div class="style_box">
                <span class="style_title">装修风格</span>
                <span class="style">ins风格</span>   
            </div>
            <hr style="border: none;background-color:#BBBBBB; width: 80%;margin-top: 30px;margin-left:0px;height: 1px;">

            <div class="contact_box">
                <?php
                $sql = "select landlord_id from landlord where ll_photo = '../data/images/22220001.png'";
                $result = mysqli_query($conn, $sql);
                $info = mysqli_fetch_array($result);
                ?>
                <img src="../data/images/22220001.png" alt="some_text" width="60" height="60" style="border-radius: 50%; margin-top: 20px; margin-left: 20px;">
                <span class="houser_id">房主：<?php echo $info['landlord_id'] ?></span>
                <div class="contact_button">
                    <input type="submit" name="contact"  value="承租该房屋" style="border: 0;background-color: #826D6D; color: white;font-size: 13px; width: 260px;height: 30px;">
                </div>
            </div>
        </div>
    </section>
    
    <!-- 房屋详情 -->
    <section>
        <div class="detail_box">
            <p class="detail_title">房屋详情</p>
            <p class="detail">　　该房源共有12栋楼。配有24小时安保。该小区有1个出入口，人车均通过此门进出。小区里有健身广场，饮水站，快递柜，花园，生活氛围浓厚。楼下的健身广场，开放给小区居民使用。楼栋概况：小区建成于2008年，楼龄较新。房源所在楼栋共有7层。楼道内比较干净整洁，日常有专人负责清理打扫。单元口配备了门禁，提升了安全性。房源概况 房源位于第1层，在窗边可欣赏小区花园景色，增添一份推窗见景的小美好。房源整体朝南。厨房有阳台，方便储物。厨房里配备了国内外一线品牌的烟机灶具。卫生间配置齐全。南北通透，空气能有效流通。该房源有2间卧室，照顾到不同家庭成员的需求，打造舒适的居住空间。</p>
        </div>
    </section>
        </form>
</body>

</html>