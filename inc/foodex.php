<?php
session_start();
require_once('dbconfig.php');
/**
* 
*/
class Foodex 
{	
	public $dbh;

	function dbconnect(){
		try {
			$this->dbh = new PDO('mysql:host=' . DB_HOST . ';dbname='. DB_NAME, DB_USER, DB_PASS);
		} catch (PDOException $e) {
			exit('fail connect db : '.$e->getMessage());
		}
	}

	function base_url(){
		return "http://".$_SERVER['SERVER_NAME']."/capstone/";
	}

	function usertype_redirect($usertype,$location = ''){
		if (isset($usertype)) {
			$base = $this->base_url();
			switch ($usertype) {
				case 1:
					$url = $base."admin";
					break;
				case 2:
					$url = $base."owner";
					break;
				case 3:
					$url = $base."staff";
					break;
				case 4:
					$url = $base."customer";
					break;
				case 5:
					$url = $base."customer";
					break;
				default:
					$url = $base;
					break;
			}

			header('location:'.$url.'/'.$location);
		}
	}

	function redirect($location){
		$base = $this->base_url();
		header('location:'.$base.''.$location);
	}

	function isloggedin(){
		if (!isset($_SESSION['isloggedin'])) {
			$this->redirect('login.php');
		}
	}

	function set_user_authentication($auth){
		if ($auth) {
			$_SESSION['isloggedin'] = $auth['user_id'];
		}
	}

	function current_user(){
		if (isset($_SESSION['isloggedin'])) {
 			$this->dbconnect;

 			$id = $_SESSION['isloggedin'];
 			$sql = "Select * FROM users WHERE user_id = {$id}";
	 		$stmt = $this->dbh->prepare($sql);
	 		$stmt->execute();
	 		$cou = $stmt->rowCount();
	 		if($cou == 1){
	 			$result = $stmt->fetch();
	 		}
	 		else{
	 			$result = null;
	 		}
	 		
	 		$dbh = '';
	 		return $result;	
		}
	}

 	function login($login){
 		$this->dbconnect();

 		$username = $this->dbh->quote($login['username']);
 		$password = md5($login['password']);
 		$password = $this->dbh->quote($password);

 		$sql = "Select * FROM users WHERE username = {$username} AND password = {$password}";
 		$stmt = $this->dbh->prepare($sql);
 		$stmt->execute();
 		$cou = $stmt->rowCount();
 		if($cou == 1){
 			$result = $stmt->fetch();
 			$this->set_user_authentication($result);
 		}
 		else{
 			$result = null;
 		}
 		
 		$dbh = '';
 		return $result;	

 	}
}
?>