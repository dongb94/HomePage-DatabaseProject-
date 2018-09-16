<!DOCTYPE html>
<!--회원정보 수정 페이지-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main/style.css">
    <title>회원정보수정</title>
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
    <section id="main" class="container">
        <article id="content">
            <h1>정보수정</h1>
            <form method="post" action="php/changeInformation.php">
                <?php
                    if(isset($_COOKIE['user_ID'])&&isset($_COOKIE['kind'])){
                        $userNo = $_COOKIE['user_ID'];
                        $name = $_COOKIE['name'];
                    }else{
                        echo "<script>alert('로그인을 먼저 해주세요');history.back();</script>";
                    }

                    $db = mysqli_connect("localhost", "root", "database123", "meat");
                    
                    switch($_COOKIE['kind']){
                        case 1 : 
                            $query = "SELECT * FROM farm where FarmNo='".$userNo."'";
                            $result=$db->query($query);
                            $data = mysqli_fetch_array($result);
                            $buisnessname = $data['FarmName'];
                            $address = $data['FarmAddress'];
                            break;
                        case 2 : 
                            $query = "SELECT * FROM slaughter where SlaughterNo='".$userNo."'";
                            $result=$db->query($query);
                            $data = mysqli_fetch_array($result);
                            $buisnessname = $data['SlaughterName'];
                            $address = $data['SlaughterAddress'];
                            break;
                        case 3 : 
                            $query = "SELECT * FROM circulation where CirculationNo='".$userNo."'";
                            $result=$db->query($query);
                            $data = mysqli_fetch_array($result);
                            $buisnessname = $data['CirculationName'];
                            $address = $data['CirculationAddress'];
                            break;
                        case 4 : 
                            $query = "SELECT * FROM store where StoreNo='".$userNo."'";
                            $result=$db->query($query);
                            $data = mysqli_fetch_array($result);
                            $buisnessname = $data['StoreName'];
                            $address = $data['StoreAddress'];
                            break;
                    }
                    $ID = $_COOKIE['ID'];

                    echo"
                    ID <br> <input type='text' placeholder='ID' name='username' value='$ID' disabled> <br>
                    비밀번호 변경<br> <input type='password' placeholder='password' name='password'> <br>
                    비밀번호 확인 <br> <input type='password' placeholder='password' name='password2'> <br>
                    이름 <br> <input type='text' placeholder='이름' name='name' value='$name'><br>
                    사업자명 <br> <input type='text' placeholder='사업자명 또는 기업명' name='buisnessname' value='$buisnessname'><br>
                    주소 <br> <input type='text' placeholder='주소' name='address' value='$address'><br>
                    <input type='submit' value='정보변경'>
                    <input type='reset' value='초기화'> 
                    ";
                ?>
                
            </form>
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