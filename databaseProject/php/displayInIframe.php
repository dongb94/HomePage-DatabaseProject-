<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main/style.css">
    <title></title>
    <style>
        html,body{background:rgba(0,0,0,0);}
    </style>
</head>
</html>
<?php
    $BeefNo = $_GET['BeefNo'];
    if(!$BeefNo){
        echo "<script>alert('qr코드를 인식해주세요');</script>";
    }
    $CowNo = substr($BeefNo,0,8);
    $FarmNo = substr($BeefNo,2,3);
    $mysqli=mysqli_connect("localhost", "root", "database123", "meat");
    $query="SELECT C.Kind, C.Sex, C.Origin ";
    $query= $query."FROM cow C ";
    $query= $query."WHERE C.CowNo=$CowNo";
    if($temp = $mysqli->query($query)){
        //echo"<script>alert('성공');</script>";
    }else{
        echo"<script>alert('실패1');</script>";
    }
    $result1 = $temp->fetch_array(MYSQLI_NUM);

    $query="SELECT B.BeefPart, B.BeefRating, B.BeefWeight, B.Keep, B.SlaughterDate, B.CirculationDate ";
    $query= $query."FROM beef B ";
    $query= $query."WHERE B.BeefNo=$BeefNo";
    if($temp = $mysqli->query($query)){
        //echo"<script>alert('성공');</script>";
    }else{
        echo"<script>alert('실패2');</script>";
    }
    $result2 = $temp->fetch_array(MYSQLI_NUM);
    $part = "NaN";
    switch($result2[0]){
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
    $rating = "NaN";
    switch($result2[1]){
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
    $keep = "NaN";
    switch($result2[3]){
        case 0 : $keep="냉동";
            break;
        case 1 : $keep="냉장";
    }


    $query="SELECT F.Farmer, F.FarmAddress ";
    $query= $query."FROM farm F ";
    $query= $query."WHERE F.FarmNo=$FarmNo";
    if($temp = $mysqli->query($query)){
        //echo"<script>alert('성공');</script>";
    }else{
        echo"<script>alert('실패3 FramNo=$FarmNo');</script>";
    }
    $result3 = $temp->fetch_array(MYSQLI_NUM);

    $query="SELECT S.SlaughterMan ";
    $query= $query."FROM slaughter S, beef B ";
    $query= $query."WHERE S.SlaughterNo=B.SlaughterNo && B.BeefNo=$BeefNo";
    if($temp = $mysqli->query($query)){
        //echo"<script>alert('성공');</script>";
    }else{
        echo"<script>alert('실패4');</script>";
    }
    $result4 = $temp->fetch_array(MYSQLI_NUM);

    $query="SELECT C.CirculationMan ";
    $query= $query."FROM circulation C, beef B ";
    $query= $query."WHERE C.CirculationNo=B.CirculationNo && B.BeefNo=$BeefNo";
    if($temp = $mysqli->query($query)){
        //echo"<script>alert('성공');</script>";
    }else{
        echo"<script>alert('실패5');</script>";
    }
    $result5 = $temp->fetch_array(MYSQLI_NUM);

    $query="SELECT S.StoreName, S.StoreAddress ";
    $query= $query."FROM store S, beef B ";
    $query= $query."WHERE S.StoreNo=B.StoreNo && B.BeefNo=$BeefNo";
    if($temp = $mysqli->query($query)){
        //echo"<script>alert('성공');</script>";
    }else{
        echo"<script>alert('실패6');</script>";
    }
    $result6 = $temp->fetch_array(MYSQLI_NUM);
    echo "
        <table>
            <th colspan='4'>
                고기 정보
            </th>
            <tr>
                <td>소 일련번호</td>
                <td>$CowNo</td>
                <td>품종</td>
                <td>$result1[0]</td>
            </tr>
            <tr>
                <td>성별</td>
                <td>$result1[1]</td>
                <td>원산지</td>
                <td>$result1[2]</td>
            </tr>
            <tr>
                <td>고기 일련번호</td>
                <td>$BeefNo</td>
                <td>부위</td>
                <td>$part</td>
            </tr>
            <tr>
                <td>등급</td>
                <td>$rating</td>
                <td>무게</td>
                <td>$result2[2]g</td>
            </tr>
            <tr>
                <td>보관방법</td>
                <td>$keep</td>
            </tr>
            <th colspan='4'>
                농장 정보
            </th>
            <tr>
                <td>농장주</td>
                <td>$result3[0]</td>
                <td>주소</td>
                <td>$result3[1]</td>
            </tr>
            <th colspan='4'>
                도축 정보
            </th>
            <tr>
                <td>도축자</td>
                <td>$result4[0]</td>
                <td>도축일자</td>
                <td>$result2[4]</td>
            </tr>
            <th colspan='4'>
                유통 정보
            </th>
            <tr>
                <td>유통업자</td>
                <td>$result5[0]</td>
                <td>유통일자</td>
                <td>$result2[5]</td>
            </tr>
            <th colspan='4'>
                판매처
            </th>
            <tr>
                <td>판매처명</td>
                <td>$result6[0]</td>
                <td>주소</td>
                <td>$result6[1]</td>
            </tr>
        </table>"
?>