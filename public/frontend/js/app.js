var publicUrl;
$(function(){
	publicUrl = $('html').data('publicurl');

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
	
	// LOGIN
	initLogin();
	
	/* FUNCTIONS ADD CART */
	initAddCart();
	
	/* FUNCTIONS FOR VIEW */
	//ZOOM IMAGE
	initZoom();
	// LOAD THUMBNAILS
	initThumbnail();
	// SCROLLER
	// initScroller();
	
	$(window).on("scroll", function() {
		var windowScroll = $(window).scrollTop(),
			topObj = $('.header-top'),
			headerObj = $('.header-bottom'),
			clsFixed = 'fixed';

		if (windowScroll >= Math.floor($('.header').outerHeight())) {
			if (!headerObj.hasClass(clsFixed)) {
				headerObj.addClass(clsFixed).animate({
					top: 0
				}, {duration:500, easing: "easeOutQuad"});
				topObj.css('marginBottom', headerObj.outerHeight())
			}
		} else {
			headerObj.removeClass(clsFixed).removeAttr('style');
			topObj.removeAttr('style');
		}
	});

				
	// $(window).resize(function(){});
	// $(window).trigger('resize');
});

/* LOGIN */
function initLogin(){
	var frm = $('#frmSignin'),
		usernameObj = $('#username', frm),
		passwordObj = $('#password', frm),
		alertObj = $('.alert', frm),
		clsError = 'form-error',
		clsShow = 'show';
		
	frm.submit(function(e){
		var isValid = true;
		
		// reset style
		$('input',frm).removeClass(clsError);
		
		if (!checkIfEmail(usernameObj.val())){
			usernameObj.addClass(clsError);
			isValid = isValid && false;
		}
		if (!passwordObj.val()){
			passwordObj.addClass(clsError);
			isValid = isValid && false;
		}
		
		if (isValid) {
			$.ajax({
				url : '/signin',//new Date().getTime(),
				type : 'POST',
				dataType: 'json',
				cache: false,
				data: frm.serialize()
				
			}).done(function(json) {
				if (!json.status) {
					alertObj.html('System error occured! Please contact administrator.').addClass(clsShow);
					return;
				}
				if (json.status == 'ERROR') {
					alertObj.html(json.msg).addClass(clsShow);
					return;
				}
				
				window.location.reload(true);
				
			}).always(function() {
				
			});
		}
		
		e.preventDefault();
	})
}
function checkIfEmail(v){
	return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v));
}

/* ADD CART */
function initAddCart() {
	$('.addcart-btn').click(function(){
		var uniq_id = new Date().getTime(),
			btnObj = $(this),
			dstObj = $('.addcart-dst'),
			txtObj = $('.addcart-txt'),
			badgeObj = $('.badge', dstObj),
			imgSrc = btnObj.data('addcart-img'),
			
			offset = btnObj.offset(),
			top = offset.top + (btnObj.height()/2) - 15,
			left = offset.left + (btnObj.width()/2),
			dstOffset = dstObj.offset(),
			dstTop = dstOffset.top + 5,
			dstLeft = dstOffset.left + 20;
			
		var img = $('<img />', {
			id: 'addcart'+uniq_id,
			src: imgSrc?imgSrc:publicUrl+'/products/default.png',
			alt: 'MyAlt',
			css: {position:'absolute', zIndex:99999, top:top, left:left, width:30}
		});
		img.appendTo($('body'));

		var path = {
			start: {
			  x: left,
			  y: top,
			  angle: 20,
              length: 0.400
			},
			end: {
			  x: dstLeft,
			  y: dstTop,
			 angle: 340,
              length: 0.400
			}
		};
		
		if (txtObj.length) {
			btnObj.button('loading');
		}
		
		img.animate({
			path : new $.path.bezier(path),
			width:15,
			opacity:.6
		}, function(){
			img.fadeOut(200, function(){
				// Remove img
				img.remove();
				
				// Hide btn
				if (txtObj.length) {
					txtObj.show()
				}
				btnObj.hide();
				
				// Increment badge quantity
				badgeObj.html(parseInt(badgeObj.html()) + 1);
			})
		})
	});
}

/* VIEW */
// function initPhotos() {
	// $('.i-photos').css('')
	// $('.i-photos-zoom').css('')
// }
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