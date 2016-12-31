<div class="panel panel-default" id="section2">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        <div class="panel-heading">
            <h1 class="panel-title pagination-centered">
                Approved Orders
            </h1>
        </div></a>
    <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
            <?php
            $query = "SELECT * FROM financial_package WHERE status=1 ORDER BY shipping_priority ASC";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                ?>
                <div class='table-responsive'>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Item</th>
                        <th>Date</th>
                        <th>Shipping Priority</th>
                        <th style="text-align:center;">Purchase</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    while ($item = mysqli_fetch_assoc($result)) {
                        switch ($item['shipping_priority']) {
                            case 1:
                                $priority = "Overnight";
                                break;
                            case 2:
                                $priority = "2-3 Business Days";
                                break;
                            default:
                                $priority = "3-5 Business Days";
                        }
                        if ($item['shipping_location'] == 0) {
                            $shippingLocation = "EEHQ";
                        } else {
                            $shippingLocation = "Chamberlin";
                        }
                        $id = $item['id'];
                        echo "<tr id='approvedOrderTr".$id."'>
                                <td>" . $item['item'] . "</td>
                                <td>" . date_format(date_create($item['date']), 'm-d-Y') . "</td>
                                <td>" . $priority . "</td>
                                <td style='text-align:center;'><a class='purchaseButton' data-toggle=\"modal\" data-target=\"#myModal" . $item['id'] . "\"><span class='glyphicon glyphicon-shopping-cart'></span></a></td>
                                </tr>";

                        echo "<div id='myModal" . $item['id'] . "' class='modal fade' role='dialog'>
                                    <div class=\"modal-dialog\" >
                                        <div class=\"modal-content\">
                                            <div class=\"modal-header\" >
                                                <button type = \"button\" class=\"close\" data-dismiss = \"modal\" >&times;</button>
                                                <h4 class=\"modal-title\" style = 'color:black;' > " . $item['item'] . "</h4>
                                            </div>
                                            <div class=\"modal-body\">
                                                <p style='color:black;'>
                                                    Item: " . $item['item'] . "<br />
                                                    System: " . $item['system'] . "<br />
                                                    Item Description: " . $item['item_disc'] . "<br />
                                                    Date Added: " . date_format(date_create($item['date_added']), 'm/d/Y') . "<br />
                                                    BOM Supplier: <a href='" . $item['link'] . "' target='_blank'>" . $item['bom_supplier'] . "</a><br />
                                                    Estimated Quantity: " . $item['est_quantity'] . "<br />
                                                    Estimated Individual Cost: " . money_format('$%i', $item['est_individual_cost']) . "<br />
                                                    Shipping location: " . $shippingLocation . "<br />
                                                </p><br />
                                                <p style='color:black;'>
                                                <p style='color:black;font-weight:300;text-align:center;'>Purchasing Information</p>
                                                <input type='text' class='form-control' placeholder='Supplier' id='approvedOrderSupplier'><br />
                                                <input type='text' class='form-control' placeholder='Individual Cost' id='approvedOrderCost'><br />
                                                <input type='number' class='form-control' min='1' placeholder='Quantity' id='approvedOrderQuantity'><br />
                                                <input type='text' class='form-control' placeholder='Shipping cost' id='approvedOrderShipping'><br />
                                                <input type='text' class='form-control' placeholder='Tax' id='approvedOrderTax'><br />
                                                <input type='hidden' id='approvedOrderUser' value='" . $_SESSION['user'] . "'>
                                                <input type='hidden' id='approvedOrderId' value='{$id}'>
                                                <textarea class='form-control' id='approvedOrderComments' placeholder='Comments'></textarea>
                                                </p>
                                            </div>
                                            <div class=\"modal-footer\">
                                                <button type='button' class='btn btn-default addBOMButton' id='addBOMButton'>Add to BOM</button> <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>";
                    }
                    ?>
                    </tbody>
                </table>
                    </div>
                <?php
            } else {
                echo "<p style='text-align: center;'><i>No approved orders at this time.</i></p>";
            }
            ?>
        </div>
    </div>
</div>
