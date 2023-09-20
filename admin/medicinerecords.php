
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
        <span class="tooltip">Contraceptive Records</span>
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
        <span class="tooltip">Registered Admin/User</span>
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
          </div>
          </div>
  <a href="../logout.php" id="log_out">
    <i class="bx bx-log-out"></i>
  </a>
  </li>
    </ul>
  </div>
  <section class="home-section">
  <div class="text">Medicine</div>
  <div class="container-fluid">
		<div class="panel panel-default">
			<div class="panel-body">
      <div class = "alert alert-info">Medicine Records</div>
				<table id="table" class="table table-bordered">
					<thead>
						<tr>
							<th>Product Name</th>
						
							<th>Quantity</th>
							<th>Expiration Date</th>
							<th>Status</th>
	
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $conn->query("SELECT * FROM `medicines`") or die(mysqli_error());
							while ($fetch = $query->fetch_array()) {
							?>
								<tr>
									<td><?php echo $fetch['productName'] ?></td>
									<td><?php echo $fetch['total'] ?></td>
									<td><?php echo $fetch['expDate'] ?></td>
                                    <td><?php echo $fetch['status'] ?></td>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
  </section>
              <?php require_once '../admin_query/add_query_med.php'?>
            </div>
          </div>
        </div>
        
      </div>
      <br />
      <br />
            </form>
          </div>
        </div>
			 </section>	
  <!-- Scripts -->
<script src="../cssmainmenu/script.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.dataTables.js"></script>
<script src="../js/dataTables.bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#table").DataTable();
	});
</script>
</body>
</html>
