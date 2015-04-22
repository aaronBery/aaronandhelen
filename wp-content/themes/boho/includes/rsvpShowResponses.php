<style>
	table{width: 100%;}
	table td{
		padding: 0.5em;
	}
</style>
<?php
	function showAllUsrsResponses(){
		$tbl = "<table><tr><th>Name</th><th>Day Guest</th><th>Attending</th><th>Vegetarian</th><th>Parking Car</th><th width=300>Notes</th><th>Child</th><th>Baby</th></tr>";
		global $wpdb;
		$rsvpTable = $wpdb->prefix . "rsvp";
		$allUsrs = $wpdb->get_results(
			"SELECT 
			r.P_Id as P_Id
			,r.UserId as UserId
			,r.Attending as Attending
			,r.Vegetarian as Vegetarian
			,r.ParkingCar as ParkingCar
			,r.DayGuest as DayGuest
			,r.Notes as Notes
			,u.display_name as display_name
			,r.parentId as parentId
			,r.IsBaby as isBaby
			,r.IsChild as isChild
			FROM " . $rsvpTable . " AS r 
			INNER JOIN wp_users AS u ON r.UserId = u.ID
			ORDER BY u.display_name"
			,OBJECT
		);
		$total = 0;
		$numOfConfirmed = 0;
		$numOfConfirmedDay = 0;
		$numOfConfirmedEvening = 0;
		$numOfVeggies = 0;
		$numOfBabyVeggies = 0;
		$numOfChildVeggies = 0;
		$numofParking = 0;
		$childNum = 0;
		$babyNum = 0;
		foreach ($allUsrs as $key => $value) {
			$total++;
			$tmpIsComing = $value->Attending;
			$tmpIsBaby = $value->isBaby;
			$tmpIsChild = $value->isChild;
			
			if($tmpIsComing)$numOfConfirmed++;
			switch($value->DayGuest){
				case 3: 
					$dayGuestStr = "Not set";
				break;
				case 1:
					$dayGuestStr = "Day";
					if($tmpIsComing)$numOfConfirmedDay++;
				break;
				case 0:
					$dayGuestStr = "Evening";
					if($tmpIsComing)$numOfConfirmedEvening++;
				break;
				default:
					$dayGuestStr = "Not set";
			}
			$attendingStr = ($value->Attending) ? "Yes" : "No";
			if($value->Vegetarian){
				$vegStr = "Yes";
				if($tmpIsComing && $dayGuestStr==="Day" && $tmpIsBaby==0 && $tmpIsChild==0){
					$numOfVeggies++;
				}else if($tmpIsComing && $dayGuestStr==="Day" && $tmpIsBaby==1){
					$numOfBabyVeggies++;
				}else if($tmpIsComing && $dayGuestStr==="Day" && $tmpIsChild==1){
					$numOfChildVeggies++;
				}
			}else{
				$vegStr = "No";
			}
			if($value->ParkingCar){
				$parkingStr = "Yes";
				if($tmpIsComing)$numofParking++;
			}else{
				$parkingStr = "No";
			}
			if($value->isChild){
				$childNum++;
			}
			if($value->isBaby){
				$babyNum++;
			}

			$tbl .= "<tr><td>" . $value->display_name . "</td><td>" . $dayGuestStr . "</td><td>" . $attendingStr . "</td><td>" . $vegStr . "</td><td>" . $parkingStr . "</td><td>" . $value->Notes . "</td><td>" . $value->isChild . "</td><td>" . $value->isBaby . "</td></tr>" ;
		}
		$tbl .= "</table>";
		
		$statBreakDown = '<h3>Quick Stat breakdown</h3><p>(this assumes only guests that have confirmed their attendence)</p>';
		$statBreakDown .= 'Number of confirmed guests: ' . $numOfConfirmed . '<br />';
		$statBreakDown .= 'Number of confirmed day guests: ' . $numOfConfirmedDay . '<br />';
		$statBreakDown .= 'Number of adult confirmed day guests: ' . ($numOfConfirmedDay - $childNum - $babyNum) . '<br />';
		$statBreakDown .= 'Number of confirmed evening guests: ' . $numOfConfirmedEvening . '<br />';
		$statBreakDown .= 'Number of confirmed vegetarians: ' . $numOfVeggies . '<br />';
		$statBreakDown .= 'Number of confirmed baby vegetarians: ' . $numOfBabyVeggies . '<br />';
		$statBreakDown .= 'Number of confirmed child vegetarians: ' . $numOfChildVeggies . '<br />';
		$statBreakDown .= 'Number of confirmed guests driving: ' . $numofParking . '<br />';
		$statBreakDown .= 'Number of guests who have not confirmed yes: ' . ($total - $numOfConfirmed) . '<br />';
		$statBreakDown .= 'Number of children: ' . $childNum . '<br />';
		$statBreakDown .= 'Number of babies: ' . $babyNum . '<br />';

		echo $tbl . '<br />' . $statBreakDown;
	}
	showAllUsrsResponses();
?>
