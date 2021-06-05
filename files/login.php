
<?php
include ("adminBack.php");
include('header.php');


$obj_adminBack = new adminBack();
if (isset($_POST['submit'])) {
	$return_mes = $obj_adminBack->add_category($_POST);
	



}

?>


<?php 

if (isset($return_mes)) {
	echo  $return_mes;
}

?>


<h1 class="text-center mt-5">Registration</h1><br>
<div>
<form action="" method="POST" class="col-md-6 right bg-light py-5 my-2" enctype="multipart/form-data">
		
	<div class="form-group">
		
		<input type="text" name="ctg_name" class="form-control" placeholder="Enter Your Name">
		
	</div>
		<div class="form-group">
		
		<input type="text" name="ctg_email" class="form-control" placeholder="Enter Your Email">
		
	</div>
		<div class="form-group">
		<input type="tel" name="ctg_number" class="form-control" placeholder="Enter Your Number">
		
		
	</div>
	
		<div class="form-group">
	
		
		<select name = "city_name">


			<option>Sylhet</option>
			<option>Hobigong</option>
			<option>Comilla</option>
			<option>Rajshahi</option>
			<option>Chittagong</option>
			<option>Dhaka</option>
			
		</select>
	
	</div>
	<input type="submit" name="submit" value="Add" class="btn btn-primary">
<a href="add.php" class="btn btn-success ml-4 ">Back</a>
	
</form>
</div>
