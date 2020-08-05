<?php
function reloadDelegates($data, $form, $ews, $slots, $selews){
echo "<table class='boxfull'>
			<thead>
				<tr>
					<th>General details</th>
					<th>Delegate type</th>
					<th>Delegate ID</th>
					<th>Participate for</th>
					<th>Paid<hr>Balance</th>
					<th></th>
				</tr>
			</thead>
			<tbody>";
				$oddeven = 0;
				foreach ($data as $key => $value) {
					// var_dump($value);
					if ($oddeven % 2 == 0) {
						echo "<tr>";
					}else{
						echo "<tr style='background:#f7f7f7;'>";
					}
					echo "<td><strong>".$value['name']."</strong><br>".$value['email']."<br>".$value['contact']."</td>
						<td>".$value['delegatetype']."</td>
						<td>".$value['delegateid']."</td>
						<td>";
						$ewslist = explode(",", $value["ewslist"]);
						$finalews = array_filter(array_map('trim', $ewslist));
						if (empty($finalews) ) {
							echo "No events or workshops.";
						}else{
							foreach($ews as $fkey => $fvalue){
								if (in_array($fvalue["uid"], $finalews)) {
									echo "".$fvalue["type"]." : ".$fvalue["name"]."<br>";
								}
							}
						}
					echo "</td><td>";
					$delsum = 0;
					$delbal = 0;
					foreach ($form as $formkey => $formval) {
						if ($value["uid"] == $formval["participantid"]) {
							$delsum += $formval["amount"];
							$delbal += $formval["balance"];
						}
					}
					echo $delsum."<hr>".$delbal."</td>";
					echo "<td style='min-width:100px;'><span class='action-buts details-but' onclick='detailsDropdown()'><ion-icon name=\"list-box\"></ion-icon>Details</span>
							<div class='transactions' style='display:none'>
								<table style='margin-top:25px;'>
									<thead style='font-size:12px;'>
										<tr style='border:1px solid rgba(0,0,0,0.2); padding:5px;'>
											<th>Paid for</th>
											<th>Transaction IDs</th>
											<th>Mode</th>
											<th>Amount</th>
											<th>Balance</th>
											<th>Basic amount</th>
											<th>Discounts</th>
											<th>Handling fee</th>
											<th>Date and time</th>
										</tr>
									</thead>
									<tbody style='font-size:12px;'>";
										$formcount = 0;
										foreach ($form as $formkey => $formval) {
											$formval["mode"] == "offline" ? $razorid = "" : $razorid = "Razorpay id: ".$formval["razorpay_id"]."<hr>";
											if ($value["uid"] == $formval["participantid"]) {
												foreach ($selews as $selkey => $selval) {
													if ($selval["uid"] == $formval["ewsid"]) {
														$ewsform = explode(",", $selval["ewslist"]);
													}
												}
												$finalewsform = array_filter(array_map('trim', $ewsform));
												if ($formcount == 0) {
													$paidfor = "Delegate fees<br>";
												}else{
													$paidfor = "";
												}
												if (empty($finalewsform) ) {
													$paidfor = "Delegate fees";
												}else{
													foreach($ews as $fkey => $fvalue){
														if (in_array($fvalue["uid"], $finalewsform)) {
															$paidfor .= $fvalue["type"]." : ".$fvalue["name"]."<br>";
														}
													}
												}
												echo "<tr style='border:1px solid rgba(0,0,0,0.2); padding:5px;'>
													<td style='border:1px solid rgba(0,0,0,0.2); padding:5px;'>".$paidfor."</td>
													<td style='border:1px solid rgba(0,0,0,0.2); padding:5px;'>Transaction id: ".$formval["transid"]."<hr>".$razorid."Invoice id: ".$formval["invoiceid"]."</td>
													<td style='border:1px solid rgba(0,0,0,0.2); padding:5px;'>".$formval["mode"]."</td>
													<td style='border:1px solid rgba(0,0,0,0.2); padding:5px;'>".$formval["amount"]."</td>
													<td style='border:1px solid rgba(0,0,0,0.2); padding:5px;'>".$formval["balance"]."</td>
													<td style='border:1px solid rgba(0,0,0,0.2); padding:5px;'>".$formval["baseamt"]."</td>
													<td style='border:1px solid rgba(0,0,0,0.2); padding:5px;'>".$formval["discount"]."<br>".$formval["discountext"]."</td>
													<td style='border:1px solid rgba(0,0,0,0.2); padding:5px;'>".$formval["convenience"]." (".$formval["processperc"]."% of amount)</td>
													<td style='border:1px solid rgba(0,0,0,0.2); padding:5px;'>".$formval["timeon"]."</td>
												</tr>";
												$formcount++;
											}
										}
									echo "</tbody>
								</table>
							</div>
							<div class='ewslist'>";
							$ewslist = explode(",", $value["ewslist"]);
							$finalews = array_filter(array_map('trim', $ewslist));
							$slotlist = explode(",", $value["slotlist"]);
							$finalslot = array_filter(array_map('trim', $slotlist));
							if (empty($finalews) ) {
								echo "<input type='hidden' value='Note : No events or workshops selected yet.'/>";
							}else{
								foreach($ews as $fkey => $fvalue){
									if (in_array($fvalue["uid"], $finalews)) {
										$slotindex = array_search($fvalue["uid"], $finalews);
										foreach($slots as $skey => $svalue){
											if ($finalslot[$slotindex] == $svalue["uid"]) {
												echo "<input type='hidden' value='".$fvalue["type"]." : ".$fvalue["name"]." (".$svalue["name"].")'/>";
											}
										}
									}
								}
							}
					echo	"</div>
							<div class='perds'>
								<input type='hidden' value='Full name: ".$value['name']."'/>
								<input type='hidden' value='Email: ".$value['email']."'/>
								<input type='hidden' value='Contact number: ".$value['contact']."'/>
								<input type='hidden' value='Delegate type: ".$value['delegatetype']."'/>
								<input type='hidden' value='Delegate ID: ".$value['delegateid']."'/>
								<input type='hidden' value='DOB:".$value['dob']."'/>
								<input type='hidden' value='Gender: ".$value['gender']."'/>
								<input type='hidden' value='College: ".$value['college']."'/>
								<input type='hidden' value='City of college: ".$value['ccity']."'/>
								<input type='hidden' value='Course: ".$value['course']."'/>
								<input type='hidden' value='Year: ".$value['year']."'/>
								<input type='hidden' value='Highest qualification: ".$value['qualification']."'/>
								<input type='hidden' value='MMC registration no.: ".$value['mmcreg']."'/>
							</div>
						</td>
						</tr>";
					$oddeven++;
				}
			echo "</tbody>
				</table>";
		}
?>