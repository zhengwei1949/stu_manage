<?php
    /*CORS允许跨域访问*/
    header('Access-Control-Allow-Origin: *');
    /*返回json格式数据*/
    header('Content-Type:application/json;charset=utf-8');

    $conn = mysqli_connect("localhost","root","root","mybase");

    if (!$conn){
        die('Could not connect: ' . mysql_error());
    }

    $pageNum = $_GET['pageNum'];
    $pageSize = $_GET['pageSize'];

    $start=($pageNum-1)*$pageSize;

    $sql="select * from teacher order by id desc limit $start , $pageSize ";

    $sql1 = "select count(*) as total from teacher";
    $result1 = mysqli_query($conn,$sql1);
    $total = mysqli_fetch_assoc($result1)['total'];
    

    $result = mysqli_query($conn,$sql);

    $list = [];   
    while($row = mysqli_fetch_assoc($result)){
        $list[] = $row;
    }



    echo json_encode(
        [
            'list'=>$list,
            'pageSize'=>(int)$pageSize,
            'pageNum'=>(int)$pageNum,
            'total'=> (int)$total
        ]
    );
?>