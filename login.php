<?php session_start();
error_reporting(0);
?>
<?php
//Database Authentication
require("ab918ef1654932ce2d9620f5483f03bc.inc");

// Server side code


//Not secure post call
if(!empty($_POST['userName']) and !empty($_POST['password'])) {
    //connect to database
    $mysqli = new mysqli($hostDB, $userDB,$passwordDB,$databaseDB);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $query ="select * from login where userName=? and password=?" ;
    if ($stmt = $mysqli->prepare($query)) {

        /* bind parameters for markers */
        $stmt->bind_param("ss", $_POST['userName'],$_POST['password']);
        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $result= $stmt->get_result();

        /* fetch value */
        while ($row = $result->fetch_assoc()) {
			$loginInUser=null;
			$loginInUser= $row["userName"];
            $userToken= $row["userToken"];
            $_SESSION["userName"] = $loginInUser;
            $_SESSION["userToken"] = $userToken;
            break; // to be save
	}

        /* close statement */
        $stmt->close();
    }

    
    
    setcookie('userToken', $userToken,false,"/",false);
    mysqli_free_result($result);
    $mysqli->close();

if ($loginInUser==null){
        echo "<script>alert('Username or Password incorrect')</script>";

}  else {echo "<meta http-equiv=\"refresh\" content=\"0; url=./myActivities.php\">";}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>EE - Bank</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/aditya-vyas-6Ih4UoqzaAs-unsplash.jpg');background-size:cover;">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
				    <img src="logo11.f08"></img></br>
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="login.php" method="POST">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="userName" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<script>

    <?php
    // submit user name to server
?>
</script>
<?php require 'footerTab.php'?>
</body>