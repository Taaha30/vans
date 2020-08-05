<?php
require './config.php';
	include './api/functions.php';
	include './blocks/editblock.php';
$data = getTiws($connection2); 
?>
<div class="page-in" id="tiws">
	<div class="dash-title">
		<h1>Registered enquiries</h1>
	</div>
	<div class="dash-box" style="flex-flow:column;">
		<?php
			include './blocks/tiws/list.php';
			if (empty($data)) {
				echo "No enquiries found.";
			}else{
				reloadTiws($data);
			}
		?>
		<div id="paging-first-datatable"></div>
	</div>
</div>
<script type="module" src="scripts/middleware.js"></script>
<script type="text/javascript" src="./assets/script/addnew.js"></script>
<script>
$('#delegates table').datatable({
    pageSize: 10,
    sort: [false, false, false, false],
    filters: [true, 'select', true, false],
    filterText: 'Type to filter... ',
    pagingDivSelector: "#paging-first-datatable"
});
</script>