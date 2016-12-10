<?php
require_once('foodex.php');
/**
* 
*/
class Building extends Foodex
{

	function get_bldg_by_id($id){
		$this->dbconnect();

		$sql = "Select * FROM building WHERE bldg_id = {$id}";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute();
		$cou = $stmt->rowCount();
		$result = $stmt->fetch();

		$dbh = '';
		return $result;	

	}

	function get_bldg(){
		$this->dbconnect();

		$sql = "Select * FROM building";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute();
		$cou = $stmt->rowCount();
		$result = $stmt->fetchAll();

		$dbh = '';
		return $result;	

	}

	function insert_building($data){
		/* Foreach Interval */
		$this->dbconnect();
		foreach ($data['building'] as $key => $value) {
			$fieldsarr[] = $key;
			$valuesarr[] = $value;
		}
		$fields = implode(',', $fieldsarr);
		$values = implode("','", $valuesarr);
		$sql = "INSERT into building ($fields) values ('$values')";
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

	function update_building($data,$id){
		/* Foreach Interval */
		$this->dbconnect();
		foreach ($data['building'] as $key => $value) {
			$setarr[] = $key."='".$value."'";
		}
		$sets = implode(',', $setarr);
		$sql = "UPDATE building SET {$sets} WHERE bldg_id={$id}";
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

	function delete_bldg($id){
		$this->dbconnect();

		$sql = "DELETE FROM building WHERE bldg_id={$id};";
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