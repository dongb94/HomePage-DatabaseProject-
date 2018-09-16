<!DOCTYPE html>
<!-- 로그인 후 직종별 업무안내 페이지-->
<?php
    $ID = $_COOKIE['user_ID'];
    $kind = $_COOKIE['kind'];
    $name = $_COOKIE['name'];
    $query = null;
    $mysqli=mysqli_connect("localhost", "root", "database123", "meat");
    if($kind == 1){
        $query = "SELECT F.Farmer FROM farm F where F.FarmNo=$ID";
    }      
    else if($kind == 2){
        $query = "SELECT S.SlaughterMan FROM slaughter S where S.SlaughterNo=$ID";
    }
    else if($kind == 3){
        $query = "SELECT C.CirculationMan FROM circulation C where C.CirculationNo=$ID";
    }
    else if($kind == 4){
        $query = "SELECT S.StoreManager FROM store S where S.StoreNo=$ID";
    }

    if($result=$mysqli->query($query)){
	    #성공
    }else #실패   
        echo "<script>alert('쿼리오류');history.back();</script>";
    $data = mysqli_fetch_array($result);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main/style.css">
    <title>업무선택</title>
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
                echo "$name 님 환영합니다"
            ?>
            <a href="changeUserInformation.php">정보 수정</a>
            <a href="php/logout.php">로그 아웃</a>
        </h4>
    </header>
    <nav></nav>
    <section class="container">
        <article id="content">
            <h2>
            <?php
                if($kind == 1){
                    echo "농장 ";
                }
                else if($kind == 2){
                    echo "도축 ";
                }
                else if($kind == 3){
                    echo "운송 ";
                }
                else if($kind == 4){
                    echo "사업자 ";
                }
            ?>    
            업무 선택</h2>
            <?php
                if($kind == 1){
                    echo "<a href='download.php' class='abutton'>소 관리</a>";
                }
                else if($kind == 2){
                    echo "<a href='download.php' class='abutton'>도축관리</a>";
                }
                else if($kind == 3){
                    echo "<a href='download.php' class='abutton'>운송관리</a>";
                }
                else if($kind == 4){
                    echo "<a href='download.php' class='abutton'>상품판매</a>";
                }
            
                // if($kind == 1){
                //     echo "<a href='farmer.php?BeefNo=171000010101' class='abutton'>소 관리</a>";
                // }
                // else if($kind == 2){
                //     echo "<a href='slaughterhouse.php?BeefNo=171000010000' class='abutton'>도축관리</a>";
                // }
                // else if($kind == 3){
                //     echo "<a href='distributor.php?BeefNo=171000010100' class='abutton'>운송관리</a>";
                // }
                // else if($kind == 4){
                //     echo "<a href='sales.php?BeefNo=171000010101' class='abutton'>상품판매</a>";
                // }
            ?>
            <a href='showItem.php' class='abutton'>상품관리</a>
            <a href='changeUserInformation.php' class='abutton'>정보수정</a>
            <a href='serch.php' class='abutton'>소고기 정보조회</a>
            <a href='php/makeQRcodeId.php' class='abutton'>QR코드 아이디 생성</a>
        </article>
    </section>
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
</html>