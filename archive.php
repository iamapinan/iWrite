<?php
/**
 * The template for displaying archive pages.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Write
 */

get_header(); ?>

<section id="primary">
	<main id="main" class="site-main site-category">

	<?php if ( have_posts() ) : ?>

		<header class="archive-header">
			<?php
				the_archive_title( '<h1 class="iwrite-category-title mt-5">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
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
