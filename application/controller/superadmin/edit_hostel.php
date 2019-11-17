<?php include_once ('../../../config/connection.php') ;


$id=filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT);
$name=filter_input(INPUT_POST,'name', FILTER_SANITIZE_STRING);


$update ="UPDATE hostel SET name='$name'  WHERE id='$id';";
if(mysqli_query($conn,$update)){
    $complete = "<script type=\"text/javascript\">";
    $complete .= "alert('Hostel Updated Successfuly');";
    $complete .= " window.location.href='hostel';";
    $complete .= "</script>";
    echo $complete;

}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}

?>
