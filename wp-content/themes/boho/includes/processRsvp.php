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
				'UserId' => $usrId
			)
		);
		echo "<style>form#rsvpEdit,h3{display: none;}</style>";
	}
?>