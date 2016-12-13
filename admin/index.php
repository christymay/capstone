<?php
include '../inc/users.php';

$user = new Users;
$user->isloggedin();
$theuser = $user->current_user();

?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<p>Hi, <?php echo $theuser['fname']; ?>!</p>
<p>Welcome to your Dashboard!</p>
<a href="<?php echo $user->base_url().'admin/building'; ?>">Buildings</a><br>
<a href="<?php echo $user->base_url().'admin/store'; ?>">Stores</a><br>
<a href="<?php echo $user->base_url().'admin/user'; ?>">Users</a><br>
<a href="<?php echo $user->base_url().'admin/products'; ?>">Products</a><br>

<br><br>
<a href="<?php echo $user->base_url().'logout.php'; ?>">Logout</a><br>

</body>
</html>


