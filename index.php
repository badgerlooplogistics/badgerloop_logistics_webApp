<?php

    session_start();
    require_once("includes/database.php");
    if (!isset($_SESSION['login'])) {
        header("location: login.php");
    }
    date_default_timezone_set('America/Chicago');

?>
<!doctype html>
<html lang="en">
<head>
    <title>Badgerloop Logistics</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
<!--    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <style>
        #requestForm input {
            width: 100%;
            margin-bottom: 10px;
        }
        #requestForm textarea {
            width: 100%;
            margin-bottom: 10px;
        }
        #requestForm select {
            background-color: white;
            color: #333;
            width: 100%;
            margin: 0;
            margin-bottom: 10px;
        }
        #requestForm button {
            border: 1px solid white;
            background-color: #407db7;
            color: white;
            margin-bottom: 30px;
            font-weight: 300;
        }
        #requestForm button:hover {
            border: 1px solid white;
            background-color: white;
            color: #407db7;
            font-weight: 300;
        }
    </style>
</head>
<body>

<?php
    include_once("includes/header.php");
    include_once("includes/bom.php");
    if ($_SESSION['access'] == 0) { // regular user
        include_once("includes/purchaseorderrequest.php");
    } elseif ($_SESSION['access'] == 1) { // technical director
        include_once("includes/purchaseordertechdir.php");
        include_once("includes/orderrequestlist.php");
    } else { // financial director
        include_once("includes/approvedorderlist.php");
    }
    include_once("includes/metrics.php");
    //include_once("includes/sponsors.php");
