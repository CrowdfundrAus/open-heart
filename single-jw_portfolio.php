<?php get_header(); ?>
<?php the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-portfolio');?>>
    <div class="row">
        <div class="span8 port">
		
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
		
        
        
			<h3 style="margin-top:30px;border-bottom:1px solid #f1f1f1;padding-bottom:20px;">PROJECT DESCRIPTION</h3>
            <?php
			
            //echo do_shortcode('[jw_item_title title="'.$project_desc.'"]');
            echo wp_kses_post(get_the_content());
			?>
			
           
            </div>   
			<div class="pull-right"> <?php get_template_part("sidebar");?></div>
    </div>
	
				
</article> 

<?php 
if(!jw_option('port_related')) {
    related_portfolios();
}?>

<?php get_footer(); ?>