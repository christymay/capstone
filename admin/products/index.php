<?php
include '../../inc/products.php';
include '../../inc/store.php';

$prod = new Products;
$store = new Store;
$prod->isloggedin();   

echo "<pre>";
$proddata = $prod->get_products();
?>
<a href="<?php echo $prod->base_url().'admin'; ?>">Dashboard</a>
<a href="<?php echo $prod->base_url().'admin/products/add.php'; ?>">Add Product</a>
<table border="1">
<tr>
	<th>Name</th>
	<th>Price</th>
	<th>Quantity</th>
	<th>Store</th>
	<th>Action</th>
</tr>
<?php

foreach ($proddata as $key => $value) {
	$storename = $store->get_store_by_id($value['store_id']);
	echo "<tr>
		<td>".$value['prod_name']."</td>
		<td>".$value['prod_price']."</td>
		<td>".$value['prod_qty']."</td>	
		<td>".$storename['store_name']."</td>	
		<td><a href='edit.php?id=".$value['product_id']."'>Edit</a>
			<a href='delete.php?id=".$value['product_id']."'>Delete</a>
		</td>	
	</tr>";
}
?>
</table>

This is the PRODUCTS INDEX!