<?php get_header(); ?>
<?php the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-portfolio');?>>
    <div class="row cause-detail clearfix" id="events-detail-single">
		<div class="span8 cause-detail pull-left">
			<div class="">		
				<?php
				global $post;
				
				$likeit = get_post_meta($post->ID, 'post_likeit', true);
				$likecount = empty($likeit) ? '0' : $likeit;
				$likedclass = 'likeit';
				if (isset($_COOKIE['likeit-' . $post->ID])) {
					$likedclass .= ' liked';
				}
				
				$ids = get_metabox('gallery_image_ids');
				$video_embed = wp_kses_post(get_metabox('format_video_embed'));
				if($ids!="false" && $ids!="") {
					$height = wp_kses_post(get_metabox('format_image_height'));
					portfolio_gallery(770, $height, $ids, false);
				} elseif(!empty($video_embed)) {
					echo apply_filters("the_content", htmlspecialchars_decode($video_embed));
				} else {
					$height = wp_kses_post(get_metabox('image_height'));
					portfolio_image_single(770, $height,false);
				}
				
				?>
			
			</div>
			<div class="span8 cause-detail">
				<div class="image-content">	
										<div class="span1 pull-left">
											<h3><?php echo wp_kses_post(get_metabox('event_date'));?></h3>
											<p><?php echo wp_kses_post(get_metabox('event_month'));?></p>
										</div>	
										<div class="pull-left event-title">
												<h3><?php echo wp_kses_post(get_the_title()); ?></h3>
												<p class="event-loc"><i class="icon-time"></i> <?php echo wp_kses_post(get_metabox('event_time'));?> <i class="icon-map-marker sec"></i> <?php echo wp_kses_post(get_metabox('location_name'));?> </p>
										</div>
										<div class=" clearfix"></div>
										<div class="event-new-content clearfix"  style="margin-top:15px;">
												<?php
												$live_preview = jw_option('translate_livepreview') ? jw_option('translate_livepreview') : __('LIVE PREVIEW', 'designinvento');
												echo wp_kses_post(get_the_content());
												?>
										</div>
										<div class="event-read"><a href="<?php the_permalink(); ?>" class="more-link"><?php echo apply_filters("widget_title", $readMore); ?></a></div>
											 
				</div>
				
			</div> 
		</div>	
		<div class="pull-right"> <?php get_template_part("sidebar");?></div>
    </div>
	
				
</article> 

<?php 
if(!jw_option('port_related')) {
    related_events();
}?>

<?php get_footer(); ?>