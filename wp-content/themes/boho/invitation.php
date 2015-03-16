<?php
/**
Template Name: Invite
 */
//run db scripts
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Helen's & Aaron Wedding</title>
    </head>
    <body style="color:#000; font-size: 0.8em; font-family: arial; margin-top: 0">
<?php
    global $wpdb;
    $rsvpTable = $wpdb->prefix . "rsvp";
    $userArr = [];
    $allUsers = $wpdb->get_results(
        "SELECT 
        r.P_Id as P_Id,
        r.UserId as UserId,
        r.Attending as Attending,
        r.Vegetarian as Vegetarian,
        r.DayGuest as DayGuest,
        r.parentId as parentId,
        r.Notes as Notes,
        u.display_name as display_name,
        u.user_login as username
        FROM " . $rsvpTable . " AS r 
        LEFT JOIN " . $wpdb->prefix . "users AS u 
        ON r.UserId= u.ID"
        ,OBJECT
    );
    //print_r(base64_encode('aaronaldo~99'));exit;
    if(isset($_GET['allusers'])){
        foreach($allUsers as $tmpUsrs){
            if(strlen($tmpUsrs->username))echo $tmpUsrs->username . " <a target='_blank ' href='/rsvp/invitation/?auth=" . base64_encode($tmpUsrs->username) . "'>Link to RSVP</a><br />";
        }
    }elseif(isset($_GET['auth'])){
        $encryptId = $_GET['auth'];
        $str = "c2VzZnNlZ2ZzZWdzZWdl";

        $userArr = $wpdb->get_results(
            "SELECT 
            r.P_Id as P_Id,
            r.UserId as UserId,
            r.Attending as Attending,
            r.Vegetarian as Vegetarian,
            r.DayGuest as DayGuest,
            r.parentId as parentId,
            r.Notes as Notes,
            u.display_name as display_name,
            u.user_login as username
            FROM " . $rsvpTable . " AS r 
            LEFT JOIN " . $wpdb->prefix . "users AS u 
            ON r.UserId= u.ID
            WHERE u.user_login='" . base64_decode($encryptId) . "'"
            ,OBJECT
        );
    }
    //print_r($userArr);exit;

    if(sizeof($userArr)===1){
        $username = "";
        $guestStatus = 3;
        foreach ($userArr as $usr) {
            $username = $usr->username;
            $guestStatus = $usr->DayGuest;
        }
        $guestStatusMessage = "";
        $guestWelcomeType = "";
        switch ($guestStatus) {
            case 1:
                $guestWelcomeType = "celebrate our wedding";
                $guestStatusMessage = "Please arrive no later than 1pm for the wedding ceremony.";
                break;
            case 0:
                $guestWelcomeType = "<br /> our evening wedding celebrations";
                $guestStatusMessage = "Please arrive at 7pm for the evening party. You may arrive from 6pm and enjoy the grounds with a welcome drink!";
                break;
        }
?>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="349" style="width: 349px; margin-top: 0">
        <tr>
            <td width="349" height="149" background="http://aaronandhelen.com/wp-content/themes/boho/images/invitation-watercolorfloral-big.jpg" style="background: url(http://aaronandhelen.com/wp-content/themes/boho/images/invitation-watercolorfloral-big.jpg)">
            </td>
        </tr>
        <tr>
            <td width="300"  style="width: 300px" align="center" valign="top">
                <h1 style="color: #000; margin-top: 0; font-weight: normal">Helen &amp; Aaron</h1>

                <p style="color: #000; line-height: 1.3">
                    We're getting married!
                </p>
                
                <?php 
                    if($guestStatus!=3){
                        echo '<p style="color: #000; line-height: 1.3">Together with our families, we <br/> would like to invite you to ' . $guestWelcomeType . '</p>';
                    }
                ?>

                <p style="color: #000; line-height: 1.3">
                    20th June 2015
                </p>

                <p style="color: #000; line-height: 1.3">
                    Bignor Park, Pulborough, RH20 1HG
                </p>

                <p style="color: #000; line-height: 1.3">
                    Please RSVP by the <?php echo RSVP_DATE; ?> at <a href="[login_url]" title="RSVP" style="color: #000;font-weight:normal;">aaronandhelen.com/rsvp</a> <br /> where you will also find more information about the day
                </p>

                <p style="color: #000; line-height: 1.3">
                    Please login with your username and password below
                    <br />
                    Username: <?php echo $username; ?>
                    <br />
                    <a href="/wp-login.php?action=lostpassword" title="Get password" style="font-weight: normal">Get your password</a>
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
<?php
}elseif(isset($_GET['allusers'])===false){
    echo 'Ooops somethings gone wrong. You need to be logged in to view the invitation or use the link you were sent to view. Confused drop us an email @ <a href="mailto:aaronaldo99@gmail.com?Subject=Resend%20invitation" target="_top">aaronaldo99@gmail.com</a>';
}
?>
    </body>
</html>