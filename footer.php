<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Write
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer bg-dark">
		<div class="container">			
			<?php get_sidebar( 'footer' ); ?>
	
			<div class="site-bottom">
				<div class="site-bottom-table">
					<div class="footer-copyright">
						<p>&copy; <?php echo get_bloginfo('name');?></p> 
					</div>
					<nav id="footer-link" class="footer-link">
						<!-- Link -->
						<?php if ( has_nav_menu( 'footer-link' ) ) : ?>
							<?php wp_nav_menu( array( 'theme_location' => 'footer-link', 'depth' => 1, 'link_before'  => '<span class="footer-link-items">', 'link_after'  => '</span>' ) ); ?>
						<?php endif; ?>
						<?php if ( has_nav_menu( 'footer-link' ) && has_nav_menu( 'footer-social' ) ) : ?>
						<div class="divider"></div>
						<?php endif; ?>
						<!-- Social -->
						<?php if ( has_nav_menu( 'footer-social' ) ) : ?>
							<?php wp_nav_menu( array( 'theme_location' => 'footer-social', 'depth' => 1, 'link_before'  => '<span class="footer-link-items">', 'link_after'  => '</span>' ) ); ?>
						<?php endif; ?>

					</nav><!-- #footer-link -->
				</div><!-- .site-bottom-table -->
			</div><!-- .site-bottom -->
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->
<div class="position-fixed px-3 py-2 gotoTop rounded"><span class="dashicons dashicons-arrow-up-alt2"></span></div>
<?php wp_footer(); ?>

</body>
</html>
