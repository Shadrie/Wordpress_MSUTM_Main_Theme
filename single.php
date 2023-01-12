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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Post content: begin -->
	<div class="row row-inline text-center mb70">
		<div class="col-lg-8 col-md-10 col-xs-12 text-left article-content">
		<?php
		while ( have_posts() ) {
			the_post();
			the_title( '<h1>', '</h1>' );
			the_date( 'j F Y H:i', '<div class="article-date date mb35">', '</div>' );
			if ( has_post_thumbnail() ) {
				?>
				<div class="article-image">
					<img src="<?php echo esc_url( the_post_thumbnail_url( '' ) ); ?>" alt="">
				</div>
				<?php
			}
			if ( has_excerpt() ) {
				?>
					<p><?php the_excerpt(); ?></p>
				<?php
			}
			the_content();
		}
		?>
		</div> 
	</div>
	<!-- Post content: end -->
	<!-- More of type: begin -->
	<?php get_template_part( '/template-parts/content/more-of-type' ); ?>
	<!-- More of type: end -->
</article>
<?php
get_footer();
