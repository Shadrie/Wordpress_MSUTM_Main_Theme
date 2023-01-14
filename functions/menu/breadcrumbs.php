<?php
/**
 * Breadcrumbs
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

/**
 * Prints breadcrumb item via template through an escaping function
 *
 * @param string $url Breadcrumb item url.
 * @param string $text Breadcrumb item title.
 */
function esc_breadcrumb_template( $url, $text ) {
	echo sprintf(
		'<li class="breadcrumb-item"><a href="%1$s">%2$s</a></li>',
		esc_url( $url ),
		esc_html( $text )
	);
}

/**
 * Prints current breadcrumb item through an escaping function
 *
 * @param string $text Breadcrumb item title.
 * @param string $class Class of the current breadcrumb (optional).
 */
function esc_breadcrumb_current( $text, $class = '' ) {
	if ( isset( $class ) && ( ! empty( $class ) ) ) {
		$class = ' ' . $class;
	}
	echo '<li class="breadcrumb-item active' . esc_attr( $class ) . '">' . esc_html( $text ) . '</li>';
}

/**
 * Gets and prints a formatted breadcrumbs list of post and its all ancestors
 *
 * @param object $post Selected post item object.
 */
function print_post_with_parents( $post ) {
	$parent_id = ( $post ) ? $post->post_parent : '';
	if ( $parent_id ) {
		$parents = get_post_ancestors( $post->ID );
		foreach ( array_reverse( $parents ) as $parent ) {
			esc_breadcrumb_template( get_page_link( $parent ), get_the_title( $parent ) );
		}
	}
	esc_breadcrumb_current( get_the_title( $post->ID ) );
}

/**
 * Gets and prints a formatted breadcrumbs item of post archive (if it exists)
 *
 * @param object $post_type_object Selected post type object.
 */
function print_archive( $post_type_object ) {
	if ( $post_type_object->has_archive ) {
		$post_type_name = $post_type_object->label;
		$post_type_slug = $post_type_object->name;
		$post_type_url  = get_post_type_archive_link( $post_type_slug );
		esc_breadcrumb_template( $post_type_url, $post_type_name );
	}
}

/**
 * Generates breadcrumbs depending on current template and prints them
 */
function msutm_breadcrumbs() {
	global $post;
	$text['home']   = get_the_title( get_option( 'page_on_front' ) );
	$text['search'] = __( 'Search results for', 'msutm-main-theme' ) . ' "%s"';
	$text['page']   = __( 'Page', 'msutm-main-theme' ) . ' %s';
	$paged_class    = 'breadcrumb-paged';
	$home_url       = home_url( '/' );

	if ( ! ( is_home() || is_front_page() || is_404() ) ) {
		esc_breadcrumb_template( $home_url, $text['home'] );
		if ( is_page() ) {
			print_post_with_parents( $post );
		} elseif ( is_single() ) {
			$post_type        = get_post_type();
			$post_type_object = get_post_type_object( $post_type );
			print_archive( $post_type_object );
			$top_level  = $post->post_parent ? array_reverse( get_post_ancestors( $post->ID ) )[0] : $post->ID;
			$taxonomies = get_object_taxonomies( $post_type_object->name, 'objects' );
			$term_met   = false;
			foreach ( $taxonomies as $taxonomy ) {
				$terms = get_the_terms( $top_level, $taxonomy->name );
				if ( $terms ) {
					$term_met  = true;
					$cat_index = 0;
					foreach ( $terms as $cat_item ) {
						if ( $cat_index > 0 ) {
							echo '</ul><ul class="breadcrumb">';
							esc_breadcrumb_template( $home_url, $text['home'] );
						}
						$parents   = array_reverse( get_ancestors( $cat_item->term_id, $taxonomy->name ) );
						$parents[] = $cat_item->term_id;
						foreach ( $parents as $parent ) {
							esc_breadcrumb_template( get_term_link( $parent ), get_term( $parent )->name );
						}
						print_post_with_parents( $post );
						++$cat_index;
					}
				}
			}
			if ( ! $term_met ) {
				print_post_with_parents( $post );
			}
		} elseif ( is_tax() || is_category() || is_tag() ) {
			$current_taxonomy = get_query_var( 'taxonomy' );
			if ( $current_taxonomy ) {
				$tax_object       = get_taxonomy( $current_taxonomy );
				$post_types       = $tax_object->object_type;
				$post_type_object = get_post_type_object( ( $post_types[0] ) );
				print_archive( $post_type_object );
			}
			$term_id = get_queried_object()->term_id;
			$parents = get_ancestors( $term_id, get_queried_object()->taxonomy );
			if ( $parents ) {
				foreach ( array_reverse( $parents ) as $parent ) {
					$cur_term = get_term( $parent );
					esc_breadcrumb_template( get_term_link( $cur_term ), $cur_term->name );
				}
			}
			$term_name = get_queried_object()->name;
			if ( get_query_var( 'paged' ) ) {
				$term_link = get_term_link( $term_id );
				esc_breadcrumb_template( $term_link, $term_name );
				esc_breadcrumb_current( sprintf( $text['page'], get_query_var( 'paged' ) ), $paged_class );
			} else {
				esc_breadcrumb_current( $term_name );
			}
		} elseif ( is_post_type_archive() ) {
			$post_type_object = get_post_type_object( get_post_type() );
			if ( get_query_var( 'paged' ) ) {
				print_archive( $post_type_object );
				esc_breadcrumb_current( sprintf( $text['page'], get_query_var( 'paged' ) ), $paged_class );
			} else {
				esc_breadcrumb_current( $post_type_object->label );
			}
		} elseif ( is_search() ) {
			if ( get_query_var( 'paged' ) ) {
				esc_breadcrumb_template( $home_url . '?s=' . get_search_query(), sprintf( $text['search'] ), get_search_query() );
				esc_breadcrumb_current( sprintf( $text['page'], get_query_var( 'paged' ) ), $paged_class );
			} else {
				esc_breadcrumb_current( sprintf( $text['search'], get_search_query() ) );
			}
		} elseif ( is_year() ) {
			esc_breadcrumb_current( get_the_time( 'Y' ) );
		} elseif ( is_month() ) {
			esc_breadcrumb_template( get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) );
			esc_breadcrumb_current( get_the_time( 'F' ) );
		} elseif ( is_day() ) {
			esc_breadcrumb_template( get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) );
			esc_breadcrumb_template( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) );
			esc_breadcrumb_current( get_the_time( 'd' ) );
		}
	}
}
