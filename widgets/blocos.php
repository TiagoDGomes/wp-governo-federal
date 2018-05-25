<?php

class IDG_Wg_Bloco_Celulas extends WP_Widget {
    function __construct() {
		$widget_ops = array(
			'classname' => 'widget_linha_celulas',
			'description' => __( 'Um linha para células' ),
			'customize_selective_refresh' => true,
		);
		
		parent::__construct( false, 'IDG - Bloco de células',$widget_ops );
	}
	function widget( $args, $instance ) {  ?>
        <?php extract( $args );	 ?>	        				
        <?php $title = $instance['title']; ?>	        				
		<?php echo $before_widget; ?>
        <?php if( $title ) : ?>
            <?php echo $before_title . $title . $after_title; ?>
        <?php endif; ?>
        <div id="<?= $args['widget_id'] ?>" class="linha tamanho-<?= $instance['numero_celulas'] ?>">

            <?php dynamic_sidebar($args['id']. '-' . $args['widget_id'])  ?>
            
        </div>
        <?php echo $after_widget ?> 
    <?php }


    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['numero_celulas'] = sanitize_text_field( $new_instance['numero_celulas'] );
        return $instance;
    }

    function form( $instance ) {
        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $numero_celulas = isset( $instance['numero_celulas'] ) ? esc_attr( $instance['numero_celulas'] ) : 3;
        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Título' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id( 'numero_celulas' ); ?>"><?php _e( 'Número de células:' ); ?></label>
        <select class="widefat" id="<?php echo $this->get_field_id( 'numero_celulas' ); ?>" name="<?php echo $this->get_field_name( 'numero_celulas' ); ?>">
            <option <?= $numero_celulas == '3' ? 'selected="selected"':'' ?> value="3">3 células</option>
            <option <?= $numero_celulas == '6' ? 'selected="selected"':'' ?> value="6">6 células</option>        
        </select>
        </p>
        <p>Ao criar este widget de linha, será preciso publicar e atualizar esta página para que você possa adicionar os widgets nas células.</p>
    <?php }
}


function idg_widget_bloco_celulas_registration() {
	register_widget( 'IDG_Wg_Bloco_Celulas' );
}

add_action( 'widgets_init', 'idg_widget_bloco_celulas_registration' );