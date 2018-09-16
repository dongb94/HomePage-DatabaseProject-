<?php
    $db = mysqli_connect("localhost", "root", "database123", "meat");
    $no = $_GET['BeefNo'];

    $query = "SELECT QRcode FROM beef WHERE BeefNo='".$no."'";
    $result=$db->query($query);
    $data = mysqli_fetch_array($result);

    header("Content-type: image/png"); 

    echo $data[0];

    mysql_close();
?>