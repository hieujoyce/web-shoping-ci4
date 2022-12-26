<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <base href="<?= base_url().'/admin/' ?>">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css" />
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css" />
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css" />
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css" />
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css" />
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <style>
  .shopping__cart__table {
    margin-bottom: 30px;
  }

  .shopping__cart__table table {
    width: 100%;
  }

  .shopping__cart__table table thead {
    border-bottom: 1px solid #f2f2f2;
  }

  .shopping__cart__table table thead tr th {
    color: #111111;
    font-size: 16px;
    font-weight: 700;
    text-transform: uppercase;
    padding-bottom: 25px;
  }

  .shopping__cart__table table tbody tr {
    border-bottom: 1px solid #f2f2f2;
  }

  .shopping__cart__table table tbody tr td {
    padding-bottom: 30px;
    padding-top: 30px;
  }

  .shopping__cart__table table tbody tr td.product__cart__item {
    width: 400px;
  }

  .shopping__cart__table table tbody tr td.product__cart__item .product__cart__item__pic {
    float: left;
    margin-right: 30px;
  }

  .shopping__cart__table table tbody tr td.product__cart__item .product__cart__item__text {
    overflow: hidden;
    padding-top: 21px;
  }

  .shopping__cart__table table tbody tr td.product__cart__item .product__cart__item__text h6 {
    color: #111111;
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 10px;
  }

  .shopping__cart__table table tbody tr td.product__cart__item .product__cart__item__text h5 {
    color: #0d0d0d;
    font-weight: 700;
  }

  .shopping__cart__table table tbody tr td.quantity__item {
    width: 175px;
  }

  .shopping__cart__table table tbody tr td.quantity__item .quantity .pro-qty-2 {
    width: 80px;
  }

  .shopping__cart__table table tbody tr td.quantity__item .quantity .pro-qty-2 input {
    width: 50px;
    border: none;
    text-align: center;
    color: #111111;
    font-size: 16px;
  }

  .shopping__cart__table table tbody tr td.quantity__item .quantity .pro-qty-2 .qtybtn {
    font-size: 16px;
    color: #888888;
    width: 10px;
    cursor: pointer;
  }

  .shopping__cart__table table tbody tr td.cart__price {
    color: #111111;
    font-size: 18px;
    font-weight: 700;
    width: 140px;
  }

  .shopping__cart__table table tbody tr td.cart__close i {
    font-size: 18px;
    color: #111111;
    height: 40px;
    width: 40px;
    background: #f3f2ee;
    border-radius: 50%;
    line-height: 40px;
    text-align: center;
  }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="images/logo.svg" class="mr-2"
            alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                aria-label="search" aria-describedby="search" />
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
              data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
              aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">
                Notifications
              </p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">
                    Application Error
                  </h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">
                    New user registration
                  </h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>
            Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>
            Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
              aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
              aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
            aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do" />
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">
                    Add
                  </button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" />
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" />
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" />
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked />
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked />
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">
              Events
            </h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">
                Creating component page build a js
              </p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">
                Meeting with Alisa
              </p>
              <p class="text-gray mb-0">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">
                Friends
              </p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile">
                  <img src="images/faces/face1.jpg" alt="image" /><span class="online"></span>
                </div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile">
                  <img src="images/faces/face2.jpg" alt="image" /><span class="offline"></span>
                </div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">
                  4
                </div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile">
                  <img src="images/faces/face3.jpg" alt="image" /><span class="online"></span>
                </div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile">
                  <img src="images/faces/face4.jpg" alt="image" /><span class="offline"></span>
                </div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile">
                  <img src="images/faces/face5.jpg" alt="image" /><span class="online"></span>
                </div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile">
                  <img src="images/faces/face6.jpg" alt="image" /><span class="online"></span>
                </div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'/admins/' ?>">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'/admins/' ?>user">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'/admins/' ?>product">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Products</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'/admins/' ?>category">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'/admins/' ?>order">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Order</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="shopping__cart__table">
                <table>
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($orderItems as $orderItem): ?>
                    <tr>
                      <td class="product__cart__item">
                        <div class="product__cart__item__pic">
                          <img style="height: 100px; width: 100px; object-fit: cover;"
                            src="<?= base_url().$orderItem['product_image'] ?>" alt="">
                        </div>
                        <div class="product__cart__item__text">
                          <h6><?= $orderItem['product_name'] ?></h6>
                          <h5>$<?= $orderItem['product_price'] ?></h5>
                        </div>
                      </td>
                      <td class="quantity__item">
                        <div class="quantity">
                          <div class="pro-qty-2">
                            <input type="text" value="<?= $orderItem['qty'] ?>">
                          </div>
                        </div>
                      </td>
                      <td class="cart__price">$ <?= round($orderItem['qty'] * $orderItem['product_price'], 2) ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>$<?= $order['amount'] ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Chi Tiết Đơn hàng</h4>
                  <p class="card-description">Basic form elements</p>
                  <form class="forms-sample" method="POST" action="<?= base_url().'/admins/order/edit/'.$order["id"]?>">
                    <!-- ['id', 'amount', ||| 'type', 'date', 'user_id', 'status', 'address', 'phone'];  -->
                    <div class="row">
                      <div class="col-6">
                        <div class=" form-group">
                          <label for="exampleInputName1">Date</label>
                          <input type="text" class="form-control" name="date" placeholder="Name"
                            value="<?= old('date') ? old('date') : $order['date'];?>" />
                        </div>
                      </div>
                      <div class="col-6">
                        <div class=" form-group">
                          <label for="exampleInputName1">User order</label>
                          <input type="text" class="form-control" disabled placeholder="Name"
                            value="<?= old('username') ? old('username') : $order['username'];?>" />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label>Status</label>
                          <div class="">
                            <!-- ("Shipping", "Processing", "Sold") selected="selected" -->
                            <select class="form-control" name="status">
                              <option <?= $order['status'] == 'Shipping' ? 'selected="selected"' : '' ?>
                                value="Shipping">
                                Shipping</option>
                              <option <?= $order['status'] == 'Processing' ? 'selected="selected"' : '' ?>
                                value="Processing">Processing</option>
                              <option <?= $order['status'] == 'Sold' ? 'selected="selected"' : '' ?> value="Sold">
                                Sold</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label>Type</label>
                          <div class="">
                            <select class="form-control" disabled>
                              <option>COD</option>
                              <option>Online</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Address</label>
                      <input type="text" class="form-control" name="address" placeholder="Address"
                        value="<?= old('address') ? old('address') : $order['address'];?>" />
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Phone</label>
                      <input type="text" class="form-control" name="phone" placeholder="Phone"
                        value="<?= old('phone') ? old('phone') : $order['phone'];?>" />
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">
                      Update
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium
              <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a>
              from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>