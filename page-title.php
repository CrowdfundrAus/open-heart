<?php
if(!is_singular('post') || jw_option('blog_title')!="") {  
    if(is_singular('post') || is_home() || is_page_template( 'template-blog.php' )) {
        if(jw_option('blog_title')!="") {
            $title = "<h1 class='page-title'>".apply_filters('widget_title', jw_option('blog_title'))."</h1>";        
            $subtitle = jw_option('blog_subtitle')!="" ? ('<h3>'.apply_filters('widget_title', jw_option("blog_subtitle")).'</h3>') : '';
        }
    } else {
        $subtitle = "";
        if(is_page() || is_singular('jw_cause')) {
            $title = get_featuredtext();
            if (get_metabox("subtitle") != "") {
                $subtitle = "<h3>".apply_filters('widget_text', get_metabox("subtitle"))."</h3><div class='bottomdivider clearfix'></div>";
            }
            if(get_metabox("bg_image") != "") {
                $bgimage = get_metabox("bg_image");
            }
        } else {
            $title = get_featuredtext();
        }
    }
}


$breadcrumb = false;
$class = 'span12';
if(get_metabox("breadcrumps")=="true") {
    $breadcrumb = true;
    $class = 'span12';
} else if(get_metabox("breadcrumps")!="false") {
    if(jw_option("breadcrumps")) {
        $breadcrumb = true;
        $class = 'span12';
    }
}
$ebreadcrumb = "";
//if($breadcrumb){ ob_start(); echo '<div class="span6">'; breadcrumbs(); echo '</div>'; $ebreadcrumb = ob_get_clean();}


$background = isset($bgimage) ? $bgimage : jw_option('title_bg_image');


if(isset($title)) { ?>
    <!-- Start Feature -->
    <section id="page-title"<?php echo !empty($background) ? (' style="background-image: url('.$background.')"') : '';?>>
        <!-- Start Container -->
        <div class="container">
            <div class="row">                               
               
			<div class="<?php echo esc_attr($class);?>">
                    <?php echo wp_kses_post($title.$subtitle); ?>
            </div> 
            </div>
        </div>
        <!-- End Container -->
    </section>
    <!-- End Feature -->
<?php } ?>