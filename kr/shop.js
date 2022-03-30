var img_url = "https://www.nasa.gov/sites/default/files/styles/image_card_4x3_ratio/public/thumbnails/image/pia24805-1-1041.jpg";
var catalog = {
    "soups": [
        { name: "Борщ", price: 60, image: img_url, },
        { name: "Обычный", price: 50, image: img_url, },
        { name: "НеОбычный", price: 90, image: img_url, },
        { name: "Щи", price: 90, image: img_url, },
        { name: "Секретный рецепт", price: 90, image: img_url, },
    ],
    "drinks": [
        { name: "Лимонад", price: 30, image: img_url, },
        { name: "Пиво", price: 30, image: img_url, },
        { name: "Вода из под крана", price: 30, image: img_url, },
    ],
    "desserts": [
        { name: "Сахара", price: 30, image: img_url, },
        { name: "Мороженое", price: 93, image: img_url, },
        { name: "Топлёное", price: 100, image: img_url, },
        { name: "Последнее", price: 54, image: img_url, },
    ],
    "salads": [
        { name: "Крабовый", price: 60, image: img_url, },
        { name: "Оливье", price: 39, image: img_url, },
        { name: "Деревенский", price: 25, image: img_url, },
    ],
};
var current_category = "soups";

function redraw_catalog() {
    var products_list_elem = document.getElementById("products_list");

    var category_name_elem = document.getElementById("category_name");
    category_name_elem.innerText = get_rus_category_name(current_category);

    products_list_elem.innerHTML = "";
    for (item of catalog[current_category]) {
        var product = createProduct(item);
        products_list_elem.appendChild(product);
    }
}

function createProduct(item) {
    var product = document.createElement("div");
    product.className = "product";

    var img = document.createElement("img");
    img.src = item.image;
    product.appendChild(img);

    var name = document.createElement("span");
    name.className = "product__name";
    name.innerText = item.name;
    product.appendChild(name);

    var price = document.createElement("span");
    price.className = "product__price";
    price.innerText = item.price;
    product.appendChild(price);

    return product;
}

function change_category(e) {
    current_category = e.id;
    redraw_catalog();
}

function get_rus_category_name(c) {
    switch(c) {
        case "soups":
            return "Супы";
        case "drinks":
            return "Напитки";
        case "desserts":
            return "Десерты";
        case "salads":
            return "Салаты";
        default:
            return "Данная категория ещё не русифицирована"
    }
}
