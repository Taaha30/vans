export function formValidate(target){
		$(".validate, #error").html("")
		var input = [];
		var errscore = 0;
		var loops;
		
		target.find("label.inline-form").find(":input:not(li :input)").each(function(){
			input.push($(this).val());
		});
		loops = input.length;
		var i;
		for(i=0; i < loops; i++){
			var valField = target.find("label:eq(" + i + ") :input:not(li :input)")[0];
			if (valField != undefined) {
				if(!valField.checkValidity()){
					var msg = valField.validationMessage;
					msg == "Please tick this box if you want to proceed." ? msg = "Please tick at least one box." : msg=msg;
					msg == "" ? msg = "Please tick at least one box." : msg=msg;
					target.find(".inline-form:eq(" + i + ")").find(".validate").html("<br>" + msg);
					$(".validateform #error").html("<span class='fail'>Please clarify the errors mentioned above. (scroll up)</span><br><br>");
					errscore = 1;
				}else if($(valField).hasClass("content") || $(valField).hasClass("contentedit")){
					var contentval = $(valField).val();
					if($(valField).val().match(/<(\w+)((?:\s+\w+(?:\s*=\s*(?:(?:"[^"]*")|(?:'[^']*')|[^>\s]+))?)*)\s*(\/?)>/)){
						var maincontent = "\""+$(contentval).text()+"\"";
					}
					if(maincontent == "\"\"" || contentval == ""){
						$(valField).parent().siblings(".validate").html("Please fill in this field");
						$(".validateform #error").html("<span class='fail'>Please clarify the errors mentioned above. (scroll up)</span><br><br>");
						errscore = 1;
					}
				}else{
					target.find(".inline-form:eq(" + i + ")").find(".validate").html("");
				}
			}
		}
	return errscore;		
}

export function fileValidate(target){
		$(".validate, #error").html("")
		var input = [];
		var errscore = 0;
		var loops;
		
		target.find("span.inline-form").find(":input:not(li :input)").each(function(){
			input.push($(this).val());
		});
		loops = input.length;
		var i;
		for(i=0; i < loops; i++){
			var valField = target.find("span:eq(" + i + ") :input:not(li :input)")[0];
			if (valField != undefined) {
				if(!valField.checkValidity()){
					var msg = valField.validationMessage;
					msg == "Please tick this box if you want to proceed." ? msg = "Please tick at least one box." : msg=msg;
					msg == "" ? msg = "Please tick at least one box." : msg=msg;
					target.find(".inline-form:eq(" + i + ")").find(".validate").html("<br>" + msg);
					$(".validateform #error").html("<span class='fail'>Please clarify the errors mentioned above. (scroll up)</span><br><br>");
					errscore = 1;
				}else if($(valField).hasClass("content") || $(valField).hasClass("contentedit")){
					var contentval = $(valField).val();
					if($(valField).val().match(/<(\w+)((?:\s+\w+(?:\s*=\s*(?:(?:"[^"]*")|(?:'[^']*')|[^>\s]+))?)*)\s*(\/?)>/)){
						var maincontent = "\""+$(contentval).text()+"\"";
					}
					if(maincontent == "\"\"" || contentval == ""){
						$(valField).parent().siblings(".validate").html("Please fill in this field");
						$(".validateform #error").html("<span class='fail'>Please clarify the errors mentioned above. (scroll up)</span><br><br>");
						errscore = 1;
					}
				}else{
					target.find(".inline-form:eq(" + i + ")").find(".validate").html("");
				}
			}
		}
	return errscore;		
}