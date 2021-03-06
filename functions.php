<?php
/* WIDGETS */

define('IDG_MAX_MENU_LATERAL_ESQUERDO', 9);
define('IDG_MAX_NUM_CARACT_TITULO', 55);
define('IDG_MAX_NUM_CARACT_SUBTITULO', 130);

define('IDG_MAX_MENU_RODAPE', 4);

add_action('after_setup_theme', 'idg_setup');

if (!function_exists('idg_setup')) {
    function idg_setup() {
        add_theme_support( 'title-tag' );
        register_nav_menu( 'idg-servicos', __( 'IDG - Menu "Serviços"', 'idg' ) );
        register_nav_menu( 'idg-em-destaque', __( 'IDG - Menu "Em destaque"', 'idg' ) );
        if (!get_option('ocultar_menu')){ 
            register_nav_menu( 'idg-menu-de-relevancia', __( 'IDG - Menu de relevância', 'idg' ) );
            register_nav_menu( 'idg-central-de-conteudos', __( 'IDG - Menu "Central de Conteúdos"', 'idg' ) );        
            for ($i = 1; $i <= IDG_MAX_MENU_LATERAL_ESQUERDO; $i++){
                register_nav_menu( "idg-menu-lateral-esquerdo-$i", __( "IDG - Menu lateral esquerdo $i", 'idg' ) );   
            } 
            for ($i = 1; $i <= IDG_MAX_MENU_RODAPE; $i++){
                register_nav_menu( "idg-menu-rodape-$i", __( "IDG - Menu rodapé $i", 'idg' ) );   
            }   
            
            register_sidebar( array(
                'name' => 'Widgets do menu lateral esquerdo (topo)',
                'id' => 'menu-lateral-esquerdo-topo',
                'description' => __( 'Permite personalizar o menu lateral à esquerda do site (acima do menu padrão)', 'idg' ),
                'before_widget' => '<div id="%1$s" class="bloco widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="legenda">',
                'after_title' => '</div>',
            ) );
            
            register_sidebar( array(
                'name' => 'Widgets do menu lateral esquerdo (meio)',
                'id' => 'menu-lateral-esquerdo',
                'description' => __( 'Permite personalizar o menu lateral à esquerda do site (entre o menu padrão e o menu "Centrais de conteúdo")', 'idg' ),
                'before_widget' => '<div id="%1$s" class="bloco widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="legenda">',
                'after_title' => '</div>',
            ) );        
            
            register_sidebar( array(
                'name' => 'Widgets do menu lateral esquerdo (fim)',
                'id' => 'menu-lateral-esquerdo-fim',
                'description' => __( 'Permite personalizar o menu lateral à esquerda do site (abaixo do menu padrão)', 'idg' ),
                'before_widget' => '<div id="%1$s" class="bloco widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="legenda">',
                'after_title' => '</div>',
            ) );
            
            
        }
        register_sidebar( array(
            'name' => 'Widgets da página inicial',
            'id' => 'miolo-central-1',
            'description' => __( 'Primeira posição da área principal do site', 'idg' ),
		    'before_widget' => '<div class="bloco manchetes widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="legenda">',
            'after_title' => '</div><div class="chapeu"></div>',
        ) );

        register_sidebar( array(
            'name' => 'Widgets do mapa do site',
            'id' => 'mapa-do-site-1',
            'description' => __( 'Área da página de mapa do site', 'idg' )	,
            'before_widget' => '<div class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',	    
        ) );

        register_sidebar( array(
            'name' => 'Widgets do menu de rodapé',
            'id' => 'menu-rodape-1',
            'description' => __( 'Menu personalizado do rodapé', 'idg' )	,
            'before_widget' => '<div class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="legenda screen-reader-text">',
            'after_title' => '</div>',	    
        ) );
        $registered_sidebars = get_option( 'sidebars_widgets', array() );
        foreach($registered_sidebars as $sidebar_id => $widgets){
            if (is_array($widgets)){
                foreach($widgets as $widget_id){  
                    if ( strpos($widget_id, 'idg_wg_bloco_celulas') !== false ){
                        register_sidebar( array(
                            'name' => "Widgets de linha: $widget_id",
                            'id' => "$sidebar_id-$widget_id",
                            'description' => __( 'Menu personalizado de bloco', 'idg' )	,   
                            'before_widget' => '<div class="bloco celula %2$s">',
                            'after_widget' => '</div>',
                            'before_title' => '<div class="legenda">',
                            'after_title' => '</div>',                     
                        ) );     
                    }      
                }
            }                
            
        } 
        
        add_action("admin_menu", "add_theme_menu_item"); 
        add_action("admin_init", "display_theme_panel_fields");
    
    }
}

