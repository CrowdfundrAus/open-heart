<?php
add_action('admin_print_scripts', 'postsettings_admin_scripts');
add_action('admin_print_styles', 'postsettings_admin_styles');
if (!function_exists('postsettings_admin_scripts')) {
    function postsettings_admin_scripts(){
        global $post,$pagenow;

        if (current_user_can('edit_posts') && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
            if( isset($post) ) {
                wp_localize_script( 'jquery', 'script_data', array(
                    'post_id' => $post->ID,
                    'nonce' => wp_create_nonce( 'designinvento-ajax' ),
                    'image_ids' => get_post_meta( $post->ID, 'gallery_image_ids', true ),
                    'label_create' => __("Create Featured Gallery", "waves"),
                    'label_edit' => __("Edit Featured Gallery", "waves"),
                    'label_save' => __("Save Featured Gallery", "waves"),
                    'label_saving' => __("Saving...", "waves")
                ));
            }

            wp_register_script('post-colorpicker', THEME_DIR.'/inc/assets/js/colorpicker.js');       
            wp_register_script('post-metaboxes', THEME_DIR.'/inc/assets/js/metaboxes.js');        

            wp_enqueue_script('post-colorpicker');
            wp_enqueue_script('post-metaboxes');
        }
    }
}

if (!function_exists('postsettings_admin_styles')) {
    function postsettings_admin_styles(){
        global $pagenow;
        if (current_user_can('edit_posts') && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
            wp_register_style('post-colorpicker', THEME_DIR.'/inc/assets/css/colorpicker.css', false, '1.00', 'screen');
            wp_register_style('post-metaboxes', THEME_DIR.'/inc/assets/css/metaboxes.css', false, '1.00', 'screen');

            wp_enqueue_style('post-colorpicker');
            wp_enqueue_style('post-metaboxes');
        }
    }
}

add_action("manage_posts_custom_column", "posttype_custom_columns");
if (!function_exists('posttype_custom_columns')) {
    function posttype_custom_columns($column) {
        global $post;
        switch ($column) {
            case "thumbnail":
                echo post_image_show() ? post_image_show(45,45) : ("<img src='".THEME_DIR."/resources/images/no-thumb.png'>");
                break;
            case "cause":
                echo get_the_term_list($post->ID, 'cat_cause', '', ', ', '');
                break;
			case "portfolio":
                echo get_the_term_list($post->ID, 'cat_portfolio', '', ', ', '');
                break;		
			case "event":
                echo get_the_term_list($post->ID, 'cat_event', '', ', ', '');
                break;	
				
				
            case "price":
                echo get_the_term_list($post->ID, 'cat_price', '', ', ', '');
                break;
            case "team":
                echo get_the_term_list($post->ID, 'cat_team', '', ', ', '');
                break;
            case "testimonial":
                echo get_the_term_list($post->ID, 'cat_testimonial', '', ', ', '');
                break;
        }
    }
}

/* * *********************** */
/* Custom post type: causes */
/* * *********************** */

add_action('init', 'cause_register');
function cause_register() {
    $slug = jw_option('translate_cause') ? jw_option('translate_cause') : 'cause';
    $labels = array(
        'name' => $slug,
        'singular_name' => $slug,
        'add_new' => __('Add New', 'designinvento'),
        'add_new_item' => __('Add New Cause', 'designinvento'),
        'edit_item' => __('Edit Cause', 'designinvento'),
        'new_item' => __('New Cause', 'designinvento'),
        'all_items' => __('All Causes', 'designinvento'),
        'view_item' => __('View Cause', 'designinvento'),
        'search_items' => __('Search Causes', 'designinvento'),
        'not_found' =>  __('No Cause found', 'designinvento'),
        'not_found_in_trash' => __('No Cause found in Trash', 'designinvento'),
        'menu_name' => __('Cause', 'designinvento')
    );    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'hierarchical' => false,

        'menu_icon' => THEME_DIR . '/inc/assets/images/portfolio.png',
        'rewrite' => array( 'slug' => $slug),
        'supports' => array('title', 'editor','page-attributes','thumbnail','revisions')
    );
    register_post_type('jw_cause', $args);
    flush_rewrite_rules();
}
$slug = jw_option('translate_cause') ? jw_option('translate_cause') : 'cause';
register_taxonomy("cat_cause", array("jw_cause"), array("hierarchical" => true, "label" => __("Categories", "designinvento"), "singular_label" => __("Cause Category", "designinvento"), 'rewrite' => array( 'slug' => $slug.'_cat')));

