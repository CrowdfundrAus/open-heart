</div>
</section>
<!-- End Main -->
<!-- Start Footer -->
<footer id="footer">
    <?php if (jw_option("footer_widget")) { ?>

        <!-- Start Container-->
        <div class="container">
            <div class="row">
                <?php
                $grid = jw_option('footer_layout') ? jw_option('footer_layout') : '12';
                $flogo= jw_option('footer_logo') ? jw_option('footer_logo') : '';					
                $i = 1;
                foreach (explode('-', $grid) as $g) {
                    echo '<div class="clearfix span' . $g . ' col-' . $i . '">';
                    dynamic_sidebar("footer-sidebar-$i");
                    echo '</div>';
                    $i++;
                }
				
                ?>
            </div>
			
        </div>
        <!-- End Container -->
    
    <?php } ?>
        <!-- End Footer -->
    <?php if(jw_option('footer_text')) { ?>
        <div id="bottom">
            <!-- Start Container -->
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <p class="copyright"><?php echo wp_kses_post(jw_option('copyright_text')); ?></p>
                    </div>
                </div>
            </div>
            <!-- End Container -->
			<?php } 
			$gotop = __('Scroll to top', 'designinvento');
			echo '<a id="scrollUp" title="'.$gotop.'"><i class=" icon-angle-up"></i></a>';
			?>
        </div>
    
</footer>

<?php wp_footer(); ?>
</body>
</html>