<?php
function reloadInitialized($data){
echo "<div class='act-buts' onclick='iniDownload()' style='position:absolute;right:20px;top:10px;'>Download report</div><br><br><hr>
	<table class='boxfull'>
			<thead>
				<tr>
					<th>Participant</th>
					<th>Amount</th>
					
					<th>KM-transaction id</th>
					<th>Status</th>
					<th>Time of transaction</th>
				</tr>
			</thead>
			<tbody>";
				$oddeven = 0;
				foreach ($data as $image => $value) {
					if ($oddeven % 2 == 0) {
						echo "<tr>";
					}else{
						echo "<tr style='background:#f7f7f7;'>";
					}
					if ($value['updatedon'] == "0000-00-00 00:00:00") {
						$updateval = "";
					}else{
						$updateval = "at<br>".$value['updatedon'];
					}
					echo "<td><strong>".$value['name']."</strong><br>".$value['email']."<br>".$value['contact']."</td>
						<td>".$value['amount']."</td>
						
						<td>".$value['transid']."</td>
						<td>".$value['status']."<br>".$updateval."</td>
						<td>".$value['timeon']."</td>
						</tr>";
					$oddeven++;
				}
			echo "</tbody>
		</table>";
		}
			?>