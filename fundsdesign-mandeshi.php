<?php
/**
 * The template for displaying all pages.
 * Template Name: Funds Mann Deshi
 * @package northarc_capital
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post();
$featureimg= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$custom=get_post_custom($post->ID);
$page_title = $post->post_name;
?>

<section class="inner-banner">
   <div class="banner-content">
   <div class="breadcrumb"><?php custom_breadcrumbs();?></div>
  <h2 class="text-center"> <?php the_title();?></h2>
   </div>
</section>


<section class="fundscontentrow fundsfirsttemp manndesitemp">
  <div class="mantoptext">
     <div class="container">
      <?php the_field('top_text');?>
     </div>
  </div>
  <div class="mandestopsec">
     <div class="col-sm-12 col-md-5 col-xs-12 pull-right no-padding">
       <div class="mandeslogo">
          <div class="logomandes wow animated fadeIn" data-wow-delay="1.5s"><img src="<?php the_field('first_section_content');?>"/></div>
          <img src="<?php echo $featureimg;?>" class="wow animated fadeInRight" data-wow-delay="0.5s" />
       </div>
     </div>
     <div class="col-sm-12 col-md-7 col-xs-12">
       <div class="manndeshitext wow animated fadeIn" data-wow-delay="1s">
          <?php the_content();?>
       </div>
     </div>
  </div>

  <div class="debtsecurity">
     <div class="col-sm-12 col-md-6 col-lg-5 col-xs-12 no-padding">
        <div class="mandebtext">
          <div class="debtmantext wow animated fadeIn" data-wow-delay="1s"> 
            <div class="debtmantextinner"><?php the_field('debt_image_text');?></div>              
          </div>
          <img class="wow animated fadeInLeft" data-wow-delay="0.5s" src="<?php the_field('debt_image');?>"/>
       </div>
     </div>
     <div class="col-sm-12 col-md-6  col-lg-7 col-xs-12">
        <div class="debtsectext">
             <h3><?php the_field('debt_title');?></h3>
             <?php if( have_rows('debt_row') ):?>
              <?php while ( have_rows('debt_row') ) : the_row(); ?>
                   <div class="fundsmimgtab debtimgrow">
                      <div class="fundsmimg">  
                          <img src="<?php the_sub_field('icon');?>"/>
                      </div>
                      <div class="fundimgtext">
                           <h5><?php the_sub_field('title');?></h5>
                           <p><?php the_sub_field('description');?></p>                              
                      </div>
                   </div>                 
              <?php endwhile; endif;?> 
        </div>
     </div>

  </div>


  <div class="fundstop2sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-5 col-xs-12 wow animated fadeIn" data-wow-delay="1.3s">
                       
                <?php if( have_rows('strategy_content') ):?>
                 <div class="lastsecboxes">
                 <?php $i=1;
                  while ( have_rows('strategy_content') ) : the_row(); ?>
                      <div class="col-sm-12 col-xs-12 wow animated fadeIn" <?php if($i==1):?> data-wow-delay="0.5s" <?php elseif($i==2):?> data-wow-delay="0.8s" <?php else:?> data-wow-delay="1.1s" <?php endif;?>>
                         <div class="fundsmimgtab">
                            <div class="fundsmimg">  
                                <img src="<?php the_sub_field('icon');?>"/>
                            </div>
                            <div class="fundimgtext">
                                 <h5><?php the_sub_field('title');?></h5>
                                 <?php the_sub_field('short_text');?>                              
                            </div>
                         </div>

                      </div>
                <?php  $i++; endwhile;?>
                  </div> 
              <?php endif;?> 
                         
        </div>
        <div class="col-sm-6 col-md-7 col-xs-12 wow animated fadeIn" data-wow-delay="0.5s">
          <div class="righttab_cont toprightabcon objectivetable">
          <?php the_field('right_tab_text');?>
          </div> 
        </div>      
      </div>
    </div>
   </div>
</section>




<?php endwhile; // end of the loop. ?>	
<?php get_footer(); ?>

