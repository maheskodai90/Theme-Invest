<?php
/**
 * The template for displaying all pages.
 * Template Name: In the news Page
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
<?php endwhile; // end of the loop. ?>



<!-- <section class="bannersection inthenewsband" style=" background-image: url('<?php echo $bannerimg;?>')">
	<div class="container">
	  <div class="careerbantext wow animated fadeInUp" data-wow-delay="0.5s">
	     <h4>In the Media</h4>
	 </div>
	</div>
</section>  -->

<section class="writingsfilter">
  <div class="filterbg">
    <div class="container">
    	<div class="row">
    		<div class="col-sm-6 col-xs-6">
    			
    		</div>
    		<div class="col-sm-6 col-xs-6">
    			<div class="sortbytext">
	    			<label>Sort by:</label>
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle all-hidden" id="filter-button" type="button" data-toggle="dropdown">All</button>
						<ul class="dropdown-menu filter-options">
							<li id="all-list" style="display: none;"><a href="javascript:void(0);" data-filter="*" >All</a></li>
							<?php 
								$terms = get_terms( 'inthenewscat' );
								if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
								echo '<ul>';
								foreach ( $terms as $term ) {?>
								<li><a href="javascript:void(0);" data-filter="<?php echo $term->name; ?>"><?php echo $term->name; ?></a></li>
								<?php
								}
								echo '</ul>';
							}?>
							
						</ul>
					</div>
			    </div>
    		</div>
    	</div>

		

    </div>
  </div>
  <div class="container">
    <div id="writtingsfil" class="isotope">
      <?php

                    $custom_terms = get_terms('inthenewscat');

                   $args = array('post_type' => 'inthenews','posts_per_page' => -1, 'order' => 'DESC','orderby'=>'post_date');

                   $loop = new WP_Query($args);
                  if($loop->have_posts()) {
                 while($loop->have_posts()) : $loop->the_post();
                  $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id($loop->ID) );
				  $custom= get_post_custom($loop->ID);
				  $term_list = wp_get_post_terms($post->ID, 'inthenewscat', array("fields" => "all"));
				  ?>
	<div class="grid-item <?php echo get_the_date('Y', $loop->ID);?>" data-filter="<?php echo $term_list[0]->slug; ?>"> 
		<div class="gridinner">
		      <div class="filterimagepart <?php echo $term_list[0]->slug; ?>">
			      <div class="filterimg">
			      	  <img src="<?php echo $feat_image_url;?>">
			      </div>
			      <h4> <?php the_title();?> </h4>
			      <div class="vielinkdiv">
			      	  <a href="<?php echo $custom['view_link'][0]; ?>" target="_blank"> View Link </a>
			      	  <span class="publishmonth"><?php echo get_the_date('F d, Y', $loop->ID);?> <!-- <?php echo $custom['published_month'][0]; ?>,  <?php echo $term_list[0]->slug;?> --></span>
			      </div>  
		      </div>
		</div>
	</div>
   <?php endwhile; } //} ?>

    </div>
  </div>
</section>


<script src="<?php bloginfo('template_url');?>/inc/js/isotope.pkgd.min.js"></script>
<script type="text/javascript">
jQuery(document).ready( function() {
	var itemSelector = '.grid-item'; 
	var $container = jQuery('#writtingsfil').isotope({
		itemSelector: itemSelector,
		masonry: {
		  columnWidth: itemSelector,
		  isFitWidth: true
		}
	});
	//Ascending order
	var responsiveIsotope = [
		[480, 5],
		[720, 10]
	];
	var itemsPerPageDefault = 10;
	var itemsPerPage = defineItemsPerPage();
	var currentNumberPages = 1;
	var currentPage = 1;
	var currentFilter = '*';
	var filterAtribute = 'data-filter';
	var pageAtribute = 'data-page';
	var pagerClass = 'isotope-pager';
	function changeFilter(selector) {
		$container.isotope({
			filter: selector
		});
	}

	function goToPage(n) {
		currentPage = n;
		var selector = itemSelector;
			selector += ( currentFilter != '*' ) ? '['+filterAtribute+'="'+currentFilter+'"]' : '';
			selector += '['+pageAtribute+'="'+currentPage+'"]';
		changeFilter(selector);
	}
	function defineItemsPerPage() {
		var pages = itemsPerPageDefault;
		for( var i = 0; i < responsiveIsotope.length; i++ ) {
			if( jQuery(window).width() <= responsiveIsotope[i][0] ) {
				pages = responsiveIsotope[i][1];
				break;
			}
					}
		return pages;
	}	
	function setPagination() {
		var SettingsPagesOnItems = function(){
			var itemsLength = $container.children(itemSelector).length;
						var pages = Math.ceil(itemsLength / itemsPerPage);
			var item = 1;
			var page = 1;
			var selector = itemSelector;
				selector += ( currentFilter != '*' ) ? '['+filterAtribute+'="'+currentFilter+'"]' : '';
			$container.children(selector).each(function(){
				if( item > itemsPerPage ) {
					page++;
					item = 1;
				}
				jQuery(this).attr(pageAtribute, page);
				item++;
			});
			currentNumberPages = page;
		}();
		var CreatePagers = function() {
			var $isotopePager = ( jQuery('.'+pagerClass).length == 0 ) ? jQuery('<div class="'+pagerClass+'"></div>') : jQuery('.'+pagerClass);
			$isotopePager.html('');
			if(currentNumberPages > 1){
			for( var i = 0; i < currentNumberPages; i++ ) {
				if(i==0){
					var cl = "pager current";
				}else{
					var cl = "pager";
				}
				var $pager = jQuery('<a href="javascript:void(0);" class="'+ cl +'" '+pageAtribute+'="'+(i+1)+'"></a>');
					$pager.html(i+1);
					$pager.click(function(){
						var page = jQuery(this).eq(0).attr(pageAtribute);
						jQuery('.pager').removeClass('current');
                        jQuery(this).addClass('current');
						goToPage(page);
					});
				$pager.appendTo($isotopePager);
			}
			}
			$container.after($isotopePager);
		}();
	}
	setPagination();
	goToPage(1);
	//Adicionando Event de Click para as categorias
	jQuery('.dropdown-menu li a').click(function(){
		var filter = jQuery(this).attr(filterAtribute);
		currentFilter = filter;

		setPagination();
		goToPage(1);


	});
	
	//Evento Responsivo
	jQuery(window).resize(function(){
		itemsPerPage = defineItemsPerPage();
		setPagination();
		goToPage(1);
	});

	jQuery('.filter-options li a').on('click', function(){
    jQuery('#filter-button').text(jQuery(this).text());
    });

	jQuery(".filter-options li a").click(function(){
        if(jQuery("#filter-button").hasClass('all-hidden')){
            jQuery('#all-list').show();
            jQuery("#filter-button").removeClass("all-hidden");
            jQuery("#filter-button").addClass("all-visible");
        } else {
	        
        }
    });
});


</script>

<?php get_footer(); ?>
