<?php
    session_start();

    $username = trim($_SESSION['loggedUsername']);//trim去掉空格
    $title = trim($_POST['title']);//house_name
    $address = $_POST['address'];//address
    $type = $_POST['type'];//合租整租 renthouse_type
    $unit = $_POST['unit'];//一房一厅 house_type
    $area = $_POST['area'];//area
    $style = $_POST['style'];//复古风格 decoration
    $detail = $_POST['detail'];//detail
    $region = $_POST['region'];//region
    $rent = $_POST['rent'];//rent

    include_once "conn.php";
    
    $sql = "insert into house SET landlord_id = (SELECT landlord_id FROM landlord WHERE
     ll_name = '$username'), renthouse_type = '$type', house_type = '$unit', area = '$area', 
     address = '$address', house_name = '$title', detail = '$detail', decoration = '$style', 
     rent = $rent, region = '$region'";
    $url = '../web/房主.php';

    $result = mysqli_query($conn,$sql);

    if($result){
        echo "<script>alert('房屋信息提交成功！');location.href='$url';</script>";
    }else{
        echo "<script>alert('房屋信息提交失败！');history.back();</script>";
    }
?>