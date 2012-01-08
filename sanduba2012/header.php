<?php
/**
 * Sanduba 2012
 * developed by ff.nu
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />

<? // script para add font do google  ?>
<script type="text/javascript">
  WebFontConfig = {
    google: { families: [ 'Lato:100,100italic:latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })(); </script>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="SHORTCUT ICON" href="<?php bloginfo("template_url")?>/images/favicon.ico" />

<!-- styles needed by jScrollPane -->
<link type="text/css" href="<?php bloginfo("template_url")?>/includes/jquery.jscrollpane.css" rel="stylesheet" media="all" />

<!-- latest jQuery direct from google's CDN -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
</script>

<!-- the mousewheel plugin - optional to provide mousewheel support -->
<script type="text/javascript" src="<?php bloginfo("template_url")?>/includes/jquery.mousewheel.js"></script>

<!-- the jScrollPane script -->
<script type="text/javascript" src="<?php bloginfo("template_url")?>/includes/jquery.jscrollpane.min.js"></script>

<!-- template functions file -->
<script type="text/javascript" src="<?php bloginfo("template_url")?>/includes/functions.js"></script>

<?php
	/* Script para popup nos comentarios 
	*/
	comments_popup_script(450, 500);
	
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_head();
?>
</head>
<body>
<div id="wrap">
	
	<div id="super_banner">
	<?php dynamic_sidebar('super-banner-maior');?>
	</div>
	
	<div id="header">
		<h1 class="logo left"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		<div class="right">
			<div class="social">
				<ul>
					<li><a class="twitter" target="_blank" href="http://twitter.com/Helogomes" alt="Follow me @Helogomes">Follow me @Helogomes</a></li>
					<li><a class="facebook" target="_blank" href="https://www.facebook.com/helo.gomes" alt="Sanduba no Facebook">Sanduba no Facebook</a></li>
					<li><a class="feed" target="_blank" href="<?php bloginfo('url') ?>/feed" alt="Acompanhe os posts"><?php bloginfo('url') ?>/feed</a></li>
					<li><a class="mail" target="_blank" href="mailto:sanduichedealgodao@gmail.com" alt="Me manda um telegrama">Me manda um telegrama</a></li>
					<li><a class="youtube" target="_blank" href="http://www.youtube.com/user/quintesducasble" alt="Youtube-me">Youtube-me</a></li>					
				</ul>
			</div>
			<div class="search">
				<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
			        <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
				</form>		
			</div>
		</div>
		<div class="clearfloat"></div>
		<div class="nav">
			<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
		</div>		
	</div><!-- #header -->