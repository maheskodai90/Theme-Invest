<?php
/**
 * The template for displaying all pages.
 * Template Name: Funds Modal 1 Objective Page
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


<section class="fundscontentrow fundsfirsttemp fundobjtext">
  <div class="fundstop1sec topcontaintext">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-xs-12 wow animated fadeIn" data-wow-delay="0.5s">
         <?php the_field('top_text');?>
        </div>
      </div>
    </div>
  </div>
  <div class="fundstop2sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-5 col-xs-12 wow animated fadeIn" data-wow-delay="1.3s">
           <?php the_content();?>             
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

<?php if( have_rows('our_expertise') ):?>
<section class="objectiveextab">
  <div class="container">
     <h3><?php the_field('our_expertise_text');?></h3>
     <div class="expertiserow">
      <?php $i=1; while ( have_rows('our_expertise') ) : the_row(); ?>
        <div class="col-sm-4 col-xs-12">
            <div class="imgobjfull">
                <div class="imgobjdiv"> <img src="<?php the_sub_field('Icon');?>"></div>
                <p><?php the_sub_field('description');?></p>
            </div>
        </div>
      <?php  $i++; endwhile;?>
     </div>
  </div>
</section>
<?php endif;?> 
<section class="contactband">
   <div class="container">
      <div class="contbandimg">
          <div class="tablecontact">
            <div class="tablecontd">
             <?php the_field('contact_bottom_text');?>
             </div>
             <div class="tableconbutton">
                <a class="site_btn" href="<?php bloginfo('url');?>/contact-us">Contact Us</a>
             </div>
          </div>
      </div>
   </div>
</section>


<?php endwhile; // end of the loop. ?>	
<?php get_footer(); ?>

