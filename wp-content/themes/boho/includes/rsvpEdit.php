<?php
	global $wpdb;
	$rsvpTable = $wpdb->prefix . "rsvp";
	$checkRsvp = $wpdb->get_results(
		"SELECT 
		P_Id,
		UserId,
		Attending,
		Vegetarian,
		DayGuest,
		Notes
		FROM " . $rsvpTable . " AS r 
		LEFT JOIN wp_users AS u ON r.UserId = u.user_login
		WHERE r.UserId='" . $current_user->ID . "'"
		,OBJECT
	);
	foreach ($checkRsvp as $rsvpSettingObj) {
		$attending = $rsvpSettingObj->Attending;
		$vegetarian = $rsvpSettingObj->Vegetarian;
		$notes = $rsvpSettingObj->Notes;
	}
	$attendingYesCheckedStr = ($attending) ? " checked" : "";
	$attendingNoCheckedStr = ($attending) ? "" : " checked";

	$vegYesCheckedStr = ($vegetarian) ? " checked" : "";
	$vegNoCheckedStr = ($vegetarian) ? "" : " checked";

	//print_r($checkRsvp);
?>
<form action="" method="post" id="rsvpEdit">
	<fieldset>
		<legend>Attending: </legend>
		<input type="radio" value="Yes" name="attending"<?php echo $attendingYesCheckedStr; ?>>Yes
		<input type="radio" value="No" name="attending"<?php echo $attendingNoCheckedStr; ?>>No
	</fieldset>
	<fieldset>
		<legend>Vegetarian: </legend>
		<input type="radio" value="Yes" name="vegetarian"<?php echo $vegYesCheckedStr; ?>>Yes
		<input type="radio" value="No" name="vegetarian"<?php echo $vegNoCheckedStr; ?>>No
	</fieldset>
	<fieldset>
		<legend>Anything else we should know e.g. Allergies...: </legend>
		<textarea name="notes" form="rsvpEdit"><?php echo $notes; ?></textarea>
	</fieldset>
	<input type="submit" value="Submit">
</form>
<?php
	if(isset($_POST['attending']) && isset($_POST['vegetarian']) && isset($_POST['notes'])){
		$attending = (strtolower($_POST['attending'])==='yes') ? 1 : 0;
		$vegetarian = (strtolower($_POST['vegetarian'])==='yes') ? 1 : 0;

		$wpdb->update(
			$rsvpTable
			,array(
				'Attending' => $attending
				,'Vegetarian' => $vegetarian
				,'Notes' => $_POST['notes']
			)
			,array(
				'UserId' => get_current_user_id()
			)
		);
		header("Location: " . get_permalink());
	}
	//leave edit mode
	echo "<a href='" . get_permalink() . "&edit_rsvp=false'>Back to your selections?</a>";
?>