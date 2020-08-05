<div id="editrun">
	<div class="dash-title">
		<h1>Editing <?php echo "Tags"; ?></h1>
	</div>
<div class="dash-box">
		<form class="validateform">
			<?php
			foreach ($guest as $datakey => $datavalue) {
				if ($datavalue["uid"] == $_GET["data"]) {
				echo '<label class="inline-form">

	            	<input type="hidden" name="uid" placeholder="name" value="'.$datavalue["uid"].'" >
					<span class="validate"></span>
				</label>
        <label class="inline-form">
           		Name<br>
               	<input type="text" name="name" placeholder="name" value="'.$datavalue["name"].'" required>
             		<span class="validate"></span>
  			</label>
  			<label class="inline-form">
           		Host/Guest?<br>
               	<select name = "hostorg" value="'.$datavalue["gtype"].'" required>
  					<option value="host">Host</option>
  					<option value="guest">Guest</option>
  				</select>
             		<span class="validate"></span>
  			</label>
  			<label class="inline-form">
           		Image of host/guest<br>
               	<input type="file" class="dropify" name="image" data-height="300" value="'.$datavalue["image"].'"required/>
  	           	<span class="validate"></span>
  			</label>
  			<label class="inline-form">
  				About the host/guest<br>
               	<textarea  name="hostabout" value="'.$datavalue["about"].'"required rows="6" cols="50" required>
  				</textarea>
            		<span class="validate"></span>
  			</label>
  			<label class="inline-form">
  				Number of host/guest<br>
               	<input type="text" name="contact" placeholder="" pattern="\d*" value="'.$datavalue["number"].'"requiredtabindex="-1" minlength="10" maxlength="10">
             		<span class="validate"></span>
  			</label>
  			<p>Social media links</p>
  			<label class="inline-form">
  				instagram<br>
               	<input type="url" name="instagram" value="'.$datavalue["instagram"].'"required placeholder="">
             		<span class="validate"></span>
  			</label>
  			<label class="inline-form">
  				linkedin<br>
               	<input type="url" name="linkedin" value="'.$datavalue["linkedin"].'"requiredplaceholder="">
             		<span class="validate"></span>
  			</label>
  			<label class="inline-form">
  				twitter<br>
               	<input type="url" name="twitter" value="'.$datavalue["twitter"].'"required placeholder="">
             		<span class="validate"></span>
  			</label>
  			<label class="inline-form">
  				facebook<br>
               	<input type="url" name="facebook" value="'.$datavalue["facebook"].'"required placeholder="">
             		<span class="validate"></span>
  			</label>
				';
					}
				}
			?>
			<div id="error"></div>
			<button type="button" value="Submit" id="updateews" onclick="updateGuests(this.id,'gtable');">Update run</button>
		</form>
	</div>
</div>

<script src="./plugins/jqueryupload/dist/js/dropify.min.js"></script>
 <script type="text/javascript">
 $('.dropify').dropify({
 	 messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happend.'
    }
 });

$(function () {
	$('#tagselect,#hostselect,#guestselect').multipleSelect()
})

 $(document).ready(function(){
				$(document).on("change",".dropify",function(){
					var inputnamehere = $(this).attr("name");
					if (this.files && this.files[0]) {

					    var FR= new FileReader();

					    FR.addEventListener("load", function(e) {
					    	localStorage.removeItem(inputnamehere);
					    	localStorage.setItem(inputnamehere, e.target.result);
					console.log(localStorage.getItem(inputnamehere));

					    });
					    FR.readAsDataURL( this.files[0] );
					}
				});
			});

 </script>
  <style type="text/css">
 	.file-icon:before{
	font-family: FontAwesome!important;
	content:"\f0ee"!important;
}
.dropify-infos-inner{padding:0px!important;}
 </style>
