<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
			<div id="site-generator">
				NUS Hackers | <a href="http://wordpress.org/" rel="generator">WordPress</a><span class="sep"> | </span><?php printf( __( 'Theme: %1$s by %2$s.', 'toolbox' ), 'Toolbox', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php if(is_home() ):?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/autocolumn.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">$(function(){
	$('#columnize').columnize({ width: 376 });
	});</script>

<?php endif; ?>
</body>
</html>