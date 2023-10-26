<?php 
   session_start();
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mediqly Login </title> 
	<link rel="shortcut icon" href="/assets/images/logo-group-16.svg" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-white">
      <div class="container d-flex justify-content-around
align-items-center"
      style="min-height: 100vh">
	  <img src="/assets/images/login.svg" alt="login" class="order-2 d-none d-lg-block " style="width:600px">
      	<form class="border shadow p-3 rounded d-flex flex-column row-gap-4"
      	      action="/pages/login/check-login.php" 
      	      method="post" 
      	      style="width: 450px;">
      	      <h1 class="text-center p-3">Login to Database</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>

			  <div class="form-floating ">
  					<input type="text" class="form-control" id="floatingInput" 					placeholder="User Name" name="username">
  					<label for="floatingInput">User Name</label>
			</div>

			<div class="form-floating ">
  					<input type="password" class="form-control" id="floatingPassword" 					placeholder="Password" name="password">
  					<label for="floatingPassword">Password</label>
			</div>

		   <div class="form-floating mb-4">
  				<select class="form-select" id="floatingSelect" 	aria-label="Floating label select example" name="role">
				<option selected value="admin">Admin</option>
    			<option value="user">User</option>
  				</select>
  				<label for="floatingSelect">Select Role</label>
			</div>

		  <div class="d-flex justify-content-between">
		  <a href="/index.php" class="btn btn-danger btn-lg">Exit</a>
		  <button type="submit" class="btn btn-success btn-lg ">Login</button>
		  </div>
		</form>
      </div>
</body>
</html>
<?php }else{
	header("Location: ../../pages/dashboard/index.php");
} ?>