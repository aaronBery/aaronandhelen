<style>
	table{width: 100%;}
	table td{
		padding: 0.5em;
	}
</style>
<?php
	function showAllUsrsResponses(){
		$tbl = "<table><tr><th>Name</th><th>Day Guest</th><th>Attending</th><th>Vegetarian</th><th>Notes</th></tr>";
		global $wpdb;
		$rsvpTable = $wpdb->prefix . "rsvp";
		$allUsrs = $wpdb->get_results(
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
		
		foreach ($allUsrs as $key => $value) {
			switch($value->DayGuest){
				case 0: 
					$dayGuestStr = "Not set";
				break;
				case 1:
					$dayGuestStr = "Day";
				break;
				case 3:
					$dayGuestStr = "Evening";
				break;
				default:
					$dayGuestStr = "Not set";
			}
			$attendingStr = ($value->Attending) ? "Yes" : "No";
			$vegStr = ($value->Vegetarian) ? "Yes" : "No";

			$tbl .= "<tr><td>" . $value->display_name . "</td><td>" . $dayGuestStr . "</td><td>" . $attendingStr . "</td><td>" . $vegStr . "</td><td>" . $value->Notes . "</td></tr>" ;
		}
		$tbl .= "</table>";
		echo $tbl;
	}
	showAllUsrsResponses();
?>