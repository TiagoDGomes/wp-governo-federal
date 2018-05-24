<?php if ($_GET["pagina-especial"] == 'mapa-do-site'): ?>

    <?php include __DIR__ . '/page-mapa-do-site.php' ?>

<?php else : ?>


<?php get_header(); ?>
	<?php dynamic_sidebar( 'miolo-central-1' ); ?>
<?php get_footer(); ?>

<?php endif; ?>