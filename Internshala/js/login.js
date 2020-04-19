$('document').ready(function () {
    /* handle form validation */
    $("#user_login_form").validate({
        rules:
        {

            login_pass: {
                required: true,
                minlength: 8,
                maxlength: 15
            },

            login_email: {
                required: true,
                email: true
            },
        },
        messages:
        {

            password: {
                required: "please provide a password",
                minlength: "password at least have 8 characters"
            },
            login_email: "please enter a valid email address",

        },

        submitHandler: submitloginForm
    });

    console.log('karan');
    /* handle form submit */
    function submitloginForm() {
        var data = $("#user_login_form").serialize();
        console.log('karan');
        $.ajax({
            type: 'POST',
            url: 'user_login.php',
            data: data,
            beforeSend: function () {
                $("#error").fadeOut();
                $("#login_button").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
            },
            success: function (response) {
                if (response == "success") {
                    $("#login_button").html('<img src="ajax-loader.gif" />   Signing In ...');
                    setTimeout(' window.location.href = "dashboard.php"; ', 4000);
                }

                else {
                    $("#error").fadeIn(1000, function () {
                        $('#error').html('<h6 class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>' + response + '</h6>')
                        
                        $("#login_button").html('<span class="glyphicon glyphicon-log-in"></span>   Login ');
                    });
                }
            }
        });
        return false;
    }
});



