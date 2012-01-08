<script>
$(function()
{
	//add subtitulo ao widget
	$('.widget_tag_cloud h4').append('<span>O que você procura?</span>');
	
	//adiciona imagem ao widget
	$('.instagram-gallery-widget h4').append('<span><img src="<?php bloginfo("template_url") ?>/images/widget-instagram.png" /></span>');
	
	//adiciona imagem ao widget (FACEBOOK)
	$('#sidebar .text-8 h4').append('<span><img src="<?php bloginfo("template_url") ?>/images/widget-facebook.png" /></span>');
	
});
</script>
<div id="sidebar">
	
	<?php dynamic_sidebar('barra-principal');?>
	
</div><!-- #sidebar -->
