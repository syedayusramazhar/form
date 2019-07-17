<?php
$conn =mysqli_connect("localhost","root","","db_er_system");
$ID=$_GET['id'];
$query1="select * from tbl_data where id='{$ID}'";
$result=mysqli_query($conn,$query1);
$eid=mysqli_fetch_row($result);

?>
<?php

if(isset($_POST['sub'])){

	$id = $_POST['id'];
	if(!$conn){
		die("Connection Failed".mysqli_connect_error);
	}
	else{
		//echo "Connected";
			
			$ins = "DELETE FROM tbl_data WHERE id = $id";
			if(mysqli_query($conn,$ins)){
				
				header('location:showdata.php');
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
<input type ="text" name="id" class="inp" placeholder="Enter Your ID Here" value="<?php echo $eid[0]; ?>"/>
<br><br><br>
<input type ="submit" name="sub" class="btn" value="DELETE"/>
<input type ="submit" name="sd" class="btn" formaction="showdata.php" value="BACK TO SHOW DATA"/>

</div>
</body>
</html>
