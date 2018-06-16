<?php
function show_field_input_element($element, $subelement=NULL, $description=''){ ?>
    <?php @$value = $subelement ? get_option($element)[$subelement] : get_option($element); ?>
    <?php @$name = $subelement ? "${element}[${subelement}]" : $element; ?>
    <?php @$id = $subelement ? $subelement : $element; ?>
    <input class="regular-text" type="text" name="<?= $name ?>" id="<?= $id ?>" value="<?= $value ?>" />
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
    show_field_input_element('twitter_site');
}

function show_field_facebook_element(){  
    show_field_input_element('facebook_site');
}

function show_field_youtube_element(){ 
    show_field_input_element('youtube_site');
 }

function show_field_gplus_element(){ 
    show_field_input_element('google_plus_url');
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
    show_field_input_element('english_url',NULL, 'Endereço da ferramenta que irá traduzir o site para o inglês (ativa menu de idiomas)');
}
function show_field_spanish_element(){ 
    show_field_input_element('spanish_url',NULL, 'Endereço da ferramenta que irá traduzir o site para o espanhol (ativa menu de idiomas)');
}

function show_field_title($option){ 
    $idg_n_checked = FALSE;
    $idg_d_checked = FALSE;
    $idg_v_checked = FALSE;
    $idg_valor_atual = get_option($option);
    if (get_option($option) == '{BLOG_NAME}' || ($option=='idg_titulo' && get_option($option) === FALSE)){
        $idg_n_checked = TRUE;
    } else if (get_option($option) == '{BLOG_DESCRIPTION}' || ($option=='idg_subordinacao' && get_option($option)===FALSE) ){
        $idg_d_checked = TRUE;
    } else {
        $idg_v_checked = TRUE; 
    }      
    ?>
    <div id="bloco_titulo_field_<?= $option ?>">
        <p>
            <input onclick="document.getElementById('<?= $option ?>_txt').style.display='none'" <?= $idg_n_checked ? 'checked="checked"': '' ?> id="<?= $option ?>_opt_bn" type="radio" name="<?= $option ?>_opt" value="{BLOG_NAME}">
            <label for="<?= $option ?>_opt_bn">Utilizar o valor "título do site"</label>
        </p>
        <p>
            <input onclick="document.getElementById('<?= $option ?>_txt').style.display='none'" <?= $idg_d_checked ? 'checked="checked"': '' ?> id="<?= $option ?>_opt_bd" type="radio" name="<?= $option ?>_opt" value="{BLOG_DESCRIPTION}">
            <label for="<?= $option ?>_opt_bd">Utilizar o valor "descrição do site"</label>
        </p>
        <p>
            <input onclick="document.getElementById('<?= $option ?>_txt').style.display='initial'" <?= $idg_v_checked ? 'checked="checked"': '' ?> id="<?= $option ?>_opt_txt" type="radio" name="<?= $option ?>_opt" value="">
            <label for="<?= $option ?>_opt_txt">Utilizar um texto personalizado </label>       
            <input placeholder="Digite um texto" <?= $idg_v_checked ? '': 'style="display:none"' ?>  class="regular-text" type="text" name="<?= $option ?>_txt" id="<?= $option ?>_txt" value="<?= idg_get_option_real($option) == get_option($option) ? get_option($option):'' ?>">
        </p>
        <p class="description">
            <span>Valor a ser utilizado: </span>
            <strong><span id="<?= $option ?>_result"><?= idg_get_option_real($option) ?></span></strong>
            <input id="<?= $option ?>" type="hidden" name="<?= $option ?>" value="<?= get_option($option) ?>" >
        </p>
    </div>
    <script>
        function change_<?= $option ?> (v){
            jQuery('#<?= $option ?>').val(v);  
            jQuery('#<?= $option ?>_result').html(v);  
        }
        jQuery('#<?= $option ?>_opt_bn').click(function(){
            var v = "<?= get_option('blogname') ?>";
            jQuery('#<?= $option ?>').val('{BLOG_NAME}');  
            jQuery('#<?= $option ?>_result').html(v);                    
        })
        jQuery('#<?= $option ?>_opt_bd').click(function(){
            var v = "<?= get_option('blogdescription') ?>";
            jQuery('#<?= $option ?>').val('{BLOG_DESCRIPTION}');  
            jQuery('#<?= $option ?>_result').html(v);    
        })
        jQuery('#<?= $option ?>_opt_txt').click(function(){
            var v = jQuery('#<?= $option ?>_txt').val();
            change_<?= $option ?>(v);                      
        })
        jQuery('#<?= $option ?>_txt').keyup(function(){
            var v = jQuery('#<?= $option ?>_txt').val();
            change_<?= $option ?>(v);                      
        })
        
    </script>
<?php  }
function show_field_denominacao(){ 
    show_field_title('idg_denominacao');
}
function show_field_titulo(){  
    show_field_title('idg_titulo');
  }

function show_field_subordinacao(){ 
    show_field_title('idg_subordinacao');
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


function fieldset_busca($fieldset_id, $id, $name='s', $title='Buscar no portal', $placeholder='Buscar no portal', $submit_label='Pesquisar'){ ?>

    <fieldset<?= $fieldset_id ? " id=\"$fieldset_id\"": '' ?>>
        <legend>Ferramenta de busca</legend>
        <label for="<?= $id ?>">Buscar no portal</label>
        <input name="<?= $name ?>" type="text" title="<?= $title ?>" placeholder="<?= $placeholder ?>" id="<?= $id ?>" value="<?= get_search_query() ?>" >
        <input type="submit" value="<?= $submit_label ?>">
    </fieldset>

<?php }