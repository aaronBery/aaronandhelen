<h3>Choose your selection for <?php echo $rsvpName; ?></h3>
<form action="" method="post" id="rsvpEdit">
	<fieldset>
		<legend>Attending: </legend>
		<input type="radio" value="Yes" name="attending"<?php echo $attendingYesCheckedStr; ?>>Yes
		<input type="radio" value="No" name="attending"<?php echo $attendingNoCheckedStr; ?>>No
	</fieldset>
	<fieldset>
		<legend>Vegetarian: </legend>
		<input type="radio" value="Yes" name="vegetarian"<?php echo $vegYesCheckedStr; ?>>Yes
		<input type="radio" value="No" name="vegetarian"<?php echo $vegNoCheckedStr; ?>>No
	</fieldset>
	<fieldset>
		<legend>Are you bringing a car? (only the driver select yes): </legend>
		<input type="radio" value="Yes" name="parkingcar"<?php echo $parkingCarYesCheckedStr; ?>>Yes
		<input type="radio" value="No" name="parkingcar"<?php echo $parkingCarNoCheckedStr; ?>>No
	</fieldset>
	<fieldset>
		<legend>Anything else we should know e.g. Veggie, allergies etc.</legend>
		<textarea name="notes" form="rsvpEdit"><?php echo $notes; ?></textarea>
	</fieldset>
	<input type="submit" value="Submit">
</form>
<?php if($hasChildren){ ?>
<p>
	If you are coming with a partner or family, you can fill in their RSVP too
</p>
<?php } ;?>
<p>
	If you have any other questions, drop us a line on 0208 767 4258 or email either of us on <a href="mailto:aaronaldo99@gmail.com">aaronaldo99@gmail.com</a>, <a href="mailto:helen.spence@hotmail.com">helen.spence@hotmail.com</a>.
</p>
<?php
	//leave edit mode
	echo "<a href='" . get_permalink() . "?edit_rsvp=false'>Back to your selections</a>";
?>