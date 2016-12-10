<?php
//include '../../inc/users.php';
include '../../inc/store.php';

//$user = new Users;
//$user->isloggedin();
$id = $_GET['id'];
$store = new Store;
  $res = $store->delete_store($id);
  if ($res) {
    echo "Successfully deleted!</br></br>";
    header('location: index.php');
  }else{
    echo "Fail to delete building!</br></br>";
  }
?>