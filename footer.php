</main>

<?php
    get_template_part('modale');
    get_template_part('lightbox');
?>

<footer class="footer">
  <nav class="footer__nav">
    <?php
       wp_nav_menu(
        array(
            
            'theme_location' => 'footer',
            'container' => 'ul',
            'menu_class' => 'site__footer__menu', // ma classe personnalisée 
            )
        );
        ?>
  </nav>
  </footer>
  <?php wp_footer() ?>


</body>

</html>