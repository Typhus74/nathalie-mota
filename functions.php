<?php
//* Configuration du thème

if (!function_exists('nathalie_mota_theme_setup')) {
    function nathalie_mota_theme_setup()
    {
        // Ajouter la prise en charge des images mises en avant
        add_theme_support('post-thumbnails');

        // Ajouter automatiquement le titre du site dans l'en-tête du site
        add_theme_support('title-tag');

        // Déclarer deux emplacements de menu : menu principal et footer
        register_nav_menus(array(
            'main' => 'Menu principal',
            'footer' => 'Bas de page',
        ));
        // Activer la prise en charge des formats
        add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video',));
    }
    add_action('after_setup_theme', 'nathalie_mota_theme_setup');
};

    function theme_scripts()
    {
        // CSS
        wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'));

        //SCSS
        wp_enqueue_style('main-style', get_template_directory_uri() . '/main.css', array(), filemtime(get_template_directory() . '/main.css'));

        // JS
        wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/index.js', array('jquery'), '1.0', true);

}

add_action('wp_enqueue_scripts', 'theme_scripts');
