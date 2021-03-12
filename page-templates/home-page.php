<?php
/**
 * Template Name: Home Page Template
 *
 * Template for displaying the home page.
 *
 * @package understrap
 */
?>

<?php get_header();?> 


<!-- HERO -->
<?php $hero = get_field('hero');?>
<section id="home-hero">
    <?php while (have_rows('hero')) {?>
        <?php the_row();?>
        <?php $h_image = get_sub_field('image');
        $h_image_url = $h_image['url'] ; 
        $h_image_alt = $h_image['alt'] ; 
        /*$h_image_mobile = get_sub_field('image_mobile'); 
        $h_image_mobile_url = $h_image_mobile['url'] ;*/

        $h_image_html = imgWebp($h_image_url, $h_image_alt/*, $h_image_mobile_url*/);?>

        <?php $h_title = get_sub_field('content');?>
        <?php while (have_rows('content')) {?>
            <?php the_row();?>
            <?php $h_title_1 = get_sub_field('title_line_1');?>
            <?php $h_title_2 = get_sub_field('title_line_2');?>
            <?php $h_text = get_sub_field('text');?>
            <?php $h_link = get_sub_field('link');?>
        <?php } ?>

        <?php if ( !empty($h_link) ) { ?> 
        <a href="<?php echo $h_link; ?>">
        <?php } ?>
            <div class="heroWrapper">  
                <?php echo $h_image_html; ?>

                <div class="container">
                    <div class="row">
                        <div class="col col-12">
                            <div class="hero-content-overlay">
                                <h1 class="hero-title">
                                    <span class="title-line title-line1"><?php echo $h_title_1; ?></span>
                                    <span class="title-line title-line2"><?php echo $h_title_2; ?></span>
                                </h1>
                                <div class="hero-text"><?php echo $h_text; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php if ( !empty($h_link) ) { ?> 
        </a>
        <?php } ?>
    <?php } ?>
</section>
<!-- // HERO -->




<div id="content" role="main" class="wow fadeIn content-int">  
    <?php include 'flexgrid-inc.php'; ?> 
</div>


<div class="clearfix"></div>

<?php get_footer();?>



