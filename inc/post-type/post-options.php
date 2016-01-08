<?php    
/*
$selectsidebar = array();
$selectsidebar["Default sidebar"] = "Default sidebar";
$sidebars = get_option('sbg_sidebars');
if (!empty($sidebars)) {
    foreach ($sidebars as $sidebar) {
        $selectsidebar[$sidebar] = $sidebar;
    }
}*/
$header_type = array(
    'subtitle'=>'Title and Subtitle',
    'slider'=>'Slider',
    
    );
$years = array('2013'=>'2013','2014'=>'2014','2015'=>'2015','2016'=>'2016','2017'=>'2017','2018'=>'2018');
$months = array('01'=>__('January','designinvento'),'02'=>__('February','designinvento'),'03'=>__('March','designinvento'),
    '04'=>__('April','designinvento'),'05'=>__('May','designinvento'),'06'=>__('June','designinvento'),
    '07'=>__('July','designinvento'),'08'=>__('August','designinvento'),'09'=>__('Septempber','designinvento'),
    '10'=>__('October','designinvento'),'11'=>__('November','designinvento'),'12'=>__('December','designinvento'));
$days = array(
    '01' => '1','02' => '2','03' => '3','04' => '4','05' => '5',
    '06' => '6','07' => '7','08' => '8','09' => '9','10' => '10',
    '11' => '11','12' => '12','13' => '13','14' => '14','15' => '15',
    '16' => '16','17' => '17','18' => '18','19' => '19','20' => '20',
    '21' => '21','22' => '22','23' => '23','24' => '24','25' => '25',
    '26' => '26','27' => '27','28' => '28','29' => '29','30' => '30','31' => '31',
);
$hours = array(
    '00' => '0','01' => '1','02' => '2','03' => '3','04' => '4',
    '05' => '5','06' => '6','07' => '7','08' => '8','09' => '9',
    '10' => '10','11' => '11','12' => '12','13' => '13','14' => '14',
    '15' => '15','16' => '16','17' => '17','18' => '18','19' => '19',
    '20' => '20','21' => '21','22' => '22','23' => '23'
);
/* * *********************** */
/* Post options */
/* * *********************** */
$jw_post_settings = Array(

    Array(        
        'name' => __('Featured Media Show?', 'designinvento'),
        'desc' => __('Default setting will take from theme options.', 'designinvento'),
        'id' => 'feature_show',
        'std' => 'default',
        'type' => 'selectbox'),
    Array(        
        'name' => __('Featured Image Height?', 'designinvento'),
        'desc' => __('Image height (px).', 'designinvento'),
        'id' => 'image_height',
        'std' => '490',
        'type' => 'text'),

    Array(        
        'name' => __('Choose Post Layout?', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id' => 'layout',
        'std' => 'right',
        'type' => 'layout'),
		/*
    Array(        
        'name' => __('Choose Sidebar ?', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id' => 'sidebar',
        'options' => $selectsidebar,
        'std' => 'Default sidebar',
        'type' => 'select')*/
);


/* * *********************** */
/* Page options */
/* * *********************** */
$jw_page_settings = Array(
    Array(
        'name' => __('Header type ?', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id' => 'header_type',
        'std' => 'subtitle',
        'options' => $header_type,
        'type' => 'select'),
    Array(
        'name' => __('Select Slideshow', 'designinvento'),
        'desc' => __('All of your created sliders will be included here.', 'designinvento'),
        'id' => 'slider_id',
        'type' => 'slideshow'),

    Array(
        'name' => __('Sub Title', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id' => 'subtitle',
        'type' => 'text'),
    Array(
        'name' => __('Background image of page title', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id' => 'bg_image',
        'type' => 'file'),
    Array( 
		'name' => __('Parallaxe text', 'designinvento'),
        'desc' => __('This is demo text in textarea you can edit or change. inside the span with comma separated words will rotate ', 'designinvento'),
        'id' => 'paralaxetext',
		'std' => 'One page <span class="rotate"> Dynamic, Customizable </span> theme',
        'type' => 'textarea'),
    Array(
        'name' => __('Video URL', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id' => 'googlemap',
        'type' => 'textarea'),
    Array( 
		'name' => __('Video text', 'designinvento'),
        'desc' => __('This is demo text in textarea you can edit or change. inside the span with comma separated words will rotate ', 'designinvento'),
        'id' => 'videotext',
		'std' => '<span class=""videorotate">CUSTOM VIDEO BACKGROUND, HTML5 VIDEO PLAYER</span>',
        'type' => 'textarea'),
   
	Array(
        'name' => __('Menu', 'designinvento'),
        'desc' => __('This will helps you ', 'designinvento'),
        'id'   => 'page_menu',
        'type' => 'menu'
    ),
	/*Array(
        'name' => __('Menu Position', 'designinvento'),
        'desc' => __('This will helps you ', 'designinvento'),
        'id'   => 'page_menu_position',
        'type' => 'mselectbox'
    ),*/
	Array(
        'name' => __('Google map latitude', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id'   => 'google_map_latitude',
        'type' => 'text'
    ),
	Array(
        'name' => __('Google map Longitude', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id'   => 'google_map_logtitude',
        'type' => 'text'
    ),
);
$jw_comingsoon_settings = Array(
    Array(
        'name' => __('Years', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id'   => 'coming_years',
        'std'  => '2014',
        'options' => $years,
        'type' => 'select'
    ),
    Array(
        'name' => __('Months', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id'   => 'coming_months',
        'std'  => '01',
        'options' => $months,
        'type' => 'select'
    ),
    Array(
        'name' => __('Days', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id'   => 'coming_days',
        'std'  => '01',
        'options' => $days,
        'type' => 'select'
    ),
    Array(
        'name' => __('Hours', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id'   => 'coming_hours',
        'std'  => '00',
        'options' => $hours,
        'type' => 'select'
    ),
    Array(
        'name' => __('Your Feedburner Title', 'designinvento'),
        'desc' => __('If empty, Subscribe form none', 'designinvento'),
        'id'   => 'coming_link',
        'std'  => '',
        'type' => 'text'
    ),
);



/* * *********************** */
/* causes options */
/* * *********************** */
$jw_cause_settings = Array(
   
   
    
	Array(
        'name' => __('Donated', 'designinvento'),
        'desc' => __('How much donated example(80%)', 'designinvento'),
        'id' => 'client_name',
        'type' => 'text'),
	Array(
        'name' => __('Remaning Amount', 'designinvento'),
        'desc' => __('How much remaning example($22,223)', 'designinvento'),
        'id' => 'project_date',
        'type' => 'text'),
	Array(
        'name' => __('Address', 'designinvento'),
        'desc' => __('Address will show on single page', 'designinvento'),
        'id' => 'cause_address',
        'type' => 'text'),
	
	Array(
        'name' => __('Donate Url', 'designinvento'),
        'desc' => __('Enter Paypal link here', 'designinvento'),
        'id' => 'cause_donate',
        'type' => 'text'),
   
);
$jw_cause_gallery = array(
        array( "name" => __('Upload images', 'designinvento'),
                        "desc" => __('Select the images that should be upload to this gallery', 'designinvento'),
                        "id" => "gallery_image_ids",
                        "type" => 'gallery'
                ),
        array( "name" => __('Gallery height', 'designinvento'),
                        "desc" => __('Gallery height on single page', 'designinvento'),
                        "id" => "format_image_height",
                        "type" => 'text'
                )
);
$jw_cause_video = array(
        array( "name" => __('Embeded Code','designinvento'),
                        "desc" => __('If you\'re not using self hosted video then you can include embeded code here.','designinvento'),
                        "id" => "format_video_embed",
                        "type" => "textarea",
                        'std' => ''
        ),
        array(
            'name' => __('Show light box?', 'designinvento'),
            'desc' => __('It works when featured image is selected.', 'designinvento'),
            'id' => 'pretty_video',
            'options' => array('true'=>'Yes','false'=>'No'),
            'std' => 'false',
            'type' => 'select'
        ),
       
);

/* * *********************** */
/* gallery options */
/* * *********************** */
$jw_portfolio_settings = Array(
   
   
    Array(
        'name' => __('Preview url', 'themeinvento'),
        'desc' => __('Preview url', 'themeinvento'),
        'id' => 'preview_url',
        'type' => 'text'),
	
	
    
);
$jw_portfolio_gallery = array(
        array( "name" => __('Upload images', 'themeinvento'),
                        "desc" => __('Select the images that should be upload to this gallery', 'themeinvento'),
                        "id" => "gallery_image_ids",
                        "type" => 'gallery'
                ),
        array( "name" => __('Gallery height', 'themeinvento'),
                        "desc" => __('Gallery height on single gallery', 'themeinvento'),
                        "id" => "format_image_height",
                        "type" => 'text'
                )
);
$jw_portfolio_video = array(
        array( "name" => __('Embeded Code','themeinvento'),
                        "desc" => __('If you\'re not using self hosted video then you can include embeded code here.','themeinvento'),
                        "id" => "format_video_embed",
                        "type" => "textarea",
                        'std' => ''
        ),
        array(
            'name' => __('Show light box?', 'themeinvento'),
            'desc' => __('It works when featured image is selected.', 'themeinvento'),
            'id' => 'pretty_video',
            'options' => array('true'=>'Yes','false'=>'No'),
            'std' => 'false',
            'type' => 'select'
        ),
        
);
/* * *********************** */
/* events options */
/* * *********************** */
$jw_event_settings = Array(
   
   
    
	Array(
        'name' => __('Location', 'designinvento'),
        'desc' => __('Put event location name', 'designinvento'),
        'id' => 'location_name',
        'type' => 'text'),
	Array(
        'name' => __('Date', 'designinvento'),
        'desc' => __('Insert event Date example(26)', 'designinvento'),
        'id' => 'event_date',
        'type' => 'text'),
	Array(
        'name' => __('Month', 'designinvento'),
        'desc' => __('Insert event month example(jan)', 'designinvento'),
        'id' => 'event_month',
        'type' => 'text'),
		
	Array(
        'name' => __('Time', 'designinvento'),
        'desc' => __('Insert event time example (2.00 PM)', 'designinvento'),
        'id' => 'event_time',
        'type' => 'text'),	
	
   
);
$jw_event_gallery = array(
        array( "name" => __('Upload images', 'designinvento'),
                        "desc" => __('Select the images that should be upload to this gallery shows on singla page', 'designinvento'),
                        "id" => "gallery_image_ids",
                        "type" => 'gallery'
                ),
        array( "name" => __('Gallery height', 'designinvento'),
                        "desc" => __('Gallery height on single page', 'designinvento'),
                        "id" => "format_image_height",
                        "type" => 'text'
                )
);
$jw_event_video = array(
        array( "name" => __('Embeded Code','designinvento'),
                        "desc" => __('If you\'re not using self hosted video then you can include embeded code here.','designinvento'),
                        "id" => "format_video_embed",
                        "type" => "textarea",
                        'std' => ''
        ),
        array(
            'name' => __('Show light box?', 'designinvento'),
            'desc' => __('It works when featured image is selected.', 'designinvento'),
            'id' => 'pretty_video',
            'options' => array('true'=>'Yes','false'=>'No'),
            'std' => 'false',
            'type' => 'select'
        ),
       
);



/* * *********************** */
/* Testimonial options */
/* * *********************** */
$jw_testimonial_settings = Array(
    Array(
        'name' => __('Name', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id' => 'name',
        'type' => 'text'),
    Array(
        'name' => __('Company name', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id' => 'company',
        'type' => 'text'),
    Array(
        'name' => __('Link to url', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id' => 'url',
        'type' => 'text'),
);


/* * *********************** */
/* History options */
/* * *********************** */
$jw_history_settings = Array(
    Array(
        'name' => __('Date', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id' => 'name',
        'type' => 'text'),
  
);


/* * *********************** */
/* Team options */
/* * *********************** */
$jw_team_settings = Array(
    Array(
        'name' => __('Custom url', 'designinvento'),
        'desc' => __('Custom url', 'designinvento'),
        'id' => 'custom_link',
        'type' => 'text'),
    Array(
        'name' => __('Position', 'designinvento'),
        'desc' => __('Member position', 'designinvento'),
        'id' => 'position',
        'type' => 'text'),
    Array(
        'name' => __('Background color', 'designinvento'),
        'desc' => __('Choose color', 'designinvento'),
        'id' => 'bg_color',
        'type' => 'color'),
    Array(
        'name' => __('Facebook url', 'designinvento'),
        'desc' => __('Facebook url', 'designinvento'),
        'id' => 'facebook',
        'type' => 'text'),
    Array(
        'name' => __('Google Plus url', 'designinvento'),
        'desc' => __('Google Plus url', 'designinvento'),
        'id' => 'google',
        'type' => 'text'),
    Array(
        'name' => __('Twitter url', 'designinvento'),
        'desc' => __('Twitter url', 'designinvento'),
        'id' => 'twitter',
        'type' => 'text'),
    Array(
        'name' => __('Linkedin url', 'designinvento'),
        'desc' => __('Linkedin url', 'designinvento'),
        'id' => 'linkedin',
        'type' => 'text'),
);


/* * *********************** */
/* Partner options */
/* * *********************** */
$jw_partner_settings = Array(
    Array(
        'name' => __('Partner Link to URL', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id' => 'link',
        'type' => 'text'),
);


/* * *********************** */
/* Pricing table options */
/* * *********************** */
$jw_price_settings = Array(
    Array(
        'name' => __('Color', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id' => 'color',
		'std' => __("#333333", "designinvento"),
        'type' => 'color'),
    Array(
        'name' => __('Price', 'designinvento'),
        'desc' => __('Please insert with $ symbol.', 'designinvento'),
        'id' => 'price',
        'type' => 'text'),
Array(
        'name' => __('Recommended', 'designinvento'),
        'desc' => __('This will helps you to Enable/Disable Recommended Table Option ', 'designinvento'),
        'id'   => 'recommendedtable',
		'std' => 'default',
        'type' => 'selectbox'
    ),
    Array(
        'name' => __('Button text', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id' => 'buttontext',
        'type' => 'text'),
    Array(
        'name' => __('Button URL', 'designinvento'),
        'desc' => __('', 'designinvento'),
        'id' => 'buttonlink',
        'type' => 'text'),
);


add_action('admin_init', 'post_settings_custom_box', 1);
if (!function_exists('post_settings_custom_box')) {
    function post_settings_custom_box() {
        global $jw_post_settings;
        add_meta_box('post_meta_settings',__( 'Post settings', 'designinvento' ),'metabox_render','post','normal','high',$jw_post_settings);
    }
}

add_action('admin_init', 'page_settings_custom_box', 1);
if (!function_exists('page_settings_custom_box')) {
    function page_settings_custom_box() {
        global $jw_page_settings, $jw_comingsoon_settings;
        add_meta_box('page_meta_settings',__( 'Page settings', 'designinvento' ),'metabox_render','page','normal','high',$jw_page_settings);
        //add_meta_box('comingsoon_meta_settings',__( 'ComingSoon page settings', 'designinvento' ),'metabox_render','page','normal','high',$jw_comingsoon_settings);
    }
}

add_action('admin_init', 'cause_settings_custom_box');
if (!function_exists('cause_settings_custom_box')) {
    function cause_settings_custom_box() {
        global $jw_cause_settings,$jw_cause_gallery,$jw_cause_video;
        add_meta_box('cause_meta_settings',__( 'Cause settings', 'designinvento' ),'metabox_render','jw_cause','normal','high',$jw_cause_settings);
        add_meta_box('cause_gallery_settings',__( 'Cause gallery settings', 'designinvento' ),'metabox_render','jw_cause','normal','high',$jw_cause_gallery);
        add_meta_box('cause_video_settings',__( 'Cause video settings', 'designinvento' ),'metabox_render','jw_cause','normal','high',$jw_cause_video);
    }
}
add_action('admin_init', 'portfolio_settings_custom_box');
if (!function_exists('portfolio_settings_custom_box')) {
    function portfolio_settings_custom_box() {
        global $jw_portfolio_settings,$jw_portfolio_gallery,$jw_portfolio_video;
        add_meta_box('portfolio_meta_settings',__( 'gallery settings', 'themeinvento' ),'metabox_render','jw_portfolio','normal','high',$jw_portfolio_settings);
        add_meta_box('portfolio_gallery_settings',__( 'gallery settings', 'themeinvento' ),'metabox_render','jw_portfolio','normal','high',$jw_portfolio_gallery);
        add_meta_box('portfolio_video_settings',__( 'gallery video settings', 'themeinvento' ),'metabox_render','jw_portfolio','normal','high',$jw_portfolio_video);
    }
}
add_action('admin_init', 'event_settings_custom_box');
if (!function_exists('event_settings_custom_box')) {
    function event_settings_custom_box() {
        global $jw_event_settings,$jw_event_gallery,$jw_event_video;
        add_meta_box('event_meta_settings',__( 'event settings', 'designinvento' ),'metabox_render','jw_event','normal','high',$jw_event_settings);
        add_meta_box('event_gallery_settings',__( 'event gallery settings', 'designinvento' ),'metabox_render','jw_event','normal','high',$jw_event_gallery);
        add_meta_box('event_video_settings',__( 'event video settings', 'designinvento' ),'metabox_render','jw_event','normal','high',$jw_event_video);
    }
}


add_action('admin_init', 'testimonial_settings_custom_box');
if (!function_exists('testimonial_settings_custom_box')) {
    function testimonial_settings_custom_box() {
        global $jw_testimonial_settings;
        add_meta_box('testimonial_meta_settings',__( 'Testimonial settings', 'designinvento' ),'metabox_render','jw_testimonial','normal','high',$jw_testimonial_settings);
    }
}
add_action('admin_init', 'history_settings_custom_box');
if (!function_exists('history_settings_custom_box')) {
    function history_settings_custom_box() {
        global $jw_history_settings;
        add_meta_box('history_meta_settings',__( 'History settings', 'designinvento' ),'metabox_render','jw_history','normal','high',$jw_history_settings);
    }
}

add_action('admin_init', 'team_settings_custom_box');
if (!function_exists('team_settings_custom_box')) {
    function team_settings_custom_box() {
        global $jw_team_settings;
        add_meta_box('team_meta_settings',__( 'Team settings', 'designinvento' ),'metabox_render','jw_team','normal','high',$jw_team_settings);
    }
}

add_action('admin_init', 'partner_settings_custom_box');
if (!function_exists('partner_settings_custom_box')) {
    function partner_settings_custom_box() {
        global $jw_partner_settings;
        add_meta_box('partner_meta_settings',__( 'Partner settings', 'designinvento' ),'metabox_render','jw_partner','normal','high',$jw_partner_settings);
    }
}

add_action('admin_init', 'price_settings_custom_box');
if (!function_exists('price_settings_custom_box')) {
    function price_settings_custom_box() {
        global $jw_price_settings;
        add_meta_box('price_meta_settings',__( 'Price settings', 'designinvento' ),'metabox_render','jw_price','normal','high',$jw_price_settings);
    }
}