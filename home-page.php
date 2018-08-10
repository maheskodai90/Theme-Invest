<?php
/**
 * The template for displaying all pages.
 * Template Name: Home Page
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package northarc_capital
 */

get_header(); ?>


<section class="bannersec">
   <div class="flexslider">
    <ul class="slides">
		<?php
		$args = array( 'posts_per_page' => 3,'post_type' =>'banners');
		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post );
		$bannerimg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

           <li>
             <div class="bannerbgsec" style="background-image:url(<?php echo $bannerimg;?>)">
                <div class="container">
                   <div class="bannertext">
                      <?php the_field('banner_text');?> 
                   </div>
                </div>
             </div>
         </li>
		<?php endforeach;
		wp_reset_postdata(); ?>  
 
    </ul>
   </div>
  </section>

  <section class="fundsslider">
    <div class="container">
        <h3><?php the_field('fund_slider_text');?></h3>
       <div class="fundssliderop">
        <?php if( have_rows('fundsslider') ):
        while ( have_rows('fundsslider') ) : the_row(); ?>
          <div class="fundslipar">
              <div class="fundscolm">
              <p><?php the_sub_field('text');?></p>
              <span><?php the_sub_field('worth');?></span>
              </div>
          </div>
         <?php  endwhile; endif;?>  

       </div>
    </div>
  </section>


  <section class="fundssec">
     <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12 col-md-7">
              <div class="deptfunds">
                 <h3>Debt Funds</h3>
                 <table class="table"><thead>
                    <tr>
                       <th>Fund Name</th>
                       <th width="50"></th>
                       <th width="200">Class B Returns<span>(Since Inception)</span></th>
                    </tr>
                    <?php if( have_rows('debits_row') ):
                    while ( have_rows('debits_row') ) : the_row(); ?>
                     <tr>
                      <td><?php the_sub_field('fund_name');?></td>
                      <td></td>
                      <td><?php the_sub_field('returns');?></td>
                    </tr>
                    <?php  endwhile; endif;?>  
                 </thead></table>
                 <div class="viewalllink">
                   <a href="<?php bloginfo('url');?>/funds">View All</a>
                 </div>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12 col-md-5">
               <div class="ceomessage">
                  <div class="ceotext">
                    <?php the_field('message_from_ceo');?>  
                  </div>
                  
                  <div class="ceodetail">
                     <div class="ceoimg"><img src="<?php bloginfo('template_url');?>/inc/images/kshama.png"/></div>
                     <div class="ceoname">
                       <p><span class=""><?php the_field('ceo');?></span>
                          <span><?php the_field('ceo_position');?></span>
                          <span><?php the_field('ceo_position_name');?></span>
                       </p> 
                     </div>
                  </div>
                  
               </div>
            </div>
        </div>
     </div>
  </section>


<section class="awardsec investcomsec">
     <div class="container">
        <h3>investee companies </h3>
        <div class="investeslider">
            <?php if( have_rows('investee_company') ):
              while ( have_rows('investee_company') ) : the_row(); ?>
            <div class="invslidein">
                <div class="invimage">
                  <div class="inimgcol">
                      <img src="<?php the_sub_field('image');?>">
                  </div>
                </div>
                <p><?php the_sub_field('title');?></p>
            </div>
            <?php  endwhile; endif;?>  
        </div>
     </div>
  </section> 


<section class="awardsec">
     <div class="container">
        <h3>Awards and Recognitions</h3>
        <?php if( have_rows('awards') ):
          while ( have_rows('awards') ) : the_row(); ?>
        <div class="col-sm-6 col-xs-12 col-md-3">
          <img src="<?php the_sub_field('image');?>">
          <p><?php the_sub_field('name');?></p>
        </div>
        <?php  endwhile; endif;?>  

     </div>
  </section> 

  <section class="blogsection">
     <div class="container">
        <div class="row">
           <div class="col-sm-4 col-xs-12">
              <div class="blogsec">
                 <h3>from Our Blog</h3>
                 <ul>
                  <?php
                    $args = array( 'posts_per_page' => 3,'post_type' =>'post');
                    $myposts = get_posts( $args );
                    $i=1;
                    foreach ( $myposts as $post ) : setup_postdata( $post );
                     ?>  
                     <li><span><?php echo get_the_date( 'd-M-Y', $post->ID );?></span>
                      <a href="<?php echo get_permalink($post->ID);?>"><?php echo $post->post_title;?></a></li>
                    <?php  $i++; endforeach;
                    wp_reset_postdata(); ?>                  
                 </ul>
              </div>
           </div>
           <div class="col-sm-4 col-xs-12">
              <div class="blogsec">
                 <h3>Careers</h3>
                 <div class="carrertext">
                  <?php the_field('careers');?>
                  
                 </div>
              </div>
           </div>
           <div class="col-sm-4 col-xs-12">
                <div class="tweettext">
                    <h3><a href="https://twitter.com/_NorthernArc" target="_blank">@NorthernArc</a> <span>tweets</span></h3>
                     <div class="tweeetsec">
                       <?php dynamic_sidebar('home-widget-1');?>
                      <!-- <img class="img-responsive" src="<?php bloginfo('template_url');?>/images/tweetfeed.png"/> -->
                     </div>
                </div>
           </div>
        </div>
     </div>
  </section>


<!-- homepage popup start -->

<div id="myModal1" class="modal fade" role="dialog">
  <div class="homepopup modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">    
      <div class="modal-body">
            <h3>Legal Disclaimer</h3>
            <div class="legaldistext style-3">
                <?php $my_postid = 222;
                $content_post = get_post($my_postid);
                $content = $content_post->post_content;
                $content = apply_filters('the_content', $content);
                echo $content;?>
            </div>
      </div>
      <div class="modal-footer">
          <a href="JavaScript:void(0)" class="site_btn site_btn1" data-dismiss="modal">Accept</a>
          <a href="https://www.northernarc.com" target="_blank"  class="rejectbutton">Reject</a>
      </div>
    </div>
  </div>
</div>

<script>
jQuery(window).load(function(){        
   jQuery('#myModal1').modal('show'); 
   }); 
  jQuery(document).ready(function(){ 
  jQuery('#myModal1').modal({backdrop: 'static', keyboard: false})
  });
</script>
<!-- homepage popup ends -->          
      


<script>
window.onload = function() {
  jQuery(".ctf-author-avatar img").attr("src","<?php bloginfo('template_url');?>/images/twitter-arrow.png")
};



jQuery('.fundssliderop').slick({
  dots: false,
  infinite: true,
  speed: 2500,
    autoplay: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

jQuery('.investeslider').slick({
  dots: false,
  infinite: true,
  speed: 2500,
    autoplay: true,
  slidesToShow: 5,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});



</script>








<?php get_footer(); ?>
