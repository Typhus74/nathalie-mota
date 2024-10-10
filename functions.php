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

        // script personnalisé pour la pagination Ajax
        wp_enqueue_script('custom-ajax', get_template_directory_uri() . '/assets/js/custom-ajax.js', array('jquery'), '1.0', true);
        wp_localize_script('custom-ajax', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

        // script lightbox
        wp_enqueue_script('lightbox', get_template_directory_uri() . '/assets/js/lightbox.js', array('jquery'), '1.0', true);

        // Bibliothèque Font Awesome
        wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array());

        // Bibliothèque Select2 pour les selects de tri
        wp_enqueue_script('select2-js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array('jquery'), '4.0.13', true);
        wp_enqueue_style('select2-css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css', array());
    }

add_action('wp_enqueue_scripts', 'theme_scripts');

function displayTaxonomies($taxonomie) {
    if($terms = get_terms(array(
        'taxonomy' => $taxonomie,
        'orderby' => 'name'
    ))) {
        foreach ( $terms as $term ) {
            echo '<option class="js-filter-item" value="' . $term->slug . '">' . $term->name . '</option>';
        }
    }
}
function displayImages($galerie, $exit) {
    if($galerie->have_posts()) {
        while ($galerie->have_posts()) { ?>
<?php $galerie->the_post(); ?>
<div class="colonne">
  <div class="rangee">
    <img class="img-medium" src="<?php echo the_post_thumbnail_url(); ?>" />
    <div>
      <div class="img-hover">
        <img class="btn-plein-ecran" src="<?php echo get_template_directory_uri(); ?>/assets/images/fullscreen.png"
          alt="Icône de plein écran" />
        <a href="<?php echo get_post_permalink(); ?>">
          <img class="btn-oeil" src="<?php echo get_template_directory_uri(); ?>/assets/images/eye_icon.png"
            alt="Icône en fome d'oeil" />
        </a>
        <div class="img-infos">
          <p><?php the_title(); ?></p>
          <p><?php echo strip_tags(get_the_term_list($galerie->ID, 'categories_photo')); ?></p>
        </div>
      </div>
    </div>
  </div>
</div> <?php
        }
    }
    else {
        echo "";
    }
    wp_reset_postdata();
    if ($exit) {
        exit();
    }
}