add_filter('manage_edit-jw_cause_columns', 'cause_edit_columns');
function cause_edit_columns($columns){	
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __("Cause Title", "designinvento"),
        "cause" => __("Categories", "designinvento"),
        "date" => __("Date", "designinvento"),
    );
    return $columns;
}
/* * *********************** */
/* Custom post type: gallery */
/* * *********************** */

add_action('init', 'portfolio_register');
function portfolio_register() {
    $slug = jw_option('translate_portfolio') ? jw_option('translate_portfolio') : 'gallery';
    $labels = array(
        'name' => $slug,
        'singular_name' => $slug,
        'add_new' => __('Add New', 'themeinvento'),
        'add_new_item' => __('Add New gallery', 'themeinvento'),
        'edit_item' => __('Edit gallery', 'themeinvento'),
        'new_item' => __('New gallery', 'themeinvento'),
        'all_items' => __('All gallerys', 'themeinvento'),
        'view_item' => __('View gallery', 'themeinvento'),
        'search_items' => __('Search gallery', 'themeinvento'),
        'not_found' =>  __('No gallery found', 'themeinvento'),
        'not_found_in_trash' => __('No gallery found in Trash', 'themeinvento'),
        'menu_name' => __('gallery', 'themeinvento')
    );    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'hierarchical' => false,

        'menu_icon' => THEME_DIR . '/inc/assets/images/portfolio.png',
        'rewrite' => array( 'slug' => $slug),
        'supports' => array('title', 'editor','page-attributes','thumbnail','revisions')
    );
    register_post_type('jw_portfolio', $args);
    flush_rewrite_rules();
}
$slug = jw_option('translate_portfolio') ? jw_option('translate_portfolio') : 'portfolio';
register_taxonomy("cat_portfolio", array("jw_portfolio"), array("hierarchical" => true, "label" => __("Categories", "themeinvento"), "singular_label" => __("Portfolio Category", "themeinvento"), 'rewrite' => array( 'slug' => $slug.'_cat')));

add_filter('manage_edit-jw_portfolio_columns', 'portfolio_edit_columns');
function portfolio_edit_columns($columns){	
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __("Portfolio Title", "themeinvento"),
        "portfolio" => __("Categories", "themeinvento"),
        "date" => __("Date", "themeinvento"),
    );
    return $columns;
}
/* * *********************** */
/* Custom post type: events */
/* * *********************** */

add_action('init', 'event_register');
function event_register() {
    $slug = jw_option('translate_event') ? jw_option('translate_event') : 'event';
    $labels = array(
        'name' => $slug,
        'singular_name' => $slug,
        'add_new' => __('Add New', 'designinvento'),
        'add_new_item' => __('Add New event', 'designinvento'),
        'edit_item' => __('Edit event', 'designinvento'),
        'new_item' => __('New event', 'designinvento'),
        'all_items' => __('All event', 'designinvento'),
        'view_item' => __('View event', 'designinvento'),
        'search_items' => __('Search event', 'designinvento'),
        'not_found' =>  __('No event found', 'designinvento'),
        'not_found_in_trash' => __('No event found in Trash', 'designinvento'),
        'menu_name' => __('event', 'designinvento')
    );    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'hierarchical' => false,

        'menu_icon' => THEME_DIR . '/inc/assets/images/portfolio.png',
        'rewrite' => array( 'slug' => $slug),
        'supports' => array('title', 'editor','page-attributes','thumbnail','revisions')
    );
    register_post_type('jw_event', $args);
    flush_rewrite_rules();
}
$slug = jw_option('translate_event') ? jw_option('translate_event') : 'event';
register_taxonomy("cat_event", array("jw_event"), array("hierarchical" => true, "label" => __("Categories", "designinvento"), "singular_label" => __("event Category", "designinvento"), 'rewrite' => array( 'slug' => $slug.'_cat')));

