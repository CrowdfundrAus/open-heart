<?php
	get_header();
?>
<div class="row">
    <section class="content">
                 <div class="span8">
	<?php

    while (have_posts()) : the_post();
        $format = get_post_format() == "" ? "standard" : get_post_format();
        $featured = true;
        if (!has_post_thumbnail($post->ID)) {
            if (in_array($format, array('aside', 'chat', 'standard')))
                $featured = false;
        }

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
            <?php 
    endwhile;

     pagination();

    wp_reset_query();
?>
</div>

<?php
	get_template_part("sidebar");
?>
    </section>
</div>

	
<?php
	get_footer();
?>