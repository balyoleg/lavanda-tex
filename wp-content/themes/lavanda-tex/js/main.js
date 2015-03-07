jQuery(document).ready(function(){
	
	jQuery('.bxslider').bxSlider({
		auto: true,
		// mode: 'fade'
	});

	jQuery('.showpopup').click(function (e) {
    	jQuery('#basic-modal-content').modal({
        	focus: false
    	});
    	return false;
  	});

	jQuery('.to-order').click(function(){
		jQuery('.goods-order-wrap').show();
		return false;
	});

// end document ready
});
