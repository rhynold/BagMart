$(document).foundation();

// GLOBAL VARS
let departments = [];
let cart = {};
let products = {};
let size = 0;
let user = {};

/* list of our functions here */


Object.size = function (obj) {
    var size = 0,
        key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) {
            //size++;
            let qty = obj[key];
            let quantity = parseInt(qty);
            size = size + quantity;
        }
    }
    return size;
};

function displayCartValue() {
    size = Object.size(cart);
    $("#cart-link-value").html(size);
}

function getSplash() {
    $(".hideAll").hide();
    $(".splash-page").show();
    $("#search-bar").val("");
}

function getDepartment(url) {

    // alert("getDepartment::" + url);

    $(".hideAll").hide();

    let getDepartment = $.ajax({
        url: "./services/get_products.php",
        type: "POST",
        data: {
            category_name: url
        },
        dataType: "json"
    });

    getDepartment.fail(function (jqXHR, textStatus) {
        alert("Something went Wrong! (getDepartment)" +
            textStatus);
    });

    getDepartment.done(function (data) {

        let content = ``;
        if (data.error.id == "0") {
            $.each(data.products, function (i, item) {
                content += createProductCard(item);
            });
        }
        // alert(content);
        $(".main-page-container").html(content);
        $(".main-page").show();
        // $(".trail-end").html("Home > Department > " + data.department_name);
        // console.log(department_name);
    });
}

function getDepartments() {

    let getDepartments = $.ajax({
        url: "./services/get_categories.php",
        type: "POST",
        dataType: "json"
    });

    getDepartments.fail(function (jqXHR, textStatus) {
        alert("Something went Wrong! (getDepartments)" +
            textStatus);
    });

    getDepartments.done(function (data) {

        let content = ``;

        if (data.error.id == "0") {
            $.each(data.categories, function (i, item) {
                let id = item.id;
                let name = item.name;
                let url = item.url;

                departments[id] = `${name}`;
                content += `<li data-id="${url}" class="get-department">${name}</li>`;
            });
        }
        $(".department-list-container").html(content);
        //console.log(departments);
    });
}


function createProductCard(item) {
    
    let content =``;

    let id = item.id;
    let upc = item.upc;
    let brand = item.brand;
    let product_name = item.product_name;
    let product_description = item.product_description;
    let avg_price = item.avg_price;
    let department_name = item.department_name;
    let image = item.image;

    content += `<div class="cell large-3 small-12 gray-1 produce">
    <div class="card">
    <img src="./${image}">
    <div class="card-section">
    <p class="brand">${brand}</p>
    <p class="upc">${upc}</p>
    <h6>${product_name}</h6>
    <p class="origin">Produce of Canada</p>
    <div class="priceSection">
    <div>
    <span class="price">$${avg_price} ea</span>
    </div>
    <div>
    <button class="reduce reduce-main do-minus" data-id="${id}"> - </button>
    <span id="quantity_${id}" class="quantity"> 1 </span>
    <button class="plus do-plus" data-id="${id}"> + </button>
    </div>
    </div>
    <div class="addSection">
    <div>
    <a href="" class="details">View Product Details</a>
    </div>
    <div>
    <button class="add do-add" data-id="${id}">Add</button>
    </div>
    </div>
    </div>


    </div>
    </div>`;
    return content;
}

function displayCart() {
	let content = `<table>
	<tr>
	<th>Item</th>
	<th>Product</th>
	<th>Quantity</th>
	<th>Unit Price</th>
	<th>Extended Price</th>
	<th>Delete</th>
	<th>&nbsp;</th>
	</tr>`;


    let subtotal = 0.00;
    let total = 0.00;
    let hst = 0.00;
    let hst_sub = 0.00;
    
    $.each(products, function (i, item) {
        let id = item.id;
        let upc = item.upc;
        let brand = item.brand;
        let product_name = item.product_name;
        let product_description = item.product_description;
        let avg_price = parseFloat(item.avg_price);
        let department_name = item.category_name;
        let image_path = item.image_path;
        //let quantity = item.quantity;
        let quantity = cart[id];
        let taxable = item.taxable;
        let h = "&nbsp;";
        
        let price = avg_price.toFixed(2);

        let extended_price = parseInt(quantity) * parseFloat(avg_price);
        let ext_price = extended_price.toFixed(2);

        if (taxable) {
            h = "H";
            hst_sub = hst_sub + extended_price;
        } 


        subtotal = subtotal + extended_price;

        content += `<tr>
        <td>
        ${i + 1}
        </td>
        
        <td>
        <img src="${image_path}" alt="${product_name}">
        <p>${product_name}<br>
        ${brand}<br>
        ${upc}</p>
        </td>

        <td>
        <input type="button" value="-" class="cart-minus" data-id="${id}">
        <span>${quantity}</span>
        <input type="button" value="+"  class="cart-plus" data-id="${id}">
        </td>

        <td>
        $${price}
        </td>

        <td>
        $${ext_price}
        </td>


        <td>
        <input type="button" class="cart-delete button small alert" data-id="${id}" value="Delete">
        </td>
        
        <td>${h}</td>`;
    });

    hst = hst_sub * 0.13;
    total = hst + subtotal;
    let subtotal_print = subtotal.toFixed(2);
    let hst_print = hst.toFixed(2);
    let total_print = total.toFixed(2);

	content += `<tr>
    <td cols="3">&nbsp;</td>
    <td>SUBTOTAL:</td>
    <td>$${subtotal_print}</td>
    </tr>
    <tr>
    <td cols="3">&nbsp;</td>
    <td>HST:</td>
    <td>$${hst_print}</td>
    </tr>
    <tr>
    <td cols="3">&nbsp;</td>
    <td>TOTAL:</td>
    <td>$${total_print}</td>
    </tr>
    
    </table>`;
	$(".cart-info").html(content);
}

