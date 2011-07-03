<?php
	/**
	 * requires $ncId and $user on start
	 */

	$userIsFocal;
	if ( $user->getUserId() == $nc->getFocalId() )
			$userIsFocal = true;
?>

<table border="1" id="list_table">
	<tr>
		<th>item</th>
		<th>Description</th>
		<th>Action by</th>
		<th>Due date</th>
		<th>Complete date</th>
	</tr>
	<tr>
	<?php
		$items = Db::readCcItems($ncId);
		$cnt=1;
		foreach ( $items as $item ) {
			echo "<tr>";
			echo "<td>$cnt</td>";
			echo "<td>".$item->getDescription()."</td>";
			echo "<td>".Db::readUserById($item->getOwnerId() )->getShortUserName()."</td>";
			echo "<td>".$item->getDueDate()."</td>";
			echo "<td>".$item->getCompletionDate()."</td>";
			if ( $userIsFocal ) {
				echo "<td><a href='cc_item_update.php?id=.$ncId'>Update</a></td>";
				echo "<td><a href='delete_item.php?id=".$item->getId()."' onClick='return confirm_delete( $cnt )'>Delete</a></td>";
			}
			echo "</tr>";
			$cnt++;
		}
		
	?>
	</tr>
</table>
<?php
echo "<br>";
// if current user is focal for this nc then he can add items to this nc
if ( $userIsFocal ) {
	echo "<a href='cc_add_item.php'>Add item</a>";
	echo "<br>";
}
?>


