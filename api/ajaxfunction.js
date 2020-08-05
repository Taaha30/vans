export function ajaxInsertFunction(issetname, dataval, page, reload){
	$.ajax({    
	        type: "POST",
	        url: "./api/insert.php",
	        data: {data : dataval, action: issetname},         
	        dataType: "html",                
	        success: function(response){
	        	clearTimeout(notifcss);
	        	$.ajax({
				    url: './'+ page + "#"+reload,
				    type: "GET",
				    success: function(data) {
				        var fhtml = $(data).find("#"+reload).html();
				        $("#"+reload).html(fhtml);
				    }
				});
				$("body,html").animate({scrollTop: 0}, 700);
	        	$("#notifs").css("bottom","5%");          
            	$("#notifs").html(response); 
	        	var notifcss = setTimeout(function(){        
	        	$("#notifs").css("bottom","-100%");   
            	}, 5000);
            	// $(".validateform :input:not(input[type=radio], input[type=hidden])").each(function(){
            	// 	$(this).val("");
            	// });
        	}
		});
}

export function ajaxUpdateFunction(issetname, dataval, page, reload){
	$.ajax({    
	        type: "POST",
	        url: "./api/edit.php",
	        data: {data : dataval, action: issetname},         
	        dataType: "html",                
	        success: function(response){
	        	clearTimeout(notifcss);
	        	$.ajax({
				    url: './'+ page + "#"+reload,
				    type: "GET",
				    success: function(data) {
				        var fhtml = $(data).find("#"+reload).html();
				        $("#"+reload).html(fhtml);
				        $("#edit-box .tint").click();
				    }
				});
	        	$("#notifs").css("bottom","5%");          
            	$("#notifs").html(response); 
	        	var notifcss = setTimeout(function(){        
	        	$("#notifs").css("bottom","-100%");   
            	}, 5000);
        	}
		});
}

export function ajaxBlockFunction(issetname, dataval, page, reload){
	$.ajax({    
	        type: "POST",
	        url: "./api/block.php",
	        data: {data : dataval, action: issetname},         
	        dataType: "html",                
	        success: function(response){
	        	clearTimeout(notifcss);
	        	$.ajax({
				    url: './'+ page + "#"+reload,
				    type: "GET",
				    success: function(data) {
				        var fhtml = $(data).find("#"+reload).html();
				        $("#"+reload).html(fhtml);
				    }
				});
	        	$("#notifs").css("bottom","5%");          
            	$("#notifs").html(response); 
	        	var notifcss = setTimeout(function(){        
	        	$("#notifs").css("bottom","-100%");   
            	}, 5000);
        	}
		});
}

export function ajaxDeleteFunction(issetname, dataval, page, reload){
	$.ajax({    
	        type: "POST",
	        url: "./api/delete.php",
	        data: {data : dataval, action: issetname},         
	        dataType: "html",                
	        success: function(response){
	        	clearTimeout(notifcss);
	        	$.ajax({
				    url: './'+ page + "#"+reload,
				    type: "GET",
				    success: function(data) {
				        var fhtml = $(data).find("#"+reload).html();
				        $("#"+reload).html(fhtml);
				    }
				});
	        	$("#notifs").css("bottom","5%");          
            	$("#notifs").html(response); 
	        	var notifcss = setTimeout(function(){        
	        	$("#notifs").css("bottom","-100%");   
            	}, 5000);
        	}
		});
}

export function ajaxAddImgFunction(form_data, page, reload){
	$.ajax({
        url: './api/addimg.php',
        dataType: 'text',  
        cache: false,
        contentType: false,
        processData: false,
        async: false,
        data: form_data,                         
        type: 'post',
        success: function(response){
	        clearTimeout(notifcss);
	        var res_decode = response.substring(response.indexOf("}") + 2);
	        var final_decode = (res_decode.slice(0, -1)).split(";");
	        if(final_decode[0] == 1){
	        	$.ajax({
				    url: './'+ page + "#"+reload,
				    type: "GET",
				    success: function(data) {
				        var fhtml = $(data).find("#"+reload).html();
				        $("#"+reload).html(fhtml);
				    }
				});
	        	$("#notifs").css("bottom","5%");          
            	$("#notifs").html("<span class='success'>"+final_decode[1]+"</span>"); 
	        	var notifcss = setTimeout(function(){        
	        	$("#notifs").css("bottom","-100%");   
            	}, 5000);
	        }else{
	        	$("#notifs").css("bottom","5%");          
            	$("#notifs").html("<span class='fail'>"+final_decode[1]+"</span>"); 
	        	var notifcss = setTimeout(function(){        
	        	$("#notifs").css("bottom","-100%");   
            	}, 5000);
	        }
        }
     });
}

export function ajaxDeleteImgFunction(issetname, form_data, page, reload){
	$.ajax({
        url: './api/deleteimg.php',
        dataType: 'html',  
        data: {data : form_data, action: issetname},                          
        type: 'POST',
        success: function(response){
	        clearTimeout(notifcss);
        	$.ajax({
			    url: './'+ page + "#"+reload,
			    type: "GET",
			    success: function(data) {
			        var fhtml = $(data).find("#"+reload).html();
			        $("#"+reload).html(fhtml);
			    }
			});
        	$("#notifs").css("bottom","5%");          
        	$("#notifs").html(response); 
        	var notifcss = setTimeout(function(){        
        	$("#notifs").css("bottom","-100%");   
        	}, 5000);
        }
     });
}

export function ajaxLoginFunction(issetname, form_data){
	$.ajax({
        url: './api/logintry.php',
        dataType: 'html',  
        data: {data : form_data, action: issetname},                          
        type: 'POST',
        success: function(response){
	        clearTimeout(notifcss);
        	$("#notifs").css("bottom","5%");          
        	$("#notifs").html(response); 
        	var notifcss = setTimeout(function(){        
        	$("#notifs").css("bottom","-100%");   
        	}, 5000);
        }
     });
}

export function ajaxCsvFunction(issetname, form_data){
	$.ajax({
        url: './api/csvdownload.php',
        dataType: 'html',  
        data: {data : form_data, action: issetname},                          
        type: 'GET',
        success: function(response){
        	window.open("./api/csvdownload.php?data="+form_data+"&action="+issetname);
	        clearTimeout(notifcss);
        	$("#notifs").css("bottom","5%");          
        	$("#notifs").html("<div class='success'>Report download started</div>"); 
        	var notifcss = setTimeout(function(){        
        	$("#notifs").css("bottom","-100%");   
        	}, 5000);
        }
     });
}