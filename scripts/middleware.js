import { formValidate } from '../assets/script/validate.js';
import { fileValidate } from '../assets/script/validate.js';
import { ajaxInsertFunction } from '../api/ajaxfunction.js';
import { ajaxAddImgFunction } from '../api/ajaxfunction.js';
import { ajaxBlockFunction } from '../api/ajaxfunction.js';
import { ajaxDeleteFunction } from '../api/ajaxfunction.js';
import { ajaxDeleteImgFunction } from '../api/ajaxfunction.js';
import { ajaxUpdateFunction } from '../api/ajaxfunction.js';
import { ajaxLoginFunction } from '../api/ajaxfunction.js';
import { ajaxCsvFunction } from '../api/ajaxfunction.js';

//coupons
// window.addCoupon = function addCoupon(clickid, reload){
// 	var targetId = $("#"+clickid).parent();
// 	var validate = formValidate(targetId);
// 	var finput = [];
// 	targetId.find("label :input").each(function(){
// 		finput.push($(this).val());
// 	});
// 	var values = JSON.stringify(finput);
// 	if(validate == 0){
// 		ajaxInsertFunction("addCoupon", values, "coupons", reload);
// 	}
// }
// window.updateCoupon = function updateCoupon(clickid, reload){
// 	var targetId = $("#"+clickid).parent();
// 	var validate = formValidate(targetId);
// 	var finput = [];
// 	targetId.find("label :input").each(function(){
// 		finput.push($(this).val());
// 	});
// 	var values = JSON.stringify(finput);
// 	if(validate == 0){
// 		ajaxUpdateFunction("updateCoupons", values, "coupons", reload);
// 	}
// }
// window.blockCoupon = function blockCoupon(clickid, reload){
// 	var targetId = $("#"+clickid).parent();
// 	var finput = [];
// 	targetId.find("input").each(function(){
// 		finput.push($(this).val());
// 	});
// 	var values = JSON.stringify(finput);
// 	ajaxBlockFunction("blockCoupon", values, "coupons", reload);
// }
// window.unblockCoupon = function unblockCoupon(clickid, reload){
// 	var targetId = $("#"+clickid).parent();
// 	var finput = [];
// 	targetId.find("input").each(function(){
// 		finput.push($(this).val());
// 	});
// 	var values = JSON.stringify(finput);
// 	ajaxBlockFunction("unblockCoupon", values, "coupons", reload);
// }
// window.deleteCoupon = function deleteCoupon(clickid, reload){
// 	var targetId = $("#"+clickid).parent();
// 	var finput = [];
// 	targetId.find("input").each(function(){
// 		finput.push($(this).val());
// 	});
// 	var values = JSON.stringify(finput);
// 	ajaxDeleteFunction("deleteCoupon", values, "coupons", reload);
// }

//Types
window.addSeries = function addSeries(clickid){
	var targetId = $("#"+clickid).parents("form");
	var validate = formValidate(targetId);
	var finput = {};
	var pushval;
	var pushname;
	targetId.find("label :input:not(li :input, :input[type=button])").each(function(){
		console.log($(this));
		if ($(this).attr("type") == "file") {
			var inputnamehere = $(this).attr("name");
			finput[inputnamehere] = (localStorage.getItem(inputnamehere));
		}else{
			pushval = $(this).val();
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}
	});
	var values = JSON.stringify(finput);
	console.log(values);
	if(validate == 0){
		ajaxInsertFunction("addSeries", values);
	}
}
window.updateSlots = function updateSlots(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var validate = formValidate(targetId);
	var finput = {};
	targetId.find("label input").each(function(){
		finput[$(this).attr("name")] = ($(this).val());
	});
	var values = JSON.stringify(finput);
	if(validate == 0){
		ajaxUpdateFunction("updateSlots", values, "slots?ewsid="+finput["ewsid"], reload);
	}
}
window.blockSlot = function blockSlot(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var finput = [];
	targetId.find("input").each(function(){
		finput.push($(this).val());
	});
	var runid = finput[1];
	finput.pop();
	var values = JSON.stringify(finput);
	ajaxBlockFunction("blockSlot", values, "slots?ewsid="+runid, reload);
}
window.unblockSlot = function unblockSlot(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var finput = [];
	targetId.find("input").each(function(){
		finput.push($(this).val());
	});
	var runid = finput[1];
	finput.pop();
	var values = JSON.stringify(finput);
	ajaxBlockFunction("unblockSlot", values, "slots?ewsid="+runid, reload);
}
window.deleteSlot = function deleteSlot(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var finput = [];
	targetId.find("input").each(function(){
		finput.push($(this).val());
	});
	var runid = finput[1];
	finput.pop();
	var values = JSON.stringify(finput);
	ajaxDeleteFunction("deleteSlot", values, "slots?runid="+runid, reload);
}







