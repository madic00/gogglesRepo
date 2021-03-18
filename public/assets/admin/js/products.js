$(document).ready(function() {

    if($("input[name='gender_id']:checked").length == 0) {
        $("#gender_male").prop('checked', 'true');
    }

    if($("input[name='featured']:checked").length == 0) {
        $("#featured_true").prop('checked', 'true');
    }

    if($("input[name='is_active']:checked").length == 0) {
        $("#active_yes").prop('checked', 'true');
    }

});

var searchObj = {};

function changePage(e) {
    e.preventDefault();

    let page = $(this).data('page');

    searchObj.keyword = $("#keyword").val();
    searchObj.sort = $("#sort").val();
    searchObj.number = $("#entities").val();

    getProducts(page, searchObj);

}

function searchProducts() {
    searchObj.keyword = $("#keyword").val();
    searchObj.sort = $("#sort").val();
    searchObj.number = $("#entities").val();

    getProducts(1, searchObj);
}

function getProducts(page, searchObj) {
    const caller = arguments.callee.caller.name;

    searchObj.page = page;

    ajax(
        '/admin/products/fetch',
        'get',
        searchObj,
        function (response) {
            console.log(response.data);

            if(caller == 'searchProducts') {
                changePagination(response.last_page, response.current_page);
            }

            if(caller == 'changePage') {
                changeActivePageLink(response.current_page);
            }

            printProducts(response.data);

        },
        function (xhr, status, error) {
            console.log(xhr, status, error);

        },
        "json"
    );
}

function printProducts(data) {
    let out = "";

    for (let i = 0; i < data.length; i++) {
        out += `
        <tr>
            <td>${i + 1}</td>
            <td>${data[i].name }</td>
            <td>
                
                <img src="${publicFolder}assets/images/${data[i].name}/${data[i].image}" class="img-fluid admin-img" alt="Product ${data[i].name}" />
            </td>
            <td>$${data[i].price}</td>
            <td>${data[i].brand_name}</td>
            <td>${data[i].is_active ? 'Yes' : 'No'}</td>
            <td>
                ${data[i].gender_id ? 'Male' : 'Female'}
            </td>
            <td>
                <a href="/admin/products/${data[i].id}/edit" ><i class="fas fa-fw fa-edit fa-lg"></i></a>
            </td>
            <td>
                <form action="/admin/products/${data[i].id}" method="POST" class="delete-form">
                    <input type="hidden" name="_token" value="${token}">
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" /><i class="fas fa-fw fa-trash fa-lg"></i></button>

                </form>

            </td>
        </tr>
        `;
    }

    $("#table_products").html(out);
}

function changePagination(totalLinks, currentPage){
    let html = "";
    for(let i = 1; i <= totalLinks; i++){
        if(i != currentPage){
            html += `<li class="page-item"><a class="page-link" id="link${i}" data-page="${i}" href="#">${i}</a></li>`;
        }else{
            html += `<li class="page-item active"><a class="page-link" id = "link${i}" data-page="${i}" href="#">${i}</a></li>`;
        }
    }
    $(".pagination").html(html);
    $(".page-link").click(changePage);
}

function changeActivePageLink(currentPage){
    $('.page-item').removeClass('active');
    $('#link' + currentPage).parent().addClass('active');
}


// events
$(document).on('click', '.page-link', changePage);
$(document).on('click', '#submitFilters', searchProducts);