<?php
$conn =mysqli_connect("localhost","root","","db_er_system");
if(isset($_POST['sub'])){
	$nam = $_POST['name'];
	$lnam = $_POST['lname'];
	$emai = $_POST['email'];
	$cn = $_POST['contact'];
	if(!$conn){
		die("Connection Failed".mysqli_connect_error);
	}
	else{
		//echo "Connected";
		//VALIDATIONS
		//NAME VALIDATION FIRST
		if(isset($nam) && $nam != ""){
			if((preg_match("/^[a-zA-Z ]*$/",$nam))){
				
			}else{
				$error[] = "WHITE SPACES AND INTEGERS ARE NOT ALLOWED";
			}
		}else{
			$error[] = "NAME SHOULD NOT BE EMPTY";
		}
		//LAST NAME VALIDATION
		if(isset($lnam) && $lnam != ""){
			if((preg_match("/^[a-zA-Z ]*$/",$nam))){
				
			}else{
				$error[] = "WHITE SPACES AND INTEGERS ARE NOT ALLOWED IN LAST NAME AS WELL";
			}
		}else{
			$error[] = "NAME SHOULD NOT BE EMPTY IN LAST NAME AS WELL";
		}
		//EMAIL VALIDATION
		if(isset($emai) && $emai!=""){
			if (!filter_var($emai, FILTER_VALIDATE_EMAIL)) {
			$error[] = "INVALID EMAIL FORMAT"; }
		}else{
			$error[] = "EMAILS SHOULD NOT BE EMPTY";
		}
		//CONTACT NUMBER VALIDATION
		if(isset($cn) && $cn!=""){
		 /* if (preg_match('/^[0-9]{12}+$/', $cn)) {
			
			}else{	
			$error[] = "INVALID CONTACT FORMAT"; 
			}  */
		}else{
			$error[]="CONTACT NUMBER SHOULD NOT BE EMPTY";
		}
		if(isset($error) && count($error > 0)){
			foreach($error as $value){
			echo "error: $value<br>";
		}}
		else{
			echo"THERE IS NO ERROR<br>";
			echo "INSERTING RECORDS.................<br>";
			$ins = "INSERT INTO tbl_data (name, last_name, email, contact_no) value ('$nam','$lnam','$emai','$cn')";
			if(mysqli_query($conn,$ins)){
				echo "DATA INSERTED";
			}else{
			print mysqli_error($conn);
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
<div id="d1">
<h1 id="head">ADD YOUR DATA</h1>
<form method="post">
<input type ="text" name="name" class="inp" placeholder="Enter Your Name Here" value="<?php if(isset($nam)){echo trim($nam);} ?>"/>
<input type ="text" name="lname" class="inp" placeholder="Enter Your Last Name Here" value="<?php if(isset($lnam)){echo trim($lnam);} ?>"/>
<input type ="text" name="email" class="inp" placeholder="Enter Your Email Here" value="<?php if(isset($emai)){echo trim($emai);} ?>"/>
<input type ="text" name="contact" class="inp" placeholder="Enter Your Contact No. Here" value="<?php if(isset($cn)){echo trim($cn);} ?>"/>
<br><br>
<input type ="submit" name="sub" class="btn" value="SUBMIT"/>
<input type ="submit" name="sd" class="btn" formaction="login.php" value="SHOW DATA"/>
</div>
</body>
</html>