add_filter('manage_edit-jw_event_columns', 'event_edit_columns');
function event_edit_columns($columns){	
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __("event Title", "designinvento"),
        "event" => __("Categories", "designinvento"),
        "date" => __("Date", "designinvento"),
    );
    return $columns;
}


/* * *********************** */
/* Custom post type: Pricing Table */
/* * *********************** */

/*add_action('init', 'price_register');
function price_register() {
    $labels = array(
        'name' => __('Pricing Tables', 'designinvento'),
        'singular_name' => __('Price Item', 'designinvento'),
        'add_new' => __('Add New', 'designinvento'),
        'add_new_item' => __('Add New Item', 'designinvento'),
        'edit_item' => __('Edit Item', 'designinvento'),
        'new_item' => __('New Item', 'designinvento'),
        'all_items' => __('All Tables', 'designinvento'),
        'view_item' => __('View Price Item', 'designinvento'),
        'search_items' => __('Search Pricing Tables', 'designinvento'),
        'not_found' =>  __('No Tables found', 'designinvento'),
        'not_found_in_trash' => __('No Tables in Trash', 'designinvento'),
        'menu_name' => __('Pricing Tables', 'designinvento')
    );    
    $args = array(
        'labels' => $labels,

        'public' => false,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'hierarchical' => false,

        'menu_icon' => THEME_DIR . '/inc/assets/images/price.png',
        'rewrite' => array( 'slug' => 'price'),
        'supports' => array('title', 'editor','page-attributes','revisions', 'custom-fields')
    );
    register_post_type('jw_price', $args);
    flush_rewrite_rules();
}
register_taxonomy("cat_price", array("jw_price"), array("hierarchical" => true, "label" => __("Categories", "designinvento"), "singular_label" => __("Price Category","designinvento"), "rewrite" => true));

add_filter('manage_edit-jw_price_columns', 'price_edit_columns');
function price_edit_columns($columns){	
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __("Table name", "designinvento"),
        "price" => __("Categories", "designinvento"),
        "date" => __("Date", "designinvento"),
    );
    return $columns;
}
*/
/* * *********************** */
/* Custom post type: Team */
/* * *********************** */

add_action('init', 'team_register');
function team_register() {    
    $labels = array(
        'name' => __('Member', 'designinvento'),
        'singular_name' => __('Member', 'designinvento'),
        'add_new' => __('Add New', 'designinvento'),
        'add_new_item' => __('Add New Member', 'designinvento'),
        'edit_item' => __('Edit Member', 'designinvento'),
        'new_item' => __('New Member', 'designinvento'),
        'all_items' => __('All Members', 'designinvento'),
        'view_item' => __('View Member', 'designinvento'),
        'search_items' => __('Search Member', 'designinvento'),
        'not_found' =>  __('No member found', 'designinvento'),
        'not_found_in_trash' => __('No member found in Trash', 'designinvento'),
        'menu_name' => __('Team', 'designinvento')
    );    
    $args = array(
        'labels' => $labels,
        
        'public' => false,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'hierarchical' => false,
        
        'menu_icon' => THEME_DIR . '/inc/assets/images/team.png',
        'rewrite' => array( 'slug' => 'team'),
        'supports' => array('title','editor', 'page-attributes', 'thumbnail', 'revisions', 'custom-fields')
    );
    register_post_type('jw_team', $args);
    flush_rewrite_rules();
}
register_taxonomy("cat_team", array("jw_team"), array("hierarchical" => true, "label" => __("Categories", "designinvento"), "singular_label" => __("Team Category", "designinvento"), "rewrite" => true));

add_filter('manage_edit-jw_team_columns', 'team_edit_columns');
function team_edit_columns($columns){	
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "thumbnail" => __("Image", "designinvento"),
            "title" => __("Name", "designinvento"),
            "team" => __("Categories", "designinvento"),
            "date" => __("Date", "designinvento"),
        );
        return $columns;
}

