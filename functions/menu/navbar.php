<?php
/**
 * Horizontal navigation bar
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
 * Returns all child nav_menu_items under a specific parent
 *
 * @param int   $parent_id The parent menu item ID.
 * @param array $nav_menu_items Array of menu items in use.
 * @param bool  $depth All children (true) or direct children (false).
 *
 * @return array $nav_menu_item_list Filtered array of menu items.
 */
function get_nav_menu_item_children( $parent_id, $nav_menu_items, $depth = true ) {
	$nav_menu_item_list = array();
	foreach ( (array) $nav_menu_items as $nav_menu_item ) {
		if ( intval( $nav_menu_item->menu_item_parent ) === intval( $parent_id ) ) {
			$nav_menu_item_list[] = $nav_menu_item;
			if ( $depth ) {
				$children = get_nav_menu_item_children( $nav_menu_item->ID, $nav_menu_items );
				if ( $children ) {
					$nav_menu_item_list = array_merge( $nav_menu_item_list, $children );
				}
			}
		}
	}
	return $nav_menu_item_list;
}

/**
 * Prints navbar from passed ID
 *
 * @param int $menu_location Menu instance location.
 */
function print_navbar( $menu_location ) {
	$locations  = get_nav_menu_locations();
	$menu       = get_term( $locations[ $menu_location ], 'nav_menu' );
	$menu_items = wp_get_nav_menu_items( $menu->term_id );
	$top_menu   = wp_get_nav_menu_items( $menu->term_id, array( 'post_parent' => 0 ) );
	if ( $menu_items && $top_menu ) {
		echo wp_kses_post( '<nav class="main-nav hidden-xs"><ul class="nav">' );
		foreach ( $top_menu as $item ) {
			$item_title = $item->title;
			$item_link  = $item->url;
			if ( ! $item->menu_item_parent ) {
				$parent_id     = $item->ID;
				$url           = $item_link;
				$submenu_items = get_nav_menu_item_children( $parent_id, $menu_items, false );
				$aria_data     = $submenu_items ? ' aria-haspopup="true" aria-expanded="false"' : '';
				$icon_caret    = $submenu_items ? '<i class="icon-caret"></i>' : '';
				echo '<li class="dropdown">
					<a href="' . esc_url( $item_link ) . '" class="dropdown-toggle"' . wp_kses_post( $aria_data ) . 'id="sub_' . esc_url( $url ) . '">'
						. esc_html( $item_title ) . ' ' . wp_kses_post( $icon_caret ) .
					'</a>';
				if ( $submenu_items ) {
					echo '<div class="dropdown-menu" aria-labelledby="sub_' . esc_url( $url ) . '"><ul>';
					foreach ( $submenu_items as $submenu_item ) {
						$submenu_title = $submenu_item->title;
						$submenu_url   = $submenu_item->url;
						echo '<li><a href="' . esc_url( $submenu_url ) . '">' . esc_html( $submenu_title ) . '</a></li>';
					}
					echo '</ul></div>';
				}
				echo '</li>';
			}
		}
		echo '</ul></nav>';
	}
}
