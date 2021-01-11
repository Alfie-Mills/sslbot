                         <!-- Begin Table -->
                         <div class="grid-container">
                            <div class="tableDiv">
                                <table id="maintable">
                                    <caption>Current SSL Checks</caption>
                                    <tr id="one">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Domain</th>
                                        <th>Expiry</th>
                                        <th></th>
                                    </tr>

                                    <?php 
                                    $result = $conn->query($sql);
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
                                                <td><span><?php echo get_expiry($ssldomain); ?></span></td>
                                                <td>
                                                    <input type='submit' onclick='delEntry(<?php echo $row["ssl_id"];?>)' value='delete'>
                                                    <input type='submit' id='editBtn<?php echo $row["ssl_id"];?>' onclick='append(<?php echo $row["ssl_id"];?>)' value='create'> 
                                                    <input type='submit' id='applyBtn<?php echo $row["ssl_id"];?>' onclick='applyAppend(<?php echo $row["ssl_id"];?>)' value='done'> 
                                                </td>
                                            </tr> 

                                            <?php
                                        }
                                    } else {
                                        echo "<td>0 results</td><td><b>0 results - This may be a critical error, please contact alfie@boxchilli.com</b> - just to be safe :)</td><td>0 results</td>";
                                    }
                                    $conn->close();
                                    ?>

                                    <tr id="new">
                                        <form id="form" name="form">
                                        <td><b>New Entry</b></td>
                                        <td><input id="name" type="text" placeholder="John Smith"></td>
                                        <td><input id="email"  type="text" placeholder="john@example.com"></td>
                                        <td><input id="domain" type="text" placeholder="example.com"></td>
                                        <td><input id="submit" onclick="myFunction()" type="button" value="Submit"></td>
                                        </form>
                                    </tr>

                                </table>
                            </div>
                        </div>