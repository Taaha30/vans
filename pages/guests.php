<?php
	require './config.php';
	include './api/functions.php';
	include './blocks/editblock.php';
	$guest = guestsCall($connection);
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
		<h1> Host & Guest</h1>
		<input type="text" class="searchnext" placeholder="search..." />
		<div class="act-buts" onclick="scrollToDiv('addevws')">Add new</div>
	</div>

	<div class="dash-box" id="guest-table">
		<?php
			include './blocks/guests/gtable.php';
			reloadGuests($guest);
		?>
	</div>
	<div class="dash-title">
		<h1>Add new Host or Guest</h1>
	</div>
	<div class="dash-box" id="addevws">
		<?php include './blocks/guests/addnew.php';?>
	</div>
</div>
<div id="edithide">
	<?php
		include './blocks/guests/gedit.php';
	?>
</div>
<script type="module" src="./scripts/middleware.js"></script>
