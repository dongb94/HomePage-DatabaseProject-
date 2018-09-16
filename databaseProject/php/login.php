<?php

$db = mysqli_connect("localhost", "root", "database123", "meat");

if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
}else{
	$username = $_GET['username'];
	$password = $_GET['password'];
}


$query = "SELECT * FROM menber where ID='".$username."'";

if($result=$db->query($query)){
	#로그인 성공
}else #로그인 실패
    echo "<script>alert('ID와 비밀번호를 확인해주세요.');history.back();</script>";

$data = mysqli_fetch_array($result);
if($data["PassWord"] == $password){
	if($data["PartNo"] == 1){
		$query = "SELECT * FROM farm where FarmAddress='".$data['Address']."'";
		$result=$db->query($query);
		$data = mysqli_fetch_array($result);
		setcookie('user_ID',$data['FarmNo'],time()+(86400*30),'/');
		setcookie('name',$data['Farmer'],time()+(86400*30),'/');
		setcookie('kind',1,time()+(86400*30),'/');
	}
	else if($data["PartNo"] == 2){
		$query = "SELECT * FROM slaughter where SlaughterAddress='".$data['Address']."'";
		$result=$db->query($query);
		$data = mysqli_fetch_array($result);
		setcookie('user_ID',$data['SlaughterNo'],time()+(86400*30),'/');
		setcookie('name',$data['SlaughterMan'],time()+(86400*30),'/');
		setcookie('kind',2,time()+(86400*30),'/');
	}
	else if($data["PartNo"] == 3){
		$query = "SELECT * FROM circulation where CirculationAddress='".$data['Address']."'";
		$result=$db->query($query);
		$data = mysqli_fetch_array($result);
		setcookie('user_ID',$data['CirculationNo'],time()+(86400*30),'/');
		setcookie('name',$data['CirculationMan'],time()+(86400*30),'/');
		setcookie('kind',3,time()+(86400*30),'/');
	}
	else if($data["PartNo"] == 4){
		$query = "SELECT * FROM store where StoreAddress='".$data['Address']."'";
		$result=$db->query($query);
		$data = mysqli_fetch_array($result);
		setcookie('user_ID',$data['StoreNo'],time()+(86400*30),'/');
		setcookie('name',$data['StoreManager'],time()+(86400*30),'/');
		setcookie('kind',4,time()+(86400*30),'/');
	}else
		echo "<script>alert('알 수 없는 오류.');history.back();</script>";
	
	setcookie('ID',$username,time()+(86400*30),'/');

	if(!empty($_GET['BeefNo'])){
		$beefNo = $_GET['BeefNo'];
		echo ("<meta http-equiv='refresh' content='0; url=qrCodeScaner.php?BeefNo=$beefNo'>");
	}else{
		echo ("<meta http-equiv='refresh' content='0; url=../taskChoice.php'>");
	}
}else #로그인 실패
    echo "<script>alert('ID와 비밀번호를 확인해주세요.');history.back();</script>";
?>