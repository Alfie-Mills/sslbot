<h1>Toolkit Dashboard</h1>

<div style="padding-top:20px;"class="grid-container dash">
    <h2>Avaliable Tools</h2>
    <div class="grid-x">
    <div class="cell large-4">
        <h3>SSL Checker</h3>
        <h4>By <span class="author">Alfie Mills</span></h4>
        <h5>Current Status:</h5>
        
        <?php 
            global $lt60;
            global $total;
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $expiry = get_expiry($row["ssl_domain"]);
                    if ($expiry >= 60){$lt60++;}  
                    $total++;
                }
            }
        ?>

        <p>Domains Expiring soon: <?php echo $lt60 ?></p>
        <p>Total Domains: <?php echo $total ?></p>
        </p>
    </div>
    </div>
</div>