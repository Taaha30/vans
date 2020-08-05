<?php 
	require './config.php';
	include './api/functions.php';
	include './blocks/editblock.php';
	$data = notifsCall($connection3);
?>
<script type="text/javascript" src="./assets/script/addnew.js"></script>

<div class="page-in" id="runs">
	<script type="text/javascript">
		$(document).on("keyup", ".searchnext", function() {
		    var value = $(this).val().toLowerCase();
		    $(this).parent().next().find(".runnames .searchasset").filter(function() {
		    	console.log($(this));
		      $(this).parent().parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
		  });
	</script>
	<div class="dash-title">
		<h1>Notifcations</h1>
		<input type="text" class="searchnext" placeholder="search..." />
		<div class="act-buts" onclick="scrollToDiv('addnotif')">Send new notification</div>
	</div>

	<div class="dash-box" id="notif-table">
		<?php
			include './blocks/notifs/notiftable.php';
			if (empty($data)) {
				echo "No notifications yet.";
			}else{
				reloadNotif($data);
			}
		?>
	</div>
	<div class="dash-title">
		<h1>Send new notification</h1>
	</div>
	<div class="dash-box" id="addnotif">
		<?php include './blocks/notifs/addnew.php';?> 
	</div>
</div>
<div id="edithide">
	<?php
		include './blocks/notifs/notifedit.php';
	?>
</div>
<script type="module" src="./scripts/middleware.js"></script>

<script>
localStorage.removeItem("notifimage");
function sendNotif(datasend){
	console.log(datasend);
	$.ajax({
	    type: "POST",
	    // url: "https://fcm.googleapis.com/fcm/send",
	    headers : {
                Authorization : "key=AIzaSyDlJXFt4--40HBGp9_MRuH6pR9ZCTqbRf4",
            },
        contentType : "application/json",
	    data: JSON.stringify({
			    "to": "/topics/trinity",
			    "notification": datasend
			}),
		success: function(data) {
	        console.log(response);
	    },
	    error : function(xhr, status, error) {
            console.log(xhr);                                      
        }
	});
}
</script>