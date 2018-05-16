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
				<div class="screen-reader-text">Informações sobre o artigo:</div>
				<dl>
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
							onclick="javascript:window.open(this.href,'_blank','menubar=no,height=300,width=500');return false;"
							href="https://twitter.com/intent/tweet?text=<?= urlencode (get_the_title() );?>&amp;url=<?=  urlencode(get_permalink());?>">
							Tweet 
						</a>
					</li>
					<li class="facebook">Facebook</li>
					<li class="googleplus">G+</li>
				</ul>
				
			</div>
			<div class="conteudo_noticia">

				<?php the_content();?>

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
