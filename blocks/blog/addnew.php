<form class="validateform bigform">
	<label class="inline-form">
							Heading<br>
											<input type="text" name="heading" placeholder="name" required>

									<span class="validate"></span>
						</label>
			<label class="inline-form">
				Author <br>
		             <input type="text" name="author" placeholder="name" required>
															<span class="validate"></span>
			</label>
			<label class="inline-form">
				Start writing here<br>
	             <textarea  name="blog" rows="6" cols="10">

	</textarea>
	           	<span class="validate"></span>
			</label>

			<label class="inline-form">
				link <br>
		             <input type="text" name="link" placeholder="name" required>
															<span class="validate"></span>
			</label>

			<div id="error"></div><br>
			<button type="button" value="Submit" id="addews" onclick="addBlog(this.id, 'ews-table');">Add</button>
		</form>
		<!-- <script type="text/javascript" src="./plugins/richtext/src/jquery.richtext.min.js"></script>

			<script type="text/javascript">
					$(document).ready(function(){
						$(".richarea").richText({
							useParagraph: true,
						});


						});

				</script> -->
