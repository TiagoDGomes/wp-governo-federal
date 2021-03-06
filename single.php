<?php get_header();?>

	<?php if (have_posts()): ?>

		<?php while (have_posts()): ?>		
			<?php the_post();?>

			<div class="chapeu">
				<?=get_post_meta(get_the_ID(), 'Chapéu', true);?>
			</div>

			<h2>
				<?php the_title();?>
			</h2>

			<div class="descricao">

				<?php if (has_excerpt()): ?>
					<?php the_excerpt();?>
				<?php endif;?>

			</div>
			
			<div class="informacoes">
				<?php if (get_post_type() == 'post'): ?>
				<div class="screen-reader-text">Informações sobre o artigo:</div>
				
					<dl class="info">
						<dt class="autor">por</dt>
						<dd class="autor"><?php the_author()?></dd>
						<dt class="data">Publicado:</dt>
						<dd class="data">
							<time datetime="<?php the_time('Y-m-d H:i')?>">
							<?php the_time('d \d\e F \d\e Y\, H\hi\m\i\n.')?>
							</time>
						</dd>
						<dt class="data">Última modificação:</dt>
						<dd class="data">
							<time datetime="<?php the_modified_time('Y-m-d H:i')?>">
							<?php the_modified_time('d \d\e F \d\e Y\, H\hi\m\i\n.')?>
							</time>
						</dd>
					</dl>
				
				
				<ul class="redes-sociais reacao">


					<li class="twitter">
						<a class="twitter-share-button"
							onclick="window.open(this.href,'_blank','menubar=no,height=300,width=500');return false;"
							href="https://twitter.com/intent/tweet?text=<?= urlencode (get_the_title() );?>&amp;url=<?=  urlencode(get_permalink());?>">
							Tweet 
						</a>
					</li>
					<li class="facebook">
						<iframe src="https://www.facebook.com/plugins/like.php?href=<?= urlencode (get_permalink());?>&amp;width=120&amp;layout=button&amp;action=like&amp;size=small&amp;show_faces=false&amp;share=false&amp;height=25&amp;appId=<?= get_option('facebook_app_id');?>" width="120" height="25" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
					</li>
					<li class="googleplus">
						<a class="googleplus-share-button"
							onclick="window.open(this.href,'_blank','menubar=no,height=600,width=400');return false;"
							href="https://plus.google.com/share?url=<?=  urlencode(get_permalink());?>">
							G+
						</a> 
					</li>




				</ul>
				<?php endif; ?>
			</div>
			<div class="conteudo_noticia">

				<?php the_content();?>

			</div>

			<div class="main-rodape">
				<?php if (get_post_type() == 'post'): ?>
					<?php if (get_the_tags()): ?>
					<div class="tags">
						<div class="legenda">Tópicos:</div>
						<?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
					</div>
					<?php endif; ?>
					
					<div class="categorias">
						<div class="legenda">Assuntos:</div>
						<?php the_category();?>
					</div>
				<?php endif; ?>
			</div>
			
		<?php endwhile;else: ?>


	<?php endif;?>

<?php get_footer();?>





<?php
/* <div id="conteudo">
<div id="artigos">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="artigo">
<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
<p>Postado por <?php the_author() ?> em <?php the_time('d/M/Y') ?> - <?php comments_popup_link('Sem Comentários', '1 Comentário', '% Comentários', 'comments-link', ''); ?> <?php edit_post_link('(Editar)'); ?></p>
<p><?php the_content(); ?></p>
</div>

<?php comments_template(); ?>

<?php endwhile; else: ?>
<div class="artigo">
<h2>Nada Encontrado</h2>
<p>Erro 404</p>
<p>Lamentamos mas não foram encontrados artigos.</p>
</div>
<?php endif; ?>

</div>

<?php get_sidebar(); ?>
</div> */
?>
