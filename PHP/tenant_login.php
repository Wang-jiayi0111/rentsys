<?php
    session_start();
    
    $username = trim($_POST['username']);
    $pw = trim($_POST['pw']);

    if(!strlen($username) || !strlen($pw)){
        echo "<script>alert('请填写用户名和密码');history.back();</script>";
        exit;
    }

    include_once "conn.php";
    $sql = "select * from tenant where tn_name = '$username' and tn_passwd = '$pw'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num){
        $_SESSION['loggedUsername'] = $username;
        echo "<script>alert('登录成功');location.href = '../web/租房.php';</script>";
    }else{
        //登录失败，销毁会话标志    isset($a),判断标志是否存在
        unset($_SESSION['loggedUsername']);
        //清除所有会话标志session_destroy();
        echo "<script>alert('用户名或密码错误');history.back();</script>";
    }
?>