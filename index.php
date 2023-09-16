<?php 
   session_start();
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	 <!-- custom css file link  -->
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	 <link rel="stylesheet" href="csslog/style.css">
   </head>
<body>
<div class="form-container">
			<form class="mx-auto"
		      action="./php/check-login.php" 
		      method="post"
			  style ="background-color: #FFFACD">
			  <img src="img/ourlogo.png" alt="Logo" class="logo">
			  <h6 class="text-center p-1">Medicine Management System for Barangay Malitam</h6>
			  <h2 class="text-center p-1">LOGIN</h2>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
		  
		    <input type="text" required placeholder="Username"
		           class="form-control" 
		           name="username" 
		           id="username">
		
		
		    <input type="password" required placeholder="Password"
		           name="password" 
		           class="form-control" 
		           id="password">
		  
		    <label class="form-label">Select User Type:</label>
		
		  <select class="form-select mb-3"
		          name="role" 
		          aria-label="Default select example">
			  <option selected value="user">BHW</option>
			  <option value="admin">Admin</option>
		  </select>
		
			 <input type="submit" name="submit" value="Login"class="btn btn-primary mt-0">
			
		</form>
      </div>
</body>
</html>
<?php }else{
	header("Location: index.php");
} ?>
