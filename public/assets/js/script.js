$(document).ready(function() {
    $("#addedToCartSuccess").hide();
})

const token = $('meta[name="csrf-token"]').attr('content');

function ajax(url, method, data, success, error, dataType = "json", contentType = "application/x-www-form-urlencoded; charset=UTF-8", processData = true) {
    $.ajax({
        url: baseUrl + url,
        method: method,
        data: data,
        dataType: dataType,
        success: success,
        error: error,
        contentType: contentType,
        processData: processData
    })
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': token
    }
});

var login_data = new FormData();
var cart_data = new FormData();

function setDataForLogin() {
    login_data.set('email', $("#loginEmail").val());
    login_data.set('password', $("#loginPassword").val());
    login_data.set('_token', token);

}

function login() {
    setDataForLogin();

    ajax(
        '/login',
        'POST',
        login_data,
        function(data) {
            console.log(data);

            $(".loginResponse").html(data.message);
        },
        function(data) {
            if(data.responseJSON.errors)
                printErrors(data.responseJSON.errors, 'loginResponse');
        },
        'json',
        false,
        false
    )

}

function printErrors(errors, selector) {
    let content = `<ul class='text-danger'>`;
    for(error of Object.keys(errors)) {
        content += '<li>'+ errors[error][0] +'</li>';
    }
    content += '</ul>';

    $("." + selector).html(content);
}

function addProductToCart(productId) {
    cart_data.set('productId', productId);

    ajax(
        '/cart',
        'POST',
        {
            productId,
            _token: token
        },
        function (data) {
            console.log(data);
            // alert(data.message);

            $("#addedToCartSuccess").fadeIn();

            $("#addedToCartSuccess").html(data.message);

            toggleAlert();

        },
        function (xhr, status, error) {
            console.log(xhr, status, error);

            let statusCode = xhr.status;

            window.location.href = baseUrl + '/login';
        }
    );

}

function toggleAlert() {
    setTimeout(function() { 
        $("#addedToCartSuccess").fadeOut();
    }, 2500);
}

function removeProductFromCart(productId) {
    // cart_data.set('productId', productId);

    ajax(
        '/cart',
        'DELETE',
        {
            productId,
            _token: token
        },
        function (data) {
            console.log(data);

            $("#row" + productId).remove();

            let totalPrice = 0;

            for (const el of data.itemsInCart) {
                totalPrice += el.quantity * parseFloat($("#priceProduct" + el.product_id).html());                
            }

            $("#totalPrice").html(totalPrice);

        },
        function (xhr, status, error) {
            console.log(xhr, status, error);
            
            let statusCode = xhr.status;
            
            if(statusCode == 400) {
                $("#cartDiv").html(`<h4 id="no-elements">You emptied the cart</h4>`);
            }

        }
    );

}

function changeQuantity() {
    let value = parseInt($(this).val());
    let productId = $(this).data('productid');

    if(value < 1) {
        $(this).val(1);

        return;
    }

    ajax(
        '/cart',
        'PUT',
        {
            quantity: value,
            productId,
            _token: token
        },
        function(data) {
            console.log(data);

            let totalPrice = 0;

            for (const el of data.itemsInCart) {
                totalPrice += el.quantity * parseFloat($("#priceProduct" + el.product_id).html());                
            }

            $("#totalPrice").html(totalPrice);

        },
        function(xhr, status, error) {
            console.log(xhr, status, error);
        },
    )

}


// products
var searchObj = {};

function changePage(e) {
    e.preventDefault();

    let page = $(this).data('page');

    searchObj.keyword = $("#keyword").val();
    searchObj.sort = $("#sort").val();
    searchObj.gender = $("input[name='gender']:checked").val();
    searchObj.categories = [];

    $.each($("input[name='category_ids[]']:checked"), function() {
        searchObj.categories.push($(this).val());
    });

    searchObj.brands = [];

    $.each($("input[name='brand_ids[]']:checked"), function() {
        searchObj.brands.push($(this).val());
    });

    getProducts(page, searchObj);

}

function searchProducts() {
    searchObj.keyword = $("#keyword").val();
    searchObj.sort = $("#sort").val();
    searchObj.gender = $("input[name='gender']:checked").val();
    searchObj.categories = [];

    $.each($("input[name='category_ids[]']:checked"), function() {
        searchObj.categories.push($(this).val());
    });

    searchObj.brands = [];

    $.each($("input[name='brand_ids[]']:checked"), function() {
        searchObj.brands.push($(this).val());
    });

    getProducts(1, searchObj);
}

function getProducts(page, searchObj) {
    const caller = arguments.callee.caller.name;

    searchObj.page = page;

    ajax(
        '/products/fetch',
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

    for (const product of data) {
        out += `
             <div class="col-md-3 product-men women_two my-3">
                <div class="product-googles-info googles">
                    <div class="men-pro-item">
                        <div class="men-thumb-item">
                            <img src="${publicFolder}assets/images/${product.name}/${product.image}" class="img-fluid" alt="" />
                            <div class="men-cart-pro">
                                <div class="inner-men-cart-pro">
                                    <a href="products/${product.id}" class="link-product-add-cart">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="item-info-product">
                            <div class="info-product-price">
                                <div class="grid_meta">
                                    <div class="product_price">
                                        <h4>
                                            <a href="products/${product.id}">${product.name}</a>
                                        </h4>
                                        <div class="grid-price mt-2">
                                            <span class="money ">$${product.price}</span>
                                        </div>
                                    </div>
                                    <ul class="stars">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="googles single-item hvr-outline-out">

                                    <form action="#" method="post">

                                        <button type="button" class="googles-cart pgoogles-cart cartBtn" data-productid=" ${product.id }">
                                            <i class="fas fa-cart-plus"></i>
                                        </button>

                                    </form>

                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    $("#products").html(out);
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
$(document).on('click', '#btnLogin', login);


$(document).on('click', '.cartBtn', function() {
    let productId = parseInt($(this).data('productid'));

    addProductToCart(productId);
});

$(document).on('click', '.removeProductFromCart', function() {
    let productId = parseInt($(this).data('productid'));

    removeProductFromCart(productId);
});

$(document).on('blur', '.quantity', changeQuantity);

// products
$(document).on('click', '.page-link', changePage);

$(document).on('click', '#submitFilters', searchProducts);
