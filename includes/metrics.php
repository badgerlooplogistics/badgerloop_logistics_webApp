<div class="panel panel-default" id="section3">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        <div class="panel-heading">
            <h1 class="panel-title pagination-centered">
                Metrics
            </h1>
        </div></a>
    <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Team</th>
                            <th>Expenses to date</th>
                            <th>BOM budget</th>
                            <th>Available funds</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = "SELECT * FROM teams ORDER BY list_order";
                        $result = mysqli_query($conn, $query);
                        while($team = mysqli_fetch_assoc($result)) {
                            $available = $team['bom_total'] - $team['spent_total'];
                            echo "<tr>
                                    <td>{$team['team_name']}</td>
                                    <td>".money_format('$%i',$team['spent_total'])."</td>
                                    <td>".money_format('$%i',$team['bom_total'])."</td>
                                    <td";
                            if ($available < 0) {
                                echo " style='color:#CC3333;'";
                            }
                            echo ">".money_format('$%i',$available)."</td>
                                    </tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>