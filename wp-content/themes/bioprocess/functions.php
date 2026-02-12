<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('twenty_twenty_one_setup')) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Twenty-One, use a find and replace
		 * to change 'twentytwentyone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('twentytwentyone', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support('title-tag');

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(1568, 9999);

		register_nav_menus(
			array(
				'primary' => esc_html__('Primary menu', 'twentytwentyone'),
				'footer'  => esc_html__('Secondary menu', 'twentytwentyone'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');

		// Add support for editor styles.
		add_theme_support('editor-styles');
		$background_color = get_theme_mod('background_color', 'D1E4DD');
		if (127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex($background_color)) {
			add_theme_support('dark-editor-style');
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ($is_IE) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style($editor_stylesheet_path);

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__('Extra small', 'twentytwentyone'),
					'shortName' => esc_html_x('XS', 'Font size', 'twentytwentyone'),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__('Small', 'twentytwentyone'),
					'shortName' => esc_html_x('S', 'Font size', 'twentytwentyone'),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__('Normal', 'twentytwentyone'),
					'shortName' => esc_html_x('M', 'Font size', 'twentytwentyone'),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__('Large', 'twentytwentyone'),
					'shortName' => esc_html_x('L', 'Font size', 'twentytwentyone'),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__('Extra large', 'twentytwentyone'),
					'shortName' => esc_html_x('XL', 'Font size', 'twentytwentyone'),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__('Huge', 'twentytwentyone'),
					'shortName' => esc_html_x('XXL', 'Font size', 'twentytwentyone'),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__('Gigantic', 'twentytwentyone'),
					'shortName' => esc_html_x('XXXL', 'Font size', 'twentytwentyone'),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__('Black', 'twentytwentyone'),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__('Dark gray', 'twentytwentyone'),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__('Gray', 'twentytwentyone'),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__('Green', 'twentytwentyone'),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__('Blue', 'twentytwentyone'),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__('Purple', 'twentytwentyone'),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__('Red', 'twentytwentyone'),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__('Orange', 'twentytwentyone'),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__('Yellow', 'twentytwentyone'),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__('White', 'twentytwentyone'),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__('Purple to yellow', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to purple', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__('Green to yellow', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to green', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__('Red to yellow', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to red', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__('Purple to red', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__('Red to purple', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if (is_customize_preview()) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support('starter-content', twenty_twenty_one_get_starter_content());
		}

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Add support for custom line height controls.
		add_theme_support('custom-line-height');

		// Add support for experimental link color control.
		add_theme_support('experimental-link-color');

		// Add support for experimental cover block spacing.
		add_theme_support('custom-spacing');

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support('custom-units');

		// Remove feed icon link from legacy RSS widget.
		add_filter('rss_widget_feed_link', '__return_empty_string');
	}
}
add_action('after_setup_theme', 'twenty_twenty_one_setup');

/**
 * Register widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init()
{

	register_sidebar(
		array(
			'name'          => esc_html__('Footer', 'twentytwentyone'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'twenty_twenty_one_widgets_init');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('twenty_twenty_one_content_width', 750);
}
add_action('after_setup_theme', 'twenty_twenty_one_content_width', 0);

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_scripts()
{
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ($is_IE) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style('twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get('Version'));
	} else {
		// If not IE, use the standard stylesheet.
		//wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	// RTL styles.
	wp_style_add_data('twenty-twenty-one-style', 'rtl', 'replace');

	// Print styles.
	wp_enqueue_style('twenty-twenty-one-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get('Version'), 'print');

	// Threaded comment reply styles.
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// Register the IE11 polyfill file.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills-asset',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get('Version'),
		true
	);

	// Register the IE11 polyfill loader.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get('Version'),
		true
	);
	wp_add_inline_script(
		'twenty-twenty-one-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'twenty-twenty-one-ie11-polyfills-asset',
			)
		)
	);

	// Main navigation scripts.
	if (has_nav_menu('primary')) {
		wp_enqueue_script(
			'twenty-twenty-one-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array('twenty-twenty-one-ie11-polyfills'),
			wp_get_theme()->get('Version'),
			true
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'twenty-twenty-one-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array('twenty-twenty-one-ie11-polyfills'),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('wp_enqueue_scripts', 'twenty_twenty_one_scripts');

/**
 * Enqueue block editor script.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_block_editor_script()
{

	wp_enqueue_script('twentytwentyone-editor', get_theme_file_uri('/assets/js/editor.js'), array('wp-blocks', 'wp-dom'), wp_get_theme()->get('Version'), true);
}

add_action('enqueue_block_editor_assets', 'twentytwentyone_block_editor_script');

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix()
{

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	} else {
		// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
?>
<script>
/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window
    .addEventListener("hashchange", (function() {
        var t, e = location.hash.substring(1);
        /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i
            .test(t.tagName) || (t.tabIndex = -1), t.focus())
    }), !1);
</script>
<?php
	}
}
add_action('wp_print_footer_scripts', 'twenty_twenty_one_skip_link_focus_fix');

/**
 * Enqueue non-latin language styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_non_latin_languages()
{
	$custom_css = twenty_twenty_one_get_non_latin_css('front-end');

	if ($custom_css) {
		wp_add_inline_style('twenty-twenty-one-style', $custom_css);
	}
}
add_action('wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages');

// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
new Twenty_Twenty_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
new Twenty_Twenty_One_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
new Twenty_Twenty_One_Dark_Mode();

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_preview_init()
{
	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri('/assets/js/customize-helpers.js'),
		array(),
		wp_get_theme()->get('Version'),
		true
	);

	wp_enqueue_script(
		'twentytwentyone-customize-preview',
		get_theme_file_uri('/assets/js/customize-preview.js'),
		array('customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers'),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('customize_preview_init', 'twentytwentyone_customize_preview_init');

/**
 * Enqueue scripts for the customizer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts()
{

	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri('/assets/js/customize-helpers.js'),
		array(),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts');

/**
 * Calculate classes for the main <html> element.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes()
{
	/**
	 * Filters the classes for the main <html> element.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @param string The list of classes. Default empty string.
	 */
	$classes = apply_filters('twentytwentyone_html_classes', '');
	if (!$classes) {
		return;
	}
	echo 'class="' . esc_attr($classes) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_add_ie_class()
{
	?>
<script>
if (-1 !== navigator.userAgent.indexOf('MSIE') || -1 !== navigator.appVersion.indexOf('Trident/')) {
    document.body.classList.add('is-IE');
}
</script>
<?php
}
add_action('wp_footer', 'twentytwentyone_add_ie_class');

if (!function_exists('wp_get_list_item_separator')) :
	/**
	 * Retrieves the list item separator based on the locale.
	 *
	 * Added for backward compatibility to support pre-6.0.0 WordPress versions.
	 *
	 * @since 6.0.0
	 */
	function wp_get_list_item_separator()
	{
		/* translators: Used between list items, there is a space after the comma. */
		return __(', ', 'twentytwentyone');
	}
endif;



//Site Setting
function post_type_custom_settings()
{
	register_post_type(
		'option_settings',
		array(
			'label' => __('Site Settings'),
			'public' => TRUE,
			'publicly_queryable' => TRUE,
			'show_ui' => TRUE,
			'rewrite' => TRUE,
			'query_var' => TRUE,
			'menu_icon' => 'dashicons-admin-tools',
			'supports' => array('title'),
			'rewrite' => array('slug' => 'option_settings', 'with_front' => FALSE,),
		)
	);
}
add_action('init', 'post_type_custom_settings');


function setup_site_settings()
{

	global $header_logo;
	global $footer_logo;
	global $phone_number;
	global $email_id;
	global $office_days;
	global $office_time;
	global $address;

	global $facebook;
	global $twitter;
	global $youtube;

	$type = 'option_settings';
	$args = array(
		'post_type' => $type,
		'post_status' => 'publish',
		'posts_per_page' => '1',
		'caller_get_posts' => 1
	);
	$my_query = null;
	$my_query = new WP_Query($args);
	if ($my_query->have_posts()) {
		while ($my_query->have_posts()) : $my_query->the_post();
			$post_id = get_the_ID();

			$header_logo 	= 	get_field("header_logo", $post_id);
			$footer_logo	=	get_field("footer_logo", $post_id);
			$phone_number	=	get_field("phone_number", $post_id);
			$email_id		=	get_field("email_id", $post_id);
			$office_days	=	get_field("office_days", $post_id);
			$office_time	=	get_field("office_time", $post_id);
			$address		=	get_field("address", $post_id);

			$facebook  		=	get_field("facebook", $post_id);
			$twitter		=	get_field("twitter", $post_id);
			$youtube		=	get_field("youtube", $post_id);
		endwhile;
	}
}
add_action('init', 'setup_site_settings');

//Custom Team Post Type
function custom_teams()
{
	$labels = array(
		'name'               => ('Teams'),
		'singular_name'      => ('Team'),
		'add_new'            => ('Add Team'),
		'add_new_item'       => ('Add New Team'),
		'edit_item'          => ('Edit Team'),
		'new_item'           => ('New Team'),
		'all_items'          => ('All Team'),
		'view_item'          => ('View Team'),
		'search_items'       => ('Search Teams'),
		'not_found'          => ('No Team found'),
		'not_found_in_trash' => ('No Teams found in the Trash'),
		'parent_item_colon'  => '',
		'menu_name'          => 'Our Teams'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds photo and photos specific data',
		'public'        => true,
		'menu_position' => 23,
		'supports' => array('title', 'editor', 'thumbnail', 'tags'),
		'has_archive'   => true,
		'menu_icon'   => 'dashicons-portfolio',
	);
	register_post_type('teams', $args);
}

add_action('init', 'custom_teams');

//End Team Post Type


//Start Custom Career
function custom_career()
{
	$labels = array(
		'name'               => ('Career'),
		'singular_name'      => ('Career'),
		'add_new'            => ('Add Career'),
		'add_new_item'       => ('Add New Career'),
		'edit_item'          => ('Edit Career'),
		'new_item'           => ('New Career'),
		'all_items'          => ('All Career'),
		'view_item'          => ('View Career'),
		'search_items'       => ('Search Career'),
		'not_found'          => ('No Career found'),
		'not_found_in_trash' => ('No Career found in the Trash'),
		'parent_item_colon'  => '',
		'menu_name'          => 'Career'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds photo and photos specific data',
		'public'        => true,
		'menu_position' => 24,
		'supports' => array('title', 'editor', 'thumbnail', 'tags'),
		'has_archive'   => true,
		'menu_icon'   => 'dashicons-welcome-learn-more',
	);
	register_post_type('career', $args);
}

add_action('init', 'custom_career');

//End Career

function get_post_view_count($post_id)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($post_id, $count_key, true);
	if ($count === '') {
		return 0;
	}
	return $count;
}

function set_post_view_count($post_id)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($post_id, $count_key, true);
	if ($count === '') {
		$count = 0;
		delete_post_meta($post_id, $count_key);
		add_post_meta($post_id, $count_key, '1');
	} else {
		$count++;
		update_post_meta($post_id, $count_key, $count);
	}
}

function custom_pagination($query = null)
{
	global $wp_query;

	$query = $query ? $query : $wp_query;
	$total_pages = $query->max_num_pages;

	if ($total_pages > 1) {
		$current_page = max(1, get_query_var('paged'));

		echo '<div class="pagination">';
		echo paginate_links(array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => 'page/%#%',
			'current' => $current_page,
			'total' => $total_pages,
			'prev_text' => '&laquo; Previous',
			'next_text' => 'Next &raquo;',
			'type' => 'list',
		));
		echo '</div>';
	}
}
//Custom products
function custom_products()
{
	$labels = array(
		'name'               => ('Products'),
		'singular_name'      => ('Product'),
		'add_new'            => ('Add Product'),
		'add_new_item'       => ('Add New Product'),
		'edit_item'          => ('Edit Product'),
		'new_item'           => ('New Product'),
		'all_items'          => ('All Product'),
		'view_item'          => ('View Product'),
		'search_items'       => ('Search products'),
		'not_found'          => ('No photo found'),
		'not_found_in_trash' => ('No photo found in the Trash'),
		'parent_item_colon'  => '',
		'menu_name'          => 'Products'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds photo and photos specific data',
		'public'        => true,
		'menu_position' => 25,
		'supports' => array('title', 'excerpt', 'editor', 'thumbnail', 'tags'),
		'has_archive'   => true,
		'menu_icon'	=> 'dashicons-cart',
	);
	register_post_type('products', $args);
}
function products_categories()
{
	$labels = array(
		'name' => _x('Products Categories', 'taxonomy general name'),
		'singular_name' => 'Product Category',
		'search_items' =>  __('Search Products Categories'),
		'all_items' => __('All Products Categories'),
		'parent_item' => __('Parent Products Categories'),
		'parent_item_colon' => __('Parent  Products Category:'),
		'edit_item' => __('Edit  Products Category'),
		'update_item' => __('Update  Products Category'),
		'add_new_item' => __('Add New Products Category'),
		'new_item_name' => __('New Products Category'),
	);
	register_taxonomy('products_categories', array('products'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'show_in_nav_menus' => true,
		'rewrite' => array('slug' => 'products-categories', 'with_front' => false),
	));
}
if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url();
add_action('init', 'custom_products');
add_action('init', 'products_categories');

