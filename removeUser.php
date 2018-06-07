<?php 
    header('Access-Control-Allow-Origin: *');

    header('Content-Type:text/html;charset=utf-8');

    /* 
    连接数据库: 此处用户名,与密码要与之前设置的对应
    当前用户名: root
    当前密码: root
    */
    $conn = mysqli_connect("localhost","root","root","mybase");

    if (!$conn){
        die('Could not connect: ' . mysql_error());
    }

    $sql = "DELETE FROM teacher WHERE id = $_POST[id]";

    mysqli_query($conn,$sql);

    echo '{"status":"ok"}';
?>