<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Boho
 * @since Boho
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<article id="post-0" class="post error404 no-results not-found">

				<!-- <header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Well this is embarrassing...', 'twentytwelve' ); ?></h1>
				</header> -->

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for, try searching below', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
				<p>&nbsp;</p>
				<iframe src="http://notfound-static.fwebservices.be/404/index.html?&amp;key=60641d584920e67934440378a01919d3" width="100%" height="650" frameborder="0"></iframe>

				
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>