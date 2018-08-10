<?php
/**
 * The template for displaying all pages.
 * Template Name: carrers
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package northarc_capital
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post();
$bannerimg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>

<section class="inner-banner">
   <div class="banner-content">
   <div class="breadcrumb"><?php custom_breadcrumbs();?></div>
  <h2 class="text-center"> <?php the_title();?></h2>
   </div>
</section>
 
  <section class="bannersection" style=" background-image: url('<?php echo $bannerimg;?>')">
    <div class="container">
      <div class="careerbantext animated fadeInUp" data-wow-delay="2.5s">
       <?php the_content();?>
     </div>
    </div>
  </section>

  <section class="peopletextarea topapply">
   	<div class="container">
	     <div class="row">
           <div class="col-sm-8 col-md-9 col-xs-12 wow animated fadeIn" data-wow-delay="1s">
              <?php the_field('career_second_section');?>
           </div>
           <div class="col-sm-4 col-md-3 col-xs-12">
              <div class="befitbutton">
                <a href="<?php bloginfo('url');?>/job-listing" class="site_btn wow animated fadeIn" data-wow-delay="2s">Apply for Job</a>
                <a href="javascript:void()" class="site_btn getintouch wow animated fadeIn" data-wow-delay="2.5s">Apply for internship</a>
              </div>
           </div>
       </div>
   	</div>	
   </section>

   <section class="ourpeopletabsec">
     <div class="row">
        <div class="col-xs-12 col-md-6 col-sm-12">
            <div class="tabscareer">
              <ul class="nav nav-tabs responsive-tabs wow animated fadeInUp" data-wow-delay="0.5s">
                <li class="active"><a href="#tabs1">Our People</a></li>
                <li><a href="#tabs2">Our Culture</a></li>
              </ul>
              <div class="tab-content  wow animated fadeIn" data-wow-delay="1s">
                <div class="tab-pane active" id="tabs1">
                    <?php the_field('our_people_text');?>
                </div>
                <div class="tab-pane" id="tabs2">
                    <?php the_field('our_culture_text');?>
                </div>
              </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6  col-sm-12 no-padding  wow animated fadeIn" data-wow-delay="1.5s">
           <div class="slidercareer flexslider">
             <ul class="slides">
                <li><div class="careerslide" style="background-image: url('<?php the_field('slide_image');?>')"></div></li>
                <li><div class="careerslide" style="background-image: url('<?php the_field('slide_image_2');?>')"></div></li>
                <li><div class="careerslide" style="background-image: url('<?php the_field('slide_image_3');?>')"></div></li>
                 <!--<li><div class="careerslide" style="background-image: url('<?php the_field('slide_image_4');?>')"></div></li>
                 <li><div class="careerslide" style="background-image: url('<?php the_field('slide_image_5');?>')"></div></li> -->
              </ul>
           </div>
        </div>
     </div>
   </section>

 

   <section class="peopletextarea">
      <div class="container">          
          <div class="row rowfull">
              <?php the_field('why_northern_arc_text');?>
          </div>
      </div>
   </section>

   <section class="benefitssection">
     <div class="container">
         <h4 class=" wow animated fadeIn" data-wow-delay="0.5s"><?php the_field('benifits');?></h4>
         <ul class="wow animated fadeIn " data-wow-delay="1s">
          <?php if( have_rows('benefits_section') ):
             $i=1;

            while ( have_rows('benefits_section') ) : the_row(); ?>
          <li style="background-image: url(<?php the_sub_field('icon');?>)"><?php the_sub_field('title');?></li>
        <?php $i++;endwhile; endif;?>
        </ul>
        <div class="befitbutton">
          <a href="<?php bloginfo('url');?>/job-listing" class="site_btn wow animated fadeInUp " data-wow-delay="1.5s">Apply for Job</a>
          <a href="javascript:void()" class="site_btn getintouch wow animated fadeInUp " data-wow-delay="2s">Apply for internship</a>
        </div>
     </div>
   </section>


   <section class="application-steps">
   	<div class="container">
   		<div class="col-md-12">
   			<div class="steps-wrapper">
   				<h4><?php the_field('hiring_text');?></h4>
   				<div class="process-steps">
   					<div class="step-1  wow animated fadeInUp" data-wow-delay="1s">
   						<div class="icon-side"></div>
   						<div class="content-side">
   							<?php the_field('content_box_1');?>
   						</div>
   					</div>	
   					<div class="step-2  wow animated fadeInUp" data-wow-delay="2s">
   						<div class="icon-side"></div>
   						<div class="content-side">
   							<?php the_field('content_box_2');?>
   						</div>
   					</div>	
   					<div class="step-3  wow animated fadeInUp" data-wow-delay="3s">
   						<div class="icon-side"></div>
   						<div class="content-side">
   							<?php the_field('content_box_3');?>   					
   						</div>
   					</div>	
   				</div>
   			</div>
   		</div>
   	</div>	
   </section>

   <section class="culturebottom wow animated fadeIn" data-wow-delay="1s" style="background-image:url(<?php the_field('group_image');?>)">
     <div class="container">
       <div class="culturebot wow animated fadeInUp" data-wow-delay="1.5s">
        <?php the_field('group_text');?>
      </div>       
     </div>
   </section>

<?php endwhile; // end of the loop. ?>

<!-- contact popup -->
 <div id="contact-popup" class="modal impactpopup contact-black fade in" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
         <div class="modal-body" id="modalbody">
              <div class="getintouchinner">
                <p>Drop your resume at</p>
                  <a href="mailto:recruitment.capital@northernarc.com"> recruitment.capital@northernarc.com <span><i class="fa fa-envelope"></i></span></a>
              </div>
         </div>
      </div>
    </div>
  </div> 

 <script type="text/javascript">

 jQuery(document).ready(function(){

  jQuery('.getintouch').click(function()
  {
   jQuery("#contact-popup").modal('show');
   jQuery('html').removeClass('responsive-menu-open');
   jQuery('#responsive-menu-button').removeClass('is-active');
   
  });

  jQuery('.responsive-tabs').responsiveTabs({
  accordionOn: ['xs', 'sm']
  });
  
  })

 // jQuery('.dropdown').click(function(){
 //    alert(jQuery(this).closest('ul').find('.dropdown-menu').html());
 //    return false;
 //  })

</script> 
<?php get_footer(); ?>
