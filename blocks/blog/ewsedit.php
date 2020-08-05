<div id="editrun">
	<div class="dash-title">
		<h1>Editing blog</h1>
	</div>
<div class="dash-box">
		<form class="validateform">
			<?php
			foreach ($blog as $datakey => $datavalue) {
				if ($datavalue["uid"] == $_GET["data"]) {
				echo '<label class="inline-form">

	            	<input type="hidden" name="uid" placeholder="name" value="'.$datavalue["uid"].'" >
					<span class="validate"></span>
				</label>
				<label class="inline-form">
	         		Heading<br>
	            	<input type="text" name="heading" placeholder="name" value="'.$datavalue["heading"].'" >
					<span class="validate"></span>
				</label>
				<label class="inline-form">
	         		Author<br>
	            	<input type="text" name="author" placeholder="name" value="'.$datavalue["heading"].'" >
					<span class="validate"></span>
				</label>
				<label class="inline-form">
	         		Blog<br>
	            	<input type="text" name="blog" placeholder="name" value="'.$datavalue["blog"].'" >
					<span class="validate"></span>
				</label>



					<label class="inline-form">
		         		Link<br>
		            	<input type="text" name="link" placeholder="name" value="'.$datavalue["link"].'" >
						<span class="validate"></span>
					</label>


				';
					}
				}
			?>
			<div id="error"></div>
			<button type="button" value="Submit" id="updateews" onclick="updateBlog(this.id, 'ews-table');">Update run</button>
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
