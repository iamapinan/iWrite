<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Write
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="iwrite_page" class="hfeed">
	<div class="header shadow-sm">
	<header id="masthead" class="site-header navbar">
		<div class="site-top container">
			<div class="site-top-table">
				<div class="site-branding">
				<?php if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				} ?>
				<?php write_site_title(); ?>
				<div class="site-description"><?php bloginfo( 'description' ); ?></div>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button class="drawer-toggle drawer-hamburger">
						<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'write' ); ?></span>
						<span class="drawer-hamburger-icon"></span>
					</button>
					<div class="drawer-nav">
						<div class="drawer-content">
							<div class="drawer-content-inner">
							<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
						</div><!-- .drawer-content-inner -->
					</div><!-- .drawer-content -->
				</div><!-- .drawer-nav -->
			</nav><!-- #site-navigation -->
			<!-- search -->
			<?php if ( get_theme_mod( 'iwrite_show_search' ) ) : ?>
				<?php get_search_form(); ?>
			<?php endif; ?>

			</div><!-- .site-top-table -->
		</div><!-- .site-top -->

	</header><!-- #masthead -->
	</div>
	<div id="content" class="site-content container drawer">
