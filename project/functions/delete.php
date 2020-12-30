<?php
require"../../r-core.php";
$entryid = $_POST['id'];
mysqli_query($conn, "delete from domain_table where ssl_id = '$entryid'"); //Insert Query
mysqli_close($conn); // Connection Closed
?>
