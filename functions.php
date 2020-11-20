<?php
/**
 * Twenty Nineteen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage violet
 * @since Twenty Nineteen 1.0
 */

/**
 * Twenty Nineteen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'violet_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function violet_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'violet' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'violet', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-top' => __( 'Top Menu', 'violet' ),
				'footer' => __( 'Footer Menu', 'violet' ),
				'social' => __( 'Social Links Menu', 'violet' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		// Custom: logo crop disabled
		add_theme_support(
			'custom-logo',
			array(
				// 'height'      => 190,
				// 'width'       => 190,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'violet' ),
					'shortName' => __( 'S', 'violet' ),
					'size'      => 17,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'violet' ),
					'shortName' => __( 'M', 'violet' ),
					'size'      => 24,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'violet' ),
					'shortName' => __( 'L', 'violet' ),
					'size'      => 36,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'violet' ),
					'shortName' => __( 'XL', 'violet' ),
					'size'      => 60,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'coral', 'violet' ),
					'slug'  => 'coral',
					'color' => '#FE574F',
				),
				array(
					'name'  => __( 'peach', 'violet' ),
					'slug'  => 'peach',
					'color' => '#FF7E44',
				),
				array(
					'name'  => __( 'pink', 'violet' ),
					'slug'  => 'pink',
					'color' => '#f2bdb8',
				),
				array(
					'name'  => __( 'darkblue', 'violet' ),
					'slug'  => 'darkblue',
					'color' => '#1b1f39',
				),
				array(
					'name'  => __( 'dustblue', 'violet' ),
					'slug'  => 'dustblue',
					'color' => '#4A4E69',
				),
				array(
					'name'  => __( 'dustblue-lite', 'violet' ),
					'slug'  => 'dustblue-lite',
					'color' => '#5e6379',
				),
				array(
					'name'  => __( 'gray-blue', 'violet' ),
					'slug'  => 'gray-blue',
					'color' => '#B5B4BD',
				),
				array(
					'name'  => __( 'gray-lite', 'violet' ),
					'slug'  => 'gray-lite',
					'color' => '#DCDCDE',
				),
				array(
					'name'  => __( 'gray-dark', 'violet' ),
					'slug'  => 'gray-dark',
					'color' => '#929292',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'violet_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function violet_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'violet' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'violet' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'violet_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function violet_scripts() {
	wp_enqueue_style( 'violet-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

//Custom: Slick Slider https://kenwheeler.github.io/slick/
//jquery included in header.php
	wp_enqueue_script( 'violet-slick-core', get_template_directory_uri() . '/js/slick-1.8.1/slick.min.js' );

	wp_enqueue_script( 'violet-slick-options', get_template_directory_uri() . '/js/slick-config.js' );

	wp_enqueue_style( 'violet-slick-css', get_template_directory_uri() . '/js/slick-1.8.1/slick.css' );
	wp_enqueue_style( 'violet-slick-css-theme', get_template_directory_uri() . '/js/slick-1.8.1/slick-theme.css' );

	// Custom: additional general script
	wp_enqueue_script( 'violet-custom-script', get_theme_file_uri( '/js/custom.js' ), array(), '20200930', true );

	wp_enqueue_style( 'violet-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

}
add_action( 'wp_enqueue_scripts', 'violet_scripts' );


//Custom: Add custom styles to the backend
function admin_style() {
	wp_enqueue_style('backend-tweaks', get_template_directory_uri().'/backend.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

//Custom: Add custom js to the backend
function add_backend_js( $hook ) {
	if ( 'post.php' != $hook ) {
		return;
	}
	wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/js/backend.js');
}
add_action( 'admin_enqueue_scripts', 'add_backend_js' );

//Custom: Add ability to assign menu li class
function add_additional_class_on_li($classes, $item, $args) {
		if(isset($args->li_class)) {
				$classes[] = $args->li_class;
		}
		return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

//Custom: ACF field always visible in editor
add_filter("acf/settings/remove_wp_meta_box", "__return_false");


// Custom: Adding a language class to the body
add_filter('body_class', 'append_language_class');
	function append_language_class($classes){
	$classes[] = 'language-'.ICL_LANGUAGE_CODE; 
	return $classes;
}

// Custom: Disable srcset on frontend
function disable_wp_responsive_images() {
	return 1;
}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');
// end disable srcset

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function violet_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'violet_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function violet_editor_customizer_styles() {

	wp_enqueue_style( 'violet-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'violet-editor-customizer-styles', violet_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'violet_editor_customizer_styles' );





/**
 * Display custom color CSS in customizer and on frontend.
 */
function violet_colors_css_wrap() {

	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );

	$primary_color = 199;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hue', 199 );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint( $primary_color ) . '"' : ''; ?>>
		<?php echo violet_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'violet_colors_css_wrap' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-violet-svg-icons.php';

/**
 * Common theme functions.
 */
require get_template_directory() . '/inc/helper-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
