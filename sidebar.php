<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Corporate WordPress theme
 * @author WPExplorer.com
 * @link https://www.wpexplorer.com
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( is_active_sidebar( 'sidebar' ) ) : ?>

	<aside id="secondary" class="sidebar-container" role="complementary">

		<div class="sidebar-inner">

			<div class="widget-area">

				<?php dynamic_sidebar( 'sidebar' ); ?>

			</div><!-- .widget-area -->

		</div><!-- .sidebar-inner -->

	</aside><!-- #secondary -->

<?php endif; ?>