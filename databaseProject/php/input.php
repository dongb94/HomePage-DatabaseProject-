<?php
$mysqli=mysqli_connect("localhost", "root", "database123", "meat");
include "../phpqrcode/phpqrcode.php";

switch($_COOKIE['kind']){
    case 1 : 
        
        break;
    case 2 : 
        for($i=0; $i<10; $i++){
            
            $rating = $_POST["rating$i"];
            $weight = $_POST["weight$i"];
            $cowno = substr($_GET['BeefNo'],0,10)+$i+1;
            $beefno = $cowno*100;
            $beefpart = $i + 1;
            $slaughter = $_COOKIE['user_ID'];
            $today = date("Y-m-d");

            $imgpath = $_SERVER['DOCUMENT_ROOT']."/databaseProject/result/$beefno.png";
            QRcode::png("http://168.131.153.176/databaseProject/php/qrCodeScaner.php?BeefNo=$beefno",$imgpath);

            $qrcode = fopen("../result/$beefno.png","r");
            $qrread = fread($qrcode,50000);
            $image = addslashes($qrread);
            
            $query = "INSERT INTO beef(BeefNo, SlaughterNo, BeefPart, BeefRating, BeefWeight, SlaughterDate, QRcode) VALUES ('".$beefno."', '".$slaughter."', '".$beefpart."', '".$rating."', '".$weight."', '".$today."', '".$image."')";
            $mysqli->query($query);
            
            $query = "INSERT INTO sale(BeefNo, Weight, Remain) VALUES ('".$beefno."', '0','".$weight."')";
            $mysqli->query($query);

        }
        echo "<meta http-equiv='refresh' content='0;url=../showqrcode.php?BeefNo=$cowno'>";
        break;
    case 3 : 
        $keep = $_POST['keep'];
        $beefno = $_GET['BeefNo'];
        $distributor = $_COOKIE['user_ID'];
        $today = date("Y-m-d");

        $query = "UPDATE beef SET CirculationNo='".$distributor."', Keep='".$keep."', CirculationDate='".$today."'  WHERE BeefNo='".$beefno."'";
        $mysqli->query($query);

        echo "<meta http-equiv='refresh' content='0;url=../taskChoice.php?'>";
        break;
    case 4 : 
        $weight = $_POST["weight"];
        $beefno = $_GET['BeefNo'];        
        
        if(empty($weight)){
            echo "<script>alert('값을 입력해주세요.');history.back()</script>";
        }

        $query = "SELECT Remain FROM sale WHERE BeefNo='".$beefno."' ORDER BY Remain";
        $result = $mysqli->query($query);
        $data = mysqli_fetch_array($result);
        if($data[0] < $weight){
            echo "<script>alert('판매되는 양이 남은 양보다 많습니다.');</script>
            <meta http-equiv='refresh' content='0;url=../sales.php?BeefNo=$beefno'>";
            break;
        }

        $remain = $data[0]-$weight;
        
        $sailer = $_COOKIE['user_ID'];
        $today = date("Y-m-d");

        $query = "UPDATE beef SET StoreNo='".$sailer."' WHERE BeefNo='".$beefno."'";
        $mysqli->query($query);

        $query = "INSERT INTO sale(BeefNo, Weight, Remain) VALUES ('".$beefno."', '".$weight."','".$remain."')";
        $mysqli->query($query);
        
        //beefno 바뀌기 전에것 저장해서 바뀐후 beef로 옮긴다.
        $query = "SELECT * FROM beef WHERE BeefNo='".$beefno."'";
        $result = $mysqli->query($query);
        $data = mysqli_fetch_array($result);

        $slaughterNo = $data[1];
        $circulationNo = $data[2];
        $beefPart = $data[4];
        $beefRating = $data[5];
        $keep = $data[7];
        $sDate = $data[8];
        $cData = $data[9];

        //
        $query = "SELECT COUNT(Remain) FROM sale WHERE BeefNo='".$beefno."'";
        $result = $mysqli->query($query);
        $data = mysqli_fetch_array($result);

        $beefno = $beefno + $data[0] - 1;

        $imgpath = $_SERVER['DOCUMENT_ROOT']."/databaseProject/result/$beefno.png";
        QRcode::png("http://168.131.153.176/databaseProject/php/qrCodeScaner.php?BeefNo=$beefno",$imgpath);

        $qrcode = fopen("../result/$beefno.png","r");
        $qrread = fread($qrcode,50000);
        $image = addslashes($qrread);
        //
        $query = "INSERT INTO beef VALUES ('".$beefno."', '".$slaughterNo."', '".$circulationNo."', '".$sailer."', '".$beefPart."', '".$beefRating."', '".$weight."', '".$keep."', '".$sDate."', '".$cData."', '".$today."', '".$image."')";
        $mysqli->query($query);

        echo "<meta http-equiv='refresh' content='0;url=../showqrcode.php?BeefNo=$beefno'>";
        break;
}



?>