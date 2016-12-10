<?php
include '../../inc/building.php';

$id = $_GET['id'];
$bldg = new Building;
$bldg->isloggedin();
  $res = $bldg->delete_bldg($id);
  if ($res) {
    echo "Successfully deleted!</br></br>";
    header('location: index.php');
  }else{
    echo "Fail to delete building!</br></br>";
  }
?>