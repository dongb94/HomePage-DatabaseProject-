<?php
    include "../phpqrcode/phpqrcode.php";

    $id = $_COOKIE['ID'];

    $mysqli=mysqli_connect("localhost", "root", "database123", "meat");    
    $query = "SELECT PassWord FROM menber WHERE ID='".$id."'";
    $result = $mysqli->query($query);
    $data = mysqli_fetch_array($result);

    $password = $data[0];

    $address = "http://168.131.153.176/databaseProject/php/login.php?username=$id&password=$password";
    $imgpath = $_SERVER['DOCUMENT_ROOT']."/databaseProject/images/QRID/$id.png";
    QRcode::png($address,$imgpath);

    $qrcode = fopen("../images/QRID/$id.png","r");
    $qrread = fread($qrcode,50000);

    header("Content-type: image/png"); 
    
    echo $qrread;
    
?>