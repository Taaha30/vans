<?php
function reloadTiws($data){
echo "<table class='boxfull'>
			<thead>
				<tr>
					<th>General details</th>
					<th>University</th>
					<th>Address</th>
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
					echo "<td><strong>".$value['fname']." ".$value['lname']."</strong><br>".$value['email']."<br>".$value['number']."</td>
						<td>".$value['univ']."</td>
						<td>".$value['address']."</td>
						<td style='min-width:100px;'><span class='action-buts details-but' onclick='tiwsDropdown()'><ion-icon name=\"list-box\"></ion-icon>Details</span>
							<div class='perds'>
								<input type='hidden' value='Full name: ".$value['fname']." ".$value['lname']."'/>
								<input type='hidden' value='Nickname: ".$value['nname']."'/>
								<input type='hidden' value='Email: ".$value['email']."'/>
								<input type='hidden' value='Contact number: ".$value['number']."'/>
								<input type='hidden' value='DOB:".$value['dob']."'/>
								<input type='hidden' value='Gender: ".$value['gender']."'/>
								<input type='hidden' value='University: ".$value['univ']."'/>
								<input type='hidden' value='Address: ".$value['address']."'/>
								<input type='hidden' value='Facebook: ".$value['fburl']."'/>
								<input type='hidden' value='Twitter: ".$value['twurl']."'/>
								<input type='hidden' value='Instagram: ".$value['insta']."'/>
								<input type='hidden' value='Skype: ".$value['skype']."'/>
								<input type='hidden' value='<br>Medical history: ".$value['medhis']."'/>
								<input type='hidden' value='<br>Allergy: ".$value['allergy']." ".$value['allname']."'/>
								<input type='hidden' value='Veg: ".$value['veg']."'/>
								<input type='hidden' value='Food preference: ".$value['food']."'/>
								<input type='hidden' value='From where did they come to know about TIWS: ".$value['where']."'/>
								<input type='hidden' value='Motive letter: ".$value['motiv']."'/>
								<input type='hidden' value='Enquired on: ".$value['timeon']."'/>

							</div>
						</td>
						</tr>";
					$oddeven++;
				}
			echo "</tbody>
				</table>";
		}
?>