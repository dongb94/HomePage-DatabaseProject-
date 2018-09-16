
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main/style.css">
    <script>
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
        <h4>
            <?php 
                $name = $_COOKIE['name'];
                echo "$name 님 환영합니다"
            ?>
            <a href="changeUserInformation.php">정보 수정</a>
            <a href="php/logout.php">로그 아웃</a>
        </h4>
    </header>
    <nav>
        <img src="images/main/cowLogin.png" alt="로그인 화면" id="benner">
    </nav>
    <table>
    <?php
        $db = mysqli_connect("localhost", "root", "database123", "meat");
        $no = $_COOKIE['user_ID'];
        
        switch($_COOKIE['kind']){
            case 1 : 
                echo ("<meta http-equiv='refresh' content='0; url=download.php'>");
                break;
            case 2 :
                $query = "SELECT BeefNo,BeefPart,BeefRating,BeefWeight,SlaughterDate FROM beef WHERE SlaughterNo='".$no."'";
                $result=$db->query($query);
               
                $n = $result->num_rows;
                
                
                echo "<tr>
                        <th>고기 일련번호</th>
                        <th>부위</th>
                        <th>등급</th>
                        <th>무게</th>
                        <th>도축일</th>
                        <th>qr코드</th>
                    </tr>";
                
                for($i=0; $i<$n; $i++){
                    $data = mysqli_fetch_array($result);
                    switch($data[1]){
                        case 1 : $part="목심";
                            break;
                        case 2 : $part="등심";
                            break;
                        case 3 : $part="채끝";
                            break;
                        case 4 : $part="안심";
                            break;
                        case 5 : $part="우둔";
                            break;
                        case 6 : $part="앞다리";
                            break;
                        case 7 : $part="갈비";
                            break;
                        case 8 : $part="양지";
                            break;
                        case 9 : $part="설도";
                            break;
                        case 10 : $part="사태";
                    }
                    $rating=NAN;
                    switch($data[2]){
                        case 1 : $rating="1++";
                            break;
                        case 2 : $rating="1+";
                            break;
                        case 3 : $rating="1";
                            break;
                        case 4 : $rating="2";
                            break;
                        case 5 : $rating="3";
                            break;
                        case 6 : $rating="A++";
                            break;
                        case 7 : $rating="A+";
                            break;
                        case 8 : $rating="A";
                            break;
                        case 9 : $rating="B";
                            break;
                        case 10 : $rating="C";
                    }
                    echo "<tr>
                            <td><a href='display.php?BeefNo=$data[0]'>$data[0]</a></td>
                            <td>$part</td>
                            <td>$rating</td>
                            <td>$data[3]</td>
                            <td>$data[4]</td>
                            <td><a href='php/showQRcode.php?BeefNo=$data[0]'>보기</a></td>
                        </tr>";
                }
                break;
            case 3 : 
                $query = "SELECT BeefNo,BeefPart,BeefRating,BeefWeight,Keep,CirculationDate FROM beef WHERE CirculationNo='".$no."'";
                $result=$db->query($query);
                
                $n = $result->num_rows;
                echo "<tr>
                    <th>고기 일련번호</th>
                    <th>부위</th>
                    <th>등급</th>
                    <th>무게</th>
                    <th>보관방법</th>
                    <th>운송일</th>
                    <th>qr코드</th>
                </tr>";

                for($i=0; $i<$n; $i++){
                    $data = mysqli_fetch_array($result);
                    switch($data[1]){
                        case 1 : $part="목심";
                            break;
                        case 2 : $part="등심";
                            break;
                        case 3 : $part="채끝";
                            break;
                        case 4 : $part="안심";
                            break;
                        case 5 : $part="우둔";
                            break;
                        case 6 : $part="앞다리";
                            break;
                        case 7 : $part="갈비";
                            break;
                        case 8 : $part="양지";
                            break;
                        case 9 : $part="설도";
                            break;
                        case 10 : $part="사태";
                    }
                    $rating=NAN;
                    switch($data[2]){
                        case 1 : $rating="1++";
                            break;
                        case 2 : $rating="1+";
                            break;
                        case 3 : $rating="1";
                            break;
                        case 4 : $rating="2";
                            break;
                        case 5 : $rating="3";
                            break;
                        case 6 : $rating="A++";
                            break;
                        case 7 : $rating="A+";
                            break;
                        case 8 : $rating="A";
                            break;
                        case 9 : $rating="B";
                            break;
                        case 10 : $rating="C";
                    }
                    $keep = NAN;
                    if($data[4]==0){
                        $keep="냉동";
                    }else{
                        $keep="냉장";
                    }

                    echo "<tr>
                            <td><a href='display.php?BeefNo=$data[0]'>$data[0]</a></td>
                            <td>$part</td>
                            <td>$rating</td>
                            <td>$data[3]</td>
                            <td>$keep</td>
                            <td>$data[5]</td>
                            <td><a href='php/showQRcode.php?BeefNo=$data[0]'>보기</a></td>
                        </tr>";
                }
                break;
            case 4 : 
                $query = "SELECT BeefNo,BeefPart,BeefRating,BeefWeight,Keep,SailDate FROM beef WHERE StoreNo='".$no."'";
                $result=$db->query($query);
                
                $n = $result->num_rows;
                echo "<tr>
                    <th>고기 일련번호</th>
                    <th>부위</th>
                    <th>등급</th>
                    <th>무게</th>
                    <th>보관방법</th>
                    <th>판매일</th>
                    <th>qr코드</th>
                </tr>";

                for($i=0; $i<$n; $i++){
                    $data = mysqli_fetch_array($result);
                    switch($data[1]){
                        case 1 : $part="목심";
                            break;
                        case 2 : $part="등심";
                            break;
                        case 3 : $part="채끝";
                            break;
                        case 4 : $part="안심";
                            break;
                        case 5 : $part="우둔";
                            break;
                        case 6 : $part="앞다리";
                            break;
                        case 7 : $part="갈비";
                            break;
                        case 8 : $part="양지";
                            break;
                        case 9 : $part="설도";
                            break;
                        case 10 : $part="사태";
                    }
                    $rating=NAN;
                    switch($data[2]){
                        case 1 : $rating="1++";
                            break;
                        case 2 : $rating="1+";
                            break;
                        case 3 : $rating="1";
                            break;
                        case 4 : $rating="2";
                            break;
                        case 5 : $rating="3";
                            break;
                        case 6 : $rating="A++";
                            break;
                        case 7 : $rating="A+";
                            break;
                        case 8 : $rating="A";
                            break;
                        case 9 : $rating="B";
                            break;
                        case 10 : $rating="C";
                    }
                    $keep = NAN;
                    if($data[4]==0){
                        $keep="냉동";
                    }else{
                        $keep="냉장";
                    }
                    echo "<tr>
                            <td><a href='display.php?BeefNo=$data[0]'>$data[0]</a></td>
                            <td>$part</td>
                            <td>$rating</td>
                            <td>$data[3]</td>
                            <td>$keep</td>
                            <td>$data[5]</td>
                            <td><a href='php/showQRcode.php?BeefNo=$data[0]'>보기</a></td>
                        </tr>";
                }
                break;
        }
        
    ?>
    </table>

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