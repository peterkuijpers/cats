Filter
<hr>
<form action="<?php echo "test.php" ?>" method="POST">
	<ul>
	<li>
	<ul>
		<li><input type="radio" name="selection" checked>All</li>
		<li><input type="radio" name="selection">My NC's</li>
		<li><input type="radio" name="selection">My Actions</li>
	</ul>
	</li>
	<li>
	<ul>
		<li>Dates:<br><input type="radio" name="date_sel" checked>All dates</li>
		<li><input type="radio" name="date_sel">Select dates</li>
		<li>From <input type="text" name="from_date" size="10"></li>
		<li>To<input type="text" name="to_date" size="10"></li>	
	</ul>
	</li>

	<li>
	<ul>
		<li>Status:<br>
			<select name="status">
			<option value="open">All</option>
			<option value="open">Draft</option>
			<option value="open">Submitted</option>
			<option value="saab">Approved</option>
			<option value="fiat">Closed</option>
			</select>
		</li>
	</ul>
	</li>
	<li>
		<ul>
			<li>Non.Comp. Nbr:</li>
			<li><input type="text" size="5"</li>
		</ul>
	</li>
	<li><input type="submit" value="Go"></li>
	</ul>
</form>