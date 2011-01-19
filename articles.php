<?php
/*
Template Name: Articles
*/
?>

<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
get_header(); ?>

		<section id="primary">
			<?php get_sidebar(); ?>
			<div id="single-loop" role="main">

				<header class="page-header">
					<h1 class="page-title">Articles</h1>
				</header>

				<?php rewind_posts(); ?>

				<?php get_template_part( 'loop' ); ?>

			</div><!-- #content -->
		</section><!-- #primary -->


<?php get_footer(); ?>