<?php
/**
 * Front page template
 * PHP version 8.1
 *
 * Template Name: Front page
 * Template Post Type: page
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

get_header();
?>
<h1 class="d-none"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
<!-- Slider block: begin -->
<?php get_template_part( 'template-parts/content/front-page/slider' ); ?>
<!-- Slider block: end -->
<!-- News: begin -->
<?php get_template_part( 'template-parts/content/front-page/news' ); ?>
<!-- News: end -->
<!-- Education levels: begin-->
<?php get_template_part( 'template-parts/content/front-page/education' ); ?> 
<!-- Education levels: end -->
<!-- University in numbers: begin -->
<?php get_template_part( 'template-parts/content/front-page/numbers' ); ?> 
<!-- University in numbers: end -->
<!-- Services: begin -->
<?php get_template_part( 'template-parts/content/front-page/services' ); ?> 
<!-- Services: end -->
<!-- Photo gallery: begin -->
<?php get_template_part( 'template-parts/content/gallery' ); ?> 
<!-- Photo gallery: end -->
<?php
get_footer();
