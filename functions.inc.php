<?php 

class User {
	public $username;
	public $name;
	public $mobile;
	protected $password;
	public $join_date;

	function __construct($username='',$name='',$mobile='',$password=''){
		$this->username = $username;
		$this->name = $name;
		$this->mobile = $mobile;
		$this->password = md5($password);
		$this->join_date = date('d-m-Y h:i:s');
	}

	function register($conn=''){
		$user = $this->getUser($conn,$this->username);
		if($user) {
			return "User Already Exists!!!";
		} else {
			$sql = "INSERT INTO `user`(`username`, `name`, `join_date`, `mobile`, `password`, `token`, `status`) VALUES('$this->username','$this->name','$this->join_date','$this->mobile','$this->password','',0)";
			if($conn -> query($sql) == TRUE){
				return "Registration successfull!!!";
			} else {
				return "Registration Failed!!!";
			}
		}
	}

	function showData(){
		echo $this->name;
		echo $this->username;
		echo $this->mobile;
		echo $this->password;
		echo $this->join_date;
	}

	function login($conn='',$username='',$password=''){
		$user = $this->getUser($conn,$username,$password);
		if($user) {
			$_SESSION['USER_ID'] = $user['id'];
			if($user['username'] == 'admin') {
				header('location: admin/');
			} else {
				header('location: ./');
			}
		} else {
			return "User Name or Password is Incorrect!!!";
		}
	}

	function getUser($conn='', $username='',$password=''){
		if($password !== ''){
			$sql = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'";
			$result = $conn -> query($sql) or die("Query Failed");
			if ($result -> num_rows > 0) {
				return $result -> fetch_assoc();
			} else {
				return false;
			}
		} else {
			$sql = "SELECT * FROM `user` WHERE `username`='$username'";
			$result = $conn -> query($sql) or die("Query Failed");
			if ($result -> num_rows > 0) {
				return $result -> fetch_assoc();
			} else {
				return false;
			}
		}
	} 

	function getAllUsers($conn=''){

	}

}

?>