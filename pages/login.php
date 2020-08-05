<?php
require './config.php';
if(isset($_SESSION['login_user'])){
        header("location: dashboard");
      }

?>

<style type="text/css">
	#leftmenu{display:none;}
	.main-cont{width:100%!important;left:0!important;}
	.logout{display:none!important;}
</style>
<div class="loginbox dash-box">
<div class="logint">
<div id="logo">
	<p><img src="http://trinityltmmc.in/images/trinitylogo1.png"></p>
</div>
<form class="login-form validateform">
<label class="inline-form" style="display: inline;">
<input type="Password" placeholder="Password">
<span class="validate"></span>
</label>
<button type="button" value="Submit" name="butAssignProd" id="logintry" onclick="loginTry(this.id);">Login</button>
</form>
</div>
<script type="text/javascript">
$(document).on("keyup","input",function(event) {
	console.log("press");
    if (event.keyCode == 13) {
console.log("enters");
        $("button[name=butAssignProd]").click();
	return false;
    }
});  
</script>

<script type="module" src="scripts/middleware.js"></script>
<script type="text/javascript" src="./assets/script/addnew.js"></script>