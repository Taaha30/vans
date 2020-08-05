function scrollToDiv(divid){
	$(document).ready(function(){
	$(document).on("click",".act-buts",function(){
		$("body,html").animate({scrollTop: $("#"+divid).offset().top - 80}, 700);
	});
	});		
};

function detailsDropdown(){
	$(document).ready(function(){
		$(document).on("click",".details-but",function(){
			$("#edit-box").css({"zIndex":"999"});
			$("#edit-box .tint").css({"opacity":"1"});
			$("#edit-box #edit-inbox").css({"top":"0"});
			var perhtml = "";
			$(this).siblings(".perds").find(":input").each(function(){
				first = $(this).val();
				key = first.substring(0, first.indexOf(":"));
				value = first.substring(first.indexOf(":"));
				perhtml += "<div style='display:table-row'><div style='display:table-cell'>" + key + "</div><div style='display:table-cell'>" + value + "</div></div>";
			});
			$finalhtml = "<b>Personal details</b><br><div style='display:table'>" + perhtml + "</div><br><br>";
			var medhtml = "";
			$(this).siblings(".ewslist").find(":input").each(function(){
				first = $(this).val();
				key = first.substring(0, first.indexOf(":"));
				value = first.substring(first.indexOf(":"));
				medhtml += "<div style='display:table-row'><div style='display:table-cell'>" + key + "</div><div style='display:table-cell'>" + value + "</div></div>";
			});
			$finalhtml += "<b>Registered events/workshops</b><br><div style='display:table'>" + medhtml + "</div><br><br>";
			var transactions = $(this).siblings(".transactions").html();
			// $(this).siblings(".transactions").find(":input").each(function(){
			// 	first = $(this).val();
			// 	key = first.substring(0, first.indexOf(":"));
			// 	value = first.substring(first.indexOf(":"));
			// 	tran += "<div style='display:table-row'><div style='display:table-cell'>" + key + "</div><div style='display:table-cell'>" + value + "</div></div>";
			// });
			$finalhtml += "<b>Transactions</b><br><div style='display:table'>" + transactions + "</div><br><br>";
			$("#edit-inbox").html($finalhtml);
		});
	});
}

function tiwsDropdown(){
	$(document).ready(function(){
		$(document).on("click",".details-but",function(){
			$("#edit-box").css({"zIndex":"999"});
			$("#edit-box .tint").css({"opacity":"1"});
			$("#edit-box #edit-inbox").css({"top":"0"});
			var perhtml = "";
			$(this).siblings(".perds").find(":input").each(function(){
				first = $(this).val();
				key = first.substring(0, first.indexOf(":"));
				value = first.substring(first.indexOf(":"));
				perhtml += "<div style='display:table-row'><div style='display:table-cell;border-bottom:1px solid rgba(0,0,0,0.3);'>" + key + "</div><div style='display:table-cell;border-bottom:1px solid rgba(0,0,0,0.3);padding:25px;'>" + value + "</div></div>";
			});
			$finalhtml = "<b>Personal details</b><br><div style='display:table'>" + perhtml + "</div><br><br>";
			$("#edit-inbox").html($finalhtml);
		});
	});
}

function editDropdown(){
	$(document).ready(function(){
	$(document).on("click",".edit-but",function(){
		$("#edit-box").css({"zIndex":"999"});
		$("#edit-box .tint").css({"opacity":"1"});
		$("#edit-box #edit-inbox").css({"top":"0"});
		if ($(this).data("key") == "edit-run") {
			$("#edit-inbox").html("");
			var fieldval = $(this).data("value");
			$.ajax({
					data: {data:fieldval},
				    url: '',
				    type: "GET",
	        		dataType: "html",                
				    success: function(response) {
				        var fhtml = $(response).find("#editrun").html();
				        $("#edit-inbox").html(fhtml);
				    }
				});
		}
		if ($(this).data("key") == "edit-type") {
			$("#edit-inbox").html("");
			var fieldval = $(this).data("value");
			$.ajax({
					data: {data:fieldval},
				    url: '',
				    type: "GET",
	        		dataType: "html",                
				    success: function(response) {
				        var fhtml = $(response).find("#editslots").html();
				        $("#edit-inbox").html(fhtml);
				    }
				});
		}
		if ($(this).data("key") == "edit-coup") {
			$("#edit-inbox").html("");
			var fieldval = $(this).data("value");
			$.ajax({
					data: {data:fieldval},
				    url: '',
				    type: "GET",
	        		dataType: "html",                
				    success: function(response) {
				        var fhtml = $(response).find("#editcoup").html();
				        $("#edit-inbox").html(fhtml);
				    }
				});
		}
	});
	});
}
function closeEdit(){
	$(document).ready(function(){
	$(document).on("click","#edit-box .tint",function(){
		$("#edit-inbox").html("");
		$.when($("#edit-box .tint").css({"opacity":"0"}),$("#edit-box #edit-inbox").css({"top":"-300vh"})).done(function(){
			setTimeout(function(){
				$("#edit-box").css({"zIndex":"-999"});
			},700);
		});
	});
	});
}

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});