<?php
	foreach ($rsvpObj as $rsvpIt) {
		if($editingChildUsr){
			if($rsvpIt->UserId===get_query_var('childId','-1')){
				$rsvpName = $rsvpIt->display_name;
				$usrId = $rsvpIt->UserId;
				$attending = $rsvpIt->Attending;
				$vegetarian = $rsvpIt->Vegetarian;
				$parkingCar = $rsvpIt->ParkingCar;
				$notes = $rsvpIt->Notes;
			}
		}else{
			$rsvpName = $current_user->user_firstname;
			$usrId = $rsvpIt->UserId;
			$attending = $rsvpIt->Attending;
			$vegetarian = $rsvpIt->Vegetarian;
			$parkingCar = $rsvpIt->ParkingCar;
			$notes = $rsvpIt->Notes;
		}
		
	}

	$attendingYesCheckedStr = ($attending) ? " checked" : "";
	$attendingNoCheckedStr = ($attending) ? "" : " checked";

	$vegYesCheckedStr = ($vegetarian) ? " checked" : "";
	$vegNoCheckedStr = ($vegetarian) ? "" : " checked";

	$parkingCarYesCheckedStr = ($parkingCar) ? " checked" : "";
	$parkingCarNoCheckedStr = ($parkingCar) ? "" : " checked";

	include "rsvpForm.php";

	include "processRsvp.php";
?>