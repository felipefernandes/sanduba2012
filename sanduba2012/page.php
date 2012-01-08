<?php get_header(); ?>

	<div id="content">
	<div class="posts">
		<?php /* LOOP PAGE */?>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<div class="page" id="post-<?php the_ID(); ?>">
				<div class="titulo">
					<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>			
				</div>
				<div class="clearfloat"></div>
				<div class="entry">
					<?php the_content(); ?>
				</div>

				<div class="doubleline clearfloat"></div>
			</div>

		<?php endwhile; ?>		
		<?php /* END -- LOOP PAGE */?>	
			
		
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