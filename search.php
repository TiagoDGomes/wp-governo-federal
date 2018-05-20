

<?php get_header(); ?>









<form class="form-gov" action="#">
    <div class="listagem busca">
        <h2>Busca</h2>
        <div class="descricao">
            <p>
            <?php if ( have_posts() ) : ?>
                <?php printf( _e('Resultados da busca por') ) ?> <em><?= get_search_query() ?></em>
                <?php else : ?>
                <?php printf( _e('Nenhum resultado encontrado') ) ?>:  <em><?= get_search_query() ?></em>
            <?php endif; ?>
            </p>
        </div>

        <div class="bloco grid">

            <div class="legenda">
                <h3>Pesquisa</h3>
                <div class="busca-geral">

                    <fieldset>
                        <legend>Ferramenta de busca</legend>
                        <label for="pagina-caixa-busca-portal">Buscar no portal</label>
                        <input id="pagina-caixa-busca-portal" name="s" type="text" size="18" title="Caixa de pesquisa" placeholder="Digite aqui para pesquisar" value="<?= get_search_query() ?>">
                        <input type="submit" value="Pesquisar">
                    </fieldset>

                </div>

            </div>
            <div class="opcoes">
                <div class="painel">
                    <fieldset>
                        <legend>Por categoria</legend>
                        <div class="opcao">
                            <input id="exemplo-checkbox-categoria-1" type="checkbox">
                            <label for="exemplo-checkbox-categoria-1">Categoria 1</label>
                        </div>
                        <div class="opcao">
                            <input id="exemplo-checkbox-categoria-2" type="checkbox">
                            <label for="exemplo-checkbox-categoria-2">Categoria 2</label>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Por período</legend>
                        <div class="opcao">
                            <div class="meio">
                                <label for="b_di">Data de início:</label>
                            </div>
                            <div class="meio">
                                <input id="b_di" name="b_di" type="date">
                            </div>
                        </div>
                        <div class="opcao">
                            <div class="meio">
                                <label for="b_df">Data final:</label>
                            </div>
                            <div class="meio">
                                <input id="b_df" name="b_df" type="date" max="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <!-- RESULTADOS DAS BUSCAS -->
            <div class="resultados">
                <?php if ( have_posts() ) : 
                        while (have_posts()) {
                            the_post(); 
                            get_template_part( 'content', get_post_format() ); 
                            
                        } ?>
                <?php else : ?>
                
                <?php endif; ?>
            </div>
            <!-- FIM DOS RESULTADOS DAS BUSCAS -->
        </div>
    </div>
</form>





<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php die(); ?>

<section id="primary">
    <div id="content" role="main">

    <?php if ( have_posts() ) : ?>

        <h2 class="page-title"><?= get_search_query() ?></h2>


        <?php //twentyeleven_content_nav( 'nav-above' ); ?>

        <?php /* Start the Loop */ ?>
        <?php
        while ( have_posts() ) :
            the_post();
?>

            <?php
                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to overload this in a child theme then include a file
                 * called content-___.php (where ___ is the Post Format name) and that
                 * will be used instead.
                 */
                echo '<div style="background-color: red"> - ' . get_post_format() . '</div>';
                get_template_part( 'content', get_post_format() );
            ?>

        <?php endwhile; ?>

        <?php //twentyeleven_content_nav( 'nav-below' ); ?>

    <?php else : ?>

        <article id="post-0" class="post no-results not-found">
            <header class="entry-header">
                <h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyeleven' ); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .entry-content -->
        </article><!-- #post-0 -->

    <?php endif; ?>

    </div><!-- #content -->
</section><!-- #primary -->

