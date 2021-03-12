<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>


<div class="wrapper" id="error-404-wrapper">
  <div id="content" role="main" class="wow fadeIn content-int" tabindex="-1">
    <div class="subp-section">
    <div class="container">

    <header class="entry-header">
      <!-- Uncomment If There Are Breadcrumbs 
      <div class="breadcrumbs">
        <?php //if(function_exists('bcn_display')) {
          //bcn_display();
        //} ?> 
      </div> 
      -->

      <h1>Page Not Found</h1>    
	  </header><!-- .entry-header -->

      <div class="row">
        <div class="col-12 col-lg-9 col-xl-7 content-area" id="primary">
          <main class="site-main" id="main">
            <section class="error-404 not-found">

              <div class="page-content">
                <p><?php // esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'understrap' ); ?></p>

                <?php get_search_form(); ?>
                <br /><br /><br /><br /><br /><br />
              </div><!-- .page-content -->

            </section><!-- .error-404 -->
          </main><!-- #main -->
        </div><!-- #primary -->
      </div><!-- .row -->

    </div><!-- container -->
    </div>
  </div><!-- #content -->
</div><!-- #error-404-wrapper -->

<?php get_footer();
