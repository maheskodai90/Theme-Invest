<?php
/**
 * The template for displaying all pages.
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
   <div class="breadcrumb"><ul id="breadcrumbs" class="breadcrumbs">
    <li class="item-home"><a class="bread-link bread-home" href="<?php bloginfo('url');?>" title="Home">Home</a></li><li class="separator separator-home"> / </li>
    <li class="item-home"><a class="bread-link bread-home" href="<?php bloginfo('url');?>/careers" title="Careers">Careers</a></li> <li class="separator separator-home"> / </li>
    <li class="item-current"><a class="bread-link bread-home" href="<?php bloginfo('url');?>/job-listing" title="Segments">Segments</a></li>    <li class="separator separator-home"> / </li>
    <li class="item-current"><span class="bread-current bread-1222"> <?php the_title();?></span></li></ul></div>
  <h2 class="text-center"> <?php the_title();?></h2>
   </div>
</section>


<!-- 
   <section class="breadcrum">
    <div class="container">
      <ul>
        <li><a href="<?php bloginfo('url');?>/careers">Careers Overview</a></li><li><span>/</span><a href="<?php bloginfo('url');?>/job-listing">Segments</a></li><li class="active"><span>/</span><?php the_title();?></li></ul>
    </div>
    </section> -->

   <section class="accordion-row">
   	<div class="container">
      <div class="responsive-table table-responsive">
       
        <table class="table">
          <thead>
            <tr>
              <th>Positions</th>
              <th>Location</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php if( have_rows('jobs_listing') ):                 
                while ( have_rows('jobs_listing') ) : the_row();?>
            <tr>
              <td><a class="joblistpdf" href="<?php the_sub_field('pdf_file'); ?>" target="_blank"><?php the_sub_field('job_title', false, false); ?></a></td>
              <td><?php the_sub_field('location');?></td>
              <td><a href="#" data-title='<?php the_sub_field('job_title', false, false); ?>' data-content="" data-id ='<?php the_title();?>' class="carrer-form applybutton" data-toggle="modal" data-target="#carrer-popup">APPLY</a></td>
            </tr>
          <?php endwhile; endif;?>
          </tbody>
        </table>
      </div>
	   		
   	</div>	
   </section>


   <!-- Modal form -->
	<div id="carrer-popup" class="modal impactpopup contact-black fade in" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header"><button type="button" id="carrer-reset" class="close"  data-dismiss="modal" value="Reset">×</button></div>
         <div class="modal-body" id="modalbody">
              <div class="formhead">
              	<div class="col-md-6 form-title"><h6>Job Title</h6><h3 class="popup-title">Associate Director - Investments</h3></div>
              	<div class="col-md-6 form-title"><h6>Department</h6><h3 class="popup-category">IFMR Investments</h3></div>
          	  </div>
              <div class="form-body">
                <?php echo do_shortcode('[contact-form-7 id="1224" title="carrer"]'); ?>
              </div>
         </div>
      </div>
    </div>
  </div>






<script type="text/javascript">
  jQuery(document).ready(function(){
  jQuery(".carrer-form").on('click',function() {

    //binding info in popup
    var tex = jQuery(this).data('id');
    var poptext = jQuery(this).attr("data-title");
    var poptext1 = jQuery(this).closest('.panel-body').attr('data-title');
    jQuery(".popup-title").text(poptext);  
    jQuery(".popup-category").text(tex); 
    jQuery(".roletext").val(poptext); 
    jQuery(".cattext").val(tex); 

    });
    //reset
   jQuery('#carrer-reset').on('click', function() {
        jQuery('form')[0].reset();
        jQuery('.wpcf7-not-valid-tip').remove();
        
    });
});

jQuery(document).ready(function(){
  //allow only text
    jQuery(".names input").keypress(function(event){
        var inputValue = event.charCode;
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
            event.preventDefault();
        }
    });
    //allow only numbers
  jQuery(".mobile,.yearpassingpg input").keypress(function(event) {
  return /\d/.test(String.fromCharCode(event.keyCode));
  });

});




</script>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
