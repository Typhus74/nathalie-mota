<?php get_header(); ?>

<main id="main" class="site-main" role="main"> <!--Ouvre la balise principale du contenu de la page.  -->

    <?php

    $args = array(
        'post_type' => 'photos', //Ici, on cherche un post de type 'photos' avec l'ID spécifique de la page courante.
        'p' => get_the_ID(),

    );

    $custom_query_single_photo = new WP_Query($args); //Crée une nouvelle requête WordPress personnalisée avec les arguments définis.

    if ($custom_query_single_photo->have_posts()) { // Vérifie si la requête a retourné des résultats.
        while ($custom_query_single_photo->have_posts()) { // Boucle à travers les résultats de la requête
            $custom_query_single_photo->the_post(); //Configure les données du post

            get_template_part('templates_parts/content/photo_details');
        }
        wp_reset_postdata(); // Réinitialise les données originales de la requête 
    }
    ?>
</main>

<?php get_footer(); ?>