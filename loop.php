<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<nav id="nav-above">
		<h1 class="section-heading"><?php _e( 'Post navigation', 'toolbox' ); ?></h1>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'toolbox' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?></div>
	</nav><!-- #nav-above -->
<?php endif; ?>

<?php /* Start the Loop */ ?>
<?php if ( is_archive() || is_search() ) : // Only display Excerpts for archives & search ?>
	<div id="posts">
	<?php while ( have_posts() ) : the_post(); /* Archive/Search article loop*/ ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<div class="entry-meta"><?php printf( __('<time class="entry-date" datetime="%1$s" pubdate>%2$s</time>'), get_the_date( 'c' ),
					get_the_date()
				); ?></div><!-- .entry-meta -->
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php wpe_excerpt('wpe_excerptlength_teaser', 'wpe_excerptmore'); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->

			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'toolbox' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- #entry-meta -->
		</article><!-- #post-<?php the_ID(); ?> -->

		<?php comments_template( '', true ); ?>

	<?php endwhile; ?>

	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if (  $wp_query->max_num_pages > 1 && !is_home() ) : ?>
		<nav id="nav-below">
			<h1 class="section-heading"><?php _e( 'Post navigation', 'toolbox' ); ?></h1>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'toolbox' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?></div>
		</nav><!-- #nav-below -->
	<?php endif; ?>
	</div><!--posts-->


<?php elseif ( is_home() ) : //If this is the home page ?>
<a href="http://school.nushackers.org"><img style="margin-top: -15px;" src="<?php bloginfo( 'template_url' ); ?>/images/hackerschoolbanner.png" /></a>
<div id="posts">
<h1 class="front-h1">Articles<span><br/>More community at <a href="http://antinews.nushackers.org">antinews.nushackers.org &rarr;</a></span></h1>
<?php while ( have_posts() ) : the_post(); /* Article loop*/ ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<div class="entry-meta"><?php printf( __('<time class="entry-date" datetime="%1$s" pubdate>%2$s</time>'), get_the_date( 'c' ),
				get_the_date()
			); ?></div><!-- .entry-meta -->
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php wpe_excerpt('wpe_excerptlength_teaser', 'wpe_excerptmore'); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'toolbox' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->

	<?php comments_template( '', true ); ?>

<?php endwhile; ?>
<a href="<?php echo home_url( '/' ); ?>articles">More Articles &rarr;</a>
</div><!--posts-->

<div id="right">
<h1 class="front-h1">Friday Hacks<span><a href=" <?php echo home_url( '/' ); ?>sponsor">Supported</a> by IDA. <br/>Every Friday @ <a href="<?php echo home_url( '/' ); ?>fridayhacks">6pm SR3 COM1, School of Computing</a></span></h1>
	<?php $page_id = 1894; //ejames's local: 208 production: 1894
	$page = get_page($page_id);
	$content = $page->post_content;
	echo $content;
	?>
</div>

<div id="leftbar"><strong>We're building a community of passionate hackers in NUS.</strong> <a href="<?php echo home_url( '/' ); ?>about">Read more about us</a>, attend or speak at <a href="<?php echo home_url( '/' ); ?>fridayhacks">one of our meetings</a>, or <a href="<?php echo home_url( '/' ); ?>code">use our code</a>.</div>

<?php elseif ( is_page_template('articles.php') ) : //If this calls for an articles listing ?>
	<?php
		$temploop = $wp_query;
		$wp_query = null;
	    $wp_query = new WP_Query('posts_per_page=10&post_status=publish&paged=' . $paged);
	?>

	<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); /* Secondary article loop*/ ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<div class="entry-meta"><?php printf( __('<time class="entry-date" datetime="%1$s" pubdate>%2$s</time>'), get_the_date( 'c' ),
					get_the_date()
				); ?></div><!-- .entry-meta -->
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php wpe_excerpt('wpe_excerptlength_teaser', ''); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->

			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'toolbox' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- #entry-meta -->
		</article><!-- #post-<?php the_ID(); ?> -->
	<?php endwhile; ?>

	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if (  $wp_query->max_num_pages > 1 ): ?>
		<nav id="nav-below">
			<h1 class="section-heading"><?php _e( 'Post navigation', 'toolbox' ); ?></h1>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'toolbox' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?></div>
		</nav><!-- #nav-below -->
	<?php endif; $wp_query = null; $wp_query = $temp; ?>
<?php endif;?>



