<?php
include '../../inc/store.php';
include '../../inc/building.php';


$store = new Store;
$bldg = new Building;
$store->isloggedin(); 

$id = $_GET['id'];
$sdata = $store->get_store_by_id($id);
if (isset($_POST['editstore'])) {
	$res = $store->update_store($_POST,$id);
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
	<title>Update Store</title>
</head>
<body>
<form method="post">

	<label>Store Name:</label>
	<input type="text" class="form-control" name="store[store_name]" placeholder="Store Name" value="<?php echo $sdata['store_name']?>" required><br>

	<label>Store Location:</label>
	<input type="text" class="form-control" name="store[store_location]" placeholder="Store Location" value="<?php echo $sdata['store_location']?>" required><br>
	
	<select class="form-control" name="store[bldg_id]" required>
	<option value="0">-Select building-</option>
	<?php
		$building = $bldg->get_bldg();
		var_dump($building);
		foreach ($building as $b) {
			if ($b['bldg_id'] == $sdata['bldg_id']) {
				echo "<option value='".$b['bldg_id']."' selected>".$b['bldg_name']."</option>";
			}else{
				echo "<option value='".$b['bldg_id']."'>".$b['bldg_name']."</option>";	
			}
		}
	?>
	</select><br>

	<input type="submit" name="editstore" value="Update">
</form>
<a href="<?php echo $bldg->base_url().'admin/store'; ?>">View Stores</a>

</body>
</html>