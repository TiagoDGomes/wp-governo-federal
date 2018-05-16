
                    
                
                
                    </main>
            </div>
        </div>

        <div class="clear"></div>
        <div id="voltar-topo">
            <a href="#wrapper">Voltar para o topo</a>
        </div>
        <footer>
            <a name="secao-rodape" id="secao-rodape" class="screen-reader-text">Menu de rodapé</a>
            <div id="footer-menu" class="grid">
                <div class="linha tamanho-<?= IDG_MAX_MENU_RODAPE ?>">
                    <?php for ($i = 1; $i <= IDG_MAX_MENU_RODAPE; $i++) : ?>
                        <?php $menu = idg_get_menu("idg-menu-rodape-$i"); ?>                    
                        <?php if (is_array($menu) || is_object($menu)) :?>
                        <dl class="celula">
                            <dt class="menu-bloco">
                                <?= $menu->name; ?>
                            </dt>
                            <dd>
                                <?php idg_build_menu("idg-menu-rodape-$i"); ?> 
                            </dd>
                        </dl>
                        <?php endif; ?>  
                    <?php endfor; ?> 
                </div>            
            </div> 
            <div id="footer-brasil"></div>
            <div id="extra-footer">
                <p>
                    Desenvolvido com o CMS de código aberto <a href="https://br.wordpress.org/">WordPress</a>
                </p>
            </div>
        </footer>
    
        <script defer="defer" src="https://barra.brasil.gov.br/barra.js"></script>
        <script>
            var elementosDesabilitadosJavascript = document.querySelectorAll('.js-necessario');
            Array.prototype.forEach.call(elementosDesabilitadosJavascript, function (el, i) {
                el.classList.remove('js-necessario');
            });
        </script>
        <?php wp_footer(); ?>
</body>

</html>