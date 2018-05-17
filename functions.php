<?php
/* WIDGETS */

define('IDG_MAX_MENU_LATERAL_ESQUERDO', 9);
define('IDG_MAX_MENU_RODAPE', 4);

add_action('after_setup_theme', 'idg_setup');

if (!function_exists('idg_setup')) {
    function idg_setup() {
        /*register_nav_menu( 'idg-menu-de-relevancia', __( 'IDG - Menu de relevância', 'idg' ) );
        //register_nav_menu( 'idg-redes-sociais', __( 'IDG - Menu "Redes Sociais"', 'idg' ) );
        register_nav_menu( 'idg-servicos', __( 'IDG - Menu "Serviços"', 'idg' ) );
        register_nav_menu( 'idg-em-destaque', __( 'IDG - Menu "Em destaque"', 'idg' ) );
        register_nav_menu( 'idg-central-de-conteudos', __( 'IDG - Menu "Central de Conteúdos"', 'idg' ) );        
        for ($i = 1; $i <= IDG_MAX_MENU_LATERAL_ESQUERDO; $i++){
            register_nav_menu( "idg-menu-lateral-esquerdo-$i", __( "IDG - Menu lateral esquerdo $i", 'idg' ) );   
        } 
        for ($i = 1; $i <= IDG_MAX_MENU_RODAPE; $i++){
            register_nav_menu( "idg-menu-rodape-$i", __( "IDG - Menu rodapé $i", 'idg' ) );   
        }   
        
        */
        register_sidebar( array(
            'name' => 'Menu lateral esquerdo personalizado',
            'id' => 'menu-lateral-esquerdo',
            'description' => __( 'Permite personalizar o menu lateral à esquerda do site', 'idg' ),
		    'before_widget' => '<div class="menu-bloco widget %2$s"><dl id="%1$s">',
            'after_widget' => '</dd></dl></div>',
            'before_title' => '<dt>',
            'after_title' => '</dt><dd>',
        ) );
        add_action("admin_menu", "add_theme_menu_item"); 
        add_action("admin_init", "display_theme_panel_fields");
    
    }
}

function display_input_element($element){ ?>
    <input class="regular-text" type="text" name="<?= $element ?>" id="<?= $element ?>" value="<?php echo get_option($element); ?>" />
<?php }

function display_twitter_element(){ 
    display_input_element('twitter_url');
}

function display_facebook_element(){  
    display_input_element('facebook_url');
}

function display_youtube_element(){ 
    display_input_element('youtube_url');
 }

function display_gplus_element(){ 
    display_input_element('gplus_url');
 }

function display_instagram_element(){ 
    display_input_element('instagram_url');
 }

function display_tumblr_element(){ 
    display_input_element('tumblr_url');
  }

function display_flickr_element(){ 
    display_input_element('flickr_url');
  }

function display_soundcloud_element(){ 
    display_input_element('soundcloud_url');
  }

function display_slideshare_element(){ 
    display_input_element('slideshare_url');
  }

function display_denominacao(){ 
    display_input_element('idg_denominacao');
  }

function display_titulo(){  
    display_input_element('blogname');
  }

function display_subordinacao(){ 
    display_input_element('blogdescription');
  }
function display_default_hat(){ 
    display_input_element('default_hat');
 }


function opcoes_de_tema(){?>
    <select name="theme_color">
        <option <?= get_option('theme_color') == 'branco' ? 'selected="selected"': '' ?> value="branco">Branco</option>
        <option <?= get_option('theme_color') == 'verde' ? 'selected="selected"': '' ?> value="verde">Verde</option>
        <option <?= get_option('theme_color') == 'amarelo' ? 'selected="selected"': '' ?> value="amarelo">Amarelo</option>
        <option <?= get_option('theme_color') == 'azul' ? 'selected="selected"': '' ?> value="azul">Azul</option>
    </select>		
<?php }

function display_theme_panel_fields(){
	add_settings_section("section", "Opções de tema", null, "theme-options");
    add_settings_field("theme_color", "Cor", "opcoes_de_tema", "theme-options", "section");
    register_setting("section", "theme_color");

    add_settings_section("section", "Opções gerais", null, "opcoes-gerais");
	add_settings_field("idg_denominacao", "Denominação", "display_denominacao", "opcoes-gerais", "section");
    add_settings_field("idg_titulo", "Título", "display_titulo", "opcoes-gerais", "section");
    add_settings_field("idg_subordinacao", "Subordinação", "display_subordinacao", "opcoes-gerais", "section");
    add_settings_field("default_hat", "Chapéu padrão", "display_default_hat", "opcoes-gerais", "section");    
    register_setting("section", "idg_denominacao");
    register_setting("section", "blogname");
    register_setting("section", "blogdescription");    
    register_setting("section", "default_hat");
    
    add_settings_section("section", "Redes Sociais", null, "redes-sociais");
	add_settings_field("twitter_url", "URL da página do Twitter", "display_twitter_element", "redes-sociais", "section");
    add_settings_field("facebook_url", "URL da página do Facebook", "display_facebook_element", "redes-sociais", "section");    
    add_settings_field("youtube_url", "URL da página do Youtube", "display_youtube_element", "redes-sociais", "section");    
    add_settings_field("gplus_url", "URL da página do Google+", "display_gplus_element", "redes-sociais", "section");    
    add_settings_field("instagram_url", "URL da página do Instagram", "display_instagram_element", "redes-sociais", "section");    
    add_settings_field("tumblr_url", "URL da página do Tumblr", "display_tumblr_element", "redes-sociais", "section");    
    add_settings_field("flickr_url", "URL da página do Flickr", "display_flickr_element", "redes-sociais", "section");    
    add_settings_field("soundcloud_url", "URL da página do Soundcloud", "display_soundcloud_element", "redes-sociais", "section");    
    add_settings_field("slideshare_url", "URL da página do Slideshare", "display_slideshare_element", "redes-sociais", "section");    
    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
    register_setting("section", "youtube_url");
    register_setting("section", "gplus_url");
    register_setting("section", "instagram_url");
    register_setting("section", "tumblr_url");
    register_setting("section", "flickr_url");
    register_setting("section", "soundcloud_url");
    register_setting("section", "slideshare_url");

    
    
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
	            do_settings_sections("redes-sociais");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
    }
}
if (!function_exists('add_theme_menu_item')) {
    function add_theme_menu_item(){
        add_menu_page("IDG Configurações", "IDG Configurações", "manage_options", "theme-panel", "theme_settings_page", null, 99);
    }
}
add_filter( 'body_class', 'idg_body_class' );
function idg_body_class( $classes ) {
    
    $classes[] = get_option('theme_color');
    
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
                $class_ = '';
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
                        $class_ =  $title_low;
                    } else {
                        foreach($itens as $key => $value){
                            if (in_array($title_low, $value)|| 
                                substr($title_low,0,4) == substr($key,0,4) || 
                                substr($menuitem->title,0,4) == substr($key,0,4)  ){
                                $class_ =  $key;
                                break;
                            }                            
                        }
                    }                                                        
                    //$class_ = strtolower($menuitem->title);
                }
                ?>                
                <li<?= $id ?> class="<?= $class_ ?>"  >
                    <a class="internal-link" href="<?= $menuitem->url ?>" ><?= $menuitem->title ?></a>
                </li>                
                <?php
            }
            echo '</ul>';
        }
    }
}