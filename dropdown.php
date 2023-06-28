<?php
$search_value = $_POST["input"];


$conn = mysqli_connect("localhost","root","","citypopulation") or die("connection failed");
$sql ="SELECT * FROM cities WHERE City LIKE '{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL query faild.");
$output = "";
if(mysqli_num_rows($result) > 0){
	$output = '<table border="1" width="11%" cellspacing="0" cellpadding="1px">';
	
	while($row = mysqli_fetch_assoc($result)){
		$output .= "<tr><td>{$row['City']}</td></tr>";
	}
	$output .= "</table>";
	mysqli_close($conn);
	echo $output;
}else{
	echo "<h2> No record found</h2>";
}
?>