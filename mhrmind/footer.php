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

?>

	<!--  footer -->
    <footer>
      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <form class="news">
                <input class="newslatter" placeholder="Email" type="text" name=" Email">
                <button class="submit">Subscribe</button>
              </form>
            </div>
            <div class="col-md-12">
              <h2>Newsletter</h2>
              <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in  </span>
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
	          <p>Copyright © 2019 Design by <a href="https://html.design/">Free Html Templates </a></p>
	        </div>
	      </div>
	    </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
