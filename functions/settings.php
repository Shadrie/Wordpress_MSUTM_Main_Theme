<?php
/**
 * Functions used for theme setup and initial configuration
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

/**
 * Setting up the theme and adding support for WordPress features
 */
function msutm_setup() {
	load_theme_textdomain( 'msutm-main-theme', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 400,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
		),
	);
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150 );
	register_nav_menus(
		array(
			'menu-1' => __( 'Primary', 'msutm-main-theme' ),
			'menu-2' => __( 'Header Menu', 'msutm-main-theme' ),
			'footer' => __( 'Footer Menu', 'msutm-main-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'msutm_setup' );

/**
 * Hooking in atts setup for queue and changing numbers of posts
 * Due to design choice of category pages displaying 4 cols on desktop, 3 cols on tablet and 1 col om mobile, 12 items seems like an optimal choice
 */
add_action(
	'pre_get_posts',
	function ( $q ) {
		if ( ! is_admin() ) {
			if ( $q->is_main_query() ) {
				$q->set( 'posts_per_page', 12 );
			}
		}
	}
);

/* Setting excerpt length to be 15 words*/
add_filter(
	'excerpt_length',
	function() {
		return 15;
	}
);

/* If excerpt length exceeds max words set, add '...' */
add_filter(
	'excerpt_more',
	function( $more ) {
		return '...';
	}
);

/* Change basic archive titles */
add_filter(
	'get_the_archive_title',
	function ( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		}
		return $title;
	}
);

/**
 * Disable author archive as author feature is unused
 */
function disable_author_page() {
	if ( is_author() ) {
		// Redirect to homepage, set status to 301 permenant redirect.
		// Function defaults to 302 temporary redirect.
		wp_safe_redirect( get_option( 'home' ), 301 );
		exit;
	}
}
flush_rewrite_rules( false );
remove_action( 'template_redirect', 'redirect_canonical' );
add_action( 'template_redirect', 'disable_author_page' );

/**
 * Images bigger than 2560px will be reduced
 */
function img_size_change() {
	return 2560;
}
add_filter( 'big_image_size_threshold', 'img_size_change' );

/**
 * Unused image sizes will not be generated
 *
 * @param array $sizes Array of image sized used in the theme.
 */
function unset_images( $sizes ) {
	unset( $sizes['medium_large'] );
	unset( $sizes['large'] );
	return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'unset_images' );

/**
 * Do not replace quotes into smart quotes, etc
 */
add_filter( 'run_wptexturize', '__return_false' );

/**
 * Allow permalinks to include capital letters
 */
add_filter( 'custom_permalinks_allow_caps', '__return true' );

/**
 * Allow svg upload and usage
 *
 * @param array $mimes Mime types used.
 */
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

/**
 * Styles for admin pages
 */
function my_admin_print_scripts() {
	?>
	<style>
		.cf-radio-image.glyphter img { width: 5vw; }
		.cf-container-term-meta .cf-radio-image.glyphter img { width: 10vw; }
		.edit-post-layout__metaboxes { overflow: hidden; }
		.block-editor .cf-container__fields .cf-field { padding: 15px 12px; }
		@media (min-width: 1024px) { 
			.block-editor .cf-container__fields .cf-media-gallery__item { flex-basis: 10%; }
			.cf-field.cf-radio-image.glyphter .cf-radio__list-item { 
				flex: 0 0 5%;
				margin-bottom: 0px;
				padding: 0;
			}
			.cf-container-term-meta .cf-field.cf-radio-image.glyphter .cf-radio__list .cf-radio__list-item{ 
				flex: 0 0 10%;
			}
			.cf-container-term-meta .cf-radio__list .cf-radio__list-item label, .cf-radio-image.glyphter .cf-radio__list-item label { 
				margin: .18rem 0!important;
			}
		}
	</style>
	<?php
}
add_action( 'admin_head', 'my_admin_print_scripts' );

// Remove emoji.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
