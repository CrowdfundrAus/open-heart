<?php
/* ================================================================================== */
/*      Accordion Shortcode
  /* ================================================================================== */

// Accordion container
if (!function_exists('shortcode_jw_accordion')) {

    function shortcode_jw_accordion($atts, $content) {
        $output = '<div class="jw-accordion">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_accordion', 'shortcode_jw_accordion');
// Accordion Item
if (!function_exists('shortcode_jw_accordion_item')) {

    function shortcode_jw_accordion_item($atts, $content) {
        if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation']='none';}
        $expand = (!empty($atts['item_expand']) && $atts['item_expand'] == 'true') ? true : false;
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' jw-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
        
        $output = '<div class="accordion-group '.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= '<div class="accordion-heading">';
        $output .= '<a class="accordion-toggle ' . ($expand ? ' active' : '') . '" data-toggle="collapse" data-parent="" href="#" style="background-color:' . $atts['color'] . ';">';
        $output .= $atts['item_title'];
        $output .= '<span class="jw-check"><i class="icon-plus"></i><i class="icon-minus"></i></span>';
        $output .= '</a>';
        $output .= '</div>';
        $output .= '<div class="accordion-body collapse' . ($expand ? ' in' : '') . '" >';
        $output .= '<div class="accordion-inner">';
        $output .= apply_filters("the_content", $content);
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';


        return $output;
    }

}
add_shortcode('jw_accordion_item', 'shortcode_jw_accordion_item');



/* ================================================================================== */
/*      List Shortcode
  /* ================================================================================== */

// List container
if (!function_exists('shortcode_jw_list')) {

    function shortcode_jw_list($atts, $content) {
        $output = '<ul class="jw-list">';
        $output .= do_shortcode($content);
        $output .= '</ul>';
        return $output;
    }

}
add_shortcode('jw_list', 'shortcode_jw_list');
// List Item
if (!function_exists('shortcode_jw_list_item')) {

    function shortcode_jw_list_item($atts, $content) {
        if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' jw-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
         $output = '<li class="'.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'><i class="' . $atts['item_icon'] . '"></i>' . do_shortcode($content) . '</li>';
        return $output;
    }

}
add_shortcode('jw_list_item', 'shortcode_jw_list_item');


/* ================================================================================== */
/*      Table List Shortcode
  /* ================================================================================== */

// Table List container
if (!function_exists('shortcode_jw_table_list')) {

    function shortcode_jw_table_list($atts, $content) {
        $output = '<ul class="jw-table-list">';
        $output .= do_shortcode($content);
        $output .= '</ul>';
        return $output;
    }

}
add_shortcode('jw_table_list', 'shortcode_jw_table_list');
// Table List Item
if (!function_exists('shortcode_jw_table_list_item')) {

    function shortcode_jw_table_list_item($atts, $content) {
        if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' jw-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
         $output = '<li class="'.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>' . do_shortcode($content) . '<i data-icon="' . $atts['item_icon'] . '"></i></li>';
        return $output;
    }

}
add_shortcode('jw_table_list_item', 'shortcode_jw_table_list_item');




/* ================================================================================== */
/*      Toggle Shortcode
  /* ================================================================================== */

// Toggle container
if (!function_exists('shortcode_jw_toggle')) {

    function shortcode_jw_toggle($atts, $content) {
        $output = '<div class="jw-toggle">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_toggle', 'shortcode_jw_toggle');
// Toggle Item
if (!function_exists('shortcode_jw_toggle_item')) {

    function shortcode_jw_toggle_item($atts, $content) {
        $atts['color'] = isset($atts['color'])?$atts['color']:'';
        $expand = (!empty($atts['item_expand']) && $atts['item_expand'] == 'true') ? true : false;
        if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' jw-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
        $output = '<div class="accordion-group'.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= '<div class="accordion-heading ' . ($expand ? ' active' : '') . '">';
        $output .= '<a class="accordion-toggle toggle ' . ($expand ? ' active' : '') . '" data-toggle="collapse" href="#" style="background-color:' . $atts['color'] . ';">';
        $output .= $atts['item_title'];
        $output .= '<span class="jw-check"><i class="icon-plus"></i><i class="icon-minus"></i></span>';
        $output .= '</a>';
        $output .= '</div>';
        $output .= '<div class="accordion-body collapse' . ($expand ? ' in' : '') . '" >';
        $output .= '<div class="accordion-inner">';
        $output .= apply_filters("the_content", $content);
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';

        return $output;
    }

}
add_shortcode('jw_toggle_item', 'shortcode_jw_toggle_item');



/* ================================================================================== */
/*      Tab Shortcode
  /* ================================================================================== */

// Tab container
if (!function_exists('shortcode_jw_tab')) {

    function shortcode_jw_tab($atts, $content) {
        $position = (!empty($atts['position']) || $atts['position'] != 'top') ? (' tabs-' . $atts['position']) : '';
        $output = '<div class="jw-tab tabbable' . $position . '">';
        $output .= do_shortcode($content);
        $output .= '<ul class="nav nav-tabs"></ul>';
        $output .= '<div class="tab-content"></div>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_tab', 'shortcode_jw_tab');
// Tab Item
if (!function_exists('shortcode_jw_tab_item')) {

    function shortcode_jw_tab_item($atts, $content) {
        $atts = shortcode_atts(array(
            'title_icon' => '',
            'title' => '',
                ), $atts);
        $output = '<li>';
        $output .= '<a href="">';
        if (!empty($atts['title_icon'])) {
            $output .= '<i class="' . $atts['title_icon'] . '"></i>';
        }
        if (!empty($atts['title'])) {
            $output .= '<span>' . $atts['title'] . '</span>';
        }
        $output .= '</a>';
        $output .= '</li>';
        $output .= '<div class="tab-pane" id="">';
        $output .= apply_filters("the_content", $content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_tab_item', 'shortcode_jw_tab_item');



/* ================================================================================== */
/*      Blog Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_blog')) {

    function shortcode_jw_blog($atts, $content) {
        global $paged, $jw_options;
        $output = '<div class="jw-blog">';
        $query = Array(
            'post_type' => 'post',
            'posts_per_page' => $atts['post_count'],
            'paged' => $paged,
        );
        $cats = empty($atts['category_ids']) ? false : explode(",", $atts['category_ids']);
        if ($cats) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'category',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        $jw_options['pagination'] = isset($atts['pagination'])?$atts['pagination']:'none';
        $jw_options['more_text'] = $atts['more_text'];
		
		$atts['layout'] = !empty($atts['layout']) ? $atts['layout'] : 'standard';
		
        if($atts['layout_size']==='span9'){
			$jw_options['layout'] = 'standard';
            if($atts['layout']!='standard')
                $jw_options['layout']='3';
        }elseif($atts['layout_size']==='span12'){
            switch ($atts['layout']){
                case '2':{ $jw_options['layout']='6';break;}
                case '3':{ $jw_options['layout']='4';break;}
                case '4':{ $jw_options['layout']='3';break;}
                case 'standard':{ $jw_options['layout']='standard';break;}
            }
        }
        
        if($jw_options['pagination']==='infinite'){
            wp_enqueue_script('blog-infinitescroll', THEME_DIR . '/assets/js/blog-infinitescroll.js', false, false, true);
        }
        if($jw_options['layout'] != 'standard'){
            add_action('wp_footer', 'portfolio_script');
        }
		
        query_posts($query);
        ob_start();
        get_template_part("loop");
        $output .= ob_get_clean();
        wp_reset_query();
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_blog', 'shortcode_jw_blog');




/* ================================================================================== */
/*      Column Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_column')) {

    function shortcode_jw_column($atts, $content) {
        $output = apply_filters("the_content", $content);
        return $output;
    }

}
add_shortcode('jw_column', 'shortcode_jw_column');



/* ================================================================================== */
/*      Item Shortcode Container
  /* ================================================================================== */
if (!function_exists('shortcode_jw_item')) {

    function shortcode_jw_item($atts, $content) {
        if ($atts['row_type'] === 'row') {
            $atts['size'] = $atts['layout_size'];
        } else {
            if ($atts['layout_size'] === 'span3') {
                $atts['size'] = 'span12';
            }
        }
        if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' jw-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
        
        $output = '<div class="jw-element ' . $atts['size'] . ' ' . $atts['class'] .$class. '" '.($animated?'data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>' . do_shortcode($content) . '</div>';
        return $output;
    }

}
add_shortcode('jw_item', 'shortcode_jw_item');



/* ================================================================================== */
/*      Item Title Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_item_title')) {

    function shortcode_jw_item_title($atts, $content) {
        $output = '<div class="jw-title-container"><h2 class="jw-title">' . rawUrlDecode($atts['title']) . '</h2></div>';
        return $output;
    }

}
add_shortcode('jw_item_title', 'shortcode_jw_item_title');



/* ================================================================================== */
/*      Layout Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_layout')) {

    function shortcode_jw_layout($atts, $content) {
        $output = '<div class="' . pbTextToFoundation($atts['size']) . ' ' . $atts['layout_custom_class'] . '">' . do_shortcode($content) . '</div>';
        return $output;
    }

}
add_shortcode('jw_layout', 'shortcode_jw_layout');



/* ================================================================================== */
/*      Core Content Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_content')) {

    function shortcode_jw_content() {
        return apply_filters("the_content", get_the_content());
    }

}
add_shortcode('jw_content', 'shortcode_jw_content');



/* ================================================================================== */
/*      Contact Info Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_contact_info')) {

    function shortcode_jw_contact_info($atts, $content) {
		$output = '<div class="contactinfo_container">';
		$output .= '<div class="contact-content"><p>'.$atts['contact_content'].'</p></div>';
		$output .= '<div class="contact-call cinfo"><div><i class="icon-phone"></i></div>'.$atts['contact_call'].'</div>';
		$output .= '<div class="contact-email cinfo"><div><i class=" icon-envelope"></i></div>'.$atts['contact_email'].'</div>';
		$output .= '<div class="contact-addr cinfo"><div><i class="icon-map-marker"></i></div>'.$atts['contact_addr'].'</div>';
		
		$output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_contact_info', 'shortcode_jw_contact_info');


/* ================================================================================== */
/*     Google Map Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_google_map')) {

    function shortcode_jw_google_map($atts, $content) {

		
		$output  = '<div class="mapslide" style="display:block;width: 100%; height: 500px;position:relative;">';
		$output .= '<div id="map" style="display:block;width: 100%; height: 500px;position:relative;"></div>';
		$output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_google_map', 'shortcode_jw_google_map');



/* ================================================================================== */
/*      Service Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_service')) {

    function shortcode_jw_service($atts, $content) {		
        $output = '<div class="jw-service">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_service', 'shortcode_jw_service');



// Service Item
if (!function_exists('shortcode_jw_service_item')) {

    function shortcode_jw_service_item($atts, $content) {
        $style = '';
        $thumb = '';
        $thumbType = isset($atts['thumb_type']) ? $atts['thumb_type'] : 'fa';
        $style_for_desc = '';
        $margin_for_desc = '';
        if ($atts['service_style'] === 'style_2') {
            $style = 'left-service';
            $style_for_desc = 'desc_unstyle';
            $margin_for_desc = 'margin-left:' . ($thumbType === 'fa' ? ($atts['fa_size'] + $atts['fa_padding'] + $atts['fa_padding'] + 30) : ($thumbType === 'image'?(intval($atts['service_thumb_width']) + 30):(intval($atts['cc_size']) + 15))) . 'px;';
            if($thumbType === 'cc'){$margin_for_desc.='margin-right:15px;';}
        }
		elseif ($atts['service_style'] === 'style_3') {
			$style = 'service3';
            $style_for_desc = 'desc_unstyle';
            $margin_for_desc = 'margin-left:' . ($thumbType === 'fa' ? ($atts['fa_size'] + $atts['fa_padding'] + $atts['fa_padding'] + 30) : ($thumbType === 'image'?(intval($atts['service_thumb_width']) + 30):(intval($atts['cc_size']) + 15))) . 'px;';
            if($thumbType === 'cc'){$margin_for_desc.='margin-right:15px;';}
        }
		elseif ($atts['service_style'] === 'style_4') {
			$style = 'service4';
            $style_for_desc = 'desc_unstyle';
            $margin_for_desc = 'margin-left:' . ($thumbType === 'fa' ? ($atts['fa_size'] + $atts['fa_padding'] + $atts['fa_padding'] + 30) : ($thumbType === 'image'?(intval($atts['service_thumb_width']) + 30):(intval($atts['cc_size']) + 15))) . 'px;';
            if($thumbType === 'cc'){$margin_for_desc.='margin-right:15px;';}
        }
		elseif ($atts['service_style'] === 'style_5') {
			$style = 'service5';
            $style_for_desc = 'desc_unstyle';
            $margin_for_desc = 'margin-left:' . ($thumbType === 'fa' ? ($atts['fa_size'] + $atts['fa_padding'] + $atts['fa_padding'] + 30) : ($thumbType === 'image'?(intval($atts['service_thumb_width']) + 30):(intval($atts['cc_size']) + 15))) . 'px;';
            if($thumbType === 'cc'){$margin_for_desc.='margin-right:15px;';}
        }
        if ($thumbType === 'image') {
            $thumb = isset($atts['service_thumb']) ? '<img title="' . $atts['title'] . '" width="' . $atts['service_thumb_width'] . '" src="' . $atts['service_thumb'] . '" />' : '';
        } elseif ($thumbType === 'fa') {
            $thumb = do_shortcode('[jw_fontawesome fa_type="' . $atts['fa_type'] . '" fa_size="' . $atts['fa_size'] . '" fa_padding="' . $atts['fa_padding'] . '" fa_color="' . $atts['fa_color'] . '" fa_bg_color="' . $atts['fa_bg_color'] . '" fa_border_color="' . $atts['fa_border_color'] . '" fa_rounded="' . $atts['fa_rounded'] . '" fa_icon="' . $atts['fa_icon'] . '"]');
        } elseif ($thumbType === 'cc') {
            $thumb = do_shortcode('[jw_chart_circle cc_type="' . $atts['cc_type'] . '" cc_line_width="' . $atts['cc_line_width'] . '" cc_text="' . $atts['cc_text'] . '" cc_percent="' . $atts['cc_percent'] . '" cc_size="' . $atts['cc_size'] . '" cc_font_size="' . $atts['cc_font_size'] . '" cc_font_color="' . $atts['cc_font_color'] . '" cc_color="' . $atts['cc_color'] . '" cc_track_color="' . $atts['cc_track_color'] . '" cc_icon="' . $atts['cc_icon'] . '"]');
        }
        if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' jw-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }

        $output = '<div class="jw-service-box ' . $style .$class. '"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= '<div class="jw-service-icon">' . $thumb . '</div>';
        $output .= '<div class="jw-service-content ' . $style_for_desc . '" style="' . $margin_for_desc . '">';
        $output .= '<h3>' . $atts['title'] . '</h3>';
        $output .= '<p>' . do_shortcode($content) . '</p>';
        if (!empty($atts['more_url']))
            $output .= '<p><a href="' . $atts['more_url'] . '" target="' . $atts['more_target'] . '">' . $atts['more_text'] . '</a></p>';
        $output .= '</div>';
        $output .= "</div>";
        return $output;
    }

}
add_shortcode('jw_service_item', 'shortcode_jw_service_item');



/* ================================================================================== */
/*      Service Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_servicebox')) {

    function shortcode_jw_servicebox($atts, $content) {
        $output = '<div class="jw-servicebox clearfix">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_servicebox', 'shortcode_jw_servicebox');



// Service Item
if (!function_exists('shortcode_jw_servicebox_item')) {

    function shortcode_jw_servicebox_item($atts, $content) {
        $style = '';
        $thumb = '';
        $thumbType = isset($atts['thumb_type']) ? $atts['thumb_type'] : 'fa';
        $style_for_desc = '';
        $margin_for_desc = '';
        if ($atts['service_style'] === 'style_2') {
            $style = 'left-service';
            $style_for_desc = 'desc_unstyle';
            $margin_for_desc = 'margin-left:' . ($thumbType === 'fa' ? ($atts['fa_size'] + $atts['fa_padding'] + $atts['fa_padding'] + 30) : ($thumbType === 'image'?(intval($atts['service_thumb_width']) + 30):(intval($atts['cc_size']) + 15))) . 'px;';
            if($thumbType === 'cc'){$margin_for_desc.='margin-right:15px;';}
        }
        if ($thumbType === 'image') {
            $thumb = isset($atts['service_thumb']) ? '<img title="' . $atts['title'] . '" width="' . $atts['service_thumb_width'] . '" src="' . $atts['service_thumb'] . '" />' : '';
        } elseif ($thumbType === 'fa') {
            $thumb = do_shortcode('[jw_fontawesome fa_type="' . $atts['fa_type'] . '" fa_size="' . $atts['fa_size'] . '" fa_padding="' . $atts['fa_padding'] . '" fa_color="' . $atts['fa_color'] . '" fa_bg_color="' . $atts['fa_bg_color'] . '" fa_border_color="' . $atts['fa_border_color'] . '" fa_rounded="' . $atts['fa_rounded'] . '" fa_icon="' . $atts['fa_icon'] . '"]');
        } elseif ($thumbType === 'cc') {
            $thumb = do_shortcode('[jw_chart_circle cc_type="' . $atts['cc_type'] . '" cc_line_width="' . $atts['cc_line_width'] . '" cc_text="' . $atts['cc_text'] . '" cc_percent="' . $atts['cc_percent'] . '" cc_size="' . $atts['cc_size'] . '" cc_font_size="' . $atts['cc_font_size'] . '" cc_font_color="' . $atts['cc_font_color'] . '" cc_color="' . $atts['cc_color'] . '" cc_track_color="' . $atts['cc_track_color'] . '" cc_icon="' . $atts['cc_icon'] . '"]');
        }
        if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' jw-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }

        $output = '<div class="jw-service-box span3 ' . $style .$class. '"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= '<div class="jw-service-icon">' . $thumb . '</div>';
        $output .= '<div class="jw-service-content ' . $style_for_desc . '" style="' . $margin_for_desc . '">';
        $output .= '<h3>' . $atts['title'] . '</h3>';
        $output .= '<p>' . do_shortcode($content) . '</p>';
        if (!empty($atts['more_url']))
            $output .= '<p><a href="' . $atts['more_url'] . '" target="' . $atts['more_target'] . '">' . $atts['more_text'] . '</a></p>';
        $output .= '</div>';
        $output .= "</div>";
        return $output;
    }

}
add_shortcode('jw_servicebox_item', 'shortcode_jw_servicebox_item');






/* ================================================================================== */
/*      Features Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_features')) {

    function shortcode_jw_features($atts, $content) {
        $output = '<div class="jw-features">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_features', 'shortcode_jw_features');



// Service Item
if (!function_exists('shortcode_jw_features_item')) {

    function shortcode_jw_features_item($atts, $content) {
        $style = '';
        $thumb = '';
        $thumbType = isset($atts['thumb_type']) ? $atts['thumb_type'] : 'fa';
        $style_for_desc = '';
        $margin_for_desc = '';
        
        if ($thumbType === 'image') {
            $thumb = isset($atts['service_thumb']) ? '<img title="' . $atts['title'] . '" width="' . $atts['service_thumb_width'] . '" src="' . $atts['service_thumb'] . '" />' : '';
        } elseif ($thumbType === 'fa') {
            $thumb = do_shortcode('[jw_fontawesome fa_type="' . $atts['fa_type'] . '" fa_size="' . $atts['fa_size'] . '" fa_padding="' . $atts['fa_padding'] . '" fa_color="' . $atts['fa_color'] . '" fa_bg_color="' . $atts['fa_bg_color'] . '" fa_border_color="' . $atts['fa_border_color'] . '" fa_rounded="' . $atts['fa_rounded'] . '" fa_icon="' . $atts['fa_icon'] . '"]');
        } elseif ($thumbType === 'cc') {
            $thumb = do_shortcode('[jw_chart_circle cc_type="' . $atts['cc_type'] . '" cc_line_width="' . $atts['cc_line_width'] . '" cc_text="' . $atts['cc_text'] . '" cc_percent="' . $atts['cc_percent'] . '" cc_size="' . $atts['cc_size'] . '" cc_font_size="' . $atts['cc_font_size'] . '" cc_font_color="' . $atts['cc_font_color'] . '" cc_color="' . $atts['cc_color'] . '" cc_track_color="' . $atts['cc_track_color'] . '" cc_icon="' . $atts['cc_icon'] . '"]');
        }
        if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' jw-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }

        $output = '<div class="jw-service-box span3 ' . $style .$class. '"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= '<div class="jw-service-icon">' . $thumb . '</div>';
        $output .= '<div class="jw-service-content ' . $style_for_desc . '" style="' . $margin_for_desc . '">';
        $output .= '<div class="element-title"><h3>' . $atts['title'] . '</h3></div>';
        $output .= '<div class="bottomdivider clearfix"><span class="dividerlineleft"></span><span class="dividerbox"></span><span class="dividerlineright"></span></div>';
        $output .= '<p>' . do_shortcode($content) . '</p>';
        if (!empty($atts['more_url']))
            $output .= '<p><a href="' . $atts['more_url'] . '" target="' . $atts['more_target'] . '">' . $atts['more_text'] . '</a></p>';
        $output .= '</div>';
        $output .= "</div>";
        return $output;
    }

}
add_shortcode('jw_features_item', 'shortcode_jw_features_item');


/* ================================================================================== */
/*      Milestones Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_milestones')) {

    function shortcode_jw_milestones($atts, $content) {
        $output = '<div class="jw-milestones">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_milestones', 'shortcode_jw_milestones');

// Milestones Item
if (!function_exists('shortcode_jw_milestones_item')) {

    function shortcode_jw_milestones_item($atts, $content) {
        $atts['thumb_type']=isset($atts['thumb_type'])?$atts['thumb_type']:'fa';
        $thumb='';
        if($atts['thumb_type']==='fa'){
            $thumb = do_shortcode('[jw_fontawesome fa_type="' . $atts['fa_type'] . '" fa_size="' . $atts['fa_size'] . '" fa_padding="' . $atts['fa_padding'] . '" fa_color="' . $atts['fa_color'] . '" fa_bg_color="' . $atts['fa_bg_color'] . '" fa_border_color="' . $atts['fa_border_color'] . '" fa_rounded="' . $atts['fa_rounded'] . '" fa_icon="' . $atts['fa_icon'] . '"]');
        }else{
            $thumb = '<img src="'.$atts['image'].'" />';
        }
        if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' jw-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
		$milestone2 = '';
		$milestone3 = '';
		if($atts['milestonestyle'] == 'style2'){
			$milestone2 = 'milestone2';
		}
		elseif($atts['milestonestyle'] == 'style3'){
			$milestone3 = 'milestone3';
		}
        $output = '<div class=" jw-milestones-box span3 '.$milestone2.' '.$milestone3.' jw-animate'.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= '<div class="jw-milestones-icon">' . $thumb . '</div>';
        $output .= '<div class="jw-milestones-content">';
        $output .= '<div class="jw-milestones-count clearfix">';
        foreach (str_split($atts['count']) as $count) {
            $output .= '<div class="jw-milestones-show">';
            $output .= '<ul class="">';
            $count = intval($count);
            for ($i = 0; $i <= $count; $i++) {
                $output .= '<li class="">';
                $output .= $i;
                $output .= '</li>';
            }
            $output .= '</ul>';
            $output .= '</div>';
        }
		$output .= '<br/><p>' . $atts['title'] . '</p>';
        $output .= '</div>';
        
        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_milestones_item', 'shortcode_jw_milestones_item');



/* ================================================================================== */
/*      Font Awesome Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_fontawesome')) {

    function shortcode_jw_fontawesome($atts, $content) {
        $atts['fa_size']=str_replace('px','',$atts['fa_size']);
        $atts['fa_padding']=str_replace('px','',$atts['fa_padding']);
        $atts['fa_rounded']=str_replace('px','',$atts['fa_rounded']);
        $style = 'text-align:center;';
        $style .='font-size:' . $atts['fa_size'] . 'px;';
        $style .='width:' . $atts['fa_size'] . 'px;';
        $style .='line-height:' . $atts['fa_size'] . 'px;';
        $style .='padding:' . $atts['fa_padding'] . 'px;';
        $style .='color:' . $atts['fa_color'] . ';';
        $style .='background-color:' . $atts['fa_bg_color'] . ';';
        $style .='border-color:' . $atts['fa_border_color'] . ';';
        $style .='border-width:' . $atts['fa_rounded'] . 'px;';
        $output = '<i class="jw-font-awesome ' . $atts['fa_icon'] . ' ' . $atts['fa_type'] . '" style="display: inline-block;border-style: solid;' . $style . '"></i>';
        return $output;
    }

}
add_shortcode('jw_fontawesome', 'shortcode_jw_fontawesome');



/* ================================================================================== */
/*      Chart Circle Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_chart_circle')) {

    function shortcode_jw_chart_circle($atts, $content) {
        wp_enqueue_script('easy-pie-chart', THEME_DIR . '/assets/js/jquery.easy-pie-chart.js', false, false, true);
        $atts = shortcode_atts(array(
            'cc_type' => 'cc',
            'cc_line_width' => '10',
            'cc_text' => '40%',
            'cc_percent' => '40',
            'cc_size' => '100',
            'cc_font_size' => '24',
            'cc_font_color' => '#000',
            'cc_color' => '#ecf0f1',
            'cc_track_color' => '#2dcb73',
            'cc_icon' => 'icon-umbrella',
            'item_animation_offset'=>'',
        ), $atts);
        if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation_offset']='none';}
        $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
        $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];

        $style = 'display:block; text-align:center; margin: 0 auto;';
        $style.='width:' . $atts['cc_size'] . 'px;';
        $style.='line-height:' . $atts['cc_size'] . 'px;';
        $cStyle = '';
        $cStyle.='color:' . $atts['cc_font_color'] . ';';
        $cStyle.='font-size:' . $atts['cc_font_size'] . 'px;';
        $data = '';
        $data .= ' data-percent="0"';
        $data .= ' data-percent-update="' . $atts['cc_percent'] . '"';
        $data .= ' data-line-width="' . $atts['cc_line_width'] . '"';
        $data .= ' data-size="' . $atts['cc_size'] . '"';
        $data .= ' data-color="' . $atts['cc_color'] . '"';
        $data .= ' data-track-color="' . $atts['cc_track_color'] . '"';
        $data .= ' data-gen-offset="'.$atts['item_animation_offset'].'"';
        $output = '';
        $output .='<div class="jw-circle-chart jw-animate"' . $data . '>';
        $output .='<span style="' . $cStyle . '">';
		if ($atts['cc_type'] === 'fa') {
            $output .='<i class="' . $atts['cc_icon'] . '" style="' . $style . '"></i>';
        } else {
            $output .='<div class="percentageinner" >'.$atts['cc_text'].'</div>';
        }
        $output .='</span>';
        $output .='</div>';
        return $output;
    }

}
add_shortcode('jw_chart_circle', 'shortcode_jw_chart_circle');



/* ================================================================================== */
/*      Chart Graph Shortcode
  /* ================================================================================== */

// Chart Graph Container
if (!function_exists('shortcode_jw_chart_graph')) {

    function shortcode_jw_chart_graph($atts, $content) {
        wp_enqueue_script('chart', THEME_DIR . '/assets/js/Chart.min.js', false, false, true);
        $atts = shortcode_atts(array(
            'labels' => '',
            'item_height' => '',
            'type' => 'Line',
            'item_animation_offset'=>'',
        ), $atts);
        if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation_offset']='none';}
        $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
        $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        
        $atts['item_height'] = str_replace(' ','',$atts['item_height']);
        $output  = '<div class="jw-chart-graph jw-animate jw-redraw not-drawed" data-labels="' . $atts['labels'] . '" data-type="' . $atts['type'] . '" data-gen-offset="'.$atts['item_animation_offset'].'" data-item-height="'.$atts['item_height'].'">';
            $output .= '<ul style="display:none;" class="data">';
                $output .= do_shortcode($content);
            $output .= '</ul>';
            $output .= '<canvas></canvas>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_chart_graph', 'shortcode_jw_chart_graph');
// Chart Graph Item
if (!function_exists('shortcode_jw_chart_graph_item')) {

    function shortcode_jw_chart_graph_item($atts, $content) {
        $atts = shortcode_atts(array(
            'datas' => '',
            'fill_color' => '',
            'stroke_color' => '',
            'point_color' => '',
            'point_stroke_color' => '',
                ), $atts);
        $output = '<li data-datas="' . $atts['datas'] . '" data-fill-color="' . $atts['fill_color'] . '" data-stroke-color="' . $atts['stroke_color'] . '" data-point-color="' . $atts['point_color'] . '" data-point-stroke-color="' . $atts['point_stroke_color'] . '"></li>';
        return $output;
    }

}
add_shortcode('jw_chart_graph_item', 'shortcode_jw_chart_graph_item');



/* ================================================================================== */
/*      Chart Pie Shortcode
  /* ================================================================================== */

// Chart Pie Container
if (!function_exists('shortcode_jw_chart_pie')) {

    function shortcode_jw_chart_pie($atts, $content) {
        wp_enqueue_script('chart', THEME_DIR . '/assets/js/Chart.min.js', false, false, true);
        $atts = shortcode_atts(array(
            'type' => 'PolarArea',
            'item_animation_offset'=>'',
        ), $atts);
        if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation_offset']='none';}
        $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
        $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        $output = '<div class="jw-chart-pie jw-animate jw-redraw not-drawed" data-type="' . $atts['type'] . '" data-gen-offset="'.$atts['item_animation_offset'].'">';
            $output .= '<ul style="display:none;" class="data">';
                $output .= do_shortcode($content);
            $output .= '</ul>';
            $output .= '<canvas></canvas>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_chart_pie', 'shortcode_jw_chart_pie');
// Chart Pie Item
if (!function_exists('shortcode_jw_chart_pie_item')) {

    function shortcode_jw_chart_pie_item($atts, $content) {
        $atts = shortcode_atts(array(
            'value' => '',
            'color' => '',
                ), $atts);
        $output = '<li data-value="' . $atts['value'] . '" data-color="' . $atts['color'] . '"></li>';
        return $output;
    }

}
add_shortcode('jw_chart_pie_item', 'shortcode_jw_chart_pie_item');



/* ================================================================================== */
/*      Divider Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_jw_divider')) {

    function shortcode_jw_divider($atts, $content) {
        if ($atts['type'] == 'space')
            $output = '<div class="jw-divider-space" style="margin-bottom:' . $atts['height'] . 'px;"></div>';
        else
            $output = '<div class="jw-divider"></div>';
        return $output;
    }

}
add_shortcode('jw_divider', 'shortcode_jw_divider');





/* ================================================================================== */
/*      Image Slider Shortcode
  /* ================================================================================== */
//  Image Slider Container
if (!function_exists('shortcode_jw_image')) {

    function shortcode_jw_image($atts, $content) {
        $output = '<div class="gallery-container clearfix">';
        $output .= '<div class="gallery-slide">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        $output .= '<div class="carousel-arrow">';
        $output .= '<a class="carousel-prev" href="#"><i class="icon-angle-left"></i></a>';
        $output .= '<a class="carousel-next" href="#"><i class="icon-angle-right"></i></a>';
        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_image', 'shortcode_jw_image');
//  Image Slider Item
if (!function_exists('shortcode_jw_image_item')) {

    function shortcode_jw_image_item($atts, $content) {
        $output = '<div class="slide-item">';
        $output .= '<img src="' . $atts['url'] . '" alt="' . get_the_title() . '" style="width:370px;height:200px;">';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_image_item', 'shortcode_jw_image_item');































/* ================================================================================== */
/*      Messagebox Shortcode
  /* ================================================================================== */

// Messagebox container
if (!function_exists('shortcode_message_box')) {

    function shortcode_message_box($atts, $content) {
        $output = '<div class="jw-message-box">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_message_box', 'shortcode_message_box');
// Messagebox Item
if (!function_exists('shortcode_jw_message_box_item')) {

    function shortcode_jw_message_box_item($atts, $content) {
        $type = "alert-default";
        $icon = '';
        if ($atts['type'] == 'default') {
            
        } elseif ($atts['type'] == 'alert') {
            $type = "";
            $icon = '<i class="icon-warning-sign"></i>';
        } elseif ($atts['type'] == 'info') {
            $type = "alert-info";
            $icon = '<i class="icon-info-sign"></i>';
        } elseif ($atts['type'] == 'success') {
            $type = "alert-success";
            $icon = '<i class="icon-ok-sign"></i>';
        } elseif ($atts['type'] == 'error') {
            $type = "alert-error";
            $icon = '<i class="icon-remove"></i>';
        }
        if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' jw-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
        $output  = '<div class="alert ' . $type . $class . '"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        $output .= do_shortcode($content);
        $output .= $icon;
        $output .= '</div>';

        return $output;
    }

}
add_shortcode('jw_message_box_item', 'shortcode_jw_message_box_item');



/* ================================================================================== */
/*      Progress Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_progress')) {

    function shortcode_jw_progress($atts, $content) {
		
		//$output = '<p class="progress-desc">'.$atts['progress_content'].'</p>';
		$output = do_shortcode($content);
		return $output;
		 
    }

}
add_shortcode('jw_progress', 'shortcode_jw_progress');
if (!function_exists('shortcode_jw_progress_item')) {	
    function shortcode_jw_progress_item($atts, $content) {
	echo shortcode_jw_progress($atts, $content);
		if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' jw-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
			$barStyle=$atts['bar_style'];
        $output = '<div class=" '.$barStyle.' progress-container"><div class="progress-title">' . $atts['progress_title'] . '</div><div class="progress'.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        if ($atts['type'] == 'animated')
            $output = '<div class="progress-container"><div class="progress-title">' . $atts['progress_title'] . '</div><div class="progress progress-striped active'.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        elseif ($atts['type'] == 'striped')
            $output = '<div class="progress-container"><div class="progress-title">' . $atts['progress_title'] . '</div><div class="progress progress-striped'.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= '<div class="bar ' . ($atts['type'] == 'default' ? 'jw-bi' : '') . '" style="width: ' . $atts['percent'] . '%;background-color: ' . $atts['color'] . '">&nbsp</div>';
        $output .= '</div>';      
		$barTip = 	$atts['percent'] - 10;
        $output .= '<span style="left:'.$barTip.'%;background-color: ' . $atts['color'] . '">' . $atts['percent'] . '%</span>';
		$output .= '</div>';
		return $output;
    }

}
add_shortcode('jw_progress_item', 'shortcode_jw_progress_item');





/* ================================================================================== */
/*      Sidebar Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_sidebar')) {

    function shortcode_jw_sidebar($atts, $content) {
        ob_start();
        echo '<section id="sidebar">';
        if (!dynamic_sidebar($atts['name'])) {
            print 'There is no widget. You should add your widgets into <strong>';
            print $atts['name'];
            print '</strong> sidebar area on <strong>Appearance => Widgets</strong> of your dashboard. <br/><br/>';
        }
        echo '</section>';
        $output = ob_get_clean();
        return $output;
    }

}
add_shortcode('jw_sidebar', 'shortcode_jw_sidebar');






/* ================================================================================== */
/*      Video Shortcode
  /* ================================================================================== */
if (!function_exists('shortcode_jw_video')) {

    function shortcode_jw_video($atts, $content) {

        $video_embed = $content;
        $video_thumb = $atts['video_thumb'];
        $video_m4v = $atts['video_m4v'];
        $video_type = $atts['insert_type'];

        ob_start();

        if ($video_type == 'type_embed') {
            echo apply_filters("the_content", $video_embed);
        } elseif (!empty($video_m4v)) {
            global $post;
            add_action('wp_footer', 'jplayer_script');
            ?>
				<div class="text-center video-box-content" style="background-image: url('<?php echo esc_url($video_thumb); ?>');">
            
					<a href="<?php echo esc_url($video_m4v); ?>" id="jquery_jplayer_<?php echo esc_attr($post->ID); ?>" class="html5lightbox content-vbtn-color-blue" data-width="900" data-height="420" ><i class="icon-play-sign circle"></i></a>
				
				</div>
			<?php
        }
        $output = ob_get_clean();
        return $output;
    }

}
add_shortcode('jw_video', 'shortcode_jw_video');




/* ================================================================================== */
/*      Callout Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_jw_callout')) {
    function shortcode_jw_callout($atts, $content) {
        $Callout_bt = isset($atts['btn_text']) ? $atts['btn_text'] : '';
        $Callout_bt_url = !empty($atts['btn_url']) ? $atts['btn_url'] : '#';
        $Callout_bt_color = !empty($atts['btn_url']) ? (' style="background-color:'.$atts['btn_color'].';border-color:'.$atts['btn_color'].'"') : '#';
        $Callout_bt_target = isset($atts['btn_target']) ? $atts['btn_target'] : '_blank';
        $Callout_bt_full = '<a href="' . $Callout_bt_url . '"' . $Callout_bt_color . ' target="' . $Callout_bt_target . '" class="btn btn-flat btn-large">' . $Callout_bt . '</a>';
        $output = '<div class="callout-container">';
        $output .= '<div class="jw-callout container' . (!empty($Callout_bt) ? ' with-button' : '') . '">';
        $output .= '<div class="callout-text">';
        $output .= '<h1>' . do_shortcode($content) . '</h1>';
        $output .= '<p>' . $atts['description'] . '</p>';
       
        $output .= '</div>';
		 $output .= '<div class="callout-btn">';
		 $output .=!empty($Callout_bt) ? $Callout_bt_full : '';
		$output .= '</div>'; 
        $output .= '</div>';
        $output .= '</div>';

        return $output;
    }
}
add_shortcode('jw_callout', 'shortcode_jw_callout');



/* ================================================================================== */
/*      Text With button Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_jw_text_btn')) {
    function shortcode_jw_text_btn($atts, $content) {
        $Callout_bt1 = isset($atts['btn_text1']) ? $atts['btn_text1'] : '';
        $Callout_bt_url1 = !empty($atts['btn_url1']) ? $atts['btn_url1'] : '#';
        $Callout_bt_color1 = !empty($atts['btn_url1']) ? (' style="background-color:'.$atts['btn_color1'].';border-color:'.$atts['btn_color1'].'"') : '#';
        $Callout_bt_target1 = isset($atts['btn_target1']) ? $atts['btn_target1'] : '_blank';
        $Callout_bt_full1 = '<a href="' . $Callout_bt_url1 . '"' . $Callout_bt_color1 . ' target="' . $Callout_bt_target1 . '" class="btn btn-flat">' . $Callout_bt1 . '</a>';
        
		$Callout_bt2 = isset($atts['btn_text2']) ? $atts['btn_text2'] : '';
        $Callout_bt_url2 = !empty($atts['btn_url2']) ? $atts['btn_url2'] : '#';
        $Callout_bt_color2 = !empty($atts['btn_url2']) ? (' style="background-color:'.$atts['btn_color2'].';border-color:'.$atts['btn_color2'].'"') : '#';
        $Callout_bt_target2 = isset($atts['btn_target']) ? $atts['btn_target'] : '_blank';
        $Callout_bt_full2 = '<a href="' . $Callout_bt_url2 . '"' . $Callout_bt_color2 . ' target="' . $Callout_bt_target2 . '" class="btn btn-flat">' . $Callout_bt2 . '</a>';
        $btnstyle2 = '';
		
		if ($atts['text_btn_style'] == 'style2'){
		$btnstyle2 = 'txtwithbtn2'; 
		}
        $output = '<div class="jw-text_btn '.$btnstyle2.'' . (!empty($Callout_bt1) ? ' with-button' : '') . '">';
        $output .= '<div class="text_btn-text">';
        $output .= '<h1>' . do_shortcode($content) . '</h1>';
		 $output .= '<div class="text_btn-text-line">';$output .= '</div>';
        $output .= '<p>' . $atts['description'] . '</p>';
        $output .=!empty($Callout_bt1) ? $Callout_bt_full1 : '';
        $output .=!empty($Callout_bt2) ? $Callout_bt_full2 : '';
        $output .= '</div>';
        $output .= '</div>';

        return $output;
    }
}
add_shortcode('jw_text_btn', 'shortcode_jw_text_btn');



/* ================================================================================== */
/*      Open-heart Slider Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_jw_slider')) {

    function shortcode_jw_slider($atts, $content) {
       if ($atts["id"] > 0) {
            $output = do_shortcode('[layerslider id="' . $atts["id"] . '"]');
        } else {
            $output = '<pre>' . __('Choose Slider', 'designinvento') . '</pre>';
        }

        return $output;
    }

}
add_shortcode('jw_slider', 'shortcode_jw_slider');





/* ================================================================================== */
/*      Pricing Table Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_jw_pricing_table')) {

    function shortcode_jw_pricing_table($atts, $content) {
        $output = '<div class="jw-pricing clearfix">';
        $query = Array(
            'post_type' => 'jw_price',
            'posts_per_page' => $atts['column'],
        );
        $cats = empty($atts['price_category_list']) ? false : explode(",", $atts['price_category_list']);
        if ($cats) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_price',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        switch ($atts['column']) {
            case'2': {
                    $columnWidth = 'jw-pricing-two';
                    break;
                }
            case'3': {
                    $columnWidth = 'jw-pricing-three';
                    break;
                }
            case'4': {
                    $columnWidth = 'jw-pricing-four';
                    break;
                }
            case'5': {
                    $columnWidth = 'jw-pricing-five';
                    break;
                }
        }
        query_posts($query);
        while (have_posts()) {
            the_post();
			$outputs = apply_filters("the_content", get_the_content());
            $Recommended = get_metabox('recommendedtable');           
			$output .= '<div class="' . $columnWidth . ' jw-pricing-col">';
			if ($Recommended == "true") {
            //$output .= '<div class="jw-pricing-recommended">MOST RECOMMENDED</div>';
			 }else{
			 //$output .= '<div class="jw-pricing-erecommended"></div>';
			 }
            $output .= '<div class="jw-pricing-box" >';
            $output .= '<div class="jw-pricing-header">';
            $output .= '<h1>' . get_the_title() . '</h1>';
			//  if(get_metabox('subtitle')!="") $output .= ('<p>'.get_metabox('subtitle').'</p>');
            $output .= '</div>';
            $output .= '<div class="jw-pricing-top">';
            $output .= '<span>' . get_metabox('price') . '<span class="month">MONTH</span></span>';
            $output .= '</div>';
            $output .= '<div class="jw-pricing-bottom">';
            $output .= $outputs;
            $output .= '</div>';
            if (get_metabox('buttontext') != "") {
                $output .= '<div class="jw-pricing-footer">';
                $output .= '<a href="' . (get_metabox('buttonlink') != "" ? get_metabox('buttonlink') : "#") . '" class="btn">' . get_metabox('buttontext') . '</a>';
                $output .= '</div>';
            }
            $output .= '</div>';
			if ($Recommended == "true") {
            //$output .= '<div class="jw-pricing-recommended-bottom"></div>';
			}else{
			//$output .= '<div class="jw-pricing-recommended-ebottom"></div>';
			}
            $output .= '</div>';
        }
        wp_reset_query();
        $output .= '</div>';

        return $output;
    }

}
add_shortcode('jw_pricing_table', 'shortcode_jw_pricing_table');





/* ================================================================================== */
/*      Testimonials Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_jw_testimonials')) {

    function shortcode_jw_testimonials($atts, $content) {
        $direction = empty($atts['direction']) ? 'up' : $atts['direction'];
        $duration = empty($atts['duration']) ? '1000' : $atts['duration'];
        $timeout = empty($atts['timeout']) ? '2000' : $atts['timeout'];
        $bg_color = empty($atts['bg_color']) ? '' : (' style="background:' . $atts['bg_color'] . '"');
        $text_color = empty($atts['text_color']) ? '' : (' style="color:' . $atts['text_color'] . '"');
        $name_color = empty($atts['name_color']) ? '' : (' style="color:' . $atts['name_color'] . '"');
		
        $query = Array(
            'post_type' => 'jw_testimonial',
            'posts_per_page' => $atts['count'],
        );
        $cats = empty($atts['category_ids']) ? false : explode(",", $atts['category_ids']);
        if ($cats) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_testimonial',
                    'terms' => $cats,
                    'field' => 'id',
					'posts_per_page' => 4
                )
            );
        }
		$output = '<div id="owl-testimonial-1" class="testimonials-ct">';
        query_posts($query);
        while (have_posts()) {		
		the_post();
		
            $output .= '<div class="item">';
				$output .= '<div class="testimonial-item clearfix"' . $bg_color . '>';
					
					$output .= '<div class="testimonial-author">';
								$output .= post_image_show(100, 100);
					$output .= '</div>';
						  
						
					$output .= '<div class="testimonial-content">';
						$output .= '<p class="testi-content"' . $text_color . '>'.wp_kses_post(get_the_content()).'</p>';
						$output .= '<p class="auther-name"' . $name_color . '><span>' . wp_kses_post(get_metabox('name')) . '</span> / ' . wp_kses_post(get_metabox('company')) . ' </p>';
					$output .= '</div>';			
				$output .= '</div>';
            $output .= '</div>';
			
        }
        
        
			
		
		
		 wp_reset_query();
		 
        $output .= '</div>';

        return $output;
    }

}
add_shortcode('jw_testimonials', 'shortcode_jw_testimonials');


/* ================================================================================== */
/*      Team Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_jw_team')) {

    function shortcode_jw_team($atts, $content) {
        $output = '<div class="jw-our-team">';
        $query = Array(
            'post_type' => 'jw_team',
            'posts_per_page' => $atts['count'],
        );
        $cats = empty($atts['category_ids']) ? false : explode(",", $atts['category_ids']);
        if ($cats) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_team',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        $width = 270;
        $height = $atts['height'];
		$TopMarginSocial = $height - 48;
		$FromTop = $TopMarginSocial / 2;
        query_posts($query);
        while (have_posts()) {
            the_post();
            $output .= '<div class="team-member span3">';
                $output .= '<div class="member-image loop-image">';
				
				$output .= '<div class="team-member-image">';
                    $output .= post_image_show($width, $height);
						$output .= '<div class="team-member-overlay">';
						$output .= '</div>';
				$output .= '</div>';	
					$output .= '<div class="team-detail">';
                    
						if (get_metabox('bg_color') != "")
							$output .= '<div class="member-title" style="background:' . get_metabox('bg_color') . '">';
						else
							$output .= '<div class="member-title">';
						$output .= '<h3>';
							if(get_metabox('custom_link')){$output .= '<a title="'.wp_kses_post(get_the_title()).'" href="'.esc_url(get_metabox('custom_link')).'">';}
								$output .=  wp_kses_post(get_the_title());
							if(get_metabox('custom_link')){$output .= '</a>';}
						$output .= '</h3>';
						if (get_metabox('position') != "")
							$output .= '<span>' . wp_kses_post(get_metabox('position')) . '</span>';
							
						$output .= '</div>';   
                            
                                if (get_metabox('facebook') != "" || get_metabox('google') != "" || get_metabox('twitter') != "" || get_metabox('linkedin') != "") {
									$output .= '<div class="member-social"><div class="jw-social-icon clearfix">';
									if (get_metabox('facebook') != "")
										$output .= '<a href="' . to_url(get_metabox('facebook')) . '" target="_blank"><i class="jw-font-awesome icon-facebook"></i></a>';
									if (get_metabox('google') != "")
										$output .= '<a href="' . to_url(get_metabox('google')) . '" target="_blank" ><i class="jw-font-awesome icon-google-plus"></i></a>';
									if (get_metabox('linkedin') != "")
										$output .= '<a href="' . to_url(get_metabox('linkedin')) . '" target="_blank" ><i class="jw-font-awesome icon-linkedin"></i></a>';
									if (get_metabox('twitter') != "")
										$output .= '<a href="' . to_url(get_metabox('twitter')) . '" target="_blank"><i class="jw-font-awesome icon-twitter"></i></a>';
									$output .= '</div></div>';
								}
                            
                    $output .='</div>';    
                    
                $output .='</div>';

                


            
			
            $output .= '</div>';
        }
        wp_reset_query();
        $output .= '</div>';

        return $output;
    }

}
add_shortcode('jw_team', 'shortcode_jw_team');





/* ================================================================================== */
/*      Twitter Shortcode
  /* ================================================================================== */

function twitter_build($atts) {
    require_once (THEME_PATH . "/inc/twitteroauth.php");
    $atts = shortcode_atts(array(
        'consumerkey' => jw_option('consumerkey'),
        'consumersecret' => jw_option('consumersecret'),
        'accesstoken' => jw_option('accesstoken'),
        'accesstokensecret' => jw_option('accesstokensecret'),
        'cachetime' => '1',
        'username' => 'designinvento',
        'tweetstoshow' => '10',
            ), $atts);
    //check settings and die if not set
    if (empty($atts['consumerkey']) || empty($atts['consumersecret']) || empty($atts['accesstoken']) || empty($atts['accesstokensecret']) || !isset($atts['cachetime']) || empty($atts['username'])) {
        return '<strong>' . __('Due to Twitter API changed you must insert Twitter APP. Check Our theme Options there you have Option for FB Twitter API, insert the Keys One Time', 'designinvento') . '</strong>';
    }
    //check if cache needs update
    $jw_twitter_last_cache_time = get_option('jw_twitter_last_cache_time_' . $atts['username']);
    $diff = time() - $jw_twitter_last_cache_time;
    $crt = $atts['cachetime'] * 3600;

    //yes, it needs update			
    if ($diff >= $crt || empty($jw_twitter_last_cache_time)) {
        $connection = new TwitterOAuth($atts['consumerkey'], $atts['consumersecret'], $atts['accesstoken'], $atts['accesstokensecret']);
        $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $atts['username'] . "&count=10") or die('Couldn\'t retrieve tweets! Wrong username?');
        if (!empty($tweets->errors)) {
            if ($tweets->errors[0]->message == 'Invalid or expired token') {
                return '<strong>' . $tweets->errors[0]->message . '!</strong><br />'.__('You\'ll need to regenerate it <a href="https://dev.twitter.com/apps" target="_blank">here</a>!','designinvento');
            } else {
                return '<strong>' . $tweets->errors[0]->message . '</strong>';
            }
            return;
        }
        $tweets_array = array();
        for ($i = 0; is_array($tweets) && $i <= count($tweets); $i++) {
            if (!empty($tweets[$i])) {
                $tweets_array[$i]['created_at'] = $tweets[$i]->created_at;
                $tweets_array[$i]['text'] = $tweets[$i]->text;
                $tweets_array[$i]['status_id'] = $tweets[$i]->id_str;
            }
        }
        //save tweets to wp option 		
        update_option('jw_twitter_tweets_' . $atts['username'], serialize($tweets_array));
        update_option('jw_twitter_last_cache_time_' . $atts['username'], time());
        echo '<!-- twitter cache has been updated! -->';
    }
    //convert links to clickable format
    if (!function_exists('convert_links')) {

        function convert_links($status, $targetBlank = true, $linkMaxLen = 250) {
            // the target
            $target = $targetBlank ? " target=\"_blank\" " : "";
            // convert link to url
            $status = preg_replace("/((http:\/\/|https:\/\/)[^ )]+)/e", "'<a href=\"$1\" title=\"$1\" $target >'. ((strlen('$1')>=$linkMaxLen ? substr('$1',0,$linkMaxLen).'...':'$1')).'</a>'", $status);
            // convert @ to follow
            $status = preg_replace("/(@([_a-z0-9\-]+))/i", "<a href=\"http://twitter.com/$2\" title=\"Follow $2\" $target >$1</a>", $status);
            // convert # to search
            $status = preg_replace("/(#([_a-z0-9\-]+))/i", "<a href=\"https://twitter.com/search?q=$2\" title=\"Search $1\" $target >$1</a>", $status);
            // return the status
            return $status;
        }

    }
    //convert dates to readable format
    if (!function_exists('relative_time')) {

        function relative_time($a) {
            //get current timestampt
            $b = strtotime("now");
            //get timestamp when tweet created
            $c = strtotime($a);
            //get difference
            $d = $b - $c;
            //calculate different time values
            $minute = 60;
            $hour = $minute * 60;
            $day = $hour * 24;
            $week = $day * 7;
            if (is_numeric($d) && $d > 0) {
                //if less then 3 seconds
                if ($d < 3)
                    return (jw_option('jw_car_rn') ? jw_option('jw_car_rn') : __('right now', 'designinvento'));
                //if less then minute
                if ($d < $minute)
                    return floor($d) . (jw_option('jw_car_sa') ? jw_option('jw_car_sa') : __(' seconds ago', 'designinvento'));
                //if less then 2 minutes
                if ($d < $minute * 2)
                    return (jw_option('jw_car_aoma') ? jw_option('jw_car_aoma') : __('about 1 minute ago', 'designinvento'));
                //if less then hour
                if ($d < $hour)
                    return floor($d / $minute) . (jw_option('jw_car_ma') ? jw_option('jw_car_ma') : __(' minutes ago', 'designinvento'));
                //if less then 2 hours
                if ($d < $hour * 2)
                    return (jw_option('jw_car_aoha') ? jw_option('jw_car_aoha') : __('about 1 hour ago', 'designinvento'));
                //if less then day
                if ($d < $day)
                    return floor($d / $hour) . (jw_option('jw_car_ha') ? jw_option('jw_car_ha') : __(' hours ago', 'designinvento'));
                //if more then day, but less then 2 days
                if ($d > $day && $d < $day * 2)
                    return (jw_option('jw_car_yes') ? jw_option('jw_car_yes') : __('yesterday', 'designinvento'));
                //if less then year
                if ($d < $day * 365)
                    return floor($d / $day) . (jw_option('jw_car_da') ? jw_option('jw_car_da') : __(' days ago', 'designinvento'));
                //else return more than a year
                return __("over a year ago","designinvento");
                return (jw_option('jw_car_oaya') ? jw_option('jw_car_oaya') : __('over a year ago', 'designinvento'));
            }
        }

    }
    $jw_twitter_tweets = maybe_unserialize(get_option('jw_twitter_tweets_' . $atts['username']));
    return $jw_twitter_tweets;
}

if (!function_exists('shortcode_jw_twitter')) {

    function shortcode_jw_twitter($atts, $content) {
        $jw_twitter_tweets = twitter_build($atts);
        if (is_array($jw_twitter_tweets)) {
            $output = '<div class="jw-twitter">';
            $output.='<ul class="jtwt">';
            $fctr = '1';
            foreach ($jw_twitter_tweets as $tweet) {
                $output.='<li><span>' . convert_links($tweet['text']) . '</span><br /><a class="twitter_time" target="_blank" href="http://twitter.com/' . $atts['username'] . '/statuses/' . $tweet['status_id'] . '">' . relative_time($tweet['created_at']) . '</a></li>';
                if ($fctr == $atts['tweetstoshow']) {
                    break;
                }
                $fctr++;
            }
            $output.='</ul>';
            $output.='<div class="twitter-follow">'  . (jw_option('jw_car_follow') ? jw_option('jw_car_follow') : __('Follow Us', 'designinvento')) . ' - <a target="_blank" href="http://twitter.com/' . $atts['username'] . '">@' . $atts['username'] . '</a></div>';
            $output.='</div>';
            return $output;
        } else {
            return $jw_twitter_tweets;
        }
    }

}
add_shortcode('jw_twitter', 'shortcode_jw_twitter');



if (!function_exists('shortcode_jw_twitter_carousel')) {

    function shortcode_jw_twitter_carousel($atts, $content) {
        $jw_twitter_tweets = twitter_build($atts);
        if (is_array($jw_twitter_tweets)) {
            $arrow = '<div class="carousel-arrow jw-carrow">';
            $arrow .= '<a class="carousel-prev" href="#"><i class="icon-angle-left"></i></a>';
            $arrow .= '<a class="carousel-next" href="#"><i class="icon-angle-right"></i></a>';
            $arrow .= '</div>';
            $output = '<div class="jw-twitter">';
            $output .= '<div class="carousel-container">';
            $output .= '<div class="jw-carousel-twitter list_carousel">';
            $output .='<i class="icon-twitter"></i>';
            $output.='<ul class="jtwt jw-carousel">';
            $fctr = '1';
            foreach ($jw_twitter_tweets as $tweet) {
                $output.='<li><span>' . convert_links($tweet['text']) . '</span><br />- <a class="twitter_time" target="_blank" href="http://twitter.com/' . $atts['username'] . '/statuses/' . $tweet['status_id'] . '">' . relative_time($tweet['created_at']) . '</a></li>';
                if ($fctr == $atts['tweetstoshow']) {
                    break;
                }
                $fctr++;
            }
            $output.='</ul>';
            $output.='<div class="twitter-follow">' . (jw_option('jw_car_follow') ? jw_option('jw_car_follow') : __('Follow Us', 'designinvento')) . ' - <a target="_blank" href="http://twitter.com/' . $atts['username'] . '">@' . $atts['username'] . '</a></div>';
            $output .= $arrow;
            $output.='</div>';
            $output.='</div>';
            $output.='</div>';
            return $output;
        } else {
            return $jw_twitter_tweets;
        }
    }

}
add_shortcode('jw_twitter_carousel', 'shortcode_jw_twitter_carousel');





/* ================================================================================== */
/*      gallery Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_jw_portfolio')) {

    function shortcode_jw_portfolio($atts, $content) {
	
        $atts = shortcode_atts(array(
            'layout_size' => 'span12',
            'pagination' => 'simple',
            'height' => '',
            'column' => '4',
            'count' => 12,
            'filter' => 'none',
            'category_ids' => '',
            'hide_hover' => 'false',
            'hide_favorites' => 'false',
            'button_text' => '',
            'link_type'   => 'view_large',
            'gallerynew'   => 'portstyle2',
            'order' => ''
        ), $atts);

        global $portAtts, $paged, $jw_options;
        $portAtts = $atts;
        if ($atts['layout_size'] === 'span3') {
            $jw_options['column'] = '1';
        } elseif ($atts['layout_size'] === 'span9') {
            $jw_options['column'] = '3';
        } elseif ($atts['layout_size'] === 'span12') {
            switch ($atts['column']) {
                case '2': {
                        $jw_options['column'] = '6';
                        break;
                    }
                case '3': {
                        $jw_options['column'] = '4';
                        break;
                    }
                case '4': {
                        $jw_options['column'] = '3';
                        break;
                    }
            }
        }

        if (get_query_var('paged'))
            $my_page = get_query_var('paged');
        else {
            if (get_query_var('page'))
                $my_page = get_query_var('page');
            else
                $my_page = 1;
            set_query_var('paged', $my_page);
        }
        add_action('wp_footer', 'portfolio_script');
        $jw_options['pagination'] = $atts['pagination'];
        $jw_options['height'] = $atts['height'];
        $query = Array(
            'post_type' => 'jw_portfolio',
            'posts_per_page' => $atts['count'],
        );
        if ($jw_options['pagination'] == "simple" || $jw_options['pagination'] == "infinite") {
            $query['paged'] = $my_page;
        }
        $cats = empty($atts['category_ids']) ? false : explode(",", $atts['category_ids']);
        if ($cats) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_portfolio',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        if (!empty($atts['order'])) {
            switch ($atts['order']) {
                case "date_asc":
                    $query['orderby'] = 'date';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_asc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_desc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'DESC';
                    break;
                case "random":
                    $query['orderby'] = 'rand';
                    break;
            }
        }

		
        $output = '<div class="jw-portfolio">';
        $filter = (!empty($atts['filter']) && $atts['filter'] == 'true') ? true : false;
        if ($filter) {
            $output .= '<div class="jw-filter">';
            $output .= '<ul class="filters option-set clearfix post-category inline" data-option-key="filter">';
            $output .= '<li><a href="#filter" data-option-value="*" class="selected">' . (jw_option('portfolio_show_all') ? jw_option('portfolio_show_all') : __('All', 'themeinvento')) . '</a></li>';
            if ($cats) {
                $filters = $cats;
            } else {
                $filters = get_terms('cat_portfolio');
            }
            foreach ($filters as $category) {
                if ($cats) {
                    $category = get_term_by('id', $category, 'cat_portfolio');
                }
                $output .= '<li class=""><a href="#filter" data-option-value=".category-' . $category->slug . '" title="' . $category->name . '">' . $category->name . '</a></li>';
            }
            $output .= '</ul></div>';
			
        }
        if(!is_tax())
            query_posts($query);
        ob_start();
        get_template_part("loop", "portfolio");
        $output .= ob_get_clean();
        wp_reset_query();
        $output .= '</div>';
        return $output;
    }

}

function portfolio_script() {
    wp_enqueue_script('isotope', THEME_DIR . '/assets/js/jquery.isotope.min.js', false, false, true);
}

add_shortcode('jw_portfolio', 'shortcode_jw_portfolio');

/* ================================================================================== */
/*      Recent Posts Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_jw_recent_posts')) {

    function shortcode_jw_recent_posts($atts, $content) {
        global $portAtts;
        $portAtts = $atts;
        $atts['excerpt_count']=isset($atts['excerpt_count'])?intval($atts['excerpt_count']):50;
        $more_text      = !empty($atts['more_text'])     ?$atts['more_text']     :(jw_option('translate_readmore') ? jw_option('translate_readmore') : __('Read More', 'designinvento'));
        $more_text_show = isset($atts['more_text_show'])?$atts['more_text_show']:'false';
        
        $hide_meta      = isset($atts['hide_meta'])?$atts['hide_meta']:'false';
        $post_count     = isset($atts['post_count']) ? $atts['post_count'] : '';
        $post_category_list = isset($atts['post_category_list']) ? $atts['post_category_list'] : '';
        $arrow = '<div class="carousel-arrow jw-carrow">';
        $arrow .= '<a class="carousel-prev" href="#"><i class="icon-angle-left"></i></a>';
        $arrow .= '<a class="carousel-next" href="#"><i class="icon-angle-right"></i></a>';
        $arrow .= '</div>';

        $output = '<div class="carousel-container">';
        $output .= '<div class="jw-carousel-post list_carousel">';
        $output .= '<ul class="jw-carousel">';
        $query = Array(
            'post_type' => 'post',
            'posts_per_page' => $post_count,
        );
        $cats = explode(",", $post_category_list);
        if (!empty($cats[0])) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'category',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        if (!empty($atts['order'])) {
            switch ($atts['order']) {
                case "date_asc":
                    $query['orderby'] = 'date';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_asc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_desc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'DESC';
                    break;
                case "random":
                    $query['orderby'] = 'rand';
                    break;
            }
        }
        $imgwidth = 370;
        // START - LOOP
        query_posts($query);
        while (have_posts()){ the_post();
            $imgheight = $atts['image_height'];
            $output .= '<li>';
                if(get_post_format()=="video"){
                    $output .= '<div class="carousel-video" style="height:'.$imgheight.'px;">';
                    ob_start();
                    format_video();
                    $output .= ob_get_clean();
                    $output .= '</div>';
                }else{
                    if(post_image_show()){
                        ob_start();
                        portfolio_image($imgwidth, $imgheight);
                        $output .= ob_get_clean();
                    }
                }
                $output .= '<div class="carousel-content">';
                    if($hide_meta==='false'){
                        $output .= '<div class="carousel-meta clearfix"><div class="date"><i class="icon-calendar-empty"></i>'.get_the_time('j M Y').'</div><div class="comment-count"><i class="icon-comments-alt"></i>'.comment_count().'</div></div>';
                    }
                    $output .= '<h3><a href="'.get_permalink().'" class="carousel-post-title">'.get_the_title().'</a></h3>';
                    $output .= '<p>'.to_excerpt(get_the_content(), $atts['excerpt_count']).'</p>';
                    if($more_text_show==='true'){
                        $output .= '<div class="read-more-container"><a href="'.get_permalink().'" class="more-link">'.apply_filters("widget_title", $more_text).'</a></div>';
                    }
                $output .= '</div>';
            $output .= '</li>';
        }
        wp_reset_query();
        // END   - LOOP
        $output .= '</ul>';
        $output .= '<div class="clearfix"></div>';
        $output .= $arrow;
        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_recent_posts', 'shortcode_jw_recent_posts');









/* ================================================================================== */
/*      Recent causes Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_jw_recent_causes')) {

    function shortcode_jw_recent_causes($atts, $content) {
        global $portAtts;
        $hide_favorites = isset($atts['hide_favorites']) ? $atts['hide_favorites'] : 'false';
        $portAtts = $atts;
        $post_count = isset($atts['post_count']) ? $atts['post_count'] : '';
        $desc_title = !empty($atts['description_title']) ? $atts['description_title'] : '';
        $desc_text = !empty($atts['description_text']) ? $atts['description_text'] : '';
        $port_category_list = isset($atts['port_category_list']) ? $atts['port_category_list'] : '';
        //$arrow = '<div class="carousel-arrow jw-carrow">';
       // $arrow .= '<a class="carousel-prev" href="#"><i class="icon-long-arrow-left"></i></a>';
        //$arrow .= '<a class="carousel-next" href="#"><i class="icon-long-arrow-right"></i></a>';
        //$arrow .= '</div>';
        $output = '';
        if (!empty($desc_text)) {
            $output .= '<div class="row-fluid ">';
            $output .= '<div class="span3 carousel-text jw-title-container">';
            $output .=!empty($desc_title) ? ('<div class="jw-title-container"><h3 class="jw-title">' . $desc_title . '</h3><span class="jw-title-border"></span></div>') : '';
            $output .= '<p>' . $desc_text . '</p>';
            $output .= $arrow . '</div>';
            $output .= '<div class="span9">';
        } else {
            $output .= '<div class="carousel-container">';
        }


        $output .= '<div class="jw-carousel-portfolio list_carousel">';
        $output .= '<ul class="jw-carousel">';
        $query = Array(
            'post_type' => 'jw_cause',
            'posts_per_page' => $post_count,
        );
        $cats = explode(",", $port_category_list);
        if (!empty($cats[0])) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_cause',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        if (!empty($atts['order'])) {
            switch ($atts['order']) {
                case "date_asc":
                    $query['orderby'] = 'date';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_asc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_desc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'DESC';
                    break;
                case "random":
                    $query['orderby'] = 'rand';
                    break;
            }
        }
        $imgwidth = 270;
        // START - LOOP
        query_posts($query);
        while (have_posts()){ the_post();
            global $post;
            $imgheight = $atts['image_height'];
            $likeit = get_post_meta($post->ID, 'post_likeit', true);
            $likecount = empty($likeit) ? '0' : $likeit;
            $likedclass = 'likeit';
            if (isset($_COOKIE['likeit-' . $post->ID])) {
                $likedclass .= ' liked';
            }

            $output .= '<li>';
                $ids = get_metabox('gallery_image_ids');
                $video_embed = wp_kses_post(get_metabox('format_video_embed'));
                $video_url   = wp_kses_post(get_metabox('pretty_video_url'));
                ob_start();                
                
                if (has_post_thumbnail($post->ID)) {
                    if(!empty($video_url)&&get_metabox('pretty_video')==='true'){
                        causes_image($imgwidth,$imgheight,true,$video_url);                            
                    }else{
                        causes_image($imgwidth,$imgheight);
                    }
                } elseif($ids!="false" && $ids!="") {
                    portfolio_gallery($imgwidth,$imgheight,$ids);
                } elseif(!empty($video_embed)) {
                    echo '<div class="carousel-video">';
                    echo apply_filters("the_content", htmlspecialchars_decode($video_embed));
                    echo '</div>';
                }
                if (!empty($jw_options['more_text'])) {
					$readMore = $jw_options['more_text'];
				} else {
					$readMore = jw_option('translate_readmore') ? jw_option('translate_readmore') : __('Read More', 'designinvento');
				}
                $output .= ob_get_clean();

                $output .= '<div class="image-content">';
                        $output .= '<div class="portfolio-title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>';
						$output .= '<div class="progress home-progress">';
						
						
						$output .='<div class="progress-bar" role="progressbar" aria-valuenow="'.get_metabox('client_name').'" aria-valuemin="0" aria-valuemax="100" style="width: '.get_metabox('client_name').'" " >'.get_metabox('client_name').'';
										 
								 $output .= '</div>';	
								 $output .= '</div>';	
						$output .= '<div class=""><h5><span>'.get_metabox('client_name').' Donated  /</span>  '.get_metabox('project_date').' To Go</h5></div>';
						
                        $output .= '<div class="main-page-causes"><p>'. wp_trim_words( get_the_content(), 15 ) .'</p></div>';
						
						
						
						
						$output .= '<div class="cause-read"><a href="'.get_permalink().'">'.$readMore.'</a><a href="'.get_metabox('cause_donate').'" target="_blank">Donate Now</a></div>';
						
                       
                $output .= '</div>';
            $output .= '</li>';
        }
        wp_reset_query();
        // END   - LOOP
        $output .= '</ul>';
        $output .= '<div class="clearfix"></div>';
        if(empty($desc_text)) $output .= $arrow;
        $output .= '</div>';
        if (!empty($desc_text)) {
            $output .= '</div>';
        }
        $output .= '</div>';
        return $output;
    }
}
add_shortcode('jw_recent_causes', 'shortcode_jw_recent_causes');

/* ================================================================================== */
/*      Recent events Shortcode
  /* ================================================================================== */





if (!function_exists('shortcode_jw_recent_events')) {

    function shortcode_jw_recent_events($atts, $content) {
        global $portAtts;
        $hide_favorites = isset($atts['hide_favorites']) ? $atts['hide_favorites'] : 'false';
        $portAtts = $atts;
        $post_count = isset($atts['post_count']) ? $atts['post_count'] : '';
        $desc_title = !empty($atts['description_title']) ? $atts['description_title'] : '';
        $desc_text = !empty($atts['description_text']) ? $atts['description_text'] : '';
        $port_category_list = isset($atts['port_category_list']) ? $atts['port_category_list'] : '';
       // $arrow = '<div class="carousel-arrow jw-carrow">';
        //$arrow .= '<a class="carousel-prev" href="#"><i class="icon-long-arrow-left"></i></a>';
        //$arrow .= '<a class="carousel-next" href="#"><i class="icon-long-arrow-right"></i></a>';
        //$arrow .= '</div>';
        $output = '';
     


        //$output .= '<div class="jw-carousel-portfolio list_carousel">';
        $output .= '<div class="jw-carousel events">';
        $query = Array(
            'post_type' => 'jw_event',
            'posts_per_page' => 4,
        );
        $cats = explode(",", $port_category_list);
        if (!empty($cats[0])) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_event',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        if (!empty($atts['order'])) {
            switch ($atts['order']) {
                case "date_asc":
                    $query['orderby'] = 'date';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_asc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_desc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'DESC';
                    break;
                case "random":
                    $query['orderby'] = 'rand';
                    break;
            }
        }
        $imgwidth = 158;
        // START - LOOP
        query_posts($query);
        while (have_posts()){ the_post();
            global $post;
            $imgheight = $atts['image_height'];
            $likeit = get_post_meta($post->ID, 'post_likeit', true);
            $likecount = empty($likeit) ? '0' : $likeit;
            $likedclass = 'likeit';
            if (isset($_COOKIE['likeit-' . $post->ID])) {
                $likedclass .= ' liked';
            }

            $output .= '<div class="span6">';
                $ids = get_metabox('gallery_image_ids');
                $video_embed = get_metabox('format_video_embed');
                $video_url   = get_metabox('pretty_video_url');
                ob_start();                
                
                if (has_post_thumbnail($post->ID)) {
                    if(!empty($video_url)&&get_metabox('pretty_video')==='true'){
                        events_image($imgwidth,$imgheight,true,$video_url);                            
                    }else{
                        events_image($imgwidth,$imgheight);
                    }
                } elseif($ids!="false" && $ids!="") {
                    portfolio_gallery($imgwidth,$imgheight,$ids);
                } elseif(!empty($video_embed)) {
                    echo '<div class="carousel-video">';
                    echo apply_filters("the_content", htmlspecialchars_decode($video_embed));
                    echo '</div>';
                }
                 if (!empty($jw_options['more_text'])) {
					$readMore = $jw_options['more_text'];
				} else {
					$readMore = jw_option('translate_readmore') ? jw_option('translate_readmore') : __('Read More', 'designinvento');
				}
                $output .= ob_get_clean();

                $output .= '<div class="even-content clearfix">';
				$output .= '<div class="span1 pull-left"><h3>'.get_metabox('event_date').'</h3><p>'.get_metabox('event_month').'</p></div>';
                         	
                
				
                        $output .= '<div class="pull-left event-title"><h3>'. wp_trim_words( get_the_title(), 2 ) .'
						
						</h3><p class="event-loc"><i class="icon-time"></i> '.get_metabox('event_time').'<i class="icon-map-marker sec"></i> '.get_metabox('location_name').'</p>
						
						</div>';
						$output .= '<div class="">
						<div class="event-new-content"><p>'. wp_trim_words( get_the_content(), 18 ) .'</p></div>
						<div class="event-read"><a href="'.get_permalink().'">'.wp_kses_post($readMore).'</a></div>
						</div>';
						
						
						
                       
                $output .= '</div>';
            $output .= '</div>';
        }
        wp_reset_query();
        // END   - LOOP
        $output .= '</div>';
        $output .= '<div class="clearfix"></div>';
        
        $output .= '</div>';
        if (!empty($desc_text)) {
            $output .= '</div>';
        }
        $output .= '</div>';
        return $output;
    }
}
add_shortcode('jw_recent_events', 'shortcode_jw_recent_events');








/* ================================================================================== */
/*      Partner Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_jw_partner')) {

    function shortcode_jw_partner($atts, $content) {
        $category_list = isset($atts['partner_category_list']) ? $atts['partner_category_list'] : '';
        //$arrow = '<div class="carousel-arrow jw-carrow">';
        //$arrow .= '<a class="carousel-prev" href="#"><i class="icon-angle-left"></i></a>';
        //$arrow .= '<a class="carousel-next" href="#"><i class="icon-angle-right"></i></a>';
        //$arrow .= '</div>';

        $output = '<div class="carousel-container">';

        $output .= '<div class="jw-carousel-partner list_carousel">';
        $output .= '<ul class="jw-carousel">';
        $query = Array(
            'post_type' => 'jw_partner',
            'posts_per_page' => -1,
        );
        $cats = explode(",", $category_list);
        $imgwidth = 270;
        if (!empty($cats[0])) {
            $query['tax_query'] = Array(Array(
                    'taxonomy' => 'cat_partner',
                    'terms' => $cats,
                    'field' => 'id'
                )
            );
        }
        if (!empty($atts['order'])) {
            switch ($atts['order']) {
                case "date_asc":
                    $query['orderby'] = 'date';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_asc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'ASC';                    
                    break;
                case "title_desc":
                    $query['orderby'] = 'title';
                    $query['order'] = 'DESC';
                    break;
                case "random":
                    $query['orderby'] = 'rand';
                    break;
            }
        }
        // START - LOOP
        query_posts($query);
        while (have_posts()) {
            the_post();
            $imgheight = $atts['image_height'];
            $output .= '<li>';
            if (get_metabox('link') != '') {
                $output .= '<a href="' . to_url(get_metabox('link')) . '" target="_blank">';
                $output .= post_image_show($imgwidth, $imgheight);
                $output .= '</a>';
            } else {
                $output .= post_image_show($imgwidth, $imgheight);
            }
            $output .= '</li>';
        }
        wp_reset_query();
        // END   - LOOP
        $output .= '</ul>';
        $output .= '<div class="clearfix"></div>';
        //$output .= $arrow;
        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_partner', 'shortcode_jw_partner');








/* ================================================================================== */
/*      Dropcap Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_jw_dropcap')) {

    function shortcode_jw_dropcap($atts, $content) {
        $class = '';
        $style = 'style="background-color: ' . $atts['color'] . ';"';
        if ($atts['style'] == 'circle') {
            $class = ' cap_circle';
        } elseif ($atts['style'] == 'circle_border') {
            $class = ' cap_circle cap_border';
            $style = 'style="border-color: ' . $atts['color'] . '; color: ' . $atts['color'] . '"';
        } elseif ($atts['style'] == 'square_border') {
            $class = ' cap_border';
            $style = 'style="border-color: ' . $atts['color'] . '; color: ' . $atts['color'] . '"';
        }
        return '<span class="jw-dropcap' . $class . '" ' . $style . '>' . $content . '</span>';
    }

}
add_shortcode('jw_dropcap', 'shortcode_jw_dropcap');





/* ================================================================================== */
/*      Button Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_jw_button')) {

    function shortcode_jw_button($atts, $content) {
        $rounded = !empty($atts['rounded']) && $atts['rounded'] == 'true' ? ' rounded' : '';
        $link = !empty($atts['link']) ? $atts['link'] : '#';
        $style = !empty($atts['style']) ? (' btn-' . $atts['style']) : '';
        $hover = !empty($atts['hover']) ? (' btn-' . $atts['hover']) : '';
        $size = !empty($atts['size']) ? (' btn-' . $atts['size']) : '';
        $target = !empty($atts['target']) ? ($atts['target']) : '_blank';
        $color = '';
        if(!empty($atts['color'])) {
            $color = ' style="border-color:' . $atts['color'] . ';';
            $color .= (!empty($atts['style']) && $atts['style'] === 'border' ? ('color:' . $atts['color']) : ('background-color:' . $atts['color'])).'"';
        }
        return '<a href="' . $link . '" target="' . $target . '" class="btn' . $rounded . $style . $size . $hover . '"' . $color . '>' . $content . '<span></span></a>';
    }

}
add_shortcode('jw_button', 'shortcode_jw_button');





/* ================================================================================== */
/*      Label Shortcode
  /* ================================================================================== */

if (!function_exists('shortcode_jw_label')) {

    function shortcode_jw_label($atts, $content) {
        $color = !empty($atts['color']) ? (' style="background:' . $atts['color'] . '"') : '';
        return '<span class="label"' . $color . '>' . $content . '</span>';
    }

}
add_shortcode('jw_label', 'shortcode_jw_label');




/* ================================================================================== */
/*      ColumnShortcode Shortcode
  /* ================================================================================== */

// ColumnShortcode container
if (!function_exists('shortcode_jw_sh_column')) {

    function shortcode_jw_sh_column($atts, $content) {
        $output = '<div class="jw-column-shortcode row-fluid">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

}
add_shortcode('jw_sh_column', 'shortcode_jw_sh_column');
// ColumnShortcode Item
if (!function_exists('shortcode_jw_sh_column_item')) {

    function shortcode_jw_sh_column_item($atts, $content) {
        extract(shortcode_atts(array(
            'column_size'           => '1 / 3',
            'item_animation'        => 'none',
            'item_animation_offset' => 'bottom-in-view',
        ), $atts));
        if(isMobile()&&!jw_option('moblile_animation')){$atts['item_animation']='none';}
        $class='';
        $animated=false;
        if(isset($atts['item_animation'])&&$atts['item_animation']!=='none'){
            $animated=true;
            $class .= ' jw-animate-gen';
            $atts['item_animation_offset'] = isset($atts['item_animation_offset']) ? str_replace(' ','',$atts['item_animation_offset']) : '';
            $atts['item_animation_offset'] = empty($atts['item_animation_offset']) ? 'bottom-in-view' : $atts['item_animation_offset'];
        }
        $output = '<div class="' . pbTextToFoundation($column_size) . ' '.$class.'"'.($animated?' data-gen="'.$atts['item_animation'].'" data-gen-offset="'.$atts['item_animation_offset'].'" style="opacity:0;"':'').'>';
        $output .= do_shortcode($content);
        $output .= '</div>';

        return $output;
    }

}
add_shortcode('jw_sh_column_item', 'shortcode_jw_sh_column_item');



/* ================================================================================== */
/*      Coming Soon Shortcode
/* ================================================================================== */

// Coming Soon
if (!function_exists('shortcode_jw_comingsoon')) {
    function shortcode_jw_comingsoon($atts, $content) {
        wp_enqueue_script('coming-soon',  THEME_DIR . '/assets/js/jquery.comingsoon.js', false, false, true);
        $atts = shortcode_atts(array(
            'coming_title'  => '',
            'coming_years'  => '2018',
            'coming_months' => '12',
            'coming_days'   => '28',
            'coming_hours'  => '12',
            'coming_link'   => '',
        ), $atts);
        $output  = '<div class="jw-cs-container">
		
		
		<div class="event-main-title clearfix">
		<div class="pull-left"><i class="icon-calendar"></i></div>
		<h1 class="school"><span class="all-events">UPCOMING EVENT</span><br/>'.$atts['coming_title'].'</h1></div>';
		
        $output .= '<div class="jw-coming-soon clearfix" data-years="'.$atts['coming_years'].'" data-months="'.$atts['coming_months'].'" data-days="'.$atts['coming_days'].'" data-hours="'.$atts['coming_hours'].'" data-minutes="00" data-seconds="00">';
            $output .= '<div class="days">';
                $output .= '<div class="count"></div>';
                $output .= '<div class="text">'.__('DAYS','designinvento').'</div>';
            $output .= '</div>';
            $output .= '<div class="sep">:</div>';
            $output .= '<div class="hours">';
                $output .= '<div class="count"></div>';
                $output .= '<div class="text">'.__('HOURS','designinvento').'</div>';
            $output .= '</div>';
            $output .= '<div class="sep">:</div>';
            $output .= '<div class="minutes">';
                $output .= '<div class="count"></div>';
                $output .= '<div class="text">'.__('MINUTES','designinvento').'</div>';
            $output .= '</div>';
            $output .= '<div class="sep">:</div>';
            $output .= '<div class="seconds">';
                $output .= '<div class="count"></div>';
                $output .= '<div class="text">'.__('SECONDS','designinvento').'</div>';
            $output .= '</div>';
        $output .= '</div>';
        
        if($atts['coming_link']!=='') {
            $feed = $atts['coming_link'];
            $text = __('Your email here', 'designinvento');
            $submit = __('SUBSCRIBE NOW','designinvento');
            $output .= '<div class="subscribe-container">';
                $output .= '<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open(\'http://feedburner.google.com/fb/a/mailverify?uri='.$feed.'\', \'popupwindow\', \'scrollbars=yes,width=550,height=520\');return true">';
                    $output .= '<p>';
                        $output .= '<input type="text" value="" placeholder="'.$text.'"  name="email">';
                        $output .= '<input class="btn" type="submit" name="imageField" value="'.$submit.'" alt="Submit" />';
                        $output .= '<input type="hidden" value="'.$feed.'" name="uri"/>';
                        $output .= '<input type="hidden" name="loc" value="en_US" />';
                    $output .= '</p>';
                $output .= '</form>';
            $output .= '</div>';
        }
        $output .= '</div>';
        return $output;
    }
}
add_shortcode('jw_comingsoon', 'shortcode_jw_comingsoon');



/* ================================================================================== */
/*      Before After Shortcode
/* ================================================================================== */

// Before After
if (!function_exists('shortcode_jw_before_after')) {
    function shortcode_jw_before_after($atts, $content) {
        wp_enqueue_script('event-move',  THEME_DIR . '/assets/js/jquery.event.move.js', false, false, true);
        wp_enqueue_script('twentytwenty',  THEME_DIR . '/assets/js/jquery.twentytwenty.js', false, false, true);
        wp_enqueue_style('twentytwenty', THEME_DIR . '/assets/css/twentytwenty.css');
        $atts = shortcode_atts(array(
            'before'  => '',
            'after'  => '',
        ), $atts);
        if(empty($atts['before'])){$atts['before']=THEME_DIR.'/assets/img/no-image.png';}
        if(empty($atts['after'] )){$atts['after'] =THEME_DIR.'/assets/img/no-image.png';}
        $output  = '<div class="jw-before-after">';
            $output .= '<img src="'.$atts['before'].'" title="'.__('Before','designinvento').'" />';
            $output .= '<img src="'.$atts['after'] .'" title="'.__('After','designinvento') .'" />';
        $output .= '</div>';
        
        return $output;
    }
}
add_shortcode('jw_before_after', 'shortcode_jw_before_after');





/* ================================================================================== */
/*      Custom Content
/* ================================================================================== */

if (!function_exists('shortcode_jw_custom_content')) {
    function shortcode_jw_custom_content($atts, $content) {
        ob_start();
		  $output  = '<div class="custom-content">';
          $output .= '<p>'.$content.'</p>';
		  $output .= '</div>';
        return $output;
    }
}
add_shortcode('jw_custom_content', 'shortcode_jw_custom_content');


/* ================================================================================== */
/*      Custom Image
/* ================================================================================== */

if (!function_exists('shortcode_jw_custom_image')) {
    function shortcode_jw_custom_image($atts, $content) {
        ob_start();
		  $output  = '<div class="custom-image">';
          $output .= '<img src="'.$content.'" />';
		  $output .= '</div>';
        return $output;
    }
}
add_shortcode('jw_custom_image', 'shortcode_jw_custom_image');

