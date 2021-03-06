<div class="panel panel-default" id="section2">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        <div class="panel-heading">
            <h1 class="panel-title pagination-centered">
                Purchase Item
            </h1>
        </div></a>
    <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row" id="successMessagePOTD" style="display: none;">
                <div class="col-xs-0 col-md-3">
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> Your order has been submitted.
                    </div>
                </div>
                <div class="col-xs-0 col-md-3">
                </div>
            </div>
            <div class="row" id="failureMessagePOTD" style="display: none;">
                <div class="col-xs-0 col-md-3">
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Failure!</strong> Please complete the required fields.
                    </div>
                </div>
                <div class="col-xs-0 col-md-3">
                </div>
            </div>
            <div id="requestForm">
                <div class="row">
                    <div class="col-xs-0 col-md-3">
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <input type="text" id="requestFormItem" class="form-control" placeholder="Item">
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <select id="requestFormSystem" class="form-control" placeholder="System">
                            <option value="">- Choose System -</option>
                            <option value="Administration">Administration</option>
                            <option value="Batteries">Batteries</option>
                            <option value="Braking">Braking</option>
                            <option value="Composites">Composites</option>
                            <option value="Controls">Controls</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Fabrication">Fabrication</option>
                            <option value="Propulsion">Propulsion</option>
                            <option value="Software">Software</option>
                            <option value="Structural Analysis">Structural Analysis</option>
                            <option value="Structural Design">Structural Design</option>
                            <option value="Suspension and Stability">Suspension and Stability</option>
                            <option value="Virtual Reality">Virtual Reality</option>
                        </select>
                    </div>
                    <div class="col-xs-0 col-md-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-0 col-md-3">
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <input type="text" id="requestFormSupplier" class="form-control" placeholder="Supplier">
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <input type="text" id="requestFormSupplierLink" class="form-control" placeholder="Link">
                    </div>
                    <div class="col-xs-0 col-md-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-0 col-md-3">
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <input type="text" id="requestFormCost" class="form-control " placeholder="Individual Cost">
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <input type="number" id="requestFormQuantity" class="form-control" min="1" placeholder="Quantity">
                    </div>
                    <div class="col-xs-0 col-md-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-0 col-md-3">
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <select class="form-control" id="requestFormLocation">
                            <option value="0">- Choose Location -</option>
                            <option value="0">EEHQ</option>
                            <option value="1">MEHQ</option>
                            <option value="2">Other</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <select class="form-control" id="requestFormPriority">
                            <option value="4">- Choose Shipping Priority -</option>
                            <option value="1">Overnight</option>
                            <option value="2">2-3 Business Days</option>
                            <option value="3">3-5 Business Days</option>
                            <option value="5">Amazon Prime</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-0 col-md-3">
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <textarea id="requestFormDesc" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <div class="col-xs-0 col-md-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-0 col-md-3">
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <input type="hidden" id="requestFormUser" value="<?php echo $_SESSION['user']; ?>">
                        <button class="form-control btn" id="requestFormSubmitTD">Submit</button>
                    </div>
                    <div class="col-xs-0 col-md-3">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>