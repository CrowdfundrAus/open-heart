
        <header id="header"<?php echo jw_option('menu_fixed')&&!preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|sagem|sharp|sie-|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT']) ? ' class="affix topheader"' : ''; ?>>
            <?php echo jw_option('logo_bg') ? '<div class="jw-logo-bg"></div>' : ''; ?>
			
            <div class="container">                        
                <div class="row">
				
                    <div class="span3">
                        <?php theme_logo(); ?>
                    </div>
                    <div class="span9" id="header-style-1">
                        <nav class="menu-container visible-desktop clearfix">
                            <?php theme_menu(); ?>
                        </nav>
                    </div>
                    <div class="show-mobile-menu hidden-desktop clearfix">
                        <div class="mobile-menu-text"><?php _e('Menu', 'designinvento'); ?></div>
                        <div class="mobile-menu-icon">
                            <span></span><span></span><span></span><span></span>
                        </div>
                    </div>
                </div>

            </div>
            <nav id="mobile-menu">
                <div class="container">
                    <?php mobile_menu(); ?>
                </div>
            </nav>
        </header>
		 <?php
			get_template_part('slider');
		
	
	
	
	 
     