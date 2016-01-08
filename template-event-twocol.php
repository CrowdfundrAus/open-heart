<?php
/**
 * Template name: events two column
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Open-heart wordpress charity theme
 * @since Open-heart 1.0
 */
get_header();
?>
<div class="container all-event-page">

    <div  id="main-event-content">
        <section class="content events-page">
               <?php
				global $jw_options, $jw_isArchive,$paged;
				$block = isset($jw_options['block']) ? intval($jw_options['block']) : 1;
				$layout = !empty($jw_options['layout']) ? $jw_options['layout'] : 'standard';
				
				if (!empty($jw_options['more_text'])) {
					$readMore = $jw_options['more_text'];
				} else {
					$readMore = jw_option('translate_readmore') ? jw_option('translate_readmore') : __('Read More', 'designinvento');
				}

				if ($jw_isArchive || is_tag() || is_search()) {
					$nofeatured = true;
					$layout = 'standard';
				   
				}

				//$the_query = new WP_Query('post_type=jw_event&posts_per_page=5&paged='.$paged); 
			$query = Array(
            'post_type' => 'jw_event',
            'posts_per_page' => 6,
            'paged' => $paged,
        );
		query_posts($query);
				if (have_posts()) {

					$width = 770;
					$class = '';
					if ($layout != 'standard') {
						$class = "span" . $layout;
						$width = 270;
						if ($class == 'span6') {
							$width = 570;
						} elseif ($class == 'span4') {
							$width = 370;
						}
					}

					echo esc_attr($layout) != 'standard' ? "<div class='row'><div class='isotope-container'>" : "";

					while (have_posts()) : the_post();
						$format = get_post_format() == "" ? "standard" : get_post_format();
						
						

						if ($layout == 'standard') {
							?>

							<article class="span6 event-new"  id="post-<?php the_ID(); ?>" <?php post_class($class); ?>><?php
									$ids = get_metabox('gallery_image_ids');
									$video_embed = get_metabox('format_video_embed');
									$video_url   = get_metabox('pretty_video_url');
									if (has_post_thumbnail($post->ID)) {
										if(!empty($video_url)&&get_metabox('pretty_video')==='true'){
											events_image($width,$height,true,$video_url);                            
										}else{
											events_image($width,$height);
										}
									} elseif($ids!="false" && $ids!="") {
										portfolio_gallery($width,$height,$ids);
									} elseif(!empty($video_embed)) {
										echo apply_filters("the_content", htmlspecialchars_decode($video_embed));
									} ?>
							<?php if ($format == 'link' || $format == 'quote') { ?>
									<div class="loop-block">                    
										<div class="loop-media">
											<div class="loop-format">
												<span class="post-format <?php echo esc_attr($format); ?>"></span>
											</div>
									<?php call_user_func('format_' . $format); ?>
										</div>
									</div><?php
								} else {
									?>
										
									<div class="image-content span4">	
										<div class="span1 pull-left">
											<h3><?php  echo wp_kses_post(get_metabox('event_date'));?></h3>
											<p><?php echo wp_kses_post(get_metabox('event_month'));?></p>
										</div>	
										<div class="pull-left event-title">
												<h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 3 ); ?></a></h3>
												<p class="event-loc"><i class="icon-time"></i> <?php echo wp_kses_post(get_metabox('event_time'));?> <i class="icon-map-marker sec"></i> <?php echo wp_kses_post(get_metabox('location_name'));?> </p>
										</div>
										<div class=" clearfix"></div>
										<div class="event-new-content clearfix">
												<?php $content = get_the_content();
												$content = strip_tags($content);
												echo substr($content, 0, 150); ?>
										</div>
										<div class="event-read"><a href="<?php the_permalink(); ?>" class="more-link"><?php echo apply_filters("widget_title", $readMore); ?></a></div>
											 
									</div>
							<?php } ?>
							</article>
							
							<?php } else {
							?>

						   

							<?php
						}
					endwhile;
					echo esc_attr($layout) != 'standard' ? "</div></div>" : "";
					
					pagination();

    

					wp_reset_query();
				}?>
				
        </section>
    </div>
    

</div>

<?php get_footer();?>