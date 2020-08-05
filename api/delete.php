<?php
require '../config.php';
function deleteQ($tablename, $valueid, $conn, $msg){
	var_dump($valueid);
	$query = "DELETE FROM ".$tablename." WHERE uid = '".$valueid[0]."';";
	$query_result = mysqli_query($conn, $query);
	if ($query_result) {
		echo "<span class='success'>".$msg."</span>";
	}else{
		echo "<span class='fail'>Command failed: " . mysqli_error($conn)."<br>Error ref. code: " . mysqli_errno($conn)."</span>";
	}
	mysqli_close($conn);
}

//Run types
function deleteSlot($dandt, $conn){
	$values = json_decode(stripslashes($_POST['data']));
	$fvals = array();
	foreach ($values as $key => $value) {
		array_push($fvals, $value);
	}
	$table = "slots";
	$msg = "Slot dleted successfully";
	deleteQ($table, $fvals, $conn, $msg);
}
if ($_POST["action"] == "deleteSlot") {
	deleteSlot($datetime, $connection);
}

//Runs
function deleteEws($dandt, $conn){
	$values = json_decode(stripslashes($_POST['data']));
	$fvals = array();
	foreach ($values as $key => $value) {
		array_push($fvals, $value);
	}
	var_dump($_POST['data']);
	$table = "evenws";
	$msg = "Deleted successfully";
	deleteQ($table, $fvals, $conn, $msg);
}
if ($_POST["action"] == "deleteEws") {
	deleteEws($datetime, $connection);
}

//Coupons
function deleteCoupon($dandt, $conn){
	$values = json_decode(stripslashes($_POST['data']));
	$fvals = array();
	foreach ($values as $key => $value) {
		array_push($fvals, $value);
	}
	$table = "coupons";
	$msg = "Coupon deleted successfully";
	deleteQ($table, $fvals, $conn, $msg);
}
if ($_POST["action"] == "deleteCoupon") {
	deleteCoupon($datetime, $connection);
}