//Runs
window.addBlog = function addBlog(clickid){
	var targetId = $("#"+clickid).parents("form");
	var validate = formValidate(targetId);
	var finput = {};
	var pushval;
	var pushname;
	targetId.find("label :input:not(li :input, :input[type=button])").each(function(){
		console.log($(this));
		if ($(this).attr("type") == "file") {
			var inputnamehere = $(this).attr("name");
			finput[inputnamehere] = (localStorage.getItem(inputnamehere));
		}else if($(this).prop("multiple") == true) {
			pushval = $(this).val();
			if (pushval !== null) {
				pushval = pushval.join(",");
			}
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}else{
			pushval = $(this).val();
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}
	});
	var values = JSON.stringify(finput);
	console.log(values);
	if(validate == 0){
		ajaxInsertFunction("addBlog", values);
	}
}



window.addStudy = function addStudy(clickid){
	var targetId = $("#"+clickid).parents("form");
	var validate = formValidate(targetId);
	var finput = {};
	var pushval;
	var pushname;
	targetId.find("label :input:not(li :input, :input[type=button])").each(function(){
		console.log($(this));
		if ($(this).attr("type") == "file") {
			var inputnamehere = $(this).attr("name");
			finput[inputnamehere] = (localStorage.getItem(inputnamehere));
		}else if($(this).prop("multiple") == true) {
			pushval = $(this).val();
			if (pushval !== null) {
				pushval = pushval.join(",");
			}
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}else{
			pushval = $(this).val();
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}
	});
	var values = JSON.stringify(finput);
	console.log(values);
	if(validate == 0){
		ajaxInsertFunction("addStudy", values);
	}
}


window.addMedia = function addMedia(clickid){
	var targetId = $("#"+clickid).parents("form");
	var validate = formValidate(targetId);
	var finput = {};
	var pushval;
	var pushname;
	targetId.find("label :input:not(li :input, :input[type=button])").each(function(){
		console.log($(this));
		if ($(this).attr("type") == "file") {
			var inputnamehere = $(this).attr("name");
			finput[inputnamehere] = (localStorage.getItem(inputnamehere));
		}else{
			pushval = $(this).val();
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}
	});
	var values = JSON.stringify(finput);
	console.log(values);
	if(validate == 0){
		ajaxInsertFunction("addMedia", values);
	}
}

//////// update functions

window.updateBlog = function updateBlog(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var validate = formValidate(targetId);
	var finput = {};
	var pushval;
	var pushname;
	targetId.find("label :input:not(li :input, :input[type=button])").each(function(){
		console.log($(this));
		if ($(this).attr("type") == "file") {
			var inputnamehere = $(this).attr("name");
			if(localStorage.getItem(inputnamehere) !== ""){
				finput[inputnamehere] = (localStorage.getItem(inputnamehere));
			}else{
				pushval = $(this).val();
				finput[inputnamehere] = pushval;
			}
		}else if($(this).prop("multiple") == true) {
			pushval = $(this).val();
			if (pushval !== null) {
				pushval = pushval.join(",");
			}
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}else{
			pushval = $(this).val();
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}
	});
	var values = JSON.stringify(finput);
	if(validate == 0){
	    ajaxUpdateFunction("updateBlog", values, "blog", reload);
	}
}


window.updateStudy = function updateStudy(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var validate = formValidate(targetId);
	var finput = {};
	var pushval;
	var pushname;
	targetId.find("label :input:not(li :input, :input[type=button])").each(function(){
		console.log($(this));
		if ($(this).attr("type") == "file") {
			var inputnamehere = $(this).attr("name");
			if(localStorage.getItem(inputnamehere) !== ""){
				finput[inputnamehere] = (localStorage.getItem(inputnamehere));
			}else{
				pushval = $(this).val();
				finput[inputnamehere] = pushval;
			}
		}else if($(this).prop("multiple") == true) {
			pushval = $(this).val();
			if (pushval !== null) {
				pushval = pushval.join(",");
			}
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}else{
			pushval = $(this).val();
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}
	});
	var values = JSON.stringify(finput);
	if(validate == 0){
	    ajaxUpdateFunction("updateStudy", values, "casestudy", reload);
	}
}



