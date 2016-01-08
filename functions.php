<?php
define('THEME_PATH', get_template_directory());
define('THEME_DIR', get_template_directory_uri());
define('STYLESHEET_PATH', get_stylesheet_directory());
define('STYLESHEET_DIR', get_stylesheet_directory_uri());

require_once (THEME_PATH . "/inc/theme_functions.php");
require_once (THEME_PATH . "/inc/plugins/install-plugin.php");
require_once (THEME_PATH . "/inc/googlefonts.php");
require_once (THEME_PATH . "/inc/webink.php");
require_once (THEME_PATH . "/admin/index.php");
require_once (THEME_PATH . "/inc/aq_resizer.php");
require_once (THEME_PATH . "/inc/breadcrumbs.php");
require_once (THEME_PATH . "/inc/sidebar_generator.php");
require_once (THEME_PATH . "/inc/post-type/post-type.php");
require_once (THEME_PATH . "/inc/post-format.php");
require_once (THEME_PATH . "/inc/pagebuilder/pagebuilder.php");
require_once (THEME_PATH . "/inc/shortcode/shortcode.php");
require_once (THEME_PATH . "/inc/widget/recent_posts_widget.php");
require_once (THEME_PATH . "/inc/widget/flickr_widget.php");
require_once (THEME_PATH . "/inc/widget/social_links_widget.php");
require_once (THEME_PATH . "/inc/widget/twitter_widget.php");
require_once (THEME_PATH . "/inc/widget/contact_widget.php");
require_once (THEME_PATH . "/inc/theme_css.php");






/* ================================================================================== */
/*      Register menu
  /* ================================================================================== */

register_nav_menus(array(
    'main' => 'Main Menu'
//    'footer' => 'Footer Menu'
));


/* ================================================================================== */
/*      Theme Supports
  /* ================================================================================== */

add_action('after_setup_theme', 'designinvento_setup');
if (!function_exists('designinvento_setup')) {

    function designinvento_setup() {
        add_editor_style();
        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
        add_theme_support( 'woocommerce' );
        load_theme_textdomain('designinvento', THEME_PATH . '/languages/');
    }

}
if (!isset($content_width))
    $content_width = 960;



/* ================================================================================== */
/*      Enqueue Scripts
  /* ================================================================================== */

add_action('wp_enqueue_scripts', 'designinvento_scripts');

