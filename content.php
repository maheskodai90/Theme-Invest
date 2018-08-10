<?php
/**
 * @package northarc_capital
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'northarc_capital-featured', array( 'class' => 'thumbnail' )); ?></a>
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-8">
			<?php northarc_capital_posted_on(); ?> 
			<h2 class="blog-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php $authorname = get_field( 'author_name_designation');?>
			<?php if($authorname):?><span class="postauthor">By <?php echo $authorname;?></span><?php endif;?>
			<?php the_excerpt(); ?>
			
		</div>
	</div>
</article><!-- #post-## -->
