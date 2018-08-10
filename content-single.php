<?php
/**
 * @package northarc_capital
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="blog-title"><?php the_title(); ?></h2>
	<?php $authorname = get_field( 'author_name_designation');?>
			<?php if($authorname):?><span class="postauthor">By <?php echo $authorname;?></span><?php endif;?>
	<?php northarc_capital_posted_on(); ?> 

	<div class="postthumbnail">
		<?php the_post_thumbnail( 'northarc_capital-featured', array( 'class' => 'thumbnail' )); ?>		
	</div>

	<div class="entry-content">
		<?php the_content(); ?>		
	</div><!-- .entry-content -->
	<div class="sharevia">
		<span>Share via:</span> <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="fa fa-facebook"></a>
		<a href="http://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank" class="fa fa-twitter"></a>
		<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&summary=" target="_blank" class="fa fa-linkedin"></a>
		<a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" class="fa fa-envelope"></a>
	</div>
</article><!-- #post-## -->
