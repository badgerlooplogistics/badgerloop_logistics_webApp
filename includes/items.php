<?php

require_once("database.php");

$team = $_POST['team'];
$page = $_POST['page'];

$offset = $page * 10;
$limit = 10;

echo "<table class='table'>
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
        $query = "SELECT * FROM financial_package WHERE team = ".$team." AND status=3 LIMIT ".$offset.", ".$limit;
        $resultItems = mysqli_query($conn, $query);
        while($item = mysqli_fetch_assoc($resultItems)) {
            echo "<tr>
                    <td>".$item['item']."</td>
                    <td>".$item['system']."</td>
                    <td>".$item['act_supplier']."</td>
                    <td>".date_format(date_create($item['date_added']), 'm/d/Y')."</td>
                    <td><button type=\"button\" class=\"btn enquireItem\" data-toggle=\"modal\" data-target=\"#myModal".$item['id']."\"><span class='glyphicon glyphicon-search'></span></button></td>
                    </tr>
                    <div id=\"myModal".$item['id']."\" class=\"modal fade\" role=\"dialog\">
                        <div class=\"modal-dialog\">
                            <div class=\"modal-content\">
                                <div class=\"modal-header\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                    <h4 class=\"modal-title\" style='color:black;'>".$item['item']."</h4>
                                </div>
                                <div class=\"modal-body\">
                                    <p style='color:black;'>
                                        Item: ".$item['item']."<br />
                                        Requested By: ".$item['user_id']." <br/>
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
    </table>";


?>

