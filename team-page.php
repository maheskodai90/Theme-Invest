<?php
/**
 * The template for displaying all pages.
 * Template Name: Team Page
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


<section class="teammembersfull">
  <div class="container">
    <div class="whowearetabsec"> 
          <div class="teammemberslist teamboard">
              <div class="row tab-content">
                  <ul class="finalrowclass">
                      <?php if( have_rows('team_members') ):
                    $k=1;
                 while ( have_rows('team_members') ) : the_row(); ?>
                         <li class="col-md-2"> 
                      <div class="memimg">
                        <a href="javascript:void(0)" data-url="<?php the_sub_field('image');?>" data-content="<h4><?php the_sub_field('name');?></h4> <h5><?php the_sub_field('position');?></h5> <p><?php the_sub_field('description');?></p>" data-toggle="modal" class="img-class" id="<?php echo $k;?>">
                        <img src="<?php the_sub_field('image');?>"/>
                           <div class="popoverdiv"> 
                                <div class="userdet"><h4><?php the_sub_field('name');?></h4><p><?php the_sub_field('position');?></p>
                                  <span class="iconspan"></span>
                              </div>
                            </div>
                         </a>
                      </div>
                      </li>
                      <?php if($k%6==0){echo '</ul><div class="clearfix"></div><ul class="finalrowclass">';} ;?>
                      <?php  $k++;  endwhile; endif?>
              </div>
          </div>
       </div>
  </div>
</section>
<?php endwhile; // end of the loop. ?>	


<div  id="myModal" class="modal teammodalpop fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="modalbody">
       <!--<div class="temameimg"> <div class="teamimgbg" style="background-image:url(images/team/1.jpg"></div></div>
       <div class="teammemtext"><h4>Vinitesh Garima</h4>
        <h5>Associate - Vehicle Finance</h5>
        <p>Garima is an MBA in Rural Management from Xavier Institute of Management, Bhubaneshwar. Prior to joining MBA, she worked with Tata Consultancy Services as an Systems Engineer for 3 successful years. She has handled both offshore & on-site product development for an international telecom client in her stint at TCS. An avid reader, wildlife lover, food enthusiast & a movie buff; she’s always eager to travel, befriend new people & learn new cultures. She considers the values of Honesty & Sincerity passed on to by her parents as her mantra to handle any situation in life.</p></div>-->
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
/*Popup Content Change*/
jQuery(document).ready(function(){
  jQuery(".img-class").click(function(evt){
      var poptext = jQuery(this).attr("data-content");
      var imgurl = jQuery(this).attr("data-url");
      
     var fulltext = '<div class="temameimg"> <div class="teamimgbg" style="background-image:url('+imgurl+')"></div></div> <div class="teammemtext">'+poptext+'</p></div>';    
     jQuery("#modalbody").html(fulltext);
     jQuery('#myModal').modal('show');
     });
     });
</script>
<?php get_footer(); ?>

