<?php include_once ('../../../config/connection.php') ?>
<?php
$name= $_POST["name"];
$sql = "INSERT INTO hostel (hostel )
VALUES ('$name')";


if (mysqli_query($conn, $sql)) {
    $complete = "<script type=\"text/javascript\">";
    $complete .= "alert('Hostel Name Created Successfuly');";
    $complete .= " window.location.href='hostel';";
    $complete .= "</script>";
    echo $complete;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
