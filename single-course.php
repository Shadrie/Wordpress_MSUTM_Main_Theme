<?php
/**
 * The template for displaying single course type post
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

get_header(); ?>
<div class="row my-3">
	<div class="col">
	<?php
	while ( have_posts() ) {
		the_post();
		the_title( '<h1 class="mb-3">', '</h1>' );
		$edu_levels = get_the_terms( get_the_ID(), 'edu_level' );
		if ( $edu_levels ) {
			$edu_info_list = '';
			echo '<h2>' . esc_html__( 'Education level', 'msutm-main-theme' ) . '</h2>';
			foreach ( $edu_levels as $edu_level ) {
				$edu_level_name = $edu_level->name;
				if ( ! empty( $edu_level_list ) ) {
					$edu_info_list .= ', ';
				}
				$edu_info_list .= $edu_level_name;
			}
			echo '<p>' . $edu_info_list . '</p>';
		}

		$edu_forms = carbon_get_the_post_meta( 'crb_edu_form_list' );
		if ( $edu_forms ) {
			echo '<h2>' . esc_html__( 'Education form', 'msutm-main-theme' ) . '</h2>';
			echo '<div class="row">';
			foreach ( $edu_forms as $edu_form ) {
				$edu_form_name = get_edu_form( $edu_form['crb_edu_form_name'] );
				if ( $edu_form_name ) {
					echo '<div class="col-xs-12 col-md-' . 12 / count( $edu_forms ) . '">';
					echo '<h3>' . esc_html( $edu_form_name ) . '</h3>';
					echo '<p>Places available: ';
					echo $edu_form['crb_places'] ? esc_html( $edu_form['crb_places'] ) : '0';
					echo '<br>';
					echo 'Course price: ';
					echo $edu_form['crb_price'] ? esc_html( $edu_form['crb_price'] ) : '0';
					echo '</p>';
					echo '</div>';
				}
			}
			echo '</div>';
		}
		$exams = carbon_get_the_post_meta( 'crb_exams' );
		if ( $exams ) {
			echo '<h2>Minimum exam score</h2>';
			echo '<p>';
			foreach ( $exams as $exam ) {
				if ( $exam['crb_exam_select'] && $exam['crb_exam_score'] ) {
					echo esc_html( get_exam( $exam['crb_exam_select'] ) ) . ': ' . esc_html( $exam['crb_exam_score'] ) . '<br>';
				}
			}
			echo '</p>';
		}
		the_content();
	}
	?>
	</div>
	<?php get_template_part( 'template-parts/content/sidebar', 'custom' ); ?>
</div>
<?php
get_footer();
