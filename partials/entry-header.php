<?php
/**
 * Displays the post entry header
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>

<header>
	<h2 class="loop-entry-title"><a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><?php the_title(); ?></a></h2>
	<?php get_template_part( 'partials/entry-meta', get_post_type() );?>
</header>