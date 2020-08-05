<form class="validateform bigform">
	<label class="inline-form">
							title<br>
											<input type="text" name="title" placeholder="name" required>

									<span class="validate"></span>
						</label>
			<label class="inline-form">
				Intro <br>
		             <input type="text" name="intro" placeholder="name" required>
															<span class="validate"></span>
			</label>
			<label class="inline-form">
				Paragraph<br>
	             <textarea  name="para" rows="60" cols="60">

	</textarea>
	           	<span class="validate"></span>
			</label>



			<div id="error"></div><br>
			<button type="button" value="Submit" id="addews" onclick="addStudy(this.id, 'tagstable');">Add</button>
		</form>

		<!-- <script type="text/javascript" src="./plugins/richtext/src/jquery.richtext.min.js"></script>

			<script type="text/javascript">
					$(document).ready(function(){
						$(".richarea").richText({
							useParagraph: true,
						});


						});

				</script> -->
