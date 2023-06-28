<?php
$search_value = $_POST["search"];


$conn = mysqli_connect("localhost","root","","citypopulation") or die("connection failed");
$sql ="SELECT * FROM cities WHERE City LIKE '{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL query faild.");
$output = "";
if(mysqli_num_rows($result) > 0){
	$output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
	<tr><th>Rank</th><th>City</th><th>Population_2011</th><th>Population_2001</th><th> State_or_union_territory</th></tr>';
	
	while($row = mysqli_fetch_assoc($result)){
		$output .= "<tr><td>{$row['Rank']}</td><td>{$row['City']}</td><td>{$row['Population_2011_']}</td><td>{$row['Population_2001_']}</td><td>{$row['State_or_union_territory']}</td></tr>";
	}
	$output .= "</table>";
	mysqli_close($conn);
	echo $output;
}else{
	echo "<h2> No record found</h2>";
}
?>