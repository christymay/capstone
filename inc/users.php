<?php
require_once('foodex.php');
/**
* 
*/
class Users extends Foodex
{

	function get_users(){
		$this->dbconnect();

		$sql = "Select * FROM users";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute();
		$cou = $stmt->rowCount();
		$result = $stmt->fetchAll();

		$dbh = '';
		return $result;	

	}

	function get_user_by_id($id){
		$this->dbconnect();

		$sql = "Select * FROM users WHERE user_id = {$id}";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute();
		$cou = $stmt->rowCount();
		$result = $stmt->fetch();

		$dbh = '';
		return $result;	

	}

	function update_user($data,$id){
		/* Foreach Interval */
		$this->dbconnect();
		foreach ($data['user'] as $key => $value) {
			$setarr[] = $key."='".addslashes($value)."'";
		}
		$sets = implode(',', $setarr);
		$sql = "UPDATE users SET {$sets} WHERE user_id={$id}";
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

	function delete_user($id){
		$this->dbconnect();

		$sql = "DELETE FROM users WHERE user_id={$id};";
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

 	function insert_user($data){
 		/* Foreach Interval */
 		$this->dbconnect();
 		foreach ($data['user'] as $key => $value) {
 			$fieldsarr[] = $key;
 			if ($key == 'password') {
 				$valuesarr[] = md5($value);
 			}else{
 				$valuesarr[] = addslashes($value);
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