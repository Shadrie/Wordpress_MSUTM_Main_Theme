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
<?php
$slider = carbon_get_the_post_meta( 'crb_main_slider' );
if ( $slider ) {
	?>
	<div class="main-slider promo-carousel a-carousel owl-carousel owl-theme">
	<?php
	foreach ( $slider as $slide ) {
		?>
		<div class="promo-item">
			<div class="position-relative">
				<div class="promo-item-photo" style="background-image: url(<?php echo esc_url( wp_get_attachment_image_url( $slide['crb_main_slider_image'], '' ) ); ?>);">
					<?php
					if ( $slide['crb_main_slider_text'] ) {
						?>
						<div class="promo-item-title text-light fs-4 fw-bolder p-3"><?php echo esc_html( $slide['crb_main_slider_text'] ); ?></div>
					<?php } ?>
				</div>
			</div>
			<a class="bg-dark d-block text-light text-uppercase fs-5 fw-light p-3"
			<?php
			if ( $slide['crb_main_slider_url'] ) {
				echo 'href="' . esc_url( $slide['crb_main_slider_url'] ) . '" target="_blank"';
			}
			?>
			>Read more <i class="icon-caret right"></i>
			</a>
		</div>
	<?php } ?>      
	</div>
<?php } ?>
<!-- Slider block: end -->
<!-- News: begin -->
<div class="container-fluid my-5">
<?php
$featured_cat = carbon_get_the_post_meta( 'crb_featured_cat' );
$cat_list     = carbon_get_theme_option( 'crb_category_list' );
if ( ( isset( $cat_list ) && ( ! empty( $cat_list ) ) ) || ( isset( $featured_cat ) && ( ! empty( $featured_cat ) ) ) ) {
	?>
	<h2 class="text-uppercase mb-4"><?php esc_html_e( 'University articles', 'msutm-main-theme' ); ?></h2>
	<!-- Tab headers: begin -->
	<ul class="nav nav-pills nav-fill text-uppercase" id="categoryTabs" role="tablist">
	<?php
	$cat_count = 0;
	if ( isset( $featured_cat ) && ( ! empty( $featured_cat ) ) ) {
		++$cat_count;
		?>
		<li class="nav-item" role="presentation">
			<a class="nav-link active" id="featured-tab" data-bs-toggle="tab" data-bs-target="#featured" type="button" role="tab" aria-controls="featured" aria-selected="true">
				<?php esc_html_e( 'Featured', 'msutm-main-theme' ); ?>
			</a>
		</li>
		<?php
	}
	if ( isset( $cat_list ) && ( ! empty( $cat_list ) ) ) {
		foreach ( $cat_list as $current_cat ) {
			$category = get_category( $current_cat['id'] );
			$active   = ( 0 === $cat_count ) ? ' active' : '';
			++$cat_count;
			echo '<li class="nav-item" role="presentation">
			<a class="nav-link' . esc_attr( $active ) . '" id="cat-' . esc_attr( $category->term_id ) . '-tab" data-bs-toggle="tab" data-bs-target="#cat-' . esc_attr( $category->term_id ) . '" type="button" role="tab" aria-controls="cat-' . esc_attr( $category->term_id ) . '" aria-selected="true">'
			. esc_html( $category->name ) .
			'</a>
			</li>';
		}
	}
	?>
	</ul>
	<!-- Tab headers: end -->
	<!-- Tab content: begin -->
	<div class="tab-content" id="categoryTabsContent">
	<?php
	$cat_count = 0;
	if ( isset( $featured_cat ) && ( ! empty( $featured_cat ) ) ) {
		++$cat_count;
		?>
		<div class="tabs__content tab-pane active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
		<?php
		get_template_part(
			'template-parts/content/carousel-container',
			null,
			array(
				'post__in' => array_column( $featured_cat, 'id' ),
			)
		);
		?>
		</div>
		<?php
	}
	if ( isset( $cat_list ) && ( ! empty( $cat_list ) ) ) {
		foreach ( $cat_list as $current_cat ) {
			$category = get_category( $current_cat['id'] );
			$active   = ( 0 === $cat_count ) ? ' active show' : '';
			++$cat_count;
			echo '<div class="tab-pane fade' . esc_attr( $active ) . '" id="cat-' . esc_attr( $category->term_id ) . '" role="tabpanel" aria-labelledby="cat-' . esc_attr( $category->term_id ) . '-tab">';
			get_template_part(
				'template-parts/content/carousel-container',
				null,
				array(
					'cat_id' => $category->term_id,
				)
			);
			echo '</div>';
		}
	}
	?>
	</div>
	<!-- Tab content: end -->
	<?php
}
?>
</div>
<!-- News: end -->
<!-- Education levels: begin-->
<?php
$edu_level_list = get_terms( 'edu_level' );
if ( isset( $edu_level_list ) && ( ! empty( $edu_level_list ) ) ) {
	$count_edu_level = count( $edu_level_list );
	$edu_level_class = ( count( $edu_level_list ) > 4 ) ? 'a-carousel-courses owl-carousel owl-theme' : 'row';
	?>
	<div class="container-fluid">
		<h2 class="text-uppercase mb-4"><?php esc_html_e( 'Education', 'msutm-main-theme' ); ?></h2>
	</div>
	<div class="edu-level-carousel <?php echo esc_attr( $edu_level_class ); ?>">
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
<?php } ?>
<!-- Education levels: end -->
<!-- University in numbers: begin -->
<?php
$number_list = carbon_get_the_post_meta( 'crb_uni_numbers' );
if ( isset( $number_list ) && ( ! empty( $number_list ) ) ) {
	?>
	<div class="container-fluid mt-5">
		<h2 class="text-uppercase mb-4"><?php esc_html_e( 'University in numbers', 'msutm-main-theme' ); ?></h2>
	</div>
	<?php
	$uni_numbers_img = carbon_get_the_post_meta( 'crb_uni_numbers_bg' );
	$uni_numbers_bg  = ( isset( $uni_numbers_img ) && ( ! empty( $uni_numbers_img ) ) ) ? ' style=background-image:url(' . wp_get_attachment_image_url( $uni_numbers_img, 'full' ) . ');' : '';
	?>
	<div class="bg-center bg-secondary text-light container-fluid"<?php echo esc_attr( $uni_numbers_bg ); ?>> 
		<div class="row bg-dark-opacity py-5">
			<?php
			foreach ( $number_list as $number ) {
				?>
				<div class="col-md-3 col-xs-6 my-5">
					<div class="text-center">
						<div class="statistic-item-value fs-1 fw-bolder"><?php echo esc_html( $number['crb_uni_number'] ); ?></div>
						<div class="fs-4"><?php echo esc_html( $number['crb_uni_number_option'] ); ?></div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<?php
}
?>
<!-- University in numbers: end -->
<!-- Services: begin -->
<div class="mt-5">
	<?php
	$service_list = carbon_get_the_post_meta( 'crb_main_service' );
	if ( $service_list ) {
		?>
		<div class="service-carousel a-carousel-4 owl-carousel owl-theme control-centered">
			<?php foreach ( $service_list as $service ) { ?>
				<a href="<?php echo esc_url( $service['crb_main_service_url'] ); ?>" class="service-item bg-light-hover d-flex flex-column p-4 h-100">
					<div class="service-item-icon">
						<i class="icon-<?php echo esc_attr( $service['crb_main_service_icon'] ); ?>"></i>
					</div>
					<?php
					if ( $service['crb_main_service_text'] ) {
						?>
						<div class="service-item-title fs-3 fw-bolder"><?php echo esc_html( $service['crb_main_service_text'] ); ?></div>
						<?php
					}
					if ( $service['crb_main_service_desc'] ) {
						?>
						<div class="service-item-desc"><?php echo esc_html( $service['crb_main_service_desc'] ); ?></div>
					<?php } ?>
				</a>
			<?php } ?>
		</div>
	<?php } ?>
</div>
<!-- Services: end -->
<!-- Photo gallery: begin -->
<?php get_template_part( 'template-parts/content/gallery' ); ?> 
<!-- Photo gallery: end -->
<?php
get_footer();
