<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Write
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<img src="<?php echo get_template_directory_uri() . '/images/404.png';?>" class="page-not-found-image">
				<h1 class="page-title"><?php esc_html_e( 'That page can&rsquo;t be found.', 'write' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'write' ); ?></p>

				<?php get_search_form(); ?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