//Start Custom Partners
function custom_partners()
{
	$labels = array(
		'name'               => ('Partners'),
		'singular_name'      => ('Partner'),
		'add_new'            => ('Add Partner'),
		'add_new_item'       => ('Add New Partner'),
		'edit_item'          => ('Edit Partner'),
		'new_item'           => ('New Partner'),
		'all_items'          => ('All Partner'),
		'view_item'          => ('View Partner'),
		'search_items'       => ('Search Partner'),
		'not_found'          => ('No Partner found'),
		'not_found_in_trash' => ('No Partner found in the Trash'),
		'parent_item_colon'  => '',
		'menu_name'          => 'Partners'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds photo and photos specific data',
		'public'        => true,
		'menu_position' => 24,
		'supports' => array('title', 'editor', 'thumbnail', 'tags'),
		'has_archive'   => true,
		'menu_icon'   => 'dashicons-businessman',
	);
	register_post_type('partners', $args);
}

add_action('init', 'custom_partners');

//End Partners


function subh_set_post_view($postID)
{

	$count_key = 'post_views_count';
	$count = (int) get_post_meta($postID, $count_key, true);

	if ($count == 0) {
		$count++;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, $count++);
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

function getPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	return $count . ' Views';
}

/**
 * Add a new column in the admin panel posts list
 *
 * @param $defaults
 *
 * @return mixed
 */
