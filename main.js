function createAccount () {
    let email = $("#email").val();
    let name_first = $("#name_first").val();
    let name_last = $("#name_last").val();
    let password = $("#password").val();

    let createAccount = $.ajax({
        url: "./services/create_account.php",
        type: "POST",
        data: {
            email: email,
            name_first: name_first,
            name_last: name_last,
            password: password,
        },
        dataType: "json"
    });

    createAccount.fail(function (jqXHR, textStatus) {
        alert("Something went Wrong! (createAccount)" +
            textStatus);
    });

    createAccount.done(
        function (data) { 
            if (data.error.id == "0") {
                // go to another page
            } else {
                alert("Something went wrong");
            }
        });

}

function loginAccount () {
    let email = $("#email").val();
    let password = $("#password").val();

    let loginAccount = $.ajax({
        url: "./services/login_account.php",
        type: "POST",
        data: {
            email: email,
            password: password,
        },
        dataType: "json"
    });

    loginAccount.fail(function (jqXHR, textStatus) {
        alert("Something went Wrong! (loginAccount)" +
            textStatus);
    });

    loginAccount.done(
        function (data) { 
            if (data.error.id == "0") {
                // populate cart shipping and billing
                
                // put name in menu
                $("#loginName").html(`${data.user.billing_name_first} ${data.user.billing_name_last}`)
                
                // populate form of cart
                $("#billing_name_last").val(data.user.billing_name_last);
                $("#billing_name_first").val(data.user.billing_name_first);

                // go to another page or close modal dialog box


            } else if (data.error.id == "200") {
                alert(data.error.message);
            } else {
                alert("Something went wrong");
            }
        });

}


$(window).on("load", function () {
    $("#createAccount").click(
        function () {
            createAccount();
        }
    );

    $("#loginAccount").click(
        function () {
            loginAccount();
        }
    );

});