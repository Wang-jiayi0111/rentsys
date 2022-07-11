<?php
header("Content_Type:text/html;charset = utf-8");
    $username = trim($_POST['username']);//trim去掉空格  用户名
    $pw = trim($_POST['password']);
    $cpw = trim($_POST['password2']);
    $phone = $_POST['phone'];

    include_once "conn.php";

    $sql = "select * from landlord where ll_name = '$username'";
    $result = mysqli_query($conn,$sql);//返回一个记录
    $num = mysqli_num_rows($result);
    if($num){
        echo "<script>alert('用户名已存在，请重新输入');history.back();</script>";
        exit;
    }

    $sql = "insert into landlord(ll_name,ll_passwd,ll_phonenum) values ('$username', '$pw', $phone)";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>alert('注册成功');location.href='../web/房主登录注册.html'</script>";
    }else{
        echo "<script>alert('注册失败');</script>";
    }
?>