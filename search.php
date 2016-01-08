<?php get_header(); ?>

<div class="row">
    <div class="span8">
                <?php
				
						$nofeatured = true;
						$layout = 'standard';
					   
					
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
					echo esc_attr($layout) != 'standard' ? "</div></div>" : "";
					if(isset($jw_options['pagination'])){
						if($jw_options['pagination']=="simple"){
							pagination();
						}elseif($jw_options['pagination']=="infinite"){
							infinite();
						}
					}else{
						
							pagination();
						
					}
					wp_reset_query();
		}else { ?>
                            <div id="error404-container">
                                <h3 class="error404"><?php _e("Sorry, but nothing matched your search criteria. Please try again with some different keywords.", "designinvento");?></h3>
                                <?php get_search_form(); ?>
                                <br/>

                                <div class="error-404-child"></div>

                                <div class="jw-404-error"><p><?php _e("For best search results, mind the following suggestions:", "designinvento");?></p>
                                    <ul class="borderlist">
                                        <li><?php _e("Always double check your spelling.", "designinvento");?></li>
                                        <li><?php _e("Try similar keywords, for example: tablet instead of laptop.", "designinvento");?></li>
                                        <li><?php _e("Try using more than one keyword.", "designinvento");?></li>
                                    </ul>
                                </div>
                            </div>
                  <?php  }
                ?>
    </div>
    <?php get_template_part("sidebar"); ?>
</div>

<?php get_footer(); ?>