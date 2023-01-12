<?php
/**
 * Support functions for fancybox feature
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
 * Get thumbnail for youtube video embedding from external resource
 *
 * @param string $url Youtube video URL.
 */
function get_youtube_thumbnail( $url ) {
	$value    = explode( 'v=', $url );
	$video_id = $value[1];
	$preview  = 'https://i3.ytimg.com/vi/' . $video_id . '/maxresdefault.jpg';
	return $preview;
}
