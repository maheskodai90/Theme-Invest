<?php
/**
 * Template Name: Full-width(no sidebar)
 *
 * This is the template that displays full width page without sidebar
 *
 * @package northarc_capital
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="inner-banner">
   <div class="banner-content">
   <div class="breadcrumb"><?php custom_breadcrumbs();?></div>
  <h2 class="text-center"> <?php the_title();?></h2>
   </div>
</section>

<section class="innerpagcont">
	<div class="container">
		<?php the_content();?>
	</div>
</section>


<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
