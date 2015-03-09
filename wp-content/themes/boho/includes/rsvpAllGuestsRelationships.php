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
		,r.parentId as parentId
		FROM " . $rsvpTable . " AS r 
		INNER JOIN wp_users AS u ON r.UserId = u.ID
		ORDER BY r.DayGuest"
		,OBJECT
	);

	function getOptions($checkRsvp,$parentIdArg,$tmpCurrUsr){
		$options = '<option value="0">---Not set---</option>';
		foreach ($checkRsvp as $key => $value) {
			if($parentIdArg === $value->UserId){
				$options .= '<option value="' . $value->UserId . '" selected>' . $value->display_name . '</option>';
			}else if($tmpCurrUsr !== $value->UserId){
				$options .= '<option value="' . $value->UserId . '">' . $value->display_name . '</option>';
			}
		}

		return $options;
	}
?>
<p>This form allows the admin to change the relationships of each guest to allow a parent to rsvp for a child.</p>
<form action="" method="post" id="guestRelationshipForm">
	<?php 
		foreach ($checkRsvp as $rsvpSettingObj){
			
			echo '<fieldset>
				' . $rsvpSettingObj->display_name . '
				<select name="' . $rsvpSettingObj->UserId . '">
				'. getOptions($checkRsvp,$rsvpSettingObj->parentId,$rsvpSettingObj->UserId) . '
				</select>
			</fieldset><br />';
		}
	?>
	<input type="hidden" name="hiddenInput" value="1">
	<input type="submit" value="Submit">
</form>
<?php
	if(isset($_POST['hiddenInput'])){
		foreach ($checkRsvp as $rsvpSettingObj){
			if(isset($_POST[$rsvpSettingObj->UserId])){
				$wpdb->update(
					$rsvpTable
					,array(
						'parentId' => $_POST[$rsvpSettingObj->UserId]
					)
					,array(
						'UserId' => $rsvpSettingObj->UserId
					)
				);
			}
			
		}
		//redirect back to page to see updates
		echo "<style>form#guestRelationshipForm{display: none;}</style>";
		echo "<a href='" . get_permalink() . "' class='fa fa-pencil-square-o'>Go back to your details</a><br />";
		echo "<a href='" . get_permalink() . "?edit_is_day_guest=true' class='fa fa-pencil-square-o'>Go back to guests overview</a>";
	}
?>