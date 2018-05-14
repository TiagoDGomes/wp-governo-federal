<!DOCTYPE html>
<html lang="pt-br" dir="ltr" class="">

<head>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/resources/css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title(''); ?></title>
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/resources/css/fonts.css">
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/resources/css/default.css">
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/resources/css/extra-small.css">
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/resources/css/small.css">
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/resources/css/medium.css">
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/resources/css/large.css">
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/resources/css/extra-large.css">
    <?php $theme_color = get_option('theme_color'); ?>
    <?php if ($theme_color !== FALSE || $theme_color != 'branco'): ?>    
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/resources/css/tema-<?= $theme_color ?>.css">	
    <?php endif; ?>
    <link rel="shortcut icon" href="<?= get_template_directory_uri()  ?>/resources/img/favicon.ico" type="image/x-icon">
	<script src="<?= get_template_directory_uri()  ?>/resources/js/cookies.js"></script>
	<script src="<?= get_template_directory_uri()  ?>/resources/js/acessibilidade.js"></script>
    <script src="<?= get_template_directory_uri()  ?>/resources/js/geral.js"></script>    
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri()  ?>/resources/css/acessibilidade.css">
    
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>	
</head>

<body onload="onLoad();" class="">
    <noscript>
        <div class="error minor-font">
            Seu navegador de internet está sem suporte à JavaScript. Por esse motivo algumas funcionalidades do site podem não estar
            acessíveis.
        </div>
    </noscript>
    <div id="barra-identidade">
        <div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;">
            <ul id="menu-barra-temp" style="list-style:none;">
                <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED">
                    <a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a>
                </li>
                <li>
                    <a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="wrapper">
        <header role="banner">
            <div class="block">
                <ul id="accessibility">
                    <li>
                        <a accesskey="1" href="#acontent" id="link-conteudo" data-unsp-sanitized="clean">
                            Ir para o conteúdo
                            <span>1</span>
                        </a>
                    </li>
                    <li>
                        <a accesskey="2" href="#anavigation" id="link-navegacao" data-unsp-sanitized="clean">
                            Ir para o menu
                            <span>2</span>
                        </a>
                    </li>
                    <li>
                        <a accesskey="3" href="#SearchableText" id="link-buscar" data-unsp-sanitized="clean">
                            Ir para a busca
                            <span>3</span>
                        </a>
                    </li>
                    <li class="last-item">
                        <a accesskey="4" href="#afooter" id="link-rodape" data-unsp-sanitized="clean">
                            Ir para o rodapé
                            <span>4</span>
                        </a>
                    </li>
                </ul>

                <!--
                    <ul id="portal-language">
                    <li class="language-es">
                        <a href="#">Espa&#241;ol</a>
                    </li>
                    <li class="language-en last-item">
                        <a href="#" target="_blank" data-unsp-sanitized="clean">English</a>
                    </li>
                </ul>
                -->
                <ul id="portal-siteactions">
                    <li id="siteaction-accessibility">
                        <a href="acessibilidade" title="Acessibilidade" accesskey="5" data-unsp-sanitized="clean">Acessibilidade</a>
                    </li>
                    <li id="siteaction-contraste">
                        <a href="#" onclick="window.acessibilidade.alternar()" title="Alto Contraste" accesskey="6" data-unsp-sanitized="clean" class="necessario-javascript">Alto Contraste</a>
                    </li>
                    <li id="siteaction-mapadosite" class="last-item">
                        <a href="mapadosite" title="Mapa do Site" accesskey="7" data-unsp-sanitized="clean">Mapa do Site</a>
                    </li>
                </ul>

                <div id="logo">
                    <a id="portal-logo" title="" href="<?= home_url() ?>" data-unsp-sanitized="clean">
                        <span id="portal-title-1"><?= get_option('idg_denominacao'); ?>&nbsp;</span>
                        <h1 id="portal-title" class="corto" data-unsp-sanitized="clean"><?php bloginfo('name'); ?></h1>
                        <span id="portal-description"><?php bloginfo('description'); ?></span>
                    </a>
                </div>

                <div id="portal-searchbox">
                    <form action="<?= home_url('/') ?>">
                        <fieldset>
                            <legend>Buscar no portal</legend>
                            <label for="busca-portal">Buscar no portal</label>
                            <input name="s" type="text" size="18" title="Buscar no portal" placeholder="Buscar no portal" class="searchField"
                                id="busca-portal">
                            <input class="searchButton" type="submit" value="Buscar no portal">
                        </fieldset>
                    </form>

                </div>
                <div id="social-icons">    
                    <ul>
                        <?php if(get_option('youtube_url')):?>
                        <li id="portalredes-youtube">
                            <a href="<?= get_option('youtube_url') ?>" data-unsp-sanitized="clean">YouTube</a>
                        </li>
                        <?php endif; ?>

                        <?php if(get_option('facebook_url')):?>                        
                        <li id="portalredes-facebook">
                            <a href="<?= get_option('facebook_url') ?>" data-unsp-sanitized="clean">Google+</a>
                        </li>
                        <?php endif; ?>

                        <?php if(get_option('gplus_url')):?>                        
                        <li id="portalredes-googleplus">
                            <a href="<?= get_option('gplus_url') ?>" data-unsp-sanitized="clean">Google+</a>
                        </li>
                        <?php endif; ?>

                        <?php if(get_option('instagram_url')):?>   
                        <li id="portalredes-instagram">
                            <a href="<?= get_option('instagram_url') ?>" data-unsp-sanitized="clean">Instagram</a>
                        </li>
                        <?php endif; ?>

                        <?php if(get_option('tumblr_url')):?>
                        <li id="portalredes-tumblr">
                            <a href="<?= get_option('tumblr_url') ?>" data-unsp-sanitized="clean">Thumblr</a>
                        </li>
                        <?php endif; ?>

                        <?php if(get_option('twitter_url')):?>
                        <li id="portalredes-twitter">
                            <a href="<?= get_option('twitter_url') ?>" data-unsp-sanitized="clean">Twitter</a>
                        </li>
                        <?php endif; ?>

                        <?php if(get_option('flickr_url')):?>
                        <li id="portalredes-flickr">
                            <a href="<?= get_option('flickr_url') ?>" data-unsp-sanitized="clean">Flickr</a>
                        </li>
                        <?php endif; ?>

                        <?php if(get_option('soundcloud_url')):?>
                        <li id="portalredes-soundcloud">
                            <a href="<?= get_option('soundcloud_url') ?>" data-unsp-sanitized="clean">SoundCloud</a>
                        </li>
                        <?php endif; ?>

                        <?php if(get_option('slideshare_url')):?>
                        <li id="portalredes-slideshare">
                            <a href="<?= get_option('slideshare_url') ?>" data-unsp-sanitized="clean">Slideshare</a>
                        </li>
                        <?php endif; ?>

                        <li id="portalredes-rss">
                            <a href="<?php bloginfo('rss2_url'); ?>" data-unsp-sanitized="clean">RSS</a>
                        </li>
                    </ul>                                    
                    <?php // idg_build_menu('idg-redes-sociais'); ?>                    
                </div>
            </div>
            
            <div id="sobre">
                <?php idg_build_menu('idg-sobre'); ?> 
            </div>
        </header>


        <div id="main">
            <section id="portal-features">
                <div id="featured-content"></div>
            </section>
            <section id="em-destaque">
                <h2>
                    Em destaque
                </h2>

                <?php idg_build_menu('idg-em-destaque'); ?>       

            </section>

            <section id="portal-columns">
                <div id="viewlet-above-content">
                    <div id="portal-breadcrumbs">
                        <span id="breadcrumbs-you-are-here">Você está aqui:</span>
                        <span id="breadcrumbs-home">
                            <a href="<?= home_url() ?>" data-unsp-sanitized="clean">Página Inicial</a>
                        </span>
                    </div>
                </div>
            </section>
            
            <div id="navigation" class="row">
                
                <div id="nav-menu-lateral-esquerda" class="col col-12 col-sm-3 col-md-2">
                    <a name="anavigation" id="anavigation" data-unsp-sanitized="clean"></a>
                    <span class="menuTrigger">Menu</span>
                    <div class="cell width-1:4 position-0">

                        <div class="first-item nav-menu-de-relevancia">
                        <?php $menu_relevancia = idg_get_menu("idg-menu-de-relevancia"); ?>                        
                        <?php if($menu_relevancia !== FALSE) :?>
                            <dl class="first-item-nav">
                                <dt>
                                    Menu de relevância
                                </dt>
                                <dd>
                                    <?php idg_build_menu('idg-menu-de-relevancia'); ?> 
                                </dd>
                            </dl>
                            <?php endif; ?> 
                        </div>
                    

                        <?php for ($i = 1; $i <= IDG_MAX_MENU_LATERAL_ESQUERDO; $i++) : ?>
                            <?php $menu = idg_get_menu("idg-menu-lateral-esquerdo-$i"); ?>
                            
                            <?php if($menu !== FALSE) :?>
                            
                                <div class="nav-menu-bloco <?= $menu->slug ?> <?= $menu->taxonomy ?>" >
                                    <dl>
                                        <dt>
                                            <?= $menu->name; ?>
                                        </dt>
                                        <dd>
                                            <?php idg_build_menu("idg-menu-lateral-esquerdo-$i"); ?> 
                                        </dd>
                                    </dl>
                                </div>
                                
                            <?php endif; ?>    
                        <?php endfor; ?>    
                        
                        <?php if ( is_active_sidebar( 'menu-lateral-esquerdo' ) ) : ?>
                            <?php dynamic_sidebar( 'menu-lateral-esquerdo' ); ?>                            
                        <?php endif; ?>   
                        
                        <?php if(idg_get_menu("idg-central-de-conteudos") !== FALSE) :?>
                            <div class="nav-menu-bloco icon">
                                <dl class="centrais-de-conteudos">
                                    <dt>
                                        Centrais de Conteúdos
                                    </dt>
                                    <dd>
                                        <?php idg_build_menu("idg-central-de-conteudos"); ?>                                         
                                    </dd>
                                </dl>
                            </div>
                    <?php endif; ?>
                    </div>
                </div>

                <div id="content" class="col col-sm-9 col-md-10">
                    <a name="acontent" id="acontent" data-unsp-sanitized="clean"></a>
                    <main>