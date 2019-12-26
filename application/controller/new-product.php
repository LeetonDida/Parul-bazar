<?php session_start(); 
$seller_id = $_SESSION['id'];
?>
<?php
	include($_SERVER['DOCUMENT_ROOT'].'/parul-bazar/config/connection.php');
?>
<?php
$name = $_POST['name'];
$category_id = $_POST['category_id'];
$price = $_POST['price'];
$pur_year = $_POST['pur_year'];
$description = $_POST['description'];

echo $name;
echo $category_id;
echo $price;
echo $pur_year;
echo $description;
echo $seller_id;


$sql = "SELECT * FROM `products` WHERE user_id='$seller_id' and name='$name' and price='$price' and pur_year='$pur_year' and description='$description'";
	$result = mysqli_query($conn,$sql);
	$rows=mysqli_num_rows($result);
	if($rows>0)
		{
				echo "<script type='text/javascript'>alert('Product already exists');</script>";
		header('Location: ../../home');
		}
	else
	{
		$target_dir = "../../assets/products/";
		$img_name= basename($_FILES["file_upload"]["name"]);

		$target_file = $target_dir .$img_name;

		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_file)) 
		{
			//$sql = "INSERT INTO `products`(`user_id`, `category_id`,`name`, `price`, `pur_year`, `description`) VALUES ('$seller_id','$category_id','$name','$price','$pur_year','$description')";
		$sql = "INSERT INTO `products`(`user_id`, `category_id`, `name`, `price`, `pur_year`, `description`, `filename`) VALUES ('$seller_id','$category_id','$name','$price','$pur_year','$description','$img_name')";
		$result= mysqli_query($conn,$sql);
		if(!$result)
		{
			echo "<script type='text/javascript'>alert('Failed to add product');</script>";
		header('Location: ../../home');
		}
		else
		{
		header('Location: ../../home');
		} 
		
		
		
		
		
		
		}
	}
	
	



?>