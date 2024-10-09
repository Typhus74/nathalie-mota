<?php get_header(); ?>

<main id="main" class="site-main" role="main">

    <!-- Banner -->
    <section class="banner">
        <?php
        $post_id = 88; // ID du post pour afficher son image dans la bannière
        $thumbnail_banner = get_the_post_thumbnail_url($post_id);

        if ($thumbnail_banner) {
        ?>
            <img src="<?php echo $thumbnail_banner; ?>" alt="<?php echo  get_the_title($post_id); ?>">

        <?php } ?>

        <h1 class="title">Photographe event</h1>
    </section>
    
<?php get_footer() ?>