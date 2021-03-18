$(document).ready(function() {
    $(".contact-error").hide();
});

function sendEmail(e) {
    e.preventDefault();

    $(".contact-error").hide();

    let name = $("#name").val();
    let email = $("#email").val();
    let subject = $("#subject").val();
    let message = $("#message").val();

    ajax(
        "/contact",
        "POST",
        {
            name,
            email,
            subject,
            message,
            _token: token
        },
        function(data) {
            console.log(data);

            $(".contact-error").hide();

            $("#emailStatus").addClass("alert-success");
            $("#emailStatus").html(data.message);

        },
        function(xhr) {
            console.log(xhr);

            $("#emailStatus").html('');
            $("#emailStatus").removeClass('alert-success');

            printContactErrors(xhr.responseJSON.errors);
        }
    );
    
}

function printContactErrors(errors) {
    for(const [key, value] of Object.entries(errors)) {
        // console.log(key, value);

        $("#" + key + 'Error').html(value);
        $("#" + key + 'Error').fadeIn();
    }

}

// events
$(document).on('click', '#submitContact', sendEmail);