/* * *********************** */
/* Custom post type: Testimonial */
/* * *********************** */

add_action('init', 'testimonial_register');
function testimonial_register() {    
    $labels = array(
        'name' => __('Testimonial', 'designinvento'),
        'singular_name' => __('Testimonial', 'designinvento'),
        'add_new' => __('Add New', 'designinvento'),
        'add_new_item' => __('Add New Testimonial', 'designinvento'),
        'edit_item' => __('Edit Testimonial', 'designinvento'),
        'new_item' => __('New Testimonial', 'designinvento'),
        'all_items' => __('All Testimonials', 'designinvento'),
        'view_item' => __('View Testimonial', 'designinvento'),
        'search_items' => __('Search Testimonials', 'designinvento'),
        'not_found' =>  __('No testimonial found', 'designinvento'),
        'not_found_in_trash' => __('No testimonial found in Trash', 'designinvento'),
        'menu_name' => __('Testimonials', 'designinvento')
    );    
    $args = array(
        'labels' => $labels,
        
        'public' => false,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'hierarchical' => false,
        
        'menu_icon' => THEME_DIR . '/inc/assets/images/testimonial.png',
        'rewrite' => array( 'slug' => 'testimonial'),
        'supports' => array('title', 'editor', 'page-attributes', 'thumbnail', 'revisions', 'custom-fields')
    );
    register_post_type('jw_testimonial', $args);
    flush_rewrite_rules();
}
register_taxonomy("cat_testimonial", array("jw_testimonial"), array("hierarchical" => true, "label" => __("Categories", "designinvento"), "singular_label" => __("Testimonial Category", "designinvento"), "rewrite" => true));

add_filter('manage_edit-jw_testimonial_columns', 'testimonial_edit_columns');
function testimonial_edit_columns($columns){	
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => __("Name", "designinvento"),
            "testimonial" => __("Categories", "designinvento"),
            "date" => __("Date", "designinvento"),
        );
        return $columns;
}
/* * *********************** */
/* Custom post type: Partner */
/* * *********************** */

add_action('init', 'partner_register');
function partner_register() {    
    $labels = array(
        'name' => __('Our Partners', 'designinvento'),
        'singular_name' => __('Partner', 'designinvento'),
        'add_new' => __('Add New', 'designinvento'),
        'add_new_item' => __('Add New Partner', 'designinvento'),
        'edit_item' => __('Edit Item', 'designinvento'),
        'new_item' => __('New Item', 'designinvento'),
        'all_items' => __('All Partners', 'designinvento'),
        'view_item' => __('View Partner', 'designinvento'),
        'search_items' => __('Search Partners', 'designinvento'),
        'not_found' =>  __('No Partner found', 'designinvento'),
        'not_found_in_trash' => __('No partner in Trash', 'designinvento'),
        'menu_name' => __('Partners', 'designinvento')
    );    
    $args = array(
        'labels' => $labels,
        
        'public' => false,
        'has_archive' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'hierarchical' => false,
        
        'menu_icon' => THEME_DIR . '/inc/assets/images/partner.png',
        'rewrite' => array( 'slug' => 'partner'),
        'supports' => array('title', 'page-attributes', 'thumbnail', 'revisions', 'custom-fields')
    );
    register_post_type('jw_partner', $args);
    flush_rewrite_rules();
}
register_taxonomy("cat_partner", array("jw_partner"), array("hierarchical" => true, "label" => __("Categories", "designinvento"), "singular_label" => __("Partner Category", "designinvento"), "rewrite" => true));

add_filter('manage_edit-jw_partner_columns', 'partner_edit_columns');
function partner_edit_columns($columns){	
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "thumbnail" => __("Image", "designinvento"),
            "title" => __("Partners", "designinvento"),
            "partner" => __("Categories", "designinvento"),
            "date" => __("Date", "designinvento"),
        );
        return $columns;
}

require_once ( THEME_PATH . '/inc/post-type/metaboxes.php');
require_once ( THEME_PATH . '/inc/post-type/post-options.php');   

