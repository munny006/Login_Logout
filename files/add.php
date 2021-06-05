<?php
include ("adminBack.php");
include('header.php');
$obj_adminBack = new adminBack();
$product_info = $obj_adminBack->display_product();


?>
<?php

if (isset($_GET['prostat'])) {
	$proid = $_GET['id'];
	if ($_GET['prostat'] == 'delete') {

$msg = $obj_adminBack->delete_product($proid);
	}
}
?>
<?php

  if (isset($_GET['adminLogout'])) {
    $obj_adminback = new adminBack();
    $obj_adminback->adminLogout();
  }

?>
<h1 class="text-center bg-light py-3 mt-2"> Hey!!! I'm Here</h1>

<table class="table table-bordered text-dark bg-light col-md-10 ml-5 my-3">
	<tr class="text-center my-3 py-3">
			
			
					
				
			
				
		<th width="14%">Name</th>
		<th width="17%">Email</th>
		<th width="17%">phone</th>
		
		<th width="15%">city Name</th>
	
		<th width="30%">Action</th>
	</tr>
	<?php
		if(isset($res)){
			while($row=$res->fetch_assoc()) {
				?>

				<tr class="text-center">
				
				<td><?php echo $row['ctg_name'];?></td>
				<td><?php echo $row['ctg_email'];?></td>
				<td><?php echo $row['ctg_number'];?></td>
				
				<td><?php echo $row['city_name'];?></td>


				<td>
					<a href="update.php?prostat=edit&&id=<?php echo $row['ctg_id'];?>" class = "btn btn-success">Update</a>
					<a href="?prostat=delete&&id=<?php echo $row['ctg_id'];?>" class = "btn btn-danger" >Delete</a>

				</td>
			</tr>
		<?php } 
		}else{
			while ($product =mysqli_fetch_assoc($product_info)) {
				?>

				<tr class="text-center">
				
				<td><?php echo $product['ctg_name'];?></td>
				<td><?php echo $product['ctg_email'];?></td>
				<td><?php echo $product['ctg_number'];?></td>
				
				<td><?php echo $product['city_name'];?></td>
				<td>
					<a href="update.php?prostat=edit&&id=<?php echo $product['ctg_id'];?>" class = "btn btn-success">Update</a>
					<a href="?prostat=delete&&id=<?php echo $product['ctg_id'];?>" class = "btn btn-danger" >Delete</a>

				</td>
			</tr>
		<?php } 
		} ?>
		
</table>
<a href="login.php" class="btn btn-primary pull-left ml-3">Register</a>
<a href="?adminLogout=logout" class="btn btn-danger pull-right mr-4">LogOut</a>



