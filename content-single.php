<?php
/**
 * The template used for displaying single post.
 *
 * @package Write
 */
?>

<div class="post-full post-full-summary">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<div class="entry-float">
				<?php if ( is_sticky() && is_home() && ! is_paged() ): ?>
				<div class="featured"><?php esc_html_e( 'Featured', 'write' ); ?></div>
				<?php endif; ?>
			</div><!-- .entry-float -->
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php write_author_profile(); ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array(	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'write' ), 'after'  => '</div>', 'pagelink' => '<span class="page-numbers">%</span>',  ) ); ?>
		</div><!-- .entry-content -->
		<div class="row my-3">
			<div class="col">
				<div class="subscription">
					Send this to <input type="text" placeholder="Email address">
					<button type="submit">
						Submit
					</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<?php write_footer_meta(); ?>
				
			</div>
		</div>



	</article><!-- #post-## -->
</div><!-- .post-full -->

<?php write_post_nav(); ?>

<?php if ( class_exists( 'Jetpack_RelatedPosts' ) ) : ?>
	<?php echo do_shortcode( '[jetpack-related-posts]' ); ?>
<?php endif; ?>