<?php
/**
 * @package Write
 */
?>

<div class="col-md-4 col-12 card">
	<article id="post-<?php the_ID(); ?>">
			<?php if(has_post_thumbnail( $post->ID )):?>
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					<div class="iwrite_post_thumbnail card-img-top" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'medium_large');?>);">
					</div>
				</a>
			<?php endif;?>
		<header class="card-body">
			<h4 class="card-text"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
			<div class="card-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		</header><!-- .entry-header -->
	</article><!-- #post-## -->

</div><!-- .post-summary -->