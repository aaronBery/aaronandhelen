<?php
/**
Template Name: angular feed
*/

	$angularApp = 'ng-app="rsvpApp"';
	include "header.php";
?>
<style>
	#main {
		margin-top: 2em;
	}
	input{
		color: #666;
	}
</style>
<div ng-controller="rsvpController">
	<form name="listingOptions">
		<input type="text" ng-model="search" />
		<input type="checkbox" value="reverse" ng-model="reverseNamesOrder">Reverse Names Order
		<input type="checkbox" value="reverse" ng-click="reverseAttendingOrder">Reverse Attending Order
	</form>
	<table>
		<tr>
			<th>Name</th>
			<th>Day Guest</th>
			<th>Attending</th>
			<th>Vegetarian</th>
			<th>Parking Car</th>
			<th>Notes</th>
			<th>Is Child</th>
			<th>Is Baby</th>
		</tr>
		<tr ng-repeat="x in xhrData | filter:search | orderBy:'display_name':reverseNamesOrder">
			<td>{{ x.display_name }}</td>
			<td>{{ x.DayGuest }}</td>
			<td>{{ x.Attending }}</td>
			<td>{{ x.Vegetarian }}</td>
			<td>{{ x.ParkingCar }}</td>
			<td>{{ x.Notes }}</td>
			<td>{{ x.isChild }}</td>
			<td>{{ x.isBaby }}</td>
		</tr>
	</table>
</div>

<script>
	require(['app/allusers']);
</script>

<?php
	include "footer.php";
?>