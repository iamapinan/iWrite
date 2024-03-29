<?php
/**
 * Write functions and definitions
 *
 * @package Write
 */

if ( ! function_exists( 'iWrite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function iWrite_setup() {
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 700;
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Write, use a find and replace
	 * to change 'write' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'write', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 700, 0, false );
	add_image_size( 'write-post-thumbnail-large', 1035, 500, true );
	add_image_size( 'write-post-thumbnail-medium', 482, 300, true );

	// This theme uses wp_nav_menu() in two location.
	register_nav_menus( array(
		'primary'       => esc_html__( 'Main Navigation', 'write' ),
		'footer-social' => esc_html__( 'Footer Social', 'write' ),
		'footer-link' => esc_html__( 'Footer Links', 'write' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// Setup the WordPress core custom header feature.
	add_theme_support( 'custom-header', apply_filters( 'write_custom_header_args', array(
		'default-image' => '',
		'width'         => 1035,
		'height'        => 500,
		'flex-height'   => true,
		'header-text'   => false,
	) ) );

	// This theme styles the visual editor to resemble the theme style.
	add_theme_support( 'editor-styles' );
	add_editor_style( array( 'css/editor-style.css' ) );

	// Load plugin requirements
	require get_template_directory() . '/inc/plugin-requirement.php';

}
endif; // iWrite_setup
add_action( 'after_setup_theme', 'iWrite_setup' );

/**
 * Adjust content_width value for full width template.
 */
function write_content_width() {
	if ( is_page_template( 'page_fullwidth.php' ) ) {
		global $content_width;
		$content_width = 1035;
	}
}
add_action( 'template_redirect', 'write_content_width' );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function iwrite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'write' ),
		'id'            => 'footer-1',
		'description'   => __( 'Footer Left widget area is displayed on the left side of the footer. If you do not use the area, nothing will be displayed.', 'write' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'write' ),
		'id'            => 'footer-2',
		'description'   => __( '3 Footer Right widget areas are displayed on the right side of the footer, and the width is auto-adjusted based on how many you use. If you do not use the area, nothing will be displayed.', 'write' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'write' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'write' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'iwrite_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function write_scripts() {
	wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family='.trim(wp_kses_post(get_theme_mod('iwrite_google_font'))), false );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',  array(), '4.2' );
	wp_enqueue_style( 'write-style', get_stylesheet_uri(), array(), '2.1.1' );
	if ( 'ja' == get_bloginfo( 'language' ) ) {
		wp_enqueue_style( 'write-style-ja', get_template_directory_uri() . '/css/ja.css', array(), null );
	}

	wp_enqueue_script( 'write-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160525', true );
	if ( ! get_theme_mod( 'write_hide_navigation' ) ) {
		wp_enqueue_script( 'iscroll', get_template_directory_uri() . '/js/iscroll.js', array( 'jquery' ), '5.2.0' );
		wp_enqueue_script( 'drawer', get_template_directory_uri() . '/js/drawer.js', array( 'jquery' ), '3.2.2' );
		wp_enqueue_style( 'drawer-style', get_template_directory_uri() . '/css/drawer.css', array(), '3.2.2', 'screen and (max-width: 782px)' );
		wp_enqueue_script( 'double-tap-to-go', get_template_directory_uri() . '/js/doubletaptogo.js', array( 'jquery' ), '1.0.0', true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'write-functions', get_template_directory_uri() . '/js/functions.js', array(), '20180907', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20190107', true );
}
add_action( 'wp_enqueue_scripts', 'write_scripts' );

/**
 * Add customizer style to the header.
 */
function iwrite_customizer_css() {
	?>
	<style type="text/css">
		/* Colors */
		<?php if ( $write_link_color = get_theme_mod( 'write_link_color' ) ) : ?>
		.entry-content a, .entry-summary a, .page-content a, .home-text a, .author-profile-description a, .comment-content a {
			color: <?php echo esc_attr( $write_link_color ); ?>;
		}
		<?php endif; ?>
		<?php if ( $write_link_hover_color = get_theme_mod( 'write_link_hover_color' ) ) : ?>
		a:hover {
			color: <?php echo esc_attr( $write_link_hover_color ); ?>;
		}
		<?php endif; ?>

	</style>
	<?php
}
add_action( 'wp_head', 'iwrite_customizer_css' );

/**
* Google Analytic
*/
function iwrite_add_ga() {
	if( get_theme_mod('iwrite_google_ga') != '' ):
	?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo trim(wp_kses_post(get_theme_mod('iwrite_google_ga')));?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', '<?php echo trim(wp_kses_post(get_theme_mod('iwrite_google_ga')));?>');
	</script>
	<?php
	endif;
}
add_action( 'wp_head', 'iwrite_add_ga' );

/**
* Set Google font family
*/
function iwrite_change_font() {
	if( get_theme_mod('iwrite_google_font') != '' ):
	?>
		<style>
			#iwrite_page p, 
			#iwrite_page h1, 
			#iwrite_page h2, 
			#iwrite_page h3, 
			#iwrite_page h4, 
			#iwrite_page h5, 
			#iwrite_page h6, 
			#iwrite_page a,
			#iwrite_page input,
			#iwrite_page select,
			#iwrite_page textarea,
			#iwrite_page button,
			#iwrite_page label {
				font-family: '<?php echo wp_kses_post(get_theme_mod('iwrite_google_font'));?>', sans-serif !important;
			}
		</style>
	<?php
	endif;
}
add_action( 'wp_head', 'iwrite_change_font' );
/**
 * Add custom classes to the body.
 */
function iwrite_body_classes( $classes ) {

	if ( ! get_theme_mod( 'write_hide_navigation' ) ) {
		$classes[] = 'drawer';
	}

	$classes[] = 'header-side';
	$classes[] = 'footer-side';

	if ( is_page_template( 'fullwidth.php' ) || is_404() ) {
		$classes[] = 'full-width';
	} else {
		$classes[] = 'no-sidebar';
	}

	global $post;
	if ( is_singular() && has_post_thumbnail( $post->ID ) ) {
		$classes[] = 'large-thumbnail';
		for ( $i = 0 ; $i < count( $classes ); $i++ ){
			if ( 'no-sidebar' == $classes[$i] ){
				unset( $classes[$i] );
			}
		}
	}

	$footer_widgets = 0;
	$footer_widgets_max = 4;
	for( $i = 2; $i <= $footer_widgets_max; $i++ ) {
		if ( is_active_sidebar( 'footer-' . $i ) ) {
				$footer_widgets++;
		}
	}
	$classes[] = 'footer-' . $footer_widgets;

	if ( get_option( 'show_avatars' ) ) {
		$classes[] = 'has-avatars';
	}

	return $classes;
}
add_filter( 'body_class', 'iwrite_body_classes' );

/**
 * Adds a box to the side column on the Page edit screen.
 */
function iwrite_add_meta_box() {
	add_meta_box( 'write_page_title_display', __( 'Page Title Display', 'write' ), 'write_meta_box_callback', 'page', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'iwrite_add_meta_box' );


/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function write_meta_box_callback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'write_save_meta_box_data', 'write_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	global $post;
	$value = get_post_meta( $post->ID, 'write_hide_page_title', true );
	$checked = ( $value ) ? ' checked="checked"' : '';

	echo '<label for="write_hide_page_title">';
	echo '<input type="checkbox" id="write_hide_page_title" name="write_hide_page_title" value="1"' . $checked . ' />';
	echo __( 'Hide Page Title', 'write' );
	echo '</label>';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function write_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['write_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['write_meta_box_nonce'], 'write_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) ) {
		return;
	}

	/* OK, it's safe for us to save the data now. */

	// Sanitize user input.
	$my_data = write_sanitize_checkbox( $_POST['write_hide_page_title'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'write_hide_page_title', $my_data );
}
add_action( 'save_post', 'write_save_meta_box_data' );
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom widgets for this theme.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Load template functions.
 */
require get_template_directory() . '/inc/template-functions.php';