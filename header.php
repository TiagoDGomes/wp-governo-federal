<!DOCTYPE html>
<html lang="pt-br" dir="ltr" class="">

<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if ( ! function_exists( '_wp_render_title_tag' ) ) : ?>
    <?php function theme_slug_render_title() {?>
            <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php } ?>
    <?php add_action( 'wp_head', 'theme_slug_render_title' );?>
    <?php endif; ?>
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

<body <?php body_class( ); ?>>
    <script src="<?= get_template_directory_uri()  ?>/padraogoverno/resources/js/acessibilidade.js"></script>    
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
                    <?php $english_url = get_option('english_url'); ?>
                    <?php $spanish_url = get_option('spanish_url'); ?>
                    <?php if ($spanish_url || $english_url) :?>
                    <div id="barra-idiomas">
                        <div class="legenda screen-reader-text">Menu de idiomas</div>
                        <ul>
                            <?php if ($english_url) :?>
                            <li>
                                <a href="<?= $english_url ?>">English</a>
                            </li>
                            <?php endif; ?>
                            <?php if ($spanish_url) :?>
                            <li>
                                <a href="<?= $spanish_url ?>">Español</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div id="barra-acessibilidade">
                        <div class="legenda screen-reader-text">Menu de acessibilidade</div>
                        <ul>
                            <li>
                                <a href="<?= site_url() ?>/?pagina-especial=acessibilidade">Acessibilidade</a>
                            </li>
                            <li class="js-necessario">
                                <a onclick="window.acessibilidade.altoContraste.alternar();return false;" href="#">Alto contraste</a>
                            </li>
                            <li>
                                <a href="<?= site_url() ?>/?pagina-especial=mapa-do-site">Mapa do site</a>
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

                    <form class="busca-geral" action="<?= home_url('/') ?>">                        
                        <?php fieldset_busca('barra-busca','busca-portal','s'); ?>
                    </form>

                    <div id="barra-redes-sociais">
                        <div class="legenda screen-reader-text">Menu de redes sociais</div>
                        <ul>
                            <?php if(get_option('youtube_site')):?>
                            <li class="youtube">
                                <a href="<?= get_option('youtube_site') ?>">YouTube</a>
                            </li>
                            <?php endif; ?>

                            <?php if(get_option('facebook_site')):?>
                            <li class="facebook">
                                <a href="<?= get_option('facebook_site') ?>">Facebook</a>
                            </li>
                            <?php endif; ?>

                            <?php if(get_option('google_plus_url')):?>
                            <li class="googleplus">
                                <a href="<?= get_option('google_plus_url') ?>">Google+</a>
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

                            <?php if(get_option('twitter_site')):?>
                            <li class="twitter">
                                <a href="<?= get_option('twitter_site') ?>">Twitter</a>
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
            <div id="barra-brasil"></div>
            <div id="barra-breadcrumb">
                <?php $navxt =  function_exists('bcn_display'); ?>
                <?php $yoast =  function_exists('yoast_breadcrumb'); ?>
                <?php $idg_breadcrumb =  function_exists('show_idg_breadcrumb'); ?>

                <?php if ($navxt || $yoast || $idg_breadcrumb) : ?>
                    <span class="legenda screen-reader-text">Localização da página</span>
                    <span id="breadcrumbs-you-are-here">Você está aqui:</span>

                    <?php if ($navxt) : ?>
                        <?php bcn_display(); ?> 
                    <?php elseif ($yoast) : ?>
                        <?php yoast_breadcrumb('<span>',' </span>');?> 
                    <?php elseif ($idg_breadcrumb) : ?>         
                        <?php show_idg_breadcrumb(); ?>                                  
                    <?php endif; ?>
                <?php else: ?>
                    &nbsp;   
                <?php endif; ?>
            </div>
            
        </header>
        <div id="menu-em-destaque" style="display: none">
            <?php idg_build_menu('idg-em-destaque'); ?>
        </div>

        <div id="central">
            <nav id="menu-lateral">
                <a name="secao-menu" id="secao-menu" class="screen-reader-text">Menu principal</a>

                <?php if ( is_active_sidebar( 'menu-lateral-esquerdo-topo' ) ) : ?>
                <?php dynamic_sidebar( 'menu-lateral-esquerdo-topo' ); ?>
                <?php endif; ?>

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


                <?php $menu_relevancia = idg_get_menu("idg-central-de-conteudos");?>
                <?php if($menu_relevancia !== FALSE && $menu_relevancia !== NULL ) :?>
                <div class="bloco centrais-de-conteudos">
                    <div class="legenda">
                        Centrais de Conteúdos
                    </div>
                                        
                    <?php idg_build_menu("idg-central-de-conteudos"); ?>
                    
                </div>
                <?php endif; ?>


                <?php if ( is_active_sidebar( 'menu-lateral-esquerdo-fim' ) ) : ?>
                <?php dynamic_sidebar( 'menu-lateral-esquerdo-fim' ); ?>
                <?php endif; ?>


            </nav>
            <div id="area-conteudo">
                <main class="grid">
                    <a name="secao-conteudo" id="secao-conteudo" class="screen-reader-text"></a>