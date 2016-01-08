<?php
global $jw_options,$portAtts;
if (have_posts ()) {
    echo '<div class="row gallery-post">';
        echo '<div class="isotope-container">';
            while (have_posts ()) { the_post();
                $likeit = get_post_meta($post->ID, 'post_likeit', true);
                $likecount = empty($likeit) ? '0' : $likeit;
                $likedclass = 'likeit';
                if (isset($_COOKIE['likeit-' . $post->ID])) {
                    $likedclass .= ' liked';
                }
                $args = array('orderby' => 'none');
                $class = isset($jw_options['column'])?"span".$jw_options['column']:'span4';
                $height = !empty($jw_options['height']) ? $jw_options['height'] : jw_option('port_height');
                $width = 370;
                if($class=='span6'){
                    $width = 570;
                }elseif($class=='span4'){
                    $width = 370;  
                }                
                $cats = wp_get_post_terms($post->ID, 'cat_portfolio', $args);
                foreach ($cats as $catalog) {
                    $class .= " category-" . $catalog->slug;
                } ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>><?php
                    $ids = get_metabox('gallery_image_ids');
                    $video_embed = get_metabox('format_video_embed');
                    $video_url   = get_metabox('pretty_video_url');
					$image_url   = get_metabox('preview_url');
                    if (has_post_thumbnail($post->ID)) {
                        if(!empty($video_url)&&get_metabox('pretty_video')==='true'){
                            portfolio_image($width,$height,true,$video_url);                            
                        }else{
                            portfolio_image($width,$height);
                        }
                    } elseif($ids!="false" && $ids!="") {
                        portfolio_gallery($width,$height,$ids);
                    } elseif(!empty($video_embed)) {
                        echo apply_filters("the_content", htmlspecialchars_decode($video_embed));
                    } ?>
					
                    
                </article><?php
				
            }
			
        echo '</div>';
    echo '</div>';
    
    wp_reset_query();
}
/**/