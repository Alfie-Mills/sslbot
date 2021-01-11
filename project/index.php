<?php include "parts/header.php" ?>

    
        <div class="grid-x">
            <div class="cell sidebar">
            <ul class="vertical tabs" data-tabs id="example-tabs">
                <li class="tabs-title is-active"><a href="#panel1v" aria-selected="true"><span class="material-icons-round">dashboard</span></a></li>
                <li class="tabs-title"><a href="#panel2v"><span class="material-icons-round">view_list</span></a></li>
                <!--
                <li class="tabs-title"><a href="#panel3v"><span class="material-icons-round">add_circle</span></a></li>
                -->
                <li class="tabs-title"><a href="#panel4v"><span class="material-icons-round">settings</span></a></li>
            </ul>
            </div>
            <div class="cell page-content">
                <div class="tabs-content vertical" data-tabs-content="example-tabs">
                    <div class="tabs-panel is-active" id="panel1v">
                    
                    <?php include "parts/dash.php" ?>

                    </div>
                    <div class="tabs-panel" id="panel2v">

                        <?php include "parts/table.php" ?>

                    </div>
                    <!--
                    <div class="tabs-panel" id="panel3v">
                       
                    </div>
                    <div class="tabs-panel" id="panel4v">

                    </div> -->
                </div>
            </div>
        </div>
    
<?php include "parts/footer.php" ?>

