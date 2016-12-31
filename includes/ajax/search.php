<?php

    require_once("../database.php");

    $search = $_POST['search'];
    $teamId = $_POST['team'];

    if ($teamId > 0) {
        $teamQuery = "AND team = ".$teamId;
    } else {
        $teamQuery = "";
    }



    $query = "SELECT * FROM financial_package WHERE (item LIKE '%".$search."%' OR item_disc LIKE '%".$search."%' OR act_supplier LIKE '%".$search."%') ".$teamQuery." AND status=3 ORDER BY item ASC LIMIT 10";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<table class=\"table\" style=\"font-weight: 300\">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Team</th>
                    <th>System</th>
                    <th>Supplier</th>
                    <th>Date added</th>
                    <th>More</th>
                </tr>
            </thead>
            <tbody id=\"searchTable\">";
        while($item = mysqli_fetch_assoc($result)) {
            $teamId = $item['team'];
            $query = "SELECT team_name FROM teams WHERE id=".$teamId;
            $resultTeam = mysqli_query($conn, $query);
            $team = mysqli_fetch_assoc($resultTeam);
            echo "<tr>
                <td>".$item['item']."</td>
                <td>".$team['team_name']."</td>
                <td>".$item['system']."</td>
                <td>".$item['act_supplier']."</td>
                <td>".date_format(date_create($item['date_added']), 'm/d/Y')."</td>
                <td><button type=\"button\" class=\"btn enquireItem\" data-toggle=\"modal\" data-target=\"#search".$item['id']."\"><span class='glyphicon glyphicon-search'></span></button></td>
              </tr>
              <div id=\"search".$item['id']."\" class=\"modal fade\" role=\"dialog\">
                    <div class=\"modal-dialog\" >
                        <div class=\"modal-content\" >
                            <div class=\"modal-header\" >
                                <button type=\"button\" class=\"close\" data-dismiss = \"modal\" >&times;</button>
                                <h4 class=\"modal-title\" style='color:black;' >".$item['item']."</h4>
                            </div>
                            <div class=\"modal-body\">
                                <p style='color:black;'>
                                    Item: ".$item['item']."<br />
                                    System: ".$item['system']."<br />
                                    Item Description: ".$item['item_disc']."<br />
                                    Date Added: ".date_format(date_create($item['date_added']), 'm/d/Y')."<br />
                                    BOM Supplier: ".$item['bom_supplier']."<br />
                                    Estimated Quantity: ".$item['est_quantity']."<br />
                                    Estimated Individual Cost: ".money_format('$%i', $item['est_individual_cost'])."<br />
                                    Actual Supplier: <a href='".$item['link']."' target='_blank'>".$item['act_supplier']."</a><br />
                                    Actual Quantity: ".$item['act_quantity']."<br />
                                    Actual Individual Cost: ".money_format('$%i', $item['act_individual_cost'])."<br />
                                    Shipping: ".money_format('$%i', $item['shipping'])."<br />
                                    Tax: ".money_format('$%i', $item['tax'])."<br />
                                    Date Purchased: ".date_format(date_create($item['date_purchased']),'m/d/Y')."<br />
                                    Purchased By: ".$item['purchased_by']."<br />
                                    Date Reimbursed: ".date_format(date_create($item['date_reimbursed']), 'm/d/Y')."<br />
                                    COTS or Custom: ".$item['cots_custom']."<br />
                                    Comments: ".$item['comments']."<br />
                                </p>
                            </div>
                            <div class=\"modal-footer\">
                                <button type=\"button\" class=\"btn btn -default\" data-dismiss=\"modal\">Close</button>
                            </div>
                        </div>

                    </div>
                </div>";
        }
    } else {
        echo "<em>No results found.</em>";
    }
    echo "</tbody></table>";


?>