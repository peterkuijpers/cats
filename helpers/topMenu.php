<?php
if ( $logged_in ) {
	echo <<<LIST
<ul>

	<li><a href="index.php">NC list</a></li>
	<li><a href="nc_detail.php">NC details</a></li>
	<li><a href="cc_plan.php">C & C</a></li>
</ul>
LIST;
}
