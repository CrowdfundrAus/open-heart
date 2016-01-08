<?php
global $jw_options, $jw_isArchive;
$block = isset($jw_options['block']) ? intval($jw_options['block']) : 1;
$layout = !empty($jw_options['layout']) ? $jw_options['layout'] : 'standard';
$show_pagination = isset($jw_options['show_pagination']) ? $jw_options['show_pagination'] : true;
if (!empty($jw_options['more_text'])) {
    $readMore = $jw_options['more_text'];
} else {
    $readMore = jw_option('translate_readmore') ? jw_option('translate_readmore') : __('Read More', 'designinvento');
}

if ($jw_isArchive || is_tag() || is_search()) {
    $nofeatured = true;
    $layout = 'standard';
   
}


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

            
            <?php } else {
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class("loop $class"); ?>>
            <?php if ($format == 'link' || $format == 'quote') { ?>                
                    <div class="loop-media">
                        <div class="loop-format">
                            <span class="post-format <?php echo esc_attr($format); ?>"></span>
                        </div>
                    <?php call_user_func('format_' . $format); ?>
                    </div>
                    <?php
                } else {
                    ?>

                        <?php if (!isset($nofeatured) && $featured) { ?>
                        <div class="loop-media">
                        <?php call_user_func('format_' . $format); ?>
						<div class="image-overlay">
							<a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>"></a>		
						</div>
                        </div>
                <?php } ?>
                    <div class="loop-block">   
						<h3 class="loop-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						
                        <div class="meta-containers">
                            <div class="carousel-meta clearfix">
                                <div class="one-auther"><?php the_time(' F jS, Y') ?></div>
                                <div class="one-auther">By: <?php the_author(); ?></div>
                                <div class="comment-count"><?php echo comment_count_isotop(); ?></div>
                            </div>							
                        </div>              
                       
                        <div class="loop-content clearfix" style="padding-right:15px;">
							<p><?php $content = get_the_content();
												$content = strip_tags($content);
												echo substr($content, 0, 139); ?></p>
                        </div>
                        
                        <div class="read-more-container">						
                            <a href="<?php the_permalink(); ?>" class="more-link"><?php echo apply_filters("widget_title", $readMore); ?></a>
                        </div>
                        
                    </div>
            <?php } ?>
            </article>

            <?php
        }
    endwhile;
    echo esc_attr($layout) != 'standard' ? "</div></div>" : "";
    if(isset($jw_options['pagination'])){
        if($jw_options['pagination']=="simple"){
            pagination();
        }elseif($jw_options['pagination']=="infinite"){
            infinite();
        }
    }else{
        if ($show_pagination) {
            pagination();
        }
    }
    wp_reset_query();
}