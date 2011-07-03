<div id="page_title">Non-Compliance list</div>
<hr>
<table id="list_table">
	<tr>
		<th>Nbr</th>
		<th>Raised by</th>
		<th>Date raised</th>
		<th>Status</th>
		<th>Issued to</th>
		<th>Source</th>
		<th>Category</th>
		<th>Type</th>
		<th>Qty</th>
	</tr>

	<?php
	$ncs = Db::readNonCompliances();

	foreach ( $ncs as $nc ) {
		echo "<tr>";
		$id=$nc->getNcId();
		echo "<td id='test'><a href='nc_detail.php?id=$id'>$id</a></td>";
		echo "<td>".Db::readUserById( $nc->getInitiatorId() )->getShortUserName()."</td>";
		echo "<td>".$nc->getInitDate()."</td>";
		echo "<td>".Db::readStatus( $nc->getStatusId() )->getName()."</td>";
		echo "<td>".Db::readUserById( $nc->getFocalId() )->getShortUserName()."</td>";
		echo "<td></td>";
		echo "<td>".Db::readCategory( $nc->getCategoryId())->getName()."</td>";
		echo "<td>".Db::readNcType( $nc->getTypeId() )->getName()."</td>";
		echo "<td>".$nc->getQty()."</td>";
		echo "</tr>";

	}

	?>
</table>
