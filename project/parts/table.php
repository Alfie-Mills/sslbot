
<div class="tableDiv">
    <table id="maintable">
        <caption>Current SSL Checks</caption>
        <tr id="one">
            <th>Name</th>
            <th>Email</th>
            <th>Domain</th>
            <th>Expiry</th>
            <th><input id="New" onclick="newEntry()" type="submit" value="New"></th>
        </tr>

        <?php 
        echo $result;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $sslid = $row["ssl_id"]; 
                $sslname = $row["ssl_name"];
                $sslemail = $row["ssl_email"];
                $ssldomain = $row["ssl_domain"];        
                ?>

                <tr>
                    <td><input type='entry' id="<?php echo "name".$sslid; ?>" value="<?php echo $sslname; ?>"></td>
                    <td><input type='entry' id="<?php echo "email".$sslid; ?>" value="<?php echo $sslemail; ?>"></td>
                    <td><input type='entry' id="<?php echo "domain".$sslid; ?>" value="<?php echo $ssldomain; ?>"></td>
                    <td><input type='entry' id="<?php echo "domain".$sslid; ?>" value="<?php echo get_expiry($ssldomain); ?>"></td>
                    <td>
                        <input type='submit' onclick='delEntry(<?php echo $row["ssl_id"];?>)' value='Delete'>
                        <input type='submit' id='editBtn<?php echo $row["ssl_id"];?>' onclick='append(<?php echo $row["ssl_id"];?>)' value='Edit'> 
                        <input type='submit' id='applyBtn<?php echo $row["ssl_id"];?>' onclick='applyAppend(<?php echo $row["ssl_id"];?>)' value='Apply'> 
                    </td>
                </tr> 

                <?php
            }
        } else {
            echo "<td>0 results</td><td><b>0 results - This may be a critical error, please contact alfie@boxchilli.com</b> - just to be safe :)</td><td>0 results</td>";
        }
        $conn->close();
        ?>

    </table>
</div>

