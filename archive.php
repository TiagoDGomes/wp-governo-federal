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
        <div class="noticia">
            <div class="informacoes">
                <div class="screen-reader-text">Informações sobre a publicação:</div>
                <div class="info">
                    <div class="data">
                        <time datetime="<?php the_time('Y-m-d H:i') ?>2000-01-31 12:00">
                            <span class="data"><?php the_time('d/m/Y') ?></span>
                            <span class="hora"><?php the_time('H:i') ?></span>
                        </time>
                    </div>
                    <!--
                    <div class="tipo">
                        <span class="video">Vídeo</span>
                    </div>
                    -->
                </div>
            </div><!-- fim .informacoes -->
            <div class="publicacao">
                <div class="chapeu"><?=get_post_meta(get_the_ID(), 'Chapéu', true);?></div>
                <h3>
                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>    
                </h3>
                <div class="conteudo">
                    <?php if (has_excerpt()): ?>
                        <?php the_excerpt();?>                    
                    <?php else:?>
                        <?php the_content(); ?>
                    <?php endif;?>
                </div>
                <?php if (get_the_tags()): ?>
                <div class="tags">
                    <div class="legenda">Tópicos:</div>
                    <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
                </div>
                <?php endif; ?>
                <div class="categorias">
                    <div class="legenda">Registrado em: </div>
                    <?php the_category();?>
                </div>
            </div><!-- fim .publicacao -->
        </div><!-- fim .noticia -->
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