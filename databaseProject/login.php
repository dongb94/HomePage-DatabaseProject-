<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main/style.css">
    <script src="../jquery-3.2.1.min.js"></script>
    <script>
        $().ready(function(){
            $('#qrcode').mouseup(function(){
                $('#qr').animate({left:'0px'});
                $('#qrfeild').focus();
            });
            $('#qrfeild').focusout(function(){
                $('#qr').animate({left:'-400px'});
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
        var filter = "win16|win32|win64|mac|macintel";
        if ( navigator.platform ) {
            if ( filter.indexOf( navigator.platform.toLowerCase() ) < 0 ) {
                //모바일로 접속
                document.getElementById("benner").style.width = "80%";
            }
        }
    </script>
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
    </header>
    <nav>
        <img src="images/main/cowLogin.png" alt="로그인 화면" id="benner">
    </nav>
    <section id="main" class="container">
        <article id="content">
            <?php 
                $beefNo=$_GET['BeefNo'];
                echo "<form method='post' action='php/login.php?BeefNo=$beefNo'>";
            ?>
                <input type="text" placeholder="ID" name="username">
                <input type="password" placeholder="password" name="password">
                <input type="submit" value="로그인">
                <input type="reset" value="QR코드 로그인" id="qrcode">
            </form>
            <div class="button">
                <a href="register.html">ID가 없으세요?</a>
                <!-- <a href="forgotPassword.html">비밀번호를 잊으셨나요?</a> -->
            </div>
        </article>
    </section>
    <div class = "side" id="qr">
        <br>
        <h1>QR코드를</h1>
        <br>
        <h1>인식시켜주세요</h1>
        <br>
        <img src="images/exe.png" alt="qr코드 이미지">
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