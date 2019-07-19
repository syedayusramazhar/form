<?php

$conn = mysqli_connect("localhost", "root", "", "db_er_system");
if(!$conn){
	header('location:login.php');
	}else{
	if(isset($_POST['rsubmit'])){
	if($_POST['uname']!="" && $_POST['pass'] != ""){
			$un = $_POST['uname'];
			$psd = $_POST['pass'];
			$psd1 = md5($psd);
			 $dpd = "SELECT * FROM tbl_login WHERE username='$un' &&  password='$psd1'";
			$res = mysqli_query($conn,$dpd);
			$row = mysqli_num_rows($res);
			if (mysqli_num_rows($res) > 0){
				echo "ALREADY REGISTERED";
				}else{
				$qury = "INSERT INTO tbl_login(username, password) VALUES('$un','$psd1')";
				$results = mysqli_query($conn, $qury);
				header("location: login.php");
				}}
				else{
				echo "Fields Must Not Be Empty";
				}
	} 
	
	}	
?>
<html>
<head>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<h1 id="head">REGISTER YOURSELF BEFORE LOGIN</h1>
<div id="d1">
<form  method="post">
<input type ="text" name="uname" class="inp" placeholder="Enter Your User Name Here"/>
<input type ="passowrd" name="pass" class="inp" placeholder="Enter Your Password Here"/>
<input type ="submit" name="rsubmit" class="btn" value="REGISTER" />
</div>
</form>
</body>
</html>