<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MhrMind
 */

$newsletter_title = mhrmind_option('newsletter_title');
$newsletter_desc = mhrmind_option('newsletter_desc');
$newsletter_shortcode = mhrmind_option('newsletter_shortcode');
$copyright_text = mhrmind_option('copyright_text'); ?>

	<!--  footer -->
    <footer>
      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <?php echo do_shortcode($newsletter_shortcode); ?>
            </div>
            <div class="col-md-12">
              <h2><?php echo wp_kses_post( $newsletter_title ); ?></h2>
              <span><?php echo wp_kses_post( $newsletter_desc ); ?></span>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
              <div class="row">
                  <?php dynamic_sidebar('sidebar-1'); ?>
              </div>
            </div>
          </div>
        </div>
	      <div class="copyright">
	        <div class="container">
	          <p><?php echo wp_kses_post( $copyright_text ); ?></p>
	        </div>
	      </div>
	    </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
