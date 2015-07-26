$(function(){
	// MENU TOGGLE
	$('.toggle').click(function(){
		$(this).next().slideToggle(200);
		$('span[class*="plus"]', this).toggle();
		$('span[class*="minus"]', this).toggle();
	});
	
	// SPINNER FIELD
	$('.spinner .btn:first-of-type').on('click', function() {
		$('.spinner input').val( parseInt($('.spinner input').val(), 10) + 1);
	});
	$('.spinner .btn:last-of-type').on('click', function() {
		if ((parseInt($('.spinner input').val(), 10) - 1) > 0)
		$('.spinner input').val( parseInt($('.spinner input').val(), 10) - 1);
	});
	
	
	/* FUNCTIONS FOR VIEW */
	//ZOOM IMAGE
	initZoom();
	// LOAD THUMBNAILS
	initThumbnail();
	// SCROLLER
	initScroller();
	
	/* $(window).resize(function(){
		ww = $(window).width();
		// TRIAL: Choose Your Phone
		$('.easyui-datagrid').datagrid('resize');
		// Testi clear
		$('.col3', testiScroller).removeAttr('style');
		$('.col-container', testiScroller).removeAttr('style');

		// Ipad landscape
		if (ww <= 962 && ww > 750) {
		// Feature
		featureScrollAmount = 632;

		// Ipad portrait
		} else if (ww <= 750 &&  ww > 464) {

		featureScrollAmount = 316; // Feature
		testiScrollAmount = 430; // Testi

		// Mobile
		} else if (ww <= 464) {
		featureScrollAmount = 316; // Feature
		// Testi
		testiScrollAmount = testiScroller.width();
		$('.col3', testiScroller).css({width: testiScrollAmount});
		$('.col-container', testiScroller).css({width: testiScrollAmount*3});

		} else {

		}
	});
	$(window).trigger('resize'); */
});

function initThumbnail() {
	if ($('.i-photos-thumbnail img').length) {
		$('.i-photos-thumbnail img').on('click', function() {
			var imgObj = $('.i-photos-zoom img');
			imgObj.hide();
			imgObj.attr('src', $(this).attr('src'));
			imgObj.fadeIn();
			
			$('.i-photos-thumbnail img').removeClass('active');
			$(this).addClass('active');
		});
	}
}
function initZoom() {
	if ($('.i-photos-zoom').length) {
		$('.i-photos-zoom img').okzoom({
			width: 400,
			height: 400,
			border: "1px solid #e7e7e7",
			shadow: "0 0 10px 0 rgba(0, 0, 0, 0.15)",
			smoothzoom: "group1"
		}).smoothZoom();
	}
}
function initScroller() {
	var upBtn = $('.i-photos-thumbnail-control.up'),
		downBtn = $('.i-photos-thumbnail-control.down'),
		scroller = $('.i-photos-thumbnail-scoller'),
		scrollAmt = 468;
		
	upBtn.click(function() {
        scroller.stop().animate({
            scrollTop: '-='+scrollAmt
        }, {
            duration: 1000,
            easing: "swing",
			step: function() {
				if (scroller.scrollTop() == 0){
					upBtn.addClass('disabled')
				}
				downBtn.removeClass('disabled')
			}
		})
    });
    downBtn.click(function() {
        scroller.stop().animate({
            scrollTop: '+='+scrollAmt
        }, {
            duration: 1000,
            easing: "swing",
			step: function() {
				if (scroller.scrollTop() > 0){
					upBtn.removeClass('disabled')
				}
				if (($('>ul', scroller).height() - scroller.scrollTop()) <= scrollAmt) {
					downBtn.addClass('disabled')
				}
            }
        })
    });
}