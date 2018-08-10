<?php
/**
 * The template for displaying all pages.
 * Template Name: Job Listings
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
   <div class="breadcrumb"><ul id="breadcrumbs" class="breadcrumbs"><li class="item-home"><a class="bread-link bread-home" href="<?php bloginfo('url');?>" title="Home">Home</a></li><li class="separator separator-home"> / </li>
    <li class="item-home"><a class="bread-link bread-home" href="<?php bloginfo('url');?>/careers" title="Careers">Careers</a></li><li class="separator separator-home"> / </li>
    <li class="item-current"><span class="bread-current bread-1222"> Segments</span></li> </ul></div>
  <h2 class="text-center"> Segments</h2>
   </div>
</section>

<!--    <section class="breadcrum">
      <div class="container">
        <ul>
          <li><a href="<?php bloginfo('url');?>/careers">Careers Overview</a></li><li class="active"><span>/</span>Segments</a></li></ul>
      </div>
   </section>
 -->

   <section class="jobslistings">
      <div class="container">
          <div class="flexboxes row">
             <?php
              $args = array( 'posts_per_page' => -1,'post_type' =>'career');
              $myposts = get_posts( $args );
              foreach ( $myposts as $post ) : setup_postdata( $post );
              $bannerimg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
              $custom= get_post_custom($post->ID);
              //print_r($custom);
               ?>

                 <?php if($custom['jobs_listing'][0]==0):?> 
                     <a class="col-sm-3 col-xs-6" href="javascript:void()"><div class="flkexinner"> 
                      <div class="flexcolin">
                          <div class="flexcol"><?php echo $post->post_title;?>  <span><?php echo $custom['jobs_listing'][0];?> positions</span> </div>
                      </div>
                    </div>
                      </a>
                  <?php else:?>
                    <a class="col-sm-3 col-xs-6" href="<?php echo get_permalink($post->ID);?>">
                    <div class="flkexinner"> 
                       <div class="flexcolin">
                          <div class="flexcol"><?php echo $post->post_title;?>  <span><?php echo $custom['jobs_listing'][0];?> positions</span> </div>
                       </div>
                    </div>
                  </a>
                <?php endif;?>

              <?php  endforeach;
              wp_reset_postdata(); ?>  
          </div>
      </div>
   </section>

   

<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>
