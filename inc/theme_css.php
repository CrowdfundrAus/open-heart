<?php

function theme_option_styles() {

    function hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        return implode(",", $rgb); // returns the rgb values separated by commas
        //return $rgb; // returns an array with the rgb values
    }
    ?>

    <!-- Custom CSS -->

    <style>
        body {
            font-family: <?php echo jw_option('body_text_font', 'face'); ?>, Arial, Helvetica, sans-serif;
            font-size: <?php echo jw_option('body_text_font', 'size'); ?>; 
            font-weight: <?php echo jw_option('body_text_font', 'style'); ?>; 
            color: <?php echo jw_option('body_text_font', 'color'); ?>;
        }
        h1,h2,h3,h4,h5,h6,.team-member h3, .team-member h3 a,.wpcf7-form p       
        {font-family: <?php echo jw_option('heading_font'); ?>;}
        h1{ font-size: <?php echo jw_option('h1_spec_font', 'size'); ?>; color: <?php echo jw_option('h1_spec_font', 'color'); ?>; }
        h2{ font-size: <?php echo jw_option('h2_spec_font', 'size'); ?>; color: <?php echo jw_option('h2_spec_font', 'color'); ?>; }
        h3{ font-size: <?php echo jw_option('h3_spec_font', 'size'); ?>; color: <?php echo jw_option('h3_spec_font', 'color'); ?>; }
        h4{ font-size: <?php echo jw_option('h4_spec_font', 'size'); ?>; color: <?php echo jw_option('h4_spec_font', 'color'); ?>; }
        h5{ font-size: <?php echo jw_option('h5_spec_font', 'size'); ?>; color: <?php echo jw_option('h5_spec_font', 'color'); ?>; }
        h6{ font-size: <?php echo jw_option('h6_spec_font', 'size'); ?>; color: <?php echo jw_option('h6_spec_font', 'color'); ?>; }
		
		
		.jw-milestones-count>.jw-milestones-show>ul>li{
		  font-size: 60px;
		  font-family: <?php echo jw_option('heading_font'); ?>;
		  
	      }
        a,.jw-callout h1 a,#sidebar ul.menu .current_page_item a,.sf-menu > li.current_page_item > a{ color: <?php echo jw_option('link_color'); ?>; }
        a:hover, a:focus,.loop-meta a:hover,article .loop-content a.more-link:hover{ color: <?php echo jw_option('link_hover_color'); ?>; }
		h2 .word2,h1 .word3,h1 .word4,.container_title p .word9,.container_title p .word10,.container_title p .word11,.container_title p .word12,.jw-element p .word30,.jw-element p .word31,.jw-element p .word32,.jw-element p .word33,.jw-element p .word75,.jw-element p .word76,.jw-element p .word77, .jw-service-content p .word10, .jw-service-content p .word11{color:<?php echo jw_option('primary_color'); ?>;}
 
		/* Top Bar ------------------------------------------------------------------------ */

        .jw-top-bar{ background: <?php echo jw_option('top_bar_bg'); ?>;}

        /* Header ------------------------------------------------------------------------ */  
        #header { background-color: <?php echo jw_option('header_background'); ?>; }

        /* Navigation ------------------------------------------------------------------------ */ 

       #header.stuck{ background:<?php echo "rgba(" . hex2rgb(jw_option('header_background')) . ",.9)" ?>;	}
        ul.sf-menu > li a{ font-family: <?php echo jw_option('menu_font', 'face'); ?>, Arial, Helvetica, sans-serif; font-size: <?php echo jw_option('menu_font', 'size'); ?>; font-weight: <?php echo jw_option('menu_font', 'style'); ?>; color: <?php echo jw_option('menu_link_normal_color'); ?>; }
        ul.sf-menu li ul li.current-menu-item a,ul.sf-menu li ul li a { color: <?php echo jw_option('submenu_link'); ?>; }
        ul.sf-menu li ul li a:hover,ul.sf-menu li ul li.current-menu-item a,ul.sf-menu li ul li.current_page_item a { color: <?php echo jw_option('primary_color'); ?>; }
		ul.sf-menu > li:hover > a{
			
			color: <?php echo jw_option('menu_hover'); ?>;
		}
        /* Main ------------------------------------------------------------------------ */  
        #main { background: <?php echo jw_option('body_background'); ?>; }
		
				
		/* Services------------------------------------------------------------------------*/
		.jw-service-content p a:hover, .jw-infinite-scroll a:hover{
		background-color:<?php echo jw_option('primary_color'); ?> !important;
		color:#fff !important;
		transition: all 0.4s ease-out 0.1s;		
		}
		.jw-service-content p a, .jwhistory .yearcat,.btn-slider{
		border-color:<?php echo jw_option('primary_color'); ?> ;
		color:<?php echo jw_option('primary_color'); ?> !important;
		}		
		.jw-servicebox .jw-service-icon{
		border-color:<?php echo jw_option('primary_color'); ?> ;
		color:<?php echo jw_option('primary_color'); ?>;
		}
		.jw-infinite-scroll a{
			border:1px solid <?php echo jw_option('primary_color'); ?> ;
			color:<?php echo jw_option('primary_color'); ?>;
			margin-top:30px
		}
		.jw-servicebox:hover{
		border-color:<?php echo jw_option('primary_color'); ?> ;
		}
		.percentageinner{
			background: none repeat scroll 0 0 <?php echo jw_option('primary_color'); ?>;
			border-radius: 68%;
			height: 60%;
			left: 20%;
			line-height: 330%;
			color:#fff;
			position: absolute;			
			top: 20%;
			width: 60%;
		}
		
		.pl-g,div.progressBar{	
			background: <?php echo jw_option('primary_color'); ?>;	
		}
		
	/* History ------------------------------------------------------------------------ */  
		.btn-slider:hover,.jwhistory li .history-content:hover, .jwhistory li .history-content:hover .angle-box-history, .historydividerbox {
			background:<?php echo jw_option('primary_color'); ?> !important;
			color:#fff !important;
		}
		
		 /* Divider ------------------------------------------------------------------------ */  
			.member-title .bottomdivider, .portfolio-content .bottomdivider{
				width: 50px;
				height: 1px;
				margin: 0px auto;
				border-bottom: 1px solid <?php echo jw_option('primary_color'); ?>;
				margin-top:10px;
						}
		 /* Icons ------------------------------------------------------------------------ */  				
		#page-title span, .portfolio-plus-a i,.team-member .member-title span,.auther-name span,.top-bar-address .span-color{
			color:<?php echo jw_option('primary_color'); ?>;
		}
		
		.image-overlay:hover {
		background:<?php echo "rgba(" . hex2rgb(jw_option('primary_color')) . ",.3)" ?>;	
		}		
		.portfolio-plus, .jwhistory .yearcat p{
		color:<?php echo jw_option('primary_color'); ?>;
		}
		ul.loop-meta li a,ul.loop-meta li i, i.cm, .pagination-container .alignright:hover .npost, .pagination-container .alignleft:hover .npost,.cinfo i{
		color:<?php echo jw_option('primary_color'); ?>;
		}
		
		input[type="text"]:focus,
		input[type="password"]:focus,
		input[type="email"]:focus,
		textarea:focus {
		border: 1px solid <?php echo jw_option('primary_color'); ?>;
		}
		/* Features ------------------------------------------------------------------------ */  
		
		.jw-features .jw-service-box:hover i{
		    transition: all 0.2s ease-out 0.1s;
			background:<?php echo jw_option('primary_color'); ?> !important;
			color:#fff !important;
		}
		
		/* blog ------------------------------------------------------------------------ */  
			.loop-meta span.date, .map-header-active,.tagcloud a:hover,#footer .tagcloud a:hover{
				background:<?php echo jw_option('primary_color'); ?> !important;
			}
			.bx-wrapper .bx-pager.bx-default-pager a:hover,.bx-wrapper .bx-pager.bx-default-pager a.active {
			background:<?php echo jw_option('primary_color'); ?>;
			border:1px solid <?php echo jw_option('primary_color'); ?>;
			}
			.loop-block .read-more-container a{
			
			}
			button:hover,input[type="reset"]:hover,input[type="button"]:hover,.loop-block .loop-divider{
				background:<?php echo jw_option('primary_color'); ?>;
				
				border:none;
			}
			.pagination-container li a:hover{
			background:<?php echo jw_option('primary_color'); ?> !important;
				color:#fff !important;
				border:none !important;
			}
			.events .span6 .loop-image img{
				border:2px solid <?php echo jw_option('primary_color'); ?>;
			}
			#footer .tagcloud a:hover, a.live-preview:hover,input[type="submit"]:hover{
			border:1px solid <?php echo jw_option('primary_color'); ?>;
			background:<?php echo jw_option('primary_color'); ?> !important;
			}
			.progress .progress-bar{
			
			background:<?php echo jw_option('primary_color'); ?> !important;
			}
			.jw-service-box .jw-service-icon i{
			border:1px solid <?php echo jw_option('primary_color'); ?>!important;
			}.nav-style-2 ul li a:hover{
			border:2px solid <?php echo jw_option('primary_color'); ?>!important;
			
			}.left-service:hover .jw-service-icon i{
			border:0px solid <?php echo jw_option('primary_color'); ?>!important;
			
			}
		/* portfolio ------------------------------------------------------------------------ */  
		.read-more-container:hover .more-link,.jw-service-box .jw-service-icon i,.jw-milestones-count > .jw-milestones-show,.portfolio-content .portfolio-btn:hover,.event-link a:hover,.top-icon a:hover,.all-events .icon-long-arrow-right,.jw-filter ul li a:hover, .jw-filter ul li a.selected,.link:hover a i,.nav-style-2 ul.sf-menu > li a:hover{
		color:<?php echo jw_option('primary_color'); ?> !important;
		}
		
		
		/* Pricing ------------------------------------------------------------------------ */  
		
		.jw-pricing-recommended-bottom,  .jw-blog .isotope-item .image-overlay .loop-date {
		 background:<?php echo jw_option('primary_color'); ?>;
		 transition: all 0.2s ease-out 0.1s;
		 color:#fff;
		}
		.jw-pricing-bottom ul li i, .jw-pricing-recommended, a.live-preview:hover,.jw-callout:hover .btn,.blog-carsolmeta .one-auther i,.blog-carsolmeta .one-auther span i,.comment-count i,.callout-btn .btn-large,.comment-meta span.comment-replay-link,.comment-meta span.comment-replay-link a,.blog-carsolmeta .one-auther span a:hover,.jw-twitter .jtwt li span a{
		 color:<?php echo jw_option('primary_color'); ?> !important;
		}
		.text_btn-text:hover .btn, .jw-callout:hover .btn,.event-link a:hover,.jw-social-icon a:hover,#bottom .jw-social-icon:hover a,.nav-style-3 ul li a:hover,.nav-style-4 ul li a:hover{
			border-color:<?php echo jw_option('primary_color'); ?> !important;
		}
			
        /* Footer ------------------------------------------------------------------------ */  
		
        #footer{ background-color: <?php echo jw_option('footer_background'); ?>;background-image: url('<?php echo jw_option('footer_backgroundimg'); ?>');background-repeat:repeat}
        #footer{ color: <?php echo jw_option('footer_text_color'); ?>; }
        #footer a:hover, #footer .jw-recent-posts-widget h4 a:hover{ color: <?php echo jw_option('footer_link_hover_color'); ?>; }
       
        #sidebar a{ color: <?php echo jw_option('body_text_font', 'color'); ?>}
		#sidebar li:hover a,.events .span6:hover .event-title h3,.carousel-arrow a.carousel-prev:hover i, .carousel-arrow a.carousel-next:hover i{ color:<?php echo jw_option('primary_color'); ?>;}
        
        #footer h3.widget-title { font-family: <?php echo jw_option('footer_widgets_title', 'face'); ?>, Arial, Helvetica, sans-serif; font-size: <?php echo jw_option('footer_widgets_title', 'size'); ?>; font-weight: <?php echo jw_option('footer_widgets_title', 'style'); ?>; color: <?php echo jw_option('footer_widgets_title', 'color'); ?>; }

        /* General Color ------------------------------------------------------------------------ */ 

        ::selection{ background: <?php echo jw_option('primary_color'); ?>; }
        ::-moz-selection{ background: <?php echo jw_option('primary_color'); ?>; }

        .sub-title{color: <?php echo jw_option('body_text_font', 'color'); ?>;}

        .ui-slider-handle,.team-member-overlay,.jw-service-box:hover .jw-service-icon i,.text_btn-text:hover .btn,.callout-btn a:hover,.jw-blog .read-more-container a:hover,.member-social .jw-social-icon a:hover,.loop-block .read-more-container a:hover,#sidebar aside.widget ul.jtwt li:before,#footer aside.widget ul.jtwt li:before,ul.jtwt li:before{ background: <?php echo jw_option('primary_color'); ?> !important; }
        .content-meta,.comment-block .comment span.comment-splash,.jw-pagination.pagination ul>li>a.selected,.jw-404-search-container,.woocommerce span.onsale, .woocommerce-page span.onsale,
        .woocommerce a.button.alt, .woocommerce-page a.button.alt, .woocommerce button.button.alt, .woocommerce-page button.button.alt, .woocommerce input.button.alt, .woocommerce-page input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce-page #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page #content input.button.alt{ background: <?php echo jw_option('primary_color'); ?>; }
        .team-member ul.jw-social-icon li a:hover,ul.jw-social-icon li a:hover,.cause-read a:hover,.gri figure,.even-content .span1,.image-content .span1,.error4button a:hover{ background-color: <?php echo jw_option('primary_color'); ?>; }
        .featured,.jw-dropcap,.progress .bar,.pagination ul>li>a.current,.carousel-content .post-format,span.post-format,.nav-tabs>li>a, .tabs-below>.nav-tabs>li>a,blockquote:before,.text_btn-text-line,.blog-main-loop .more:hover,#bottom,#page-title,.pagination ul>li>a.current, .pagination ul>li>span.current, .pagination ul>li>a:hover,.fancybox-skin{ background-color: <?php echo jw_option('primary_color'); ?>; }
        footer#footer .jw-recent-posts-widget .meta a,.highlight,.jw-top-bar-info a,#bottom a,.jw-title-container h3 span,#sidebar ul.menu li.current_page_item a,ul.sf-menu > li.current_page_ancestor > a,ul.sf-menu > li.current-menu-ancestor >a,h3.error404 span,.total strong,.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.goes{ color: <?php echo jw_option('primary_color'); ?>; }
        .jw-top-service-text div:last-child,h2.loop-title a:hover,#sidebar a:hover,.pagination ul>li>a.current, .pagination ul>li>span.current, .pagination ul>li>a:hover,.list_carousel li .carousel-content h3:hover a,h2.portfolio-title a:hover,.image-content h5,.event-title p i,.event-read a:hover,.event-new:hover .event-title h3 a{ color: <?php echo jw_option('primary_color'); ?> ; }
        .jw-testimonials .testimonial-author.active,.pagination ul>li>a.current, .pagination ul>li>span.current,.team-member .loop-image,ul.sf-menu > li.current-menu-item,.pagination ul>li>a:hover,ul.sf-menu > li.current_page_ancestor,.cause-read a:hover,.jw-blog .read-more-container a:hover,.blog-main-loop .more:hover,.member-social .jw-social-icon a:hover,.pagination ul>li>a.current, .pagination ul>li>span.current, .pagination ul>li>a:hover,.event-new .loop-image img,.error4button a:hover,.testimonial-author{ border-color: <?php echo jw_option('primary_color'); ?>; }
        ul.sf-menu > li.current-page-item,.jw-testimonials .carousel-arrow a.carousel-prev:hover, .jw-testimonials .carousel-arrow a.carousel-next:hover,ul.sf-menu > li a:hover{ background:<?php echo jw_option('primary_color'); ?>; }
		 
        <?php $TeamHoverBg = '#fff'; ?>
		@media (min-width: 768px) and (max-width: 979px) { 
            header#header,header#header.stuck{ background: <?php echo jw_option('logo_bg') ? jw_option('primary_color') : '#fff'; ?>; }
        }
        @media (min-width: 768px) and (max-width: 979px) { 
            .mobile-menu-icon span{ background: <?php echo jw_option('logo_bg') ? '#fff' : jw_option('primary_color'); ?>; }
        }
        <?php echo jw_option('custom_css'); ?>
    </style>

    <?php
}

add_action('wp_head', 'theme_option_styles', 100);
?>