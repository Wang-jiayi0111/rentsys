<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>租房</title>
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

        .select_box {
            margin-top: 20px;
            margin-left: 50px;
        }

        .address_box {
            display: flex;
            margin-left: 60px;
            margin-top: 0px;
        }

        .address_text {
            font-size: 18px;
            font-weight: bolder;
            color: black;
        }

        .type_box {
            display: flex;
            margin-left: 60px;
            margin-top: 0px;
        }

        .type_text {
            font-size: 18px;
            font-weight: bolder;
            color: black;
        }

        .unit_box {
            display: flex;
            margin-left: 60px;
            margin-top: 0px;
        }

        .unit_text {
            font-size: 18px;
            font-weight: bolder;
            color: black;
        }

        .area_box {
            display: flex;
            margin-left: 60px;
            margin-top: 0px;
        }

        .area_text {
            font-size: 18px;
            font-weight: bolder;
            color: black;
        }

        .style_box {
            display: flex;
            margin-left: 60px;
            margin-top: 0px;
        }

        .style_text {
            font-size: 18px;
            font-weight: bolder;
            color: black;
        }

        .house_box {
            display: flex;
            margin-top: 30px;
            margin-left: 110px;
        }

       .house1 {
            width: 300px;
            height: 285px;
            margin-bottom: 30px;
            border-radius: 15px;
            background-color: white;
       }

       .house2 {
            width: 300px;
            height: 285px;
            margin-left: 90px;
            margin-bottom: 30px;
            border-radius: 15px;
            background-color: white;
       }

       .house3 {
            width: 300px;
            height: 285px;
            margin-left: 90px;
            margin-bottom: 30px;
            border-radius: 15px;
            background-color: white;
       }

       .big_title {
        margin-top: 8px;
        margin-left: 20px;
       }

       .house_title {
        font-size: 18px;
        font-weight: bold;
       }

       .price {
        font-size: 20px;
        font-weight: bold;
        color: #841515;
        margin-left: 22px;
       }

       .area_unit {
        margin-left: 20px;
        margin-top: 8px;
        font-size: 15px;
        color: gray;
        font-weight: bold;
       }

       .address_title {
        margin-left: 20px;
        margin-top: -8px;
        font-size: 15px;
        color: gray;
        font-weight: bold;
       }

       .sumit_button {
        margin-top: -50px;
        margin-left: 950px;
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

    <!-- 筛选 -->
    <section class="select_box">
    <form action="../PHP/post_rent.php" method="post">
        <div class="address_box">
            <p class="address_text">区域</p>
                <input checked type="radio" name="address" value="address1" style="margin-top: 5px;margin-left: 87px;"/><label>不限&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="address" type="radio" value="address2"/><label>惠城区&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="address" type="radio" value="address3"/><label>惠阳区&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="address" type="radio" value="address4"/><label>惠东县&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="address" type="radio" value="address5"/><label>博罗县&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        </div>

        <div class="type_box">
            <p class="type_text">类型</p>
                <input checked type="radio" name="type" value="type1" style="margin-top: 5px;margin-left: 87px;"/><label>不限&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="type" type="radio" value="type2"/><label>合租&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="type" type="radio" value="type3"/><label>整租&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="type" type="radio" value="type4"/><label>公寓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="type" type="radio" value="type5"/><label>loft&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        </div>

        <div class="unit_box">
            <p class="unit_text">户型</p>
                <input checked type="radio" name="unit" value="unit1" style="margin-top: 5px;margin-left: 87px;"/><label>不限&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="unit" type="radio" value="unit2"/><label>一室一厅&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="unit" type="radio" value="unit3"/><label>两室一厅&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="unit" type="radio" value="unit4"/><label>三室两厅&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="unit" type="radio" value="unit5"/><label>四室两厅&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        </div>

        <div class="area_box">
            <p class="area_text">面积</p>
                <!--<input type="text" name="area" placeholder="具体面积" style="height: 28px; width: 200px;margin-left: 117px;margin-top: 15px;">-->
                <input checked type="radio" name="area" value="area1" style="margin-top: 5px;margin-left: 87px;"/><label>不限&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="area" type="radio" value="area2"/><label>50m²以下&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="area" type="radio" value="area3"/><label>50~80m²&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="area" type="radio" value="area4"/><label>80~100m²&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="area" type="radio" value="area5"/><label>100m²以上&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        </div>

        <div class="style_box">
            <p class="style_text">装修风格</p>
                <input checked type="radio" name="style" value="style1" style="margin-top: 5px;margin-left: 50px;"/><label>不限&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="style" type="radio" value="style2"/><label>精装修&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="style" type="radio" value="style3"/><label>粗装修&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="style" type="radio" value="style4"/><label>ins风格&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="style" type="radio" value="style5"/><label>复古风格&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input name="style" type="radio" value="style6"/><label>温馨风格&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        </div>

        <hr style="border: none;background-color:#BBBBBB; width: 90%;margin-top: 10px;margin-left: 50px;height: 1px;">
        
        <div class="sumit_button">
            <a href="房屋筛选.php"><input type="button" name="sumit"  value="筛选房屋" style="border: 0;background-color: #826D6D; color: white;font-size: 13px; width: 120px;height: 30px;">
        </div>
    </form>
    </section>

    <!-- 房屋 -->
    <section class="house_box">
    <a href="房屋详情.html"><div class="house1">
        <div class="house_photo">
            <a href="房屋详情.php"><img src="房屋详情图1.jpg" alt="some_text" width="100%" height="180px" style="border-radius: 15px 15px 0 0;"></a>
        </div>
        <div class="big_title">
            <span class="house_title">名字</span>
            <span class="price">租金/月</span>
        </div>
        <p class="area_unit">面积  |  户型</p>
        <p class="address_title">地址</p>
    </div></a>

    <div class="house2">
        <div class="house_photo">
            <a href="房屋详情.php"><img src="房屋详情图1.jpg" alt="some_text" width="100%" height="180px" style="border-radius: 15px 15px 0 0;"></a>
        </div>
        <div class="big_title">
            <span class="house_title">名字</span>
            <span class="price">租金/月</span>
        </div>
        <p class="area_unit">面积  |  户型</p>
        <p class="address_title">地址</p>
    </div>

    <div class="house3">
        <div class="house_photo">
            <a href="房屋详情.php"><img src="房屋详情图1.jpg" alt="some_text" width="100%" height="180px" style="border-radius: 15px 15px 0 0;"></a>
        </div>
        <div class="big_title">
            <span class="house_title">名字</span>
            <span class="price">租金/月</span>
        </div>
        <p class="area_unit">面积  |  户型</p>
        <p class="address_title">地址</p>
    </div>
    </section>
    
</body>

</html>