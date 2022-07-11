<?php
//连接数据库
    $conn = mysqli_connect("localhost", "root", "123456", "rentsys");
    if(!$conn){
        die("连接数据库服务器失败");
    }
    //设置字符集
    mysqli_query($conn, "set name utf8");
