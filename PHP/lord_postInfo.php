<?php
    $username = trim($_POST['username']);//trim去掉空格
    $phone = $_POST['phone'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    
    if(!empty($email)){
        if(!preg_match('/^[a-zA-Z0-9_]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/',$email)){
            echo "<script>alert('请输入正确的邮箱！');history.back();</script>";
            exit;
        }
    }
    
    include_once "conn.php";
    
    $sql = "Update landlord set ll_email = '$email', ll_address = '$address', ll_phonenum = $phone, ll_sex = '$sex'
    where ll_name = '$username'";
    $url = '../web/lo_我的资料.php';

    $result = mysqli_query($conn,$sql);

    if($result){
        echo "<script>alert('资料修改成功！');location.href='$url';</script>";
    }else{
        echo "<script>alert('资料更新失败！');history.back();</script>";
    }
?>