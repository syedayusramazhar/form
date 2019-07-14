<?php
$conn =mysqli_connect("localhost","root","","db_er_system");
if(isset($_POST['lsubmit'])){
	if(!isset($_POST['uname'], $_POST['pass']) ){
	 die('PLEASE FILL THE BOTH FIELDS FIRST');
}else{
	$un=$_POST['uname'];
	$un=stripcslashes($un);
	$password=$_POST['pass'];
	$password=stripcslashes($password);
	if(!$conn){
		die("Connection Failed".mysqli_connect_error);
			}else{
	//echo "Connected";
		$q = "SELECT * FROM tbl_login WHERE username='$un' AND password='$password'";
		$result = mysqli_query($conn, $q) 
		or die("FAILED TO QUERY DATABASE".mysqli_error());
		if(mysqli_num_rows($result)==1){
		
			echo "LOGIN SUCCESSFULL";
			header("location: showdata.php");
		}else{
			echo "FAILED TO LOGIN";
		}
		}
	}
}

?>
<html>
<head>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<h1 id="head">LOGIN FIRST</h1>
<div id="d1">
<form  method="post">
<input type ="text" name="uname" class="inp" placeholder="Enter Your User Name Here"/>
<input type ="passowrd" name="pass" class="inp" placeholder="Enter Your Password Here"/>
<input type ="submit" name="lsubmit" class="btn" value="LOGIN"/>
</div>
</form>
</body>
</html>