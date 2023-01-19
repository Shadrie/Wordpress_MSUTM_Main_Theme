<?php
/**
 * The header template
 * PHP version 8.1
 *
 * Displays <head> section and everything up until <div id="content">
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
	<?php wp_head(); ?>  
</head>

<body <?php body_class(); ?>>
	<!-- Preloader: begin -->
	<div class="se-pre-con"></div>
	<!-- Preloader: end -->
	<!-- Wrapper: begin -->
	<div class="wrapper">
		<!-- Header: begin -->
		<header id="header">
			<!-- Navigation: begin -->
			<?php get_template_part( 'template-parts/header/main-navbar' ); ?>
			<?php get_template_part( 'template-parts/header/breadcrumbs' ); ?>
			<!-- Navigation: end -->
		</header>
		<!-- Header: end -->
		<!-- Content: begin -->
		<?php $container_class = is_front_page() ? '' : ' class=container'; ?>
		<div id="content"<?php echo esc_attr( $container_class ); ?>>
