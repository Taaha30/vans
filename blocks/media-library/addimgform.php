<?php
function addImgForm($page, $divid, $butid, $parentid){
echo '<hr><div class="validateform">
<span class="inline-form">
	Add new image <br>
	<input type="file" name="imglib" id="'.$parentid.'" required>
	<span class="validate"></span>
</span><br><br>
<button type="button" value="Submit" id="'.$butid.'" onclick="addImg(this.id, \''.$divid.'\', \''.$page.'\', \''.$parentid.'\');">Add</button>';
if($page != "media-library"){
	echo " <span style='font-size:12px;'>(This button is to add new image in the media-library, if you select a new image file then please make sure to add it to image library first and then select from the list shown below.)</span>";
}
echo '</div><hr>';
}
?>