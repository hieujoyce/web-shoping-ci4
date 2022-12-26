const keyCart = "myCart";
// { id, name, qty, price, image }

function getDataCart() {
  let dataCart = JSON.parse(localStorage.getItem(keyCart)) || [];
  return dataCart;
}

function addItemCart(id, name, qty, price, image) {
  const item = { id, name, qty, price, image };
  let dataCart = JSON.parse(localStorage.getItem(keyCart)) || [];
  const index = dataCart.findIndex((el) => el.id === id);
  if (index === -1) {
    dataCart.push(item);
    alert("Add this product in the cart success");
  } else {
    alert("This product already exists in the cart");
  }
  localStorage.setItem(keyCart, JSON.stringify(dataCart));
  loadViewCartIcon();
}

function removeItemCart(id) {
  let bool = confirm("Are you want delete this product out cart");
  if (bool) {
    let dataCart = JSON.parse(localStorage.getItem(keyCart)) || [];
    dataCart = dataCart.filter((el) => el.id !== id);
    localStorage.setItem(keyCart, JSON.stringify(dataCart));
    loadViewCartIcon();
  }
}

function addCountItemCart(id) {
  let dataCart = JSON.parse(localStorage.getItem(keyCart)) || [];
  const index = dataCart.findIndex((el) => el.id === +id);
  if (index === -1) return;
  dataCart[index].qty = dataCart[index].qty + 1;
  localStorage.setItem(keyCart, JSON.stringify(dataCart));
  loadViewCartIcon();
}

function subCountItemCart(id) {
  let dataCart = JSON.parse(localStorage.getItem(keyCart)) || [];
  const index = dataCart.findIndex((el) => el.id === +id);
  if (index === -1) return;
  if (dataCart[index].qty <= 1) {
    dataCart[index].qty = 1;
  } else {
    dataCart[index].qty = dataCart[index].qty - 1;
  }
  localStorage.setItem(keyCart, JSON.stringify(dataCart));
  loadViewCartIcon();
}

function getTotalCart(dataCart) {
  return dataCart.reduce((a, b) => a + b.price * b.qty, 0);
}

function getTotalItemCart(id, dataCart) {
  const index = dataCart.findIndex((el) => el.id === id);
  if (index === -1) return 0;
  return dataCart[index].price * dataCart[index].qty;
}

function loadViewCartIcon() {
  let dataCart = JSON.parse(localStorage.getItem(keyCart)) || [];
  const countItem = document.querySelector(".header__nav__option > a > span");
  countItem.innerHTML = dataCart.length;
  const priceTotal = document.querySelector(".header__nav__option > div.price");
  priceTotal.innerHTML = `$${getTotalCart(dataCart).toFixed(2)}`;
  loadViewCartDetail(dataCart);
}

function loadViewCartDetail(dataCart) {
  const bodyCart = document.querySelector(
    ".shopping__cart__table > table > tbody"
  );
  const subtotal = document.querySelector(
    ".cart__total > ul > li:first-child > span"
  );
  if (subtotal) subtotal.innerHTML = `$${getTotalCart(dataCart).toFixed(2)}`;
  const totalPrice = document.querySelector(
    ".cart__total > ul > li:last-child > span"
  );
  if (totalPrice)
    totalPrice.innerHTML = `$${getTotalCart(dataCart).toFixed(2)}`;
  const checkoutTotalProducts = document.querySelector(
    "ul.checkout__total__products"
  );
  if (checkoutTotalProducts) {
    checkoutTotalProducts.innerHTML = dataCart
      .map((el, index) => {
        return `<li>${index + 1}. ${el.name} <span>$${getTotalItemCart(
          el.id,
          dataCart
        ).toFixed(2)}</span></li>`;
      })
      .join("");
  }

  const checkoutTotalAll = document.querySelector("ul.checkout__total__all");
  if (checkoutTotalAll) {
    checkoutTotalAll.innerHTML = `<li>Subtotal <span>$${getTotalCart(
      dataCart
    ).toFixed(2)}</span></li><li>Total <span>$${getTotalCart(dataCart).toFixed(
      2
    )}</span></li>`;
  }
  if (bodyCart) {
    let content = dataCart
      .map((el) => {
        return `
        <tr>
          <td class="product__cart__item">
            <div class="product__cart__item__pic">
              <img style="height: 100px; width: 100px; object-fit: cover;" src="${
                el.image
              }" alt="">
            </div>
            <div class="product__cart__item__text">
              <h6>${el.name}</h6>
              <h5>$${el.price}</h5>
            </div>
          </td>
          <td class="quantity__item">
            <div class="quantity">
              <div class="pro-qty-2">
                <span class="fa fa-angle-left dec qtybtn" onclick="subCountItemCart(${
                  el.id
                })"></span>
                <input type="text" value="${el.qty}">
                <span class="fa fa-angle-right inc qtybtn" onclick="addCountItemCart(${
                  el.id
                })"></span>
              </div>
            </div>
          </td>
          <td class="cart__price">$${getTotalItemCart(el.id, dataCart).toFixed(
            2
          )}</td>
          <td class="cart__close"><i class="fa fa-close" onclick="removeItemCart(${
            el.id
          })"></i></td>
        </tr>
      `;
      })
      .join("");
    bodyCart.innerHTML = content;
  }
}

loadViewCartIcon();
