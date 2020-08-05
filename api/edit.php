<?php
require '../config.php';
function updateQ($tablename, $fields, $condition, $conn, $msg){
	$query = "update ".$tablename." set ";
    foreach($fields as $key => $value) {
        $fields[$key] = " `$key` = '".mysqli_escape_string($conn, $value)."' ";
    }
    $query .= implode(" , ",array_values($fields))." where ".$condition.";";
	$query_result = mysqli_query($conn, $query);
	if ($query_result) {
		echo "<span class='success'>".$msg."</span>";
	}else{
		echo "<span class='fail'>Command failed: " . mysqli_error($conn)."<br>Error ref. code: " . mysqli_errno($conn)."</span>";
	}
	mysqli_close($conn);
}

//Slots
function updateSlots($dandt, $conn){
	$values = json_decode(stripslashes($_POST['data']));
	$fvals = array();
	foreach ($values as $key => $value) {
		$fvals[$key] = htmlspecialchars(stripslashes(trim($value)));
	}
	array_push($fvals, $dandt);
	extract($fvals);

	$table = "slots";
	$fields = array('name' => $slotname, 'detail' => $slotdetail, 'maxslots' => $slotmax, 'updatedon' => $dandt);
	$msg = "Slot updated successfully";
	updateQ($table, $fields, "uid = '".$slotid."'", $conn, $msg);
}

if ($_POST["action"] == "updateSlots") {
	updateSlots($datetime, $connection);
}

//Coupons
function updateCoupons($dandt, $conn){
	$values = json_decode($_POST['data']);
	$fvals = array();
	foreach ($values as $key => $value) {
		array_push($fvals,  htmlspecialchars(stripslashes(trim($value))));
	}
	array_push($fvals, $dandt);
	$table = "coupons";
	$fields = array('code' => $fvals[0], 'info' => $fvals[1], 'codeval' => $fvals[2], 'type' => $fvals[3], 'maxuse' => $fvals[4], 'expiry' => $fvals[5], 'updatedon' => $dandt);
	$msg = "Coupon updated successfully";
	updateQ($table, $fields, "uid = '".$fvals[6]."'", $conn, $msg);
}

if ($_POST["action"] == "updateCoupons") {
	updateCoupons($datetime, $connection);
}

//EWS
function updateEws($dandt, $conn){
	$values = json_decode($_POST['data']);
	$fvals = array();
	foreach ($values as $key => $value) {
		$fvals[$key] = htmlspecialchars(stripslashes(trim($value)));
	}
	array_push($fvals, $dandt);
	extract($fvals);
	var_dump($fvals);
	if(strpos($fvals['image'], "assets/uploads/") !== true){
		$fvals['image'] = addImgTo($fvals['image'],$fvals['name']);
	}

	$fields = array('name' => $fvals['name'], 'image' => $fvals['image'], 'date' => $fvals['date'], 'time' => $fvals['time'], 'tags' => $fvals['tags'], 'hname' => $fvals['host'],
	'gname' => $fvals['guest'],'link' => $fvals['link'], 'series' => $fvals['series'], 'updatedon' => $dandt);

	$table = "events";
	$msg = "Event updated successfully";
	updateQ($table, $fields, "uid = '".$fvals['uid']."'", $conn, $msg);
}

if ($_POST["action"] == "updateEws") {
	updateEws($datetime, $connection);
}

///tags
///
///
///
function updateBlog($dandt, $conn){
	$values = json_decode($_POST['data']);
	$fvals = array();
	foreach ($values as $key => $value) {
		$fvals[$key] = htmlspecialchars(stripslashes(trim($value)));
	}
	array_push($fvals, $dandt);
	extract($fvals);
	var_dump($fvals);
	if(strpos($fvals['image'], "assets/uploads/") !== true){
		$fvals['image'] = addImgTo($fvals['image'],$fvals['name']);
	}

	$fields = array('heading' => $fvals['heading'],'author' => $fvals['author'],'blog' => $fvals['blog'],'link' => $fvals['link'],'updatedon' => $dandt);

	$table = "blog";
	$msg = "Event updated successfully";
	updateQ($table, $fields, "uid = '".$fvals['uid']."'", $conn, $msg);
}
if ($_POST["action"] == "updateBlog") {
	updateBlog($datetime, $connection);
}

function updateStudy($dandt, $conn){
	$values = json_decode($_POST['data']);
	$fvals = array();
	foreach ($values as $key => $value) {
		$fvals[$key] = htmlspecialchars(stripslashes(trim($value)));
	}
	array_push($fvals, $dandt);
	extract($fvals);
	var_dump($fvals);
	if(strpos($fvals['image'], "assets/uploads/") !== true){
		$fvals['image'] = addImgTo($fvals['image'],$fvals['name']);
	}

	$fields = array('title' => $fvals['title'],'intro' => $fvals['intro'],'para' => $fvals['para'],'updatedon' => $dandt);

	$table = "casestudy";
	$msg = "Event updated successfully";
	updateQ($table, $fields, "uid = '".$fvals['uid']."'", $conn, $msg);
}
if ($_POST["action"] == "updateStudy") {
	updateStudy($datetime, $connection);
}


