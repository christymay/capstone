<?php
include '../../inc/store.php';
//include '../../inc/users.php';

//$user = new Users;
$store = new store;
//$user->isloggedin();   

echo "<pre>";
$storedata = $store->get_store();
?>
<a href="<?php echo $store->base_url().'admin'; ?>">Dashboard</a>
<a href="<?php echo $store->base_url().'admin/store/add.php'; ?>">Add Store</a>
<table border="1">
<tr>
	<th>Store ID</th>
	<th>Store Name</th>
	<th>Location</th>
	
	<th>Action</th>
</tr>
<?php

foreach ($storedata as $key => $value) {
	echo "<tr>
		<td>".$value['store_id']."</td>
		<td>".$value['store_name']."</td>
		<td>".$value['store_location']."</td>	
		<td><a href='edit.php?id=".$value['store_id']."'>Edit</a>
			<a href='delete.php?id=".$value['store_id']."'>Delete</a>
		</td>	
	</tr>";
}
?>
</table>

This is the building INDEX!