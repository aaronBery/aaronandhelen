<?php
	global $wpdb;
	$currentPage = "/rsvp?edit_rsvp=true";
	$rsvpTable = $wpdb->prefix . "rsvp";
	$checkRsvp = $wpdb->get_results(
		"SELECT 
		r.P_Id as P_Id,
		r.UserId as UserId,
		r.Attending as Attending,
		r.Vegetarian as Vegetarian,
		r.ParkingCar as ParkingCar,
		r.DayGuest as DayGuest,
		r.parentId as parentId,
		r.Notes as Notes,
		u.display_name as display_name
		FROM " . $rsvpTable . " AS r 
		LEFT JOIN " . $wpdb->prefix . "users AS u 
		ON r.UserId = u.ID
		WHERE r.UserId='" . $current_user->ID . "'
		ORDER BY u.display_name"
		,OBJECT
	);
	$checkChild = $wpdb->get_results(
		"SELECT 
		r.P_Id as P_Id,
		r.UserId as UserId,
		r.Attending as Attending,
		r.Vegetarian as Vegetarian,
		r.ParkingCar as ParkingCar,
		r.DayGuest as DayGuest,
		r.parentId as parentId,
		r.Notes as Notes,
		u.display_name as display_name
		FROM " . $rsvpTable . " AS r 
		LEFT JOIN " . $wpdb->prefix . "users AS u 
		ON r.UserId= u.ID
		WHERE r.parentId=" . $current_user->ID . " 
		ORDER BY u.display_name"
		,OBJECT
	);
	//print_r($checkChild);
	$hasChildren = (sizeof($checkChild));
	//print_r($hasChildren);
	//exit;
?>