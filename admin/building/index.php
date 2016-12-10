<?php
include '../../inc/building.php';

$bldg = new Building;
$bldg->isloggedin();   

echo "<pre>";
$bdata = $bldg->get_bldg();
?>
<a href="<?php echo $bldg->base_url().'admin'; ?>">Dashboard</a>
<a href="<?php echo $bldg->base_url().'admin/building/add.php'; ?>">Add Building</a>
<table border="1">
<tr>
	<th>Building Name</th>
	<th>Longitude</th>
	<th>Latitude</th>
	<th>Action</th>
</tr>
<?php

foreach ($bdata as $key => $value) {
	echo "<tr>
		<td>".$value['bldg_name']."</td>
		<td>".$value['bldg_long']."</td>
		<td>".$value['bldg_lat']."</td>	
		<td><a href='edit.php?id=".$value['bldg_id']."'>Edit</a>
			<a href='delete.php?id=".$value['bldg_id']."'>Delete</a>
		</td>	
	</tr>";
}
?>
</table>

This is the building INDEX!