jQuery(document).ready(function($) {
	var menuul = $('#menu').children('li');
		
			menuul.removeClass('current-menu-item');                
            menuul.removeClass('current_page_item');   
			$('.jw-menu-container') .fadeIn();
			
	var nameinput = $( "input[name*='your-name']" );
	var emailinput = $( "input[name*='your-email']" );
	var msgarea = $( "textarea[name*='your-message']" );
	nameinput.val( "NAME" );
	emailinput.val( "EMAIL" );
	msgarea.val( "MESSAGE.." );
	
	
	$('.wpcf7-form-control').each(function()
    {
        this.data = new Object(); //TODO don't overwrite previous data
        this.data.value = this.value;
 
        $(this).focus(function(){
            if (this.value == this.data.value)
                this.value = '';
        });
        $(this).blur(function(){
            if (this.value == '')
                this.value = this.data.value;
        });
    });
       
});

// Resize
jQuery(window).resize(function() {
    "use strict";

    // Logo background
    logobg();

    // jPlayer
    jQuery('.jp-audio-container, .jp-video-container').each(function() {
        jQuery(this).find('.jp-progress-container').width((jQuery(this).width() - 149 < 0) ? 0 : (jQuery(this).width() - 149));
        jQuery(this).find('.jp-progress').width((jQuery(this).width() - 152 < 0) ? 0 : (jQuery(this).width() - 152));       
    });
	jQuery('.jp-jplayer-video').each(function() {
        jQuery(this).find('img').css("height", "470px");       
    }); 
	jQuery( ".jp-play" ).click(function($) {
	 jQuery(this).hide();
	 jQuery('.jp-pause').hide();	  
	}); 
    
    
    // themeinvento Redraw
    jQuery('.jw-redraw').each(function() {
        var $curr = jQuery(this);
        if (!$curr.hasClass('not-drawed')) {
            $curr.trigger('jw-animate');
        }
    });
    // Portfolio Carousel Responsive
    jQuery('ul.jw-carousel>li>.gallery-container').each(function() {
        var $currGallCon = jQuery(this);
        var $currWidth = $currGallCon.width();
        jQuery('>.caroufredsel_wrapper', $currGallCon).width($currWidth);
        jQuery('>.caroufredsel_wrapper>.gallery-slide>.slide-item', $currGallCon).width($currWidth);
        var $currHeight = jQuery('>.caroufredsel_wrapper>.gallery-slide>.slide-item', $currGallCon).height();
        jQuery('>.caroufredsel_wrapper>.gallery-slide', $currGallCon).height($currHeight);
        jQuery('>.caroufredsel_wrapper', $currGallCon).height($currHeight);
        $currGallCon.trigger('jw-carousel-container-height-repair');
    });
});
jQuery(document).ready(function($) {
    "use strict";

    // Nice scroll
    if (jQuery().niceScroll){
        $("html").niceScroll({
            scrollspeed: 70,
            mousescrollstep: 38,
            cursorwidth: 15,
            cursorborder: 0,
            cursorcolor: '#464646',
            cursorborderradius: 0,
            autohidemode: false,
            horizrailenabled: false
        });
    }
    // Logo background
    jQuery('.jw-divider-space').closest('.jw-element').addClass('jw-divider-space-container');
    // Logo background
    logobg();
    // Load Complete
    setTimeout(function() {
        loadComplete();
    }, 6000);
    jQuery(window).scroll(function() {
        var $HeaderMain = jQuery('#header');
        var $filter = jQuery('#header.affix');
        var $sliderBottom = jQuery('#header.sliderbottom');
		if (jQuery('.header-options').hasClass('slider')) {
			var $slider = jQuery('#slider');
			var Forbottomnav = 2;
			var $sliderHeight = $slider.height();
			}else if (jQuery('.header-options').hasClass('featured-image')) {
			var $slider = jQuery('#featured-image');
			var Forbottomnav = 2;
			var $sliderHeight = $slider.height();
			}else if (jQuery('.header-options').hasClass('videoslider')) {
			var $slider = jQuery('#google-map');
			var Forbottomnav = 2;
			var $sliderHeight = $slider.height();
			}else{
			var $slider = jQuery('#page-title');
			var Forbottomnav = 0;
			var $sliderHeight = $slider.height();
			}               
        var $filterHeight = $filter.height();
		var $sliderBottomHeight = parseInt($filterHeight + $sliderHeight);
        var $scrollTop = jQuery(window).scrollTop();
		//alert($scrollTop);
		if ($scrollTop <= 50 && jQuery('ul#menu a[href$=#one-page-home]').closest('li').hasClass('menu-item')) {			
            
                jQuery('ul#menu li.current_page_item.current-menu-item').removeClass('current_page_item current-menu-item');
                jQuery('ul#menu a[href$=#one-page-home]').closest('li').addClass('current_page_item current-menu-item');
            
        }		
        // START - One Page Home
		if ($HeaderMain .hasClass('sliderbottom')) {
			$filter.hide();
			if (Forbottomnav <= $scrollTop) {
			$filter.show();
			}
			if ($sliderHeight <= $scrollTop) {
				$filter.addClass('stuck animated');
				if (!jQuery('#header-holder').hasClass('header-holder')) {
					$filter.after(jQuery('<div id="header-holder" class="header-holder" />').height($filterHeight));
				}
			} else {
				$filter.removeClass('stuck animated');
				jQuery('#header-holder').remove();
			}
		} else if($HeaderMain .hasClass('toptransparent')) {
			if (0 <= $scrollTop) {
				$filter.addClass('stuck animated');
				
			} else {
				$filter.removeClass('stuck animated');
				jQuery('#header-holder').remove();
			}
		}
		else {
			if (20 <= $scrollTop) {
				$filter.addClass('stuck animated');
				if (!jQuery('#header-holder').hasClass('header-holder')) {
					$filter.after(jQuery('<div id="header-holder" class="header-holder" />').height($filterHeight));
				}
			} else {
				$filter.removeClass('stuck animated');
				jQuery('#header-holder').remove();
			}
		}
		
        logobg();
        setTimeout(function() {
            logobg();
        }, 100);
        setTimeout(function() {
            logobg();
        }, 500);
        setTimeout(function() {
            logobg();
        }, 1000);
    });
    jQuery(window).scroll();
    jQuery('#scrollUp').click(function() {
        jQuery("html, body").animate({scrollTop: 0}, 3000);
        return false;
    });

    if (jQuery().parallax) {
        jQuery('.bg-parallax').each(function() {
            jQuery(this).parallax("50%", 0.2);
        });
    }

    $(".btn.btn-border").each(function() {
        var $color = jQuery(this).css('color');
        $('span', this).css('background-color', $color);
    });

    $(".btn.btn-flat").hover(
            function() {
                var $color = jQuery(this).css('background-color');
                $(this).css('color', $color);
            },
            function() {
                $(this).css('color', '#fff');
            }
    );


    jQuery('.likeit').live('click', function() {
        var $this = jQuery(this);
        jQuery.post($this.data('ajaxurl'), {liked_pid: $this.data('pid')})
                .done(function(response) {
            var $aa = jQuery(response).find('#portfolio_liked');
            if ($aa.attr('id') == 'portfolio_liked') {
                $this.addClass('liked');
                var $val = $aa.text();
                $this.find('span').text($val);
            }
        });
    });


    /* navigation */
    $('ul#menu').superfish({
        delay: 200,
        animation: {
            opacity: 'show',
            height: 'show'
        },
        speed: 'fast',
        autoArrows: false,
        dropShadows: false
    });

    /* mobile navigation */
    jQuery('.show-mobile-menu').click(function() {
        jQuery('#mobile-menu').slideToggle('fast').promise().done(function() {
            jQuery('#mobile-menu li').css('width', '100%').css('width', '');
        });
    });
    jQuery('#mobile-menu ul.sub-menu').each(function() {
        var $parentMenu = jQuery(this).parent('li');
        $parentMenu.addClass('has-children').prepend('<div class="action-expand"><span class="opened">-</span><span class="closed">+</span></div>');
        $parentMenu.children('.action-expand').click(function(e) {
            e.preventDefault();
            var $this = jQuery(this).closest('.has-children');
            $this.siblings('li.menu-open').removeClass('menu-open').children('.sub-menu').slideUp('fast');
            $this.toggleClass('menu-open');
            if ($this.hasClass('menu-open')) {
                $this.children('.sub-menu').slideDown('fast');
            } else {
                $this.children('.sub-menu').slideUp('fast');
            }
            return false;
        });


    });


    // One Page
    $(document).on('click', 'ul#menu a', function() {
        //get current
        var targetSection = $(this).attr('href').split("#")[1];
        if (!targetSection || targetSection == '') {
            return;
        }
        targetSection = '#' + targetSection;

        //get pos of target section
        var targetOffset = Math.floor($(targetSection).offset().top - $('#header').height()-117);

        //scroll			 
        $('html,body').animate({scrollTop: targetOffset}, 1500, function() {
            jQuery(window).scroll();
        });
        return false;
    });
    if(window.location.toString().split("#")[1]){jQuery('.menu-container ul#menu a[href="'+window.location.toString()+'"]').click();}

    /*nav handling
     -------------------*/
    $(function() {
        jQuery('.row-container').waypoint({
            handler: function(direction) {
                var activeSection = jQuery(this);

                if (direction === "up") {
                    activeSection = activeSection.prev();
                }
                if (activeSection.attr('id')) {
                    var activeMenuLink = jQuery('ul#menu a[href$=#' + activeSection.attr('id') + ']');

                    jQuery('ul#menu a').parent('li').removeClass('current_page_item current-menu-item');
                    activeMenuLink.parent('li').addClass('current_page_item current-menu-item');
                }
            },
            offset: $('#header').height()+120	//when it should switch on consecutive page
        });
    });


    // Accordion
    $('.jw-accordion').each(function($index) {
        $(this).attr('id', 'accordion' + $index);
        $(this).find('.accordion-group').each(function($i) {
            $(this).find('.accordion-toggle').attr('data-parent', '#accordion' + $index).attr('href', '#accordion_' + $index + '_' + $i);
            $(this).find('.accordion-body').attr('id', 'accordion_' + $index + '_' + $i);
        });
        /* Bootstrap Accordion adding active class */
        jQuery(this).on('show', function(e) {
            jQuery(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
        });
        jQuery(this).on('hide', function(e) {
            jQuery(this).find('.accordion-toggle').not(jQuery(e.target)).removeClass('active');
        });
    });

    // Toggle
    $('.jw-toggle').each(function($index) {
        $(this).find('.accordion-group').each(function($i) {
            $(this).find('.accordion-toggle').attr('href', '#toggle_' + $index + '_' + $i);
            $(this).find('.accordion-body').attr('id', 'toggle_' + $index + '_' + $i);
        });
        /* Bootstrap Accordion adding active class */
        jQuery(this).on('show', function(e) {
            jQuery(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
        });
        jQuery(this).on('hide', function(e) {
            jQuery(e.target).prev('.accordion-heading').children('.accordion-toggle').removeClass('active');
        });
    });
    // Tab
    $('.jw-tab').each(function($index) {
        $(this).find(">li").each(function($i) {
            jQuery(this).appendTo(jQuery(this).closest('.jw-tab').find('ul.nav-tabs'));
            $(this).find(">a").attr('href', '#tabitem_' + $index + '_' + $i);
            if ($i === 0) {
                $(this).addClass('active');
            }
        });
        $(this).find(".tab-pane").each(function($in) {
            jQuery(this).appendTo(jQuery(this).closest('.jw-tab').find('div.tab-content'));
            $(this).attr('id', 'tabitem_' + $index + '_' + $in);
            if ($in === 0) {
                $(this).addClass('active');
            }
        });
    });
    $('.jw-tab>ul a').click(function(e) {
        e.preventDefault();
        jQuery(this).tab('show');
    });



    if (jQuery().jPlayer) {
        jQuery('.jp-jplayer-audio').each(function() {
            jQuery(this).jPlayer({
                ready: function() {
                    jQuery(this).jPlayer("setMedia", {
                        mp3: jQuery(this).data('mp3')
                    });
                },
                swfPath: "",
                cssSelectorAncestor: "#jp_interface_" + jQuery(this).data('pid'),
                supplied: "mp3, all"
            });
        });

        jQuery('.jp-jplayer-video').each(function() {
            jQuery(this).jPlayer({
                ready: function() {
                    jQuery(this).jPlayer("setMedia", {
                        m4v: jQuery(this).data('m4v'),
                        poster: jQuery(this).data('thumb')
                    });
                },
                size: {
                    width: '100%',
                    height: 'auto'
                },
                swfPath: "",
                cssSelectorAncestor: "#jp_interface_" + jQuery(this).data('pid'),
                supplied: "m4v, all"
            });
        });
    }


    // PrettyPhoto
    jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
        deeplinking: false
    });

    // Milestones
    jQuery('.jw-milestones-box').each(function() {
        var $curr = jQuery(this);
        jQuery('>.jw-milestones-content>.jw-milestones-count>.jw-milestones-show>ul', $curr).each(function() {
            jQuery(this).css('bottom', '-' + jQuery(this).height() + 'px');
        });
        $curr.bind('jw-animate', function() {
            setTimeout(function() {
                jQuery('>.jw-milestones-content>.jw-milestones-count>.jw-milestones-show>ul', $curr).each(function() {
                    jQuery(this).animate({bottom: '5px'}, 800).animate({bottom: '0px'}, 'slow');
                });
            }, 1000);
        });
    });
	
	// Header Options
	var setElementHeight = function () {
    var height = $(window).height();
    $('#google-map').css('min-height', (height));
   	};
	
	var setElementHeightimage = function () {
    var mheight = $(window).height();
    var hheight = $('.topheader').height();
	var height = mheight - hheight;
    $('#featured-image').css('height', (height));
   	};
	
	var setElementHeightslider = function () {
    var mheight = $(window).height();
    var hheight = $('.topheader').height();
	var height = mheight - hheight;
    $('.ls-wp-fullwidth-container').css('height', (height));
    $('.ls-wp-fullwidth-helper').css('height', (height));
    $('.ls-wp-container').css('height', (height));
    $('.ls-inner').css('height', (height));
   	};

	$(window).on("resize", function () {
		setElementHeight();
		setElementHeightslider();
		setElementHeightimage();		
	}).resize();
	
	
    // themeinvento Animate General - Init
    jQuery('.jw-animate-gen').each(function() {
        var $curr = jQuery(this);
        var $currChild = $curr.children().eq(-1);
        if ($currChild.attr('id') === 'sidebar' || $currChild.hasClass('jw-pricing') || $currChild.hasClass('jw-our-team') || $currChild.hasClass('jw-blog')) {
            $currChild.children().addClass('jw-animate-gen').attr('data-gen', $curr.attr('data-gen')).attr('data-gen-offset', $curr.attr('data-gen-offset')).css('opacity', '0');
            $curr.removeClass('jw-animate-gen').attr('data-gen', '').attr('data-gen-offset', '').css('opacity', '');
        }
    });
    jQuery(window).resize();
});

	
jQuery(window).load(function() {
    "use strict";
    // Logo background
    logobg();
    // Load Complete
    loadComplete();
    // Gallery
    img_slider();

    
	
    // Carousel
    list_carousel();

    // Carousel Container Height Repair
    jQuery('ul.jw-carousel>li>.gallery-container').unbind('jw-carousel-container-height-repair').bind('jw-carousel-container-height-repair', function() {
        var $currGallCon = jQuery(this);
        var $currLiHeight = $currGallCon.closest('li').height();
        if ($currGallCon.closest('.caroufredsel_wrapper').height() < $currLiHeight) {
            $currGallCon.closest('.caroufredsel_wrapper').animate({height: $currLiHeight}, 600);
            $currGallCon.closest('ul.jw-carousel').height($currLiHeight);
        }
    });
    jQuery('ul.jw-carousel>li>.gallery-container').each(function() {
        var $currGallCon = jQuery(this);
        jQuery('>.carousel-arrow>a', $currGallCon).each(function() {
            jQuery(this).bind('click', function() {
                setTimeout(function() {
                    $currGallCon.trigger('jw-carousel-container-height-repair');
                }, 1100);
            });
        });
    });

    // Twitter
    if (jQuery().jtwt) {
        jQuery('.jw-twitter').each(function() {
            var currentTwitter = jQuery(this);
            currentTwitter.find('a').live("click", function() {
                jQuery(this).attr('target', "_blank");
            });
            currentTwitter.jtwt({
                count: currentTwitter.attr('data-count'),
                username: currentTwitter.attr('data-name'),
                image_size: 0
            });
            currentTwitter.children('.twitter-follow').appendTo(currentTwitter);
        });
    }
    // themeinvento Animate Custom
    jQuery('.jw-animate').each(function() {
        var $curr = jQuery(this);
        var $currOffset = $curr.attr('data-gen-offset');
        if ($currOffset === '' || $currOffset === 'undefined' || $currOffset === undefined) {
            $currOffset = 'bottom-in-view';
        }
        if ($currOffset === 'none') {
            $curr.trigger('jw-animate');
        } else {
            $curr.waypoint(function() {
                $curr.trigger('jw-animate');
            }, {triggerOnce: true, offset: $currOffset});
        }
    });
    // themeinvento Animate General - Bind
    jQuery('.jw-animate-gen').each(function() {
        var $curr = jQuery(this);
        $curr.bind('jw-animate', function() {
            $curr.css('opacity', '');
            $curr.addClass('animated ' + $curr.data('gen'));
        });
    });
    // themeinvento Animate General
    jQuery('.jw-animate-gen').each(function() {
        var $curr = jQuery(this);
        var $currOffset = $curr.attr('data-gen-offset');
        if ($currOffset === '' || $currOffset === 'undefined' || $currOffset === undefined) {
            $currOffset = 'bottom-in-view';
        }
        $curr.waypoint(function() {
            $curr.trigger('jw-animate');
        }, {triggerOnce: true, offset: $currOffset});
    });

    ///////////////////////////////////
    jQuery(window).resize();
});

