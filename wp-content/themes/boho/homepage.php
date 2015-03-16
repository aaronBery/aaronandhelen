<?php
/**
Template Name: Homepage
 */

get_header(); ?>
	<?php 
		$imagePath = "/wp-content/themes/boho/images/";
	?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<div class="carousel carousel--container">
			<div class="carousel--arrows carousel--arrow--left" style="background-image:url(<?php echo $imagePath;?>arrows.png)"></div>
			<div class="carousel--arrows carousel--arrow--right" style="background-image:url(<?php echo $imagePath;?>arrows.png)"></div>
			<?php
				if(IS_DEV){
					if(IS_WINDOWS_DEV){
						$carouselDir = "F:/sites/aaronandhelen/wp-content/themes/boho/images/carousel";	
					}else{
						$carouselDir = "/var/www/aaronandhelen/wp-content/themes/boho/images/carousel";
					}
				}else{
					$carouselDir = "/home/aaronaldo99/public_html/aaronandhelen/wp-content/themes/boho/images/carousel";
				}
				$carouselArr = scandir($carouselDir);
				array_splice($carouselArr,0,2);
				
				foreach ($carouselArr as $carouselKey => $carouselEl) {
					$currentElClass = ($carouselKey===0) ? " carousel--current" : "";
					echo '<img data-count="' . $carouselKey . '" class="carousel--element' . $currentElClass . '" src="/wp-content/themes/boho/images/carousel/' . $carouselEl . '">';
				}
				//print_r($carouselArr);exit;
			?>
			</div>
			<img class="carouselBottom" src="/wp-content/themes/boho/images/carouselBottom.png">
			<script>
				var SLIDE_COUNT = <?php echo sizeOf($carouselArr); ?>;
				require(['app/carousel']);
			</script>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		<?php require "includes/bottomNav.php"; ?>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>