window.updateMedia = function updateMedia(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var validate = formValidate(targetId);
	var finput = {};
	var pushval;
	var pushname;
	targetId.find("label :input:not(li :input, :input[type=button])").each(function(){
		console.log($(this));
		if ($(this).attr("type") == "file") {
			var inputnamehere = $(this).attr("name");
			if(localStorage.getItem(inputnamehere) !== ""){
				finput[inputnamehere] = (localStorage.getItem(inputnamehere));
			}else{
				pushval = $(this).val();
				finput[inputnamehere] = pushval;
			}
		}else if($(this).prop("multiple") == true) {
			pushval = $(this).val();
			if (pushval !== null) {
				pushval = pushval.join(",");
			}
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}else{
			pushval = $(this).val();
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}
	});
	var values = JSON.stringify(finput);
	if(validate == 0){
	    ajaxUpdateFunction("updateMedia", values, "media", reload);
	}
}

window.updateEws = function updateEws(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var validate = formValidate(targetId);
	var finput = {};
	var pushval;
	var pushname;
	targetId.find("label :input:not(li :input, :input[type=button])").each(function(){
		console.log($(this));
		if ($(this).attr("type") == "file") {
			var inputnamehere = $(this).attr("name");
			if(localStorage.getItem(inputnamehere) !== ""){
				finput[inputnamehere] = (localStorage.getItem(inputnamehere));
			}else{
				pushval = $(this).val();
				finput[inputnamehere] = pushval;
			}
		}else if($(this).prop("multiple") == true) {
			pushval = $(this).val();
			if (pushval !== null) {
				pushval = pushval.join(",");
			}
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}else{
			pushval = $(this).val();
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}
	});
	var values = JSON.stringify(finput);
	if(validate == 0){
	    ajaxUpdateFunction("updateEws", values, "events", reload);
	}
}
// tags
window.updateTags = function updateTags(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var validate = formValidate(targetId);
	var finput = {};
	var pushval;
	var pushname;
	targetId.find("label :input:not(li :input, :input[type=button])").each(function(){
		console.log($(this));
		if ($(this).attr("type") == "file") {
			var inputnamehere = $(this).attr("name");
			if(localStorage.getItem(inputnamehere) !== ""){
				finput[inputnamehere] = (localStorage.getItem(inputnamehere));
			}else{
				pushval = $(this).val();
				finput[inputnamehere] = pushval;
			}
		}else if($(this).prop("multiple") == true) {
			pushval = $(this).val();
			if (pushval !== null) {
				pushval = pushval.join(",");
			}
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}else{
			pushval = $(this).val();
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}
	});
	var values = JSON.stringify(finput);
	if(validate == 0){
	    ajaxUpdateFunction("updateTags", values, "tags", reload);
	}
}
window.updateSeries = function updateSeries(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var validate = formValidate(targetId);
	var finput = {};
	var pushval;
	var pushname;
	targetId.find("label :input:not(li :input, :input[type=button])").each(function(){
		console.log($(this));
		if ($(this).attr("type") == "file") {
			var inputnamehere = $(this).attr("name");
			if(localStorage.getItem(inputnamehere) !== ""){
				finput[inputnamehere] = (localStorage.getItem(inputnamehere));
			}else{
				pushval = $(this).val();
				finput[inputnamehere] = pushval;
			}
		}else if($(this).prop("multiple") == true) {
			pushval = $(this).val();
			if (pushval !== null) {
				pushval = pushval.join(",");
			}
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}else{
			pushval = $(this).val();
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}
	});
	var values = JSON.stringify(finput);
	if(validate == 0){
	    ajaxUpdateFunction("updateSeries", values, "series", reload);
	}
}

window.updateGuests = function updateGuests(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var validate = formValidate(targetId);
	var finput = {};
	var pushval;
	var pushname;
	targetId.find("label :input:not(li :input, :input[type=button])").each(function(){
		console.log($(this));
		if ($(this).attr("type") == "file") {
			var inputnamehere = $(this).attr("name");
			if(localStorage.getItem(inputnamehere) !== ""){
				finput[inputnamehere] = (localStorage.getItem(inputnamehere));
			}else{
				pushval = $(this).val();
				finput[inputnamehere] = pushval;
			}
		}else if($(this).prop("multiple") == true) {
			pushval = $(this).val();
			if (pushval !== null) {
				pushval = pushval.join(",");
			}
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}else{
			pushval = $(this).val();
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}
	});
	var values = JSON.stringify(finput);
	if(validate == 0){
	    ajaxUpdateFunction("updateGuests", values, "guests", reload);
	}
}



