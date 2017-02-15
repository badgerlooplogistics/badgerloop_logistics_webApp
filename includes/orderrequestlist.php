<div class="panel panel-default" id="section2B">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2B">
        <div class="panel-heading">
            <h1 class="panel-title pagination-centered">
                Pending Requests
            </h1>
        </div></a>
    <div id="collapse2B" class="panel-collapse collapse">
        <div class="panel-body">
            <?php
                $query = "SELECT * FROM financial_package WHERE status = 0 ORDER BY shipping_priority ASC";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                 echo "<div class='table-responsive'>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Date</th>
                                    <th>Requested By</th>
                                    <th>Shipping Priority</th>
                                    <th style='text-align: center;'>Actions</th>
                                    <th style='text-align: center;'>More</th>
                                </tr>
                            </thead>
                            <tbody>";
                    
                    while($request = mysqli_fetch_assoc($result)) {
                        switch($request['shipping_priority']) {
                            case 1:
                                $priority = "Overnight";
                                break;
                            case 2:
                                $priority = "2-3 Business Days";
                                break;
                            case 5:
                                $priority = "Amazon Prime";
                                break;
                            default:
                                $priority = "3-5 Business Days";
                        }
                        if ($request['shipping_location'] == 0) {
                            $shippingLocation = "EEHQ";
                        }
                        if ($request['shipping_location'] == 1) {
                            $shippingLocation = "MEHQ";
                        } else {
                            $shippingLocation = "Chamberlin";
                        }
                        
                        if ($request['system'] == 1) {
                            $system = "Administration";
                        }
                        if ($request['system'] == 2) {
                            $system = "Batteries";
                        }
                        if ($request['system'] == 3) {
                            $system = "Braking";
                        }
                        if ($request['system'] == 4) {
                            $system = "Composites";
                        }
                        if ($request['system'] == 5) {
                            $system = "Controls";
                        }
                        if ($request['system'] == 6) {
                            $system = "Electronics";
                        }
                        if ($request['system'] == 7) {
                            $system = "Fabrication";
                        }
                        if ($request['system'] == 8) {
                            $system = "Propulsion";
                        }
                        if ($request['system'] == 9) {
                            $system = "Software";
                        }
                        if ($request['system'] == 10) {
                            $system = "Structural Analysis";
                        }
                        if ($request['system'] == 11) {
                            $system = "Structural Design";
                        }
                        if ($request['system'] == 12) {
                            $system = "Suspension and Stability";
                        } else {
                            $system = "Virtual Reality";
                        }
                    
                        echo "<tr id='requestListTr".$request['id']."'>
                                <td>".$request['item']."</td>
                                <td>".date_format(date_create($request['date_added']), 'm/d/Y')."</td>
                                <td>".$request['user_id']."</td>
                                <td>".$priority."</td>
                                <td style='text-align: center;'><button id='".$request['id']."' class='btn requestListButton requestListButtonApprove'><span class='glyphicon glyphicon-ok'></span></button> <button id='".$request['id']."' class='btn requestListButton requestListButtonReject'><span class='glyphicon glyphicon-remove'></span></button></td>
                                <td style='text-align: center;'><button class=\"btn requestListButton\" data-toggle=\"modal\" data-target=\"#myModal".$request['id']."\"><span class='glyphicon glyphicon-search'></span></button></td>
                                </tr>

                                <div id=\"myModal".$request['id']."\" class=\"modal fade\" role=\"dialog\" >
                                    <div class=\"modal-dialog\" >
                                        <div class=\"modal-content\" >
                                            <div class=\"modal-header\" >
                                                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" >&times;</button>
                                                <h4 class=\"modal-title\" style='color:black;'>".$request['item']."</h4>
                                            </div>
                                            <div class=\"modal-body\">
                                                <p style='color:black;'>
                                                    Requested By: ".$request['user_id']."<br />
                                                    Item: ".$request['item']."<br />
                                                    System: ".$request['system']."<br />
                                                    Item Description: ".$request['item_disc']."<br />
                                                    Date Added: ".date_format(date_create($request['date_added']), 'm/d/Y')."<br />
                                                    BOM Supplier: <a href='".$request['link']."' target='_blank'>".$request['bom_supplier']."</a><br />
                                                    Estimated Quantity: ".$request['est_quantity']."<br />
                                                    Estimated Individual Cost: ".money_format('$%i',$request['est_individual_cost'])."<br />
                                                    Shipping location: ".$shippingLocation."<br />

                                                </p>
                                            </div>
                                            <div class=\"modal-footer\">
                                                <button type=\"button\" class=\"btn btn -default\" data-dismiss=\"modal\">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>";
                    }

                    echo "</tbody>
                         </table>
                        </div>";
                } else {
                    echo "<p style='text-align:center;'><i>No purchase order requests at this time.</i></p>";
                }
            ?>
        </div>
    </div>
</div>