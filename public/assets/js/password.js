$(document).ready(function() {
    $("#emailError").hide();
})


function sendResetEmail(e) {
    e.preventDefault();

    let email = $("#email").val();

    $("#emailError").hide();

    ajax(
        '/password/reset',
        'POST',
        {
            email,
            _token: token
        },
        function(data) {
            console.log(data);

            $("#passwordResponse").removeClass('alert-danger').addClass('alert-info');
            $("#emailResponse").html(data.message);
        },
        function(xhr) {
            console.log(xhr);

            $("#emailError").html(xhr.responseJSON.errors.email);
            $("#emailError").fadeIn();

        }
    )

}

function submitNewPassword(e) {
    e.preventDefault();

    let validatorToken = $("#validatorToken").val();

    let password = $("#password").val();
    let password_confirmation = $("#password_confirmation").val();

    $("#password").removeClass("border border-danger");

    ajax(
        '/password/new',
        'POST',
        {
            password,
            password_confirmation,
            _token: token,
            validatorToken
        },
        function(data) {
            console.log(data);

            $("#passwordResponse").removeClass('alert-danger').addClass('alert-success');
            $("#passwordResponse").html(data.message);
        },
        function(xhr) {
            console.log(xhr);

            $("#password").addClass("border border-danger");
            $("#passwordError").html(xhr.responseJSON.errors.password);
        }
    )

}

// events
$(document).on('click', '#btnReset', sendResetEmail);

$(document).on('click', '#submitNewPassword', submitNewPassword);

