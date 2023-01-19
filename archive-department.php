<?php
/**
 * The template for displaying archive pages
 * PHP version 8.1
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
<div class="row my-3">
	<div class="col">
	<?php
	the_archive_title( '<h1 class="mb-4">', '</h1>' );
	echo term_description();
	if ( have_posts() ) {
		?>
		<div class="accordion">
			<?php
			$args = array(
				'post_type' => 'department',
				'title_li'  => '',
				'orderby'   => 'menu_order',
				'walker'    => new Accordion_Walker(),
			);
			wp_list_pages( $args );
			?>
		</div>
		<?php
	} else {
		get_template_part( 'template-parts/content/content', 'none' );
	}
	?>
	</div>
	<?php get_template_part( 'template-parts/content/sidebar', 'custom' ); ?>
</div>
<?php
get_footer();
