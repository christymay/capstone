<?php
include '../../inc/users.php';

$user = new Users;
$user->isloggedin();   

echo "<pre>";
$userdata = $user->get_users();
?>
<a href="<?php echo $user->base_url().'admin'; ?>">Dashboard</a>
<a href="<?php echo $user->base_url().'admin/user/add.php'; ?>">Add User</a>
<table border="1">
<tr>
	<th>Name</th>
	<th>Email</th>
	<th>Contact Number</th>
	<th>User Type</th>
	<th>Action</th>
</tr>
<?php

foreach ($userdata as $key => $value) {
	$typename = $user->usertype_name($value['type']);
	echo "<tr>
		<td>".$value['lname'].", ".$value['fname']." ".$value['mname']."</td>
		<td>".$value['email_address']."</td>
		<td>".$value['cont_no']."</td>	
		<td>".$typename."</td>	
		<td><a href='edit.php?id=".$value['user_id']."'>Edit</a>
			<a href='delete.php?id=".$value['user_id']."'>Delete</a>
		</td>	
	</tr>";
}
?>
</table>

This is the building INDEX!