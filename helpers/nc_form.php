<?php
/**
 * requires $nc
 */
?>
<table border="1">
	<tr> <!-- section 1 -->
		<td>
	<table border="0">
		<tr>
			<td>Id</td><td><input type="text" value="<?php echo $nc->getNcId() ?>"</td>
			<td>Status</td><td><input  type="text" value="<?php echo Db::readStatus( $nc->getStatusId() )->getName(); ?>"</td>
			<td></td><td></td>
		</tr>
		<tr>
			<td>Raised by</td><td><input type="text"  value="<?php echo Db::readUserById( $nc->getInitiatorId() )->getShortUserName(); ?>"></td>
			<td>Dept issued</td><td><input type="text"  name="raisedBy"></td>
			<td>Category</td><td><input type="text"  value="<?php echo Db::readCategory( $nc->getCategoryId())->getName(); ?>"></td>
		</tr>
		<tr>
			<td>Date raised</td><td><input type="text"  size="10" value="<?php echo $nc->getInitDate() ?>"></td>
			<td>Source</td><td><input type="text" ></td>
			<td>Type</td><td><input type="text" name="typeId" value="<?php echo Db::readNcType( $nc->getTypeId() )->getName(); ?>"></td>
		</tr>
		<tr>
			<td>Issued to</td><td><input type="text" value="<?php echo Db::readUserById( $nc->getFocalId() )->getShortUserName(); ?>"></td>
			<td>Dept issued to</td><td><input type="text" name="raisedBy"></td>
			<td>Qty</td><td><input type="text"  value="<?php echo $nc->getQty() ?>"></td>
		</tr>
	</table></td>
	</tr>
	<tr> <!-- section 2 -->
	<td><table width="100%" border="0">
		<tr>
			<td>Purchase order</td><td><input type="text"></td><td>Supplier Id</td><td><input type="text"></td>
		</tr>
		<tr>
			<td>Work order</td><td><input type="text"></td><td>Supplier Name</td><td><input type="text"></td>
		</tr>
		<tr>
			<td>Lot/Batch No</td><td><input type="text"></td><td>Supplier Contact</td><td><input type="text"></td>
		</tr>
		<tr>
			<td>Order Qty</td><td><input type="text"></td><td>Project Name</td><td><input type="text"></td>
		</tr>
		<tr>
			<td>Project Name</td><td><input type="text"></td><td>Company Buyer</td><td><input type="text"></td>
		</tr>
	</table></td>
	</tr>
	<tr><td> <!-- section 3 -->
	<table width="100%" border="0">
		<tr>
			<td width="50px">Summary</td><td width="100%"><input type="text" size="80" value="<?php echo $nc->getSummary() ?> "></td>
		</tr>
		<tr><td colspan="2">Details</td></tr>
		<tr><td colspan="2" width="100%"><textarea rows="5" cols="80"><?php echo $nc->getDetails() ?></textarea></td></tr>
	</table>
	</td></tr>

</table>