function logobg() {
    if (jQuery('#header .jw-logo').hasClass('jw-logo')) {
        if (jQuery('body').hasClass('rtl'))
            var logoTmpSize = jQuery('#header .jw-logo').offset().right;
        else
            var logoTmpSize = jQuery('#header .jw-logo').offset().left;
        jQuery('.jw-logo-bg').width(logoTmpSize);
        jQuery('.jw-logo').css('height', '');
        if (jQuery('.show-mobile-menu').css('display') === 'none') {
            jQuery('.jw-logo').css('height', jQuery('#header').height() + 'px');
        }
    }
}

function img_slider() {
    "use strict";
    // Gallery
    jQuery('.gallery-container').each(function() {
        var $prev = jQuery(this).find(".carousel-prev");
        var $next = jQuery(this).find(".carousel-next");
        jQuery(this).find('.gallery-slide').carouFredSel({
            auto: false,
            responsive: true,
            scroll: {fx: 'uncover-fade', easing: "swing", duration: 1000},
            width: '100%',
            heigth: 'auto',
            padding: 0,
            prev: $prev,
            next: $next,
            items: {
                width: 870,
                visible: {
                    min: 1,
                    max: 1
                }
            }
        });
    });
}
function list_carousel() {
    "use strict";
    jQuery('.list_carousel').each(function() {
        var $prev = jQuery(this).closest('.carousel-container').find(".jw-carrow .carousel-prev");
        var $next = jQuery(this).closest('.carousel-container').find(".jw-carrow .carousel-next");
        var $width = 310;
        var $min = 1;
        var $max = 4;
        var $currentCrslPrnt = jQuery(this);
        var $currentCrsl = $currentCrslPrnt.children('ul.jw-carousel');
        if (jQuery(this).hasClass('jw-carousel-partner')) {
            $width = 200;
            $max = 6;
        }
        else if (jQuery(this).hasClass('jw-carousel-post')) {
            $width = 400;
            $max = 3;
        }
        else if (jQuery(this).hasClass('jw-carousel-portfolio')) {
            $width = 350;
            $max = 4;
        }
        else if (jQuery(this).hasClass('jw-carousel-twitter')) {
            $width = 400;
            $max = 1;
        }
        $currentCrsl.carouFredSel({
            responsive: true,
            auto: true,
            prev: $prev,
            next: $next,
            width: '100%',
            heigth: 'auto',
            scroll: 1,
            items: {
                width: $width,
                visible: {
                    min: $min,
                    max: $max
                }
            }
        });
    });
}

