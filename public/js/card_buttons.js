document.addEventListener("DOMContentLoaded", () => {
  const btn = document.querySelectorAll(".add_to_cart");
  for (let i = 0; i < btn.length; i++) {
    btn[i].addEventListener("click", function () {
      if (this.innerHTML === "В корзине") {
        window.open("./cart.html");
      } else {
        this.innerHTML = "В корзине";
        this.classList.add("active");
      }
    });
  }
});

// Получаем ссылку на кнопку "В корзину"
var addToCartButton = document.querySelector(".add_to_cart");

// Добавляем обработчик события клика на кнопку
addToCartButton.addEventListener("click", function () {
  // Получаем данные о товаре
  var itemName = document.querySelector(".item_name").textContent;
  var price = document.querySelector(".price p").textContent;

  // Создаем объект с данными о товаре
  var itemData = {
    name: itemName,
    price: price,
  };

  // Преобразуем объект в строку JSON
  var itemDataJSON = JSON.stringify(itemData);

  // Передаем данные о товаре на другую страницу
  // Здесь вы можете использовать методы для передачи данных на другую страницу, такие как localStorage, URL-параметры или отправка POST-запроса на сервер.

  // Пример использования localStorage:
  localStorage.setItem("cartItem", itemDataJSON);

  // Переходим на другую страницу
  window.location.href = "cart.html";
});
