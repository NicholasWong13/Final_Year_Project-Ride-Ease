<?php
	if(ISSET($_POST['search'])){
		$keyword = $_POST['keyword'];
?>
<div>
	<h2>Result</h2>
	<hr style="border-top:2px dotted #ccc;"/>
	<?php
		$query = mysqli_query($conn, "SELECT * FROM `Vehicles` WHERE `VehicleTitle` LIKE '%$keyword%' ORDER BY `VehicleTitle`") or die(mysqli_error());
		while($fetch = mysqli_fetch_array($query)){
	?>
	<div style="word-wrap:break-word;">
		<a href="manage-vehicles.php?id=<?php echo $fetch['vhid']?>"><h4><?php echo $fetch['title']?></h4></a>
		<p><?php echo substr($fetch['content'], 0, 100)?>...</p>
	</div>
	<hr style="border-bottom:1px solid #ccc;"/>
	<?php
		}
	?>
</div>
<?php
	}
?>