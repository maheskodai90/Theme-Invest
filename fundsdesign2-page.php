<?php
/**
 * The template for displaying all pages.
 * Template Name: Funds Modal 2 Page
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


<section class="fundscontentrow fundscontentnew">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-xs-12 pull-right wow animated fadeIn" data-wow-delay="0.5s">
        <img src="<?php echo $featureimg;?>"/>        
      </div>
      <div class="col-sm-6 col-xs-12 wow animated fadeIn" data-wow-delay="1s">
        <?php the_content();?>
      </div>
    </div>   
  </div>
</section>

<section class="fundbanner" style="background-image: url(<?php the_field('banner_image');?>);">
  <div class="container">
      <div class="fundtext wow animated fadeInUp" data-wow-delay="0.5s">
        <?php the_field('banner_text');?>
      </div>
      <div class="sourcetext"><?php the_field('source_text');?></div>
  </div>
</section>

<section class="fundlastabove">
  <div class="container">
    <div class="lastsecfull wow animated fadeIn" data-wow-delay="0.5s">
        <div class="lastsecfullinner"><?php the_field('last_sec_content');?></div>
    </div>
    <div class="lastsecboxes">
        <h3><?php the_field('last_box_title');?></h3>
        <?php if( have_rows('last_box_content') ):
          $i=1;
          while ( have_rows('last_box_content') ) : the_row(); ?>
              <div class="col-sm-4 col-xs-12 wow animated fadeIn" <?php if($i==1):?> data-wow-delay="0.5s" <?php elseif($i==2):?> data-wow-delay="0.8s" <?php else:?> data-wow-delay="1.1s" <?php endif;?>>
                 <div class="fundsmimgtab">
                    <div class="fundsmimg">  
                        <img src="<?php the_sub_field('icon');?>"/>
                    </div>
                 </div>
                 <h5><?php the_sub_field('title');?></h5>
                 <?php the_sub_field('short_text');?>
              </div>
        <?php  $i++; endwhile; endif;?> 
    </div>
  </div>
</section>
<?php endwhile; // end of the loop. ?>	
<?php get_footer(); ?>

