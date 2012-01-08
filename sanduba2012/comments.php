<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'kubrick'); ?></p> 
	<?php
		return;
	}
?>

<div class="comments">

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h2 id="comments_title">Este post tem <?php comments_number('(0 comentários)', '(1 comentário)', '(% comentários)' );?></h2>
	<h3>Deixe o seu também e depois compartilhe com as amigas</h3>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
	<?php wp_list_comments("type=comment&callback=mytheme_comment");?>
	<?php //wp_list_comments();?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.', 'kubrick'); ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">

<h3>Deixe seu comentário</h3>

<div id="cancel-comment-reply"> 
	<small><?php cancel_comment_reply_link() ?></small>
</div> 

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'kubrick'), wp_login_url( get_permalink() )); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p><?php printf(__('Logado como <a href="%1$s">%2$s</a>.', 'kubrick'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'kubrick'); ?>"><?php _e('Log out &raquo;', 'kubrick'); ?></a></p>

<?php else : ?>
	
<p><input type="text" name="author" id="author" value="Nome" size="22" onclick="this.value=''" tabindex="1" /><small><?php if ($req) echo "(obrigatório)"; ?></small></p>
<p><input type="text" name="email" id="email" value="E-mail (n&atilde;o ser&aacute; publicado)" onclick="this.value=''" size="22" tabindex="2" /><small><?php if ($req) echo "(obrigatório)"; ?></small></p>
<p><input type="text" name="url" id="url" value="Website" size="22" tabindex="3" onclick="this.value=''" /></p>

<?php endif; ?>

<!--<p><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="40" rows="6" tabindex="4"></textarea></p>
<p>
	<input name="submit" type="image" src="<?=bloginfo('template_url')?>/images/btn-comentar.png" id="submit" />
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>

<?php comment_id_fields(); ?> 
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
</div>