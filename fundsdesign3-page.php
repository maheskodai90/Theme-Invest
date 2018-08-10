<?php
/**
 * The template for displaying all pages.
 * Template Name: Funds Modal 3 Page
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
  <h2 class="text-center"> IFMR FImpact </h2>
   </div>
</section>


<section class="fundsaccordion">
  <div class="container">
          <div class="fundfulllist">
              <ul class="nav nav-tabs responsive-tabs">
                    <?php
                    $args = array( 'posts_per_page' => 6,'post_type' =>'fimapacts');
                    $myposts = get_posts( $args );
                    $i=1;
                    foreach ( $myposts as $post ) : setup_postdata( $post );
                    $bannerimg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>                              
                        <li <?php if($i==1):?>class="active"<?php endif;?>><a href="#tabs<?php echo $i;?>"> <?php echo $post->post_title;?> </a></li>
                    <?php  $i++; endforeach;
                    wp_reset_postdata(); ?>                 
               </ul>
                    
               <div class="tab-content">
                    <?php
                    $args = array( 'posts_per_page' => 6,'post_type' =>'fimapacts');
                    $myposts = get_posts( $args );
                    $i=1;
                    foreach ( $myposts as $post ) : setup_postdata( $post );
                    $bannerimg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>                              
                        <div class="tab-pane  wow animated fadeIn <?php if($i==1):?>active<?php endif;?>" id="tabs<?php echo $i;?>" data-wow-delay="0.3s" >
                          <div class="row">
                            <div class="col-sm-12 col-md-6 col-xs-12 wow animated fadeIn" data-wow-delay="0.3s" >
                              <?php echo apply_filters('the_content', $post->post_content); ?>

                              <div class="explorebut">
                                <a href="<?php the_field('explore_button_link');?>" class="site_btn">Explore Options</a>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-6  col-xs-12">
                               <div class="fluidfundimg  wow animated fadeIn" data-wow-delay="0.5s">
                                  <img src="<?php echo  $bannerimg;?>"/>
                                  <a class="viewallfund" href="javaScript:void();">View All Funds</a>
                               </div>
                               <div class="fundboxtopfull  wow animated fadeInRight" data-wow-delay="0.8s">
                                <?php if( have_rows('fund_row') ):
                                 while ( have_rows('fund_row') ) : the_row(); ?>
                               <div class="fundbox">
                                  <h5><?php echo $post->post_title;?></h5>
                                  <h6><?php the_sub_field('title');?></h6>
                                  <div class="fundrow">
                                      <div class="row">
                                         <div class="col-xs-6">
                                            <label>Fund Size</label>
                                            <span><?php the_sub_field('fund_size');?></span>
                                         </div>
                                         <div class="col-xs-6">
                                            <label>Tenor</label>
                                            <span><?php the_sub_field('tenor');?></span>
                                         </div>
                                      </div>
                                  </div>
                                  <div class="fundrow">
                                     <div class="row">
                                       <div class="col-xs-6">
                                          <label>First Close Date</label>
                                          <span><?php the_sub_field('first_close_date');?></span>
                                       </div>
                                       <div class="col-xs-6">
                                          <label>Fund Rating</label>
                                          <span><?php the_sub_field('fund_rating');?></span>
                                       </div>
                                     </div>
                                  </div>
                                  <div class="fundrow <?php if (!get_sub_field('notable_milestones')){?> last <?php };?>">
                                     <div class="row">                                    
                                       <div class="col-xs-12">
                                          <p>Sectors : <?php the_sub_field('sectors');?></p>
                                       </div>
                                     </div>
                                  </div>
                                  <?php if (get_sub_field('notable_milestones')){?>
                                  <div class="fundrow last">
                                     <div class="row"> 
                                       <div class="col-xs-12">
                                          <p>Notable Milestones : <?php the_sub_field('notable_milestones');?></p>
                                       </div>
                                     </div>
                                  </div>
                                <?php };?>
                                  <div class="fundbutton">
                                     <button class="site_btn" data-toggle="modal" data-target="#myModal">Contact Us</button>
                                  </div>
                               </div>
                               <?php endwhile; endif;?> 
                             </div>
                            </div>
                          </div>
                        </div>
                    <?php $i++; endforeach; 
                    wp_reset_postdata(); ?>  
                </div>  
          </div>
     <a class="viewallfund mobileallfund" href="javaScript:void();">View All Funds</a>       
   </div>
</section>


<section class="funboxfull" style="display: none;">
  <div class="container">
    <div class="flexrow">
    <?php
    $args = array( 'posts_per_page' => -1,'post_type' =>'fimapacts');
    $myposts = get_posts( $args );
    $i=1;
    foreach ( $myposts as $post ) : setup_postdata( $post ); ?>                              
            <div class="flexbox">
                <?php if( have_rows('fund_row') ):
                 while ( have_rows('fund_row') ) : the_row(); ?>
               <div class="fundbox">
                  <h5><?php echo $post->post_title;?></h5>
                  <h6><?php the_sub_field('title');?></h6>
                  <div class="fundrow">
                      <div class="row">
                         <div class="col-xs-6">
                            <label>Fund Size</label>
                            <span><?php the_sub_field('fund_size');?></span>
                         </div>
                         <div class="col-xs-6">
                            <label>Tenor</label>
                            <span><?php the_sub_field('tenor');?></span>
                         </div>
                      </div>
                  </div>
                  <div class="fundrow">
                     <div class="row">
                       <div class="col-xs-6">
                          <label>First Close Date</label>
                          <span><?php the_sub_field('first_close_date');?></span>
                       </div>
                       <div class="col-xs-6">
                          <label>Fund Rating</label>
                          <span><?php the_sub_field('fund_rating');?></span>
                       </div>
                     </div>
                  </div>
                  <div class="fundrow <?php if (!get_sub_field('notable_milestones')){?> last <?php };?>">
                     <div class="row">                                    
                       <div class="col-xs-12">
                          <p>Sectors : <?php the_sub_field('sectors');?></p>
                       </div>
                     </div>
                  </div>
                  <?php if (get_sub_field('notable_milestones')){?>
                  <div class="fundrow last">
                     <div class="row"> 
                       <div class="col-xs-12">
                          <p>Notable Milestones : <?php the_sub_field('notable_milestones');?></p>
                       </div>
                     </div>
                  </div>
                <?php };?>
                  <div class="fundbutton">
                     <button class="site_btn" data-toggle="modal" data-target="#myModal">Contact Us</button>
                  </div>
               </div>
               <?php endwhile; endif;?> 
            </div>
    <?php $i++; endforeach; 
    wp_reset_postdata(); ?>
    </div>
    <div class="targetfund">*Target fund size, currently in fund raising stage</div>      
  </div>
</section>

<div id="myModal" class="modal contactpopup fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
       <button type="button" class="close" data-dismiss="modal"></button>
      <div class="modal-body">
        <div class="formpopup">
          <h3>Send a Message</h3>
          <?php echo do_shortcode('[contact-form-7 id="1244" title="Fund Form"]');?>
       </div>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
jQuery('.responsive-tabs').responsiveTabs({
  accordionOn: ['xs', 'sm']
});

jQuery(document).ready(function(){
    jQuery(".viewallfund").click(function(){
        jQuery(".funboxfull").slideToggle();
    });
});
jQuery('#textcontact').on('keyup input', function() { 
jQuery(this).css('height', '55px').css('height', this.scrollHeight + (this.offsetHeight - this.clientHeight));
});

</script>
<?php endwhile; // end of the loop. ?>	
<?php get_footer(); ?>

