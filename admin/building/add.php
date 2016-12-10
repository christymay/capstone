<?php
include '../../inc/building.php';

$bldg = new Building;
$bldg->isloggedin();
if (isset($_POST['addbldg'])) {
  $res = $bldg->insert_building($_POST);
  if ($res) {
    echo "Successfully added!</br></br>";
  }else{
    echo "Fail to add user!</br></br>";
  }
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Building</title>
</head>
<body>
<form method="post">
	<label>Building Name:</label>
	<input type="text" class="form-control" name="building[bldg_name]" placeholder="Building Name" required>

	<label>Longitude:</label>
	<input type="text" class="form-control" name="building[bldg_long]" placeholder="Building Longitude" required>

	<label>Latitude:</label>
	<input type="text" class="form-control" name="building[bldg_lat]" placeholder="Building Latitude" required>


	<input type="submit" name="addbldg" value="Add">
</form>
<a href="<?php echo $bldg->base_url().'admin/building'; ?>">View Buildings</a>

</body>
</html>