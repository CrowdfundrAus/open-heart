<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?php wp_title('|', true, 'right'); ?></title>
        <?php favicon(); ?>
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/font-awesome/font-awesome-ie7.min.css"><![endif]-->
        <?php
        facebookOpenGraphMeta();
        global $jw_end ;
        $jw_start = $jw_end = '';
        wp_head();
        ?>
    </head>
    <body <?php body_class('loading') ?>>
		
		<?php
		$jw_address = jw_option('top_related');
		if($jw_address == 1){
		?>	
        <div id="one-page-home">
            <div class="jw-top-bar">
                <div class="container">
                    <div class="row">
                        <div class="span6 top-bar-address">
							<ul>
							 <li class="span-color"><i class="icon-envelope-alt"></i><span > Email:</span> <?php echo wp_kses_post(jw_option('top_address'));?></li>
							 <li class="span-color"><i class="icon-phone"></i>  <span>Phone:</span><?php echo wp_kses_post(jw_option('top_phone'));?></li>
							</ul>
						</div>
                        <div class="span6">
                            <ul class="top-icon pull-right">
                                <?php jw_social(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
       </div>
		<?php } ?>
		
        <!-- Start Header -->
      
		<?php get_template_part('headerstyle/header-style1'); ?>
	
		
        <!-- End Header -->
       
        <!-- Start Loading -->
        <section id="loading"></section>
        <!-- End   Loading -->
        <!-- Start Main -->
        <section id="main">
            <div <?php echo is_page() ? 'id="page"' : 'class="container"'; ?>>