<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Male_Fashion Template">
  <meta name="keywords" content="Male_Fashion, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <base href="<?= base_url().'/user/' ?>">
  <title>Male-Fashion | Template</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
  <link rel="stylesheet" href="css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Offcanvas Menu Begin -->
  <div class="offcanvas-menu-overlay"></div>
  <div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
      <div class="offcanvas__links">
        <a href="#">Sign in</a>
        <a href="#">FAQs</a>
      </div>
      <div class="offcanvas__top__hover">
        <span>Usd <i class="arrow_carrot-down"></i></span>
        <ul>
          <li>USD</li>
          <li>EUR</li>
          <li>USD</li>
        </ul>
      </div>
    </div>
    <div class="offcanvas__nav__option">
      <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
      <a href="#"><img src="img/icon/heart.png" alt=""></a>
      <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
      <div class="price">$0.00</div>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
      <p>Free shipping, 30-day return or refund guarantee.</p>
    </div>
  </div>
  <!-- Offcanvas Menu End -->

  <!-- Header Section Begin -->
  <header class="header">
    <div class="header__top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-7">
            <div class="header__top__left">
              <p>Hiếu Joyce</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-5">
            <div class="header__top__right">
              <div class="header__top__links">
                <!-- <a href="#">Sign in</a> -->
                <a href="#">FAQs</a>
              </div>
              <div class="header__top__hover">
                <span>hieujoyce01 <i class="arrow_carrot-down"></i></span>
                <ul>
                  <li>Profile</li>
                  <li>My Orders</li>
                  <li><a href="<?= base_url().'/login' ?>">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="header__logo">
            <a href="<?= base_url() ?>"><img src="img/logo.png" alt="" /></a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <nav class="header__menu mobile-menu">
            <ul>
              <li><a href="<?= base_url() ?>">Home</a></li>
              <li class="active"><a href="<?= base_url().'/shop' ?>">Shop</a></li>
              <li><a href="<?= base_url().'/contacts' ?>">Contacts</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-3 col-md-3">
          <div class="header__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt="" /></a>
            <a href="#"><img src="img/icon/heart.png" alt="" /></a>
            <a href="<?= base_url().'/shopping-cart' ?>"><img src="img/icon/cart.png" alt="" /> <span>10</span></a>
            <div class="price">$0.00</div>
          </div>
        </div>
      </div>
      <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
  </header>
  <!-- Header Section End -->

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-option">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb__text">
            <h4>Shop</h4>
            <div class="breadcrumb__links">
              <a href="./index.html">Home</a>
              <span>Shop</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Shop Section Begin -->
  <section class="shop spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="shop__sidebar">
            <div class="shop__sidebar__search">
              <form action="#">
                <input type="text" placeholder="Search...">
                <button type="submit"><span class="icon_search"></span></button>
              </form>
            </div>
            <div class="shop__sidebar__accordion">
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                  </div>
                  <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="shop__sidebar__categories">
                        <ul class="nice-scroll">
                          <?php foreach($categories as $category): ?>
                          <li><a href="#"><?= $category['categories_name'] ?> (<?= $category['count'] ?>)</a></li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                  </div>
                  <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="shop__sidebar__brand">
                        <ul>
                          <li><a href="#">Louis Vuitton</a></li>
                          <li><a href="#">Chanel</a></li>
                          <li><a href="#">Hermes</a></li>
                          <li><a href="#">Gucci</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                  </div>
                  <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="shop__sidebar__price">
                        <ul>
                          <li><a href="#">$0.00 - $50.00</a></li>
                          <li><a href="#">$50.00 - $100.00</a></li>
                          <li><a href="#">$100.00 - $150.00</a></li>
                          <li><a href="#">$150.00 - $200.00</a></li>
                          <li><a href="#">$200.00 - $250.00</a></li>
                          <li><a href="#">250.00+</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                  </div>
                  <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="shop__sidebar__size">
                        <label for="xs">xs
                          <input type="radio" id="xs">
                        </label>
                        <label for="sm">s
                          <input type="radio" id="sm">
                        </label>
                        <label for="md">m
                          <input type="radio" id="md">
                        </label>
                        <label for="xl">xl
                          <input type="radio" id="xl">
                        </label>
                        <label for="2xl">2xl
                          <input type="radio" id="2xl">
                        </label>
                        <label for="xxl">xxl
                          <input type="radio" id="xxl">
                        </label>
                        <label for="3xl">3xl
                          <input type="radio" id="3xl">
                        </label>
                        <label for="4xl">4xl
                          <input type="radio" id="4xl">
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseFive">Colors</a>
                  </div>
                  <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="shop__sidebar__color">
                        <label class="c-1" for="sp-1">
                          <input type="radio" id="sp-1">
                        </label>
                        <label class="c-2" for="sp-2">
                          <input type="radio" id="sp-2">
                        </label>
                        <label class="c-3" for="sp-3">
                          <input type="radio" id="sp-3">
                        </label>
                        <label class="c-4" for="sp-4">
                          <input type="radio" id="sp-4">
                        </label>
                        <label class="c-5" for="sp-5">
                          <input type="radio" id="sp-5">
                        </label>
                        <label class="c-6" for="sp-6">
                          <input type="radio" id="sp-6">
                        </label>
                        <label class="c-7" for="sp-7">
                          <input type="radio" id="sp-7">
                        </label>
                        <label class="c-8" for="sp-8">
                          <input type="radio" id="sp-8">
                        </label>
                        <label class="c-9" for="sp-9">
                          <input type="radio" id="sp-9">
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-heading">
                    <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                  </div>
                  <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="shop__sidebar__tags">
                        <a href="#">Product</a>
                        <a href="#">Bags</a>
                        <a href="#">Shoes</a>
                        <a href="#">Fashio</a>
                        <a href="#">Clothing</a>
                        <a href="#">Hats</a>
                        <a href="#">Accessories</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="shop__product__option">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="shop__product__option__left">
                  <p>Showing 1–12 of 126 results</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="shop__product__option__right">
                  <p>Sort by Price:</p>
                  <select>
                    <option value="">Low To High</option>
                    <option value="">$0 - $55</option>
                    <option value="">$55 - $100</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <?php foreach($products as $product): ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="product__item sale">
                <div class="product__item__pic set-bg" data-setbg="<?= base_url().$product['image'] ?>">
                  <span class="label">Sale</span>
                  <ul class="product__hover">
                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>
                    </li>
                    <li><a href="<?= base_url().'/product/'.$product['id'] ?>"><img src="img/icon/search.png"
                          alt=""></a></li>
                  </ul>
                </div>
                <div class="product__item__text">
                  <h6><?= $product['name'] ?></h6>
                  <a style="cursor: pointer;"
                    onclick="addItemCart(<?= $product['id'].',\''.$product['name'].'\',1,'.$product['price'].',\''.base_url().$product['image'].'\''?>)"
                    class="add-cart">+ Add To
                    Cart</a>
                  <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <h5>$<?= $product['price'] ?></h5>
                  <div class="product__color__select">
                    <label for="pc-7">
                      <input type="radio" id="pc-7">
                    </label>
                    <label class="active black" for="pc-8">
                      <input type="radio" id="pc-8">
                    </label>
                    <label class="grey" for="pc-9">
                      <input type="radio" id="pc-9">
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <?= $pager->links('default', 'custom_paginator') ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Shop Section End -->

  <!-- Footer Section Begin -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer__about">
            <div class="footer__logo">
              <a href="#"><img src="img/footer-logo.png" alt=""></a>
            </div>
            <p>The customer is at the heart of our unique business model, which includes design.</p>
            <a href="#"><img src="img/payment.png" alt=""></a>
          </div>
        </div>
        <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
          <div class="footer__widget">
            <h6>Shopping</h6>
            <ul>
              <li><a href="#">Clothing Store</a></li>
              <li><a href="#">Trending Shoes</a></li>
              <li><a href="#">Accessories</a></li>
              <li><a href="#">Sale</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-6">
          <div class="footer__widget">
            <h6>Shopping</h6>
            <ul>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Payment Methods</a></li>
              <li><a href="#">Delivary</a></li>
              <li><a href="#">Return & Exchanges</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
          <div class="footer__widget">
            <h6>NewLetter</h6>
            <div class="footer__newslatter">
              <p>Be the first to know about new arrivals, look books, sales & promos!</p>
              <form action="#">
                <input type="text" placeholder="Your email">
                <button type="submit"><span class="icon_mail_alt"></span></button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="footer__copyright__text">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <p>Copyright ©
              <script>
              document.write(new Date().getFullYear());
              </script>2020
              All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
                href="https://colorlib.com" target="_blank">Colorlib</a>
            </p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Search Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="search-close-switch">+</div>
      <form class="search-model-form">
        <input type="text" id="search-input" placeholder="Search here.....">
      </form>
    </div>
  </div>
  <!-- Search End -->

  <!-- Js Plugins -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery.nicescroll.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.slicknav.js"></script>
  <script src="js/mixitup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/cart.js"></script>
</body>

</html>