function updateMedia($dandt, $conn){
	$values = json_decode($_POST['data']);
	$fvals = array();
	foreach ($values as $key => $value) {
		$fvals[$key] = htmlspecialchars(stripslashes(trim($value)));
	}
	array_push($fvals, $dandt);
	extract($fvals);
	var_dump($fvals);
	if(strpos($fvals['logo'], "assets/uploads/") !== true){
		$fvals['logo'] = addImgTo($fvals['logo'],$fvals['title']);
	}

	$fields = array('logo' => $fvals['logo'],'title' => $fvals['title'],'para' => $fvals['para'],'link' => $fvals['link'],'updatedon' => $dandt);

	$table = "media";
	$msg = "Event updated successfully";
	updateQ($table, $fields, "uid = '".$fvals['uid']."'", $conn, $msg);
}
if ($_POST["action"] == "updateMedia") {
	updateMedia($datetime, $connection);
}






function updateSeries($dandt, $conn){
	$values = json_decode($_POST['data']);
	$fvals = array();
	foreach ($values as $key => $value) {
		$fvals[$key] = htmlspecialchars(stripslashes(trim($value)));
	}
	array_push($fvals, $dandt);
	extract($fvals);
	var_dump($fvals);
	if(strpos($fvals['image'], "assets/uploads/") !== true){
		$fvals['image'] = addImgTo($fvals['image'],$fvals['name']);
	}

	$fields = array('name' => $fvals['name'], 'image' => $fvals['image'], 'about' => $fvals['about'],'updatedon' => $dandt);

	$table = "series";
	$msg = "Event updated successfully";
	updateQ($table, $fields, "uid = '".$fvals['uid']."'", $conn, $msg);
}
if ($_POST["action"] == "updateSeries") {
	updateSeries($datetime, $connection);
}


function updateGuests($dandt, $conn){
	$values = json_decode($_POST['data']);
	$fvals = array();
	foreach ($values as $key => $value) {
		$fvals[$key] = htmlspecialchars(stripslashes(trim($value)));
	}
	array_push($fvals, $dandt);
	extract($fvals);
	var_dump($fvals);
	if(strpos($fvals['image'], "assets/uploads/") !== true){
		$fvals['image'] = addImgTo($fvals['image'],$fvals['name']);
	}

	$fields = array('name' => $fvals['name'], 'gtype' => $fvals['hostorg'], 'image' => $fvals['image'],'about' => $fvals['hostabout'],'number' => $fvals['contact'],'instagram' => $fvals['instagram'],
	'linkedin' => $fvals['linkedin'],'twitter' => $fvals['twitter'],'facebook' => $fvals['facebook'],'updatedon' => $dandt);

	$table = "kliveguest";
	$msg = "Event updated successfully";
	updateQ($table, $fields, "uid = '".$fvals['uid']."'", $conn, $msg);
}
if ($_POST["action"] == "updateGuests") {
	updateGuests($datetime, $connection);
}



function addImgTo($imgvar, $planname){
		$planhypen = preg_replace('#[ -]+#', '-', $planname);
        define('UPLOAD_DIR', 'C:/xampp/htdocs/katapult/mainsite/assets/uploads/');
        $upload_loc = "./assets/uploads/";
        $image_parts = explode(";base64,", $imgvar);
        $image_type_aux = explode("/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $uniqid = uniqid();
        $imgvar_file = UPLOAD_DIR . $planhypen . "-" . $uniqid . '.'.$image_type;
        $imgvar_return = $upload_loc . $planhypen . "-" . $uniqid . '.'.$image_type;
        file_put_contents($imgvar_file, $image_base64);

        return $imgvar_return;
}
 function updateEvents(){
	 $values = json_decode($_POST['data']);
	 $fvals = array();
	 foreach ($values as $key => $value) {
		 $fvals[$key] = htmlspecialchars(stripslashes(trim($value)));
	 }
	 array_push($fvals, $dandt);
	 extract($fvals);

	 $table = "events";

	 $fields = array('name' => $fvals[0], 'image' => $fvals[1], 'date' => $fvals[2], 'time' => $fvals[3], 'tags' => $fvals[4], 'hname' => $fvals[5],'gname' => $fvals[6],
	 'link' => $fvals[7], 'series' => $fvals[8], 'updatedon' => $dandt);
	 $msg = $ewstype." updated successfully";
 	updateQ($table, $fields, "uid = '".$fvals[9]."'", $conn, $msg);
 }
