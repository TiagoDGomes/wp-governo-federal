<?php

class IDG_Widget_Carrossel extends WP_Widget
{
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'widget_carrossel',
            'description' => __('Uma série de imagens que rotacionam com o tempo'),
            'mime_type' => 'image',
        );
        parent::__construct(false, 'IDG - Carrossel', $widget_ops);
    }
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['transit'] = sanitize_text_field($new_instance['transit']);
        for ($i = 1; $i < 10; $i++){
            $instance["image_id_$i"] = sanitize_text_field($new_instance["image_id_$i"]);
            $instance["texto_$i"] = sanitize_text_field($new_instance["texto_$i"]);
            $instance["url_$i"] = sanitize_text_field($new_instance["url_$i"]); 
            $instance["ativo_$i"] = $new_instance["ativo_$i"]; 
                       
        }
        return $instance;
    }
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title',
            $instance['title']
            , $instance, $this->id_base);
        ?>
        <?php echo $before_widget; ?>
        <?php if ($title): ?>
            <?php echo $before_title . $title . $after_title; ?>
        <?php endif;?>

        <div class="bloco carrossel">
            <?php $car_id = 'carousel-' . rand(1000, 10000); ?>
            <?php $transit = isset($instance['transit']) ? (int)(esc_attr($instance['transit'])) * 1000 : 30000; ?>   
            <div id="<?=$car_id ?>" class="carousel">
                <div class="slides">
                    <?php for ($i = 1; $i < 10; $i++): ?>
                    <?php if($instance["ativo_$i" ] == 'on') : ?>
                    <div class="slide <?= $i==1 ? 'active':''?>">                        
                        <?php if ($instance["url_$i"]): ?><a href="<?= $instance["url_$i"] ?>"><?php endif ; ?>
                        <?php $image_id = $instance["image_id_$i"];
                                $tag_img = "preview_$i";
                                if (intval($image_id) > 0) {
                                    $image = wp_get_attachment_image($image_id, 'medium', false, array('class' =>  "i_$tag_img"));
                                } else {
                                    $image = '';
                                }
                        ?>
                        <?php echo($image) ?>
                        <?php // var_dump($instance["image_id_$i"]); ?>
                        <span class="text">
                            <?= $instance["texto_$i"] ?>
                        </span>
                        <?php if ($instance["url_$i"]): ?></a><?php endif ; ?>
                    </div>                  
                    <?php endif; ?>
                    <?php endfor;?>
                    <ul class="indicators">
                        <?php for ($i = 1; $i < 10; $i++): ?>
                        <?php if($instance["ativo_$i" ] == 'on') : ?>
                        <li <?= $i==1?'class="active"':''?> ><a href="javascript:;" data-slide="<?= $i ?>">&bullet; </a></li>          
                        <?php endif; ?>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
            <script>
                c = new CarouselClass('#<?=$car_id ?>', <?= $transit ?>);
                c.start();
            </script>
        </div>



        <?php echo $after_widget ?>
        <?php wp_reset_postdata();?>


	<?php }

    public function form($instance)
    { ?>       
        <?php $instance = wp_parse_args( (array) $instance, array( 'transit' => '30' ) ); ?>
        <?php $title = isset($instance['title']) ? esc_attr($instance['title']) : ''; ?>        
        <?php $transit = isset($instance['transit']) ? esc_attr($instance['transit']) : ''; ?>        
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Título');?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('transit'); ?>"><?php _e('Transição (segundos)');?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('transit'); ?>" name="<?php echo $this->get_field_name('transit'); ?>" type="number" value="<?php echo $transit; ?>" /></p>
        <?php $max = 10?>
        <?php $instance_id = $this->get_field_id('title') ?>
        <hr>
        <div style="text-align: center">
            <label for="<?= $instance_id ?>_indice"><?php _e('Índice');?>:</label>
            <select id="<?= $instance_id ?>_indice" style="width: 25%">
                <?php for ($i = 1; $i < $max; $i++): ?>
                    <option value="<?=$i?>"><?=$i?></option>
                <?php endfor;?>
            </select>
        </div>
        <?php // var_dump($instance); ?>
        <?php for ($i = 1; $i < $max; $i++): ?>
        <?php $image_id = $instance['image_id']; ?>
        <div <?= $i!=1?'style="display:none"':''?> class="carrossel_bloco" id="<?= "{$instance_id}_seletor_$i" ?>">
            <?php $image_id = $instance["image_id_$i"];
            $tag_img = "{$instance_id}_preview_$i";
            if (intval($image_id) > 0) {
                $image = wp_get_attachment_image($image_id, 'medium', false, array('class' =>  "i_$tag_img"));
            } else {
                $image = '';
            }
            
            //var_dump($image);
            ?>
            <div style="text-align: center">
                <div id="<?= $tag_img ?>"><?=$image?></div>                
                <input 
                    value="<?php echo $instance["image_id_$i"]; ?>" 
                    name="<?php echo $this->get_field_name("image_id_$i"); ?>" 
                    id="<?php echo $this->get_field_id("image_id_$i"); ?>" 
                    type="text" 
                    class="widefat"                         
                />
                </p>
                <input type="button"
                    onclick="choose_image('<?php echo $this->get_field_id('image_id_'.$i); ?>','<?= $tag_img ?>')"
                    value="<?php esc_attr_e('Selecione uma imagem', 'carrossel_select');?>"
                    class="button-primary carrossel_media_manager"
                />
            </div>
            <div>                
                <p>
                    <input class="widefat" 
                            id="<?php echo $this->get_field_id("ativo_$i"); ?>" 
                            name="<?php echo $this->get_field_name("ativo_$i"); ?>" 
                            type="checkbox"  <?php checked( $instance["ativo_$i" ], 'on' ); ?> 
                    />
                    <label for="<?php echo $this->get_field_id("ativo_$i"); ?>"><?php _e('Ativar este slide');?></label>
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id("texto_$i"); ?>"><?php _e('Texto');?></label>
                    <textarea  rows="3"
                        name="<?php echo $this->get_field_name("texto_$i"); ?>" 
                        id="<?php echo $this->get_field_id("texto_$i"); ?>"                         
                        class="widefat"><?php echo $instance["texto_$i"]; ?></textarea>
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id("url_$i"); ?>"><?php _e('Link da imagem');?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id("url_$i"); ?>" name="<?php echo $this->get_field_name("url_$i"); ?>" type="text" value="<?php echo $instance["url_$i"]; ?>" />
                </p>
        
            </div>


        </div>

        <?php endfor; ?>
        <script>
            $('#<?= $instance_id ?>_indice').change(function(){
                v = $(this).val();
                seletor = '#<?= "${instance_id}_seletor_" ?>' + v;
                $('.carrossel_bloco').fadeOut('fast');
                $(seletor).fadeIn('slow');
            });
        </script> 
           
    <?php }
}

