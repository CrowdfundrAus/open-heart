<?php get_header(); ?>
<?php
the_post();
$col = "span8";
if (get_metabox("layout") == "full") {
    $col = "span12";
}
$klas = get_metabox("layout") ? get_metabox("layout") : 'right';
?>
<div class="row">
    <div class="">
        <div class="<?php
			echo esc_attr($col);
			echo " content-" . $klas;
			?>">

				<?php
				$feature = false;
				$class = "single";
				if (get_metabox("feature_show") == "true") {
					$feature = true;
				} else if (get_metabox("feature_show") != "false") {
					if (jw_option("feature_show")) {
						$feature = true;
					}
				}

				$format_options = get_post_meta($post->ID, 'themewave_post_format', true);
				$format = get_post_format() == "" ? "standard" : get_post_format();
				if ($format == "status") {
					if (preg_match("#http://instagr(\.am|am\.com)/p/.*#i", $format_options["status_url"]))
						$class .= " instagram-post";
					elseif (preg_match("|https?://(www\.)?twitter\.com/(#!/)?@?([^/]*)|", $format_options["status_url"]))
						$class .= " twitter-post";
				}
				?>
				<article <?php post_class($class); ?>>
					<?php
					if ($feature) {
						echo '<div class="loop-media">';
						call_user_func('format_' . $format, $format_options);
						?>
						
							
						
						<?php
						echo '</div>';
					}
					?>
					<div class="content-block">
						<div class="loop-format">
							<span class="post-format <?php echo esc_attr($format); ?>"></span>
						</div>
						
						<h1 class="single-title single-post-title"><?php the_title(); ?></h1>
						<?php if(jw_option('meta_on_single')) { ?>
						   <div class="meta-containers">
								<div class="carousel-meta clearfix blog-carsolmeta">
									<div class="one-auther"><?php the_time(' F jS, Y') ?><span style="margin-left:10px;">by <?php the_author(); ?> </div>
									<div class="comment-count"><i class="icon-comment"></i><?php echo comment_count_isotop(); ?></div>
								</div>							
							</div>  
						<?php } ?>
						
						<?php the_content(); ?>               
						<?php wp_link_pages(); ?>   
						<div class="clear"></div>                
							<div class="meta-container tag clearfix">
								<div class="loop-meta">
									<?php if (get_the_tag_list()){ ?>
									<div class="loop-meta tag">
									<i class=" icon-tags"></i>  <?php echo get_the_tag_list(__("Tags : ", "designinvento"), ', ', ''); ?>  
									</div>
									<?php } ?> 
									<?php echo jw_social_share(); ?>							
								</div>
								
							</div>
										
					</div>
					
						<?php about_author(); ?>
					
					<?php comments_template('', true); ?>
						   
				</article>
			</div>
			
    </div>
	<?php get_template_part("sidebar");?>
    
</div>

<?php get_footer(); ?>