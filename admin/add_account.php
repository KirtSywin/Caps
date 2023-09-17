
<!DOCTYPE html>
<html lang="en">
<?php
	require_once '../admin_query/validate.php';
	require '../admin_query/name.php';
?>
<head>
  <title>Add Account</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="../cssmainmenu/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
 <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
</head>
<body>
  <div class="sidebar">
    <div class="logo_details">
      <div class="logo_name">Admin</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="Dashboard.php">
          <i class="bx bx-grid-alt"></i>
          <span class="link_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a href="medicinerecords.php">
          <i class="bx bx-plus-medical"></i>
          <span class="link_name">Medicine Records</span>
        </a>
        <span class="tooltip">Medicine</span>
      </li>
      <li>
        <a href="Contraceptives.php">
          <i class="bx bx-capsule"></i>
          <span class="link_name">Contraceptive Records</span>
        </a>
        <span class="tooltip">Contraceptives</span>
      </li>
      <li>
        <a href="records.php">
          <i class="bx bx-folder"></i>
          <span class="link_name">Resident Records</span>
        </a>
        <span class="tooltip">Records</span>
      </li>
      <li>
          <a href="RegisteredUserAdmin.php">
            <i class="bx bx-user-pin"></i>
            <span class="link_name">Registered Admin/User</span>
          </a>
          <span class="tooltip">Registered</span>
      </li>
        <li>
          <a href="account.php">
            <i class="bx bx-user-pin"></i>
            <span class="link_name">Accout</span>
          </a>
          <span class="tooltip">Account</span>
        </li>
        <li>
        <a href="#">
          <i class="bx bx-cog"></i>
          <span class="link_name">Settings</span>
        </a>
        <span class="tooltip">Settings</span>
      </li>
      <li class="profile">
        <div class="profile_details">
          <img src="../img/admin-default.png" alt="profile image">
          <div class="profile_content">
            <div class="name"><?php echo $name; ?></div>
           <a href="../logout.php">
            <span class="link_name">Logout</span>
            </a>
          </div>
        </div>
        <i class="bx bx-log-out" id="log_out"></i>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="text">Account</div>
    <div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Account / Create Account</div>
				<div class = "col-md-4">	
<div class="form-container">

   <form action="" method="POST">
   <?php if (isset($_SESSION['error_message'])) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['error_message']; ?>
    </div>
    <?php unset($_SESSION['error_message']); ?>
    <?php } ?>

	   <br></br>
	   <div class = "form-group">
			<label>Name </label>
				<input type = "text"  class = "form-control" name = "name" />
	  </div>
	  <div class = "form-group">
			<label>Username </label>
				<input type = "text"  class = "form-control" name = "username" />
	  </div>
	  <div class = "form-group">
			<label>Password </label>
				<input type = "password"  class = "form-control" name = "password" required placeholder="Enter your password" />
	  </div>	
	  <div class = "form-group">
			<label>Confirm Password </label>
				<input type = "password"  class = "form-control" name = "cpassword" required placeholder="Confirm your password" />
	  </div>	
	  <div class = "form-group">
			<label>Role</label>
			<select class = "form-control" required = required name = "role">
				<option value="user">User</option>
				<option value="admin">Admin</option>
			</select>
		</div>
	  <br></br>
	  <div class = "form-group">
			<button type = "submit" name="submit" class = "btn btn-success form-control"><i class = "glyphicon glyphicon-edit"></i> Add Account</button>
		</div>

	  
<?php
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $role = $_POST['role'];

   $select = " SELECT * FROM users WHERE name = '$name'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
    $_SESSION['error_message'] = "Username already exists!";
	    header("Location: ../admin/add_account.php?error=Username already exist!");
   }else{

      if($pass != $cpass){
		      header("Location: ../admin/add_account.php?error=Password not matched!");
      }else{
         $insert = "INSERT INTO users(name,username, password, role) VALUES('$name','$username','$pass','$role')";
         mysqli_query($conn, $insert);
         header('location:../admin/add_account.php?');
      }
   }

};

?>
  </section>
  <!-- Scripts -->
  <script src="../cssmainmenu/script.js"></script>
  <script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
</body>
</html>