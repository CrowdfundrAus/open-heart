<?php
global $jw_options,$portAtts;
if (have_posts ()) {
    echo '<div class="row" style="margin:0px;">';
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
                $cats = wp_get_post_terms($post->ID, 'cat_cause', $args);
                foreach ($cats as $catalog) {
                    $class .= " category-" . $catalog->slug;
                } ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>><?php
                    $ids = get_metabox('gallery_image_ids');
                    $video_embed = get_metabox('format_video_embed');
                    $video_url   = get_metabox('pretty_video_url');
                    if (has_post_thumbnail($post->ID)) {
                        if(!empty($video_url)&&get_metabox('pretty_video')==='true'){
                            causes_image($width,$height,true,$video_url);                            
                        }else{
                            causes_image($width,$height);
                        }
                    } elseif($ids!="false" && $ids!="") {
                        portfolio_gallery($width,$height,$ids);
                    } elseif(!empty($video_embed)) {
                        echo apply_filters("the_content", htmlspecialchars_decode($video_embed));
                    } 
						
					?>
					
                    <div class="portfolio-content image-content">
                        <h3 class="portfolio-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="progress home-progress">
											  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo get_metabox('client_name');?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo get_metabox('client_name');?>">
												<?php echo get_metabox('client_name');?>
											  </div>
						</div>
                        <div class=""><h5><span><?php echo get_metabox('client_name');?> Donated  /</span> <?php echo get_metabox('project_date');?> To Go</h5></div>
						<div class=""><p><?php $content = get_the_content();
							$content = strip_tags($content);
							echo substr($content, 0, 130); ?></p>
												
						</div>
						<div class="cause-read" style="margin:20px 0px;margin-bottom:5px"><a href="<?php the_permalink(); ?>">Read More</a><a href="<?php echo get_metabox('cause_donate')?>">Donate Now</a>	</div>
						
                    </div>
                </article><?php
            }
        echo '</div>';
    echo '</div>';
    if($jw_options['pagination']=="simple"){
        pagination();
    }elseif($jw_options['pagination']=="infinite"){
        infinite();
    }
    wp_reset_query();
}