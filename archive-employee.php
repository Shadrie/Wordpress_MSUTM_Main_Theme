<?php
/**
 * The template for displaying archive page of employee post type
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
global $wp_query;
$search_string = filter_input( INPUT_GET, 'search' );
?>
<div class="row my-3">
	<div class="col">
		<form id="filter" class="mb-2">
			<div class="input-group">
				<input type="text" id="searchStr" value="<?php echo esc_html( $search_string ); ?>" class="form-control" placeholder="<?php echo esc_html_e( 'Search', 'msutm-main-theme' ); ?>" aria-label="Recipient's username" aria-describedby="<?php echo esc_html_e( 'Search', 'msutm-main-theme' ); ?>">
				<button class="btn btn-dark btn-outline-secondary" type="submit" id="sendRequest"><?php echo esc_html_e( 'Search', 'msutm-main-theme' ); ?></button>
			</div>
		</form>  
		<div id="result">
			<div id="main">
			<?php
			$args          = $wp_query->query_vars;
			$args['paged'] = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args['page']  = 1;
			if ( isset( $search_string ) ) {
				$args['s'] = $search_string;
			}
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					the_title( '<h1 class="d-none">', '</h1>' );
					$employee_id = get_the_ID();
					employee_template( $employee_id, employee_posts( $employee_id ) );
				}
				get_template_part( 'template-parts/content/pagination', null, array( 'the_query' => $the_query ) );
			} else {
				get_template_part( 'template-parts/content/content', 'none' );
			}
			wp_reset_postdata();
			?>
			</div>  
		</div>
	</div>
	<?php get_template_part( 'template-parts/content/sidebar', 'custom' ); ?>
</div>
<?php
get_footer();
