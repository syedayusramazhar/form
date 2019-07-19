<!-------id get------>

<?php
session_start();
if(isset($_SESSION['susername'])){
$conn =mysqli_connect("localhost","root","","db_er_system");

$ID=$_GET['id'];
$query1="select * from tbl_data where id='{$ID}'";
$result=mysqli_query($conn,$query1);
$eid=mysqli_fetch_row($result);


if(isset($_POST['sub'])){
	$nam = $_POST['name'];
	$lnam = $_POST['lname'];
	$emai = $_POST['email'];
	$cn = $_POST['contact'];
	$id = $_POST['id'];
	$uname = $_SESSION['susername'];
	$paswd= $_SESSION['spassword'];
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
			$error[] = "CONTACT NUMBER SHOULD NOT BE EMPTY";
		}
		if(isset($error) && count($error > 0)){
			foreach($error as $value){
			echo "error: $value<br>";
		}}
		else{
			echo"THERE IS NO ERROR<br>";
			$ins = "UPDATE tbl_data SET name = '$nam', last_name = '$lnam', email = '$emai', contact_no = '$cn' WHERE id = '$id'";	
			if(mysqli_query($conn,$ins)){
				header('location:showdata.php');
			}else{
			print mysqli_error($conn);
				}
			}
		}
}}else{
	header('location:login.php');
}

?>
<html>
<head>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<div id="d1">
<h1 id="head">UPDATE YOUR DATA</h1>
<form method="post">
<input type ="text" name="id" class="inp" placeholder="Enter Your ID Here" value="<?php echo $eid[0]; ?>"/>
<input type ="text" name="name" class="inp" placeholder="En"  value="<?php echo $eid[1]; ?>"/>
<input type ="text" name="lname" class="inp" placeholder="Enter Your ter Your Name Here"Last Name Here"  value="<?php echo $eid[2]; ?>"/>
<input type ="text" name="email" class="inp" placeholder="Enter Your Email Here"  value="<?php echo $eid[3]; ?>"/>
<input type ="text" name="contact" class="inp" placeholder="Enter Your Contact No. Here"  value="<?php echo $eid[4]; ?>"/>
<input type ="submit" name="sub" class="btn" value="UPDATE"/>
<input type ="submit" name="sd" class="btn" formaction="showdata.php" value="BACK TO SHOW DATA"/>
</div>
</body>
</html>
