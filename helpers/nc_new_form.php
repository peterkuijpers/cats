<form method="POST" action="nc_new.php" enctype="multipart/form-data">

<table border="1">
	<tr> <!-- section 1 -->
		<td>
	<table border="0">
		<tr>
			<td>Raised by</td><td><input type="text"  disabled value="<?php echo $user->getShortUserName(); ?>"></td>
			<td>Dept issued</td><td><input type="text"  name="raisedBy"></td>
			<td>Category</td><td><select name="category"><?php include "selectCategory.php" ?></select></td>
		</tr>
		<tr>
			<td>Date raised</td><td><?php include "dateSelect.php" ?></td>
			<td>Source</td><td><input type="text" ></td>
			<td>Type</td><td><select name="typeId"><?php include 'selectTypes.php' ?></select></td>
		</tr>
		<tr>
			<td>Issued to</td><td><select name="focal"><?php include "selectUsers.php"; ?></select></td>
			<td>Dept issued to</td><td><input type="text" name="raisedBy"></td>
			<td>Qty</td><td><input name="qty" type="text"  size="8" value="0"></td>
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
			<td width="50px">Summary</td><td width="100%"><input type="text" name="summary" size="80"></td>
		</tr>
		<tr><td colspan="2">Details</td></tr>
		<tr><td colspan="2" width="100%"><textarea name="details" rows="3" cols="85"></textarea></td></tr>
	</table>
	</td></tr>
	<tr>
		<td>
		<label for="file">Attach file:</label>
		<input type="file" name="file" id="file" />

		</td>
	</tr>

</table>
<br>
<input type="hidden" name="__SUBMIT__" value="true">
		
<input type="submit" value="Create">
</form>
<br>

