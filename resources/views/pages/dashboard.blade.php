<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('dashboard.header')
  </head>
  <body>
    <!-- loader starts-->
    <div class="loader-wrapper">
      <div class="loader-index"><span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
      </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative">
                  <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                  <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                </div>
                <div class="Typeahead-menu"></div>
              </div>
            </div>
          </form>
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="indexx.html"><img class="img-fluid" src="../assets/images/logo/logo.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
          </div>
          <div class="left-header col horizontal-wrapper ps-0">
            <ul class="horizontal-menu">
              <li class="mega-menu outside"><a class="nav-link" href="#!"><i data-feather="layers"></i><span>Bonus Ui</span></a>
                <div class="mega-menu-container nav-submenu menu-to-be-close header-mega">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col mega-box">
                        <div class="mobile-title d-none">
                          <h5>Mega menu</h5><i data-feather="x"></i>
                        </div>
                        <div class="link-section icon">
                          <div>
                            <h6>Error Page</h6>
                          </div>
                          <ul>
                            <li><a href="error-400.html">Error page 400</a></li>
                            <li><a href="error-401.html">Error page 401</a></li>
                            <li><a href="error-403.html">Error page 403</a></li>
                            <li><a href="error-404.html">Error page 404</a></li>
                            <li><a href="error-500.html">Error page 500</a></li>
                            <li><a href="error-503.html">Error page 503</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col mega-box">
                        <div class="link-section doted">
                          <div>
                            <h6> Authentication</h6>
                          </div>
                          <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="login_one.html">Login with image</a></li>
                            <li><a href="login-bs-validation.html">Login with validation</a></li>
                            <li><a href="sign-up.html">Sign Up</a></li>
                            <li><a href="sign-up-one.html">SignUp with image</a></li>
                            <li><a href="sign-up-two.html">SignUp with image</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col mega-box">
                        <div class="link-section dashed-links">
                          <div>
                            <h6>Usefull Pages</h6>
                          </div>
                          <ul>
                            <li><a href="search.html">Search Website</a></li>
                            <li><a href="unlock.html">Unlock User</a></li>
                            <li><a href="forget-password.html">Forget Password</a></li>
                            <li><a href="reset-password.html">Reset Password</a></li>
                            <li><a href="maintenance.html">Maintenance</a></li>
                            <li><a href="login-sa-validation">Login validation</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col mega-box">
                        <div class="link-section">
                          <div>
                            <h6>Email templates</h6>
                          </div>
                          <ul>
                            <li class="ps-0"><a href="basic-template.html">Basic Email</a></li>
                            <li class="ps-0"><a href="email-header.html">Basic With Header</a></li>
                            <li class="ps-0"><a href="template-email.html">Ecomerce Template</a></li>
                            <li class="ps-0"><a href="template-email-2.html">Email Template 2</a></li>
                            <li class="ps-0"><a href="ecommerce-templates.html">Ecommerce Email</a></li>
                            <li class="ps-0"><a href="email-order-success.html">Order Success</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col mega-box">
                        <div class="link-section">
                          <div>
                            <h6>Coming Soon</h6>
                          </div>
                          <ul class="svg-icon">
                            <li><a href="comingsoon.html"> <i data-feather="file"> </i>Coming-soon</a></li>
                            <li><a href="comingsoon-bg-video.html"> <i data-feather="film"> </i>Coming-video</a></li>
                            <li><a href="comingsoon-bg-img.html"><i data-feather="image"> </i>Coming-Image</a></li>
                          </ul>
                          <div>
                            <h6>Other Soon</h6>
                          </div>
                          <ul class="svg-icon">
                            <li><a class="txt-primary" href="landing-page.html"> <i data-feather="cast"></i>Landing Page</a></li>
                            <li><a class="txt-secondary" href="sample-page.html"> <i data-feather="airplay"></i>Sample Page</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="level-menu outside"><a class="nav-link" href="#!"><i data-feather="inbox"></i><span>Level Menu</span></a>
                <ul class="header-level-menu menu-to-be-close">
                  <li><a href="file-manager.html" data-original-title="" title="">                               <i data-feather="git-pull-request"></i><span>File manager    </span></a></li>
                  <li><a href="#!" data-original-title="" title="">                               <i data-feather="users"></i><span>Users</span></a>
                    <ul class="header-level-sub-menu">
                      <li><a href="file-manager.html" data-original-title="" title="">                               <i data-feather="user"></i><span>User Profile</span></a></li>
                      <li><a href="file-manager.html" data-original-title="" title="">                               <i data-feather="user-minus"></i><span>User Edit</span></a></li>
                      <li><a href="file-manager.html" data-original-title="" title="">                               <i data-feather="user-check"></i><span>Users Cards</span></a></li>
                    </ul>
                  </li>
                  <li><a href="kanban.html" data-original-title="" title="">                               <i data-feather="airplay"></i><span>Kanban Board</span></a></li>
                  <li><a href="bookmark.html" data-original-title="" title="">                               <i data-feather="heart"></i><span>Bookmark</span></a></li>
                  <li><a href="social-app.html" data-original-title="" title="">                               <i data-feather="zap"></i><span>Social App                     </span></a></li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
              <li class="language-nav">
                <div class="translate_wrapper">
                  <div class="current_lang">
                    <div class="lang"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">EN                               </span></div>
                  </div>
                  <div class="more_lang">
                    <div class="lang selected" data-value="en"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">English<span> (US)</span></span></div>
                    <div class="lang" data-value="de"><i class="flag-icon flag-icon-de"></i><span class="lang-txt">Deutsch</span></div>
                    <div class="lang" data-value="es"><i class="flag-icon flag-icon-es"></i><span class="lang-txt">Español</span></div>
                    <div class="lang" data-value="fr"><i class="flag-icon flag-icon-fr"></i><span class="lang-txt">Français</span></div>
                    <div class="lang" data-value="pt"><i class="flag-icon flag-icon-pt"></i><span class="lang-txt">Português<span> (BR)</span></span></div>
                    <div class="lang" data-value="cn"><i class="flag-icon flag-icon-cn"></i><span class="lang-txt">简体中文</span></div>
                    <div class="lang" data-value="ae"><i class="flag-icon flag-icon-ae"></i><span class="lang-txt">لعربية <span> (ae)</span></span></div>
                  </div>
                </div>
              </li>
              <li>                         <span class="header-search"><i data-feather="search"></i></span></li>
              <li class="onhover-dropdown">
                <div class="notification-box"><i data-feather="bell"> </i><span class="badge rounded-pill badge-secondary">4 </span></div>
                <div class="onhover-show-div notification-dropdown">
                  <h6 class="f-18 mb-0 dropdown-title">Notitications                               </h6>
                  <ul>
                    <li class="b-l-primary border-4">
                      <p>Delivery processing <span class="font-danger">10 min.</span></p>
                    </li>
                    <li class="b-l-success border-4">
                      <p>Order Complete<span class="font-success">1 hr</span></p>
                    </li>
                    <li class="b-l-info border-4">
                      <p>Tickets Generated<span class="font-info">3 hr</span></p>
                    </li>
                    <li class="b-l-warning border-4">
                      <p>Delivery Complete<span class="font-warning">6 hr</span></p>
                    </li>
                    <li><a class="f-w-700" href="#">Check all</a></li>
                  </ul>
                </div>
              </li>
              <li class="onhover-dropdown">
                <div class="notification-box"><i data-feather="star"></i></div>
                <div class="onhover-show-div bookmark-flip">
                  <div class="flip-card">
                    <div class="flip-card-inner">
                      <div class="front">
                        <h6 class="f-18 mb-0 dropdown-title">Bookmark</h6>
                        <ul class="bookmark-dropdown">
                          <li>
                            <div class="row">
                              <div class="col-4 text-center">
                                <div class="bookmark-content">
                                  <div class="bookmark-icon"><i data-feather="file-text"></i></div><span>Forms</span>
                                </div>
                              </div>
                              <div class="col-4 text-center">
                                <div class="bookmark-content">
                                  <div class="bookmark-icon"><i data-feather="user"></i></div><span>Profile</span>
                                </div>
                              </div>
                              <div class="col-4 text-center">
                                <div class="bookmark-content">
                                  <div class="bookmark-icon"><i data-feather="server"></i></div><span>Tables</span>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="text-center"><a class="flip-btn f-w-700" id="flip-btn" href="javascript:void(0)">Add New Bookmark</a></li>
                        </ul>
                      </div>
                      <div class="back">
                        <ul>
                          <li>
                            <div class="bookmark-dropdown flip-back-content">
                              <input type="text" placeholder="search...">
                            </div>
                          </li>
                          <li><a class="f-w-700 d-block flip-back" id="flip-back" href="javascript:void(0)">Back</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="mode"><i class="fa fa-moon-o"></i></div>
              </li>
              <li class="cart-nav onhover-dropdown">
                <div class="cart-box"><i data-feather="shopping-cart"></i><span class="badge rounded-pill badge-primary">2</span></div>
                <div class="cart-dropdown onhover-show-div">
                  <h6 class="f-18 mb-0 dropdown-title">Cart</h6>
                  <ul>
                    <li>
                      <div class="media"><img class="img-fluid b-r-5 me-3 img-60" src="../assets/images/other-images/cart-img.jpg" alt="">
                        <div class="media-body"><span>Furniture Chair for Home</span>
                          <div class="qty-box">
                            <div class="input-group"><span class="input-group-prepend">
                                <button class="btn quantity-left-minus" type="button" data-type="minus" data-field="">-</button></span>
                              <input class="form-control input-number" type="text" name="quantity" value="1"><span class="input-group-prepend">
                                <button class="btn quantity-right-plus" type="button" data-type="plus" data-field="">+</button></span>
                            </div>
                          </div>
                          <h6 class="font-primary">$500</h6>
                        </div>
                        <div class="close-circle"><a class="bg-danger" href="#"><i data-feather="x"></i></a></div>
                      </div>
                    </li>
                    <li>
                      <div class="media"><img class="img-fluid b-r-5 me-3 img-60" src="../assets/images/other-images/cart-img.jpg" alt="">
                        <div class="media-body"><span>Furniture Chair for Home</span>
                          <div class="qty-box">
                            <div class="input-group"><span class="input-group-prepend">
                                <button class="btn quantity-left-minus" type="button" data-type="minus" data-field="">-</button></span>
                              <input class="form-control input-number" type="text" name="quantity" value="1"><span class="input-group-prepend">
                                <button class="btn quantity-right-plus" type="button" data-type="plus" data-field="">+</button></span>
                            </div>
                          </div>
                          <h6 class="font-primary">$500.00</h6>
                        </div>
                        <div class="close-circle"><a class="bg-danger" href="#"><i data-feather="x"></i></a></div>
                      </div>
                    </li>
                    <li class="total">
                      <h6 class="mb-0">Order Total : <span class="f-right">$1000.00</span></h6>
                    </li>
                    <li class="text-center"><a class="d-block mb-3 view-cart f-w-700" href="cart.html">Go to your cart</a><a class="btn btn-primary view-checkout" href="checkout.html">Checkout</a></li>
                  </ul>
                </div>
              </li>
              <li class="onhover-dropdown"><i data-feather="message-square"></i>
                <div class="chat-dropdown onhover-show-div">
                  <h6 class="f-18 mb-0 dropdown-title">Messages</h6>
                  <ul class="py-0">
                    <li>
                      <div class="media"><img class="img-fluid b-r-5 me-2" src="../assets/images/user/1.jpg" alt="">
                        <div class="media-body">
                          <h6>Teressa</h6>
                          <p>Reference site about Lorem Ipsum, give information on its origins.</p>
                          <p class="f-8 font-primary mb-0">3 hours ago</p>
                        </div><span class="badge rounded-circle badge-primary">2</span>
                      </div>
                    </li>
                    <li>
                      <div class="media"><img class="img-fluid b-r-5 me-2" src="../assets/images/user/2.jpg" alt="">
                        <div class="media-body">
                          <h6>Kori Thomas</h6>
                          <p>Lorem Ipsum is simply dummy give information on its origins....</p>
                          <p class="f-8 font-primary mb-0">1 hr ago</p>
                        </div><span class="badge rounded-circle badge-primary">2</span>
                      </div>
                    </li>
                    <li>
                      <div class="media"><img class="img-fluid b-r-5 me-2" src="../assets/images/user/14.png" alt="">
                        <div class="media-body">
                          <h6>Ain Chavez</h6>
                          <p>Lorem Ipsum is simply dummy...</p>
                          <p class="f-8 font-primary mb-0">32 mins ago</p>
                        </div><span class="badge rounded-circle badge-primary">2</span>
                      </div>
                    </li>
                    <li class="text-center"> <a class="f-w-700" href="#">View All     </a></li>
                  </ul>
                </div>
              </li>
              <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
              <li class="profile-nav onhover-dropdown p-0 me-0">
                <div class="media profile-media"><img class="b-r-10" src="../assets/images/dashboard/profile.jpg" alt="">
                  <div class="media-body"><span>Emay Walter</span>
                    <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
                  <li><a href="#"><i data-feather="mail"></i><span>Inbox</span></a></li>
                  <li><a href="#"><i data-feather="file-text"></i><span>Taskboard</span></a></li>
                  <li><a href="#"><i data-feather="settings"></i><span>Settings</span></a></li>
                  <li><a href="#"><i data-feather="log-in"> </i><span>Log in</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
          <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">name?</div>
            </div>
            </div>
          </script>
          <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
      </div>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        @include('public.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>
                     Ecommerce</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Ecommerce</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row size-column">
              <div class="col-xl-7 box-col-12 xl-100">
                <div class="row dash-chart">
                  <div class="col-xl-6 box-col-6 col-md-6">
                    <div class="card o-hidden">
                      <div class="card-header card-no-border">
                        <div class="card-header-right">
                          <ul class="list-unstyled card-option">
                            <li><i class="fa fa-spin fa-cog"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                          </ul>
                        </div>
                        <div class="media">
                          <div class="media-body">
                            <p class="font-roboto"><span class="f-w-500">Today Total sale</span><span class="f-w-700 font-primary ms-2">89.21%</span></p>
                            <h4 class="f-w-500 mb-0 f-20">$<span class="counter">3000.56</span></h4>
                          </div>
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <div class="media">
                          <div class="media-body">
                            <div class="profit-card">
                              <div id="spaline-chart"></div>
                            </div>
                          </div>
                        </div>
                        <div class="code-box-copy">
                          <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6 box-col-6 col-md-6">
                    <div class="card o-hidden">
                      <div class="card-header card-no-border">
                        <div class="card-header-right">
                          <ul class="list-unstyled card-option">
                            <li><i class="fa fa-spin fa-cog"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                          </ul>
                        </div>
                        <div class="media">
                          <div class="media-body">
                            <p class="font-roboto"><span class="f-w-500">Today Total visits</span><span class="f-w-700 font-primary ms-2">35.00%</span></p>
                            <h4 class="f-w-500 mb-0 f-20 counter">9,050</h4>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0">
                        <div class="monthly-visit">
                          <div id="column-chart"></div>
                        </div>
                        <div class="code-box-copy">
                          <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6 box-col-6 col-lg-12 col-md-6">
                    <div class="card o-hidden">
                      <div class="card-body">
                        <div class="ecommerce-widgets media">
                          <div class="media-body">
                            <p class="f-w-500 font-roboto">Our Sale Value<span class="badge pill-badge-primary ms-3">New</span></p>
                            <h4 class="f-w-500 mb-0 f-20">$<span class="counter">7454.25</span></h4>
                          </div>
                          <div class="ecommerce-box light-bg-primary"><i class="fa fa-heart" aria-hidden="true"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6 box-col-6 col-lg-12 col-md-6">
                    <div class="card o-hidden">
                      <div class="card-body">
                        <div class="media">
                          <div class="media-body">
                            <p class="f-w-500 font-roboto">Today Stock value<span class="badge pill-badge-primary ms-3">Hot</span></p>
                            <div class="progress-box">
                              <h4 class="f-w-500 mb-0 f-20">$<span class="counter">9000.04</span></h4>
                              <div class="progress sm-progress-bar progress-animate app-right d-flex justify-content-end">
                                <div class="progress-gradient-primary" role="progressbar" style="width: 35%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span class="font-primary">88%</span><span class="animate-circle"></span></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-5 box-col-12 xl-50">
                <div class="card o-hidden dash-chart">
                  <div class="card-header card-no-border">
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li><i class="fa fa-spin fa-cog"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                      </ul>
                    </div>
                    <div class="media">
                      <div class="media-body">
                        <p class="font-roboto"><span class="f-w-500">Total Profit</span><span class="font-primary f-w-700 ms-2">99.00%</span></p>
                        <h4 class="f-w-500 mb-0 f-20">$<span class="counter">3000.56</span></h4>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pt-0">
                    <div class="negative-container">
                      <div id="negative-chart"></div>
                    </div>
                    <div class="code-box-copy">
                      <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head2" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 xl-50 box-col-12">
                <div class="card">
                  <div class="card-header card-no-border">
                    <h5>New Product</h5>
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li><i class="fa fa-spin fa-cog"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body pt-0">
                    <div class="our-product">
                      <div class="table-responsive">
                        <table class="table table-bordernone">
                          <tbody class="f-w-500">
                            <tr>
                              <td>
                                <div class="media"><img class="img-fluid m-r-15 rounded-circle" src="../assets/images/dashboard-2/product/1.jpg" alt="">
                                  <div class="media-body"><span>Pot</span>
                                    <p class="font-roboto">100 item</p>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p>coupon code</p><span>PIX001</span>
                              </td>
                              <td>
                                <p>-51%</p><span>$99.00</span>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <div class="media"><img class="img-fluid m-r-15 rounded-circle" src="../assets/images/dashboard-2/product/2.jpg" alt="">
                                  <div class="media-body"><span>Buds</span>
                                    <p class="font-roboto">105 item</p>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p>coupon code</p><span>PIX002</span>
                              </td>
                              <td>
                                <p>-78%</p><span>$66.00</span>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <div class="media"><img class="img-fluid m-r-15 rounded-circle" src="../assets/images/dashboard-2/product/3.jpg" alt="">
                                  <div class="media-body"><span>Headphone</span>
                                    <p class="font-roboto">604 item</p>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p>coupon code</p><span>PIX003</span>
                              </td>
                              <td>
                                <p>-04%</p><span>$116.00</span>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <div class="media"><img class="img-fluid m-r-15 rounded-circle" src="../assets/images/dashboard-2/product/4.jpg" alt="">
                                  <div class="media-body"><span>Glass</span>
                                    <p class="font-roboto">541 item</p>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p>coupon code</p><span>PIX004</span>
                              </td>
                              <td>
                                <p>-60%</p><span>$99.00</span>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <div class="media"><img class="img-fluid m-r-15 rounded-circle" src="../assets/images/dashboard-2/product/5.jpg" alt="">
                                  <div class="media-body"><span>Watch</span>
                                    <p class="font-roboto">999 item</p>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p>coupon code</p><span>PIX005</span>
                              </td>
                              <td>
                                <p>-50%</p><span>$58.00</span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="code-box-copy">
                      <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head3" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                      <pre><code class="language-html" id="example-head3">&lt;!-- Cod Box Copy begin --&gt;
&lt;div class=&quot;card&quot;&gt;
  &lt;div class=&quot;card-header card-no-border&quot;&gt;
    &lt;h5&gt;Our Product&lt;/h5&gt;
    &lt;div class=&quot;card-header-right&quot;&gt;
      &lt;ul class=&quot;list-unstyled card-option&quot;&gt;
        &lt;li&gt;&lt;i class=&quot;fa fa-spin fa-cog&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;view-html fa fa-code&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-maximize full-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-minus minimize-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-refresh reload-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-error close-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
      &lt;/ul&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div class=&quot;card-body pt-0&quot;&gt;
    &lt;div class=&quot;our-product&quot;&gt;
      &lt;div class=&quot;table-responsive&quot;&gt;
        &lt;table class=&quot;table table-bordernone&quot;&gt;
          &lt;tbody class=&quot;f-w-500&quot;&gt;
            &lt;tr&gt;
              &lt;td&gt;
                &lt;div class=&quot;media&quot;&gt;&lt;img class=&quot;img-fluid m-r-15 rounded-circle&quot; src=&quot;../assets/images/dashboard-2/product/1.jpg&quot;&gt;
                  &lt;div class=&quot;media-body&quot;&gt;&lt;span&gt;Pot&lt;/span&gt;
                    &lt;p class=&quot;font-roboto&quot;&gt;451 item&lt;/p&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/td&gt;
              &lt;td&gt;
                &lt;p&gt;coupon code&lt;/p&gt;&lt;span&gt;NIK584&lt;/span&gt;
              &lt;/td&gt;
              &lt;td&gt;
                &lt;p&gt;-50%&lt;/p&gt;&lt;span&gt;$49.00&lt;/span&gt;
              &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
              &lt;td&gt;
                &lt;div class=&quot;media&quot;&gt;&lt;img class=&quot;img-fluid m-r-15 rounded-circle&quot; src=&quot;../assets/images/dashboard-2/product/2.jpg&quot;&gt;
                  &lt;div class=&quot;media-body&quot;&gt;&lt;span&gt;Buds&lt;/span&gt;
                    &lt;p class=&quot;font-roboto&quot;&gt;165 item&lt;/p&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/td&gt;
              &lt;td&gt;
                &lt;p&gt;coupon code&lt;/p&gt;&lt;span&gt;HEA415&lt;/span&gt;
              &lt;/td&gt;
              &lt;td&gt;
                &lt;p&gt;-28%&lt;/p&gt;&lt;span&gt;$36.00&lt;/span&gt;
              &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
              &lt;td&gt;
                &lt;div class=&quot;media&quot;&gt;&lt;img class=&quot;img-fluid m-r-15 rounded-circle&quot; src=&quot;../assets/images/dashboard-2/product/3.jpg&quot;&gt;
                  &lt;div class=&quot;media-body&quot;&gt;&lt;span&gt;Headphone&lt;/span&gt;
                    &lt;p class=&quot;font-roboto&quot;&gt;364 item&lt;/p&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/td&gt;
              &lt;td&gt;
                &lt;p&gt;coupon code&lt;/p&gt;&lt;span&gt;TRE113&lt;/span&gt;
              &lt;/td&gt;
              &lt;td&gt;
                &lt;p&gt;-14%&lt;/p&gt;&lt;span&gt;$16.00&lt;/span&gt;
              &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
              &lt;td&gt;
                &lt;div class=&quot;media&quot;&gt;&lt;img class=&quot;img-fluid m-r-15 rounded-circle&quot; src=&quot;../assets/images/dashboard-2/product/4.jpg&quot;&gt;
                  &lt;div class=&quot;media-body&quot;&gt;&lt;span&gt;glass&lt;/span&gt;
                    &lt;p class=&quot;font-roboto&quot;&gt;451 item&lt;/p&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/td&gt;
              &lt;td&gt;
                &lt;p&gt;coupon code&lt;/p&gt;&lt;span&gt;NIK584&lt;/span&gt;
              &lt;/td&gt;
              &lt;td&gt;
                &lt;p&gt;-50%&lt;/p&gt;&lt;span&gt;$49.00&lt;/span&gt;
              &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
              &lt;td&gt;
                &lt;div class=&quot;media&quot;&gt;&lt;img class=&quot;img-fluid m-r-15 rounded-circle&quot; src=&quot;../assets/images/dashboard-2/product/5.jpg&quot;&gt;
                  &lt;div class=&quot;media-body&quot;&gt;&lt;span&gt;watch&lt;/span&gt;
                    &lt;p class=&quot;font-roboto&quot;&gt;451 item&lt;/p&gt;
                  &lt;/div&gt;
                &lt;/div&gt;
              &lt;/td&gt;
              &lt;td&gt;
                &lt;p&gt;coupon code&lt;/p&gt;&lt;span&gt;NIK584&lt;/span&gt;
              &lt;/td&gt;
              &lt;td&gt;
                &lt;p&gt;-50%&lt;/p&gt;&lt;span&gt;$49.00&lt;/span&gt;
              &lt;/td&gt;
            &lt;/tr&gt;
          &lt;/tbody&gt;
        &lt;/table&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 xl-50 box-col-12">
                <div class="card">
                  <div class="card-header card-no-border">
                    <h5>Location</h5>
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li><i class="fa fa-spin fa-cog"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body pt-0">
                    <div class="dash-map">
                      <div id="map"></div>
                    </div>
                    <div class="code-box-copy">
                      <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head4" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                      <pre><code class="language-html" id="example-head4">&lt;!-- Cod Box Copy begin --&gt;
&lt;div class=&quot;card&quot;&gt;
  &lt;div class=&quot;card-header card-no-border&quot;&gt;
    &lt;h5&gt;Location&lt;/h5&gt;
    &lt;div class=&quot;card-header-right&quot;&gt;
      &lt;ul class=&quot;list-unstyled card-option&quot;&gt;
        &lt;li&gt;&lt;i class=&quot;fa fa-spin fa-cog&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;view-html fa fa-code&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-maximize full-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-minus minimize-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-refresh reload-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-error close-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
      &lt;/ul&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div class=&quot;card-body pt-0&quot;&gt;
    &lt;div class=&quot;dash-map&quot;&gt;
      &lt;div id=&quot;map&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 xl-50 box-col-12">
                <div class="card">
                  <div class="card-header card-no-border">
                    <h5>News & Updates</h5>
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li><i class="fa fa-spin fa-cog"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body new-update pt-0">
                    <div class="activity-timeline">
                      <div class="media">
                        <div class="activity-line"></div>
                        <div class="activity-dot-secondary"></div>
                        <div class="media-body"><span>Update Product</span>
                          <p class="font-roboto">Quisque a consequat ante Sit amet magna at volutapt.</p>
                        </div>
                      </div>
                      <div class="media">
                        <div class="activity-dot-primary"></div>
                        <div class="media-body"><span>James liked Nike Shoes</span>
                          <p class="font-roboto">Aenean sit amet magna vel magna fringilla ferme.</p>
                        </div>
                      </div>
                      <div class="media">
                        <div class="activity-dot-secondary"></div>
                        <div class="media-body"><span>john just buy your product<i class="fa fa-circle circle-dot-secondary pull-right"></i></span>
                          <p class="font-roboto">Vestibulum nec mi suscipit, dapibus purus.....</p>
                        </div>
                      </div>
                      <div class="media">
                        <div class="activity-dot-primary"></div>
                        <div class="media-body"><span>Jihan Doe just save your product<i class="fa fa-circle circle-dot-primary pull-right"></i></span>
                          <p class="font-roboto">Curabitur egestas consequat lorem.</p>
                        </div>
                      </div>
                    </div>
                    <div class="code-box-copy">
                      <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head5" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                      <pre><code class="language-html" id="example-head5">&lt;!-- Cod Box Copy begin --&gt;
&lt;div class=&quot;card&quot;&gt;
  &lt;div class=&quot;card-header card-no-border&quot;&gt;
    &lt;h5&gt;New &amp; Updates&lt;/h5&gt;
    &lt;div class=&quot;card-header-right&quot;&gt;
      &lt;ul class=&quot;list-unstyled card-option&quot;&gt;
        &lt;li&gt;&lt;i class=&quot;fa fa-spin fa-cog&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;view-html fa fa-code&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-maximize full-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-minus minimize-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-refresh reload-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-error close-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
      &lt;/ul&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div class=&quot;card-body new-update pt-0&quot;&gt;
    &lt;div class=&quot;activity-timeline&quot;&gt;
      &lt;div class=&quot;media&quot;&gt;
        &lt;div class=&quot;activity-line&quot;&gt;&lt;/div&gt;
        &lt;div class=&quot;activity-dot-secondary&quot;&gt;&lt;/div&gt;
        &lt;div class=&quot;media-body&quot;&gt;&lt;span&gt;Updated Product&lt;/span&gt;
          &lt;p class=&quot;font-roboto&quot;&gt;Quisque a consequat ante Sit amet magna at volutapt.&lt;/p&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;media&quot;&gt;
        &lt;div class=&quot;activity-dot-primary&quot;&gt;&lt;/div&gt;
        &lt;div class=&quot;media-body&quot;&gt;&lt;span&gt;You liked James products&lt;/span&gt;
          &lt;p class=&quot;font-roboto&quot;&gt;Aenean sit amet magna vel magna fringilla ferme.&lt;/p&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;media&quot;&gt;
        &lt;div class=&quot;activity-dot-secondary&quot;&gt;&lt;/div&gt;
        &lt;div class=&quot;media-body&quot;&gt;&lt;span&gt;James just like your product&lt;i class=&quot;fa fa-circle circle-dot-secondary pull-right&quot;&gt;&lt;/i&gt;&lt;/span&gt;
          &lt;p class=&quot;font-roboto&quot;&gt;Vestibulum nec mi suscipit, dapibus purus.....&lt;/p&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class=&quot;media&quot;&gt;
        &lt;div class=&quot;activity-dot-primary&quot;&gt;&lt;/div&gt;
        &lt;div class=&quot;media-body&quot;&gt;&lt;span&gt;Jihan Doe just like your product&lt;i class=&quot;fa fa-circle circle-dot-primary pull-right&quot;&gt;&lt;/i&gt;&lt;/span&gt;
          &lt;p class=&quot;font-roboto&quot;&gt;Curabitur egestas consequat lorem.&lt;/p&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 risk-col xl-100 box-col-12">
                <div class="card total-users">
                  <div class="card-header card-no-border">
                    <h5>Risk Factor</h5>
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li><i class="fa fa-spin fa-cog"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body pt-0">
                    <div class="apex-chart-container goal-status text-center row">
                      <div class="rate-card col-xl-12">
                        <div class="goal-chart">
                          <div id="riskfactorchart"></div>
                        </div>
                        <div class="goal-end-point">
                          <ul>
                            <li class="mt-0 pt-0">
                              <h6 class="font-primary">As From</h6>
                              <h6 class="f-w-400">24 March 2021</h6>
                            </li>
                            <li>
                              <h6 class="mb-2 f-w-400">Total Goal</h6>
                              <h5 class="mb-0">$94,000.20</h5>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <ul class="col-xl-12">
                        <li>
                          <div class="goal-detail">
                            <h6> <span class="font-primary">Goal Archive : </span>$91,000.000</h6>
                            <div class="progress sm-progress-bar progress-animate">
                              <div class="progress-gradient-primary" role="progressbar" style="width: 60%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="goal-detail mb-0">      
                            <h6><span class="font-primary">Duration: </span>9 Month</h6>
                            <div class="progress sm-progress-bar progress-animate">
                              <div class="progress-gradient-primary" role="progressbar" style="width: 50%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="btn-download btn btn-gradient f-w-500">Download details</div>
                        </li>
                      </ul>
                    </div>
                    <div class="code-box-copy">
                      <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head6" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                      <pre><code class="language-html" id="example-head6">&lt;!-- Cod Box Copy begin --&gt;
&lt;div class=&quot;card total-users&quot;&gt;
  &lt;div class=&quot;card-header card-no-border&quot;&gt;
    &lt;h5&gt;Risk Factor&lt;/h5&gt;
    &lt;div class=&quot;card-header-right&quot;&gt;
      &lt;ul class=&quot;list-unstyled card-option&quot;&gt;
        &lt;li&gt;&lt;i class=&quot;fa fa-spin fa-cog&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;view-html fa fa-code&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-maximize full-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-minus minimize-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-refresh reload-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
        &lt;li&gt;&lt;i class=&quot;icofont icofont-error close-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
      &lt;/ul&gt;
    &lt;/div&gt;
  &lt;/div&gt;
  &lt;div class=&quot;card-body pt-0&quot;&gt;
    &lt;div class=&quot;apex-chart-container goal-status text-center row&quot;&gt;
      &lt;div class=&quot;rate-card col-xl-12&quot;&gt;
        &lt;div class=&quot;goal-chart&quot;&gt;
          &lt;div id=&quot;riskfactorchart&quot;&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;goal-end-point&quot;&gt;
          &lt;ul&gt;
            &lt;li class=&quot;mt-0 pt-0&quot;&gt;
              &lt;h6 class=&quot;font-primary&quot;&gt;As From&lt;/h6&gt;
              &lt;h6 class=&quot;f-w-400&quot;&gt;24 January 2019&lt;/h6&gt;
            &lt;/li&gt;
            &lt;li&gt;
              &lt;h6 class=&quot;mb-2 f-w-400&quot;&gt;Total Goal&lt;/h6&gt;
              &lt;h5 class=&quot;mb-0&quot;&gt;$84,376.29&lt;/h5&gt;
            &lt;/li&gt;
          &lt;/ul&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;ul class=&quot;col-xl-12&quot;&gt;
        &lt;li&gt;
          &lt;div class=&quot;goal-detail&quot;&gt;
            &lt;h6&gt; &lt;span class=&quot;font-primary&quot;&gt;Goal Archive : &lt;/span&gt;$81,586.253&lt;/h6&gt;
            &lt;div class=&quot;progress sm-progress-bar progress-animate&quot;&gt;
              &lt;div class=&quot;progress-gradient-primary&quot; role=&quot;progressbar&quot; style=&quot;width: 60%&quot; aria-valuenow=&quot;75&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
          &lt;div class=&quot;goal-detail mb-0&quot;&gt;      
            &lt;h6&gt;&lt;span class=&quot;font-primary&quot;&gt;Duration: &lt;/span&gt;6 Month&lt;/h6&gt;
            &lt;div class=&quot;progress sm-progress-bar progress-animate&quot;&gt;
              &lt;div class=&quot;progress-gradient-primary&quot; role=&quot;progressbar&quot; style=&quot;width: 50%&quot; aria-valuenow=&quot;75&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;&lt;/div&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/li&gt;
        &lt;li&gt;
          &lt;div class=&quot;btn-download btn btn-gradient f-w-500&quot;&gt;Download Report&lt;/div&gt;
        &lt;/li&gt;
      &lt;/ul&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;!-- Cod Box Copy end --&gt;</code></pre>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-9 xl-100 box-col-12">
                <div class="row">
                  <div class="col-xl-12">
                    <div class="card offer-box">
                      <div class="card-body p-0">
                        <div class="offer-slider">
                          <div class="carousel slide" id="carouselExampleCaptions" data-bs-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <div class="selling-slide row">
                                  <div class="col-xl-4 col-md-6">
                                    <div class="d-flex">
                                      <div class="left-content">
                                        <p>Much More Selling product</p>
                                        <h4 class="f-w-600">Best Selling Product</h4><span class="badge badge-white rounded-pill">78% offer</span><span class="badge badge-dotted rounded-pill ms-2">Coupon Code : 12345</span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-4 col-md-12">
                                    <div class="center-img"><img class="img-fluid" src="../assets/images/dashboard-2/offer-shoes-3.png" alt="..."></div>
                                  </div>
                                  <div class="col-xl-4 col-md-6">
                                    <div class="d-flex">
                                      <div class="right-content">
                                        <p>Money back Guarrantee</p>
                                        <h4 class="f-w-600">Nike Air Shoes</h4><span class="badge badge-white rounded-pill">$100.00</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <div class="selling-slide row">
                                  <div class="col-xl-4 col-md-6">
                                    <div class="d-flex">
                                      <div class="left-content">
                                        <p>Money back Guarrantee</p>
                                        <h4 class="f-w-600">Nike Air Shoes</h4><span class="badge badge-white rounded-pill">$100.00</span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-4 col-md-12">
                                    <div class="center-img"><img class="img-fluid" src="../assets/images/dashboard-2/offer-shoes-3.png" alt="..."></div>
                                  </div>
                                  <div class="col-xl-4 col-md-6">
                                    <div class="d-flex">
                                      <div class="right-content">
                                        <p>Money back Guarrantee</p>
                                        <h4 class="f-w-600">Nike Air Shoes</h4><span class="badge badge-white rounded-pill">$120.55</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <div class="selling-slide row">
                                  <div class="col-xl-4 col-md-6">
                                    <div class="d-flex">
                                      <div class="left-content">
                                        <p>Maximum Selling product</p>
                                        <h4 class="f-w-600">Best Selling Product</h4><span class="badge badge-white rounded-pill">50% offer</span><span class="badge badge-dotted rounded-pill ms-2">Coupon Code : 21546</span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-4 col-md-12">
                                    <div class="center-img"><img class="img-fluid" src="../assets/images/dashboard-2/offer-shoes-3.png" alt="..."></div>
                                  </div>
                                  <div class="col-xl-4 col-md-6">
                                    <div class="d-flex">
                                      <div class="right-content">
                                        <p>Money back Guarrantee</p>
                                        <h4 class="f-w-600">Nike Air Shoes</h4><span class="badge badge-white rounded-pill">$120.55</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="best-seller-table responsive-tbl">
                          <div class="item">
                            <div class="table-responsive product-list">
                              <table class="table table-bordernone">
                                <thead>
                                  <tr>
                                    <th class="f-22">
                                       Best Seller</th>
                                    <th>Date</th>
                                    <th>Product</th>
                                    <th>Country</th>
                                    <th>Total</th>
                                    <th class="text-end">Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                      <div class="d-inline-block align-middle"><img class="img-40 m-r-15 rounded-circle align-top" src="../assets/images/avtar/7.jpg" alt="">
                                        <div class="status-circle bg-primary"></div>
                                        <div class="d-inline-block"><span>John keter</span>
                                          <p class="font-roboto">2019</p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>06 August</td>
                                    <td>CAP</td>
                                    <td><i class="flag-icon flag-icon-gb"></i></td>
                                    <td> <span class="label">$5,08,652</span></td>
                                    <td class="text-end"><span class="badge badge-light-success"><i class="me-2" data-feather="check"></i>Done</span></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="d-inline-block align-middle"><img class="img-40 m-r-15 rounded-circle align-top" src="../assets/images/avtar/4.jpg" alt="">
                                        <div class="status-circle bg-primary"></div>
                                        <div class="d-inline-block"><span>Herry Venter</span>
                                          <p class="font-roboto">2020</p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>21 March</td>
                                    <td>Branded Shoes</td>
                                    <td><i class="flag-icon flag-icon-us"></i></td>
                                    <td> <span class="label">$59,105</span></td>
                                    <td class="text-end"><span class="badge badge-light-warning"><i class="me-2" data-feather="rotate-cw"></i>Pending</span></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="d-inline-block align-middle"><img class="img-40 m-r-15 rounded-circle align-top" src="../assets/images/avtar/16.jpg" alt="">
                                        <div class="status-circle bg-primary"></div>
                                        <div class="d-inline-block"><span>loain deo</span>
                                          <p class="font-roboto">2020</p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>09 March</td>
                                    <td>Headphone</td>
                                    <td><i class="flag-icon flag-icon-za"></i></td>
                                    <td> <span class="label">$10,155</span></td>
                                    <td class="text-end"><span class="badge badge-light-success"><i class="me-2" data-feather="check"></i>Done</span></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="d-inline-block align-middle"><img class="img-40 m-r-15 rounded-circle align-top" src="../assets/images/avtar/11.jpg" alt="">
                                        <div class="status-circle bg-primary"></div>
                                        <div class="d-inline-block"><span>Horen Hors</span>
                                          <p class="font-roboto">2020</p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>14 February</td>
                                    <td>Cell Phone</td>
                                    <td><i class="flag-icon flag-icon-at"></i></td>
                                    <td> <span class="label">$90,568</span></td>
                                    <td class="text-end"> <span class="badge badge-light-info"><i class="me-2" data-feather="clock"></i>In progress</span></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="d-inline-block align-middle"><img class="img-40 m-r-15 rounded-circle align-top" src="../assets/images/avtar/3.jpg" alt="">
                                        <div class="status-circle bg-primary"></div>
                                        <div class="d-inline-block"><span>fenter Jessy</span>
                                          <p class="font-roboto">2021</p>
                                        </div>
                                      </div>
                                    </td>
                                    <td>12 January</td>
                                    <td>Earings</td>
                                    <td><i class="flag-icon flag-icon-br"></i></td>
                                    <td> <span class="label">$10,652</span></td>
                                    <td class="text-end"><span class="badge badge-light-warning"><i class="me-2" data-feather="rotate-cw"></i>Pending</span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('public.footer')
        @include('dashboard.footer')
        </div>
    </div>
    
  </body>
</html>