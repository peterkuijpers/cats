<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<form method="POST" action="cc_add_item.php">
	<table id="cc_item_form">
		<tr>
			<td>Description</td><td><input type="text" name="description"></td>
		</tr>
		<tr>
			<td>Action by</td>
			<td><select name="ownerId">
					<?php include "selectUsers.php" ?>
			</select></td>
		</tr>
		<tr>
			<td>Due date</td><td><?php MyDate::selection('dueDate', time() )  ?></td>
			<td>Complete date </td><td><?php MyDate::selection( 'completionDate' )  ?></td>
		</tr>
		<tr>
			<input type="hidden" name="SUBMIT" value="true">
			<td></td><td><br><input type="submit" value="Add"></td>
		</tr>
	</table>
</form>