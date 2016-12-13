<?php
include '../../inc/products.php';

$prod = new Products;
$prod->isloggedin();
$id = $_GET['id'];
  $res = $prod->delete_product($id);
  if ($res) {
    echo "Successfully deleted!</br></br>";
    header('location: index.php');
  }else{
    echo "Fail to delete building!</br></br>";
  }
?>