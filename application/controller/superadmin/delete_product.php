<?php include_once ('../../../config/connection.php');

$product_id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);

$delete="DELETE FROM products WHERE id='$product_id';";
if(mysqli_query($conn,$delete)){


    echo("<script language='javascript' type='text/javascript'> alert('Deleted Sucessfully');    window.location.href='products';</script>");
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
