<?php

register_nav_menus( array(
	'primary' => __( 'Primary Navigation' ),
) );

 /* Destaque Topo*/
    register_sidebar( array(
        'name' => 'Destaques do Topo',
        'id' => 'destaque-topo',
        'description'   => 'Destaques do Topo',
        'before_widget' => '<div id="%1$s" class="widget-first %2$s">', /* Antes da Widget */
        'after_widget' => '</div>', /* Depois da Widget */
        'before_title' => '<!--', /* Antes do título */
        'after_title' => '-->', /* Depois do título */
    ) );


 /* Destaque Lateral Principal */
    register_sidebar( array(
        'name' => 'Barra Lateral Principal',
        'id' => 'barra-principal',
        'description'   => 'Esta é a barra lateral superior, onde fica o Perfil',
        'before_widget' => '<div id="%1$s" class="widget-first %2$s">', /* Antes da Widget */
        'after_widget' => '</div>', /* Depois da Widget */
        'before_title' => '<h4>', /* Antes do título */
        'after_title' => '</h4>', /* Depois do título */
    ) );


 /* Destaques Rodapé */
    register_sidebar( array(
        'name' => 'Destaques do Rodapé',
        'id' => 'destaque-rodape',
        'description'   => 'Esta é a barra onde ficam as categorias',
        'before_widget' => '<div id="%1$s" class="widget %2$s-segunda">', /* Antes da Widget */
        'after_widget' => '</div>', /* Depois da Widget */
        'before_title' => '<h4 class="widgettitle">', /* Antes do título */
        'after_title' => '</h4>', /* Depois do título */
    ) );


 /* Superbanner Maior */
    register_sidebar( array(
        'name' => 'Super Banner Maior',
        'id' => 'super-banner-maior',
        'description'   => 'Este é o SuperBanner Maior que fica na área preta',
        'before_widget' => '<div class="widget-super-big">', /* Antes da Widget */
        'after_widget' => '</div>', /* Depois da Widget */
        'before_title' => '<h4>', /* Antes do título */
        'after_title' => '</h4>', /* Depois do título */
    ) );


 /* Superbanner Segundo */
    register_sidebar( array(
        'name' => 'Super Banner Segundo',
        'id' => 'super-banner-segundo',
        'description'   => 'Este é o SuperBanner que se encontra logo acima do título',
        'before_widget' => '<div class="widget-super-segundo">', /* Antes da Widget */
        'after_widget' => '</div>', /* Depois da Widget */
        'before_title' => '<h4>', /* Antes do título */
        'after_title' => '</h4>', /* Depois do título */
    ) );



?>
<?php
/* Comentários */
global $countComment;
$countComment = 1;
function mytheme_comment($comment, $args, $depth) {
	global $countComment;
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='60',$default=get_bloginfo("template_path").'/images/gravatar-default.jpg' ); ?>
      </div>
	  
	  <div class="comment-content">
		<?php printf(__('<cite class="fn">#%d - %s disse:</cite>'), $countComment++, get_comment_author_link()) ?>
		<?php printf(__('<cite class="date">%s às %s</cite>'), get_comment_date("d/m/Y"),get_comment_time("H\hi")) ?>
	  
		  <?php if ($comment->comment_approved == '0') : ?>
			 <p class="warning">Seu comentário está aguardando moderação.</p>
		  <?php endif; ?>

		  <?php comment_text() ?>

		</div>
		<div class="clearfloat"></div>
		<div class="reply">
			<?php comment_reply_link(array_merge( array("reply_text"=>"reply"), array('depth' => $depth, 'max_depth' => 2))) ?>
		</div>
		<div class="clearfloat"></div>
<?php   } ?>
<?php 
global $countComment;
$countComment = 1;
function mytheme_comment_pop($comment, $args, $depth) {
	global $countComment;
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	  <div class="comment-content">
		<?php printf(__('<cite class="fn">#%d - %s disse:</cite>'), $countComment++, get_comment_author_link()) ?>
		<?php printf(__('<cite class="date">%s às %s</cite>'), get_comment_date("d/m/Y"),get_comment_time("H\hi")) ?>
	  
		  <?php if ($comment->comment_approved == '0') : ?>
			 <p class="warning">Seu comentário está aguardando moderação.</p>
		  <?php endif; ?>
		  <?php comment_text() ?>
		</div>
		<div class="clearfloat"></div>
		<div class="reply">
			<?php //comment_reply_link(array_merge( array("reply_text"=>"reply"), array('depth' => $depth, 'max_depth' => 2))) ?>
			<?php global $post?>
			<a href="<?php the_permalink()?>#comment-<?php comment_ID() ?>" target="_blank">Responder</a>
		</div>
		
		<div class="clearfloat"></div>
<?php   } ?>