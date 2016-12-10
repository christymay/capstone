<?php
include '../../inc/users.php';
include '../../inc/store.php';

//$user = new Users;
$store = new Store;
//$user->isloggedin(); 

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
	<input type="text" class="form-control" name="store[store_name]" placeholder="Store Name" value="<?php echo $sdata['store_name']?>" required>

	<label>Store Location:</label>
	<input type="text" class="form-control" name="store[store_location]" placeholder="Store Location" value="<?php echo $sdata['store_location']?>" required>


	<input type="submit" name="editstore" value="Update">
</form>
<a href="<?php echo $bldg->base_url().'admin/store'; ?>">View Stores</a>

</body>
</html>