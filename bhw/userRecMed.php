<!DOCTYPE html>
<html lang="en">
  <?php
	require_once '../admin_query/validate.php';
	require '../admin_query/name.php';
	@include '../connection/connect.php';
?>
<head>
  <title>Responsive Sidebar</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="../cssmainmenu/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
  <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />

</head>
<body>
  <div class="sidebar">
    <div class="logo_details">
      <div class="logo_name">Barangay Health Worker</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="homemedd.php">
          <i class="bx bx-grid-alt"></i>
          <span class="link_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-chat"></i>
          <span class="link_name">Anouncements</span>
        </a>
        <span class="tooltip">Anouncements</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-pie-chart-alt-2"></i>
          <span class="link_name">Analytics</span>
        </a>
        <span class="tooltip">Analytics</span>
      </li>
      <li>
        <a href="userRecMedd.php">
          <i class="bx bx-folder"></i>
          <span class="link_name">Records</span>
        </a>
        <span class="tooltip">Records</span>
      </li>
      <li>
        <a href="medicinee.php">
          <i class="bx bx-cart-alt"></i>
          <span class="link_name">Medicine</span>
        </a>
        <span class="tooltip">Medicine</span>
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
            <div class="name"><?php echo $name;?></div>
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
    <div class="text">Records</div>
    <div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Records</div>
				
				<br />
				<?php if (isset($_GET['success'])) { ?>
					<div class="alert alert-success" role="alert">
						<?=$_GET['success']?>
					</div>
					<?php } ?>
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							
							<th>Resident Name</th>
							<th>Date of Birth</th>
							<th>Age</th>
							<th>Sex</th>
							<th>Address</th>
							<th>Contact Number</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Given Date</th>
							<th>Action</th>
							

						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT * FROM `residentrecords`") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
							
							<td><?php echo $fetch['residentName']?></td>
							<td><?php echo $fetch['dateBirth']?></td>
							<td><?php echo $fetch['age']?></td>
							<td><?php echo $fetch['sex']?></td>
							<td><?php echo $fetch['address']?></td>
							<td><?php echo $fetch['contactNumber']?></td>
							<td><?php echo $fetch['productName']?></td>
							<td><?php echo $fetch['quantity_req']?></td>
							<td><?php echo $fetch['givenDate']?></td>
							<td><center> <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "../admin_query/delete_rec.php?residentId=<?php echo $fetch['residentId']?>"> Delete</a></center></td>
						</tr>
						
					<?php
						}
					?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>


  </section>
  <!-- Scripts -->
  <script src="../cssmainmenu/script.js"></script>
  <script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>
<script src = "../js/jquery.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
</body>
</html>