<?php
/**
 * Single post template
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

$thumbnail = get_the_post_thumbnail_url( '', 'medium' );
?>				     
<div class="article-item">
	<a href="<?php echo esc_url( get_the_permalink() ); ?>">
		<?php if ( $thumbnail ) { ?>
			<div class="article-photo bg-center mb-2" style="background-image: url(<?php echo esc_url( $thumbnail ); ?>);"></div>     
		<?php } ?>       
		<div class="article-title"><?php the_title(); ?></div>
	</a>         
	<div class="fw-lighter"><?php echo get_the_date( 'j F Y H:i' ); ?></div>
</div>
