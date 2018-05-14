
                    
                
                
                </main>
                </div>

            </div>

            <div class="clear"></div>
            <div id="voltar-topo">
                <a href="#wrapper" data-unsp-sanitized="clean">Voltar para o topo</a>
            </div>

        </div>
    </div>

    <footer>
        <div class="menu">
            <a name="afooter" id="afooter"></a>            
            <div class="row">
                <?php for ($i = 1; $i <= IDG_MAX_MENU_RODAPE; $i++) : ?>
                    <?php $menu = idg_get_menu("idg-menu-rodape-$i"); ?>                    
                    <?php if($menu !== FALSE) :?>                    
                        <div class="col col-12 col-sm-6 col-md-3">
                            <dl>
                                <dt>
                                    <?= $menu->name; ?>
                                </dt>
                                <dd>
                                    <?php idg_build_menu("idg-menu-rodape-$i"); ?> 
                                </dd>
                            </dl>
                        </div>                        
                    <?php endif; ?>    
                <?php endfor; ?> 
            </div>
        </div>
        <div id="footer-brasil"></div>
    </footer>

    <div id="about-template">
        Desenvolvido com o CMS de código aberto <a href="https://br.wordpress.org/" data-unsp-sanitized="clean">WordPress</a>
    </div>
    <script defer="defer" src="https://barra.brasil.gov.br/barra.js" type="text/javascript"></script>
    <script>
        var elements = document.querySelectorAll('.necessario-javascript');
        Array.prototype.forEach.call(elements, function (el, i) {
            el.classList.remove('necessario-javascript');
        });
    </script>
    <?php wp_footer(); ?>
</body>

</html>