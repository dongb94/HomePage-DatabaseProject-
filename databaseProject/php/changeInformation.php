<?php

if(!$_POST['name']){
echo "<script>alert('이름을 입력하세요.');history.back();</script>";
exit;
}
if(!$_POST['buisnessname']){
echo "<script>alert('사업자명을 입력하세요.');history.back();</script>";
exit;
}
if(!$_POST['address']){
echo "<script>alert('주소를 입력하세요.');history.back();</script>";
exit;
}
if($_POST['password']!=$_POST['password2']){
echo "<script>alert('비밀번호가 일치하지 않습니다.');history.back();</script>";
exit;
}   

$db = mysqli_connect("localhost", "root", "database123", "meat");

$id = $_COOKIE['ID'];
$no = $_COOKIE['user_ID'];
$buisnessname = $_POST['buisnessname'];
$name = $_POST['name'];
$address = $_POST['address'];

if($_POST['password']){
    $password = $_POST['password'];
    $query = "UPDATE menber SET PassWord='".$password."' WHERE ID='".$id."'"; 
    $db->query($query);
}

$query = "UPDATE menber SET Address='".$address."' WHERE ID='".$id."'"; 
$db->query($query);

switch($_COOKIE['kind']){
    case 1 : 
        $query = "UPDATE farm SET FarmName='".$buisnessname."', Farmer='".$name."' WHERE FarmNo='".$no."'"; 
        break;
    case 2 :
        $query = "UPDATE slaughter SET SlaughterName='".$buisnessname."', SlaughterMan='".$name."' WHERE SlaughterNo='".$no."'"; 
        break;
    case 3 : 
        $query = "UPDATE circulation SET CirculationName='".$buisnessname."', CirculationMan='".$name."' WHERE CirculationNo='".$no."'"; 
        break;
    case 4 : 
        $query = "UPDATE store SET StoreName='".$buisnessname."', StoreManager='".$name."' WHERE StoreNo='".$no."'"; 
        break;
}
if($db->query($query)){ 
    echo "<script>alert('회원정보가 수정되었습니다.');</script>";
}else{ 
    echo "<script>alert('실패.');history.back();</script>"; 
} 

setcookie('name',$name,time()+(86400*30),'/');

?>
<meta http-equiv='refresh' content='0; url=clickHome.php'>