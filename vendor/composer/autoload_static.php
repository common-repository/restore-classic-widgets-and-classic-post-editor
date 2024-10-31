<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit980ed974ebbf35238868b2cb0da3d473
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'arje_classic_widgets_and_post_editor_init' => __DIR__ . '/../..' . '/includes/arje_classic_widgets_and_post_editor_init.php',
        'arje_enable_classic_widgets_and_post_editor_options' => __DIR__ . '/../..' . '/includes/arje_enable_classic_widgets_and_post_editor_options.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit980ed974ebbf35238868b2cb0da3d473::$classMap;

        }, null, ClassLoader::class);
    }
}
