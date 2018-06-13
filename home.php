<?php $paginas_especiais = array('mapa-do-site', 'acessibilidade'); ?>

<?php if (in_array ($_GET["pagina-especial"] , $paginas_especiais)): ?>

    <?php include __DIR__ . "/page-" . $_GET['pagina-especial'] . ".php" ?>

<?php else : ?>
	<?php get_header(); ?>
	<?php if (count( get_option('sidebars_widgets')['miolo-central-1'] ) == 0): ?>  
		<div class="chapeu">Introdução</div> 
		<h2>Página inicial</h2>
		<?php if (current_user_can( 'administrator' ) ) : ?>        
			<p>Esta área central não foi personalizada. 
			Clique 
			<a href="<?= site_url() ?>/wp-admin/customize.php?url=<?= htmlentities(site_url() . '/?' . $_SERVER["QUERY_STRING"])  ?>">aqui</a> 
			para personalizar.</p>
		<?php else: ?> 
			<p>Bem-vindo ao nosso site. No momento ainda não há conteúdo.</p>
		<?php endif; ?> 
	<?php endif; ?> 
	<?php dynamic_sidebar( 'miolo-central-1' ); ?>	
	<?php get_footer(); ?>

<?php endif; ?>