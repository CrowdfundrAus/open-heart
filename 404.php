<?php
get_header();
?>

<div class="row">
    <div class="span12">
        <section class="content">
            <div id="error404-container">
				<div class="forofor"><h1><?php _e("404 ", "designinvento");?></h1></div>
                <h4 class="error405"><?php _e("PAGE NOT FOUND", "designinvento");?></h4>
                <h3 class="error404"><?php _e("Please check the URL and try again!", "designinvento");?></h3>
                <p class="errorh2"><?php _e("Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.  ", "designinvento");?></p>
				
				

               
                <div class="error4button"><a href="<?php echo home_url(); ?>"  class="btn btn-border btn-small btn-hover2"><?php _e("Back to Home", "designinvento");?></a></div>
            </div>
        </section>
    </div>
</div>

<?php
get_footer();
?>