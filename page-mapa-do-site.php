<?php get_header(); ?>

<h2>Mapa do site</h2>

<?php if (count( get_option('sidebars_widgets')['mapa-do-site-1'] ) > 0): ?>

    <?php dynamic_sidebar( 'mapa-do-site-1' ); ?>

<?php else: ?> 
    <?php if (current_user_can( 'administrator' ) ) : ?>
        <p>Esta área não foi personalizada. Utilize widgets nesta página para inserir conteúdo.</p>
        <?php dynamic_sidebar( 'mapa-do-site-1' ); ?>
    <?php else: ?> 
        <p>Sem conteúdo.</p>
    <?php endif; ?> 

<?php endif; ?>   

<?php get_footer(); ?>