<?php
/**
 * The template for displaying single posts
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
<article id="post-<?php the_ID(); ?>" <?php post_class( 'my-3' ); ?>>
	<!-- Post content: begin -->
	<?php
	while ( have_posts() ) {
		the_post();
		the_title( '<h1>', '</h1>' );
		the_date( 'j F Y H:i', '<div class="lead">', '</div>' );
		if ( has_post_thumbnail() ) {
			?>
			<div class="my-3">
				<img src="<?php echo esc_url( the_post_thumbnail_url( 'large' ) ); ?>" alt="Post thumbnail">
			</div>
			<?php
		}
		?>
		<div class="fs-4">
			<?php
			if ( has_excerpt() ) {
				?>
					<p><?php the_excerpt(); ?></p>
				<?php
			}
			the_content();
			?>
		</div>
		<?php
	}
	?>
</article>
<!-- Post content: end -->
<!-- More of type: begin -->
<?php get_template_part( '/template-parts/content/more-of-type' ); ?>
<!-- More of type: end -->
<?php
get_footer();