function display_theme_panel_fields(){
	add_settings_section("section", "Opções de tema", null, "theme-options");
    add_settings_field("ocultar_menu", "Menu", "show_field_ocultar_menu", "theme-options", "section");
    add_settings_field("theme_color", "Cor", "show_field_opcoes_de_tema", "theme-options", "section");
    register_setting("section", "theme_color");
    register_setting("section", "ocultar_menu");

    add_settings_section("section", "Opções gerais", null, "opcoes-gerais");
	add_settings_field("idg_denominacao", "Denominação", "show_field_denominacao", "opcoes-gerais", "section");
    add_settings_field("idg_titulo", "Título", "show_field_titulo", "opcoes-gerais", "section");
    add_settings_field("idg_subordinacao", "Subordinação", "show_field_subordinacao", "opcoes-gerais", "section");
    add_settings_field("default_hat", "Chapéu padrão", "show_field_default_hat", "opcoes-gerais", "section");    
    add_settings_field("show_errors", "Erros", "show_field_show_errors", "opcoes-gerais", "section");    
    register_setting("section", "idg_denominacao");
    register_setting("section", "idg_titulo");
    register_setting("section", "idg_subordinacao");    
    register_setting("section", "default_hat");   
    register_setting("section", "show_errors_max_char");
    
    add_settings_section("section", "Redes Sociais", null, "redes-sociais");
	add_settings_field("twitter_site", "URL da página do Twitter", "show_field_twitter_element", "redes-sociais", "section");
    add_settings_field("facebook_site", "URL da página do Facebook", "show_field_facebook_element", "redes-sociais", "section");    
    add_settings_field("youtube_url", "URL da página do Youtube", "show_field_youtube_element", "redes-sociais", "section");    
    add_settings_field("google_plus_url", "URL da página do Google+", "show_field_gplus_element", "redes-sociais", "section");    
    add_settings_field("instagram_url", "URL da página do Instagram", "show_field_instagram_element", "redes-sociais", "section");    
    add_settings_field("tumblr_url", "URL da página do Tumblr", "show_field_tumblr_element", "redes-sociais", "section");    
    add_settings_field("flickr_url", "URL da página do Flickr", "show_field_flickr_element", "redes-sociais", "section");    
    add_settings_field("soundcloud_url", "URL da página do Soundcloud", "show_field_soundcloud_element", "redes-sociais", "section");    
    add_settings_field("slideshare_url", "URL da página do Slideshare", "show_field_slideshare_element", "redes-sociais", "section");  
    
    add_settings_section("section", "Menu de idiomas", null, "menu-idiomas");	  
    add_settings_field("english_url", "URL do link para Inglês", "show_field_english_element", "menu-idiomas", "section");   
    register_setting("section", "english_url");
    add_settings_field("spanish_url", "URL do link para Espanhol", "show_field_spanish_element", "menu-idiomas", "section");   
    register_setting("section", "spanish_url");
 
    register_setting("section", "wpseo_social","idg_validate_wpseo_social");
    
       
    register_setting("section", "twitter_site");
    register_setting("section", "facebook_site");
    register_setting("section", "youtube_site");
    register_setting("section", "google_plus_url");
    register_setting("section", "instagram_url");
    
    register_setting("section", "tumblr_url");
    register_setting("section", "flickr_url");
    register_setting("section", "soundcloud_url");
    register_setting("section", "slideshare_url");
    /**/
    
    
    
    
}
function idg_get_option_real($option){
    if (get_option($option) == '{BLOG_NAME}' || ($option=='idg_titulo' && get_option($option)===FALSE)){
        return get_option('blogname');
    }
    if (get_option($option) == '{BLOG_DESCRIPTION}' || ($option=='idg_subordinacao' && get_option($option)===FALSE)){
        return get_option('blogdescription');
    }
    return get_option($option);
}


