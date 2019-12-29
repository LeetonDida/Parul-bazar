<!DOCTYPE html>

<?php
include_once('../../../config/connection.php') ;
?>

<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->

    <!-- Custom fonts for this template-->
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">


</head>
<body class="register-body">
<div class="container">
    <div class="row justify-content-center">
        <div class="card mt-5">
            <article class="card-body">
                <h4 class="card-title text-center mb-4 mt-1">New Member Register</h4>
                <hr>
                <p class="text-success text-center" id="message">

                </p>
                <form id="registerForm" action="application/controller/registration.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstName">First name</label>
                            <input autofocus id="firstName" placeholder="First Name" class="form-control" type="text" required maxlength="30" name="first_name" value="" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="firstName">Last name</label>
                            <input id="lastName" class="form-control" placeholder=" Last Name" type="text" name="last_name" required maxlength="30" value="" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Phone Number</label>
                            <input id="phone" class="form-control" type="text" placeholder="Phone Number"  name="phone" required maxlength="10" pattern="[7-9]{1}[0-9]{9}" value="" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" placeholder="Email" type="email" maxlength="255" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" value="" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Username</label>
                        <input id="username" class="form-control"  placeholder="Username" type="text" maxlength="30" required name="username" value="" />
                        (Please select any Username of your choice)
                    </div>

							<div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="room_no">Room Number</label>
                            <input id="room_no" class="form-control" placeholder="" type="text" required pattern=".{2,}" maxlength="3" name="room_no" value="" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="hostel">Hostel</label>
										<select name="hostel" id="hostel" class="form-control">
													<?php 
														//display list of hostels in the database
														$sql = "SELECT * FROM hostel";
														$result = mysqli_query($conn,$sql);
														while ($row = mysqli_fetch_array($result))
														{
															echo "<option value='" . $row['id'] ."'>".$row['name']."</option>";
														}
													?>
											</select>
										<!--<input id="hostel" class="form-control" type="password" maxlength="30" required name="confirmation" value="" />-->
                        </div>
                    </div>
							
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Password (min. of 8 Cha.)</label>
                            <input id="password" class="form-control" placeholder="Password" type="password" required pattern=".{8,}" name="password" value="" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirmation">Re-Enter Password</label>
                            <input id="confirmation" class="form-control" type="password" maxlength="30" required name="confirmation" value="" />
                        </div>
                    </div>
							
                    <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="submit" id="submit" class="btn btn-outline-success" name="submit" value="Sign Up" />

                        <a class=" btn btn-outline-danger  pull-right" href="home"><i class="fa fa-close"> </i> Cancel</a>
                    </div>
                    </div>
                </form>

            </article>
        </div>


    </div>



</body>
</html>

