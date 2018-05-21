

<?php get_header(); ?>

<form class="form-gov" action=".">

    <div class="listagem busca">

        <h2>Busca</h2>

        <div class="descricao">
           
            <?php if ( have_posts() ) : ?>
                <p><?php printf( _e('Resultados da busca por') ) ?> <em><?= get_search_query() ?></em>.</p>
                <div class="screen-reader-text">
                    <p>Você pode:</p>
                    <ul>
                        <li><a href="#nav-resultados">Ir para os resultados</a></li>
                        <li><a href="#pagina-caixa-busca-portal">Ir para a caixa de busca</a></li>
                        <li><a href="#nav-opcoes">Ir para o filtro de busca</a></li>
                    </ul>
                </div>
                <?php else : ?>
                <p><?php printf( _e('Nenhum resultado encontrado') ) ?>:  <em><?= get_search_query() ?></em></p>
            <?php endif; ?>
            
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
            
            <a name="nav-opcoes" id="nav-opcoes"></a>
            <div class="opcoes">
                <div class="painel">
                    <?php // echo do_shortcode('[searchandfilter fields="search,category,post_tag,post_date" types=",checkbox,checkbox,daterange" headings=",Por categorias,Por tópicos"]'); ?>
                                        
                    <?php $lista_categorias = get_categories(); ?>
                    <p class="screen-reader-text">As opções a seguir fazem parte do filtro de busca.</p>
                    <fieldset>
                        <legend>Por categoria</legend>
                        <ul>
                        <?php foreach($lista_categorias as $categoria): ?> 

                            <li>
                                <input <?= idg_busca_opcao_checked('s_cat',$categoria->cat_ID) ?> name="s_cat[]" id="categoria-<?= $categoria->slug ?>" type="checkbox" value="<?= $categoria->cat_ID ?>">
                                <label for="categoria-<?= $categoria->slug ?>"><?= $categoria->name ?></label>
                            </li>

                        <?php endforeach ; ?>

                        </ul> 
                    </fieldset>
                    
                    <?php $lista_tags = get_tags(); ?>
                       
                    <fieldset>
                        <legend>Por tópicos</legend>
                        <ul>
                        <?php foreach($lista_tags as $tag): ?> 
                        
                            <li>
                                <input <?= idg_busca_opcao_checked('s_tag',$tag->term_id ) ?>  name="s_tag[]" id="tag-<?= $tag->slug ?>" type="checkbox" value="<?= $tag->term_id  ?>">
                                <label for="tag-<?= $tag->slug ?>"><?= $tag->name ?></label>
                            </li>

                        <?php endforeach ; ?>

                        </ul>
                    </fieldset>
                    
                
                    <fieldset>                            
                        <legend>Por período</legend>
                        <div class="opcao">
                            <div class="meio">
                                <label for="s_di">Data de início:</label>
                            </div>
                            <div class="meio">
                                <input id="s_di" name="s_di" type="date" max="<?= date('Y-m-d') ?>" value="<?= idg_busca_data_enviada('s_di') ?>">
                            </div>
                        </div>
                        
                        <div class="opcao">
                            <div class="meio">
                                <label for="s_df">Data final:</label>
                            </div>
                            <div class="meio">
                                <input id="s_df" name="s_df" type="date" max="<?= date('Y-m-d') ?>" value="<?= idg_busca_data_enviada('s_df') ?>">
                            </div>
                        </div>
                        
                    </fieldset>
                </div>
            </div>
            
            <!-- RESULTADOS DAS BUSCAS -->
            <a name="nav-resultados" id="nav-resultados"></a>
            <div class="resultados">
                <?php if ( have_posts() ) : ?>
                    <p class="screen-reader-text">Você está nos <em>resultados da busca.</em></p>
                    <?php while (have_posts()) : ?>
                         <?php  the_post();  ?>
                         <?php  get_template_part( 'content', get_post_format() );    ?>                          
                    <?php  endwhile; ?>
                <?php else : ?>
                    <p>Nenhum resultado foi encontrado com as opções selecionadas.</p>
                <?php endif; ?>
            </div>
            <!-- FIM DOS RESULTADOS DAS BUSCAS -->

        </div>

    </div>

</form>



<?php get_sidebar(); ?>
<?php get_footer(); ?>