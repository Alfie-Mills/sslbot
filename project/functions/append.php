
<?php
require"../../r-core.php";

$id = $_POST['id1'];
mysqli_query($conn,"update domain_table SET ssl_name ='$name2', ssl_email = '$email2', ssl_domain = '$domain2' where ssl_id = '$id';"); //Insert Query
mysqli_close($conn); // Connection Closed
?> 
//boxchilli ssl bot created by Alfie Mills 2020
