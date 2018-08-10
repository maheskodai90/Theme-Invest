<?php
/**
 * The template for displaying all pages.
 * Template Name: Board of Directors
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
  <h2 class="text-center"> <?php the_field('banner-title')?></h2>
   </div>
  </section>
  
<div class="inner-content">
  <section class="directors">
  <div class="container"><div class="row"><div class="col-sm-12"><?php if( have_rows('board_directors') ):	
	 while ( have_rows('board_directors') ) : the_row(); ?>		
  <div class="dir_sec">
	  <div class="dir_sec_img"><div class="directors_bg"><img class="wow zoomIn" src="<?php echo the_sub_field ('director_image')?>" alt=""></div></div><div class="dir_sec_text"><h1><?php echo the_sub_field('director_name'); ?></h1>
   <span><?php echo the_sub_field ('designation')?></span>
   <?php echo the_sub_field ('message')?></div></div>
   <?php endwhile; 
		   endif; ?>	</div></div></div>
  </section>

</div>
<?php endwhile; // end of the loop. ?>	
<?php get_footer(); ?>
