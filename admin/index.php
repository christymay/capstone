<?php
include '../inc/users.php';

$user = new Users;
$user->isloggedin();

?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<p>THIS IS MY DASHBOARD!</p>
<a href="<?php echo $user->base_url().'admin/building'; ?>">Building</a><br>
<a href="<?php echo $user->base_url().'admin/store'; ?>">Store</a><br>


</body>
</html>


