<div id="content">
	
	<?php // Loop padrão ?>
	<?php get_template_part('loop-results', 'default'); ?>			
	
	
	<?php /* Exibe a paginação de posts quando aplicável */?>
	<?php if ( $wp_query->max_num_pages > 1 ) : ?>

		<div id="nav-above" class="navigation">
			<?php wp_pagenavi(); ?>
		</div><!-- #nav-above -->

	<?php endif; ?>	

	<?php /* Se não houver posts, exibe mensagem de página vazia */ ?>
	<?php if ( ! have_posts() ) : ?>

		<div id="post-0" class="post error404 not-found">
			<h2 class="entry-title"><?php _e( 'Eita! Cadê?'); ?></h2>
			<div class="entry">
				<p><?php _e( 'Infelizmente não foi encontrado o que você estava procurando. <br /><br />Bom, que tal tentar outro <strong>termo de busca</strong> ou navegar por <strong>categorias</strong>, ou na seção <strong>arquivos</strong>.<br/><br/>' ); ?></p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			</div><!-- .entry-content -->
		</div><!-- #post-0 -->

	<?php endif; ?>

</div><!-- #content -->