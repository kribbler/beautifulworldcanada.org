jQuery(document).ready(function($) {
	$.fn.phVal=$.fn.val;
	$.fn.val=function(value) {
    	if (value!=undefined)
			return this.phVal(value);
		if (this[0]) {
			var ele=$(this[0]);
			if (ele.data('ph') && ele.phVal()==ele.data('ph'))
				return '';
            return ele.phVal();
        }
	    return undefined;
	};

	$('input,textarea').each(function() {
		var d=$(this).data('ph');
		if (!d)
			return;
		$(this).focus(function() {
			if ($(this).phVal()==d)
				$(this).val('');
		});
		$(this).blur(function() {
			if ($(this).phVal()=='')
				$(this).val(d);
		});
		if ($(this).phVal()=='')
			$(this).val(d);
		var f=$(this).parents('form').eq(0);
		if (!f)
			return;
		if (f.hasClass('phform'))
			return;
		f.submit(function() {
			$(this).disablePlaceHolders();
		});
		f.addClass('phform');
	});
	
	$.fn.disablePlaceHolders=function() {
		$('input,textarea',this).each(function() {
			var d=$(this).data('ph');
			if (!d)
				return;
			if ($(this).phVal()==d)
				$(this).phVal('');
		});
	};
	$.fn.enablePlaceHolders=function() {
		$('input,textarea',this).each(function() {
			var d=$(this).data('ph');
			if (!d)
				return;			
			if ($(this).phVal()=='')
				$(this).phVal(d);
		});
	};
});