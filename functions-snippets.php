<?php
function show_field_input_element($element, $description=''){ ?>
    <input class="regular-text" type="text" name="<?= $element ?>" id="<?= $element ?>" value="<?php echo get_option($element); ?>" />
    <?php if ($description != '') : ?>
        <p class="description"><?= $description ?></p>
    <?php endif; ?>
<?php }

function show_field_checkbox_element($element, $label, $description=''){ ?>
    <input type="checkbox" name="<?= $element ?>" id="<?= $element ?>" <?= get_option($element) ? 'checked="checked"': '' ?> />
    <label for="<?= $element ?>"><?= $label ?></label>
    <?php if ($description != '') : ?>
        <p class="description"><?= $description ?></p>
    <?php endif; ?>
<?php }

function show_field_twitter_element(){ 
    show_field_input_element('twitter_url');
}

function show_field_facebook_element(){  
    show_field_input_element('facebook_url');
}

function show_field_youtube_element(){ 
    show_field_input_element('youtube_url');
 }

function show_field_gplus_element(){ 
    show_field_input_element('gplus_url');
 }

function show_field_instagram_element(){ 
    show_field_input_element('instagram_url');
 }

function show_field_tumblr_element(){ 
    show_field_input_element('tumblr_url');
  }

function show_field_flickr_element(){ 
    show_field_input_element('flickr_url');
  }

function show_field_soundcloud_element(){ 
    show_field_input_element('soundcloud_url');
  }

  function show_field_slideshare_element(){ 
    show_field_input_element('slideshare_url');
  }

function show_field_english_element(){ 
    show_field_input_element('english_url', 'Endereço da ferramenta que irá traduzir o site para o inglês (ativa menu de idiomas)');
}
function show_field_spanish_element(){ 
    show_field_input_element('spanish_url', 'Endereço da ferramenta que irá traduzir o site para o espanhol (ativa menu de idiomas)');
}

function show_field_denominacao(){ 
    show_field_input_element('idg_denominacao');
  }

function show_field_titulo(){  
    show_field_input_element('blogname');
  }

function show_field_subordinacao(){ 
    show_field_input_element('blogdescription');
  }
function show_field_default_hat(){ 
    show_field_input_element('default_hat');
 }
 function show_field_show_errors(){
    show_field_checkbox_element('show_errors_max_char', 
                            'Mostrar erros ao extrapolar limite de caracteres', 
                            'Esta opção exibe aos administradores uma linha abaixo dos títulos ou subtítulos quando estes extrapolam os limites de caracteres do padrão IDG');
 }
 function show_field_ocultar_menu(){
    show_field_checkbox_element('ocultar_menu', 'Não usar menu lateral');
 }


function show_field_opcoes_de_tema(){?>
    <select name="theme_color">
        <option <?= get_option('theme_color') == 'branco' ? 'selected="selected"': '' ?> value="branco">Branco</option>
        <option <?= get_option('theme_color') == 'verde' ? 'selected="selected"': '' ?> value="verde">Verde</option>
        <option <?= get_option('theme_color') == 'amarelo' ? 'selected="selected"': '' ?> value="amarelo">Amarelo</option>
        <option <?= get_option('theme_color') == 'azul' ? 'selected="selected"': '' ?> value="azul">Azul</option>
    </select>		
<?php }
