$("#searchItem").keyup(function () {
    var query = $(this).val();
    if (query.length > 0) {
        $("#searchResults").show();
        var teamId = $("#searchTeam").val();
        var dataString = "search=" + query + "&team=" + teamId;
        $.ajax({
            type: "POST",
            url: "includes/search.php",
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
            url: "includes/search.php",
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
    var item = $("#requestFormItem").val();
    var system = $("#requestFormSystem").val();
    var desc = $("#requestFormDesc").val();
    var supplier = $("#requestFormSupplier").val();
    var quantity = $("#requestFormQuantity").val();
    var cost = $("#requestFormCost").val();
    var priority = $("#requestFormPriority").val();
    var user = $("#requestFormUser").val();

    var dataString = "item=" + item + "&system=" + system + "&desc=" + desc + "&supplier=" + supplier + "&quantity=" + quantity + "&cost=" + cost + "&priority=" + priority + "&user=" + user;
    alert(dataString);
    $.ajax({
        type: "POST",
        url: "includes/request.php",
        data: dataString,
        success: function (data) {
            if (data == "success") {
                alert('Success!');
            } else {
                alert('Something went wrong.');
            }
            alert(data)
        },
        error: function (data) {
            alert("error");
        }
    });
});