function designinvento_scripts() {
    wp_enqueue_style('bootstrap', THEME_DIR . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('bxslidercss', THEME_DIR . '/assets/css/jquery.bxslider.css');
    wp_enqueue_style('responsive', THEME_DIR . '/assets/css/bootstrap-responsive.min.css');    
    wp_enqueue_style('prettyphoto', THEME_DIR . '/assets/css/prettyPhoto.css');
    wp_enqueue_style('fontawesome', THEME_DIR . '/assets/css/font-awesome/font-awesome.min.css');
    wp_enqueue_style('fontelegant', THEME_DIR . '/assets/css/elegant-icons.css');
    wp_enqueue_style('simpletextrotator', THEME_DIR . '/assets/css/simpletextrotator.css');

    wp_enqueue_style('designinvento', STYLESHEET_DIR . '/style.css');
    wp_enqueue_style('animate', THEME_DIR . '/assets/css/animate-custom.css');
    wp_enqueue_style('jw-responsive', THEME_DIR . '/assets/css/responsive.css');
    $protocol = is_ssl() ? 'https' : 'http';
    $defaultfonts = array(
            'Helvetica Neue',
            'Verdana, Geneva',
            'Trebuchet',
            'Georgia',
            'Times New Roman',
            'Tahoma, Geneva',
            'Palatino');
    $jw_googlefonts = array(
        jw_option('body_text_font','face'),
        jw_option('menu_font','face'),
        jw_option('sidebar_widgets_title','face'),
        jw_option('footer_widgets_title','face'),
        jw_option('heading_font'),
    );
    $googlefont = '';
    foreach($jw_googlefonts as $font) {	
        if(!in_array($font, $defaultfonts)) {
		if($font != '') {
            $googlefont = str_replace(' ', '+', $font). ':400,400italic,700,700italic,800,800italic,900,900italic|' . $googlefont;			
		}	
		}	
    }
	
    if($googlefont != '')
        wp_enqueue_style('google-font', "$protocol://fonts.googleapis.com/css?family=" . substr_replace($googlefont ,"",-1) . "&subset=".jw_option('google_font_subset'));
    wp_enqueue_script('jquery');
    if ( is_single() && comments_open() ) wp_enqueue_script( 'comment-reply' );
    wp_enqueue_script('scripts', THEME_DIR . '/assets/js/scripts.js', false, false, true);   
    wp_enqueue_script('designinvento', THEME_DIR . '/assets/js/designinvento.js', false, false, true);
    wp_enqueue_script('simpletextrotator', THEME_DIR . '/assets/js/jquery.simple-text-rotator.js', false, false, true);
    wp_enqueue_script('infinite', THEME_DIR . '/assets/js/blog-infinitescroll.js', false, false, true);
	wp_enqueue_script('maps', 'http://maps.google.com/maps/api/js?sensor=false', false, false, false);
    wp_enqueue_script('bxsliderjquery', THEME_DIR . '/assets/js/jquery.bxslider.js', false, false, true);
	wp_enqueue_script('fac', THEME_DIR . '/assets/js/jquery.fancybox.pack.js', false, false, true);
	wp_enqueue_script('owl', THEME_DIR . '/assets/js/owl.carousel.js', false, false, true);
	wp_enqueue_script('videobox', THEME_DIR . '/assets/js/viedobox/video.js', false, false, true);
    
    
    
        if(jw_option('nicescroll'))
        wp_enqueue_script('jw_scroll', THEME_DIR . '/assets/js/jquery.nicescroll.min.js', false, false, true);
    
    if(jw_option('social_share')) {
        if(jw_option('twitter_share'))
            wp_enqueue_script('jw_share_twitter', $protocol.'://platform.twitter.com/widgets.js','','',true);
        if(jw_option('googleplus_share'))
            wp_enqueue_script('jw_share_google', $protocol.'://apis.google.com/js/plusone.js','','',true);
        if(jw_option('linkedin_share'))
            wp_enqueue_script('jw_share_linkedin', $protocol.'://platform.linkedin.com/in.js','','',true);
        if(jw_option('pinterest_share'))
            wp_enqueue_script('jw_share_pinterest', $protocol.'://assets.pinterest.com/js/pinit.js','','',true);
    }
}

/* ================================================================================== */
/*      Register Widget Sidebar
  /* ================================================================================== */

if (!function_exists('theme_widgets_init')) {

    function theme_widgets_init() {

        register_sidebar(array(
            'name' => 'Default sidebar',
            'id' => 'default-sidebar',
            'before_widget' => '<aside class="widget %2$s" id="%1$s">',
            'after_widget' => '</aside>',
            'before_title' => '<div class="jw-widget-title-container"><h2 class="widget-title">',
            'after_title' => '</h2></div>',
        ));
        
        register_sidebar(array(
            'name' => 'Top widget',
            'id' => 'top-widget',
            'before_widget' => '<div class="jw-top-bar-info" id="%1$s">',
            'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => '',
        ));
        
                
        /* footer sidebar */
        $grid = jw_option('footer_layout')!="" ? jw_option('footer_layout') : '3-3-3-3';
        $i = 1;
        foreach (explode('-', $grid) as $g) {
            register_sidebar(array(
                'name' => __("Footer sidebar ", "designinvento") . $i,
                'id' => "footer-sidebar-$i",
                'description' => __('The footer sidebar widget area', 'designinvento'),
                'before_widget' => '<aside class="widget %2$s" id="%1$s">',
                'after_widget' => '</aside>',
                'before_title' => '<div class="jw-widget-title-container"><h3 class="widget-title">',
                'after_title' => '</h3></div>',
            ));
            $i++;
        }
    }

}
add_action('widgets_init', 'theme_widgets_init');
add_filter('widget_text', 'do_shortcode');





/* ================================================================================== */
/*      Has more in post
  /* ================================================================================== */

function has_more() {
    global $post;
    if (empty($post))
        return;
    return (bool) preg_match('/<!--more(.*?)?-->/', $post->post_content);
}

function invento_content_filter() {
	$content = apply_filters( 'the_content', get_the_content() );
	$content = str_replace( ']]>', ']]&gt;', $content );
	return $content;
}
/* ================================================================================== */
/*      Exclude pages from search
  /* ================================================================================== */

if (!function_exists('exclude_pages_from_search')) :

    function exclude_pages_from_search($query) {
        if ($query->is_search) {
            $query->set('post_type', array('post', 'portfolio', 'page'));
        }
        return $query;
    }

    add_filter('pre_get_posts', 'exclude_pages_from_search');
endif;





/* ================================================================================== */
/*      Support upload .ico file
  /* ================================================================================== */

if (!function_exists('custom_upload_mimes')) {
    add_filter('upload_mimes', 'custom_upload_mimes');

    function custom_upload_mimes($existing_mimes = array()) {
        $existing_mimes['ico'] = "image/x-icon";
        return $existing_mimes;
    }

}



/* ================================================================================== */
/*      designinvento Search Form Customize
  /* ================================================================================== */

function my_search_form() {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url('/') . '" >
    <div class="input">
        <i class="icon-search"></i><input class="span12" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __('Search...', 'designinvento') . '">
    </div>
    </form>';

    return $form;
}

add_filter('get_search_form', 'my_search_form');




/* ================================================================================== */
/*      Wp_Title filter
  /* ================================================================================== */
  
  
  function Invento_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'Invento_wp_title', 10, 2 );
  

  /* ================================================================================== */
