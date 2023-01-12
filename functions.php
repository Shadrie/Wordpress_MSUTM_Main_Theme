<?php
/**
 * Functions used in the theme
 * PHP version 8.1
 *
 * @category  Wordpress_Theme
 * @package   Wordpress_MSUTM_Main_Theme
 * @author    Natalya Sosina <ragneith@gmail.com>
 * @copyright 2022 Moscow State University of Technology and Management
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/Shadrie/Wordpress_MSUTM_Main_Theme
 */

// Setting up the theme.
require 'functions/settings.php';

// UI styles and scripts.
require 'functions/load-scripts.php';

// Custom post types.
require 'functions/custom-post-types/main.php';

// Custom meta fields.
require 'functions/carbon-fields/main.php';

// Meta tags for SEO.
require 'functions/meta-tags.php';

// Navigation types realization.
require 'functions/menu/main.php';

// Functions for template parts used in theme.
require 'functions/template/main.php';
