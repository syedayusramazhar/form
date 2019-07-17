
<html>
<head>
</head>
<body>
<a href="index.php" class="previous">&laquo; BACK TO INDEX PAGE</a>

<?php
$conn =mysqli_connect("localhost","root","","db_er_system");
$query = "SELECT id, name, last_name, email, contact_no FROM tbl_data";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)>0){
	echo "<table border='1' style='width:100%;'><tr id='tr'><th>ID</th><th>NAME</th><th>LAST NAME</th><th>EMAIL</th><th>CONTACT NUMBER</th><th colspan='2'>MODIFICATIONS</th></tr>";
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


?>

</body>
</html>