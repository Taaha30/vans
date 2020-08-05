<?php
require '../config.php';

if ($_POST["action"] == "deleteImg") {
	deleteImg($connection);
}

function deleteImg($conn){
	$values = json_decode(stripslashes($_POST['data']));
	$fvals = array();
	foreach ($values as $key => $value) {
		array_push($fvals, $value);
	}
	$target_dir = "../assets/img";
	$target_final = $target_dir."/uploads/";
	$imglib_file = $target_final . basename($fvals[1]);
	 if (file_exists($imglib_file)) {
	 	$query = "DELETE FROM images WHERE uid = '".$fvals[0]."';";
		$query_result = mysqli_query($conn, $query);
		if(!$query_result){
			echo "<span class='fail'>Command failed: " . mysqli_error($conn)."<br>Error ref. code: " . mysqli_errno($conn)."</span>";
		}else{
	    	unlink($imglib_file);
	    	echo '<span class="success">Image '.$fvals[1].' has been deleted successfully.</span>';
	    }
	  } else {
	    echo '<span class="fail">Could not delete '.$fvals[1].', file does not exist.</span>';
	  }
	  mysqli_close($conn);
}
?>