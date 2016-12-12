<?php
require_once('foodex.php');
/**
* 
*/
class Store extends Foodex
{

	function get_store(){
		$this->dbconnect();

		$sql = "Select * FROM store";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute();
		$cou = $stmt->rowCount();
		$result = $stmt->fetchAll();

		$dbh = '';
		return $result;	

	}

	function insert_store($data){
		/* Foreach Interval */
		$this->dbconnect();
		foreach ($data['store'] as $key => $value) {
			$fieldsarr[] = $key;
			$valuesarr[] = addslashes($value);
		}
		$fields = implode(',', $fieldsarr);
		$values = implode("','", $valuesarr);
		$sql = "INSERT into store ($fields) values ('$values')";
		echo $sql;
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

	function update_store($data,$id){
		/* Foreach Interval */
		$this->dbconnect();
		foreach ($data['store'] as $key => $value) {
			$setarr[] = $key."='".addslashes($value)."'";
		}
		$sets = implode(',', $setarr);
		$sql = "UPDATE store SET {$sets} WHERE store_id={$id}";
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

	function delete_store($id){
		$this->dbconnect();

		$sql = "DELETE FROM store WHERE store_id={$id};";
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

	function get_store_by_id($id){
		$this->dbconnect();

		$sql = "Select * FROM store WHERE store_id = {$id}";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute();
		$cou = $stmt->rowCount();
		$result = $stmt->fetch();

		$dbh = '';
		return $result;	

	}

}

?>