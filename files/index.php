<?php
include ("adminBack.php");
include('header.php');
$obj_Adminback = new adminBack();
if (isset($_POST['submit'])) {
 $obj_Adminback->admin_login($_POST);
}


?>


<div class="container text-center bg-light py-3 my-4 col-md-8">

    <h1 class="col-md-10 text-center bg-light py-3 my-4">WelCome!</h1>
  <form class="col-md-10 text-center bg-light py-3 my-4" method="POST" action="">
    <div class="user-box">
      <input type="email" name="email" placeholder="Username" class="text-center col-md-8 ">
</div><br>
    <div class="user-box">
      <input type="password" name="password" placeholder="Password"class="text-center col-md-8">
    
    </div><br>
  <input type="submit" name="submit" value="Log In" class="btn btn-info">
  </form>
</div>
         </div>       
            </div>
            </div>
            
        </div>
   <?php include('footer.php');?>