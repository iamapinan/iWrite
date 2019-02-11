<?php
/**
 * The template for displaying search results pages.
 *
 * @package Write
 */

get_header(); ?>

<section id="primary">
	<main id="main" class="site-main site-category">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'write' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header><!-- .page-header -->

		<div class="row mt-5">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; ?>

		<?php
		the_posts_pagination( array(
			'prev_text' => esc_html__( '&laquo; Previous', 'write' ),
			'next_text' => esc_html__( 'Next &raquo;', 'write' ),
		) );
		?>
		</div>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

	</main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>
