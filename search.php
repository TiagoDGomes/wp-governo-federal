

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