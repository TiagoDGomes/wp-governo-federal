<article id="post-<?php the_ID(); ?>" <?php post_class('noticia'); ?>>

    
    <div class="informacoes">
        <?php if ( 'post' == get_post_type() ) : ?>
            <div class="screen-reader-text">Informações sobre a publicação:</div>
            <div class="info">
                <div class="data">
                    <time datetime="<?php the_time('Y-m-d H:i')?>">                        
                        <span class="data"><?php the_time('d/m/Y')?></span>
                        <span class="hora"><?php the_time('H:i')?></span>                        
					</time>
                    <time style="display:none" datetime="<?php the_modified_time('Y-m-d H:i')?>">                        
                        <span class="data"><?php the_modified_time('d/m/Y')?></span>
                        <span class="hora"><?php the_modified_time('H:i')?></span>                        
					</time>
                </div>
                <div class="autor" style="display: none">
                    <?php // the_author()?>
                </div>   				
                <!--
                <div class="tipo">
                    <span class="video">Vídeo</span>
                </div>
                -->
            </div>
        <?php endif; ?>
    </div>
    <!-- fim .informacoes -->
    <div class="publicacao">
        <div class="chapeu"><?=get_post_meta(get_the_ID(), 'Chapéu', true);?></div>
        <h3>
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h3>
        <div class="conteudo">
           <?php if (has_excerpt()){                                
                    the_excerpt();
                 } else {
                    the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) );
                 }
                 wp_link_pages(
                        array(
                            'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>',
                            'after'  => '</div>',
                        )
                );
            ?>
        </div>
        <div class="tags">
            <div class="legenda">Tópicos:</div>
            <?= get_the_tag_list(); ?>
        </div>
        <div class="categorias">
            <div class="legenda">Registrado em: </div>
            <?= get_the_category_list()?>
			
        </div>
    </div>
    <!-- fim .publicacao -->
    <?php if ( comments_open() && ! post_password_required() ) : ?>
		<!--<div class="comments-link">
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'twentyeleven' ) . '</span>', _x( '1', 'comments number', 'twentyeleven' ), _x( '%', 'comments number', 'twentyeleven' ) ); ?>
		</div>-->
	<?php endif; ?>

<!-- fim .noticia -->
</article>
<?php /*

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( is_sticky() ) : ?>
				<hgroup>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<h3 class="entry-format"><?php _e( 'Featured', 'twentyeleven' ); ?></h3>
				</hgroup>
			<?php else : ?>
			<div class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></div>
			<?php endif; ?>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php //twentyeleven_posted_on(); ?>
			</div>
			<?php endif; ?>

			<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'twentyeleven' ) . '</span>', _x( '1', 'comments number', 'twentyeleven' ), _x( '%', 'comments number', 'twentyeleven' ) ); ?>
			</div>
			<?php endif; ?>
		</header>

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?>
			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>',
					'after'  => '</div>',
				)
			);
?>
		</div>
		<?php endif; ?>

		<footer class="entry-meta">
			<?php $show_sep = false; ?>
			<?php if ( is_object_in_taxonomy( get_post_type(), 'category' ) ) : // Hide category text when not supported ?>
			<?php
				$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );
			if ( $categories_list ) :
			?>
			<span class="cat-links">
			<?php
				printf( __( '<span class="%1$s">Posted in</span> %2$s', 'twentyeleven' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
			$show_sep = true;
				?>
			</span>
			<?php endif; // End if categories ?>
			<?php endif; // End if is_object_in_taxonomy( get_post_type(), 'category' ) ?>
			<?php if ( is_object_in_taxonomy( get_post_type(), 'post_tag' ) ) : // Hide tag text when not supported ?>
			<?php
				$tags_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
			if ( $tags_list ) :
				if ( $show_sep ) :
				?>
			<span class="sep"> | </span>
				<?php endif; // End if $show_sep ?>
			<span class="tag-links">
				<?php
				printf( __( '<span class="%1$s">Tagged</span> %2$s', 'twentyeleven' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
				$show_sep = true;
				?>
			</span>
			<?php endif; // End if $tags_list ?>
			<?php endif; // End if is_object_in_taxonomy( get_post_type(), 'post_tag' ) ?>

			<?php if ( comments_open() ) : ?>
			<?php if ( $show_sep ) : ?>
			<span class="sep"> | </span>
			<?php endif; // End if $show_sep ?>
			<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentyeleven' ) . '</span>', __( '<b>1</b> Reply', 'twentyeleven' ), __( '<b>%</b> Replies', 'twentyeleven' ) ); ?></span>
			<?php endif; // End if comments_open() ?>

			<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
		</footer>
    </article>
?*/ ?>
    
<!-- #post-<?php the_ID(); ?> -->
