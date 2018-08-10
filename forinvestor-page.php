<?php
/**
 * The template for displaying all pages.
 * Template Name: For Investor
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

  <section id="slide-1" class=" parallex investormapsec" data-anchor-target=".bcg"  data-top="background-position:0 50%;" data-center="background-position:0 0%;" >
    <div class="bcg">   
     <div class="container">
     <div class="row">
        <div class="col-xs-12 col-sm-6 investormaindiv" >
           <object id="investorpagebg" data="<?php bloginfo('template_url');?>/images/for_investor_icon.svg" xmlns:xlink="http://www.w3.org/1999/xlink"  type="image/svg+xml"/></object>
        </div>
        <div class="col-sm-6 col-xs-12">
          <div class="maptopcontent">
              <?php the_content();?>
          </div>
        </div>
     </div>
   </div>   
   
    </div> 
  </section>

  <div class="digilancetitle">
    <div class="container">
       <?php the_field('title_content');?>
    </div>
  </div>

  <section class="digilancecon">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-xs-12">
          <?php the_field('diligence_content');?>
        </div>
        <div class="col-sm-6 col-xs-12 wow animated fadeIn" data-wow-delay="0.5s">
          <img src="<?php the_field('diligence_image');?>"/>
        </div>
      </div>
    </div>
  </section>


  <section class="digitimeline  wow animated fadeIn" data-wow-delay="0.5s">
    <div class="digilantimein">
       <div class="desktopul">
        <?php //print_r($custom);?>
          <ul>
            <?php if( have_rows('chart_section') ):
              $i=1;
              while ( have_rows('chart_section') ) : the_row(); ?>
            <li class="wow animated fadeInUp <?php if($i==2 || $i==4 || $i==6):?>hidedesktop<?php endif;?>" 
              <?php if($i==1):?>data-wow-delay="0.7s"<?php elseif($i==2):?>data-wow-delay="0.9s"<?php elseif($i==3):?>data-wow-delay="1.1s"<?php elseif($i==4):?> data-wow-delay="1.3s"<?php elseif($i==5):?> 
                data-wow-delay="1.5s"<?php elseif($i==6):?>data-wow-delay="1.7s"<?php elseif($i==7):?> data-wow-delay="1.9s" <?php endif;?> >
              <div class="chartsec">
                <div class="charttitle"><span><?php echo $i;?></span><?php the_sub_field('title');?></div>
                <div class="charttext"><?php the_sub_field('content');?></div>
              </div>
             </li>
             <?php  $i++; endwhile; endif;?>
          </ul>
       </div>
       <div class="mobiletopul">
          <ul>
             <?php if( have_rows('chart_section') ):
              $i=1;
              while ( have_rows('chart_section') ) : the_row(); ?>
           <?php if($i==2 || $i==4 || $i==6):?>
            <li class="wow animated fadeInDown" <?php if($i==2):?>data-wow-delay="0.9s"<?php elseif($i==4):?>data-wow-delay="1.3s"<?php elseif($i==6):?>data-wow-delay="1.7s"<?php endif;?>>
              <div class="chartsec">
                <div class="charttitle"><span><?php echo $i;?></span><?php the_sub_field('title');?></div>
                <div class="charttext"><?php the_sub_field('content');?></div>
              </div>
             </li>
             <?php endif;?>
             <?php  $i++; endwhile; endif;?>            
          </ul>        
       </div>
    </div>
  </section>

  <section class="digilancecon">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-xs-12">
          <?php the_field('monitoring_content');?>
        </div>
        <div class="col-sm-6 col-xs-12 wow animated fadeIn" data-wow-delay="0.5s">
          <img src="<?php the_field('monitoring_image');?>"/>
        </div>
      </div>
    </div>
  </section>



<?php endwhile; // end of the loop. ?>	


<script src="<?php echo get_template_directory_uri(); ?>/inc/js/skrollr.min.js"></script>
<script type="text/javascript">
  jQuery(function () {
  // Init function
  function skrollrInit() {
    skrollr.init({
    smoothScrolling: true,
    mobileDeceleration: 0.004,
    forceHeight: false,
    });

  }
  // If window width is large enough, initialize skrollr
  if (jQuery(window).width() > 801) {
    skrollrInit();
  }

  jQuery(window).on('resize', function () {
    var _skrollr = skrollr.get(); // get() returns the skrollr instance or undefined
    var windowWidth = jQuery(window).width();

    if ( windowWidth <= 800 && _skrollr !== undefined ) {
      _skrollr.destroy();
    } else if ( windowWidth > 801 && _skrollr === undefined ) {
      skrollrInit();
    }
  });
});
</script>


<?php get_footer(); ?>

