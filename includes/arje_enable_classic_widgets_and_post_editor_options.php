<?php

if (!defined('ABSPATH')) {
    exit;
}

class arje_enable_classic_widgets_and_post_editor_options
{

    protected static $getOption;

    public function __construct()
    {
        self::$getOption = !empty(get_option('classic_widgets_and_post_editor_options')) ? get_option('classic_widgets_and_post_editor_options') : [];
    }

    public static function classic_widgets_and_post_editor_options_page()
    {
        add_submenu_page(
            'options-general.php',
            __('Classic Editor And Widget', 'restore-classic-widgets-and-classic-post-editor'),
            __('Classic Editor And Widget Settings', 'restore-classic-widgets-and-classic-post-editor'),
            'manage_options',
            'classic-widgets-and-post-editor-options',
            [arje_enable_classic_widgets_and_post_editor_options::class, 'classic_widgets_and_post_editor_page_content'], // callback function /w content,
            2,
        );
    }

    public static function classic_widgets_and_post_editor_page_content()
    {
        ?>
        <div class="wrap">
            <h1><?php echo __('Restore and Enable Classic Widgets and Post Editor', 'restore-classic-widgets-and-classic-post-editor'); ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('classic_widgets_and_post_editor_settings'); // settings group name
                do_settings_sections('classic_widgets_and_post_editor-slug'); // just a page slug
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public static function enable_classic_widgets_and_post_editor_register_setting()
    {

        register_setting(
            'classic_widgets_and_post_editor_settings', // settings group name
            'classic_widgets_and_post_editor_options' // option name
        );

        add_settings_section(
            'classic_widgets_and_post_editor_section_id', // section ID
            '', // title (if needed)
            '', // callback function (if needed)
            'classic_widgets_and_post_editor-slug' // page slug
        );

        add_settings_field(
            'field_turning_on_and_off',
            __('Classic Editor', 'restore-classic-widgets-and-classic-post-editor'),
            [arje_enable_classic_widgets_and_post_editor_options::class, 'editor_turning_on_and_off'], // function which prints the field
            'classic_widgets_and_post_editor-slug', // page slug
            'classic_widgets_and_post_editor_section_id', // section ID
            array(
                'label_for' => 'editor_turning_on_and_off',
                'class' => 'editor_turning_on_and_off-class', // for <tr> element
            )
        );

        add_settings_field(
            'widget_turning_on_and_off',
            __('Classic Widgets Page', 'restore-classic-widgets-and-classic-post-editor'),
            [arje_enable_classic_widgets_and_post_editor_options::class, 'widget_turning_on_and_off'], // function which prints the field
            'classic_widgets_and_post_editor-slug', // page slug
            'classic_widgets_and_post_editor_section_id', // section ID
            array(
                'label_for' => 'widget_turning_on_and_off',
                'class' => 'widget_turning_on_and_off-class', // for <tr> element
            )
        );
    }

    public static function editor_turning_on_and_off()
    {
        $value = self::$getOption;
        ?>
        <?php if (isset($value['editor_turning_on_and_off'])) : ?>
        <select id="editor_turning_on_and_off"
                name="classic_widgets_and_post_editor_options[editor_turning_on_and_off]">
            <option value="on" <?php echo ($value['editor_turning_on_and_off'] === 'on') ? 'selected' : '' ?>>On
            </option>
            <option value="off" <?php echo ($value['editor_turning_on_and_off'] === 'off') ? 'selected' : '' ?>>Off
            </option>
        </select>
    <?php endif; ?>
        <?php
    }

    public static function widget_turning_on_and_off()
    {
        $value = self::$getOption;
        ?>
        <?php if (isset($value['widget_turning_on_and_off'])) : ?>
        <select id="widget_turning_on_and_off"
                name="classic_widgets_and_post_editor_options[widget_turning_on_and_off]">
            <option value="on" <?php //echo (trim($text['widget_turning_on_and_off']) === 'on') ? 'selected' : '' ?>>
                On
            </option>
            <option value="off" <?php echo (trim($value['widget_turning_on_and_off']) === 'off') ? 'selected' : '' ?>>
                Off
            </option>
        </select>
    <?php endif; ?>
        <?php
    }

}
