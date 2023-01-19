<?php
/**
 * The footer template
 * PHP version 8.1
 *
 * Displays the closing <div id="content"> and <footer> section
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

?>	
		</div>
		<!-- Content: end -->
		<!-- Footer: begin -->
		<footer id="footer" class="bg-dark py-2 text-light">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-3 mb-3"> 
						<!-- Social links: begin -->
						<?php get_template_part( 'template-parts/footer/social' ); ?>
						<!-- Social links: end -->
					</div>
					<div class="col-sm-6 mb-3">
						<!-- Useful links: begin -->
						<?php get_template_part( 'template-parts/footer/useful-links' ); ?>
						<!-- Useful links: end -->
					</div>
					<div class="col-sm-3 mb-3">
						<!-- Main contacts: begin -->
						<?php get_template_part( 'template-parts/footer/main-contacts' ); ?>
						<!-- Main contacts: end -->
					</div>
				</div>
			</div>
			<!-- Copyright: begin -->
			<div class="border-top border-secondary container-fluid">
				<div class="pt-1">
					&copy; <?php echo esc_html( get_bloginfo( 'name' ) ) . ', ' . esc_html( gmdate( 'Y' ) ); ?>
				</div>  
			</div>
			<!-- Copyright: end -->
			<?php wp_footer(); ?>
		</footer>
		<!-- Footer: end -->
	</div>
	<!-- Wrapper: end -->
</body>          
</html>
