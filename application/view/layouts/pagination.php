<?php
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 8;
$offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM products";
$result1 = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result1)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
?>