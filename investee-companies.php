<?php
/**
 * The template for displaying all pages.
 * Template Name: Investee Companies
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
   <div class="breadcrumb"><!--<ul><li>Home</li><li>What we do</li><li>For Investee Companies</li></ul>--><?php custom_breadcrumbs();?></div>
  <h2 class="text-center"> <?php the_field('banner-title')?></h2>
  <p class="text-center"><?php the_field('banner-content')?></p>
   </div>
  </section>

  


  <section class="asset-class">
     <div class="container">
        <div class="row">
            <h3 class="text-center"><?php the_field('title')?></h3>
            <?php
        if( have_rows('assets') ):
        while ( have_rows('assets') ) : the_row(); ?>
            <div class="col-md-2 col-sm-4 col-xs-6">
            <div class="assets">
            <div class="image" style="background:url(<?php the_sub_field('image')?>) no-repeat center 40px;min-height:95px"></div>
            <div class="image-hover" style="background:url(<?php the_sub_field('image-hover')?>) no-repeat center 40px;min-height:95px"></div>
            <h4><?php the_sub_field('title')?></h4>
            </div>
            </div>
             <?php endwhile; endif; ?>
        </div>
		 <div class="row"> 
    		<div class="col-sm-12 feelfree"><?php the_field('feel_free')?></div>
    	</div>
     </div>
  </section>

<section class="investment">
<div class="container">
        <div class="row">
        <div class="col-md-7">
        <div class="invest-in">     
        
<div class="para"> 
<?php the_field('invest_content');?>

  </div>    
  </div></div>
  <div class="col-md-5">
  <div class="invest-image"></div>
  </div>
  </div>
        </div>
</section>











<?php endwhile; // end of the loop. ?>	
<?php get_footer(); ?>

