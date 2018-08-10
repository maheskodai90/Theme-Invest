<?php
/**
 * The Template for displaying all single posts.
 *
 * @package northarc_capital
 */

get_header(); ?>
<section class="inner-banner">
   <div class="banner-content">
   <div class="breadcrumb"><ul id="breadcrumbs" class="breadcrumbs"><li class="item-home"><a class="bread-link bread-home" href="<?php bloginfo('url');?>" title="Home">Home</a></li><li class="separator separator-home"> / </li><li class="item-cat"><a href="<?php bloginfo('url');?>/blog/"> Blog </a></li><li class="separator"> / </li><li class="item-current "><span class="bread-current" title="<?php the_title();?>"><?php the_title();?></span></li></ul></div>
  <h2 class="text-center"> Blog</h2>
   </div>
</section>


        <section class="blogsecpage">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php //northarc_capital_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

	</div>
                    <div class="col-xs-12 col-sm-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
               


            </div>
            
        </section>

       

<?php get_footer(); ?>