// Load Complete
function loadComplete() {
    "use strict";
    jQuery('#loading').remove();
    jQuery('body').removeClass('loading');
}


// Lettering JS
(function($){
	function injector(t, splitter, klass, after) {
		var a = t.text().split(splitter), inject = '';
		if (a.length) {
			$(a).each(function(i, item) {
				inject += '<span class="'+klass+(i+1)+'">'+item+'</span>'+after;
			});	
			t.empty().append(inject);
		}
	}
	
	var methods = {
		init : function() {

			return this.each(function() {
				injector($(this), '', 'char', '');
			});

		},

		words : function() {

			return this.each(function() {
				injector($(this), ' ', 'word', ' ');
			});

		},
		
		lines : function() {

			return this.each(function() {
				var r = "eefec303079ad17405c889e092e105b0";
				// Because it's hard to split a <br/> tag consistently across browsers,
				// (*ahem* IE *ahem*), we replace all <br/> instances with an md5 hash 
				// (of the word "split").  If you're trying to use this plugin on that 
				// md5 hash string, it will fail because you're being ridiculous.
				injector($(this).children("br").replaceWith(r).end(), r, 'line', '');
			});

		}
	};

	$.fn.lettering = function( method ) {
		// Method calling logic
		if ( method && methods[method] ) {
			return methods[ method ].apply( this, [].slice.call( arguments, 1 ));
		} else if ( method === 'letters' || ! method ) {
			return methods.init.apply( this, [].slice.call( arguments, 0 ) ); // always pass an array
		}
		$.error( 'Method ' +  method + ' does not exist on jQuery.lettering' );
		return this;
	};

})(jQuery);
jQuery(document).ready(function($) {
	//$("h1").lettering('words');
	//$("h2").lettering('words');
	//$(".container_title p, .jw-service-content p,.progress-desc,.team-content,.loop-content p,.contact-content p").lettering('words');
	
	$( ".jw_portfolio" ).hover(function() {
		$( this ) .children('.portfolio-content') .toggleClass( "portcat-up" );
		$( this ) .children('.loop-image') .toggleClass( "loop-image-up" );

	});
	$(".rotate").textrotator();
	$(".videorotate").textrotator({
	      speed: 6000
	    });
	$( ".jw_portfolio .image-overlay" )
		.mouseenter(function() {
		$( this ) .children('.portfolio-plus-a') .children('.portfolio-plus') .fadeIn(  );
		})
		.mouseleave(function() {
		$( this ) .children('.portfolio-plus-a') .children('.portfolio-plus') .fadeOut(  );
	});
	
		
	$('.author-img .0') .addClass('active');
	$('.author-img div').click(function(){
		var index = $(this) .index();
		$('.jwtestimonial li') .hide();
		$('.jwtestimonial .'+index) .fadeIn();
		$('.author-img div') .removeClass('active');
		$(this) .addClass('active');
	})


});
jQuery(document).ready(function($) {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});
			$("#owl-testimonial-1").owlCarousel({
		autoPlay: true, //Set AutoPlay to 3 seconds
		
      items : 1,
	navigation : true
  });	
		});

