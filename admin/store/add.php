<?php
include '../../inc/store.php';

//$user = new Users;
//$user->isloggedin();

$store = new Store;
if (isset($_POST['addstore'])) {
  $res = $store->insert_store($_POST);
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
	<label>Store Name:</label>
	<input type="text" class="form-control" name="store[store_name]" placeholder="Store Name" required>

	<label>Store Location:</label>
	<input type="text" class="form-control" name="store[store_location]" placeholder="Store Location" required>



	<input type="submit" name="addstore" value="Add">
</form>
<a href="<?php echo $store->base_url().'admin/store'; ?>">View Stores</a>

</body>
</html>