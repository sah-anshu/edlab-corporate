<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<div id="primary" class="content-area clr">

		<main id="content" class="site-content left-content clr" role="main">

			<?php get_template_part( 'partials/post-layout' ); ?>

		</main><!-- #content -->

		<?php get_sidebar(); ?>

	</div><!-- #primary -->

<?php endwhile; ?>

<?php get_footer(); ?>