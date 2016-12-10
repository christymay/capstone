<?php
include '../../inc/building.php';

$bldg = new Building;
$bldg->isloggedin(); 

$id = $_GET['id'];
$bdata = $bldg->get_bldg_by_id($id);
if (isset($_POST['editbldg'])) {
	$res = $bldg->update_building($_POST,$id);
	if ($res) {
		echo "Successfully updated!";
		header('location: index.php');
	}else{
		echo "Updating failed!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Building</title>
</head>
<body>
<form method="post">
	<label>Building Name:</label>
	<input type="text" class="form-control" name="building[bldg_name]" placeholder="Building Name" value="<?php echo $bdata['bldg_name']?>" required>

	<label>Longitude:</label>
	<input type="text" class="form-control" name="building[bldg_long]" placeholder="Building Longitude" value="<?php echo $bdata['bldg_long']?>" required>

	<label>Latitude:</label>
	<input type="text" class="form-control" name="building[bldg_lat]" placeholder="Building Latitude" value="<?php echo $bdata['bldg_lat']?>" required>


	<input type="submit" name="editbldg" value="Update">
</form>
<a href="<?php echo $bldg->base_url().'admin/building'; ?>">View Buildings</a>

</body>
</html>