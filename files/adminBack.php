<?php

class adminBack{

	private $conn;
	public function __construct(){
		$dbhost = "localhost";
		$dbuser ="root";
		$dbpass ="";
		$dbname ="verified";
		$this->conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		if (!$this->conn) {
			die("Database connection Error!");
		}
	}

//Login function
	function admin_login($data){
		$email = $data['email'];
		$password = md5($data['password']);
		$query = "SELECT  * FROM login WHERE email='$email' AND password='$password'";
		if (mysqli_query($this->conn,$query)) {
			$result = mysqli_query($this->conn,$query);
			$admin_info = mysqli_fetch_assoc($result);
			if ($admin_info) {
				header('location:add.php');
				session_start();
				$_SESSION['id'] =$admin_info['id'];
				$_SESSION['email'] =$admin_info['email'];
				$_SESSION['password'] =$admin_info['password'];
			}
			else
			{
				$errmsg = "Your Username  or password incorrect";
				return $errmsg;
			}
		
}
}



//add_category

	function add_category($data){
	$pdt_name = $data['ctg_name'];
		$pdt_email = $data['ctg_email'];
		$pdt_number = $data['ctg_number'];
		$pdt_city = $data['city_name'];
	
		$query = "INSERT INTO information(ctg_name,ctg_email,ctg_number,city_name) VALUES('$pdt_name','$pdt_email',$pdt_number,'$pdt_city')";
	if (mysqli_query($this->conn,$query)) {
		$message = "Data added successfully!";
			return $message;
	}
	else
	{
		$message = "Data not added !";
			return $message;
		
	}
	}


//show or read
function display_product(){
		$query = "SELECT * FROM information";
		if (mysqli_query($this->conn,$query)) {
			$product = mysqli_query($this->conn,$query);
			return $product;
			 
		}
	}


//delete
	function delete_product($id){
		$query = "DELETE FROM information WHERE ctg_id=$id";
		if (mysqli_query($this->conn,$query)) {
			$msg = "Data Deleted successfully!";
			return $msg;
		}

	}



function getEditProduct_info($id){
		$query = "SELECT * FROM information WHERE ctg_id = $id";
		if (mysqli_query($this->conn,$query)) {
				$product_info=mysqli_query($this->conn,$query);
				$pdt_data = mysqli_fetch_Assoc($product_info);
				return $pdt_data;
		}


	}
	
function update_product($data){
$pdt_id = $data['u_pdt_id'];	
$pdt_name = $data['u_pdt_name'];
		$pdt_email = $data['u_pdt_email'];
		$pdt_number = $data['u_pdt_number'];
		$pdt_city = $data['u_pdt_city'];
		
		
				$query = "UPDATE information SET ctg_name='$pdt_name',ctg_email='$pdt_email',ctg_number=$pdt_number,city_name='$pdt_city' WHERE ctg_id =$pdt_id";
		if (mysqli_query($this->conn,$query)) {
				$msg="Data updated successfully";
			return $msg;
		}
		

}

//Logout function

	function adminLogout(){
		unset($_SESSION['id']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		header('location:index.php');

	}



}
?>