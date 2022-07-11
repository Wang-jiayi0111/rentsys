<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>服务</title>
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
            color: white;
            font-size: 21px;
            font-weight: bolder;
            padding-left: 40px;
        }

        .service {
            color: #715C5C;
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

        .select_title {
            color: #4D2222;
            font-size: 18px;
            font-weight: bold;
            margin-top: 40px;
            margin-left: 100px;
        }

        .title1 {
            width: 165px;
            text-align: center;
            border-bottom: 1px solid grey;
        }

        .select_photo {
            margin-top: 20px;
            margin-left: 100px;
            display: flex;
        }

        .evaluate_title {
            color: #4D2222;
            font-size: 18px;
            font-weight: bold;
            margin-top: 40px;
            margin-left: 100px;
        }

        .title2 {
            width: 74px;
            text-align: center;
            border-bottom: 1px solid grey;
        }

        .evaluate1 {
            width: 240px;
            height: 170px;
            margin-left: 100px;
            background-color: white;
            border-radius: 8px;
            margin-bottom: 50px;
        }

        .dis {
            display: flex;
        }

        .user_id {
            margin-top: 33px;
            margin-left: 10px;
            font-size: 17px;
            font-weight: bolder;
            color: black;
            /*width: 100px;*/
        }

        .type {
            margin-left: 12px;
            color: #4D2222;
            font-weight: bolder;
            font-size: 15px;
            margin-top: 12px;
        }

        .content {
            margin-left: 12px;
            margin-right: 12px;
            color: #4D2222;
            font-size: 14px;
            margin-top: -5px;
        }

        .evaluate_box {
            display: flex;
            margin-top: 20px;
        }

        .evaluate2 {
            width: 240px;
            height: 170px;
            margin-left: 50px;
            background-color: white;
            border-radius: 8px;
            margin-bottom: 50px;
        }

        .evaluate3 {
            width: 240px;
            height: 170px;
            margin-left: 50px;
            background-color: white;
            border-radius: 8px;
            margin-bottom: 50px;
        }

        .evaluate4 {
            width: 240px;
            height: 170px;
            margin-left: 50px;
            background-color: white;
            border-radius: 8px;
            margin-bottom: 50px;
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
            die("未找到有效用户！请用房客账号登录。");
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

    <!-- 选择服务 -->
    <section>
        <div class="select_title">
            <p class="title1">选择下单，享受服务</p>
        </div>

        <div class="select_photo">
            <img src="coverage/服务1.PNG" alt="some_text" width="280" height="300" style="border-radius: 10px;">
            <img src="coverage/服务2.PNG" alt="some_text" width="280" height="300" style="border-radius: 10px;margin-left: 120px;">
            <img src="coverage/服务3.PNG" alt="some_text" width="280" height="300" style="border-radius: 10px;margin-left: 120px;">    
        </div>
    </section>

    <!-- 精选评价 -->
    <section>
        <div class="evaluate_title">
            <p class="title2">精选评价</p>
        </div>

        <div class="evaluate_box">
           <div class="evaluate1">
                <div class="dis">
                    <img src="coverage/icon5.jpg" alt="some_text" width="60" height="60" style="border-radius: 50%; margin-top: 15px; margin-left: 10px;">
                    <span class="user_id">粉红小兔叽</span>
                </div>
                <p class="type">选择服务类型：保洁</p>
                <p class="content">阿姨清洁得很干净！整个房子焕然一新</p>
            </div> 

            <div class="evaluate2">
                <div class="dis">
                    <img src="coverage/icon2.jpg" alt="some_text" width="60" height="60" style="border-radius: 50%; margin-top: 15px; margin-left: 10px;">
                    <span class="user_id">圆滚滚来了</span>
                </div>
                <p class="type">选择服务类型：搬家</p>
                <p class="content">阿叔忙上忙下地把行李都搬到了新家，物品在运输时也没有损坏</p>
            </div>

            <div class="evaluate3">
                <div class="dis">
                    <img src="coverage/icon3.jpg" alt="some_text" width="60" height="60" style="border-radius: 50%; margin-top: 15px; margin-left: 10px;">
                    <span class="user_id">掐你脸蛋子</span>
                </div>
                <p class="type">选择服务类型：家修</p>
                <p class="content">上门服务，立刻就修好了</p>
            </div>

            <div class="evaluate4">
                <div class="dis">
                    <img src="coverage/icon4.jpg" alt="some_text" width="60" height="60" style="border-radius: 50%; margin-top: 15px; margin-left: 10px;">
                    <span class="user_id">罗大可爱</span>
                </div>
                <p class="type">选择服务类型：保洁</p>
                <p class="content">强迫症给阿姨好评！下次还选你们家！！！</p>
            </div>
        </div>
        
    </section>
    
</body>

</html>