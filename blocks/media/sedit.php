<div id="editrun">
	<div class="dash-title">
		<h1>Editing <?php echo "series"; ?></h1>
	</div>
<div class="dash-box">
		<form class="validateform">
			<?php
			foreach ($media as $datakey => $datavalue) {
				if ($datavalue["uid"] == $_GET["data"]) {
				echo '<label class="inline-form">

	            	<input type="hidden" name="uid" placeholder="name" value="'.$datavalue["uid"].'" >
					<span class="validate"></span>
				</label>
				<label class="inline-form">
					logo<br>
		            <input type="file" class="dropify" name="logo" data-height="300" data-image="'.$datavalue["logo"].'" />
		           	<span class="validate"></span>
				</label>
				<label class="inline-form">
	         		Title<br>
	            	<input type="text" name="title"  value="'.$datavalue["title"].'" >
					<span class="validate"></span>
				</label>

				<label class="inline-form">
					para <br>
		            <input type="text" name="para"  value="'.$datavalue["para"].'" >
		           	<span class="validate"></span>
				</label>
				<label class="inline-form">
					Link <br>
		            <input type="text" name="link"  value="'.$datavalue["link"].'" >
		           	<span class="validate"></span>
				</label>
			';
					}
				}
			?>
			<div id="error"></div>
			<button type="button" value="Submit" id="updateews" onclick="updateMedia(this.id, 'stable');">Update run</button>
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

// $(function () {
// 	$('#tagselect,#hostselect,#guestselect').multipleSelect()
// })

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
