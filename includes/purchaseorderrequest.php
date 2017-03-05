<div class="panel panel-default" id="section2">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        <div class="panel-heading">
            <h1 class="panel-title pagination-centered">
                Request Purchase
            </h1>
        </div></a>
    <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row" id="successMessagePOR" style="display: none;">
                <div class="col-xs-0 col-md-3">
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> Your request has been submitted.
                    </div>
                </div>
                <div class="col-xs-0 col-md-3">
                </div>
            </div>
            <div class="row" id="failureMessagePOR" style="display: none;">
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
                            <option value="1">Administration</option>
                            <option value="2">Batteries</option>
                            <option value="3">Braking</option>
                            <option value="4">Composites</option>
                            <option value="5">Controls</option>
                            <option value="6">Electronics</option>
                            <option value="7">Fabrication</option>
                            <option value="8">Propulsion</option>
                            <option value="9">Software</option>
                            <option value="10">Structural Analysis</option>
                            <option value="11">Structural Design</option>
                            <option value="12">Suspension and Stability</option>
                            <option value="13">Virtual Reality</option>
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
                        <input type="link" id="requestFormLink" class="form-control" placeholder="Link">
                    </div>
                    <div class="col-xs-0 col-md-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-0 col-md-3">
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <input type="text" id="requestFormCost" class="form-control" placeholder="Individual Cost">
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
                            <option value="3">- Choose Location -</option>
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
                        <button class="form-control btn" id="requestFormSubmit">Submit</button>
                    </div>
                    <div class="col-xs-0 col-md-3">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>