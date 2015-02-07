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
		<legend>Anything else we should know e.g. Allergies...: </legend>
		<textarea name="notes" form="rsvpEdit"><?php echo $notes; ?></textarea>
	</fieldset>
	<input type="submit" value="Submit">
</form>
<?php if($hasChildren){ ?>
<p>
	If you are coming with a partner or family members please fill in their RSVP too!
</p>
<?php } ;?>
<p>
	Any other questions drop either of us a line:  <a href="mailto:aaronaldo99@gmail.com">Aaron</a>, <a href="mailto:helen.spence@hotmail.com">Helen</a>.
</p>
<?php
	//leave edit mode
	echo "<a href='" . get_permalink() . "?edit_rsvp=false'>Back to your selections?</a>";
?>