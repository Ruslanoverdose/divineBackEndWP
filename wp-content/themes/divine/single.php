<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Nu Themes
 */

get_header(); ?>

	<div class="row">
		<main id="content" class="col-md-8 content-area" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php // nuthemes_content_nav( 'nav-below' ); ?>

			<?php
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; ?>

		<!-- #content --></main>

		<?php get_sidebar(); ?>
	<!-- .row --></div>

<?php get_footer(); ?>