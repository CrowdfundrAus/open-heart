<?php get_header(); ?>
<?php the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-portfolio');?>>
    <div class="row clearfix">
		<div class="pull-left span8 cause-detail">
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
						portfolio_gallery(1170, $height, $ids, false);
					} elseif(!empty($video_embed)) {
						echo apply_filters("the_content", htmlspecialchars_decode($video_embed));
					} else {
						$height = wp_kses_post(get_metabox('image_height'));
						portfolio_image_single(1170, $height,false);
					}
					
					?>
				
				</div>
				<div class="span8 cause-detail">
					<div class="cause-single-detail span8 cause-detail" style="margin-left:0px;">				
						<h2 class="jw-title cause-title"><?php echo wp_kses_post(get_the_title()); ?></h2>
						<div class="progress home-progress">

											  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo get_metabox('client_name');?>">

												<?php echo get_metabox('client_name');?>

											  </div>

						</div>	
						<div class="portfolio-total-detail clearfix">
						<?php
						if (get_metabox("client_name") != "") {?>
						<div class="pull-left don"><?php echo wp_kses_post(get_metabox("client_name")); ?> <span class="">Donated </span></div>
						<?php
						}
						 if (get_metabox("project_date") != "") {?>
						<div class="pull-right goes"> <?php echo wp_kses_post(get_metabox("project_date")); ?> <span class="">To go</span></div>
						<?php } ?>
						
						</div>
						<div class="clearfix"></div>
						
						<?php
						$live_preview = jw_option('translate_livepreview') ? jw_option('translate_livepreview') : __('LIVE PREVIEW', 'designinvento');
						echo wp_kses_post(get_the_content());
						?>
						<div class="cause-read">
											
											<a href="<?php echo get_metabox('cause_donate')?>">Donate Now</a>	
						</div>
						
					</div>
					
				</div>
			<?php 
			if(!jw_option('port_related')) {
				related_causes();
			}?>
		</div>
		<div class="pull-right"> <?php get_template_part("sidebar");?></div>
    </div>
	
				
</article> 



<?php get_footer(); ?>