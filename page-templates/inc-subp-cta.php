<!-- SUBP CTA -->
<?php $cta_forms = get_field('cta_forms', 2);?>
<?php while (have_rows('cta_forms', 2)) { ?>
  <?php the_row();?>
  <?php $cta_forms_col1 = get_sub_field('col_1');?>
  <?php $cta_forms_col2 = get_sub_field('col_2');?>

  <?php if (!empty($cta_forms)) {?>
    <section id="subpage-cta" class="subp-section section-dark-bg"> 
      <div class="container">
        <div class="row">
          <div class="section-col section-col-extra-pad col col-12 col-lg-6">
            <?php echo $cta_forms_col1; ?>
          </div>

          <div class="section-col section-col-extra-pad col col-12 col-lg-6">
            <?php echo $cta_forms_col2; ?>
          </div>
    </section>
  <?php } ?>
<?php } ?>
<!-- // CTA FORMS -->