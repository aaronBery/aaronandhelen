<?php
	global $wpdb;
	$rsvpTable = $wpdb->prefix . "rsvp";
	$checkRsvp = $wpdb->get_results(
		"SELECT 
		r.P_Id as P_Id
		,r.UserId as UserId
		,r.Attending as Attending
		,r.Vegetarian as Vegetarian
		,r.DayGuest as DayGuest
		,r.Notes as Notes
		,u.display_name as display_name
		FROM " . $rsvpTable . " AS r 
		INNER JOIN wp_users AS u ON r.UserId = u.ID
		ORDER BY r.DayGuest"
		,OBJECT
	);
?>
<form action="" method="post" id="guestStatusForm">
	<?php 
		foreach ($checkRsvp as $rsvpSettingObj){
			switch($rsvpSettingObj->DayGuest){
				case 0:
					$eveningCheckedStr = " checked";
					$dayCheckedStr = "";
					$notSetCheckedStr = "";
				break;
				case 1:
					$eveningCheckedStr = "";
					$dayCheckedStr = " checked";
					$notSetCheckedStr = "";
				break;
				default:
					$eveningCheckedStr = "";
					$dayCheckedStr = "";
					$notSetCheckedStr = " checked";

			}
			echo '<fieldset>
				<legend>' . $rsvpSettingObj->display_name . ': </legend>
				<input type="radio" value="0" name="' . $rsvpSettingObj->UserId . 'guest"' . $eveningCheckedStr . '>Evening
				<input type="radio" value="1" name="' . $rsvpSettingObj->UserId . 'guest"' . $dayCheckedStr . '>Day
				<input type="radio" value="3" name="' . $rsvpSettingObj->UserId . 'guest"' . $notSetCheckedStr . '>Not set
			</fieldset>';
		}
	?>
	<input type="hidden" name="hiddenInput" value="1">
	<input type="submit" value="Submit">
</form>
<?php
	if(isset($_POST['hiddenInput'])){
		foreach ($checkRsvp as $rsvpSettingObj){
			if(isset($_POST[$rsvpSettingObj->UserId . 'guest'])){
				$wpdb->update(
					$rsvpTable
					,array(
						'DayGuest' => $_POST[$rsvpSettingObj->UserId . 'guest']
					)
					,array(
						'UserId' => $rsvpSettingObj->UserId
					)
				);
			}
			
		}
		//redirect back to page to see updates
		echo "<style>form#guestStatusForm{display: none;}</style>";
		echo "<a href='" . get_permalink() . "'>Go back to your details</a><br />";
		echo "<a href='" . get_permalink() . "?edit_is_day_guest=true' class='fa fa-pencil-square-o'>Go back to guests overview</a>";
	}
?>