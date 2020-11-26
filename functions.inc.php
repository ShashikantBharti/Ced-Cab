<?php
session_start();
class Database {
	private $host;
	private $user;
	private $password;
	private $dbname;


	protected function connect() {
		$this->host = 'localhost';
		$this->user = 'root';
		$this->password = '';
		$this->dbname = 'citycab';

		$conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
		return $conn;
	}
}

class Query extends Database {
	public function getData($table,$fields='',$conditions='',$order_by_field='',$order_by_type='',$limit='') {
		$sql = "SELECT * FROM `$table`";
		if($fields != '') {
			$fields = "`".implode('`,`',$fields)."`";
			$sql = "SELECT $fields FROM `$table`";
		}
		if($conditions != '') {
			$sql .= " WHERE ";
			$c = count($conditions);
			$i = 1;
			foreach($conditions as $key=>$value) {
				if($c == $i) {
					$sql .= " `$key` = '$value'";
				} else {
					$sql .= " `$key` = '$value' AND";
				}
				$i++;
			}
		}
		if($order_by_field != '') {
			$sql .= " ORDER BY `$order_by_field` $order_by_type";
		}
		if($limit != '') {
			$sql .= " LIMIT  $limit";
		}
		$result = $this->connect()->query($sql);
		if ($result -> num_rows > 0) {
			$arr = array();
			while($row = $result->fetch_assoc()) {
				$arr[] = $row;
			}
			return $arr;
		} else {
			return 0;
		}

	}

	public function insertData($table, $arr=''){
		if($arr != '') {
			$fields = array();
			$values = array();
			foreach($arr as $key=>$value) {
				$fields[] = $key;				
				$values[] = $value;
			}
			$fields = "`".implode('`,`',$fields)."`";
			$values = "'".implode("','",$values)."'";
			$sql = "INSERT INTO `$table`($fields) VALUES($values)";
			$result = $this->connect()->query($sql);
			return $result;
		}
	}

	public function deleteData($table, $conditions=''){
		if($conditions != '') {
			$sql = "DELETE FROM `$table` WHERE";
			$c = count($conditions);
			$i = 1;
			foreach($conditions as $key=>$value) {
				if ($c == $i) {
					$sql .= " `$key`='$value' ";
				} else {
					$sql .= " `$key`='$value' AND";
				}
				$i++;
			}
			$result = $this->connect()->query($sql);

			return $result;
		}
	}

	public function updateData($table, $arr='', $condition=''){
		if($arr != '') {
			$sql = "UPDATE `$table` SET";
			$c = count($arr);
			$i = 1;
			foreach($arr as $key => $value) {
				if ($c == $i) {
					$sql .= " `$key`='$value'";
				} else {
					$sql .= " `$key`='$value',";
				}
				$i++;
			}
			foreach($condition as $key => $value) {
				$sql .= " WHERE `$key`='$value'";
			}

			$result = $this->connect()->query($sql); 
			return $result;
		}
	}
}


class User extends Query {
	private $user_name;
	private $name;
	private $date_of_signup;
	private $mobile;
	private $password;

	public function __construct($user_name='',$name='',$mobile='',$password='') {
		$this->user_name = $this->connect()->real_escape_string($user_name);
		$this->name = $this->connect()->real_escape_string($name);
		$this->mobile = $this->connect()->real_escape_string($mobile);
		$this->password = md5($this->connect()->real_escape_string($password));
		$this->date_of_signup = date('d-m-Y h:i:s');
	}

	public function register() {
		$result = $this -> insertData('tbl_user',["user_name"=>"$this->user_name","name"=>"$this->name","date_of_signup"=>"$this->date_of_signup","mobile"=>"$this->mobile","is_block"=>1,"password"=>"$this->password","is_admin"=>0]);
		return $result;
	}

