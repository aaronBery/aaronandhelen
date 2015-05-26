<?php
/**
Template Name: UpdateEmail
 */
global $wpdb;
$rsvpTable = $wpdb->prefix . "rsvp";
$sql = $wpdb->get_results(
	"SELECT 
	r.P_Id as P_Id,
	r.UserId as UserId,
	r.Attending as Attending,
	r.Vegetarian as Vegetarian,
	r.ParkingCar as ParkingCar,
	r.DayGuest as DayGuest,
	r.parentId as parentId,
	r.Notes as Notes,
	r.received_1month as received_1month,
	u.user_email as email,
	u.display_name as display_name
	FROM " . $rsvpTable . " AS r 
	LEFT JOIN " . $wpdb->prefix . "users AS u 
	ON r.UserId = u.ID
	WHERE user_email NOT LIKE '%aaronandhelen.com%'
	AND Attending=1
	AND received_1month=0"
	,OBJECT
);
$attendeesList = "";
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

foreach ($sql as $key => $value) {
	$emailContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	    <head>
	        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	        <title>Aaron & Helen\'s Wedding - Less than a month to go!</title>
	    </head>
	    <body style="color:#000; font-size: 0.8em; font-family: arial; margin-top: 0">
	    <table align="center" border="0" cellpadding="0" cellspacing="0" width="349" style="width: 349px; margin-top: 0">
	        <tr>
	            <td width="349" height="149" background="http://aaronandhelen.com/wp-content/themes/boho/images/invitation-watercolorfloral-big.jpg" style="background: url(http://aaronandhelen.com/wp-content/themes/boho/images/invitation-watercolorfloral-big.jpg)">
	            </td>
	        </tr>
	        <tr>
	            <td width="300"  style="width: 300px" align="center" valign="top">

	                <p style="color: #000; line-height: 1.3">
	                    Hi ' . $value->display_name . ',
					</p>
					<p>
	                	It\'s less than a month to go until our wedding day and we are delighted you are coming.
	                </p>
	                <p>
						We have now put the photos from our <a href="//aaronandhelen.com/engagement-shoot/" title="Engagement shoot gallery">engagement shoot</a> on our website so please feel free to take a peek
	                </p>
	                <p>
						If you haven\'t already done so (and you\'re not driving home) it is advisable to book your <a href="//aaronandhelen.com/accomodation/" title="Accomodation Listings">accomodation</a> for the night and arrange your <a href="//aaronandhelen.com/venue/" title="Taxi Numbers">taxi</a> in advance. The venue is in a remote location and due to availability booking can be very difficult on the night. We don\'t want anyone to get stranded!
	                </p>
					<p>
						We have also recently upgraded our website to work on a mobile, so you can now double check all the vital information on the day if you wish!
					</p>
					<p>
						See you there!<br />
						Lots of Love<br />
						Aaron &amp; Helen<br />
						xx
					</p>
	            </td>
	        </tr>
	        <tr>
	            <td width="349" height="20">
	            </td>
	        </tr>
	        <tr>
	            <td width="349" height="59" background="http://aaronandhelen.com/wp-content/themes/boho/images/goldchevron.jpg" style="background: url(http://aaronandhelen.com/wp-content/themes/boho/images/goldchevron.jpg)">
	            </td>
	        </tr>
	    </table>
	    </body>
	</html>';


	$attendeesList .= $value->display_name . "<br />";
	wp_mail($value->email,"Helen and Aaron - Less than a month to go!",$emailContent,$headers);
	$wpdb->update(
		$rsvpTable
		,array(
			'received_1month' => 1
		)
		,array(
			'UserId' => $value->UserId
		)
	);
}
echo $emailContent;
echo $attendeesList;
?>