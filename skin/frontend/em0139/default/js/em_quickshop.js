/**
 * EM QuickShop
 *
 * @license commercial software
 * @copyright (c) 2012 Codespot Software JSC - EMThemes.com. (http://www.emthemes.com)
 */
// disable QuickShop:
// EM_QUICKSHOP_DISABLED = true;
jQuery.noConflict();
jQuery(function($) {
	// quickshop init
	function _qsJnit() {
		//insert quickshop popup
        var $_qs = $('.quickshop-link');
		$_qs.fancybox({
			width: EM.QuickShop.QS_FRM_WIDTH,
			height: EM.QuickShop.QS_FRM_HEIGHT,
			margin: [20, 40, 20, 10],
			autoSize: false,
			type: 'ajax',
			helpers: {
				overlay: {
					closeClick: EM.QuickShop.QS_OVERLAY_CLOSE
				}
			},
			afterShow: function() {
				//fireEvent(window,'qs_load');						
				$(window).trigger("qs_load");
				if ($('.cloud-zoom, .cloud-zoom-gallery').length) {
					if ($('.cloud-zoom, .cloud-zoom-gallery').data('zoom') != null) {
						$('.cloud-zoom, .cloud-zoom-gallery').data('zoom').destroy();
					}
					$('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
				}
				initAjaxCart('.quickshop-main', 'qs_product_addtocart_form');
			},
			afterClose: function() {
				$(window).off("qs_load");
				//Event.stopObserving(window,'qs_load');				
			}
		});
	}
	if(navigator.userAgent.match(/iPad/i)) isMobile = false; // fix ipad
	if ((typeof EM_QUICKSHOP_DISABLED == 'undefined' || !EM_QUICKSHOP_DISABLED) && !isMobile) _qsJnit({
		itemClass: EM.QuickShop.QS_ITEM_CLASS,
		//selector for each items in catalog product list,use to insert quickshop image
		aClass: EM.QuickShop.QS_A_CLASS,
		//selector for each a tag in product items,give us href for one product
		imgClass: EM.QuickShop.QS_IMG_CLASS //class for quickshop href
	});
	qs = _qsJnit;
});