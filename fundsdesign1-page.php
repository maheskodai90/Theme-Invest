<?php
/**
 * The template for displaying all pages.
 * Template Name: Funds Modal 1 Page
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


<section class="fundscontentrow fundsfirsttemp">
  <div class="fundstop1sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-5 col-xs-12 wow animated fadeIn" data-wow-delay="0.5s">
          <?php the_content();?>
        </div>
         <div class="col-sm-6 col-md-7 col-xs-12 wow animated fadeIn" data-wow-delay="0.5s">
            <div class="righttab_cont toprightabcon">
             <?php the_field('right_tab_content');?>
           </div> 
        </div>
      </div>
    </div>
  </div>
  <div class="fundstop2sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-5 col-xs-12 wow animated fadeIn" data-wow-delay="1.3s">
           <?php the_field('2nd_content');?>     
        </div>      
      </div>
       <div class="righttab_cont mobilerighttab">
         <?php the_field('right_tab_content');?>
       </div>  
    </div>
   </div>
</section>

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

