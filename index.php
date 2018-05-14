<?php get_header(); ?>
<!--    <aside>
		<h2>Destaques</h2>
		<?php if ( have_posts() ) :?>
			<?php $c = 0; ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?= $c % 3 == 0 ? '<div class="row">': '' ?>
				    <div class="col">
						<div class="noticia">
							<?= !$c ? '<h2>': '</h3>' ?>
								<a href="<?php the_permalink() ?>">
								<?php the_title(); ?>
								</a>
							<?= !$c ? '</h2>': '</h3>' ?>
							<div>
								<?php the_content(); ?>
							</div>							
						</div>					
						<div class="detalhes">
							<a href="<?php the_permalink() ?>">Leia mais</a>
						</div>
					</div>
				<?= $c % 3 == 0 ? '</div>': '' ?>
				<?php $c++; ?>
			<?php endwhile;?>
		<?php else: ?>
			<div class="artigo">
				<h2>Nada Encontrado</h2>
				<p>Erro 404</p>
				<p>Lamentamos mas não foram encontrados artigos.</p>
			</div>			
		<?php endif; ?>	
		
	</aside>-->
<?php get_footer(); ?>