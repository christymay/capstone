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
<a href="<?php echo $user->base_url().'admin/building'; ?>">Building</a><br>
<a href="<?php echo $user->base_url().'admin/store'; ?>">Store</a><br>


</body>
</html>


