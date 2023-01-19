<?php
/**
 * Posts carousel template
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Set arguments for new query. Category id (cat_id) and selected posts (post__in) are optional arguments that might be passing when using get_template_part().
$q_args = array(
	'posts_per_page' => 6,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'post_type'      => 'any',
);
if ( isset( $args['cat_id'] ) ) {
	$q_args['cat'] = $args['cat_id'];
}
if ( isset( $args['post__in'] ) ) {
	$q_args['post__in'] = $args['post__in'];
}
// Start the query with new arguments.
$the_query = new WP_Query( $q_args );
if ( $the_query->have_posts() ) { ?>
	<div class="a-carousel-4 owl-carousel owl-theme">
		<?php
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			// Display each post using the same template.
			get_template_part( 'template-parts/archive/single-post' );
		}
		?>
	</div>
	<?php
	if ( isset( $args['cat_id'] ) ) {
		// Add a link to the category archive, if category id parameter was passed.
		?>
		<a href="<?php echo esc_url( get_category_link( $args['cat_id'] ) ); ?>" class="articles-link">
			<?php
			echo esc_html( get_cat_name( $args['cat_id'] ) . ' articles' );
			?>
			<i class="icon-next"></i>
		</a>
	<?php } ?>
<?php };
wp_reset_postdata(); ?>
