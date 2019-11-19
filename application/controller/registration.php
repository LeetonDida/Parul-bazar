<?php
	include($_SERVER['DOCUMENT_ROOT'].'/parul-bazar/config/connection.php');
?>

<?php
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$room_no=$_POST['room_no'];
	$hostel=$_POST['hostel'];
	$password=$_POST['password'];
	$confirmation=$_POST['confirmation'];
	$hashed_password=hash('adler32',$password);
	
	//check if passwords match
	if($password!=$confirmation)
	{
		echo "<script type='text/javascript'>alert('Passwords do not match');</script>";
		header("refresh:0;url=../../register");
	}
	else
	{
	//proceed if passwords match
		//chech if user account already exists
		$query="Select * from users where phone='$phone' or email='$email'";
		$check_if_exist= mysqli_query($conn,$query);
		$check_result=mysqli_num_rows($check_if_exist);
		if($check_result>0)
		{
			echo "<script type='text/javascript'>alert('User already exists!');</script>";
			header("refresh:0;url=../../register");
		}
		else
		{
			//query to create account
			$sql = "INSERT INTO `users`(`first_name`, `last_name`, `room_no`, `hostel_id`, `phone`, `email`, `username`, `password`) VALUES ('$first_name','$last_name','$room_no', '$hostel', '$phone', '$email', '$username', '$hashed_password')";
			$result= mysqli_query($conn,$sql);
			if(!$result)
			{
				echo "<script type='text/javascript'>alert('Could not create account');</script>";
				header("refresh:0;url=../../register");
			}
			else
			{
				//Account created,redirect to login page
				echo "<script type='text/javascript'>alert('Account created');</script>";
				header("refresh:0;url=../../login");
			}
    }
	}
?>