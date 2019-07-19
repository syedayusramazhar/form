
<html>
<head>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<h1 id="head">Welocme TO Show Data Page</h1>
<!--- <a href="index.php" class="previous">&laquo; BACK TO INDEX PAGE</a> -->
<?php
session_start();
if(isset($_SESSION['susername'])){
$conn =mysqli_connect("localhost","root","","db_er_system");
$query = "SELECT id, name, last_name, email, contact_no FROM tbl_data";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)>0){
	

	echo "<table style='width:100%;border: solid 3px black'><tr id='tr'><th>ID</th><th>NAME</th><th>LAST NAME</th><th>EMAIL</th><th>CONTACT NUMBER</th><th colspan='2'>MODIFICATIONS</th></tr>";
	while($row = mysqli_fetch_assoc($result)){
		echo "<tr>
		<td>".$row["id"]."</td>
		<td>".$row["name"]."</td>
		<td>".$row["last_name"]."</td>
		<td>".$row["email"]."</td>
		<td>".$row["contact_no"]."</td>
	  <td><a href='edit.php?id=$row[id]'>EDIT</a></td>|<td> <a href='delete.php?id=$row[id]'>Delete</a></td>
		</tr>";
	}
		echo "</table>";
}
	else{
	echo "No ROW TO DISPLAY";
		}
}else{
	header('location:login.php');
}

?>
<?php
if(isset($_POST['inpage'])){
	header("Location:index.php");
}if(isset($_POST['lg'])){
	header("Location:logout.php");
}
?>
<form action="" method="post">
<input type ="submit" name="inpage" class="btn" value="BACK TO INDEX PAGE"/><br />
<input type ="submit" name="lg" class="btn" value="LOG-OUT" />
</form>
</body>
</html>