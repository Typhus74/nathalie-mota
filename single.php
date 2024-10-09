<?php get_header(); ?>

<main id="main" class="site-main" role="main">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <div class="page-photo bloc-page">

        <section class="bloc-photo colonnes">
            <div class="bloc-photo__description colonne">
                <h1><?php the_title(); ?></h1>
                <?php 
                 $term = get_field('champ_format');
                    //var_dump($term);
                    if( $term ): ?>
                        <h2><?php echo esc_html( $term->name ); ?></h2>
                        <p><?php echo esc_html( $term->description ); ?></p>
                <?php endif; ?>

                <?php 
                    $term = get_field('champ_categorie');
                   if( $term ): ?>
                      <h2><?php echo esc_html( $term->name ); ?></h2>
                       <p><?php echo esc_html( $term->description ); ?></p>
                <?php endif; ?>
            </div>    
                <img class="bloc-photo__image colonne" src="<?php the_post_thumbnail(); ?>">
        </section>

        <section class="interaction-photo colonnes">
            <div>
                <p class="texte">Cette photo vous intéresse ?</p>
                <input class="interaction-photo__btn bouton btn-modale" type="button" value="Contact">
            </div>
            <div class="interaction-photo__navigation">
                <?php
                    $prevPost = get_previous_post();
                    $nextPost = get_next_post();
                ?>
            <div class="arrows">
            <?php if (!empty($prevPost)) {
                            $prevThumbnail = get_the_post_thumbnail_url( $prevPost->ID );
                            $prevLink = get_permalink($prevPost); ?>
            <a href="<?php echo $prevLink; ?>">
            <img class="arrow arrow-gauche" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_left.png"
                alt="Flèche pointant vers la gauche" />
            </a>
            <?php } else { ?>
            <img style="opacity:0; cursor: auto;" class="arrow "
                src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_left.png" />
            <?php } if (!empty($nextPost)) {
                            $nextThumbnail = get_the_post_thumbnail_url( $nextPost->ID );
                            $nextLink = get_permalink($nextPost); ?>
            <a href="<?php echo $nextLink; ?>">
            <img class="arrow arrow-droite"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow_right.png"
                alt="Flèche pointant vers la droite" />
            </a>
            <?php } ?>
            <div class="preview">
                <img class="previous-image" src="<?php echo $prevThumbnail; ?>" alt="Prévisualisation image précédente">
            </div>
            <div class="preview">
                <img class="next-image" src="<?php echo $nextThumbnail; ?>" alt="Prévisualisation image suivante">
            </div>
        </section>

        <section class="recommandations">
            <h2>Vous aimerez aussi</h2>
            <div class="recommandations__images colonnes">
                <?php
                
                endwhile;

                
            
        endif; ?>
                

</main>

<?php get_footer(); ?>