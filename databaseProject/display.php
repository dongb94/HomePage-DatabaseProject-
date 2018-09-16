<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main/style.css">
    <title>소고기 정보</title>
</head>
<body>
    <header>
       <a href="index.html">
            <h1>
                <img src="images/main/cow1.png" alt="소고기 유통 시스템" width="50" height="50">
                소고기 유통 관리 시스템
            </h1>
        </a>
    </header>
    <?php
        if(isset($_GET['BeefNo'])){
            $BeefNo = $_GET['BeefNo'];
        }
        if(isset($_POST['BeefNo'])){
            $BeefNo = $_POST['BeefNo'];
        }
        echo"
        <section class='container'>
            <iframe src='php/displayInIframe.php?BeefNo=$BeefNo' height=100%></iframe>
        </section>
        ";
    ?>
    <section id="main" class="container">
        <article id="content">
            <form method="post" action="display.php">
                <input type="text" placeholder="고기일련번호입력 (ex.1710200101)" name="BeefNo">
                <input type="submit" value="조회" style="margin: 20px 0px 35px 120px;">
            </form>
            <div class="button">
            </div>
        </article>
    </section>
    <div class = "quick">
        <ul>
            <a href="info2.html"><li><img src="images/quick_m01on.gif" alt="이력제란?"></li></a>
            <a href="consumerPage.html"><li><img src="images/quick_m02on.gif" alt="정보조회"></li></a>
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
</html>