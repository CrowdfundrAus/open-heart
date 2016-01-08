<?php get_header();?>
<div class="row">
 <div class="span8">
<?php
global $jw_options, $jw_isArchive;
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

		$query = Array(
            'posts_per_page' => 4,
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
        $featured = true;
        if (!has_post_thumbnail($post->ID)) {
            if (in_array($format, array('aside', 'chat', 'standard')))
                $featured = false;
        }

        if ($layout == 'standard') {
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class("loop"); ?>>
            <?php if ($format == 'link' || $format == 'quote') { ?>
                    <div class="loop-block blog-block">                    
                        <div class="loop-media">
                            <div class="loop-format">
                                <span class="post-format <?php echo esc_attr($format); ?>"></span>
                            </div>
                    <?php call_user_func('format_' . $format); ?>
							
                        </div>
                    </div><?php
                } else {
                    ?>
                        
                        <div class="loop-media">
                        <?php call_user_func('format_' . $format); ?>
						</div>
                
                     <div class="loop-block blog-main-loop">						
											<h2 class="loop-title blog-loop-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>					
											<div class="meta-containers">
												<div class="carousel-meta clearfix blog-carsolmeta">
													<div class="one-auther"><?php the_time(' F jS, Y') ?><span style="margin-left:10px;">by <?php the_author_posts_link(); ?> </div>
													<div class="comment-count"><?php echo comment_count_isotop(); ?></div>
													
												</div>							
											</div>  
											<div class="loop-content clearfix" style="margin-bottom:30px;">
												<p><?php $content = get_the_content();
																	$content = strip_tags($content);
																	echo substr($content, 0, 139); ?></p>
											</div>
											 <a href="<?php the_permalink(); ?>" class="more">Read More</a>
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
</div>
<?php get_template_part("sidebar");?>
</div>
<?php get_footer();?>