	public function login($username='',$password='') {
		if($username != '' && $password != '') {
			$username = $this->connect()->real_escape_string($username);
			$password = md5($this->connect()->real_escape_string($password));
			$result = $this -> getData('tbl_user','',["user_name"=>$username,"password"=>$password,"is_block"=>0]);
			if($result) {
				$_SESSION['USER_ID'] = $result[0]['user_id'];
				$_SESSION['IS_ADMIN'] = $result[0]['is_admin'];
				if($result[0]['is_admin']) {
					header('location: admin/');
				} else {
					header('location: index.php');
				}
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}

	public function logout(){
		unset($_SESSION['USER_ID']);
		session_destroy();
	}
}


class Cab {
	private $cab_type;
	private $total_distance;
	private $luggage;

	public function __construct($cab_type='',$total_distance='',$luggage='') {
		$this->cab_type = $cab_type;
		$this->total_distance = $total_distance;
		$this->luggage = $luggage;
	}

	public function totalFare(){
		switch($this->cab_type) {
			case 1: 
				$fare = 50;
				if($this->total_distance <= 10) {
					$fare += $this->total_distance * 13.50;
				} else if($this->total_distance > 10 && $this->total_distance <= 60) {
					$fare += 10 * 13.50;
					$fare += ($this->total_distance - 10) * 12.00;
				} else if($this->total_distance > 60 && $this->total_distance <= 160) {
					$fare += 10 * 13.50;
					$fare += 50 * 12.00;
					$fare += ($this->total_distance - 50 - 10) * 10.20;
				} else {
					$fare += 10 * 13.50;
					$fare += 50 * 12.00;
					$fare += 100 * 10.20;
					$fare += ($this->total_distance - 100 - 50 - 10) * 8.50;
				}
			
			break;
			case 2: 
				$fare = 150;
				if($this->total_distance <= 10) {
					$fare += $this->total_distance * 14.50;
				} else if($this->total_distance > 10 && $this->total_distance <= 60) {
					$fare += 10 * 14.50;
					$fare += ($this->total_distance - 10) * 13.00;
				} else if($this->total_distance > 60 && $this->total_distance <= 160) {
					$fare += 10 * 14.50;
					$fare += 50 * 13.00;
					$fare += ($this->total_distance - 50 - 10) * 11.20;
				} else {
					$fare += 10 * 14.50;
					$fare += 50 * 13.00;
					$fare += 100 * 11.20;
					$fare += ($this->total_distance - 100 - 50 - 10) * 9.50;
				}

				if($this->luggage != 0 && $this->luggage <= 10) {
					$fare += 50;
				} else if ($this->luggage > 10 && $this->luggage <= 20) {
					$fare += 100;
				} else if($this->luggage > 20){
					$fare += 200;
				} else {
					$fare += 0;
				}
			
			break;
			case 3: 
				$fare = 200;
				if($this->total_distance <= 10) {
					$fare += $this->total_distance * 15.50;
				} else if($this->total_distance > 10 && $this->total_distance <= 60) {
					$fare += 10 * 15.50;
					$fare += ($this->total_distance - 10) * 14.00;
				} else if($this->total_distance > 60 && $this->total_distance <= 160) {
					$fare += 10 * 15.50;
					$fare += 50 * 14.00;
					$fare += ($this->total_distance - 50 - 10) * 12.20;
				} else {
					$fare += 10 * 15.50;
					$fare += 50 * 14.00;
					$fare += 100 * 12.20;
					$fare += ($this->total_distance - 100 - 50 - 10) * 10.50;
				}

				if($this->luggage != 0 && $this->luggage <= 10) {
					$fare += 50;
				} else if ($this->luggage > 10 && $this->luggage <= 20) {
					$fare += 100;
				} else if($this->luggage > 20){
					$fare += 200;
				} else {
					$fare += 0;
				}
			 
			break;
			case 4: 
				$fare = 250;
				if($this->total_distance <= 10) {
					$fare += $this->total_distance * 16.50;
				} else if($this->total_distance > 10 && $this->total_distance <= 60) {
					$fare += 10 * 16.50;
					$fare += ($this->total_distance - 10) * 15.00;
				} else if($this->total_distance > 60 && $this->total_distance <= 160) {
					$fare += 10 * 16.50;
					$fare += 50 * 15.00;
					$fare += ($this->total_distance - 50 - 10) * 13.20;
				} else {
					$fare += 10 * 16.50;
					$fare += 50 * 15.00;
					$fare += 100 * 13.20;
					$fare += ($this->total_distance - 100 - 50 - 10) * 11.50;
				}

				if($this->luggage != 0 && $this->luggage <= 10) {
					$fare += 50 * 2;
				} else if ($this->luggage > 10 && $this->luggage <= 20) {
					$fare += 100 * 2;
				} else if($this->luggage > 20){
					$fare += 200 * 2;
				} else {
					$fare += 0;
				}
			
			break;
		}

		return $fare;
	}
}
?>