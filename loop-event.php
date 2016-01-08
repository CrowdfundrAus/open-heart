<?php
global $jw_options,$portAtts;
if (have_posts ()) {
    echo '<div class="row event-row" style="margin:0px;margin-bottom:40px;">';
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
                $cats = wp_get_post_terms($post->ID, 'cat_event', $args);
                foreach ($cats as $catalog) {
                    $class .= " category-" . $catalog->slug;
                } ?>
                <article class="span8 event-new" id="post-<?php the_ID(); ?>" <?php post_class($class); ?>><?php
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
                    } ?>
					
                   <div class="image-content span6" style="margin-left:0px !important;">	
										<div class="span1 pull-left">
											<h3><?php echo wp_kses_post(get_metabox('event_date'));?></h3>
											<p><?php echo wp_kses_post(get_metabox('event_month'));?></p>
										</div>	
										<div class="pull-left event-title">
												<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<p class="event-loc"><i class="icon-time"></i> <?php echo wp_kses_post(get_metabox('event_time'));?> <i class="icon-map-marker sec"></i> <?php echo wp_kses_post(get_metabox('location_name'));?> </p>
										</div>
										<div class=" clearfix"></div>
										<div class="event-new-content clearfix">
												<?php $content = get_the_content();
												$content = strip_tags($content);
												echo substr($content, 0, 260); ?>
										</div>
										<div class="event-read"><a href="<?php the_permalink(); ?>" class="more-link">Read More</a></div>
											 
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