function subh_posts_column_views($defaults)
{
	$defaults['post_views'] = __('Views');

	return $defaults;
}

/**
 * Display the number of views for each posts on the admin panel
 *
 * @param $column_name
 * @param $id
 *
 * @return void simply echo out the number of views
 */
function subh_posts_custom_column_views($column_name, $id)
{
	if ($column_name === 'post_views') {
		echo getPostViews(get_the_ID());
	}
}

add_filter('manage_posts_columns', 'subh_posts_column_views');
add_action('manage_posts_custom_column', 'subh_posts_custom_column_views', 5, 2);

function add_class_to_href($classes, $item)
{
	if (in_array('current_page_item', $item->classes)) {
		$classes['class'] = 'active';
	}
	return $classes;
}
add_filter('nav_menu_link_attributes', 'add_class_to_href', 10, 2);

function new_excerpt_length($length)
{
	return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');


//Start Custom Certficates
function custom_certificate()
{
	$labels = array(
		'name'               => ('Certificates'),
		'singular_name'      => ('Certificate'),
		'add_new'            => ('Add Certificate'),
		'add_new_item'       => ('Add New Certificate'),
		'edit_item'          => ('Edit Certificate'),
		'new_item'           => ('New Certificate'),
		'all_items'          => ('All Certificate'),
		'view_item'          => ('View Certificate'),
		'search_items'       => ('Search Certificate'),
		'not_found'          => ('No Certificate found'),
		'not_found_in_trash' => ('No Certificate found in the Trash'),
		'parent_item_colon'  => '',
		'menu_name'          => 'Certificates'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds photo and photos specific data',
		'public'        => true,
		'menu_position' => 26,
		'supports' => array('title', 'thumbnail', 'tags'),
		'has_archive'   => true,
		'menu_icon'   => 'dashicons-pdf',
	);
	register_post_type('certificates', $args);
}

add_action('init', 'custom_certificate');

//End Partners

function enqueue_custom_scripts()
{
	wp_enqueue_script('custom-ajax', get_template_directory_uri() . '/assets/js/custom-ajax.js', array('jquery'), '1.0', true);
	wp_localize_script('custom-ajax', 'customAjax', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('custom_ajax_nonce')
	));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function custom_ajax_handler()
{
	// Check the nonce for security
	if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'custom_ajax_nonce')) {
		die('Invalid nonce');
	}

	// Get the search term from the Ajax request
	$search_term = sanitize_text_field($_POST['search_term']);

	// Perform the query to find the custom post type
	$args = array(
		'post_type' => 'certificates', // Replace with the name of your custom post type
		's' => $search_term,
	);

	// Check if the search query contains only one word
	if (strpos(trim($search_term), ' ') === false) {
		// Add a custom parameter for exact word match
		$args['exact_word_match'] = true;
	}

	$query = new WP_Query($args);

	// Process the query result
	ob_start();
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			// Output the post data or use a template part to display the content
			get_template_part('template-parts/content/content-cert', 'your_custom_post_type');
		}
	} else {
		echo '<p>No results found</p>';
	}
	$output = ob_get_clean();

	echo $output;
	wp_die();
}
add_action('wp_ajax_custom_ajax_search', 'custom_ajax_handler');
add_action('wp_ajax_nopriv_custom_ajax_search', 'custom_ajax_handler'); // For non-logged in users

