$(document).ready(function () {
    cartLength();
    //token
    const token = $('meta[name="csrf-token"]').attr('content');
    //search
    $("#search").click(search);
    //cart
    $(".addToCart").click(addToCart);
    //updateAdmin
    $("#updateAdmin").click(updateAdmin);
    //filter by date-registration
    $("#date").change(filterbyRdate);
    //filter by date-log in
    $("#dateLogIn").change(filterByLogInDate);
    //filter by date-logged out
    $("#dateLogOut").change(filterByLoggedOutDate);
    //filter by date-cart
    $("#dateCart").change(filterByCartDate);

    //funkcija za ajax
    function ajaxCallBAck(url, method, data, result) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': token},
            url: url,
            method: method,
            dataType: "json",
            data: data,
            success: result,
            error: function (xhr) {
                writeErrors(xhr.responseJSON.errors);
            }
        });
    }

    //ispis errors-a
    function writeErrors(errors) {
        $.each(errors, function (key, value) {
            $("#msg").html(value);
        });
    }

    //skladistenje u Local Storage
    function setItemToLocalStorage(name, value) {
        localStorage.setItem(name, JSON.stringify(value));
    }

    //vracanje iz Local Storage
    function getItemFromLocalStorage(name) {
        return JSON.parse(localStorage.getItem(name));
    }

    //funkcija za search
    function search(e) {
        e.preventDefault();
        var keyword = $("#keyword").val();

        valueToSend = {
            keyword: keyword
        }

        ajaxCallBAck('/search/' + keyword, "GET", valueToSend, function (result) {
            writeProducts(result, keyword);
        });
    }

    //funkcija za ispis proizvoda iz ajaxa
    function writeProducts(arrayProducts, keyword) {
        var html = "";
        var lastPage = arrayProducts.last_page;
        console.log(lastPage)
        var url = window.location.origin;
        var arrayProducts = arrayProducts.data;
        if (arrayProducts.length != 0) {
            for (var obj of arrayProducts) {
                html += `<div class="col-md-6 MB">
                        <div class="team-item ">
                            <div class="team-image">
                                <a href="/show/${obj.id}">
                                <img src="${url}/asset/images/gallery/${obj.image}" class="img-responsive center-block" alt="${obj.name}">
                                </a>
                            </div>
                            <div class="team-text">
                                <h3>${obj.name} - ${obj.category.name}</h3>`
                for (var obj2 of obj.price) {
                    html += `<div className="team-position">$${obj2.price}</div>`
                }
                html += `</br>
                                            </div>
                                            <input type="button" class="btn btn-secondary MB addToCart ${disabled()}" value="Add to cart" data-id="${obj.id}"/>
                                            </div>
                                    </div>`
            }
        } else {
            html += `<h1 class="text-center">There are no products!</h1>`
        }
        $("#products").html(html);
        $(".addToCart").click(addToCart);
        writePag();

        function writePag() {
            var html2 = "";
            if (lastPage != 1) {
                html2 += `<li class="page-item disabled"><a class="page-link">‹</a></li>`
                for (var i = 1; i <= lastPage; i++) {
                    if(i==1){
                        html2 += `
                <li class="page-item active"><a class="page-link" href="http://127.0.0.1:8000/products/${keyword}?page=${i}">${i}</a></li>`
                    }
                    else{
                        html2 += `
                <li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/products/${keyword}?page=${i}">${i}</a></li>`
                    }

                }
                html2 += `<li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/products/${keyword}?page=${lastPage+1}">›</a></li>`
            }

            $("#pagination").html(html2);
        }
    }

    //funkcija za disable-vanje dugmeta kada nema sesije
    function disabled() {
        var html3 = "";
        var session = $('#session').val();

        if (session) {
            html3 += "";
        } else {
            html3 += "disabled";
        }
        return html3;
    }

    //dohvatanje svih proizvoda
    ajaxCallBAck("/products/get", "GET", "", function (result) {
        setItemToLocalStorage("products", result);
    });


    //funkcija za izracunavanje quantity-ja
    function cartLength() {
        var cartItems = getItemFromLocalStorage("cartItems");
        if (cartItems != null) {
            var nmbOfProd = cartItems.length;
            $("#countCart").html(nmbOfProd);
        }
    }

    //funkcija za korpu
    function addToCart() {
        var products = getItemFromLocalStorage("products");
        var idCart = $(this).attr("data-id");
        var currentLS = catchAll();
        var objectProduct = products.filter(p => p.id == idCart);
        if (!currentLS) {
            notInCurrentLS(objectProduct);
        } else {
            var isInCart = currentLS.some(s => s.id == idCart);
            if (!isInCart) {
                notInCart(objectProduct, currentLS);
            } else {
                alreadyExists(currentLS, idCart);
            }
            setItemToLocalStorage("cartItems", currentLS);
            cartLength();
        }
        alertAddToCart();
    }

    function alertAddToCart() {
        alert("Album has been added to the cart.");
    }

    //dohvatanje svakog proizvoda iz korpe
    function catchAll() {
        return getItemFromLocalStorage("cartItems");
    }

    function notInCurrentLS(objectProduct) {
        objectProduct[0].quantity = 1;
        setItemToLocalStorage("cartItems", objectProduct);
        cartLength();
    }

    function notInCart(objectProduct, currentLS) {
        objectProduct = objectProduct[0];
        objectProduct.quantity = 1;
        currentLS.push(objectProduct);
        cartLength();
    }

    function alreadyExists(currentLS, idCart) {
        currentLS = currentLS.map(m => {
            if (m.id == idCart) {
                m.quantity += 1;
            }
            return m;
        });
    }

    //funkcija za ispis na strani cart
    var cartItems = getItemFromLocalStorage("cartItems");
    if (cartItems == null) {
        $("#cartEmpty").html("Your cart is empty - go back to shopping.");
    } else {
        checkCart();
    }

    function checkCart() {
        var cartItems = getItemFromLocalStorage("cartItems");
        html3 = "";
        html3 += `<table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th class="col-5 ">Products</th>
                <th class="col-2">Price</th>
                <th  class="col-1">Quantity</th>
                <th  class="col-3 text-center">Total</th>
                <th  class="col-2">Remove</th>
            </tr>
            </thead>`
        for (var obj3 of cartItems) {
            html3 += ` <tbody>
                <tr>
                    <td data-th="Product">
                            <div class="col-sm-2 hidden-xs mr-5" >
                                <img src="asset/images/gallery/${obj3.image}" alt="${obj3.name}" class="img-responsive"/>
                            </div>
                            <div class="col-sm-5">
                                <h5>${obj3.name}</h5>
                            </div>
                    </td>`
            for (var obj4 of obj3.price) {
                html3 += `<td data-th="Price">${obj4.price}</td>
                                <td data-th="Quantity">
                                       <p>${obj3.quantity}</p>
                                    </td>
                            <td data-th="Total"  class="text-center">$${(obj4.price * obj3.quantity)}</td>`
            }
            html3 += `<td class="actions">
                        <a href="#" class="btn btn-warning remove" data-id="${obj3.id}" >Remove</a>
                    </td>
                </tr>
            </tbody>`
        }
        html3 += `<tfoot class="MB">
            <tr>
                <td><a href="/products" class="btn btn-warning" id="fontColor"><i class="fa fa-angle-left"></i>Back</a></td>
                <td colspan="1" class="hidden-xs"></td>
                <td><a href="#" class="btn btn-warning" id="clear">Clear</a></td>
                <td class="text-center"><strong id="totalPrice">Total $${totalCost()}</strong></td>
                <td><input type="submit" value="Finish"  class="btn btn-warning" id="finish"/></td>
            </tr>
        </tfoot>
        </table>`
        $("#cartWrite").html(html3);
    }

    $("#finish").click(alertFinish);
    $("#clear").click(clearCartAll);
    $(".remove").click(removeCartItem);

    function alertFinish(e) {
        e.preventDefault();
        if (cartItems.length != 0) {
            var idUser = $("#cartUser").val();
            var dataToSend = {
                data: idUser
            };
            let cart;
            for (let i = 0; i < cartItems.length; i++) {
                cart = "cart" + i;
                dataToSend[cart] = cartItems[i];
            }

            ajaxCallBAck('/cart/store', "POST", dataToSend, function (result) {
                alert(result);
                localStorage.removeItem("cartItems");
                location.reload();
            });
        }
    }

    function clearCartAll(e) {
        e.preventDefault();
        localStorage.removeItem("cartItems");
        location.reload();
    }

    function removeCartItem(e) {
        e.preventDefault();
        var cartItems = getItemFromLocalStorage("cartItems");

        if (cartItems.length == 1) {
            clearCartAll(e);
        } else {
            var idR = $(this).attr("data-id");
            var removeFilter = cartItems.filter(c => c.id != idR);

            setItemToLocalStorage("cartItems", removeFilter);
            location.reload();
        }
    }

    function totalCost() {
        var cartItems = getItemFromLocalStorage("cartItems");
        for (var obj6 of cartItems) {
            if (cartCost != null) {
                for (var obj7 of obj6.price) {
                    setItemToLocalStorage("totalCost", getItemFromLocalStorage("totalCost") + obj7.price * obj6.quantity);
                }
            } else {
                for (var obj8 of obj6.price) {
                    setItemToLocalStorage("totalCost", obj8.price * obj6.quantity);
                }
            }
            var cartCost = getItemFromLocalStorage("totalCost");
        }
        if (cartCost != null) {
            return cartCost;
        } else {
            return 0;
        }
    }

    //funkcija za update adminovog profila
    function updateAdmin() {
        var firstName = $("#nameInputAdmin").val();
        var lastName = $("#lastNameInputAdmin").val();
        var email = $("#emailInputAdmin").val();

        var dataToSend = {
            firstName: firstName,
            lastName: lastName,
            email: email
        }

        ajaxCallBAck("admin/put", "POST", dataToSend, function (result) {
            $("#msg").html(result)
        });
    }

    //funkcija za filter by date-registration
    function filterbyRdate() {
        var valueDate = $(this).val();

        var valueToSend = {
            valueDate: valueDate
        }

        ajaxCallBAck("/adminPanel/activity/registrationFilter", "POST", valueToSend, function (result) {
            writeRegistrationUsers(result.dateUsers);
        });
    }

    //funkcija za ispis iz prethodne funkcije
    function writeRegistrationUsers(arrayUsers) {
        var html4 = "";
        var html5 = "";
        html4 += `<thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">first name</th>
                    <th scope="col">last name</th>
                    <th scope="col">email</th>
                    <th scope="col">role</th>
               </tr>
            </thead>
            <tbody>`
        if (arrayUsers.length != 0) {
            for (var obj9 of arrayUsers) {
                html4 += `<tr>
                             <th scope="row">${obj9.id}</th>
                             <td name="nameUser">${obj9.firstName}</td>
                             <td name="lastNameUser">${obj9.lastName}</td>
                             <td name="emailUser">${obj9.email}</td>
                             <td name="roleUser">${obj9.role.role}</td>
                        </tr>
                    </tbody>`
            }
        } else {
            html5 += `<div class="alert alert-dark">There are no registered users on this date!</div>`
        }
        $("#users").html(html4);
        $("#text").html(html5);
    }

    //funkcija za filter by date-log in
    function filterByLogInDate() {
        var valueDate = $(this).val();

        var valueToSend = {
            valueDate: valueDate
        }

        ajaxCallBAck("/adminPanel/activity/loginFilter", "POST", valueToSend, function (result) {
            writeUsers(result.users, result.roles);
        });
    }

    //funkcija za ispis iz prethodne funckije
    function writeUsers(arrayUsers, arrayRoles) {
        var html6 = "";
        var html7 = "";
        if (arrayUsers.length != 0) {
            for (var obj10 of arrayUsers) {
                html6 += `<tr>
                        <th scope="row">${obj10.user.id}</th>
                        <td name="nameUser">${obj10.user.firstName}</td>
                        <td name="lastNameUser">${obj10.user.lastName}</td>
                        <td name="emailUser">${obj10.user.email}</td>`
                for (var obj11 of arrayRoles) {
                    if (obj11.id == obj10.user.roles_id) {
                        html6 += `<td name="roleUser">${obj11.role}</td>`
                    }
                }
                html6 += `</tr>`
            }
        } else {
            html7 += `<div class="alert alert-dark">There are no loged in users on this date!</div>`
        }
        $("#usersLoggedIn").html(html6);
        $("#text").html(html7);
    }

    //funkcija za filter by date-logged out
    function filterByLoggedOutDate() {
        var valueDate = $(this).val();

        var valueToSend = {
            valueDate: valueDate
        }

        ajaxCallBAck("/adminPanel/activity/loggedOutFilter", "POST", valueToSend, function (result) {
            writeUsers(result.users, result.roles);
        });
    }

    //funkcija za filter by date-cart orders
    function filterByCartDate() {
        var valueDate = $(this).val();

        var valueToSend = {
            valueDate: valueDate
        }

        ajaxCallBAck("/adminPanel/cart/cartFilter", "POST", valueToSend, function (result) {
            writeCartByDate(result.carts, result.orders, result.prices);
        });
    }

    //funkcija za ispis iz prethodne funckije
    function writeCartByDate(arrayCarts, arrayOrders, arrayPrices) {
        var html8 = "";
        var html9 = "";
        var allP = 0;
        if (arrayCarts.length != 0) {
            for (var obj12 of arrayCarts) {
                html8 += `<tr>
                        <th scope="row">${obj12.id}</th>
                        <td name="nameUser">${obj12.user.firstName} ${obj12.user.lastName}</td>
                        <td>
                            <select name="productsCart" class="form-control">
                                <option selected value="0">${obj12.user.firstName}'s products</option>`
                for (var obj13 of arrayOrders) {
                    if (obj13.cart_id == obj12.id) {
                        html8 += `<option value="${obj13.product.id}">${obj13.product.name} (${obj13.quantity})</option>`
                    }
                }
                html8 += `
                            </select>
                        </td>`
                for (var obj14 of arrayOrders) {
                    if (obj14.cart_id == obj12.id) {
                        for (var obj15 of arrayPrices) {
                            if (obj15.products_id == obj14.products_id) {
                                allP += obj15.price * obj14.quantity
                            }
                        }
                    }
                }
                html8 += `<td>$${allP}</td>
            </tr>`
            }
        } else {
            html9 += `<div class="alert alert-dark">There are no orders made on this date by any user!</div>`
        }

        $("#cartDate").html(html8);
        $("#text").html(html9);
    }
})
