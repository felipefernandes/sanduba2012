<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title><?php printf(__('%1$s - Comments on %2$s', 'kubrick'), get_option('blogname'), the_title('','',false)); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
		body { margin: 3px; }
	</style>

</head>

<body id="commentspopup" style="padding:15px;background-image:none;background:#F5F3F4">

<?php
/* Don't remove these lines. */
add_filter('comment_text', 'popuplinks');
if ( have_posts() ) :
while( have_posts()) : the_post();
?>
<h2 id="comments-pop">Comentários</h2>

<?php
// this line is WordPress' motor, do not delete it.
$commenter = wp_get_current_commenter();
extract($commenter);
$comments = get_approved_comments($id);
$post = get_post($id);


if ( post_password_required($post) ) {  // and it doesn't match the cookie
	echo(get_the_password_form());
} else { ?>
	
	<ol class="commentlist pop">
		<?php wp_list_comments("type=comment&callback=mytheme_comment_pop",$comments);?>
	</ol>
<?php if ($comments) { ?>
<?php /*$i=1;?>
<div id="commentlist-pop">
<?php foreach ($comments as $comment) { ?>
	<div id="comment-<?php comment_ID() ?>" class="comment-pop">
		<p class="author">#<?php echo $i++;?> - <?php comment_author()?></p>
		<p class="date"><?php comment_time()?></p>
		
		<div class="text">
			<?php comment_text() ?>
		</div>
	</div>
	<div class="line-pop"></div>
<?php } // end for each comment ?>
</div>
<?php */} else { // this is displayed if there are no comments so far ?>
	<p><?php _e('No comments yet.', 'kubrick'); ?></p>
<?php } ?>


<?php if ( comments_open() ) : ?>

<div id="respond">

<h3 style="width:320px;">Deixe seu comentário</h3>

<div id="cancel-comment-reply"> 
	<small><?php cancel_comment_reply_link() ?></small>
</div> 

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'kubrick'), wp_login_url( get_permalink() )); ?></p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="pop">

<?php if ( is_user_logged_in() ) : ?>

<p><?php printf(__('Logado como <a href="%1$s">%2$s</a>.', 'kubrick'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'kubrick'); ?>"><?php _e('Log out &raquo;', 'kubrick'); ?></a></p>

<?php else : ?>

<p><input class="txt" type="text" name="author" id="author" value="Nome" size="22" onclick="this.value=''" tabindex="1" /><small><?php if ($req) echo "(obrigatório)"; ?></small>
</p>

<p>
  <input class="txt" type="text" name="email" id="email" value="E-mail (n&atilde;o ser&aacute; publicado)" onclick="this.value=''" size="22" tabindex="2" /><small><?php if ($req) echo "(obrigatório)"; ?></small>
</p>

<p><input class="txt" type="text" name="url" id="url" value="Website" size="22" tabindex="3" onclick="this.value=''" />
</p>

<?php endif; ?>

<!--<p><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="40" rows="6" tabindex="4"></textarea></p>

<p><input name="submit" type="image" src="<?=bloginfo('template_url')?>/images/btn-comentar.png" id="submit" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>

<?php comment_id_fields(); ?> 
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>
<?php endif;?>


<?php }?>

<?php endwhile;endif; ?>
</body>
</html>
