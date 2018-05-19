<!DOCTYPE html>
<html lang="pt-br" dir="ltr" class="">

<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php wp_title(); ?>
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link media="screen" rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/padraogoverno/resources/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/padraogoverno/resources/css/geral.css">
    <link media="screen" rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/padraogoverno/resources/css/tema.css">
    <link media="(min-width: 1024px)" rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/padraogoverno/resources/css/tela-grande.css">
    <link media="(min-width: 769px) and (max-width: 1023px)" rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/padraogoverno/resources/css/tela-media.css">
    <link media="(max-width: 768px)" rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/padraogoverno/resources/css/tela-pequena.css">
    <link media="screen" rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/padraogoverno/resources/css/grid.css">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/padraogoverno/resources/css/devel.css">
    <link media="print" rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/padraogoverno/resources/css/impressao.css">
    <link media="screen" rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/padraogoverno/resources/css/acessibilidade.css">
    <link rel="shortcut icon" href="<?= get_template_directory_uri()  ?>/padraogoverno/resources/img/favicon.ico" type="image/x-icon">
    <script src="<?= get_template_directory_uri()  ?>/padraogoverno/resources/js/cookies.js"></script>

    <!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/padraogoverno/resources/css/basic-ie.css" />
    <![endif]-->



    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>

</head>

<?php $theme_color = get_option('theme_color'); ?>

