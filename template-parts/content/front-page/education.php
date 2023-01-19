<?php
/**
 * Education level block
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Get all education level taxonomy terms.
$edu_level_list = get_terms( 'edu_level' );
if ( isset( $edu_level_list ) && ( ! empty( $edu_level_list ) ) ) {
	// Education levels count.
	$count_edu_level = count( $edu_level_list );
	// If more then 4 education levels, display them in a carousel.
	$edu_level_class = ( count( $edu_level_list ) > 4 ) ? 'a-carousel-courses owl-carousel owl-theme' : 'row';
	?>
	<div class="container-fluid">
		<h2 class="text-uppercase mb-4"><?php esc_html_e( 'Education', 'msutm-main-theme' ); ?></h2>
	</div>
	<div class="edu-level-carousel <?php echo esc_attr( $edu_level_class ); ?>">
		<?php // Block display total count of courses and link to course archive page. ?>
		<div class="col bg-dark-opacity text-light text-center p-0">
			<div class="py-3">
				<div class="fs-2 fw-bolder">
					<?php echo esc_html( wp_count_posts( 'course' )->publish ); ?>
				</div>
				<div class="fs-4"><?php esc_html_e( 'courses', 'msutm-main-theme' ); ?></div>
			</div>
			<a class="bg-dark d-block text-light text-uppercase fs-5 fw-light p-3" href="<?php echo esc_url( get_post_type_archive_link( 'course' ) ); ?>">
				<?php esc_attr_e( 'View all', 'msutm-main-theme' ); ?>
				<i class="icon-caret right"></i>
			</a>
		</div>
	<?php
	// Display (with a link to education level archive page) icon (set on taxonomy term page), name and course count for each education level in a cycle.
	foreach ( $edu_level_list as $edu_level ) {
		$edu_lvl_icon        = carbon_get_term_meta( $edu_level->term_id, 'crb_term_icon' );
		$edu_lvl_icon_render = ( isset( $edu_lvl_icon ) && ( ! empty( $edu_lvl_icon ) ) ) ? '<div class="category-item-icon"><i class="icon-' . $edu_lvl_icon . '"></i></div>' : '';
		?>
		<a href="<?php echo esc_url( get_term_link( $edu_level ) ); ?>" class="col bg-light bg-light-hover d-flex flex-column text-center justify-content-center align-items-center py-3">
		<?php echo wp_kses_post( $edu_lvl_icon_render ); ?>
			<div>
				<div class="fs-3">
					<?php echo esc_html( $edu_level->name ); ?>
				</div> 
				<div>
					<?php
					$courses_text = 1 === $edu_level->count ? __( 'course', 'msutm-main-theme' ) : __( 'courses', 'msutm-main-theme' );
					echo esc_html( $edu_level->count ) . ' ' . esc_html( $courses_text );
					?>
				</div>
			</div>
		</a>
	<?php } ?>   
	</div>
	<?php
}
