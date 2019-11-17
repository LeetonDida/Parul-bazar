<?php include_once ('../../../config/connection.php') ;


$id=filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT);
$name=filter_input(INPUT_POST,'name', FILTER_SANITIZE_STRING);


$update ="UPDATE categories SET category='$name'  WHERE id='$id';";
if(mysqli_query($conn,$update)){
    $complete = "<script type=\"text/javascript\">";
    $complete .= "alert('Category Updated Successfuly');";
    $complete .= " window.location.href='categories';";
    $complete .= "</script>";
    echo $complete;

}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}

?>
