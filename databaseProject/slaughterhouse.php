<!DOCTYPE html>
<!---->
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
        if(!isset($_COOKIE['user_ID'])||!isset($_COOKIE['kind']) || $_COOKIE['kind']!=2){
            echo "<script>alert('권한이 없습니다.'); history.back()</script>";
        }
        $part = array('목심','등심','채끝','안심','우둔','앞다리','갈비','양지','설도','사태');
        echo "<section id='main' class='container'>
            <form method='post' action='php/input.php?BeefNo=$BeefNo' id='input'>";
        for($i=0; $i<10; $i++){
            echo "
                <div>
                    <h3 style='display=inline; float=left'>$part[$i]</h3>
                    <select name='rating$i' id='part'>
                        <option value='1'>1++</option>
                        <option value='2'>1+</option>
                        <option value='3'>1</option>
                        <option value='4'>2</option>
                        <option value='5'>3</option>
                        <!-- 주석처리
                        <option value='6'>A++</option>
                        <option value='7'>A+</option>
                        <option value='8'>A</option>
                        <option value='9'>B</option>
                        <option value='10'>C</option>
                        -->
                    </select>
                    <input type='text' name='weight$i' placeholder='무게'> g
                </div>
            ";
        }
        echo "
                <input type='submit' value='입력'>
            </form>
            <iframe src='php/displayInIframe.php?BeefNo=$BeefNo' height=100%></iframe>
        </section>
        ";
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