<?php require('r-config.php'); 

$base_dir = __dir__;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

$sql = "SELECT ssl_id, ssl_name, ssl_domain, ssl_email FROM domain_table";

$result = $conn->query($sql);

function get_expiry($url){
    if (empty($url) || filter_var(gethostbyname($url), FILTER_VALIDATE_IP) === false) {
    echo("No valid hostname provided"  );
    return;
    }
    $cmd = "curl --insecure -v https://" . trim($url) . " 2>&1 | awk 'BEGIN { cert=0 } /^\* Server certificate:/ { cert=1 } /^\*/ { if (cert) print }' | grep -i expire";
    $check = exec($cmd);
    if (!$check || !stristr($check, "date:") || !stristr($check, "expire")) {
        echo("Could not determine certificate status" );
        return;
    }
    $expiry = explode("date:", $check);
    if (empty($expiry[1])) {
        echo("Could not find expiry date!" );
        return;
    }
    $expiry = strtotime($expiry[1]);
    if (empty($expiry)) {
        echo("Could not extract expiry date" );
        return;
    }
    $renewalTime = strtotime("+2 weeks");
    if (empty($renewalTime)) {
        echo("Could not determine, expiration limit" );
        return;
    }
    #echo "Domain Expires in " . ceil((strtotime(date('d M Y', $expiry))-time())/60/60/24) . " days.";
    return ceil((strtotime(date('d M Y', $expiry))-time())/60/60/24);
}
function get_part($a){
    global $project_name;
    include __dir__ . "/" . $project_name . "/parts/" . $a . ".php" ;
}


function get_head(){
    global $project_name;
    include __dir__ . "/" . $project_name . "/header.php" ;
};

function get_foot(){
    global $project_name;
    include __dir__ . "/" . $project_name . "/footer.php" ;}

?>