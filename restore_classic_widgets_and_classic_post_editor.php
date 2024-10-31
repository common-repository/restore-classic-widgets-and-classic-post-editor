<?php
/**
 * Plugin Name:     Restore Classic Widgets and Classic Post Editor
 * Plugin URI:      https://ardigitalg.e
 * Description:     Restore the previous WordPress classic widgets and post editor settings screens and disables the Gutenberg block editor from managing widgets or post editor.
 * Author:          Temo Arjevanidze
 * Author URI:      https://www.facebook.com/temo.webmastera
 * Text Domain:     restore-classic-widgets-and-classic-post-editor
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Restore_Classic_Widgets_and_Classic_Post_Editor
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'plugin_textdomain_load_restore_classic_widgets_and_classic_post_editor');
function plugin_textdomain_load_restore_classic_widgets_and_classic_post_editor()
{
    load_plugin_textdomain('restore-classic-widgets-and-classic-post-editor', false, dirname(plugin_basename(__FILE__)) . '/languages');
}

if (!class_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

new arje_classic_widgets_and_post_editor_init();