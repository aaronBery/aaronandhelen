<h2>Hi <?php echo $current_user->user_firstname;?></h2>
<?php
	function instructionGen($guestType){
		$str = '';

		switch($guestType){
			case 0:
				$str = "Please arrive at 1600 for the evening entertainment where you will be greeted with a champaigne reception.</strong>";
			break;
			case 1:
				$str = "<strong>Please arrive at 1300 to be seated before the ceremony";
			break;
			default:
				$str = "<strong>We will provide details on when to arrive shortly!</strong>";
		}

		return $str;
	}

	$usrSettingsListings = "";
	$tabList = "";
	$subGroupUl = '<ul class="rsvp-group rsvp-group--inner-listing current" data-num="0">';
	$h3 = '<h3>Please RSVP</h3>';

	foreach ($checkRsvp as $rsvpSettingObj) {
		$tabList .= '<li class="rsvp-group rsvp-group--tab current" data-num="0">' . $rsvpSettingObj->display_name . '</li>';
		//$usrSettingsListings .= '<li class="rsvp-group rsvp-group--tab"><h4>' . $rsvpSettingObj->display_name . '</h4>';

		$attendingStr = ($rsvpSettingObj->Attending) ? "Yes" : "No";
		$usrSettingsListings .=  $subGroupUl . "<li>Attending: " . $attendingStr . "</li>";

		$vegetarianStr = ($rsvpSettingObj->Vegetarian) ? "Yes" : "No";
		$usrSettingsListings .=  "<li>Vegetarian: " . $vegetarianStr . "</li>";

		$notesStr = $rsvpSettingObj->Notes;
		$usrSettingsListings .=  "<li>Your comments: " . $notesStr . "</li>";

		$usrSettingsListings .=  '<li>' . instructionGen($rsvpSettingObj->DayGuest) . "</li>";
		$usrSettingsListings .=  "<li><a href='/?page_id=13&edit_rsvp=true'>Edit your settings?</a></li></ul></li>";
	}
	

	if(isset($hasChildren) && $hasChildren > 0){
		$h3 = '<h3>RSVP for you and your group</h3>';
		foreach ($checkChild as $checkChildKey=>$child) {
			$dataNum = $checkChildKey + 1;
			$subGroupUl = '<ul class="rsvp-group rsvp-group--inner-listing"  data-num="' . $dataNum . '">';
			$tabList .= '<li class="rsvp-group rsvp-group--tab" data-num="' . $dataNum . '">' . $child->display_name . '</li>';
			$linkToChildUsr = '<a href="/?page_id=13' . '&childId=' . $child->UserId . '&edit_child=true" title="' . $child->display_name . '">Edit this user</a>';
			$attendingStatus = ($child->Attending) ? "Yes" : "No";
			$vegStatus = ($child->Vegetarian) ? "Yes" : "No";
			$notes = (strlen($child->Notes)) ? $child->Notes : "None";
			//$currentClass = ($checkChildKey===0) ? ' class="currentUsr"' : '';
			$usrSettingsListings .=  $subGroupUl . '<li>Attending: ' . $attendingStatus . '</li><li>Vegetarian: ' . $vegStatus . '</li><li>Your Notes: ' . $notes . '</li>';
			$usrSettingsListings .=  '<li>' . instructionGen($child->DayGuest) . "</li>";
			$usrSettingsListings .=  '<li>' . $linkToChildUsr . '</li>';
			$usrSettingsListings .= "</ul></li>";
		}
		
	}

	echo $h3 . '<div class="rsvp-group rsvp-group--holder"><ul class="rsvp-group rsvp-group-list">' . $tabList . '</ul>' . $usrSettingsListings . '</div>';

	if(current_user_can('create_users')){//only admins can create users
		echo "</br><a href='" . get_permalink() . "&edit_is_day_guest=true'>Only admins can use this link to edit day guests</a>";
	}
?>
<script>
require(['app/rsvpTabs']);
</script>