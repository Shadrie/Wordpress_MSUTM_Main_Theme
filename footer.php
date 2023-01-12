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
		<?php
		if ( ! is_front_page() ) {
			echo '</div>';
		}
		?>
		</div><!-- #content -->
		<footer role="contentinfo" id="footer">
			<div class="section-footer section-footer-nav">
				<div class="container">
					<div class="row">
						<div class="col-sm-4"> 
							<?php get_template_part( 'template-parts/footer/social' ); ?>
						</div>
						<div class="col-sm-4">  
							<?php get_template_part( 'template-parts/footer/useful-links' ); ?>
						</div>
						<div class="col-sm-4">
							<?php get_template_part( 'template-parts/footer/main-contacts' ); ?>
						</div>
					</div>
				</div>
			</div> <!-- /end .section-footer -->
			<div class="section-footer py-2">
				<div class="container">
					<div class="copyright">
						&copy; <?php echo esc_html( get_bloginfo( 'name' ) ) . ', ' . esc_html( gmdate( 'Y' ) ); ?>
					</div>
				</div>
			</div> <!-- /end .section-footer -->      
			<?php wp_footer(); ?>
		</footer> <!-- /end #footer -->
	</div> <!-- /end .wrapper -->
</body>          
</html>
