<h2>Hi <?php echo $current_user->user_firstname;?></h2>
<?php
	global $wpdb;
	$rsvpTable = $wpdb->prefix . "rsvp";

	//CHECK if rsvp table exists
	$checkRsvp = $wpdb->get_results(
		"SELECT 
		P_Id,
		UserId,
		Attending,
		Vegetarian,
		DayGuest,
		Notes
		FROM " . $rsvpTable . " AS r 
		LEFT JOIN wp_users AS u ON r.UserId = u.ID
		WHERE r.UserId='" . $current_user->ID . "'"
		,OBJECT
	);
	//print_r($checkRsvp);
	//exit;
	foreach ($checkRsvp as $rsvpSettingObj) {
		$attendingStr = ($rsvpSettingObj->Attending) ? "Yes" : "No";
		echo "Attending: " . $attendingStr . "<br />";

		$vegetarianStr = ($rsvpSettingObj->Vegetarian) ? "Yes" : "No";
		echo "Vegetarian: " . $vegetarianStr . "<br />";

		$notesStr = $rsvpSettingObj->Notes;
		echo "Your comments: " . $notesStr . "<br /><br />";

		switch($rsvpSettingObj->DayGuest){
			case 0:
				$guestTypeStr = "Please arrive at 1600 for the evening entertainment where you will be greeted with a champaigne reception.</strong>";
			break;
			case 1:
				$guestTypeStr = "<strong>Please arrive at 1300 to be seated before the ceremony";
			break;
			default:
				$guestTypeStr = "<strong>We will provide details on when to arrive shortly!</strong>";
		}

		echo $guestTypeStr . "<br />";
	}
	echo "<a href='/rsvp?edit_rsvp=true'>Edit your settings?</a><br />";

	

	if(isset($hasChildren) && $hasChildren > 0){
		$childListing = "";
		foreach ($checkChild as $checkChildKey=>$child) {
			$linkToChildUsr = '<a href="/rsvp?childId=' . $child->UserId . '&edit_child=true" title="' . $child->display_name . '">Edit this user</a>';
			$attendingStatus = ($child->Attending) ? "Yes" : "No";
			$vegStatus = ($child->Vegetarian) ? "Yes" : "No";
			$notes = (strlen($child->Notes)) ? $child->Notes : "None";
			$currentClass = ($checkChildKey===0) ? ' class="currentUsr"' : '';
			$childListing .= '<li' . $currentClass . '><h4>' . $child->display_name . '</h4><ul class="rsvp-group rsvp-group--inner-listing"><li>Attending: ' . $attendingStatus . '</li><li>Vegetarian: ' . $vegStatus . '</li><li>Your Notes: ' . $notes . '</li></ul></li>';
		}
		echo '<div class="rsvp-group"><h3>RSVP for your group</h3><ul class="rsvp-group rsvp-group-list">' . $childListing . '</ul></div>';
	}

	if(current_user_can('create_users')){//only admins can create users
		echo "<a href='" . get_permalink() . "?edit_is_day_guest=true'>Edit day guests</a>";
	}
?>