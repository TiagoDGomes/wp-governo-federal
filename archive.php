<?php get_header();?>

<div class="listagem">
    <h2>
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
        <?php echo single_cat_title(); ?>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        Arquivo de <?php the_time('j de F de Y'); ?>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        Arquivo de <?php the_time('F de Y'); ?>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        Arquivo de <?php the_time('Y'); ?>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        Arquivo do Autor
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        Arquivo do Blog
    <?php } ?>
    </h2>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php include 'content.php'?>
        <?php endwhile?>
        <?php else: ?>
        <div class="artigo">
            <h2>Nada Encontrado</h2>
            <p>Erro 404</p>
            <p>Lamentamos mas não foram encontrados artigos.</p>
        </div>
    <?php endif; ?>

</div><!-- fim .listagem -->

<?php get_footer();?>