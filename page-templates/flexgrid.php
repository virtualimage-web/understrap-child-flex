<?php
/**
 * Template Name: Flexgrid
 *
 *
 *
 * @package understrap
 */

get_header();

$post_id = $post->ID;
?>


<!--Content-->
<div id="content" role="main" class="wow fadeIn content-int">   
        <div class="subp-section <?php echo $css_class; ?> subp-section-page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-12" style="padding-bottom: 0px;">
                        <?php the_title( '<h1 class="entry-page-title">', '</h1>' ); ?>
                    </div><!--col-->
                </div><!--row-->
            </div>
        </div>

        <?php include 'flexgrid-inc.php'; ?>  
</div><!-- /#content -->

<?php get_footer();?>
