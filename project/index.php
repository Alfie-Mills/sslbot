<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Foundation for Sites</title>
        <link rel="stylesheet" href="<?php echo $project_name . "/" ?>assets/styles/css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    </head>
    <body>

    
        <div class="grid-x">
            <div class="cell sidebar">
            <ul class="vertical tabs" data-tabs id="example-tabs">
                <li class="tabs-title is-active"><a href="#panel1v" aria-selected="true"><span class="material-icons-round">dashboard</span></a></li>
                <li class="tabs-title"><a href="#panel2v"><span class="material-icons-round">view_list</span></a></li>
                <li class="tabs-title"><a href="#panel3v"><span class="material-icons-round">add_circle</span></a></li>
                <li class="tabs-title"><a href="#panel4v"><span class="material-icons-round">settings</span></a></li>
            </ul>
            </div>
            <div class="cell page-content">
                <div class="tabs-content vertical" data-tabs-content="example-tabs">
                    <div class="tabs-panel is-active" id="panel1v">
                    
                    <div class="grid-container dashboard">
                        <div class="grid-x">
                            <div class="cell medium-3">
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
                                <div class="c100 p<?php echo floor($lt60 / $total * 100)?> primary">
                                    <span><?php echo $lt60 . "/" . $total?></span>
                                    <div class="slice">
                                        <div class="bar"></div>
                                        <div class="fill"></div>
                                    </div>
                                    <span class="subtext">Expires soon</span>
                                </div>
                            </div>
                            <div class="cell medium-3">
                                <div class="c100 p50 ">
                                    <span>10%</span>
                                    <div class="slice">
                                        <div class="bar"></div>
                                        <div class="fill"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="cell medium-3">
                                <div class="c100 p50 ">
                                    <span>10%</span>
                                    <div class="slice">
                                        <div class="bar"></div>
                                        <div class="fill"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="cell medium-3">
                                <div class="c100 p50 ">
                                    <span>10%</span>
                                    <div class="slice">
                                        <div class="bar"></div>
                                        <div class="fill"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-container">
                    <div class="grid-x">
                            <div class="cell medium-4">
                                Text Here
                            </div>
                            <div class="cell medium-4">
                                Text Here
                            </div>
                            <div class="cell medium-4">
                                Text Here
                            </div>
                        </div>
                    </div>
                
                    </div>
                    <div class="tabs-panel" id="panel2v">
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
                                        <th><input id="New" onclick="newEntry()" type="submit" value="New"></th>
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
                        </div>

                    </div>
                    <div class="tabs-panel" id="panel3v">
                        <!-- Begin Form -->
                        <form id="form" name="form">
                            <h3>Create New Entry</h3>
                            <div>
                                <label>Name :</label>
                                <input id="name" type="text">
                                <label>Email :</label>
                                <input id="email"  type="text">
                                <label>Domain :</label>
                                <input id="domain" type="text">
                                <input id="submit" onclick="myFunction()" type="button" value="Submit">
                            </div>
                            <input id="btnClose" onclick="closeBtn()" type="btn" value="Close">
                        </form>
                    </div>
                    <div class="tabs-panel" id="panel4v">
    
                    </div>

                </div>
            </div>
        </div>
    





        

       

        <script src="<?php echo $project_name . "/" ?>node_modules/jquery/dist/jquery.js"></script>
        <script src="<?php echo $project_name . "/" ?>node_modules/what-input/dist/what-input.js"></script>
        <script src="<?php echo $project_name . "/" ?>node_modules/foundation-sites/dist/js/foundation.js"></script>
        <script src="<?php echo $project_name . "/" ?>assets/js/app.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    </body>
</html>