function metabox_render($post, $metabox) {
    global $post; 
    $options = get_post_meta($post->ID, 'designinvento_'.strtolower(THEMENAME).'_options', true);?>
        <input type="hidden" name="designinvento_meta_box_nonce" value="<?php echo wp_create_nonce(basename(__FILE__));?>" />
        <table class="form-table jw-metaboxes">
            <tbody>
                    <?php	                              
                    foreach ($metabox['args'] as $settings) {
                        $settings['value'] = isset($options[$settings['id']]) ? $options[$settings['id']] : (isset($settings['std']) ? $settings['std'] : '');
                        call_user_func('settings_'.$settings['type'], $settings);	
                    }
                    ?>
            </tbody>
        </table>
<?php 
}

add_action('save_post', 'savePostMeta');
function savePostMeta($post_id) {
    global $jw_post_settings, $jw_page_settings, $jw_comingsoon_settings, $jw_cause_settings, $jw_cause_gallery, $jw_cause_video,$jw_event_settings, $jw_event_gallery, $jw_event_video,$jw_portfolio_settings, $jw_portfolio_gallery, $jw_portfolio_video, $jw_price_settings, $jw_testimonial_settings,$jw_history_settings, $jw_team_settings, $jw_partner_settings;

    $meta = 'designinvento_'.strtolower(THEMENAME).'_options';
    
    // verify nonce
    if (!isset($_POST['designinvento_meta_box_nonce']) || !wp_verify_nonce($_POST['designinvento_meta_box_nonce'], basename(__FILE__))) {
            return $post_id;
    }
    
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // check permissions
    if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                    return $post_id;
            }
    } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }
    
    if($_POST['post_type']=='post')
        $metaboxes = $jw_post_settings;
    elseif($_POST['post_type']=='page')
        $metaboxes = array_merge($jw_page_settings,$jw_comingsoon_settings);
    elseif($_POST['post_type']=='jw_cause')
        $metaboxes = array_merge($jw_cause_settings,$jw_cause_gallery,$jw_cause_video);
	elseif($_POST['post_type']=='jw_portfolio')
        $metaboxes = array_merge($jw_portfolio_settings,$jw_portfolio_gallery,$jw_portfolio_video);		
	elseif($_POST['post_type']=='jw_event')
        $metaboxes = array_merge($jw_event_settings,$jw_event_gallery,$jw_event_video);
	
		
	
    elseif($_POST['post_type']=='jw_team')
        $metaboxes = $jw_team_settings;
    elseif($_POST['post_type']=='jw_testimonial')
        $metaboxes = $jw_testimonial_settings;
	elseif($_POST['post_type']=='jw_history')
        $metaboxes = $jw_history_settings; 
    elseif($_POST['post_type']=='jw_price')
        $metaboxes = $jw_price_settings; 
    elseif($_POST['post_type']=='jw_partner')
        $metaboxes = $jw_partner_settings; 
    
    if(!empty($metaboxes)) {
        $myMeta = array();

        foreach ($metaboxes as $metabox) {
            $myMeta[$metabox['id']] = isset($_POST[$metabox['id']]) ? $_POST[$metabox['id']] : "";
        }

        update_post_meta($post_id, $meta, $myMeta);        

    }
}

/* ================================================================================== */
/*      Save gallery images
/* ================================================================================== */

function designinvento_save_images() {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;
	
	if ( !isset($_POST['ids']) || !isset($_POST['nonce']) || !wp_verify_nonce( $_POST['nonce'], 'designinvento-ajax' ) )
		return;
	
	if ( !current_user_can( 'edit_posts' ) ) return;
 
	$ids = strip_tags(rtrim($_POST['ids'], ','));
	update_post_meta($_POST['post_id'], 'gallery_image_ids', $ids);

	// update thumbs
	$thumbs = explode(',', $ids);
	$gallery_thumbs = '';
	foreach( $thumbs as $thumb ) {
		$gallery_thumbs .= '<li>' . wp_get_attachment_image( $thumb, array(32,32) ) . '</li>';
	}

	echo $gallery_thumbs;

	die();
}
add_action('wp_ajax_designinvento_save_images', 'designinvento_save_images');
?>