<?php include_once('../../../config/connection.php');


$id = filter_input(INPUT_POST, 'id_user', FILTER_SANITIZE_NUMBER_INT);
$first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
$last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
$room_no = filter_input(INPUT_POST, 'room_no', FILTER_SANITIZE_STRING);
$hostel_name = filter_input(INPUT_POST, 'select_hostel', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


$update = "UPDATE users SET first_name='$first_name',last_name='$last_name', room_no='$room_no',email='$email',username='$username', phone='$phone' WHERE id='$id';";


if (mysqli_query($conn, $update)) {
    $complete = "<script type=\"text/javascript\">";
    $complete .= "alert('User Updated Successfuly');";
    $complete .= " window.location.href='users';";
    $complete .= "</script>";
    echo $complete;

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}

?>
