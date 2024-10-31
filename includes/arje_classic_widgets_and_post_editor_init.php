<?php

if (!defined('ABSPATH')) {
    exit;
}

class arje_classic_widgets_and_post_editor_init extends arje_enable_classic_widgets_and_post_editor_options
{

    public function __construct()
    {
        add_action( 'activated_plugin', [$this, 'activate']);
        add_action('deactivated_plugin',   [$this, 'deactivate']);
        add_action('admin_menu', [arje_enable_classic_widgets_and_post_editor_options::class, 'classic_widgets_and_post_editor_options_page']);
        add_action('admin_init', [arje_enable_classic_widgets_and_post_editor_options::class, 'enable_classic_widgets_and_post_editor_register_setting']);
        parent::__construct();
         $option_editor = !empty(self::$getOption['editor_turning_on_and_off']) ? self::$getOption['editor_turning_on_and_off'] : '';
         $option_widget = !empty(self::$getOption['widget_turning_on_and_off']) ? self::$getOption['widget_turning_on_and_off'] : '';
        if ($option_editor === 'on') {
            add_filter('gutenberg_can_edit_post', '__return_false', 100);
            add_filter('use_block_editor_for_post', '__return_false', 100);
        }
        if ($option_widget === 'on') {
            // Disables the block editor from managing widgets.
            add_filter('gutenberg_use_widgets_block_editor', '__return_false', 100);
            add_filter('use_widgets_block_editor', '__return_false', 100);
        }

    }

    public function  deactivate()
    {
        delete_option('classic_widgets_and_post_editor_options');
    }

    public  function  activate()
    {
          add_option('classic_widgets_and_post_editor_options',
              [
                  'editor_turning_on_and_off' => 'on',
                  'widget_turning_on_and_off' => 'on'
              ]
          );
    }
}
