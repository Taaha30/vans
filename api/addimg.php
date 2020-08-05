<?php
require '../config.php';

if (isset($_FILES["file"])) {
	verifyImg($_FILES["file"], $connection, $datetime);
}
function verifyImg($userfile, $conn, $dt){
	$target_dir = "../assets/img";
	$target_final = $target_dir."/uploads/";
	
	$imglib_file = $target_final . basename($userfile["name"]);
	$imglibFile = $userfile["name"];
	$imglibFiletype = $userfile["type"];
	$imglibFilesize = $userfile["size"];
	$uploadOk = 1;
	$imglibFileType = pathinfo($imglib_file,PATHINFO_EXTENSION);
	$check = getimagesize($userfile["tmp_name"]);
	$imgdimensions = $check[0]." x ".$check[1];
	if($check !== false) {
		$errmsgs = "";
		$uploadOk = 1;
	} else {
		$errmsgs = $errmsgs ."File ".$imglibFile." is not an image.<br>";
		$uploadOk = 0;
	}
	// Check if file already exists
	if (file_exists($target_final . $imglibFile)) {
		$errmsgs = $errmsgs ."File ".$imglibFile." already exists.<br>";
		$uploadOk = 0;
	}
	// Check file size
	if ($userfile["size"] > 600000) {
		$errmsgs = $errmsgs ."Your file ".$imglibFile." is too large (above 6mb).<br>";
		$uploadOk = 0;
	}
	// Check file name length
	if (strlen($imglibFile)>500) {
		$errmsgs = $errmsgs ."Your file ".$imglibFile." name has more than 200 characters. Please rename it to less than 200.<br>";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imglibFileType != "jpg" && $imglibFileType != "JPG" && $imglibFileType != "png" && $imglibFileType != "PNG" && $imglibFileType != "jpeg" && $imglibFileType != "JPEG" && $imglibFileType != "gif" && $imglibFileType != "GIF" ) {
		$errmsgs = $errmsgs ."Your image file ".$imglibFile." does not have a valid image file extension, only JPG, JPEG, PNG & GIF files are allowed.<br>";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$errmsgs = $errmsgs .'Sorry, your file was not uploaded.';
		$imgarray = $uploadOk.";". $errmsgs;
	// if everything is ok, try to upload file
	} else{
		$returnaddimg = addImg($imglibFile, $imglibFiletype, $imglibFilesize, $imgdimensions, $userfile["tmp_name"], $target_final, $dt, $conn);
		if($returnaddimg == 1){
			$errmsgs = "Image added successfully";
			$imgarray = $uploadOk.";". $errmsgs.";". $target_final.$imglibFile.";". $imglibFiletype.";". $imglibFilesize.";". $imgdimensions;
		}else{
			$uploadOk = 0;
			$errmsgs = "Image file upload failed ".$returnaddimg;
			$imgarray = $uploadOk.";". $errmsgs;
		}
	}
	echo json_encode($imgarray);
}

function addImg($imglibFile, $imglibFiletype, $imglibFilesize, $imgdimensions, $filetemp, $target_final, $dt, $conn){
	$query = "INSERT INTO images(image, type, size, dimension, createdon) VALUES ('$imglibFile', '$imglibFiletype', '$imglibFilesize', '$imgdimensions', '$dt')";
	$query_result = mysqli_query($conn, $query);
	if(!$query_result){
		$errorno = mysqli_errno($conn).mysqli_error($conn);
		return $errorno;	
	}else{
		move_uploaded_file($filetemp, $target_final . $imglibFile);
		return 1;
	}
	mysqli_close($conn);
}
?>