function idg_render_title(){
    if ( ! function_exists( '_wp_render_title_tag' ) ) {
        function theme_slug_render_title() {
            ?><title><?php wp_title( '|', true, 'right' ); ?></title><?php 
        }
        add_action( 'wp_head', 'theme_slug_render_title' );
    }
}


function idg_validate_wpseo_social($values ){
    return $values;
}
if (!function_exists('theme_settings_page')) {
    function theme_settings_page(){
        ?>
	    <div class="wrap">
        <h1>IDG Configurações</h1>
        
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            do_settings_sections("opcoes-gerais");      
	            do_settings_sections("menu-idiomas"); 
	            do_settings_sections("redes-sociais");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
    }
}

if (!function_exists('show_idg_breadcrumb')){
    function show_idg_breadcrumb(){
        global $post;
        ?>
        <?php if (is_single()): ?>     
            <span class="legenda screen-reader-text">Localização da página</span>
            <span id="breadcrumbs-you-are-here">Você está aqui:</span>   
            <span class="legenda screen-reader-text">Primeiro nivel:</span>
            <a title="Página inicial" href="<?= home_url() ?>">Página inicial</a> 
            
            <span class="legenda screen-reader-text">Próximo nível: categoria é </span>
            <?php foreach(get_the_category() as $cat) : ?>
                <a href="<?= get_category_link($cat->cat_ID) ?>"><?= $cat->name ?></a>
            <?php endforeach ; ?>
            
            <span class="legenda screen-reader-text">Próximo nível: nome da notícia é</span>
            <?php the_title();?>
        <?php endif; ?>
        
        <?php wp_reset_query(); ?>

    <?php } 
}

if (!function_exists('add_theme_menu_item')) {
    function add_theme_menu_item(){
        add_menu_page("IDG Configurações", "IDG Configurações", "manage_options", "theme-panel", "theme_settings_page", null, 99);
    }
}
add_filter( 'body_class', 'idg_body_class' );
function idg_body_class( $classes ) {
    
    $classes[] = get_option('theme_color');
    
    $contem_menu_lateral = false;
    if (get_option('ocultar_menu')){
        $classes[] = 'sem-menu';
    } else {
        if (count( get_option('sidebars_widgets')['menu-lateral-esquerdo'] ) > 0){
            $contem_menu_lateral = TRUE;
        } else {
            $menus = get_nav_menu_locations();
            foreach ($menus as $menuname => $menuvalue){
                if ($menuvalue > 0){
                    $is_menu_lateral = ! (strpos($menuname,'menu-lateral') === FALSE && 
                            strpos($menuname,'menu-de-relevancia') === FALSE && 
                            strpos($menuname,'central-de-conteudo') === FALSE);
                    if ($is_menu_lateral){
                        $contem_menu_lateral = TRUE;
                        $classes[] = "check::m:${menuname}-v:${menuvalue}" ;  
                        break;
                    } else {
                        $classes[] = "m:${menuname}-v:${menuvalue}" ;                       
                    }           
                } 
            }
        }       
        if ($contem_menu_lateral){
            $classes[] = 'com-menu';
        } else {
            $classes[] = 'sem-menu';
        }
    }


    return $classes;
}


