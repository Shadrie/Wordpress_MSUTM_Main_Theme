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
<!-- Slider block: begin -->
<div class="bg-light mb70">
	<div class="container">
		<div class="row">
			<!-- Main slider: begin -->
			<?php
			$featured_cat       = carbon_get_the_post_meta( 'crb_featured_cat' );
			$extra_slider_class = ( isset( $featured_cat ) && ( ! empty( $featured_cat ) ) ) ? 'col-md-8' : 'col-xs-12';
			?>
			<div class="<?php echo esc_html( $extra_slider_class ); ?> ">
			<?php
			$slider = carbon_get_the_post_meta( 'crb_main_slider' );
			if ( $slider ) {
				?>
				<div class="promo-carousel-container">
					<div class="promo-carousel a-carousel owl-carousel owl-theme nav-none">
					<?php
					foreach ( $slider as $slide ) {
						?>
						<div class="promo-item">
							<a 
							<?php
							if ( $slide['crb_main_slider_url'] ) {
								echo 'href="' . esc_url( $slide['crb_main_slider_url'] ) . '" target="_blank"';
							}
							?>
							>
								<div class="promo-item-photo" style="background-image: url(<?php echo esc_url( wp_get_attachment_image_url( $slide['crb_main_slider_image'], '' ) ); ?>);"></div>
								<?php
								if ( $slide['crb_main_slider_text'] ) {
									?>
									<div class="shadow"></div>
									<div class="promo-item-title"><?php echo esc_html( $slide['crb_main_slider_text'] ); ?></div>
								<?php } ?>
							</a>    
						</div>
					<?php } ?>      
					</div>
				</div>
			<?php } ?>
			</div>
			<!-- Main slider: end -->
			<!-- Featured articles: begin -->
			<?php
			if ( isset( $featured_cat ) && ( ! empty( $featured_cat ) ) ) {
				?>
				<div class="col-md-4">
					<div class="adv-container">
						<div class="adv-title text-uppercase"><?php esc_html_e( 'Featured articles', 'msutm-main-theme' ); ?></div>
						<?php
						echo '<div class="adv-carousel a-adv-carousel owl-carousel owl-theme control-in-title"><div class="adv-carousel-item">';
						$list_count = 0;
						foreach ( $featured_cat as $featured_post ) {
							$featured_post_id = $featured_post['id'];
							if ( 3 === $list_count ) {
								echo '</div><div class="adv-carousel-item">';
								$list_count = 0;
							}
							?>
							<div class="adv-item">
								<div class="adv-item-title"><a href="<?php echo esc_html( get_the_permalink( $featured_post_id ) ); ?>">
								<?php
								echo esc_html( get_the_title( $featured_post_id ) );
								?>
								</a></div>
								<div class="adv-item-date"><?php echo get_the_date( 'j F Y H:i', $featured_post_id ); ?></div>
							</div>
							<?php
							++$list_count;
						}
						echo '</div></div>';
						?>
					</div>
				</div>
				<?php
			}
			?>
			<!-- Featured articles: end -->
		</div>
	</div>
</div>
<!-- Slider block: end -->
<!-- Advantages: begin -->
<div class="container">
	<?php
	$adv_list = carbon_get_the_post_meta( 'crb_advantage' );
	if ( isset( $adv_list ) && ( ! empty( $adv_list ) ) ) {
		?>
		<div class="advantages"> 
			<div class="row">
			<?php
			foreach ( $adv_list as $adv ) {
				?>
				<div class="col-sm-3">
					<a href="<?php echo esc_url( $adv['crb_advantage_url'] ); ?>" class="advantage-item">
						<div class="advantage-item-icon"><i class="icon-<?php echo esc_attr( $adv['crb_advantage_icon'] ); ?>" style="color: <?php echo esc_attr( $adv['crb_advantage_color'] ); ?>"></i></div>
						<div class="advantage-item-title"><?php echo esc_html( $adv['crb_advantage_text'] ); ?></div>
					</a>
				</div>
			<?php } ?> 
			</div>
		</div>
		<?php
	}
	?>
</div>
<!-- Advantages: end -->
<!-- News: begin -->
<div class="container">
	<?php
	$cat_list = carbon_get_theme_option( 'crb_category_list' );
	if ( isset( $cat_list ) && ( ! empty( $cat_list ) ) ) {
		echo '<div class="tabs-scroll">
		<ul class="nav nav-tabs tabs-custom" id="categoryTabs" role="tablist">';
		$cat_count = 0;
		foreach ( $cat_list as $current_cat ) {
			$category = get_category( $current_cat['id'] );
			$active   = ( 0 === $cat_count ) ? ' active' : '';
			++$cat_count;
			echo '<li class="nav-item" role="presentation">
				<button class="nav-link' . esc_attr( $active ) . '" id="cat-' . esc_attr( $category->term_id ) . '-tab" data-bs-toggle="tab" data-bs-target="#cat-' . esc_attr( $category->term_id ) . '" type="button" role="tab" aria-controls="cat-' . esc_attr( $category->term_id ) . '" aria-selected="true">'
				. esc_html( $category->name ) .
				'</button>
				</li>';
		}
		echo '</ul></div>';
		echo '<div class="tab-content mt20" id="categoryTabsContent">';
		$cat_count = 0;
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
					'num'    => '4xs1sm2',
					'div'    => 'mb30',
				)
			);
			echo '</div>';
		}
		echo '</div>';
	}
	?>
