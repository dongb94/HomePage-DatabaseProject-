
<?php

if(!$_POST['username']){
  echo "<script>alert('ID를 입력하세요.');history.back();</script>";
  exit;
}
if(!$_POST['password']){
  echo "<script>alert('비밀번호를 입력하세요.');history.back();</script>";
  exit;
}
if(!$_POST['password2']){
  echo "<script>alert('비밀번호를 다시한번 입력하세요.');history.back();</script>";
  exit;
}
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


$username = $_POST['username'];
$kind = $_POST['kind'];
$password = $_POST['password'];
$buisnessname = $_POST['buisnessname'];
$name = $_POST['name'];
$address = $_POST['address'];

$query = "INSERT INTO menber VALUES ('".$username."', '".$kind."', '".$password."','".$address."')";
if($db->query($query)){ 

}else{ 
  echo "<script>alert('이미 존재하는 아이디 입니다.');history.back();</script>";
} 

if($kind == 1){
   $query = "INSERT INTO farm Values ('0', '".$buisnessname."','".$name."', '".$address."')";

}
else if($kind == 2){
   $query = "INSERT INTO slaughter Values ('0','".$buisnessname."','".$name."', '".$address."')";
}

else if($kind == 3){
   $query = "INSERT INTO circulation VALUES ('0','".$buisnessname."','".$name."', '".$address."')";
}

else{
   $query = "INSERT INTO store VALUES ('0','".$buisnessname."','".$name."', '".$address."')";
}
if($db->query($query)){
  echo "<script>alert('회원가입이 완료되었습니다.');</script>";
}else{ 
 echo "실패2"; 
} 
?>
<meta http-equiv='refresh' content='0; url=../index.html'>