window.deleteEws = function deleteEws(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var finput = [];
	targetId.find("input").each(function(){
		finput.push($(this).val());
	});
	var values = JSON.stringify(finput);
	ajaxDeleteFunction("deleteEws", values, "events-workshops", reload);
}

//Tags
window.addTags = function addTags(clickid){
	var targetId = $("#"+clickid).parents("form");
	var validate = formValidate(targetId);
	var finput = {};
	var pushval;
	var pushname;
	targetId.find("label :input:not(li :input)").each(function(){
		pushval = $(this).val();
		pushname = $(this).attr("name");
		finput[pushname] = pushval;
	});
	var values = JSON.stringify(finput);
	console.log(values);
	if(validate == 0){
		ajaxInsertFunction("addTags", values);
	}
}
$(document).on("change","#notifimage",function(){
	var inputnamehere = $(this).attr("name");
	localStorage.removeItem(inputnamehere);
	if (this.files && this.files[0]) {

	    var FR= new FileReader();

	    FR.addEventListener("load", function(e) {
	    	localStorage.setItem(inputnamehere, e.target.result);
	    });
	    FR.readAsDataURL( this.files[0] );
	}
});
/////// block middleware

window.blockBlog = function blockBlog(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var finput = [];
	targetId.find("input").each(function(){
		finput.push($(this).val());
	});
	var values = JSON.stringify(finput);
	ajaxBlockFunction("blockBlog", values, "blog", reload);
};


window.unblockBlog = function unblockBlog(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var finput = [];
	targetId.find("input").each(function(){
		finput.push($(this).val());
	});
	var values = JSON.stringify(finput);
	ajaxBlockFunction("unblockBlog", values, "blog", reload);
};



window.blockMedia = function blockMedia(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var finput = [];
	targetId.find("input").each(function(){
		finput.push($(this).val());
	});
	var values = JSON.stringify(finput);
	ajaxBlockFunction("blockMedia", values, "media", reload);
};


window.unblockMedia = function unblockMedia(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var finput = [];
	targetId.find("input").each(function(){
		finput.push($(this).val());
	});
	var values = JSON.stringify(finput);
	ajaxBlockFunction("unblockMedia", values, "media", reload);
};

window.blockStudy = function blockStudy(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var finput = [];
	targetId.find("input").each(function(){
		finput.push($(this).val());
	});
	var values = JSON.stringify(finput);
	ajaxBlockFunction("blockStudy", values, "casestudy", reload);
};


window.unblockStudy = function unblockStudy(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var finput = [];
	targetId.find("input").each(function(){
		finput.push($(this).val());
	});
	var values = JSON.stringify(finput);
	ajaxBlockFunction("unblockStudy", values, "casestudy", reload);
};



//////// block ends











window.deleteTags = function deleteTags(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var finput = [];
	targetId.find("input").each(function(){
		finput.push($(this).val());
	});
	var values = JSON.stringify(finput);
	ajaxDeleteFunction("deleteEws", values, "events-workshops", reload);
}



//media-library
window.addGuest = function addGuest(clickid){
	var targetId = $("#"+clickid).parents("form");
	var validate = formValidate(targetId);
	var finput = {};
	var pushval;
	var pushname;
	targetId.find("label :input:not(li :input, :input[type=button])").each(function(){
		console.log($(this));
		if ($(this).attr("type") == "file") {
			var inputnamehere = $(this).attr("name");
			finput[inputnamehere] = (localStorage.getItem(inputnamehere));
		}else{
			pushval = $(this).val();
			pushname = $(this).attr("name");
			finput[pushname] = pushval;
		}
	});
	var values = JSON.stringify(finput);
	console.log(values);
	if(validate == 0){
		ajaxInsertFunction("addGuest", values);
	}
}

window.deleteImg = function deleteImg(clickid, reload){
	var targetId = $("#"+clickid).parent();
	var finput = [];
	targetId.find("input").each(function(){
		finput.push($(this).val());
	});
	var values = JSON.stringify(finput);
	ajaxDeleteImgFunction("deleteImg", values, "media-library", reload);
}

//logintry
window.loginTry = function loginTry(clickid){
	var targetId = $("#"+clickid).parent();
	var validate = formValidate(targetId);
	var finput = [];
	targetId.find("label :input:not(li :input)").each(function(){
		finput.push($(this).val());
	});
	var values = JSON.stringify(finput);
	if(validate == 0){
	    ajaxLoginFunction("loginTry", values);
	}
}

//Report download
window.csvDownload = function csvDownload(runid){
	ajaxCsvFunction("csvDownload", runid);
}

window.iniDownload = function iniDownload(runid){
	ajaxCsvFunction("iniDownload", runid);
}
