<?php
/*
	Loop Archive e Resultado de Busca
*/
?>
<!-- POST LOOP -->
<div class="posts">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="post" id="post-<?php the_ID(); ?>">
		<div class="date left"><span class="day"><?php the_time('d'); ?></span><span class="month"><?php the_time('M'); ?></span></div>
		<div class="titulo">
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>			
			<h3><?php the_field('subtitulo'); ?></h4>
		</div>
		<div class="clearfloat"></div>
		<div class="entry">
			<?php if(is_search() || is_archive()):?>
							
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink()?>" class="more right">Continue lendo</a>
			<div class="clearfloat"></div>
			
			<?php else:?>
			
			<?php the_content() ?>
			
			<?php endif;?>			
		</div>
		<div class="post-footer">
			<div class="meta left">
			<p>EM: <?php the_category(', '); ?></p>
			<p><?php the_tags('TAGS: ', ', ', ''); ?></p>
			</div>
			<div class="share right">
				<ul>
					<li><?php comments_popup_link('0 Comentários','1 Comentário','% Comentários','comment-link','none');?></li>
					<li><a class="twitter" href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink();?> by @Helogomes" title="Twittar <?php the_title(); ?>!" target="_blank">Twittar <?php the_title(); ?>!</a></li>
					<li><a class="facebook" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" title="Postar '<?php the_title(); ?>' no Facebook" target="blank">Postar no Facebook</a></li>
				</ul>
			</div>
		</div>
		<div class="doubleline clearfloat"></div>
	</div>
	
<?php endwhile; ?>	
</div>
<!-- POST LOOP * END -->
