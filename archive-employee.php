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
// Get search string from URL parameters.
$search_string = filter_input( INPUT_GET, 'search' );
?>
<div class="row my-3">
	<div class="col">
		<?php the_archive_title( '<h1 class="mb-4">', '</h1>' ); ?>
		<!-- Filter: begin -->
		<form id="filter" class="mb-2">
			<div class="input-group">
				<input type="text" id="searchStr" value="<?php echo esc_html( $search_string ); ?>" class="form-control" placeholder="<?php echo esc_html_e( 'Search', 'msutm-main-theme' ); ?>" aria-describedby="<?php echo esc_html_e( 'Search', 'msutm-main-theme' ); ?>">
				<button class="btn btn-dark btn-outline-secondary" type="submit" id="sendRequest"><?php echo esc_html_e( 'Search', 'msutm-main-theme' ); ?></button>
			</div>
		</form>
		<!-- Filter: end -->
		<div id="result" class="mb-4">
			<div id="main">
			<?php
			// Modify global query args with search value.
			$args = $wp_query->query_vars;
			if ( isset( $search_string ) ) {
				$args['s'] = $search_string;
			}
			// Begin new query.
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$employee_id = get_the_ID();
					// Display information about each employee with a template by their ID.
					employee_template( $employee_id, employee_posts( $employee_id ) );
				}
				// Display pagination for a new query.
				get_template_part( 'template-parts/content/pagination', null, array( 'the_query' => $the_query ) );
			} else {
				// Specific template if no content found.
				get_template_part( 'template-parts/content/content', 'none' );
			}
			wp_reset_postdata();
			?>
			</div>  
		</div>
	</div>
	<?php
	// Display sidebar for custom post types.
	get_template_part( 'template-parts/content/sidebar', 'custom' );
	?>
</div>
<?php
get_footer();
