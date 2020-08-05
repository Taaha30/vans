<?php
function reloadSlots($data, $detdata){
	strtolower($detdata[0]["type"]) == "event" ? $firstdiv = "<div style='font-size:12px;padding:10px;background:#00bfff;color:#fff;text-align:center;margin:10px;height:50px;line-height:50px;'>".$detdata[0]['type']."</div>" : $firstdiv = "<div style='font-size:12px;padding:10px;background:#7cfc00;color:#fff;text-align:center;margin:10px;height:50px;line-height:50px;'>".$detdata[0]['type']."</div>";
echo "<div class='boxfull-new'>";
			echo "<div class='typedets'>
				<div>".$firstdiv."</div>
				<div>".$detdata[0]["detname"]."<br><span class='small'><i class=\"fa fa-inr\" aria-hidden=\"true\"></i>".$detdata[0]['price']."/-</span></div>
			</div>";
			if (in_array("norows", $data)) {
				echo "No run types found in ".$detdata[0]["detname"].".";
			}else{
			$blocknumb = 0;
				foreach ($data as $image => $value) {
					if ($value['block'] == 1) {
						echo "<div class='mute runnames'>
							<div>".$value['name']."<br><span class='small'>".$value["detail"]."</span></div>
							<div>Slots filled: ".$value['filledslots']."/".$value["maxslots"]."</div>
							<div><form><input type='hidden' name='rowid' value='".$value["uid"]."'/><input type='hidden' name='runid' value='".$_GET["ewsid"]."'/>
							<span class='action-buts edit-but' onclick=\"editDropdown()\" data-key=\"edit-type\" data-value=\"".$value["uid"]."\"><ion-icon name='create'></ion-icon> Edit</span>
							<span class ='action-buts' id='unblockbut".$blocknumb."' onclick='unblockSlot(this.id, \"slot-table\")'><ion-icon name='eye'></ion-icon> Unblock</span>
							<div class='delete-but'>
							<div class='delete-in'><ion-icon name='more'></ion-icon></div>
							<div class='delete-menu'>
							<span class ='action-buts' id='deletebut".$blocknumb."' onclick='deleteType(this.id, \"slot-table\")'><ion-icon name='close-circle'></ion-icon> Delete permanently</span>
							</div>
							</div>
							</form>
							</div>
							</div>";
					}else{
						echo "<div class='runnames'>
							<div>".$value['name']."<br><span class='small'>".$value["detail"]."</span></div>
							<div>Slots filled: ".$value['filledslots']."/".$value["maxslots"]."</div>
							<div><form><input type='hidden' name='rowid' value='".$value["uid"]."'/><input type='hidden' name='runid' value='".$_GET["ewsid"]."'/>
							<span class='action-buts edit-but' onclick='editDropdown()' data-key='edit-type' data-value='".$value["uid"]."'><ion-icon name='create'></ion-icon> Edit</span>
							<span class ='action-buts' id='blockbut".$blocknumb."' onclick='blockSlot(this.id, \"slot-table\")'><ion-icon name='eye-off'></ion-icon> Block</span>
							<div class='delete-but'>
							<div class='delete-in'><ion-icon name='more'></ion-icon></div>
							<div class='delete-menu'>
							<span class ='action-buts' id='deletebut".$blocknumb."' onclick='deleteType(this.id, \"slot-table\")'><ion-icon name='close-circle'></ion-icon> Delete permanently</span>
							</div>
							</div>
							</form>
							</div>
							</div>";
					}
					$blocknumb++;
				}
			}
			echo "</div>";
		}
			?>