function getCart () {

    let myCart = JSON.stringify(cart);
    console.log(myCart);

    let getCart = $.ajax({
        url: "./services/get_products_by_cart.php",
        type: "POST",
        data: {
            json: myCart
        },
        dataType: "json"
    });

    getCart.fail(function (jqXHR, textStatus) {
        alert("Something went Wrong! (getCart)" +
            textStatus);
    });

    getCart.done(function (data) {

        if (data.error.id == "0") {
            products = data.products;
            console.log("PRODUCTS");
            console.log(products);
            displayCart();
        }

        $(".hideallcart").hide();
        // $(".cart1").show();
        $("#cart-container, .cart1").show();
        //console.log(departments);
    });

}


/* Start main code for event handling */

$(window).on("load", function () {

    getDepartments();


    $("#next-shipping").click(
        function () {
            $(".hideallcart").hide();
            $(".cart2").show();
        }
    );

    $("#next-payment").click(
        function () {
            $(".hideallcart").hide();
            $(".cart3").show();
        }
    );

    $("#next-confirm").click(
        function () {
            $(".hideallcart").hide();
            $(".cart4").show();
        }
    );

    $("#next-thank-you").click(
        function () {
            $(".hideallcart").hide();
            $(".cart5").show();
        }
    );

    $("#next-close").click(
        function () {
            $(".hideallcart").hide();
            $(".cart1").show();
            $("#cart-container").foundation("close");
        }
    );



    $("#cart-link").click(
        function () {
            getCart();
        }
    );


    $(".go-login").click(
        function () {
            goLogin();
        }
    );


   

    /* BINDING */

    

    $(".logo").click(
        function () {
            location.href = `#/splash/`;
        }
    );




    $(document).on('click', 'body .do-plus', function () {
        let id = $(this).data("id");
        let quantity = $("#quantity_" + id).html();
        let quantity_num = parseInt(quantity);
        ++quantity_num;
        $("#quantity_" + id).html(quantity_num);
    });

    $(document).on('click', 'body .do-minus', function () {
        let id = $(this).data("id");
        let quantity = $("#quantity_" + id).html();
        let quantity_num = parseInt(quantity);
        --quantity_num;
        if (quantity_num < 1) {
            quantity_num = 1;
        }
        $("#quantity_" + id).html(quantity_num);
    });

    $(document).on('click', 'body .do-add', function () {
        let id = $(this).data("id");
        let quantity = $("#quantity_" + id).html();
        quantity = quantity.trim();
        let quantity_num = parseInt(quantity);

        cart[id] = quantity_num;
        displayCartValue();
        console.log(cart);
    });



    $(document).on('click', 'body .cart-minus', function () {
        let id = $(this).data("id");
        let quantity = cart[id];
        let quantity_num = parseInt(quantity)-1;
        if (quantity_num < 1) {
            quantity_num = 1;
        }
        cart[id] = quantity_num;
        displayCart();
    });

    $(document).on('click', 'body .cart-plus', function () {
        let id = $(this).data("id");
        let quantity = cart[id];
        let quantity_num = parseInt(quantity) + 1;
        cart[id] = quantity_num;
        displayCart();
    });


    $(document).on('click', 'body .cart-delete', function () {
        let product_id = $(this).data("id");
        delete cart[product_id];
        // displayCart();
        
        size = Object.size(cart);

        if (size > 0) {
            getCart();
        } else {
            // displayCart();
            // close window
            $("#cart-container").foundation("close");
            displayCartValue();
        }
        
    });


    $(document).on('click', 'body .get-department', function () {
        let url = $(this).data("id");
        location.href = `#/department/${url}`;
    });


    $(".search-link").click(
        function () {
            location.href = `#/department/21`;
        }
    );

    $(".cart-link").click(
        function () {
            location.href = `#/cart/`;
        }
    );

    $(".checkout-link").click(
        function () {
            location.href = `#/checkout/`;
        }
    );
    $(".login-link").click(
        function () {
            location.href = `#/login/`;
        }
    );
    $(".signUp-link").click(
        function () {
            location.href = `#/signup/`;
        }
    );
    $(".payment-link").click(
        function () {
            location.href = `#/payment/`;
        }
    );
    $(".back-link").click(
        function () {
            location.href = `#/checkout/`;
        }
    );
    $(".complete-link").click(
        function () {
            location.href = `#/ordercomplete/`;
        }
    );

    $(".back-main").click(
        function () {
            location.href = `#/splash/`;
        }
    );

    /* ROUTING */

    var app = $.sammy(function () {

        this.get('#/splash/', function () {
            getSplash();
        });

        this.get('#/department/:department', function () {
            let url = this.params["department"];
            getDepartment(url);
        });

        this.get('#/search/:search', function () {
            let id = this.params["search"];
            getSearch(id);
        });

        this.get('#/cart/', function () {
            getCart();
        });

        this.get('#/createaccount/', function () {
            getPerson();
        });

        this.get('#/login/', function () {
            getLogin();
        });

        this.get('#/signup/', function () {
            getSignup();
        });

        this.get('#/checkout/', function () {
            getCheckout();
        });

        this.get('#/payment/', function () {
            getPayment();
        });

        this.get('#/confirm/', function () {
            getConfirm();
        });

        this.get('#/ordercomplete/', function () {
            getComplete();
        });

    });

    // default when page first loads
    $(function () {
        app.run('#/splash/');
    });


});