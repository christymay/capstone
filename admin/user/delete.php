<?php
include '../../inc/users.php';

$user = new Users;
$user->isloggedin();
$id = $_GET['id'];
  $res = $user->delete_user($id);
  if ($res) {
    echo "Successfully deleted!</br></br>";
    header('location: index.php');
  }else{
    echo "Fail to delete building!</br></br>";
  }
?>