<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main/style.css">
    <title>소고기 유통 정보 시스템</title>
    
</head>
<body>
    <header>
        <a href="php/clickHome.php">
            <h1>
                <img src="images/main/cow1.png" alt="소고기 유통 시스템" width="50" height="50">
                소고기 유통 관리 시스템
            </h1>
        </a>
        <h4>
            <?php 
                $name = $_COOKIE['name'];
                echo "$name 님 환영합니다"
            ?>
            <a href="changeUserInformation.php">정보 수정</a>
            <a href="php/logout.php">로그 아웃</a>
        </h4>
    </header>
    <nav></nav>
    <?php
        $BeefNo = $_GET['BeefNo'];
        if(!$BeefNo){
            echo "<script>alert('qr코드를 인식해주세요');</script>";
        }
        if(!isset($_COOKIE['user_ID'])||!isset($_COOKIE['kind']) || $_COOKIE['kind']!=4){
            echo "<script>alert('권한이 없습니다.'); history.back()</script>";
        }
        echo "
        <section id='main' class='container'>
            <form method='post' action='php/input.php?BeefNo=$BeefNo' id='input'>
                <div>
                    <h2>판매량</h2>                    
                    <input type='text' name='weight' placeholder='무게'> g
                </div>
                <input type='submit' value='입력'>
            </form>
            <iframe src='php/displayInIframe.php?BeefNo=$BeefNo' height=100%></iframe>
        </section>";
    ?>
    <div class = "quick">
        <ul>
            <a href="info2.html"><li><img src="images/quick_m01on.gif" alt="이력제란?"></li></a>
            <a href="serch.php"><li><img src="images/quick_m02on.gif" alt="정보조회"></li></a>
            <a href="info.php?n=1"><li><img src="images/quick_m03on.gif" alt="사육단계"></li></a>
            <a href="info.php?n=2"><li><img src="images/quick_m04on.gif" alt="도축단계"></li></a>
            <a href="info.php?n=3"><li><img src="images/quick_m05on.gif" alt="포장단계"></li></a>
            <a href="info.php?n=4"><li><img src="images/quick_m06on.gif" alt="판매단계"></li></a>
        </ul>
    </div>
    <footer>Copyright (c) 2017 meat management
        <div class="right">
            database project
        </div>
    </footer>
</body>
</head>