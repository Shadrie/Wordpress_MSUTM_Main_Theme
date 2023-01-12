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
<div class="news-carousel-container-item">    
	<div class="news-item">
		<?php if ( $thumbnail ) { ?>
			<a href="<?php echo esc_url( get_the_permalink() ); ?>">
				<div class="news-item-photo">
					<div class="inside zooming" style="background-image: url(<?php echo esc_url( $thumbnail ); ?>);"></div>
				</div>     
			</a>   
		<?php } ?>       
		<a href="<?php echo esc_url( get_the_permalink() ); ?>">
			<div class="news-item-title"><?php the_title(); ?></div>
		</a>         
		<div class="news-item-date"><?php echo get_the_date( 'j F Y H:i' ); ?></div>
	</div> 
</div>
