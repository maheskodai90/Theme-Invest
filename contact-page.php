<?php
/**
 * The template for displaying all pages.
 * Template Name: Contact Page
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc0Mi9JAitwoAs_cflHprrIyg-UU30J_k" type="text/javascript"></script>

<section class="inner-banner">
   <div class="banner-content">
   <div class="breadcrumb"><?php custom_breadcrumbs();?></div>
  <h2 class="text-center"> <?php the_title();?></h2>
   </div>
</section>

	
<section class="contactsection">
 	
	<div id="map_canvas"></div>
     <div class="maplist">
        	<div class="container">
        		<div class="mapwhite">
	        		<?php if( have_rows('office_address') ):
				 	$i=1;
				    while ( have_rows('office_address') ) : the_row(); ?>
			        	<div class="mapli">
			        		<h4><?php the_sub_field('location');?></h4>
			        		<?php the_sub_field('address');?>
			        		<div class="telephone"><span class="teltext">Tel: <?php the_sub_field('telephone');?></span> <a id="link<?php echo $i;?>" href="javascript:void(0)">View map</a></div> 
			        	</div>
	        		<?php $i++; endwhile; endif;?>  
        	     </div>
        	</div>
        	
      </div>
    <script>
      var marker;
      var map;

		jQuery("#link1").click(function(){
		    changeMarkerPos(13.012,80.137);

		});
		jQuery("#link2").click(function(){
		    changeMarkerPos(19.063,72.859);
		});
		
		function initialize() {
			var bounds = new google.maps.LatLngBounds();

		    var styles = [{
		        stylers: [{
		            saturation: 0,
		            lightness:-5,
		        }]
		    }];

		var markers = [
        ['Northern Arc, Chennai ', 13.012,80.137],
		['Northern Arc, Mumbai ', 19.063,72.859],
         ];
		    var styledMap = new google.maps.StyledMapType(styles, {
		        name: "Styled Map",
		    });
		    var mapProp = {
		        center: new google.maps.LatLng(13.012,80.137),
		        zoom:6,
		        panControl: true,
		        zoomControl: true,
		        mapTypeControl: true,
		        scaleControl: true,
		        streetViewControl: true,
		        overviewMapControl: true,
		        rotateControl: true,
		        scrollwheel: true,
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    };
		    map = new google.maps.Map(document.getElementById("map_canvas"), mapProp);
		  
		    map.mapTypes.set('map_style', styledMap);
		    map.setMapTypeId('map_style')

		    marker = new google.maps.Marker({
		        position: new google.maps.LatLng(13.012,80.137),
		        animation: google.maps.Animation.DROP,
		        zIndex:9999,
		        icon: '<?php bloginfo('template_url');?>/images/mapicon.png',
		    });

		     for( i = 0; i < markers.length; i++ ) {
		        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
		        bounds.extend(position);
		        marker = new google.maps.Marker({
		            position: position,
		            map: map,
		            title: markers[i][0],
		            zIndex:9999,
		        icon: '<?php bloginfo('template_url');?>/images/mapicon.png',
		        });
		     }   
		   map.fitBounds(bounds);
		    marker.setMap(map);
		    map.panTo(marker.position);
		}

		function changeMarkerPos(lat, lon){
		    myLatLng = new google.maps.LatLng(lat, lon)
		    marker.setPosition(myLatLng);
		    map.panTo(myLatLng);
		     mapProp = {
		        center: new google.maps.LatLng(13.012,80.137),
		        zoom: 6
		    }
		}




		google.maps.event.addDomListener(window, 'load', initialize);

    </script>
     
	</section>

	<section>
		<div class="container">
			<div class="contacticon">
				<div class="enquiry">
					<a href="&#109;&#x61;&#x69;&#x6c;&#x74;&#x6f;&#x3a;&#x63;&#x6f;&#x6e;&#x74;&#x61;&#99;&#x74;&#46;&#105;&#110;&#118;&#101;&#115;&#x74;&#109;&#101;&#110;&#x74;&#x73;&#x40;&#x69;&#102;&#x6d;&#x72;&#46;&#99;&#111;&#46;&#x69;&#x6e;"><img src="<?php bloginfo('template_url');?>/images/contacticon.png"> contact.investments@ifmr.co.in</a>
				</div>
				<div class="social">
					<a href="https://www.facebook.com/northernarccapital/" target="_blank"><img src="<?php bloginfo('template_url');?>/images/facebook.png"></a>
					<a href="https://twitter.com/_NorthernArc" target="_blank"><img src="<?php bloginfo('template_url');?>/images/twitteri.png"></a>
					<a href="https://in.linkedin.com/company/northern-arc-capital" target="_blank"><img src="<?php bloginfo('template_url');?>/images/linkedin.png"></a>
				</div>
			</div>
		</div>
	</section>

	<section id="getintouch">
		<div class="container">
			<h3>Get in Touch</h3>
			<div class="formcontact">
				<?php echo do_shortcode('[contact-form-7 id="15" title="Getin Touch"]');?>
			</div>
		</div>
	</section>


<?php endwhile; // end of the loop. ?>
<script type="text/javascript">
jQuery('#textcontact').on('keyup input', function() { 
jQuery(this).css('height', '55px').css('height', this.scrollHeight + (this.offsetHeight - this.clientHeight));
});
</script>

<?php get_footer(); ?>
