<div class="panel panel-default" id="section1">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        <div class="panel-heading pagination-centered">
            <h1 class="panel-title">
                Bill of Materials
            </h1>
        </div></a>
    <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
            <hr />
            <div id="searchField" class="centerElement">
                <h3>Search</h3>
                <input type="search" id="searchItem" placeholder="item, description, supplier, ..." autofocus>
                <select id="searchTeam">
                    <option value="0">All teams</option>
                    <?php
                    $query = "SELECT id, team_name FROM teams ORDER BY list_order";
                    $result = mysqli_query($conn, $query);
                    while($team = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$team['id']."'>".$team['team_name']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div id="searchResults" class="table-responsive" style="display: none;margin-top:10px;">

            </div>
            <br />
            <div class="panel-group" id="teamAccordion">
                <?php
                //$value = "bom kinda mid";
                //echo "<script type=\"text/javascript\">console.log(\"".$value."\")</script>";
                $query = "SELECT * FROM teams ORDER BY list_order";
                $result = mysqli_query($conn, $query);
                while($team = mysqli_fetch_assoc($result)) {
                    /*
                        need to handle divide by zero
                    
                    */
                    if($team['bom_total'] == 0){
                        $meterVal = $team['spent_total'] / 1;
                        echo "<script type=\"text/javascript\">console.log(\"".$tax."\")</script>";
                    }
                    else{
                        $meterVal = $team['spent_total']/$team['bom_total'];
                        echo "<script type=\"text/javascript\">console.log(\"".$meterVal."\")</script>";
                    }
                    echo "<div class='panel panel-default teamPanel'>
                                <a data-toggle='collapse' data-parent='#teamAccordion' style='color:black;' href='#collapseTeam".$team['id']."'>
                                <div class='panel-heading teamPanelHeading'>
                                    <h4 class='panel-title'>".$team['team_name']."</h4>
                                </div></a>
                                <div id='collapseTeam".$team['id']."' class='panel-collapse collapse'>
                                    <div class='panel-body'>
                                        <table class='table'>
                                            <thead>
                                                <tr id='tableHeading'>
                                                    <th>Total Bill of Materials</th>
                                                    <th>Total Expenses</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>".money_format('$%i ',$team['bom_total'])."</td>
                                                    <td>".money_format('$%i ',$team['spent_total'])."</td>
                                                    <td><meter value='".$meterVal."'></meter></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div id='itemsTeam".$team['id']."' class='table-responsive'>
                                            <table class='table'>
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>System</th>
                                                        <th>Supplier</th>
                                                        <th>Date Added</th>
                                                        <th>More</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                    $query = "SELECT * FROM financial_package WHERE team = ".$team['id']." AND status=3 LIMIT 10";
                    $resultItems = mysqli_query($conn, $query);
                    while($item = mysqli_fetch_assoc($resultItems)) {
                        echo "<tr>
                                                            <td>".$item['item']."</td>
                                                            <td>".$item['system']."</td>
                                                            <td>".$item['act_supplier']."</td>
                                                            <td>".date_format(date_create($item['date_added']), 'm/d/Y')."</td>
                                                            <td><button type=\"button\" class=\"btn enquireItem\" data-toggle=\"modal\" data-target=\"#myModal".$item['id']."\"><span class='glyphicon glyphicon-search'></span></button></td>
                                                    </tr >
                                                    <div id = \"myModal".$item['id']."\" class=\"modal fade\" role = \"dialog\" >
                                                        <div class=\"modal-dialog\" >
                                                            <div class=\"modal-content\" >
                                                                <div class=\"modal-header\" >
                                                                    <button type = \"button\" class=\"close\" data-dismiss = \"modal\" >&times;</button >
                                                                    <h4 class=\"modal-title\" style = 'color:black;' >".$item['item']."</h4>
                                                                </div>
                                                                <div class=\"modal-body\">
                                                                    <p style='color:black;'>
                                                                        Item: ".$item['item']."<br />
                                                                        Requested By: ".$item['user_id']."<br />
                                                                        System: ".$item['system']."<br />
                                                                        Item Description: ".$item['item_disc']."<br />
                                                                        Date Added: ".date_format(date_create($item['date_added']), 'm/d/Y')."<br />
                                                                        BOM Supplier: ".$item['bom_supplier']."<br />
                                                                        Estimated Quantity: ".$item['est_quantity']."<br />
                                                                        Estimated Individual Cost: ".money_format('$%i',$item['est_individual_cost'])."<br />
                                                                        Actual Supplier: <a href='".$item['link']."' target='_blank'>".$item['act_supplier']."</a><br />
                                                                        Actual Quantity: ".$item['act_quantity']."<br />
                                                                        Actual Individual Cost: ".money_format('$%i',$item['act_individual_cost'])."<br />
                                                                        Actual Total Cost: ".money_format('$%i',$item['act_quantity'] * $item['act_individual_cost'])."<br />
                                                                        Shipping: ".money_format('$%i',$item['shipping'])."<br />
                                                                        Tax: ".money_format('$%i',$item['tax'])."<br />
                                                                        Date Purchased: ".date_format(date_create($item['date_purchased']), 'm/d/Y')."<br />
                                                                        Purchased By: ".$item['purchased_by']."<br />
                                                                        Date Reimbursed: ".date_format(date_create($item['date_reimbursed']), 'm/d/Y')."<br />
                                                                        COTS or Custom: ".$item['cots_custom']."<br />
                                                                        Comments: ".$item['comments']."<br />
                                                                    </p>
                                                                </div>
                                                                <div class=\"modal-footer\">
                                                                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>";
                    }
                    echo "</tbody>
                                            </table>
                                        </div>
                                        <!--<button id='prePage".$team['id']."' class='btn btn-default'>Previous page</button> |
                                        <button id='nextPage".$team['id']."' class='btn btn-default'>Next page</button>-->
                                        <br />";
                    $query = "SELECT COUNT(id) as numberOfItems FROM financial_package WHERE team = ".$team['id'];
                    $resultNumber = mysqli_query($conn, $query);
                    $numberOfItemsArr = mysqli_fetch_assoc($resultNumber);
                    $numberOfItems = $numberOfItemsArr['numberOfItems'];
                    $numberOfPages = ceil($numberOfItems / 10);
                    for ($i = 1; $i <= $numberOfPages; $i++) {
                        echo "<button class='btn btn-default pagination pagination".$team['id']."'>".$i."</button> ";
                    }
                    echo "</div>
                                </div>
                               </div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

