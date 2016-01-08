<?php get_header();
the_post();
if(jw_option('pagebuilder')&&pbGetContentBuilder()){
    echo apply_filters('widget_text', pbGetContentBuilder());
}else{
    echo '<div class="container">';
        echo '<div class="row">';
            if(get_metabox('layout') == "left" || get_metabox('layout') == "right"){
                get_sidebar();
                echo "<div class='span9'>";
                     echo wp_kses_post(invento_content_filter());
                    wp_link_pages();
                    comments_template('', true);
                echo "</div>";
            }else{
                echo "<div class='span12'>";
                    echo wp_kses_post(invento_content_filter());
                    wp_link_pages();
                    comments_template('', true);
                echo "</div>";
            }
        echo "</div>";
    echo "</div>";
}
get_footer(); ?>