function custom_exact_word_match_search($clauses, $query)
{
	global $wpdb;

	if ($query->is_search() && $query->get('exact_word_match')) {
		// Get the search term
		$search_term = $query->get('s');

		// Specify the custom post type(s) for which you want to apply exact word match
		$post_type = 'certificates';

		// Modify the search SQL query for the specified post type
		// if ($query->get('post_type') === $post_type) {
		// Prepare the search term for exact word match
		// $search_term = $wpdb->esc_like($search_term);
		// $search_term = '^' . $search_term . '$';

		// // Apply the exact word match filter
		// $clauses['where'] = preg_replace(
		// 	"/{$wpdb->posts}.post_title LIKE (\'[^\']+\')/",
		// 	"{$wpdb->posts}.post_title REGEXP '$search_term'",
		// 	$clauses['where']
		// );
		//}

		//custom code
		$current_date = date('Y-m-d');
		if ($query->get('post_type') === $post_type) {
			$sql = "select * from wp_posts where post_title='" . trim($search_term) . "' and post_status='publish' and post_type='certificates' and DATEDIFF(CURDATE(), post_date) <= 180";
			$search_term = $wpdb->query($sql);
			// $search_term = $wpdb->query("SELECT * FROM wp_posts WHERE post_title = '" . $search_term . "' AND post_status='publish' AND post_type='certificates' AND DATEDIFF(CURDATE(), post_date) <= 180");
		}
	}
	return $clauses;
}
add_filter('posts_clauses', 'custom_exact_word_match_search', 10, 2);


