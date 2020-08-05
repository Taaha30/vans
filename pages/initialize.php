<?php 
	require './config.php';
	include './api/functions.php';
	include './blocks/editblock.php';
	$inidata = initializedCall($connection);
	// var_dump($inidata);
?>
<div class="page-in" id="participants">
	<h1>Initialized users</h1>
	<div class="dash-box" id="partis-table">
		<?php
			include './blocks/initialize/initialized.php';
			if (empty($inidata)) {
				echo "No participants found.";
			}else{
				reloadInitialized($inidata);
			}
		?>
		<div id="paging-first-datatable"></div>
	</div>
</div>
<script type="module" src="scripts/middleware.js"></script>
<script type="text/javascript" src="./assets/script/addnew.js"></script>
<script>
$('#partis-table table').datatable({
    pageSize: 10,
    sort: [true, true, false, false, false, true],
    filters: [true, false, 'select', true, false, false],
    filterText: 'Type to filter... ',
    pagingDivSelector: "#paging-first-datatable"
});
</script>
