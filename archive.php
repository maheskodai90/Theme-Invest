<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package northarc_capital
 */

get_header(); ?>

<section class="inner-banner">
   <div class="banner-content">
     <div class="breadcrumb"><ul id="breadcrumbs" class="breadcrumbs"><li class="item-home"><a class="bread-link bread-home" href="<?php bloginfo('url');?>" title="Home">Home</a></li><li class="separator separator-home"> / </li><li class="item-current "><span class="bread-current" title="<?php the_title();?>">Blog</span></li></ul></div>
  <h2 class="text-center"> Blog</h2>
   </div>
</section>

        <section class="blogsecpage">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
							if ( is_category() ) :
								single_cat_title();

							elseif ( is_tag() ) :
								single_tag_title();

							elseif ( is_author() ) :
								printf( __( 'Author: %s', 'northarc_capital' ), '<span class="vcard">' . get_the_author() . '</span>' );

							elseif ( is_day() ) :
								printf( __( 'Day: %s', 'northarc_capital' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( __( 'Month: %s', 'northarc_capital' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'northarc_capital' ) ) . '</span>' );

							elseif ( is_year() ) :
								printf( __( 'Year: %s', 'northarc_capital' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'northarc_capital' ) ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								_e( 'Asides', 'northarc_capital' );

							elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
								_e( 'Galleries', 'northarc_capital');

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'Images', 'northarc_capital');

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'Videos', 'northarc_capital' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'Quotes', 'northarc_capital' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'Links', 'northarc_capital' );

							elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
								_e( 'Statuses', 'northarc_capital' );

							elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
								_e( 'Audios', 'northarc_capital' );

							elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
								_e( 'Chats', 'northarc_capital' );

							else :
								_e( 'Archives', 'northarc_capital' );

							endif;
						?>
					</h1>
					<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif;
					?>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				 <?php wp_pagenavi(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		
	</div>
                    <div class="col-xs-12 col-sm-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
               


            </div>
            
        </section>

       

<?php get_footer(); ?>