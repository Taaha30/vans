<?php
//dashboard
//Website views
include './api/config.php';

function blogCall(){
    $fetch = new Connection();

	$query = "SELECT uid, heading, author, blog, link, block from blog ORDER BY createdon DESC";

	$fetch->sqlQuery($query);
    $fetch_types = $fetch->fetch();

	$rows = array();
	foreach ($fetch_types as $key => $value) {
		$rows[$key] = $value;
	}
	return $rows;
}


function studyCall(){
    $fetch = new Connection();

	$query = "SELECT uid, title, intro, para, block from casestudy ORDER BY createdon DESC";

	$fetch->sqlQuery($query);
    $fetch_types = $fetch->fetch();

	$rows = array();
	foreach ($fetch_types as $key => $value) {
		$rows[$key] = $value;
	}
	return $rows;
}



function mediaCall(){
    $fetch = new Connection();

	$query = "SELECT uid,logo, title, para,link, block from media ORDER BY createdon DESC";

	$fetch->sqlQuery($query);
    $fetch_types = $fetch->fetch();

	$rows = array();
	foreach ($fetch_types as $key => $value) {
		$rows[$key] = $value;
	}
	return $rows;
}
