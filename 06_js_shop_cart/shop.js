var catalog = [
    {
        id: 0,
        name: "mars",
        price: 22,
        count: 36,
        image: "https://www.nasa.gov/sites/default/files/styles/image_card_4x3_ratio/public/thumbnails/image/pia24805-1-1041.jpg",
    },
    {
        id: 1,
        name: "Anton",
        price: 100,
        count: 1,
        image: "https://img.lovepik.com/element/40032/4699.png_860.png",
    },
    {
        id: 2,
        name: "milka",
        price: 35,
        count: 53,
        image: "https://upload.wikimedia.org/wikipedia/ru/4/4f/Milka_cow.jpg",
    },
    {
        id: 3,
        name: "twix",
        price: 30,
        count: 40,
        image: "https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Twix_opened.jpg/330px-Twix_opened.jpg",
    },
];
var cart = [];

function redrawCatalogAndCart() {
    var catalog_elem = document.getElementById("catalog");
    catalog_elem.innerHTML = "";
    for (item of catalog) {
        var product = createProduct(item);

        var buy_btn = document.createElement("button");
        buy_btn.innerText = "BUY!";
        buy_btn.onclick = (ev) => {
            cartIncById(ev.target.id);
        };
        buy_btn.id = "btn_buy" + item.id;
        product.getElementsByClassName("btns_block")[0].appendChild(buy_btn);

        catalog_elem.appendChild(product);
    }

    redrawCart();
}
function redrawCart() {
    var cart_elem = document.getElementById("cart");
    cart_elem.innerHTML = "";
    for (item of cart) {
        var product = createProduct(item);

        var dec_btn = document.createElement("button");
        dec_btn.innerText = "-";
        dec_btn.onclick = (ev) => {
            cartDecById(ev.target.id);
        };
        dec_btn.id = item.id;
        dec_btn.id = "btn_cartDec" + item.id;
        product.getElementsByClassName("btns_block")[0].appendChild(dec_btn);

        var inc_btn = document.createElement("button");
        inc_btn.innerText = "+";
        inc_btn.onclick = (ev) => {
            cartIncById(ev.target.id);
        };
        inc_btn.id = item.id;
        inc_btn.id = "btn_cartInc" + item.id;
        product.getElementsByClassName("btns_block")[0].appendChild(inc_btn);

        cart_elem.appendChild(product);
    }

    var total_sum_elem = cart_createElemTotalCount();
    cart_elem.appendChild(total_sum_elem);
}

function createProduct(item) {
    var product = document.createElement("div");
    product.className = "product";

    var t = document.createElement("div");
    t.className = "name";
    t.innerText = item.name;
    product.appendChild(t);

    var img = document.createElement("img");
    img.src = item.image;
    product.appendChild(img);

    var price = document.createElement("div");
    price.className = "price";
    price.innerText = item.price;
    product.appendChild(price);

    var count = document.createElement("div");
    count.className = "count";
    count.innerText = item.count;
    product.appendChild(count);

    var btns_block = document.createElement("div");
    btns_block.className = "btns_block";
    product.appendChild(btns_block);

    return product;
}

function cartDecById(id) {
    // convert to int
    id = id.replace(/\D/g, '');
    id *= 1

    var catalog_item = findItemInCatalog(id);

    catalog_item.count += 1;

    var cart_item = findItemInCart(id);

    if (cart_item.count == 1) {
        cart.splice(cart.indexOf(cart_item), 1);
    } else {
        cart_item.count -= 1;
    }

    redrawCatalogAndCart();
}
function cartIncById(id) {
    // convert to int
    id = id.replace(/\D/g, '');
    id *= 1

    var catalog_item = findItemInCatalog(id);
    if (catalog_item.count == 0) {
        alert("No " + catalog_item.name + " more available");
        return;
    }

    catalog_item.count -= 1;

    var cart_item = findItemInCart(id);
    if (cart_item != null) {
        cart_item.count += 1;
    } else {
        // no item in cart yet, so creating new one
        var cart_item = {
            id: catalog_item.id,
            name: catalog_item.name,
            price: catalog_item.price,
            count: 1,
            image: catalog_item.image,
        }
        cart.push(cart_item);
    }

    redrawCatalogAndCart();
}

function cartClear() {
    for(cart_item of cart) {
        var catalog_item = findItemInCatalog(cart_item.id);
        catalog_item.count += cart_item.count;
    }
    cart = [];

    redrawCatalogAndCart();
}

// helper functions
function findItemInCatalog(id) {
    for (item of catalog) {
        if (item.id == id) {
            return item;
        }
    }
    return null;
}
function findItemInCart(id) {
    for (item of cart) {
        if (item.id == id) {
            return item;
        }
    }
    return null;
}

function cart_createElemTotalCount() {
    var elem = document.createElement("div");

    var count = 0;
    var price_sum = 0;
    for(cart_item of cart) {
        count += cart_item.count;
        price_sum += cart_item.price * cart_item.count;
    }

    elem.innerHTML = "Count: " + count + "<br>" + "Price sum: " + price_sum;
    return elem;
}
