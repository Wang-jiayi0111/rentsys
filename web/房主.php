<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>房主</title>
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

        .check_title {
            color: #4D2222;
            font-size: 18px;
            font-weight: bold;
            margin-top: 30px;
            margin-left: 70px;
        }

        .title1 {
            width: 114px;
            text-align: center;
            border-bottom: 1px solid grey;
        }

        .check_box {
            margin-top: -55px;
            margin-left: -80px;
        }

        .send_title {
            color: #4D2222;
            font-size: 18px;
            font-weight: bold;
            margin-top: -330px;
            margin-left: 70px;
        }

        .title2 {
            width: 114px;
            text-align: center;
            border-bottom: 1px solid grey;
        }

        .send_box {
            margin-left: 0px;
            padding-bottom: 20px;
        }        

        .add_box {
            margin-top: -220px;
            margin-left: 1040px;
            width: 180px;
            height: 180px;
            text-align: center;
            background-color: #F4F0F0;
            border-radius: 10px;
        }

        .add_text {
            font-size: 16px;
            font-weight: bolder;
            color: black;
            text-align: center;
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

            $search = "SELECT tenant.tn_name, tenant.tn_phonenum, wanthouse.* FROM tenant,wanthouse WHERE tenant.tenant_id = wanthouse.tenant_id ORDER BY region desc";
            $res = mysqli_query($conn, $search);//res找到房客意向

            $house = "SELECT house.house_id, house.house_name from house,landlord where landlord.ll_name = '".$_SESSION['loggedUsername']."' AND landlord.landlord_id = house.landlord_id";
            $hou = mysqli_query($conn, $house);
        }
        else{
            die("未找到有效用户！请使用房主账号登录。");
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
            <a href="房屋筛选.php"><span class="rent_house">租房</span></a>
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

    <!-- 查看我的房屋 -->
    <section>
        <div class="check_title">
            <p class="title1">查看我的房屋</p>
        </div>

        <div class="check_box">
            <table border="1rpx" align="center" cellpadding="8" cellspacing="0" width="750px" height="150px" bordercolor="#BBBBBB">
                <tr align="center" height="60px" bgcolor="#A29F9F">
                    <th>房屋编号</th>
                    <th>房屋名称</th>
                    <th>房屋状态</th>
                    <th>修改房屋信息</th>
                </tr>

                <?php
                while($ord = mysqli_fetch_array($hou)){    ?>
                <tr align="center">
                <td><?php echo $ord['house_id']?></td>
                <td><?php echo $ord['house_name']?></td>
                <td>
                    <?php 
                        $house_id = $ord['house_id'];
                        $is_rent = "SELECT orders.* from orders,house where orders.house_id = $house_id";
                        $res1 = mysqli_query($conn, $is_rent);

                        if(mysqli_num_rows($res1)==0){
                            echo '未租出';
                        }
                        else echo '已租出';
                    ?>
                </td>
                <td><a href="发布闲置房屋.php">修改房屋信息</a></td>
                </tr>
                <?php
                    }
                ?>
        </div>
    </section
    <!-- 我的推送服务 -->
    
        <!--<div class="send_title">
            <p class="title2">我的推送服务</p>
        </div>-->

        <div class="send_box">
            <table border="1rpx" align="center" cellpadding="8" cellspacing="0" width="750px" height="250px" bordercolor="#BBBBBB">
                <tr align="center" height="60px" bgcolor="#A29F9F">
                    <th>房客昵称</th>
                    <th>区域</th>
                    <th>类型</th>
                    <th>装修风格</th>
                    <th>联系房客</th>
                </tr>
                <?php
                while($ord = mysqli_fetch_array($res)){?>
            <tr align="center">
                <td><?php echo $ord['tn_name']?></td>
                <td><?php echo $ord['region']?></td>
                <td><?php echo $ord['renthouse_type']?></td>
                <td><?php echo $ord['decoration']?></td>
                <td><?php echo $ord['tn_phonenum']?></td>
            </tr>
            <?php
                }
            ?>
            </table>
        </div>

    <section>
        <div class="send_title">
            <p class="title2">我的推送服务</p>
        </div>
    </section>
    

    <!--发布闲置房屋-->
    <section>
        <div class="add_box">
            <a href="发布闲置房屋.php"><img src="add.png" alt="some_text" width="100" height="100" style="margin-top: 20px;"></a>
            <p class="add_text">发布闲置房屋</p>
        </div>
        
    </section>
    
</body>

</html>