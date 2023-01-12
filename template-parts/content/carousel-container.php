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

$q_args = array(
	'posts_per_page' => 6,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'post_type'      => 'any',
);
if ( isset( $args['cat_id'] ) ) {
	$q_args['cat'] = $args['cat_id'];
}
$the_query = new WP_Query( $q_args );
if ( $the_query->have_posts() ) { ?>

<div class="<?php echo esc_attr( $args['div'] ); ?>">
	<div class="news-carousel-container-item">
		<div class="carousel-container">
			<div class="news-carousel a-carousel-<?php echo esc_attr( $args['num'] ); ?> owl-carousel owl-theme control-in-title">
					<?php
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						get_template_part( 'template-parts/archive/single-post' );
					}
					?>
			</div>
		</div>
		<?php if ( isset( $args['cat_id'] ) ) { ?>
			<div>
				<a href="<?php echo esc_url( get_category_link( $args['cat_id'] ) ); ?>" class="btn btn-mini">
					<span class="inside">
						<?php
						echo esc_html__( 'All', 'msutm-main-theme' ) . ' ' . esc_html( get_cat_name( $args['cat_id'] ) );
						?>
						<i class="icon-next"></i>
					</span>
				</a>
			</div>
		<?php } ?>
	</div>
</div>
<?php };
wp_reset_postdata(); ?>
