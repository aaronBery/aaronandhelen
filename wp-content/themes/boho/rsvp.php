<?php
/**
Template Name: RSVP
 */
//run db scripts
require "includes/rsvp_db_setup.php";

require "includes/rsvpQry.php";

$editingChildUsr = false;

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php 
				if(is_user_logged_in()){ 
					//Choose Form
					if(strcasecmp(get_query_var('edit_rsvp','false'),'true') === 0 && strcasecmp(get_query_var('edit_child','false'),'false')===0){//url paramters are strings
						$rsvpObj = $checkRsvp;
						require "includes/rsvpEdit.php";
					}elseif(strcasecmp(get_query_var('edit_child','false'),'true')===0){
						$editingChildUsr = true;
						$rsvpObj = $checkChild;
						require "includes/rsvpEdit.php";
					}elseif(strcasecmp(get_query_var('edit_is_day_guest','false'),'true') === 0){
						require "includes/rsvpAllGuestsTypeEdit.php";
					}
					elseif(strcasecmp(get_query_var('edit_guest_relationship','false'),'true') === 0){
						require "includes/rsvpAllGuestsRelationships.php";
					}elseif(strcasecmp(get_query_var('show_responses','false'),'true') === 0){
						require "includes/rsvpShowResponses.php";
					}else{
						require "includes/rsvpSetting.php";
					}
				}else{
				?>
					<p>Please RSVP by the<?php echo RSVP_DATE; ?></p>
					<p>You will need to <a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login">login</a> to complete the process</p>
				<?php 
				}
				if (have_posts()){
					while ( have_posts() ) {
						the_post();
						the_content();
					}
				}
				?>
		</div><!-- #content -->
		<?php require "includes/bottomNav.php"; ?>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>