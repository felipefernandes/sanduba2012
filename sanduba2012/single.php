<?php get_header(); ?>

	<div id="content" class="single-page">
		
		<div class="clearfloat"></div>		
		
		<div class="posts">			
		<?php // Loop padrão ?>
		<?php get_template_part('loop', 'default'); ?>
		
		<?php //Template de comentarios ?>
		<?php comments_template(); ?>		


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
		</div><!-- #posts -->
	</div><!-- #content -->
	
	<?php get_sidebar()?>			

<?php get_footer(); ?>