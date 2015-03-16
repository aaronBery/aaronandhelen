<?php
/**
Template Name: Accomodation
 */


get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php
				$bedBreakfastId = 51;
				$luxuryId = 55;
				$budgetId = 57;

				$accordionArr = [
					$bedBreakfastId
					,$luxuryId
					,$budgetId
				];

				if ( have_posts() ) {
					while ( have_posts() ) {

						the_post(); ?>

						<h2><?php the_title(); ?></h2>

						<?php the_content();

					}
				}
				echo '<div class="tab tab--holder">';
				foreach ($accordionArr as $accordionKey => $accordionItemId) {
					$accordionItem = get_page($accordionItemId);
					//$current = ($accordionKey===0) ? " current" : "";
					echo '<div class="tab tab--item" data-num="' . $accordionKey . '"><h3 data-num="' . $accordionKey .'">' . $accordionItem->post_title . '</h3><div class="tab tab--content" data-num="' . $accordionKey . '">' . $accordionItem->post_content . '</div></div>';
				}
				echo '</div>';
			?>
			<script>require(['app/accomodation']);</script>
		</div><!-- #content -->
		<?php require "includes/bottomNav.php"; ?>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>