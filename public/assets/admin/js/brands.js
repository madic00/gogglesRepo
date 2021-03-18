$(document).ready(function() {

    if($("input[name='active']:checked").length == 0) {
        $("#active_yes").prop('checked', 'true');
    }

});