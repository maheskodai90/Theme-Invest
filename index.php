<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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