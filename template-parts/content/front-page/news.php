<?php
/**
 * News block for front page
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

?>
<div class="container-fluid my-5">
<?php
// Display featured posts (set on front page) and featured categories (set in theme options) in a tabbed layout.
$featured_cat = carbon_get_the_post_meta( 'crb_featured_cat' );
$cat_list     = carbon_get_theme_option( 'crb_category_list' );
if ( ( isset( $cat_list ) && ( ! empty( $cat_list ) ) ) || ( isset( $featured_cat ) && ( ! empty( $featured_cat ) ) ) ) {
	?>
	<h2 class="text-uppercase mb-4"><?php esc_html_e( 'University articles', 'msutm-main-theme' ); ?></h2>
	<!-- Tab headers: begin -->
	<ul class="nav nav-pills nav-fill text-uppercase" id="categoryTabs" role="tablist">
	<?php
	$cat_count = 0;
	// If featured posts are set, they will be displayed as a first tab.
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
	// Featured categories will be displayed after.
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
		// Display featured posts with a carousel template.
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
		// Display posts for each featured category with a carousel template.
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
