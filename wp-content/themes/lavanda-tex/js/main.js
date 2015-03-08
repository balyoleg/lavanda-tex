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

    
    resize_elements('.catalog-wrap .wrap_category_list');

    function resize_elements( selector )
    {
        if(selector != '')
        {
            var maxHeight = 0;
            jQuery(selector).each(function(){
                if(maxHeight < jQuery(this).height())
                {
                    maxHeight = jQuery(this).height();
                }
            });

            if(maxHeight > 0)
            {
                jQuery(selector).height(maxHeight);
            }
        }
    }

// end document ready
});