function custom_admin_page() {
    add_menu_page(
        'Sketch Submissions',
        'Sketch Submissions',
        'manage_options',
        'sketch-submissions',
        'render_sketch_submissions_page'
    );
}
add_action('admin_menu', 'custom_admin_page');


function render_sketch_submissions_page() {
    // Include the WP_List_Table class
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');

    // Create a class that extends WP_List_Table
    class Sketch_Submissions_Table extends WP_List_Table {
        function __construct() {
            parent::__construct([
                'singular' => 'submission',
                'plural'   => 'submissions',
                'ajax'     => false
            ]);
        }

        function prepare_items() {
            // Define the columns and table data
            $columns = $this->get_columns();
            $hidden = [];
            $sortable = $this->get_sortable_columns();
            $data = $this->table_data();

            // Set column headers
            $this->_column_headers = [$columns, $hidden, $sortable];

            // Paginate the data
            $per_page = 10;
            $current_page = $this->get_pagenum();
            $total_items = count($data);
            $this->set_pagination_args([
                'total_items' => $total_items,
                'per_page'    => $per_page
            ]);

            // Slice the data to display the current page
            $this->items = array_slice($data, (($current_page - 1) * $per_page), $per_page);
        }

        function get_columns() {
            return [
                'cb'        => '<input type="checkbox" />',
                'username'  => 'Username',
                'email'     => 'Email',
                'phone'     => 'Phone',
                'company'   => 'Company',
                'image'     => 'Image',
                'created'   => 'Created',
            ];
        }

        function get_sortable_columns() {
            return [
                'username'  => ['username', false],
                'email'     => ['email', false],
                'created'   => ['created', false],
            ];
        }

        function table_data() {
		    // Retrieve data from the 'wp_sketch' table in descending order of a specific column (e.g., 'created')
		    global $wpdb;
		    $results = $wpdb->get_results('SELECT * FROM wp_sketch ORDER BY created DESC', ARRAY_A);
		    return $results;
		}

        function column_default($item, $column_name) {
		    if ($column_name === 'image') {
		        if (!empty($item['image']) && strpos($item['image'], 'data:image/png;base64') === 0) {
		            // Add an anchor tag around the image with target="_blank" to open in a new tab
		            // return '<a href="' . esc_attr($item['image']) . '" target="_blank"><img src="' . esc_attr($item['image']) . '" alt="Image" style="max-width: 100px; background-color: #fffdfd; border: 1px solid #cacaca;" /></a>';
		            return '<a href="'.admin_url().'view-sketch.php?sketchid='.$item['id'].'" ><img src="' . esc_attr($item['image']) . '" alt="Image" style="max-width: 100px; background-color: #fffdfd; border: 1px solid #cacaca;" /></a>';
		        } else {
		            return 'No Image';
		        }
		    }

		    return $item[$column_name];
		}
    }

    // Create an instance of your custom table
    $submissions_table = new Sketch_Submissions_Table();
    $submissions_table->prepare_items();

    // Display the table
    echo '<div class="wrap"><h2>Sketch Submissions</h2>';
    $submissions_table->display();
    echo '</div>';
}

