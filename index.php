<?php
session_start();
require './config.php';
// $user_check = $_SESSION['login_user'];

//   $ses_sql = mysqli_query($connection, "select password from admin");
//   $passwordarr = [];
//   while($rows = mysqli_fetch_assoc($ses_sql)){
//       $passwordarr[] = $rows["password"];
//   }
//   if(!password_verify($user_check, $passwordarr[0]) && $_GET['uri'] != "login"){
//   mysqli_close($connection); 
//   header('Location: login'); 
// }

include 'seolinks.php';
?>
</head>
	<body>

		<div id="container">
			<?php 
			include './blocks/leftmenu.php';
			include './blocks/notifs.php';
			include 'routes.php';
			?>