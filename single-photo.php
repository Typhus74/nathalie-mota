<?php
/*
Template Name: Single
*/

get_header();

the_post_thumbnail(); 
?>

<?php ?>
<div class="Images">
<div class="image"> <?php $photos = get_field('image'); ?> </div>

<!--format: Display single values-->

<?php 
$term = get_field('champ_format');
//var_dump($term);
if( $term ): ?>
    <h2><?php echo esc_html( $term->name ); ?></h2>
    <p><?php echo esc_html( $term->description ); ?></p>
<?php endif; ?>

<!--catégorie: Display multiple values-->

<?php 
$terms = get_field('champ_categorie');
if( $terms ): ?>
    <ul>
    <?php foreach( $terms as $term ): ?>
        <li>
            <h2><?php echo esc_html( $term->name ); ?></h2>
            <p><?php echo esc_html( $term->description ); ?></p>
            <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">View all '<?php echo esc_html( $term->name ); ?>' posts</a>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; 

get_footer();?>