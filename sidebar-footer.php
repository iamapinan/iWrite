<?php
/**
 * The footer
 *
 * @package Write
 */
if (   ! is_active_sidebar( 'footer-1' )
	&& ! is_active_sidebar( 'footer-2' )
	&& ! is_active_sidebar( 'footer-3' )
	&& ! is_active_sidebar( 'footer-4' )
	&& ! is_active_sidebar( 'instagram-widget' ) ) {
	return;
}
?>

<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
	<div id="supplementary" class="footer-widget-area" role="complementary">
		<div class="footer-widget-table">
			<div class="footer-widget-side">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="footer-widget-1 widget-area">
					<?php do_action('before_footer_left'); ?>
					<?php dynamic_sidebar( 'footer-1' ); ?>
					<?php if( wp_kses_post( get_theme_mod( 'iwrite_enable_site_info' ) ) ): ?>
					<?php do_action('after_footer_left'); ?>
					<?php endif;?>
				</div><!-- .footer-widget-1 -->
				<?php endif; ?>
			</div><!-- .footer-widget-side -->
			<div class="footer-widget-main">
				<div class="footer-widget">
					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="footer-widget-2 widget-area">
						<?php do_action('before_footer_2'); ?>
						<?php dynamic_sidebar( 'footer-2' ); ?>
						<?php do_action('after_footer_2'); ?>
					</div><!-- .footer-widget-2 -->
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="footer-widget-3 widget-area">
						<?php do_action('before_footer_3'); ?>
						<?php dynamic_sidebar( 'footer-3' ); ?>
						<?php do_action('after_footer_3'); ?>
					</div><!-- .footer-widget-3 -->
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<div class="footer-widget-4 widget-area">
						<?php do_action('before_footer_4'); ?>
						<?php dynamic_sidebar( 'footer-4' ); ?>
						<?php do_action('after_footer_4'); ?>
					</div><!-- .footer-widget-4 -->
					<?php endif; ?>
				</div><!-- .footer-widget -->
			</div><!-- .footer-widget-main -->
		</div><!-- .footer-widget-table -->
	</div><!-- #supplementary -->
<?php endif; ?>
