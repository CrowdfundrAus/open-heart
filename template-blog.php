<?php
/**
 * Template name: Blog
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Open-heart wordpress charity theme
 * @since Open-heart 1.0
 */
get_header();
?>
<div class="container">
<div class="row" id="main-section-one">
    <div class="span8">
        <section class="content">
                <?php get_template_part("blog");?>
        </section>
    </div>
    <?php get_template_part("sidebar");?>
</div>
</div>

<?php get_footer();?>