?>
<script>
    $("#searchItem").keyup(function () {
        var query = $(this).val();
        if (query.length > 0) {
            $("#searchResults").show();
            var teamId = $("#searchTeam").val();
            var dataString = "search=" + query + "&team=" + teamId;
            $.ajax({
                type: "POST",
                url: "includes/ajax/search.php",
                data: dataString,
                success: function (data) {
                    $("#searchResults").html(data);
                },
                error: function (data) {
                    // error
                }
            });
        } else {
            $("#searchResults").hide();
        }

    });

    $("#searchTeam").change(function () {
        var query = $("#searchItem").val();
        if (query.length > 0) {
            $("#searchResults").show();
            var teamId = $("#searchTeam").val();
            var dataString = "search=" + query + "&team=" + teamId;
            $.ajax({
                type: "POST",
                url: "includes/ajax/search.php",
                data: dataString,
                success: function (data) {
                    $("#searchTable").html(data);
                },
                error: function (data) {
                    // error
                }
            });
        } else {
            $("#searchTable").html("");
            $("#searchResults").hide();
        }

    });

    $(".pagination1").click(function () {
        var page = $(this).html() - 1;
        var dataString = "team=1&page=" + page;
        //alert(dataString);
        $.ajax({
            type: "POST",
            url: "includes/items.php",
            data: dataString,
            success: function (data) {
                //alert(data);
                $("#itemsTeam1").html(data);
            },
            error: function (data) {
                alert("error");
            }
        });

    });

    $(".pagination2").click(function () {
        var page = $(this).html() - 1;
        var dataString = "team=2&page=" + page;
        //alert(dataString);
        $.ajax({
            type: "POST",
            url: "includes/items.php",
            data: dataString,
            success: function (data) {
                //alert(data);
                $("#itemsTeam2").html(data);
            },
            error: function (data) {
                alert("error");
            }
        });

    });
    $(".pagination3").click(function () {
        var page = $(this).html() - 1;
        var dataString = "team=3&page=" + page;
        //alert(dataString);
        $.ajax({
            type: "POST",
            url: "includes/items.php",
            data: dataString,
            success: function (data) {
                //alert(data);
                $("#itemsTeam3").html(data);
            },
            error: function (data) {
                alert("error");
            }
        });

    });
    $(".pagination4").click(function () {
        var page = $(this).html() - 1;
        var dataString = "team=4&page=" + page;
        //alert(dataString);
        $.ajax({
            type: "POST",
            url: "includes/items.php",
            data: dataString,
            success: function (data) {
                //alert(data);
                $("#itemsTeam4").html(data);
            },
            error: function (data) {
                alert("error");
            }
        });

    });
    $(".pagination5").click(function () {
        var page = $(this).html() - 1;
        var dataString = "team=5&page=" + page;
        //alert(dataString);
        $.ajax({
            type: "POST",
            url: "includes/items.php",
            data: dataString,
            success: function (data) {
                //alert(data);
                $("#itemsTeam5").html(data);
            },
            error: function (data) {
                alert("error");
            }
        });

    });
    $(".pagination6").click(function () {
        var page = $(this).html() - 1;
        var dataString = "team=6&page=" + page;
        //alert(dataString);
        $.ajax({
            type: "POST",
            url: "includes/items.php",
            data: dataString,
            success: function (data) {
                //alert(data);
                $("#itemsTeam6").html(data);
            },
            error: function (data) {
                alert("error");
            }
        });

    });
    $(".pagination7").click(function () {
        var page = $(this).html() - 1;
        var dataString = "team=7&page=" + page;
        //alert(dataString);
        $.ajax({
            type: "POST",
            url: "includes/items.php",
            data: dataString,
            success: function (data) {
                //alert(data);
                $("#itemsTeam7").html(data);
            },
            error: function (data) {
                alert("error");
            }
        });

    });
    $(".pagination8").click(function () {
        var page = $(this).html() - 1;
        var dataString = "team=8&page=" + page;
        //alert(dataString);
        $.ajax({
            type: "POST",
            url: "includes/items.php",
            data: dataString,
            success: function (data) {
                //alert(data);
                $("#itemsTeam8").html(data);
            },
            error: function (data) {
                alert("error");
            }
        });

    });
    

    $("#requestFormSubmit").click(function() {
        console.log('hi');
        var item = $("#requestFormItem").val();
        var system = $("#requestFormSystem").val();
        var desc = $("#requestFormDesc").val();
        var supplier = $("#requestFormSupplier").val();
        var quantity = $("#requestFormQuantity").val();
        var cost = $("#requestFormCost").val();
        var priority = $("#requestFormPriority").val();
        var user = $("#requestFormUser").val();
        var link = $("#requestFormLink").val();
        var location = $("#requestFormLocation").val();

        if (item == "" || quantity == "" || cost == "") {
            if (item == "") {
                $("#requestFormItem").css("border","2px solid red");
            }
            if (quantity == "") {
                $("#requestFormQuantity").css("border", "2px solid red");
            }
            if (cost == "") {
                $("#requestFormCost").css("border", "2px solid red");
            }
            $("#failureMessagePOR").show("fade");
        } else {
            var dataString = "item=" + item + "&system=" + system + "&desc=" + desc + "&supplier=" + supplier + "&quantity=" + quantity + "&cost=" + cost + "&priority=" + priority + "&user=" + user  + "&link=" + link + "&location=" + location;
            $("#failureMessagePOR").hide("fade");
            $("#requestFormItem").css("border","none");
            $("#requestFormQuantity").css("border","none");
            $("#requestFormCost").css("border","none");
            $.ajax({
                type: "POST",
                url: "includes/ajax/request.php",
                data: dataString,
                success: function (data) {
                    if (data == "success") {
                        console.log(data);
                        $("#successMessagePOR").show("fade");
                        $("#requestFormItem").val("");
                        console.log("#requestFormItem".val(""));
                        $("#requestFormSystem").val("");
                        $("#requestFormDesc").val("");
                        $("#requestFormSupplier").val("");
                        $("#requestFormQuantity").val("");
                        $("#requestFormCost").val("");
                        $("#requestFormPriority").val("4");
                        $("#requestFormLocation").val("0");
                        $("#requestFormLink").val("");
                    } else {
                        $("#failureMessagePOR").show("fade");
                        console.log("#requestFormItem".val(""));
                        console.log(data);
                        console.log(dataString);
                    }
                },
                error: function (data) {
                    alert("error");
                    console.log(data);
                }
            });
        }
    });

    $("#requestFormSubmitTD").click(function() {
        var item = $("#requestFormItem").val();
        var system = $("#requestFormSystem").val();
        var desc = $("#requestFormDesc").val();
        var supplier = $("#requestFormSupplier").val();
        var quantity = $("#requestFormQuantity").val();
        var cost = $("#requestFormCost").val();
        var link = $("#requestFormSupplierLink").val();
        var user = $("#requestFormUser").val();
        var priority = $("#requestFormPriority").val();
        var location = $("#requestFormLocation").val();

        if (item == "" || quantity == "" || cost == "") {
            if (item == "") {
                $("#requestFormItem").css("border", "2px solid red");
            }
            if (quantity == "") {
                $("#requestFormQuantity").css("border", "2px solid red");
            }
            if (cost == "") {
                $("#requestFormCost").css("border", "2px solid red");
            }
            $("#failureMessagePOTD").show("fade");
        } else {
            $("#failureMessagePOR").hide("fade");
            $("#requestFormItem").css("border","none");
            $("#requestFormQuantity").css("border","none");
            $("#requestFormCost").css("border","none");
            var dataString = "item=" + item + "&system=" + system + "&desc=" + desc + "&supplier=" + supplier + "&quantity=" + quantity + "&cost=" + cost + "&link=" + link + "&user=" + user + "&priority=" + priority + "&location=" + location;
            $.ajax({
                type: "POST",
                url: "includes/ajax/request_td.php",
                data: dataString,
                success: function (data) {
                    if (data == "success") {
                        $("#successMessagePOTD").show("fade");
                        $("#requestFormItem").val("");
                        $("#requestFormSystem").val("");
                        $("#requestFormDesc").val("");
                        $("#requestFormSupplier").val("");
                        $("#requestFormQuantity").val("");
                        $("#requestFormCost").val("");
                        $("#requestFormSupplierLink").val("");
                        $("#requestFormPriority").val("4");
                        $("#requestFormLocation").val("0");

                    } else {
                        $("#failureMessagePOTD").show("fade");
                    }
                },
                error: function (data) {
                    alert("error");
                }
            });
        }
    });

    $(".requestListButtonApprove").click(function() {
        // approve request

        var requestId = $(this).attr('id');
        var dataString = "id=" + requestId;
        $.ajax({
           type: "POST",
            url: "includes/ajax/requestListApprove.php",
            data: dataString,
            success: function(data) {
                console.log(data);
                var tr = "requestListTr" + requestId;
                $("#"+tr).hide("fade");
            },
            error: function(data) {
                console.log(data);

            }
        });

    });

    $(".requestListButtonReject").click(function() {
        // reject request
        var mess = prompt("Please enter your reason for the rejection:", "");
        if (mess != null) {
            var requestId = $(this).attr('id');
            var dataString = "id=" + requestId + "&mess=" + mess;
            $.ajax({
                type: "POST",
                url: "includes/ajax/requestListReject.php",
                data: dataString,
                success: function(data) {
                    var tr = "requestListTr" + requestId;
                    $("#"+tr).hide("fade");
                    console.log(data);
                },
                error: function(data) {

                }
            });
        }
        //console.log(data);
    });

    $("#addBOMButton").click(function() {
        console.log("Add to BOM button");
        var supplier = $("#approvedOrderSupplier").val();
        var cost = $("#approvedOrderCost").val();
        var quantity = $("#approvedOrderQuantity").val();
        var shipping = $("#approvedOrderShipping").val();
        var tax = $("#approvedOrderTax").val();
        var comments = $("#approvedOrderComments").val();
        var id = $("#approvedOrderId").val();
        
        var dataString = "id=" + id + "&supplier=" + supplier + "&cost=" + cost + "&quantity=" + quantity + "&shipping=" + shipping + "&tax=" + tax + "&comments=" + comments;
        //var dataString = "Testing";
        console.log(dataString);
        $.ajax({
            type: "POST",
            url: "includes/ajax/addBOM.php",
            data: dataString,
            success: function(data) {
                $('#myModal'+id).modal('hide');
                var tr = "approvedOrderTr" + id;
                $("#"+tr).hide("fade");
                console.log(data);
            },
            error: function(data) {
            console.log(data);
            }
        });
        //console.log("Add to BOM button1");
    });

</script>
</body>
</html>