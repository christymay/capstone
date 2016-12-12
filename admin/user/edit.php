<?php
include '../../inc/users.php';

$user = new Users;
$user->isloggedin(); 

$id = $_GET['id'];
$udata = $user->get_user_by_id($id);
if (isset($_POST['edituser'])) {
	$res = $user->update_user($_POST,$id);
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
	<title>Update User</title>
</head>
<body>
<form method="post">

	<label>Firstname:</label>
	<input type="text" class="form-control" name="user[fname]" placeholder="Firstname" value="<?php echo $udata['fname']?>" required><br>

	<label>Middlename:</label>
	<input type="text" class="form-control" name="user[mname]" placeholder="Middlename" value="<?php echo $udata['mname']?>" required><br>
	
	<label>Lastname:</label>
	<input type="text" class="form-control" name="user[lname]" placeholder="Lastname" value="<?php echo $udata['lname']?>" required><br>
	
	<label>Email:</label>
	<input type="email" class="form-control" name="user[email_address]" placeholder="Email" value="<?php echo $udata['email_address']?>" required><br>
	
	<label>Contact Number:</label>
	<input type="text" class="form-control" name="user[cont_no]" placeholder="Contact Number" value="<?php echo $udata['cont_no']?>" required><br>

	<label>User type:</label>
	<select class="form-control" name="user[type]" required>

		<?php
			$types = $user->usertypes();
			var_dump($user);
			foreach ($types as $key => $value) {
				if ($key == $udata['type']) {
					echo "<option value='".$key."' selected>".$value."</option>";
				}else{
					echo "<option value='".$key."'>".$value."</option>";
				}
			}
		?>
	</select>

	<input type="submit" name="edituser" value="Update">
</form>
<a href="<?php echo $user->base_url().'admin/user'; ?>">View Users</a>

</body>
</html>