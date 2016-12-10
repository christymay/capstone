<?php
require_once('foodex.php');
/**
* 
*/
class Users extends Foodex
{

 	function insert_user($data){
 		/* Foreach Interval */
 		$this->dbconnect();
 		foreach ($data['user'] as $key => $value) {
 			$fieldsarr[] = $key;
 			if ($key == 'password') {
 				$valuesarr[] = md5($value);
 			}else{
 				$valuesarr[] = $value;
 			}
 		}
 		$fields = implode(',', $fieldsarr);
 		$values = implode("','", $valuesarr);
 		$sql = "INSERT into users ($fields) values ('$values')";
 		try{
 			$stmt = $this->dbh->prepare($sql);
 			if ($stmt->execute()) {
 				$result = true;
 			}else{
 				$result = false; 
 			}
 		}catch(PDOException $e){
 			die($e->getMessage()." - Error Executing");
 		}
 		$this->dbh = "";
 		return $result;
 	}

}
?>