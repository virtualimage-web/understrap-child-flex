<?php 
            $i = 0;
        ?>
        <?php //while(the_flexible_field("grid")): ?>
        <?php while ( have_rows('grid') ) : the_row(); ?>
        
                <?php if(get_row_layout() == "full_width_row"): ?>
                <!--Full Width Row - START-->
                    <?php $css_class = get_sub_field('css_class');?>
                    <?php $section_id = get_sub_field('section_id');?>
                    <div class="subp-section <?php echo $css_class; ?>" <?php if ($section_id) { echo 'id= "' . $section_id . '"'; } ?> >
                                <div class="container">
                                    <div class="row">
                                        <div class="col col-12 col-full-width">
                                            <?php the_sub_field('full_width_column') ?>
                                        </div><!--col-->
                                    </div><!--row-->
                                </div>
                    </div>
                <!--Full Width Row - END-->
                <?php endif; ?>
                
                

                <?php if(get_row_layout() == "two_column_row"): ?>  
                <!--Two Column Row - START-->  
                    <?php $css_class = get_sub_field('css_class');?>
                    <?php $section_id = get_sub_field('section_id');?>
                    <?php $fc = get_sub_field('first_column');?>
                    <?php $sc = get_sub_field('second_column');?>
                    <div class="subp-section <?php echo $css_class; ?>" <?php if ($section_id) { echo 'id= "' . $section_id . '"'; } ?> >
                                <div class="container">
                                    <div class="row">             
                                        <div class="col section-col-extra-pad col-12 col-lg-6">
                                            <?php the_sub_field('first_column') ?>                       
                                        </div><!--col-->
                                
                                        <div class="col section-col-extra-pad col-12 col-lg-6">
                                            <?php the_sub_field('second_column') ?>                     
                                        </div><!--col-->
                                    </div><!--row-->
                                </div>
                    </div>
                <!--Two Column Row - END-->
                <?php endif; ?> 
                  
                <?php if(get_row_layout() == "three_column_row"): ?>  
                <!--Three Column Row - START-->
                    <?php $css_class = get_sub_field('css_class');?>
                    <?php $section_id = get_sub_field('section_id');?>
                    <div class="subp-section <?php echo $css_class; ?>" <?php if ($section_id) { echo 'id= "' . $section_id . '"'; } ?> >
                                <div class="container">
                                    <div class="row">    
                                        <div class="col col-12 col-lg-4">
                                            <?php the_sub_field('first_column') ?>                       
                                        </div><!--col-->
                            
                                        <div class="col col-12 col-lg-4">
                                            <?php the_sub_field('second_column') ?>                     
                                        </div><!--col-->

                                        <div class="col col-12 col-lg-4">
                                            <?php the_sub_field('third_column') ?>                     
                                        </div><!--col-->
                                    </div><!--row-->
                                </div>
                    </div>
                <!--Three Column Row - END--> 
                <?php endif; ?>    
                
                <?php if(get_row_layout() == "four_column_row"): ?>
                <!--Four Column Row - START-->
                    <?php $css_class = get_sub_field('css_class');?>
                    <?php $section_id = get_sub_field('section_id');?>
                    <div class="subp-section <?php echo $css_class; ?>" <?php if ($section_id) { echo 'id= "' . $section_id . '"'; } ?> >
                                <div class="container">
                                    <div class="row">
                                        <div class="col col-12 col-lg-3">                                  
                                            <?php the_sub_field('first_column') ?>                       
                                        </div><!--col-->
                                
                                        <div class="col col-12 col-lg-3">
                                            <?php the_sub_field('second_column') ?>                     
                                        </div><!--col-->

                                        <div class="col col-12 col-lg-3">
                                            <?php the_sub_field('third_column') ?>                     
                                        </div><!--col-->

                                        <div class="col col-12 col-lg-3">
                                            <?php the_sub_field('fourth_column') ?>                     
                                        </div><!--col-->
                                    </div><!--row-->
                                </div>
                    </div>
                <!--Four Column Row - END-->
                <?php endif; ?> 
                 

                 
                <?php if(get_row_layout() == "nine_three_row"): ?>
                <!--Nine / Three Column Row - START-->
                    <?php $css_class = get_sub_field('css_class');?>
                    <?php $section_id = get_sub_field('section_id');?>
                    <div class="subp-section <?php echo $css_class; ?>" <?php if ($section_id) { echo 'id= "' . $section_id . '"'; } ?> >
                                <div class="container">
                                    <div class="row">
                                        <div class="col section-col-extra-pad col-12 col-lg-9">
                                            <?php the_sub_field('first_column') ?>                       
                                        </div><!--col-->
                    
                                        <div class="col section-col-extra-pad col-12 col-lg-3">
                                            <?php the_sub_field('second_column') ?>                     
                                        </div><!--col-->
                                    </div><!--row-->
                                </div>
                    </div>
                <!--Nine / Three Column Row - END-->
                <?php endif; ?>   
                
                <?php if(get_row_layout() == "three_nine_row"): ?>
                <!--Three / Nine Column Row - START-->
                    <?php $css_class = get_sub_field('css_class');?>
                    <?php $section_id = get_sub_field('section_id');?>
                    <div class="subp-section <?php echo $css_class; ?>" <?php if ($section_id) { echo 'id= "' . $section_id . '"'; } ?> >
                                <div class="container">
                                    <div class="row">     
                                        <div class="col section-col-extra-pad col-12 col-lg-3">
                                            <?php the_sub_field('first_column') ?>                       
                                        </div><!--col-->
                    
                                        <div class="col section-col-extra-pad col-12 col-lg-9">
                                            <?php the_sub_field('second_column') ?>                     
                                        </div><!--col-->
                                    </div><!--row-->
                                </div>
                    </div>
                <!--Three / Nine Column Row - END-->
                <?php endif; ?>
                
            
                
                <?php if(get_row_layout() == "eight_four_row"): ?> 
                <!--Eight / Four Column Row - START-->
                    <?php $css_class = get_sub_field('css_class');?>
                    <?php $section_id = get_sub_field('section_id');?>
                    <div class="subp-section <?php echo $css_class; ?>" <?php if ($section_id) { echo 'id= "' . $section_id . '"'; } ?> >
                                <div class="container">
                                    <div class="row">     
                                        <div class="col section-col-extra-pad col-12 col-lg-8">
                                            <?php the_sub_field('first_column') ?>                       
                                        </div><!--col-->
                    
                                        <div class="col section-col-extra-pad col-12 col-lg-4">
                                            <?php the_sub_field('second_column') ?>                     
                                        </div><!--col-->
                                    </div><!--row-->
                                </div>
                    </div>
                <!--Eight / Four Column Row - END-->
                <?php endif; ?>   
                
                <?php if(get_row_layout() == "four_eight_row"): ?>
                <!--Four / Eight Column Row - START-->
                    <?php $css_class = get_sub_field('css_class');?>
                    <?php $section_id = get_sub_field('section_id');?>
                    <div class="subp-section <?php echo $css_class; ?>" <?php if ($section_id) { echo 'id= "' . $section_id . '"'; } ?> >
                                <div class="container">
                                    <div class="row">
                                        <div class="col section-col-extra-pad col-12 col-lg-4">
                                            <?php the_sub_field('first_column') ?>                       
                                        </div><!--col-->
                    
                                        <div class="col section-col-extra-pad col-12 col-lg-8">
                                            <?php the_sub_field('second_column') ?>                     
                                        </div><!--col-->
                                    </div><!--row-->
                                </div>
                    </div>
                <!--Four / Eight Column Row - END-->
                <?php endif; ?>    
                

                
                <?php if(get_row_layout() == "seven_five_row"): ?> 
                <!--Seven / Five Column Row - START-->
                    <?php $css_class = get_sub_field('css_class');?>
                    <?php $section_id = get_sub_field('section_id');?>
                    <div class="subp-section <?php echo $css_class; ?>" <?php if ($section_id) { echo 'id= "' . $section_id . '"'; } ?> >
                                <div class="container">
                                    <div class="row">     
                                        <div class="col section-col-extra-pad col-12 col-lg-7">
                                            <?php the_sub_field('first_column') ?>                       
                                        </div><!--col-->
                    
                                        <div class="col section-col-extra-pad col-12 col-lg-5">
                                            <?php the_sub_field('second_column') ?>                     
                                        </div><!--col-->
                                    </div><!--row-->
                                </div>
                    </div>
                <!--Seven / Five Column Row - END-->
                <?php endif; ?>   
                
                <?php if(get_row_layout() == "five_seven_row"): ?> 
                <!--Five / Seven Column Row - START-->
                    <?php $css_class = get_sub_field('css_class');?>
                    <?php $section_id = get_sub_field('section_id');?>
                    <div class="subp-section <?php echo $css_class; ?>" <?php if ($section_id) { echo 'id= "' . $section_id . '"'; } ?> >
                                <div class="container">
                                    <div class="row">     
                                        <div class="col section-col-extra-pad col-12 col-lg-5">
                                            <?php the_sub_field('first_column') ?>                       
                                        </div><!--col-->
                    
                                        <div class="col section-col-extra-pad col-12 col-lg-7">
                                            <?php the_sub_field('second_column') ?>                     
                                        </div><!--col-->
                                    </div><!--row-->
                                </div>
                    </div>
                <!--Five / Seven Column Row - END-->
                <?php endif; ?>  
        <?php endwhile; ?>


        <!-- CTA -->
        <?php 
        $cr = get_field('cta_row');
        if (!empty($cr)) {
            while (have_rows('cta_row')) {
                the_row();
                $cta_options = get_sub_field('cta_options'); ?>

                <?php //print_r($cta_options);
                foreach ($cta_options as $cta_opt) {
                    switch ($cta_opt) {
                        case strpos($cta_opt, 'opt1'):
                            include 'inc-subp-cta.php';
                            break;
                    }
                } ?>
            <?php } ?>
        <?php } ?>