<?php
/**
 * The template for displaying all pages.
 * Template Name: What we do - overview
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
  <h2 class="text-center"> Overview</h2>
   </div>
</section>

<section class="overviewtop">
  <div class="container">
    <?php the_field('top_text');?>
  </div>
</section>

<section class="overviewsecond">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-xs-12">
        <div class="svgimagepart">
            <div class="flexslider">
              <ul class="slides">
                <li><div class="imagecircle"><img src="<?php bloginfo('template_url');?>/images/in_overview_1.jpg"/></div></li>
                <li><div class="imagecircle"><img src="<?php bloginfo('template_url');?>/images/in_overview_2.jpg"/></div></li>
                <li><div class="imagecircle"><img src="<?php bloginfo('template_url');?>/images/in_overview_3.jpg"/></div></li>
              </ul>
            </div>
          
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          viewBox="0 0 160 160" style="enable-background:new 0 0 160 160;" xml:space="preserve">
            <style type="text/css">
            .st0{fill:#4DC6E1;}
            #Layer_1{position: absolute;left:120px;height: 150px;width: 150px;bottom: 40px}
            #Circle{}
            #Arrow{fill:#fff;}
            #Star{fill:#fff;}
            .st0{ }
            @keyframes fadeInone {  from {opacity: 0;}to {opacity: 1;}}          
            @keyframes fadeIntwo {  from {opacity: 0;transform: translate(-23px, 45px);fill:#4DC6E1;}to {opacity: 1; transform: translate(0, 0);fill:#4DC6E1;}}          
            @keyframes fadeInthree { from{opacity: 0;transform:translate(-70px,40px);fill:#4DC6E1; }to{opacity: 1;transform: translate(0, 0);fill:#4DC6E1;}}    

            .one {  animation-delay: 0.5s;animation: fadeInone 1s linear;}
            .two {animation-delay: 1s; animation: fadeIntwo 1s linear;}
            .three {animation: fadeInthree 1s linear 1s;opacity: 0}
            .three.animate {opacity: 1}
            </style>
           
            <path id="Star" class="st0  three" d="M138.6,4.5c-2.4,9.9-10.9,17.9-20.9,20.1h0c10,2.4,19.2,11.6,21.5,21.6c2.4-9.9,10.4-19.3,20.4-21.6
            h0C149.5,22.2,140.8,14.5,138.6,4.5L138.6,4.5z"/>
            <path id="Arrow" class="st0  two" d="M86.3,55.3L63.7,91.7l-5.2-19.7L43.1,58.6L86.3,55.3z"/>
            <path id="Circle" class="st0  one" d="M0.5,133.8v-0.1c0-12,9.5-21.8,22.6-21.8c13.1,0,22.5,9.7,22.5,21.7v0.1c0,12-9.5,21.8-22.6,21.8
            C9.9,155.5,0.5,145.8,0.5,133.8z"/>
          </svg>          
            <script type="text/javascript">
                jQuery(document).ready(function () {
                    setTimeout(function(){
                        jQuery('.three').addClass('animate');}, 1500);
                });
            </script>
        </div>
      </div>
      <div class="col-sm-6 col-xs-12">
        <?php the_content();?>
      </div>
    </div>
      
  </div>
</section>

<section class="overviewthird">
  <div class="container">
    <div class="row">
      <?php if( have_rows('bottom_box') ):
      $i=1;
      while ( have_rows('bottom_box') ) : the_row(); ?>
        <div class="col-sm-6 col-xs-12">
          <div class="bgsvg" style="background-image: url(<?php the_sub_field('bg_img');?>);">
            <a href="<?php the_sub_field('readmore_link');?>">
               <div class="bgsvgtext">
                  <h5><?php the_sub_field('title');?></h5>
                  <p><?php the_sub_field('description');?></p>
                  <span>Read more</span>
               </div>
            </a>
          </div>
        </div>
      <?php  $i++; endwhile; endif;?> 
    </div>
  </div>
</section>



<script type="text/javascript">
  jQuery(window).load(function() {
  jQuery('.flexslider').flexslider({
    animation: "fade"
  });
});
</script>


<?php endwhile; // end of the loop. ?>	
<?php get_footer(); ?>