if (!function_exists('idg_get_menu')) {
    function idg_get_menu($menu_name){
        $locations = get_nav_menu_locations();
        if(isset($locations[ $menu_name ])){
            return wp_get_nav_menu_object( $locations[ $menu_name ] );
        }        
        return null;
    }
}

add_action('wp_insert_post', 'idg_add_custom_fields');
function idg_add_custom_fields($post_id){
    add_post_meta($post_id, 'Chapéu', get_option('default_hat'), true);    
    return true;
}

if (!function_exists('idg_build_menu')) {
    function idg_build_menu($menu_name){
        $menu = idg_get_menu($menu_name);
        if (!is_object($menu)){
            return;
        }
        $menuitems = wp_get_nav_menu_items( $menu->term_id);
        if (is_array($menuitems) || is_object($menuitems)){
            echo '<ul>';
            foreach($menuitems as $menuitem){
                $id = '';
                $class_ = $menuitem->classes;
                if ($menu_name=='idg-central-de-conteudos'){
                    $itens = array( 'videos'=> array('vídeos'),
                                    'audios'=> array('áudios','Áudios'),
                                    'fotos'=> array('imagens'),
                                    'publicacoes'=> array('noticias', 'notícias'),
                                    'infograficos'=> array(), 
                                    'dadosabertos'=> array('dados abertos'),
                                    'aplicativos'=> array()
                                );
                    $title_low = strtolower($menuitem->title);
                    if (array_key_exists($title_low, $itens)){
                        $class_[] =  $title_low;
                    } else {
                        foreach($itens as $key => $value){
                            if (in_array($title_low, $value)|| 
                                substr($title_low,0,4) == substr($key,0,4) || 
                                substr($menuitem->title,0,4) == substr($key,0,4)  ){
                                $class_[] =  $key;
                                break;
                            }                            
                        }
                    }                                        
                }
                ?>                
                <li<?= $id ?> class="<?= implode($class_, '') ?>" >
                    <a class="internal-link" href="<?= $menuitem->url ?>" ><?= $menuitem->title ?></a>
                </li>                
                <?php
            }
            echo '</ul>';
        }
    }
}



function idg_default_search ( $query ) {
	if ( ! is_admin() AND $query->is_main_query() AND $query->is_search() ) {
        $query->set( 'posts_per_page', 20 );  //limitação de 20 páginas por pesquisa
        if (isset($_GET['s_cat'])){
            if(is_array($_GET['s_cat'])){
                $cat_IDs = array_map('intval',$_GET['s_cat']);
                $query->set( 'category__in', $cat_IDs);  
            }
        }     
        if (isset($_GET['s_tag'])){
            if(is_array($_GET['s_tag'])){
                $tag_IDs = array_map('intval',$_GET['s_tag']);
                $query->set( 'tag__in', $tag_IDs);  
            }
        }
        $date_query = array();
      
        $data_inicial = idg_busca_data_enviada('s_di');
        if ($data_inicial){
            $date_query['after'] = $data_inicial  . ' 00:00';
        }
        $data_final = idg_busca_data_enviada('s_df');
        if ($data_final){
            $date_query['before'] = $data_final  . ' 00:00 +1 day';
        }
        if (count($date_query)>0){
            $query->set('date_query', $date_query);
        }
	}
}
function idg_busca_data_enviada($param){
    if (!isset($_GET[$param])){
        return '';
    }
    $time = strtotime($_GET[$param]);

    $newformat = date('Y-m-d',$time);
    
    return $newformat;
}

add_action( 'pre_get_posts', 'idg_default_search' );


function idg_busca_opcao_checked($tipo, $c_id){
    if (!isset($_GET[$tipo])){
        return '';
    }
    if (array_search("$c_id", $_GET[$tipo])===FALSE){
        return '';
    } else {
        return ' checked="checked" ';
    }
}







include_once(__DIR__. '/widgets.php');
include_once(__DIR__. '/functions-snippets.php');