<?php
/**
Template Name: RSVP
 */
//run db scripts
require "includes/rsvp_db_setup.php";

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php if(is_user_logged_in()){ ?>
				<h3>Hi <?php echo $current_user->user_firstname;?></h3>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php //comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
				<?php 
					if(strcasecmp(get_query_var('edit_rsvp','false'),'true') === 0){//url paramters are strings 
						require "includes/rsvpEdit.php";
					}elseif(strcasecmp(get_query_var('edit_is_day_guest','false'),'true') === 0){
						require "includes/rsvpAllGuestsTypeEdit.php";
					}else{
						require "includes/rsvpSetting.php";
					}
				?>
			<?php }else{ ?>
				<p>You need to be logged in to RSVP!</p>
				<p><a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login">Login</a></p>
			<?php } ?>
		</div><!-- #content -->
		<?php require "includes/bottomNav.php"; ?>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>