<?php
include '../../inc/store.php';

$store = new Store;
$store->isloggedin();
$id = $_GET['id'];
  $res = $store->delete_store($id);
  if ($res) {
    echo "Successfully deleted!</br></br>";
    header('location: index.php');
  }else{
    echo "Fail to delete building!</br></br>";
  }
?>