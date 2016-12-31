<div class="panel panel-default" id="section4">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        <div class="panel-heading">
            <h1 class="panel-title pagination-centered">
                Sponsorship
            </h1>
        </div></a>
    <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="panel-group" id="sponsorAccordion">
                <?php
                $sponsorLevel = array("Platinum", "Gold", "Silver", "Bronze", "Unclassified");
                for($i = 0; $i < 5; $i++) {
                    echo "<div class='panel panel-default sponsorPanel'>
                                <a data-toggle='collapse' data-parent='#sponsorAccordion' style='color:black;' href='#collapseSponsor".$sponsorLevel[$i]."'>
                                <div class='panel-heading sponsorPanelHeading'>
                                    <h4 class='panel-title'>".$sponsorLevel[$i]."</h4>
                                </div></a>
                                <div id='collapseSponsor".$sponsorLevel[$i]."' class='panel-collapse collapse'>
                                    <div class='panel-body table-responsive'>
                                        <table class='table'>
                                            <thead>
                                                <th>Sponsor</th>
                                                <th>Commitment date</th>
                                                <th>Amount</th>
                                                <th style='text-align: center;'>Invoice</th>
                                            </thead>
                                            <tbody>";
                    if ($i == 4) {
                        $sponsorLevel[$i] = "";
                    }
                    $query = "SELECT * FROM sponsors WHERE level_sponsor = '".$sponsorLevel[$i]."'";
                    $result = mysqli_query($conn, $query);
                    while($sponsor = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                                        <td>".$sponsor['name']."</td>
                                                        <td>".date_format(date_create($sponsor['commit_date']), 'm/d/Y')."</td>
                                                        <td>".money_format('$%i',$sponsor['amount'])."</td>
                                                        <td style='text-align: center;'><a href='".$sponsor['invoice']."' style='color: white;' target='_blank'><span class='glyphicon glyphicon-file'></span></a></td>
                                                        </tr>";
                    }
                    echo "</tbody>
                                        </table>
                                    </div>
                               </div>
                            </div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>