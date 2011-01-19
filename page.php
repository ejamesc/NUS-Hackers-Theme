<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */

get_header(); ?>

		<div id="primary">
			<?php the_post(); ?>
			<div id="secondary" class="widget-area" role="complementary">
				 <?php
			        $values = get_post_custom_values("notes");
			        if (isset($values[0])) : ?>
			            <?php echo $values[0]; ?>
			    <?php endif; ?>
			</div>
			<div id="single-content" role="main">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'toolbox' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->

				<?php comments_template( '', true ); ?>

			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>