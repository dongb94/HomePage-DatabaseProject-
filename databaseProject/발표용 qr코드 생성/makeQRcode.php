<?php
    include "../phpqrcode/phpqrcode.php";
    $beefno = "161192210200";
    // $address = "http://dongb94.ddns.net/databaseProject";
    $address = "http://168.131.153.176/databaseProject/php/qrCodeScaner.php?BeefNo=$beefno";
    $imgpath = $_SERVER['DOCUMENT_ROOT']."/databaseProject/발표용 qr코드 생성/$beefno.png";
    QRcode::png($address,$imgpath);
    echo "ok";
?>