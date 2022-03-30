var products = [
    {
        id: 0,
        title: "mars",
        price: 22,
        count: 100,
    },
    {
        id: 1,
        title: "Anton",
        price: 100,
        count: 1,
    },
    {
        id: 2,
        title: "milka",
        price: 35,
        count: 53,
    },
    {
        id: 3,
        title: "twix",
        price: 30,
        count: 34,
    },
];
var cart = [];
console.log(products);

function showAllProducts() {
    var catalog = document.getElementById("catalog");
    for(item of products) {
        var product = createProduct(item);    
        catalog.appendChild(product);
    }

    showCart();
}
function showCart() {
    var cart_elem = document.getElementById("cart");
    cart_elem.innerHTML = "";
    for(item of cart) {
        var product = createProduct(item);
        product.removeChild(product.getElementsByTagName("button")[0]);
        cart_elem.appendChild(product);
    }
}

function createProduct(item) {
    var product = document.createElement("div");
    product.className = "product";

    var t = document.createElement("div");
    t.className = "title";
    t.innerText = item.title;
    product.appendChild(t);

    var price = document.createElement("div");
    price.className = "price";
    price.innerText = item.price;
    product.appendChild(price);

    var btn = document.createElement("button");
    btn.innerText = "BUY!";
    btn.onclick = addProductToCart;
    btn.id = item.id;
    product.appendChild(btn);

    return product;
}

function addProductToCart(event) {
    var id = event.target.id;
    for(p of products) {
        if(p.id == (id + "")) {
            var np = p;
            np.count = 1;
            console.log(np);
            cart.push(np);

            showCart();
            break;
        }
    }
}