<body <?php body_class( 'class-name' ); ?>>
    <script src="<?= get_template_directory_uri()  ?>/padraogoverno/resources/js/acessibilidade.js"></script>
    <div id="barra-brasil"></div>
    <div id="tudo">
        <header>
            <div id="cabecalho">
                <div>
                    <div id="barra-atalhos">
                        <div  class="legenda screen-reader-text">Menu de atalhos</div>
                        <ul>
                            <li>
                                <a accesskey="1" href="#secao-conteudo" id="link-conteudo">
                                    Ir para o conteúdo
                                    <span>1</span>
                                </a>
                            </li>
                            <li>
                                <a accesskey="2" href="#secao-menu" id="link-navegacao">
                                    Ir para o menu
                                    <span>2</span>
                                </a>
                            </li>
                            <li>
                                <a accesskey="3" href="#busca-portal" id="link-buscar">
                                    Ir para a busca
                                    <span>3</span>
                                </a>
                            </li>
                            <li class="last-item">
                                <a accesskey="4" href="#secao-rodape" id="link-rodape">
                                    Ir para o rodapé
                                    <span>4</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="barra-idiomas">
                        <div class="legenda screen-reader-text">Menu de idiomas</div>
                        <ul>
                            <li>
                                <a href="#">English</a>
                            </li>
                            <li>
                                <a href="#">Español</a>
                            </li>
                        </ul>
                    </div>

                    <div id="barra-acessibilidade">
                        <div class="legenda screen-reader-text">Menu de acessibilidade</div>
                        <ul>
                            <li>
                                <a href="#">Acessibilidade</a>
                            </li>
                            <li class="js-necessario">
                                <a onclick="window.acessibilidade.altoContraste.alternar();return false;" href="#">Alto contraste</a>
                            </li>
                            <li>
                                <a href="#">Mapa do site</a>
                            </li>
                        </ul>
                    </div>


                    <div id="titulo">
                        <a href="<?= home_url() ?>">
                            <div class="denominacao">
                                <?= get_option('idg_denominacao'); ?>
                            </div>
                            <h1>
                                <?php bloginfo('name'); ?>
                            </h1>
                            <div class="subordinacao">
                                <?php bloginfo('description'); ?>
                            </div>
                        </a>
                    </div>

                    <form action="<?= home_url('/') ?>">
                        <fieldset id="barra-busca">
                            <legend>Ferramenta de busca</legend>
                            <label for="busca-portal">Buscar no portal</label>
                            <input name="s" type="text" size="18" title="Buscar no portal" placeholder="Buscar no portal" id="busca-portal">
                            <input type="submit" value="Buscar no portal">
                        </fieldset>
                    </form>

                    <div id="barra-redes-sociais">
                        <div class="legenda screen-reader-text">Menu de redes sociais</div>
                        <ul>
                            <?php if(get_option('youtube_url')):?>
                            <li class="youtube">
                                <a href="<?= get_option('youtube_url') ?>">YouTube</a>
                            </li>
                            <?php endif; ?>

                            <?php if(get_option('facebook_url')):?>
                            <li class="facebook">
                                <a href="<?= get_option('facebook_url') ?>">Facebook</a>
                            </li>
                            <?php endif; ?>

                            <?php if(get_option('gplus_url')):?>
                            <li class="googleplus">
                                <a href="<?= get_option('gplus_url') ?>">Google+</a>
                            </li>
                            <?php endif; ?>

                            <?php if(get_option('instagram_url')):?>
                            <li class="instagram">
                                <a href="<?= get_option('instagram_url') ?>">Instagram</a>
                            </li>
                            <?php endif; ?>

                            <?php if(get_option('tumblr_url')):?>
                            <li class="tumblr">
                                <a href="<?= get_option('tumblr_url') ?>">Thumblr</a>
                            </li>
                            <?php endif; ?>

                            <?php if(get_option('twitter_url')):?>
                            <li class="twitter">
                                <a href="<?= get_option('twitter_url') ?>">Twitter</a>
                            </li>
                            <?php endif; ?>

                            <?php if(get_option('flickr_url')):?>
                            <li class="flickr">
                                <a href="<?= get_option('flickr_url') ?>">Flickr</a>
                            </li>
                            <?php endif; ?>

                            <?php if(get_option('soundcloud_url')):?>
                            <li class="soundcloud">
                                <a href="<?= get_option('soundcloud_url') ?>">SoundCloud</a>
                            </li>
                            <?php endif; ?>

                            <?php if(get_option('slideshare_url')):?>
                            <li class="slideshare">
                                <a href="<?= get_option('slideshare_url') ?>">Slideshare</a>
                            </li>
                            <?php endif; ?>

                            <li class="rss">
                                <a href="<?php bloginfo('rss2_url'); ?>">RSS</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="barra-servicos">
                <?php idg_build_menu('idg-servicos'); ?>
            </div>

            <div id="barra-breadcrumb">
                <span class="legenda screen-reader-text">Localização da página</span>
                <span id="breadcrumbs-you-are-here">Você está aqui:</span>
                <span id="breadcrumbs-home">
                    <a href="<?= home_url() ?>">Página Inicial</a>
                </span>
            </div>
        </header>
        <div id="menu-em-destaque" style="display: none">
            <?php idg_build_menu('idg-em-destaque'); ?>
        </div>

        <div id="central">
            <nav id="menu-lateral">
                <a name="secao-menu" id="secao-menu" class="screen-reader-text">Menu principal</a>
                <?php $menu_relevancia = idg_get_menu("idg-menu-de-relevancia"); ?>
                <?php if($menu_relevancia !== FALSE) :?>
                <div class="menu-relevancia">
                    <div class="screen-reader-text">
                        Menu de relevância
                    </div>
                    
                    <?php idg_build_menu('idg-menu-de-relevancia'); ?>
                    
                </div>
                <?php endif; ?>

                <?php for ($i = 1; $i <= IDG_MAX_MENU_LATERAL_ESQUERDO; $i++) : ?>
                <?php $menu = idg_get_menu("idg-menu-lateral-esquerdo-$i"); ?>
                <?php if (is_array($menu) || is_object($menu)) :?>
                <div class="bloco <?= $menu->slug ?> <?= $menu->taxonomy ?>">
                    <div class="legenda">
                        <?= $menu->name; ?>
                    </div>
                    
                    <?php idg_build_menu("idg-menu-lateral-esquerdo-$i"); ?>
                    
                </div>
                <?php endif; ?>
                <?php endfor; ?>

                <?php if ( is_active_sidebar( 'menu-lateral-esquerdo' ) ) : ?>
                <?php dynamic_sidebar( 'menu-lateral-esquerdo' ); ?>
                <?php endif; ?>

                <?php if(idg_get_menu("idg-central-de-conteudos") !== FALSE) :?>
                <div class="bloco centrais-de-conteudos">
                    <div class="legenda">
                        Centrais de Conteúdos
                    </div>
                    
                    <?php idg_build_menu("idg-central-de-conteudos"); ?>
                    
                </div>
                <?php endif; ?>
            </nav>
            <div id="area-conteudo">
                <main class="grid">
                    <a name="secao-conteudo" id="secao-conteudo" class="screen-reader-text"></a>