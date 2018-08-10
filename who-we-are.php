<?php
/**
 * The template for displaying all pages.
 * Template Name: Who We Are
 * @package northarc_capital
 */

get_header(); ?>
<section class="inner-banner">
   <div class="banner-content">
   <div class="breadcrumb"><?php custom_breadcrumbs();?></div>
  <h2 class="text-center"> Overview</h2>
   </div>
  </section>

  <section class="content-section">
  <div class="container"><div class="row">
	  <div class="col-sm-6"><img src="<?php echo the_field('content_image'); ?>" class="wow zoomIn" alt=""></div><div class="col-sm-6"><?php echo the_field('content_text'); ?></div></div></div>
  </section>  
  
<section class="content-section-whoweare">
<div class="container">
 		<h3><?php echo the_field('investment_title'); ?> </h3>
  	<div class="row boxmain">
  	<?php if( have_rows('investment_offer') ):	
	 while ( have_rows('investment_offer') ) : the_row(); ?>	
	 	 <a href="javascript:;"> <div class="col-sm-6 box wow zoomIn">
	  		<div class="col1"><?php echo the_sub_field('investment_content'); ?></div>	  
			<div class="col2"><img src="<?php echo the_sub_field('investment_logo'); ?>" alt="" class="wow zoomIn"></div>
	    </div> </a> 
	 <?php endwhile; 
		   endif; ?>
  	
	  <!--<div class="col-sm-6 box">
	  		<div class="col1"><h5>Debt Focus</h5><b>Debt based AIF</b> with investments in the asset classes of microfinance, vehicle finance, small business loans, affordable housing finance, agri finance and corporate finance </div>	  
			<div class="col2"><img src="<?php // bloginfo('template_url');?>/images/who-debt.png"/></div>
	  	</div>-->
	  	  
	</div>
</div>
</section>

<?php get_footer(); ?>
