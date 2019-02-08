<?php
/**
 * The template for displaying category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package iWrite
 */

get_header(); ?>

<section id="primary" class="site-main">
	<main id="main" class="site-main site-category">

	<?php if ( have_posts() ) : ?>
		<header class="archive-header">
	
	
			<!-- category featured image -->
			<?php
				if (z_taxonomy_image_url() != null) {
					?>
					<img src="<?php echo z_taxonomy_image_url(); ?>">
					<h1 class="archive-title"><?php echo '<span>' . single_cat_title( '', false ) . '</span>'; ?></h1>
			<?php
				} else {
					?>
					<h1 class="iwrite-category-title mt-5"><?php echo '<span>' . single_cat_title( '', false ) . '</span>'; ?></h1>
					<?php
				}
			?>			
			

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
		</header><!-- .archive-header -->

		<?php /* Start the Loop */ ?>
		<div class="row justify-content-between mt-5">
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

<?php 

get_footer(); 
?>
