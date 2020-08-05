<?php
session_start();
include './config.php';
function inserQ($tablename, $cols, $values, $msg, $action){
    $data = new Connection();
	$time = $data->timezone();
	if ($action == "addUsers") {
		$query = "INSERT INTO ".$tablename."(".implode(',', $cols).", createdon, lastlogin) VALUES (\"".implode('","', $values)."\", \"$time\", \"$time\")";
	}else{
		$query = "INSERT INTO ".$tablename."(".implode(',', $cols).", createdon) VALUES (\"".implode('","', $values)."\", \"$time\")";
	}
    $insert = $data->sqlQuery($query);
    $result = $data->run();

    // $response_string = stripslashes(htmlspecialchars(filter_var($result, FILTER_SANITIZE_STRING)));
    // $final = $data->response($response_string, $action);
    if($result === true){
    	echo "<span class='success'>".$msg."</span>";
    }else{
    	echo "<span class='fail'>Something wrong happened! Please try again.</span>";
    }
}

// event page
// function addBlog(){
//
// 	$values = json_decode(stripslashes($_POST['data']), true);
// 	var_dump($values);
//
// 	$fvals = array();
// 	foreach ($values as $key => $value) {
// 		array_push($fvals, stripslashes(trim($value)));
// 	}
// 	// array_pop($fvals);
// 	$planimg = addImgTo($fvals[1],$fvals[0]);
//     unset($fvals[1]);
//  	array_push($fvals, $planimg);
// 	var_dump($fvals);
//
// 	$table = "events";
// 	$cols = array('heading', 'author', 'blog', 'link');
// 	$msg = "Event added!";
// 	inserQ($table, $cols, $fvals, $msg, $_POST["action"]);
// }
//
// if (isset($_POST["action"]) && $_POST["action"] == "addBlog") {
// 	addBlog();
// }


//tags
function addBlog(){
	$values = json_decode(stripslashes($_POST['data']), true);
	$fvals = array();
	foreach ($values as $key => $value) {
		array_push($fvals, stripslashes(trim($value)));
	}
 var_dump($fvals);

	$table = "blog";
	$cols = array('heading', 'author', 'blog', 'link');
	$msg = "inserted successfully";
	inserQ($table, $cols, $fvals, $msg, $_POST["action"]);
}
if (isset($_POST["action"]) && $_POST["action"] == "addBlog") {
	addBlog();
}



function addStudy(){
	$values = json_decode(stripslashes($_POST['data']), true);
	$fvals = array();
	foreach ($values as $key => $value) {
		array_push($fvals, stripslashes(trim($value)));
	}
 var_dump($fvals);

	$table = "casestudy";
	$cols = array('title', 'intro', 'para');
	$msg = "inserted successfully";
	inserQ($table, $cols, $fvals, $msg, $_POST["action"]);
}
if (isset($_POST["action"]) && $_POST["action"] == "addStudy") {
	addStudy();
}

function addMedia(){
	$values = json_decode(stripslashes($_POST['data']), true);
	$fvals = array();
	foreach ($values as $key => $value) {
		array_push($fvals, stripslashes(trim($value)));
	}
	// array_pop($fvals);
var_dump($fvals);
   $planimg = addImgTo($fvals[0],'media');
     unset($fvals[0]);
 	array_push($fvals, $planimg);

	$table = "media";
	$cols = array('title','para','link', 'logo');
	$msg = "media added!";
	inserQ($table, $cols, $fvals, $msg, $_POST["action"]);
}
if (isset($_POST["action"]) && $_POST["action"] == "addMedia") {
	addMedia();
}















/// series
function addSeries(){
	$values = json_decode(stripslashes($_POST['data']), true);
	$fvals = array();
	foreach ($values as $key => $value) {
		array_push($fvals, stripslashes(trim($value)));
	}
	// array_pop($fvals);

   $planimg = addImgTo($fvals[1],$fvals[0]);
     unset($fvals[1]);
 	array_push($fvals, $planimg);

	$table = "series";
	$cols = array('name','about','image');
	$msg = "Series added!";
	inserQ($table, $cols, $fvals, $msg, $_POST["action"]);
}
if (isset($_POST["action"]) && $_POST["action"] == "addSeries") {
	addSeries();
}

/// guest





function addImgTo($imgvar, $planname){
		$planhypen = preg_replace('#[ -]+#', '-', $planname);
        define('UPLOAD_DIR', 'C:/xampp/htdocs/test/mainsite/assets/uploads/');
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

?>
