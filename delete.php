<?php
$conn =mysqli_connect("localhost","root","","db_er_system");
if(isset($_POST['sub'])){

	$id = $_POST['id'];
	if(!$conn){
		die("Connection Failed".mysqli_connect_error);
	}
	else{
		//echo "Connected";
			
			$ins = "DELETE FROM tbl_data WHERE id = $id";
			if(mysqli_query($conn,$ins)){
				echo " DATA DELETED";
			}else{
			print mysqli_error($conn);
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
<h1 id="head">DELETE YOUR DATA</h1>
<br><br>
<form method="post">
<input type ="text" name="id" class="inp" placeholder="Enter Your ID Here" value="<?php if(isset($nam)){echo trim($nam);} ?>"/>
<br><br><br>
<input type ="submit" name="sub" class="btn" value="DELETE"/>
<input type ="submit" name="sd" class="btn" formaction="showdata.php" value="BACK TO SHOW DATA"/>

</div>
</body>
</html>
