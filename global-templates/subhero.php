<?php

$innerhero = get_field('inner_hero');
$innerhero_image = $innerhero['url'];
if (empty($innerhero)) {
  $innerhero_image = get_site_url() . '/wp-content/themes/understrap-child-flex/assets/images/inner-hero.png';
}
//echo $innerhero_image;
?>


<!-- SUBHERO -->
<?php if (!empty($innerhero_image)) {?>
  <div class="holdHero" id="sub-hero">
    <section id="sub-hero" class="heroWrapper">  
      <div class="container-fluid subhero-section-image" style="background: url(<?php echo $innerhero_image;?>);">
        <div class="subhero-image-overlay">
          <!--
          <div class="subhero-box-overlay">
            <div class="container">
              <div class="row">
                <div class="col col-12" style="padding-top: 100px;">
                  <?php //echo $session_title; ?>
                </div>
              </div>
            </div>
          </div>
          -->
        </div>
      </div>
    </section>
  </div>
<?php } ?>


<?php if(function_exists('bcn_display')) { ?>
  <header class="entry-header">
    <div class="container">
      <div class="row">
        <div class="col col-12">
          <div class="breadcrumbs">
            <p>
              <?php bcn_display(); ?>
            </p>
          </div>  
        </div>        
      </div>
    </div>
  </header><!-- .entry-header -->
<?php } ?>