</div>
<!-- News: end -->
<!-- Education levels: begin-->
<div class="container">
	<?php
	$edu_level_list = get_terms( 'edu_level' );
	if ( isset( $edu_level_list ) && ( ! empty( $edu_level_list ) ) ) {
		?>
		<h2><?php esc_html_e( 'Education', 'msutm-main-theme' ); ?></h2>
		<div class="category-list row">
		<?php
		foreach ( $edu_level_list as $edu_level ) {
			$edu_lvl_icon        = carbon_get_term_meta( $edu_level->term_id, 'crb_term_icon' );
			$edu_lvl_icon_render = ( isset( $edu_lvl_icon ) && ( ! empty( $edu_lvl_icon ) ) ) ? '<div class="category-item-icon"><i class="icon-' . $edu_lvl_icon . '"></i></div>' : '';
			?>
			<div class="col-md-4 col-sm-6">
				<a href="<?php echo esc_url( get_term_link( $edu_level ) ); ?>" class="category-item category-education-link-main-page">
				<?php echo wp_kses_post( $edu_lvl_icon_render ); ?>
					<div>
						<div class="category-item-title category-item-title-wide">
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
			</div> 
		<?php } ?>   
		</div>
	<?php } ?>
</div>
<!-- Education levels: end -->
<!-- University in numbers: begin -->
<div class="statistic-promo"> 
	<div class="container">
		<div class="row">
			<?php
			$number_list = carbon_get_the_post_meta( 'crb_uni_numbers' );
			if ( isset( $number_list ) && ( ! empty( $number_list ) ) ) {
				foreach ( $number_list as $number ) {
					?>
					<div class="col-md-3 col-xs-6">
						<div class="statistic-item">
							<div class="statistic-item-value"><?php echo esc_html( $number['crb_uni_number'] ); ?></div>
							<div class="statistic-item-title"><?php echo esc_html( $number['crb_uni_number_option'] ); ?></div>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</div>       
<!-- University in numbers: end -->
<!-- Front page content: begin -->
<div class="about">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 mb50">
				<h1 class="about-title"><div class="text-primary"><?php the_title(); ?></h1>
				<div class="about-descr">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="col-sm-6 mb50">
				<a class="image-promo image-promo-border"
				<?php
				$video_link    = carbon_get_the_post_meta( 'crb_main_video' );
				$fancybox_link = ( isset( $video_link ) && ( ! empty( $video_link ) ) ) ? $video_link : get_the_post_thumbnail_url( get_the_ID(), 'full' );
				echo 'href="' . esc_url( $fancybox_link ) . ' " ';
				?>
				data-fancybox>
					<?php
					the_post_thumbnail();
					if ( isset( $video_link ) && ( ! empty( $video_link ) ) ) {
						?>
						<span class="btn-play btn-play-centered btn-play btn-play-centered-centered"><i class="icon-play"></i></span>
						<?php
					}
					?>
				</a>
			</div>
		</div>
	</div>
</div> 
<!-- Front page content: end -->
<!-- Services: begin -->
<div class="container">
	<?php
	$service_list = carbon_get_the_post_meta( 'crb_main_service' );
	if ( $service_list ) {
		?>
		<div class="carousel-container service-carousel-container mb50">
			<div class="service-carousel a-carousel-4 owl-carousel owl-theme control-centered">
				<?php foreach ( $service_list as $service ) { ?>
					<div class="service-item-container d-block p-3">
						<a href="<?php echo esc_url( $service['crb_main_service_url'] ); ?>" class="advantage-item mb-0">
						<div class="advantage-item-icon">
							<i class="icon-<?php echo esc_attr( $service['crb_main_service_icon'] ); ?>" style="color: <?php echo esc_attr( $service['crb_main_service_color'] ); ?>"></i>
						</div>
						<?php
						if ( $service['crb_main_service_text'] ) {
							?>
							<div class="advantage-item-title mb-2"><?php echo esc_html( $service['crb_main_service_text'] ); ?></div>
							<?php
						}
						if ( $service['crb_main_service_desc'] ) {
							?>
							<div class="service-item-desc"><?php echo esc_html( $service['crb_main_service_desc'] ); ?></div>
						<?php } ?>
						</a>
					</div>    
				<?php } ?>
			</div>
		</div>          
	<?php } ?>
</div>
<!-- Services: end -->
<!-- Partners: begin -->
<?php
$partners_list = carbon_get_theme_option( 'crb_partners' );
if ( $partners_list ) {
	?>
	<div class="container mt40 mb40">
		<div class="carousel-container">
			<div class="partner-carousel a-carousel-partner owl-carousel owl-theme control-in-title">
			<?php
			foreach ( $partners_list as $partner ) {
				?>
				<div class="partner-item">
					<a href="<?php echo esc_url( $partner['crb_partners_url'] ); ?>">
						<img src="<?php echo esc_url( wp_get_attachment_image_src( $partner['crb_partners_image'], 'medium' )[0] ); ?>" alt="" />
					</a>
				</div> 
			<?php } ?>
			</div>
		</div>
	</div>         
<?php } ?>
<!-- Partners: end --> 
<!-- Photo gallery: begin -->
<div class="allow-overflow mb50">
	<div class="photo-carousel-wide-container">
		<div class="container">
			<?php get_template_part( 'template-parts/content/gallery' ); ?> 
		</div>
	</div>
</div>
<!-- Photo gallery: end -->
<?php
get_footer();
