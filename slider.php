<?php
if (is_page()) {
    if (get_metabox("header_type") == "slider") {
        ?>
        <section id="slider" class="header-options slider">
            <?php echo do_shortcode(get_metabox("slider_id")); ?>
        </section>
        <?php
    } else{
        get_template_part('page', 'title');
    }
} else {
    get_template_part('page', 'title');
}?>