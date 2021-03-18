$(document).ready(function() {
    if($("#no-elements").length) {
        $("#order_form").hide();
    }

    $(".order-error").hide();

    $("#orderSuccess").hide();
   
})


var orderObj = {};

function submitOrder() {
    orderObj.user_id = parseInt($("#user_id").val());
    orderObj.name = $("#name").val();
    orderObj.phone = $("#phone").val();
    orderObj.country = $("#country").val();
    orderObj.city = $("#city").val();
    orderObj.address = $("#address").val();
    orderObj.card_number = $("#card_number").val();
    orderObj.cvv = $("#cvv").val();
    orderObj.total_price = $("#totalPrice").html();

    $(".order-error").hide();

    ajax(
        '/order',
        'POST',
        orderObj,
        function(data) {
            console.log(data);
            
            $("#cartDiv").fadeOut();

            $("#orderSuccess").fadeIn();
            $("#orderSuccess").html(data.message);
        },
        function(xhr) {
            console.log(xhr);

            printOrderErrors(xhr.responseJSON.errors);
        },
        'json'
    );


}

function printOrderErrors(errors) {
    for(const [key, value] of Object.entries(errors)) {
        // console.log(key, value);

        $("#" + key + 'Error').html(value);
        $("#" + key + 'Error').fadeIn();
    }

}


// events

$(document).on('click', '#submitOrder', submitOrder);