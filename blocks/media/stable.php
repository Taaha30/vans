 <?php
function reloadMedia($media){
echo "<div class='boxfull-new'>";
			$blocknumb = 0;
				foreach ($media as $image => $value) {


				 // if ($value["series"] != "" ) {
					//  $seriearr = explode(",", $value["series"]);
					// foreach ($series as $skey => $svalue) {
					// 	if(in_array($svalue["uid"], $seriearr)){
					// 		$sname =  $svalue["name"];
					// 	}
         //
					// }
         //
         //
				 // }
				 // else {
				 // 	$sname = '';
				 // }
					// //




					if ($value['block'] == 1) {



						echo "<div class='mute runnames blocknumb'>

							<div><span class='searchasset'>".$value['title']."</span><br><span class='small'><i class=\"fa fa-inr\" aria-hidden=\"true\"></i>".''."/-</span></div>
							<div><form><input type='hidden' name='rowid' value='".$value["uid"]."'/>
							<span onclick='window.location.href=\"./slots?ewsid=".$value["uid"]."\"' class='action-buts'><ion-icon name=\"list-box\"></ion-icon> View details</span>
							<span class='action-buts edit-but runs-edit' onclick=\"editDropdown()\" data-key=\"edit-run\" data-value=\"".$value["uid"]."\"><ion-icon name='create'></ion-icon> Edit</span>
							<span class ='action-buts' id='unblockbut".$blocknumb."' onclick='unblockMedia(this.id, \"series-table\")'><ion-icon name='eye'></ion-icon> Unblock</span>
							<div class='delete-but'>
							<div class='delete-in'><ion-icon name='more'></ion-icon></div>
							<div class='delete-menu'>
							<span class ='action-buts' id='deletebut".$blocknumb."' onclick='deleteEws(this.id, \"ews-table\")'><ion-icon name='close-circle'></ion-icon> Delete permanently</span>
							</div>
							</div>
							</form>
							</div>
							</div>";
					}else{
						// var_dump($sname);
						echo "<div class='runnames blocknumb'>

							<div><span class='searchasset'>".$value['title']."</span><br><span class='small'><i class=\"fa fa-inr\" aria-hidden=\"true\"></i>".''."/-</span></div>
							<div><form><input type='hidden' name='rowid' value='".$value["uid"]."'/>
							<span onclick='window.location.href=\"./slots?ewsid=".$value["uid"]."\"' class='action-buts'><ion-icon name=\"list-box\"></ion-icon> View details</span>
							<span class='action-buts edit-but runs-edit' onclick='editDropdown()' data-key='edit-run' data-value='".$value["uid"]."'><ion-icon name='create'></ion-icon> Edit</span>
							<span class ='action-buts' id='blockbut".$blocknumb."' onclick='blockMedia(this.id, \"series-table\")'><ion-icon name='eye-off'></ion-icon> Block</span>
							<div class='delete-but'>
							<div class='delete-in'><ion-icon name='more'></ion-icon></div>
							<div class='delete-menu'>
							<span class ='action-buts' id='deletebut".$blocknumb."' onclick='deleteEws(this.id, \"ews-table\")'><ion-icon name='close-circle'></ion-icon> Delete permanently</span></form>
							</div>
							</div>
							</form>
							</div>
							</div>";
					}
					$blocknumb++;
				}
			echo "</div>";
		}
			?>
