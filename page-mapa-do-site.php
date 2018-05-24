<?php get_header(); ?>

<h2>Mapa do site</h2>

<?php if (count( get_option('sidebars_widgets')['mapa-do-site-1'] ) == 0): ?>   
    <?php if (current_user_can( 'administrator' ) ) : ?>        
        <p>Esta área não foi personalizada. 
        Clique 
        <a href="<?= site_url() ?>/wp-admin/customize.php?url=<?= htmlentities(site_url() . '/?' . $_SERVER["QUERY_STRING"])  ?>">aqui</a> 
        para personalizar.</p>
    <?php else: ?> 
        <p>Sem conteúdo.</p>
    <?php endif; ?> 
<?php endif; ?> 
<?php dynamic_sidebar( 'mapa-do-site-1' ); ?>

<?php get_footer(); ?>