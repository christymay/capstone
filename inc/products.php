<?php
require_once('foodex.php');
/**
* 
*/
class Products extends Foodex
{

	function get_products(){
		$this->dbconnect();

		$sql = "Select * FROM product";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute();
		$cou = $stmt->rowCount();
		$result = $stmt->fetchAll();

		$dbh = '';
		return $result;	
	}

	function insert_product($data){
		/* Foreach Interval */
		$this->dbconnect();
		foreach ($data['product'] as $key => $value) {
			$fieldsarr[] = $key;
			$valuesarr[] = addslashes($value);
		}
		$fields = implode(',', $fieldsarr);
		$values = implode("','", $valuesarr);
		$sql = "INSERT into product ($fields) values ('$values')";
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

	function update_product($data,$id){
		/* Foreach Interval */
		$this->dbconnect();
		foreach ($data['product'] as $key => $value) {
			$setarr[] = $key."='".addslashes($value)."'";
		}
		$sets = implode(',', $setarr);
		$sql = "UPDATE product SET {$sets} WHERE product_id={$id}";
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

	function delete_product($id){
		$this->dbconnect();

		$sql = "DELETE FROM product WHERE product_id={$id};";
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

	function get_product_by_id($id){
		$this->dbconnect();

		$sql = "Select * FROM product WHERE product_id = {$id}";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute();
		$cou = $stmt->rowCount();
		$result = $stmt->fetch();

		$dbh = '';
		return $result;	

	}

}

?>