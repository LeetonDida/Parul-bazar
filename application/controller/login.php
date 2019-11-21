<?php
	include($_SERVER['DOCUMENT_ROOT'].'/parul-bazar/config/connection.php');
?>

<?php
	$email=$_POST['email'];
	$password=$_POST['password'];
	$hashed=hash('adler32',$password);
	$query="Select * from users where email='$email' and password='$hashed'";
	$check_if_exist= mysqli_query($conn,$query);
	$check_result=mysqli_num_rows($check_if_exist);
	if($check_result>0)
		{
		$row=mysqli_fetch_assoc($check_if_exist);
		$name=$row['first_name'];
		$user_id=$row['id'];
		session_start();
		$_SESSION['name']=$name;
		$_SESSION['id']=$user_id;
		header('Location: ../../home');
		}
	else{
		echo "<script type='text/javascript'>alert('Incorrect Email or password');</script>";
		header("refresh:0;url=../../login");
		}
?>