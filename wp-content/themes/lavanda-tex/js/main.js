jQuery(document).ready(function(){
	
	jQuery('.bxslider').bxSlider({
		auto: true,
		// mode: 'fade'
	});

	jQuery('.showpopup').click(function (e) {
    	jQuery('#basic-modal-content').modal({
        	focus: false,
        	overlayClose: true
    	});
    	return false;
  	});

	jQuery('.to-order').click(function(){
		jQuery('#simplemodal_order').modal({
        	focus: false,
        	minHeight: 345,
        	minWidth: 511,
        	overlayClose: true
    	});
		return false;
	});

// end document ready
});
