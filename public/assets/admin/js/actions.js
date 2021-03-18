function submitDate() {
    let date = $("#created_at").val() ? $("#created_at").val() : "";
    let selectAll;

    if($("#select_all:checked").length == 0) {
        selectAll = false;
    } else {
        selectAll = true;
    }

    ajax(
        '/admin/actions/filter',
        'get',
        {
            date,
            selectAll
        },
        function (response) {
            console.log(response);

            printActions(response);

        },
        function (xhr, status, error) {
            console.log(xhr, status, error);

        },
        "json"
    );

}

function printActions(data) {
    let out = "";

    for(let i = 0; i < data.length; i++) {
        out += `
            <tr>
                <td>${i + 1}</td>
                <td>${ data[i].action }</td>
                <td>${ data[i].user.first_name + ' ' + data[i].user.last_name }</td>
                <td>${ data[i].created_at}</td>
            </tr>
        `;

        console.log(data[i].created_at);
    }

    $("#table_actions").html(out);
}

function emptyDate() {
    $("#created_at").val("");

}

// events
$(document).on('click', '#submitDate', submitDate);

$(document).on('click', '#select_all', emptyDate);