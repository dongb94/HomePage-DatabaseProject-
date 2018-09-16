<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="css/main/style.css">
    <title>소고기 유통 정보 시스템</title>
    <script src="../jquery-3.2.1.min.js"></script>
    <script>
        $().ready(function(){
            $('#qrcode').mouseup(function(){
                $('#qr').animate({left:'0px'});
                $('#qrfeild').focus();
                $('#del').fadeOut(800);
            });
            $('#qrfeild').focusout(function(){
                $('#qr').animate({left:'-400px'});
                $('#del').fadeIn(800);
            });
            $('#qrfeild').keypress(function(){
                if(event.keyCode==13){
                    var value = $(this).val();
                    var url = value.split('databaseProject/');
                    if(url[1]==null){
                        $(this).val('');
                    }else{
                        $(this).val('');
                        location.href = url[1];
                    }
                }
            });
        });
    </script>
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
                echo "$name 님 환영합니다";
            ?>
            <a href="changeUserInformation.php">정보 수정</a>
            <a href="php/logout.php">로그 아웃</a>
        </h4>
    </header>
    <nav>
        <center id="download">
            <h1> </h1>
            <br>
            <h1>조금더 편한 환경을 원하시면 전용 프로그램을 <br>  다운로드 받아주시길 바랍니다.</h1>
            <br>
            <a href="program/MeatManager.zip"><button>다운로드</button></a>
            <br>
            <h1>모바일이신 경우에는 QR코드를 찍어주세요.</h1>
        </center>
        <script>
        $().ready(function(){
            $('#download').hide(0).fadeIn(1000);
        });
        </script>
    </nav>
    <div class = "callQrcode" id="qrcode">
        <img src="images/exe.png" alt="qr코드 이미지 ">
        <br>
        <h1 id="del">QR코드를<br> 찍으시려면 누르세요</h1>
    </div>
    <div class = "side" id="qr">
        <br>
        <h1>QR코드를</h1>
        <br>
        <h1>인식시켜주세요</h1>
        <br>
        <img src="" alt="">
        <br>
        <input type="text" id="qrfeild">
    </div>
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