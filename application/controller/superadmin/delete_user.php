<?php include_once ('../../../config/connection.php');

$user_id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);

$delete="DELETE FROM users WHERE id='$user_id';";
if(mysqli_query($conn,$delete)){


    echo("<script language='javascript' type='text/javascript'> alert('Deleted Sucessfully');    window.location.href='users';</script>");
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
