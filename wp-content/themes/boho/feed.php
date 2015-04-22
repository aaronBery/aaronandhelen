<?php
/**
Template Name: json feed
 */
global $wpdb;
$rsvpTable = $wpdb->prefix . "rsvp";
$allRsvp = $wpdb->get_results(
	"SELECT 
	r.P_Id as P_Id
	,r.UserId as UserId
	,r.Attending as Attending
	,r.Vegetarian as Vegetarian
	,r.DayGuest as DayGuest
	,r.Notes as Notes
	,r.ParkingCar as ParkingCar
	,u.display_name as display_name
	,r.parentId as parentId
	,r.IsChild as isChild
	,r.IsBaby as isBaby
	FROM " . $rsvpTable . " AS r 
	INNER JOIN wp_users AS u ON r.UserId = u.ID
	ORDER BY u.display_name"
	,OBJECT
);

function setBoolToStr($allRsvp){
	foreach ($allRsvp as $key => $value) {
		$value->Attending = ($value->Attending) ? "Yes" : "No";
		$value->Vegetarian = ($value->Vegetarian) ? "Yes" : "No";
		$value->DayGuest = ($value->DayGuest) ? "Yes" : "No";
		$value->ParkingCar = ($value->ParkingCar) ? "Yes" : "No";
		$value->isChild = ($value->isChild) ? "Yes" : "No";
		$value->isBaby = ($value->isBaby) ? "Yes" : "No";
	}
	return $allRsvp;
}

$feed = setBoolToStr($allRsvp);
$feed = json_encode($feed);
echo $feed;
?>