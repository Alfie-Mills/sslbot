<?php 
require"../../r-core.php";
$name2 = $_POST['name1'];
$email2 = $_POST['email1'];
$domain2 = $_POST['domain1'];
if (isset($_POST['name1'])) {
    mysqli_query($conn,"insert into domain_table(ssl_name, ssl_email, ssl_domain) values ('$name2', '$email2', '$domain2');"); //Insert Query
    echo "Form Submitted succesfully";
}
mysqli_close($conn);
echo 'test';
?> 
