<?php include_once ('../../../config/connection.php') ?>
<?php
$name_hostel= $_POST["name"];
$sql = "INSERT INTO hostel (name)
VALUES ('$name_hostel')";


if (mysqli_query($conn, $sql)) {
    $complete = "<script type=\"text/javascript\">";
    $complete .= "alert('Hostel  Created Successfuly');";
    $complete .= " window.location.href='hostel';";
    $complete .= "</script>";
    echo $complete;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
