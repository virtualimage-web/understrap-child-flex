<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
  <div class="container">
    <div class="row">
      <div class="col col-12">

        <nav class="navbar navbar-dark navbar-expand-lg">

          <a href="<?php echo site_url()?>" class="navbar-brand custom-logo-link" rel="home">
            <img 
              src="<?php echo site_url()?>/wp-content/themes/understrap-child-flex/assets/images/logo.png" 
              alt="" />
          </a>

          <div class="understrap-child-flex-main-menu">
            <!--<div class="topbar">
              <div class="container">
                <ul class="social">
                  <?php //echo do_shortcode('[widget_area id="sm_menu_area"]'); ?>
                </ul>
              </div>
            </div>-->

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!-- The WordPress Menu goes here -->
            <?php wp_nav_menu(
                array(
                  'theme_location'  => 'primary',
                  'container_class' => 'collapse navbar-collapse',
                  'container_id'    => 'navbarNavDropdown',
                  'menu_class'      => 'navbar-nav mr-auto',
                  'fallback_cb'     => '',
                  'menu_id'         => 'main-menu',
                  'depth'           => 2,
                  'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                )
            ); ?>
          </div>

        </nav><!-- .site-navigation -->
      </div>
    </div>
  </div><!-- container end -->
</div><!-- #wrapper-navbar end -->


<?php 
	if ( !is_front_page() ) { 
    get_template_part( 'global-templates/subhero' ); 
	}
?>