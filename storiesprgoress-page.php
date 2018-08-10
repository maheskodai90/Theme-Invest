<?php
/**
 * The template for displaying all pages.
 * Template Name: Stories Progress
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
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
  
<div class="inner-content">
	<section class="storiesband">
		<div class="container">   
			<nav class="navbar navbar-inverse col-sm-3" >
					<div data-spy="affix" data-offset-top="250" data-offset-bottom="500">
					  <div class="collapse navbar-collapse" id="myNavbar">
					    <ul class="nav navbar-nav">
							<?php if( have_rows('stories_progress') ):
							$j=1;
							while ( have_rows('stories_progress') ) : the_row(); ?>
					   			<li><a href="#section<?php echo $j;?>"><?php the_sub_field('year');?></a></li>
							<?php  $j++; endwhile; endif;?>						
					    </ul>												    
					  </div>
					</div>
			</nav>    

				<div class="col-sm-9 col-xs-12">
					<?php if( have_rows('stories_progress') ):
					$j=1;
					while ( have_rows('stories_progress') ) : the_row(); ?>
						<div id="section<?php echo $j;?>" class="storycon wow animated fadeIn" data-wow-delay="1s">
						  <div class="yearicon"><span><?php the_sub_field('year');?></span></div>
						  <div class="rightcolstory">	
								 <ul>
									<?php if( have_rows('stories_months') ):
									$k=1;
									while ( have_rows('stories_months') ) : the_row(); ?>						 	
									 	<li style=" background: url(<?php the_sub_field('icon');?>)no-repeat 0px 5px"><h4> <?php the_sub_field('month');?></h4> 
					                      <p><?php the_sub_field('description');?></p>
					                    </li>
				                    <?php  $k++; endwhile; endif;?> 	                    
								</ul>
						  </div>

							<?php if( have_rows('stories_images') ):?>
								<div class="storyimages">
									<?php while ( have_rows('stories_images') ) : the_row(); ?>
										<img src="<?php the_sub_field('story_image');?>">
									<?php  endwhile;?>
								</div>
							<?php endif;?>	
							
						</div>
					<?php  $j++; endwhile; endif;?>  
				</div>
		</div>
   </section>
</div>

<script>
jQuery(document).ready(function(){
  // Add scrollspy to <body>
  jQuery('body').scrollspy({target: ".navbar", offset: 50});
  // Add smooth scrolling on all links inside the navbar
  jQuery("#myNavbar a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();
      // Store hash
      var hash = this.hash;
      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      jQuery('html, body').animate({
        scrollTop: jQuery(hash).offset().top
      }, 800, function(){   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
});
</script>
<?php endwhile; // end of the loop. ?>	
<?php get_footer(); ?>

