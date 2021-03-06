<?php
/**
 * The default template for displaying search results
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	// Display post thumbnail
	if ( has_post_thumbnail() ) : ?>

		<div class="search-entry-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
				<?php
				// Display post thumbnail
				the_post_thumbnail( 'thumbnail', array(
					'alt'	=> wpex_get_esc_title(),
				) ); ?>
			</a>
		</div><!-- .post-entry-thumbnail -->

	<?php endif; ?>

	<div class="search-entry-text clr">

		<header>
			<h2 class="search-entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
		</header>

		<div class="search-entry-content entry clr">

			<?php wpex_excerpt( 50 ); ?>
			
		</div><!-- .search-entry-content -->

	</div><!-- .search-entry-text -->

</article><!-- .search-entry -->