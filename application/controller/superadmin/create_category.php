<?php include_once ('../../../config/connection.php') ?>
<?php
$name_category= $_POST["name_category"];
$sql = "INSERT INTO categories (category )
VALUES ('$name_category')";


if (mysqli_query($conn, $sql)) {
    $complete = "<script type=\"text/javascript\">";
    $complete .= "alert('Category Created Successfuly');";
    $complete .= " window.location.href='categories';";
    $complete .= "</script>";
    echo $complete;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
