
<?php
require"../../r-core.php";

$id = $_POST['id1'];
$name = $_POST['name1'];
$email = $_POST['email1'];
$domain = $_POST['domain1'];
mysqli_query($conn,"update domain_table SET ssl_name ='$name', ssl_email = '$email', ssl_domain = '$domain' where ssl_id = '$id';"); //Insert Query
mysqli_close($conn); // Connection Closed
?> 
//boxchilli ssl bot created by Alfie Mills 2020
