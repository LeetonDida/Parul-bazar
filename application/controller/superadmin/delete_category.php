<?php include_once ('../../../config/connection.php');

$category_id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);

$delete="DELETE FROM categories WHERE id='$category_id';";
if(mysqli_query($conn,$delete)){


    echo("<script language='javascript' type='text/javascript'> alert('Deleted Sucessfully');    window.location.href='categories';</script>");
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
