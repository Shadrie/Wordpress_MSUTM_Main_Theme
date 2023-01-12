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
	<div class="se-pre-con"></div>
	<div class="wrapper">
		<header id="header">
			<?php get_template_part( 'template-parts/header/sliding-menu' ); ?>
			<?php get_template_part( 'template-parts/header/main-contacts' ); ?>
			<div class="container">
				<?php get_template_part( 'template-parts/header/site-branding' ); ?>
				<?php get_template_part( 'template-parts/header/additional-navbar' ); ?>
			</div>		
			<?php get_template_part( 'template-parts/header/main-navbar' ); ?>
		</header>    
		<div id="content" class="site-content mb70">          
		<?php
		if ( ! is_front_page() && ! is_404() ) {
			echo '<section class="static-promo a-static-promo mb30';
			if ( is_page() ) {
				$promo_thumbnail = get_the_post_thumbnail_url( get_the_ID(), 'full' ) ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : get_template_directory_uri() . '/images/bg-abiturient.jpg';
				echo ' static-page text-white" style="background-image: url(' . esc_url( $promo_thumbnail ) . ');">';
				?>
				<div class="container promo-title-container">
					<?php the_title( '<h1 class="promo-title">', '</h1>' ); ?>
				</div>
				<div class="static-promo-shadow"></div>
				<?php
			} else {
				echo ' no-bg">';
			}
			?>
				<div class="promo-breadcrumb">
					<div class="container">
						<ul class="breadcrumb">
							<?php msutm_breadcrumbs(); ?>
						</ul>
					</div>
				</div>    
			</section>
		<?php } ?>
		<?php if ( ! is_front_page() ) {
			echo '<div class="container">';
		} ?>
