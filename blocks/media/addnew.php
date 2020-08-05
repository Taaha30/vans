<form class="validateform bigform">

			<label class="inline-form">
				Logo image<br>
             	<input type="file" class="dropify" name="logo" data-height="300" />
          		<span class="validate"></span>
			</label>
			<label class="inline-form">
         		Title<br>
             	<input type="text" name="title" placeholder="name" required>
           		<span class="validate"></span>
			</label>
			<label class="inline-form">
				<br>Paragraph
         		<textarea  name="para" rows="6" cols="5">
          		</textarea>
           		<span class="validate"></span>
			</label>
			<label class="inline-form">
         		Link<br>
             	<input type="text" name="link" placeholder="name" required>
           		<span class="validate"></span>
			</label>
			<br>
			<div id="error"></div><br>
			<button type="button" value="Submit" id="addews" onclick="addMedia(this.id, 'series-table');">Add</button>
		</form>

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

	<!-- <script type="text/javascript" src="./plugins/richtext/src/jquery.richtext.min.js"></script>

		<script type="text/javascript">
				$(document).ready(function(){
					$(".richarea").richText({
						useParagraph: true,
					});


					}); -->

			</script>
  <style type="text/css">
 	.file-icon:before{
	font-family: FontAwesome!important;
	content:"\f0ee"!important;
}
.dropify-infos-inner{padding:0px!important;}
 </style>
