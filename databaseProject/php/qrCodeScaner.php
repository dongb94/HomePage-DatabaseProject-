<?php
    $beefNo=$_GET['BeefNo'];
    // echo ("<script>alert('qrCodeScaner');</script>");
    //  echo "$beefNo<br>";
    //  $test = substr($beefNo,8,12);
    //  echo "$test";
    //  if($test==0){
    //     echo "$test";
    //  }
    if(isset($_COOKIE['user_ID'])&&isset($_COOKIE['kind'])){
        switch($_COOKIE['kind']){   
            case 1 : 
                echo ("<meta http-equiv='refresh' content='0; url=../download.php?BeefNo=$beefNo'>");
            break;
            case 2 : 
                if(substr($beefNo,8,12)==0){
                    echo ("<meta http-equiv='refresh' content='0; url=../slaughterhouse.php?BeefNo=$beefNo'>");
                }else{
                    echo ("<script>alert('권한이 없습니다.');</script>");
                    echo ("<meta http-equiv='refresh' content='0; url=clickHome.php'>");
                }
            break;
            case 3 : 
                if(substr($beefNo,8,12)==0){
                    echo ("<script>alert('권한이 없습니다.');</script>");
                    echo ("<meta http-equiv='refresh' content='0; url=clickHome.php'>");
                }else if(substr($beefNo,10,12)==0){
                    echo ("<meta http-equiv='refresh' content='0; url=../distributor.php?BeefNo=$beefNo'>");
                }
            break;
            case 4 : 
                if(substr($beefNo,8,12)==0){
                    echo ("<script>alert('권한이 없습니다.');</script>");
                    echo ("<meta http-equiv='refresh' content='0; url=clickHome.php'>");
                }else if(substr($beefNo,10,12)==0){
                    echo ("<meta http-equiv='refresh' content='0; url=../sales.php?BeefNo=$beefNo'>");
                }
            break;
        }
        
    }else{
        if(substr($beefNo,10,12)==0){
            echo ("<meta http-equiv='refresh' content='0; url=../login.php?BeefNo=$beefNo'>");
        }else{
            echo ("<meta http-equiv='refresh' content='0; url=../display.php?BeefNo=$beefNo'>");    
        }
    }
?>