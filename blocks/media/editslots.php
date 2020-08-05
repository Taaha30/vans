<div id="editslots">
	<div class="dash-title">
		<h1>Editing <?php echo $_GET["name"]; ?></h1>
	</div>
<div class="dash-box">
		<form class="validateform">
			<?php
			foreach ($data as $datakey => $datavalue) {
				if ($datavalue["uid"] == $_GET["data"]) {
				echo '<label class="inline-form">
				Slot name<br>
				<input type="text" name="slotname" value="'.$datavalue["name"].'" required>
				<span class="validate"></span>
				</label>
				<label class="inline-form">
				Slot details (optional)<br>
				<input type="text" name="slotdetail" value="'.$datavalue["detail"].'">
				<span class="validate"></span>
				</label>
				<label class="inline-form">
				Maximum allowed participants<br>
				<input type="number" name="slotmax" value="'.$datavalue["maxslots"].'" required>
				<span class="validate"></span>
				</label>
				<label class="inline-form">
				<input type="hidden" name="slotid" value="'.$datavalue["uid"].'">
				</label>
				<label class="inline-form">
				<input type="hidden" name="ewsid" value="'.$datavalue["eveid"].'">
				</label><br>';
					}
				}
			?>
			<div id="error"></div>
			<button type="button" value="Submit" id="updateslots" onclick="updateSlots(this.id, 'slot-table');">Update run</button>
		</form>
	</div>
</div>