function idg_widget_carrossel_registration()
{
    register_widget('IDG_Widget_Carrossel');    
}
add_action('widgets_init', 'idg_widget_carrossel_registration');



function admin_load_wp_media_files($page)
{
    wp_enqueue_media();
    wp_enqueue_script( 'carrossel_script', get_template_directory_uri() . '/lib/admin-carrossel.js' , array('jquery'), '0.1' );
}
add_action('admin_enqueue_scripts', 'admin_load_wp_media_files');

function load_wp_media_files($page){    
    wp_enqueue_script( 'carrossel_script', get_template_directory_uri() . '/padraogoverno/resources/js/carousel.js' , array('jquery'), '0.1' );
    wp_register_style( 'carousel_css',    get_template_directory_uri() . '/padraogoverno/resources/css/carousel.css' , false,   0 );
    wp_enqueue_style ( 'carousel_css' );
 
}
add_action('wp_enqueue_scripts', 'load_wp_media_files');

function carrossel_get_image()
{
    if (isset($_GET['id'])) {
        $image = wp_get_attachment_image(filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT), 'medium', false, array('class' => 'carrossel-preview-image'));
        $data = array(
            'image' => $image,
        );
        wp_send_json_success($data);
    } else {
        wp_send_json_error();
    }
}
add_action('wp_ajax_carrossel_get_image', 'carrossel_get_image');