/*      IE
  /* ================================================================================== */



/* Wordpress Edit Gallery */
add_filter( 'use_default_gallery_style', '__return_false' );
add_filter( 'wp_get_attachment_link', 'jw_pretty_gallery', 10, 5); 
function jw_pretty_gallery ($content, $id, $size, $permalink) {
    if(!$permalink)
	$content = preg_replace("/<a/","<a rel=\"prettyPhoto[gallery]\"",$content,1);
    return $content;
}


add_image_size( '270x200', 270, 200 );

/* Facebook Open Graph Meta */
function facebookOpenGraphMeta() {
    global $post;
    if(!empty($post->ID)) {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
        $image = isset($image[0])?$image[0]:'';
        if(!$image){$image=jw_option("theme_logo");};
        if (is_single()) { ?>
            <meta property="og:url" content="<?php the_permalink() ?>"/>
            <meta property="og:title" content="<?php single_post_title(''); ?>" />
            <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
            <meta property="og:type" content="article" />
            <meta property="og:image" content="<?php echo esc_url($image); ?>" /><?php
        } else {
            if(!is_page()&&jw_option("theme_logo")!==''){$image=jw_option("theme_logo");} ?>
            <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />  
            <meta property="og:description" content="<?php bloginfo('description'); ?>" />  
            <meta property="og:type" content="website" />  
            <meta property="og:image" content="<?php echo esc_url($image); ?>" /> <?php 
        }
    }
}
add_action('wp_footer', 'designinvento_footer_scripts', 0);
function designinvento_footer_scripts() { 
$latitude = get_metabox("google_map_latitude");
$longitude = get_metabox("google_map_logtitude");
if(!empty($latitude) && !empty($longitude)){

?>

<script type="text/javascript">
//<![CDATA[
		var infowindow=new google.maps.InfoWindow();var markersmap=[];var sidebar_htmlmap='';var marker_htmlmap=[];var to_htmlsmap=[];var from_htmlsmap=[];var iconmap=[];iconmap['httpwwwbradwedellcomphpgooglemapapidemosimgtriangle_iconpng']={};iconmap['httpwwwbradwedellcomphpgooglemapapidemosimgtriangle_iconpng'].image=new google.maps.MarkerImage('wp-content/themes/open-heart/assets/js/areamap.png',new google.maps.Size(183,125),new google.maps.Point(0,0),new google.maps.Point(60,100));var mapmap=null;function onLoadmap(){var mapObjmap=document.getElementById("map");if(mapObjmap!='undefined'&&mapObjmap!=null){var mapOptionsmap={scrollwheel:false,zoom:16,mapTypeId:google.maps.MapTypeId.ROADMAP,mapTypeControl:true,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.DEFAULT}};mapOptionsmap.center=new google.maps.LatLng(<?php echo esc_attr($latitude); ?>,<?php echo esc_attr($longitude); ?>);var stylesmap=1;mapmap=new google.maps.Map(mapObjmap,mapOptionsmap);mapmap.setOptions({styles:stylesmap});var point=new google.maps.LatLng(<?php echo esc_attr($latitude); ?>,<?php echo esc_attr($longitude); ?>);markersmap.push(createMarker(mapmap,point,"Marker Title","Marker Description",iconmap['httpwwwbradwedellcomphpgooglemapapidemosimgtriangle_iconpng'].image,'',"sidebar_map",''));}}
		function createMarker(map,point,title,html,icon,icon_shadow,sidebar_id,openers){var marker_options={position:point,map:map,title:title};if(icon!=''){marker_options.icon=icon;}
		if(icon_shadow!=''){marker_options.shadow=icon_shadow;}
		var new_marker=new google.maps.Marker(marker_options);if(html!=''){google.maps.event.addListener(new_marker,'click',function(){infowindow.close();infowindow.setContent(html);infowindow.open(map,new_marker);});if(openers!=''&&!isEmpty(openers)){for(var i in openers){var opener=document.getElementById(openers[i]);opener.onclick=function(){infowindow.close();infowindow.setContent(html);infowindow.open(map,new_marker);return false;};}}
		if(sidebar_id!=''){var sidebar=document.getElementById(sidebar_id);if(sidebar!=null&&sidebar!=undefined&&title!=null&&title!=''){var newlink=document.createElement('a');newlink.onclick=function(){infowindow.open(map,new_marker);return false};newlink.innerHTML=title;sidebar.appendChild(newlink);}}}
		return new_marker;}
		//]]>
	window.onload=onLoadmap;
</script>

<?php }}
function get_slider_tax(){
    $taxonomies = get_terms('slider-type');
    return $taxonomies;
}