add_action('template_redirect', 'smart_product_category_redirect', 5);
function smart_product_category_redirect() {
    if (!is_tax('products_categories')) return;
    
    $term = get_queried_object();
    $term_id = $term->term_id;   
    
    // Method 1: WP_Query
    $total_query = new WP_Query(array(
        'post_type' => 'products',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'products_categories',
                'field' => 'term_id',
                'terms' => $term_id,
            ),
        ),
    ));
    $wp_query_count = $total_query->found_posts;
    
    // Method 2: get_posts
    $get_posts = get_posts(array(
        'post_type' => 'products',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'fields' => 'ids',
        'tax_query' => array(
            array(
                'taxonomy' => 'products_categories',
                'field' => 'term_id',
                'terms' => $term_id,
            ),
        ),
    ));
    $get_posts_count = count($get_posts);
    
    // Method 3: Direct DB Query (MOST ACCURATE)
    global $wpdb;
    $db_count = $wpdb->get_var($wpdb->prepare("
        SELECT COUNT(*) 
        FROM {$wpdb->posts} p 
        INNER JOIN {$wpdb->term_relationships} tr ON p.ID = tr.object_id
        INNER JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
        WHERE p.post_type = 'products' 
        AND p.post_status = 'publish' 
        AND tt.term_id = %d
    ", $term_id));
    
    // STRICT CHECK - DB count only
    if ($db_count != 1) {
        return; // NO REDIRECT
    }
    
    // Name match check
    $match_query = new WP_Query(array(
        'post_type' => 'products',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        's' => $term->name,
        'tax_query' => array(
            array(
                'taxonomy' => 'products_categories',
                'field' => 'term_id',
                'terms' => $term_id,
            ),
        ),
    ));
    
    if ($match_query->found_posts == 1) {
       	wp_redirect(get_permalink($match_query->posts[0]->ID), 301);
        exit;
    }
}