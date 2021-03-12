<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<footer>
  <div class="wrapper" id="wrapper-footer">
	  <div class="container">
      <div class="row">
        <div class="col col-12 col-lg-6">
          <p>
            <ul class="social">
              <li><a href="https://www.linkedin.com/in/jessica-metcalfe-60293a148/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="https://www.instagram.com/drjessicametcalfe/" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>
            <a href="<?php echo site_url()?>" class="logo-footer" rel="home">
              <span class="jem-logo">Dr. Jessica E. Metcalfe</span>
            </a>
          </p>
          <p>
            <a href="javascript:location='mailto:\u0069\u006e\u0066\u006f\u0040\u0064\u0072\u006a\u0065\u0073\u0073\u0069\u0063\u0061\u006d\u0065\u0074\u0063\u0061\u006c\u0066\u0065\u002e\u0063\u006f\u006d';void 0"><script type="text/javascript">document.write('\u0069\u006e\u0066\u006f\u0040\u0064\u0072\u006a\u0065\u0073\u0073\u0069\u0063\u0061\u006d\u0065\u0074\u0063\u0061\u006c\u0066\u0065\u002e\u0063\u006f\u006d')</script></a><br />
            © <?php echo date("Y"); ?> The Alchemist Dentist<br />
            All Rights Reserved.
          </p>
        </div>

        <div class="col col-12 col-lg-6 col-right">
          <p>
            <a href="/privacy-policy/">Privacy Policy</a><br />
            <a href="/terms-and-conditions/">Terms and Conditions</a><br />
            <a href="https://virtualimage.ca" target="_blank" rel="nofollow" class="powered-by">
              <img src="<?php echo get_site_url(); ?>/wp-content/themes/understrap-child-flex/assets/images/icons/vi-logo-dark-bg.png" alt="Powered by Virtual Image" />
            </a>
          </p>
        </div>
      </div><!-- row end -->
    </div><!-- container end -->
  </div><!-- wrapper end -->
</footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

