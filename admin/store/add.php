<?php
include '../../inc/store.php';
include '../../inc/building.php';


$store = new Store;
$bldg = new Building;
$bldg->isloggedin();
if (isset($_POST['addstore'])) {
  $res = $store->insert_store($_POST);
  if ($res) {
    echo "Successfully added!</br></br>";
  }else{
    echo "Fail to add store!</br></br>";
  }
}

$user = $store->current_user();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Add Building</title>
</head>
<body>
<form method="post">

	<label>Store Name:</label>
	<input type="text" class="form-control" name="store[store_name]" placeholder="Store Name" required><br>

	<label>Store Location:</label>
	<input type="text" class="form-control" name="store[store_location]" placeholder="Store Location" required><br>

	<label>User type:</label>
	<select class="form-control" name="store[bldg_id]" required>
	<option value="0">-Select building-</option>
	<?php
		$building = $bldg->get_bldg();
		var_dump($building);
		foreach ($building as $b) {
			echo "<option value='".$b['bldg_id']."'>".$b['bldg_name']."</option>";
		}
	?>
	</select><br>
	<input type="hidden" name="store[user_id]" value="<?php echo $user['user_id']; ?>">


	<input type="submit" name="addstore" value="Add">
</form>
<a href="<?php echo $store->base_url().'admin/store'; ?>">View Stores</a>

</body>
</html>