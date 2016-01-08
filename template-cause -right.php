<?php
/**
 * Template name: cause right side bar
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Open-heart
 * @since Open-heart 1.0
 */
get_header();
?>
<div class="container all-causes-page cause-right-sidebar">

    <div class="span8 cause-right-sidebar">
        <section class="content causes-page">
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
				//$the_query = new WP_Query('post_type=jw_cause&posts_per_page=8'); 
				$query = Array(
					'post_type' => 'jw_cause',
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
					echo $layout != 'standard' ? "<div class='row'><div class='isotope-container'>" : "";
					while (have_posts()) : the_post();
						$format = get_post_format() == "" ? "standard" : get_post_format();
						if ($layout == 'standard') {
							?>
							<article class="span4"  id="post-<?php the_ID(); ?>" <?php post_class($class); ?>><?php
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
							<?php if ($format == 'link' || $format == 'quote') { ?>
									<div class="loop-block">                    
										<div class="loop-media">
											<div class="loop-format">
												<span class="post-format <?php echo $format; ?>"></span>
											</div>
									<?php call_user_func('format_' . $format); ?>
										</div>
									</div>
									<?php
								} else {
									?>	
									<div class="image-content">						
										<div class="portfolio-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>	
										<div class="progress home-progress">
											  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo get_metabox('client_name');?>">
												<?php echo get_metabox('client_name');?>
											  </div>
										</div>				
										<div class=""><h5><span><?php echo get_metabox('client_name');?> Donated  /</span>  <?php echo get_metabox('project_date')?> To Go</h5></div>
										<div class="loop-content clearfix cause-conte">
												<?php $content = get_the_content();
												$content = strip_tags($content);
												echo substr($content, 0, 130); ?>
										</div>
										 <div class="cause-read">											<a href="<?php the_permalink(); ?>" class="more-link"><?php echo apply_filters("widget_title", $readMore); ?></a>											<a href="<?php echo get_metabox('cause_donate')?>" target="_blank">Donate Now</a>											</div>
									</div>
							<?php } ?>
							</article>
							<?php } else {
							?>
							<?php
						}
					endwhile;
					echo $layout != 'standard' ? "</div></div>" : "";
					
					pagination();

    

					
					wp_reset_query();
				}?>
				<div class="clearfix"></div>
        </section>
    </div>
    <?php get_template_part("sidebar");?>

</div>

<?php get_footer();?>