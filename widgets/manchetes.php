<?php

class IDG_Widget_Manchetes extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname' => 'widget_recent_entries',
			'description' => __( 'Your site&#8217;s most recent Posts.' ),
			'customize_selective_refresh' => true,
		);
		
		parent::__construct( false, 'IDG - Manchetes',$widget_ops );
	}

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
                <?= $before_title . $title . $after_title; ?>
            <?php endif; ?>
            <?php while( $r->have_posts() ) : $r->the_post(); $count++; $primeira = ($count == 1); $comeco_tres = (($count+1) % 3 == 0); $fim_tres = (($count + 2) % 3 == 0); ?>


<!-- PRIMEIRA: <?= $primeira ?> COMECO3: <?= $comeco_tres ?> FIM3 <?= $fim_tres ?> -->

                <?php if ($primeira || $comeco_tres )  : ?>

                    <!-- inicio .linha -->
                    <div class="linha <?= $comeco_tres ? 'tamanho-3' : '' ?>">
                    
                <?php endif ?>     

                        <div class="noticia <?= $primeira ? 'grande': '' ?> celula">
                            <div class="chapeu">

                                <?=get_post_meta(get_the_ID(), 'Chapéu', true);?>

                            </div>
                            <h2>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">                                
                                    <span><?= mb_substr(get_the_title(),0,55) ;?></span><span class="alerta-max-caracteres"><?= mb_substr(get_the_title(),55) ;?></span>
                                </a>
                            </h2>
                            
                            <?php if (has_excerpt()): ?>
                                
                                <span><?= mb_substr(get_the_excerpt(),0,130) ;?></span><span class="alerta-max-caracteres"><?= mb_substr(get_the_excerpt(),130) ;?></span>

                            <?php endif;?>
                            
                        </div>

                <?php if ($primeira || $fim_tres )  : ?>

                    </div><!-- fim .linha -->

                <?php endif ?>
                
            <?php endwhile; ?>                       
            
            <?= $after_widget ?> 

            <?php wp_reset_postdata(); ?>	

        <?php endif; ?>	
	<?php }

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
        return '';
    }
}

function idg_widget_manchetes_registration() {
	register_widget( 'IDG_Widget_Manchetes' );
}

add_action( 'widgets_init', 'idg_widget_manchetes_registration' );

