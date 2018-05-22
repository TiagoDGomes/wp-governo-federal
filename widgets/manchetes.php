<?php

class IDG_Widget_Manchetes extends WP_Widget {
	/**
	 * New widget instance.
	 *
	 * 
	 */
	function __construct() {
		$widget_ops = array(
			'classname' => 'widget_manchetes',
			'description' => __( 'As publicações mais recentes em forma de manchetes' ),
			'customize_selective_refresh' => true,
		);
		
		parent::__construct( false, 'IDG - Manchetes',$widget_ops );
	}
	/**
	 * Outputs the content.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	function widget( $args, $instance ) {
        extract( $args );		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Destaques') : $instance['title'], $instance, $this->id_base);				
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) ){
            $number = 4;
        }				
        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        $count = 0;
		if( $r->have_posts() ) : ?>				
            <?php echo $before_widget; ?>	
            <?php if( $title ) : ?>
                <?php echo $before_title . $title . $after_title; ?>
            <?php endif; ?>
            <?php while( $r->have_posts() ) : $r->the_post(); $count++; $primeira = ($count == 1); $comeco_tres = (($count+1) % 3 == 0); $fim_tres = (($count + 2) % 3 == 0); ?>
                <?php if ($primeira || $comeco_tres )  : ?>
                    <!-- inicio .linha -->
                    <div class="linha<?= $comeco_tres ? ' tamanho-3' : '' ?>">                    
                <?php endif ?>     
                        <div class="noticia<?= $primeira ? ' grande': '' ?> celula">
                            <div class="chapeu">
                                <?= get_post_meta(get_the_ID(), 'Chapéu', true);?>
                            </div>
                            <h2>                                
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">                                
                                    <?php if ( current_user_can( 'administrator' ) && get_option('show_errors_max_char') ): ?>
                                        <span><?= mb_substr(get_the_title(),0,IDG_MAX_NUM_CARACT_TITULO) ;?></span><span class="alerta-max-caracteres"><?= mb_substr(get_the_title(),IDG_MAX_NUM_CARACT_TITULO) ;?></span>
                                    <?php else: ?>
                                        <?php the_title(); ?>
                                    <?php endif; ?> 
                                </a>
                            </h2>                            
                            <?php if (has_excerpt()): ?>             
                                <?php if ( current_user_can( 'administrator' ) && get_option('show_errors_max_char')): ?>
                                    <span><?= mb_substr(get_the_excerpt(), 0, IDG_MAX_NUM_CARACT_SUBTITULO) ;?></span><span class="alerta-max-caracteres"><?= mb_substr(get_the_excerpt(), IDG_MAX_NUM_CARACT_SUBTITULO) ;?></span>
                                <?php else: ?>
                                    <?php the_excerpt(); ?>
                                <?php endif; ?>
                            <?php endif;?>                           
                        </div>
                <?php if ($primeira || $fim_tres )  : ?>
                    </div><!-- fim .linha -->
                <?php endif; ?>                
            <?php endwhile; ?>
            <!-- url de rodapé: <?= $instance['url_bottom'] ?> -->
            <?php if (( $instance['url_bottom'] ) ) : ?>
                <div class="rodape">
                    <a href="<?= $instance['url_bottom'] ?>">

                    <?php if (( $instance['url_text_bottom'] ) ) : ?>
                        <?= $instance['url_text_bottom'] ?>
                    <?php else: ?>
                        Leia mais
                    <?php endif; ?>
                        
                    <span class="icon"></span>
                    </a>
                </div>
            <?php endif; ?>
            <?php echo $after_widget ?> 
            <?php wp_reset_postdata(); ?>	
            
        <?php endif; ?>	
	<?php }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['url_bottom'] = sanitize_text_field( $new_instance['url_bottom'] );
        $instance['url_text_bottom'] = sanitize_text_field( $new_instance['url_text_bottom'] );
        return $instance;
    }

	function form( $instance ) {
        $url_bottom = isset( $instance['url_bottom'] ) ? esc_attr( $instance['url_bottom'] ) : '';
        $url_text_bottom = isset( $instance['url_text_bottom'] ) ? esc_attr( $instance['url_text_bottom'] ) : '';?>
        <p><label for="<?php echo $this->get_field_id( 'url_bottom' ); ?>"><?php _e( 'URL de rodapé (opcional):' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'url_bottom' ); ?>" name="<?php echo $this->get_field_name( 'url_bottom' ); ?>" type="text" value="<?php echo $url_bottom; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id( 'url_text_bottom' ); ?>"><?php _e( 'Texto da URL de rodapé (opcional):' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'url_text_bottom' ); ?>" name="<?php echo $this->get_field_name( 'url_text_bottom' ); ?>" type="text" value="<?php echo $url_text_bottom; ?>" /></p>
        
    <?php }
}

function idg_widget_manchetes_registration() {
	register_widget( 'IDG_Widget_Manchetes' );
}

add_action( 'widgets_init', 'idg_widget_manchetes_registration' );

