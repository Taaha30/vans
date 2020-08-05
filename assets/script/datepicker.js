$("#datepick, #datepick1").datepicker({
        	dateFormat: "dd/mm/yy",
        	changeMonth: true,
        	maxDate: new Date(),
        	yearRange: "-150:+0",
      		changeYear: true
    	});
$("#datepick, #datepick1").on("focus", function(){
	$(this).attr('readonly','readonly');
});
$("#datepick, #datepick1").on("blur", function(){
	$(this).removeAttr('readonly');
});