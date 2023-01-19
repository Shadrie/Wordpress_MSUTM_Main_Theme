<?php
/**
 * Accordion layout templates
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
 * Returns starting accordion item tags for items without children
 *
 * @param string $link Item URL.
 * @param string $label Item label.
 */
function accordion_no_child_output_begin( $link, $label ) {
	return '<div class="accordion-item">
		<div class="accordion-body">
			<a href="' . $link . '">
			<div class="accordion-header fs-3">'
				. $label .
				'</div>
			</a>
		</div>';
}

/**
 * Returns starting accordion item tags for items with children
 *
 * @param string $link Item URL.
 * @param string $label Item label.
 * @param int    $id Item id to assign with accordion item with its content.
 */
function accordion_with_child_output_begin( $link, $label, $id ) {
	return '<div class="accordion-item" id="accord' . $id . '">
		<div class="d-flex p-0">
		<div class="accordion-body flex-fill fs-3" id="data' . $id . '">
			<div class="accordion-header ">
				<a class="d-block w-100" href="' . $link . '">'
					. $label .
				'</a>
			</div>
		</div>
		<button class="accordion-button w-auto collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $id . '" aria-expanded="false" aria-controls="collapse' . $id . '">
			<span class="caret"></span>
		</button>
	</div>';
}

/**
 * Returns ending accordion item tags
 */
function accordion_output_end() {
	return '</div>';
}

/**
 * Returns starting accordion container tags
 *
 * @param int $id Item id to assign with accordion item with its content.
 */
function accordion_container_output_begin( $id ) {
	return '<div id="collapse' . $id . '" class="accordion-collapse collapse" aria-labelledby="data' . $id . '" data-bs-parent="#accord' . $id . '">';
}

/**
 * Returns ending accordion container tags
 */
function accordion_container_output_end() {
	return '</div>';
}
