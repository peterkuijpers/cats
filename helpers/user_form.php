<form method="POST" action="users.php">
<table>
	<tr>
		<td>First name</td><td style="color:red;">*</td><td><input type="text" name="firstName"></td>
	</tr>
	<tr>
		<td>Last name</td><td style="color:red;">*</td><td><input type="text" name="lastName"></td>
	</tr>
	<tr>
		<td>User name</td><td style="color:red;">*</td><td><input type="text" name="userName"></td>
	</tr>
	<tr>
		<td>Password</td><td style="color:red;">*</td><td><input type="password" name="password"></td>
	</tr>
	<tr>
		<td>email</td><td style="color:red;">*</td><td><input type="text" name="email" size="50"></td>
	</tr>
	<tr>
		<td>Initiator</td><td></td><td><input type="checkbox" name="initiator" value="1"></td>
	</tr>
	<tr>
		<td>Focal</td><td></td><td><input type="checkbox" name="focal" value="1"></td>
	</tr>
	<tr>
		<td>Quality Accessor</td><td></td><td><input type="checkbox" name="qa" value="1"></td>
	</tr>
	<tr>
		<td>Administrator</td><td></td><td><input type="checkbox" name="admin" value="1"></td>
	</tr>

</table>
	<br>
	<input type="hidden" name="_ADDUSER_" value="true">
	<input type="submit" value="Add">
</form>
<br>
<a href="users.php">Back</a>
<br>
<br>