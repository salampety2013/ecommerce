<?php
require_once('connection.php');

function get_result($conn , $term){	
	$query = "SELECT * FROM products WHERE name_en LIKE '%".$term."%' ORDER BY ID ASC";
	$result = mysqli_query($conn, $query);	
	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
	return $data;	
}

if (isset($_GET['term'])) {
	$getCity = get_result($conn, $_GET['term']);
	$cityList = array();
	foreach($getCity as $city){
		$cityList[] = $city['name_en'];
	}
	echo json_encode($cityList);
}
?>