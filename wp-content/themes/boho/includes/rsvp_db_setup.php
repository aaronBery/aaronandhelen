<?php
	global $wpdb;
	$rsvpTable = $wpdb->prefix . "rsvp";

	//CHECK if rsvp table exists
	$checkRsvp = $wpdb->get_results("SHOW TABLES LIKE '" . $rsvpTable . "'",OBJECT);
	$getAllUsers = $wpdb->get_results("SELECT ID FROM `" . $wpdb->prefix . "users`",OBJECT);
	//print_r($getAllUsers);

	if(sizeof($checkRsvp) < 1){
		//getVersion
		/*if(get_option($rsvpDbVersion,0)===false){
			add_option($rsvpDbVersion,0);
		}*/
		$createTableSql = "CREATE TABLE " . $rsvpTable . "
		(
		P_Id int NOT NULL AUTO_INCREMENT,
		UserId int NOT NULL,
		Attending int NOT NULL,
		Vegetarian int NOT NULL,
		ParkingCar int NOT NULL,
		DayGuest int NOT NULL,
		Notes varchar(255),
		parentId int DEFAULT 0,
		IsChild int DEFAULT 0,
		IsBaby int DEFAULT 0,
		PRIMARY KEY (P_Id)
		)";
		$wpdb->query($createTableSql);
		//add_option($rsvpDbVersion,1);
	}
	//add new users with default options to table
	foreach ($getAllUsers as $user) {
		$tmpUser = $wpdb->get_results(
			"SELECT UserId 
			FROM `" . $rsvpTable . "` 
			WHERE UserId=" . $user->ID,OBJECT);
		if(sizeof($tmpUser) < 1){
			$wpdb->insert(
				$rsvpTable,
				array(
					'UserId' => $user->ID
					,'Attending' => 0
					,'Vegetarian' => 0
					,'ParkingCar' => 0
					,'DayGuest' => 3
					,'parentId' => 0
					,'Notes' => ''
				)
			);
		}
	}
?>