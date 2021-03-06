<?php
/**
 * Outputs page article
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>

<article class="entry clr">

	<?php the_content(); ?>

	<?php wp_link_pages( array(
		'before'		=> '<div class="page-links clr">',
		'after'			=> '</div>',
		'link_before'	=> '<span>',
		'link_after'	=> '</span>'
	) ); ?>

</article><!-- #post -->