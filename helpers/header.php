<!-- header -->

<table id="header" width="100%">
	<tr>
		<td>
			<h1>RQTS - CATS System</h1>
		</td>
		<td>
		<?php 	
			if ( isset($_SESSION['ncId'])) {
				$ncId= $_SESSION['ncId'];
				$nc = Db::readNonCompliance($ncId);
				$statName = Db::readStatus($nc->getStatusId() )->getName();
			
				echo "NC id: $ncId,  Status: $statName<br>";
				echo $nc->getSummary();
				
			}
			?>
		</td>
	</tr>
</table>
<!-- end of header -->
