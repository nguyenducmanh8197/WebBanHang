@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 7, 2019</div>
                        $290.29 has been deposited into your account!
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 2, 2019</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                        <div class="status-indicator"></div>
                    </div>
                    <div>
                        <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                        <div class="small text-gray-500">Jae Chun · 1d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                        <div class="status-indicator bg-warning"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
{{--<header class="header-desktop">--}}
{{--    <div class="section__content section__content--p30">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="header-wrap">--}}
{{--                <form class="form-header" action="" method="POST">--}}
{{--                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />--}}
{{--                    <button class="au-btn--submit" type="submit">--}}
{{--                        <i class="zmdi zmdi-search"></i>--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--                <div class="header-button">--}}
{{--                    <div class="noti-wrap">--}}
{{--                        <div class="noti__item js-item-menu">--}}
{{--                            <i class="zmdi zmdi-comment-more"></i>--}}
{{--                            <span class="quantity">1</span>--}}
{{--                            <div class="mess-dropdown js-dropdown">--}}
{{--                                <div class="mess__title">--}}
{{--                                    <p>You have 2 news message</p>--}}
{{--                                </div>--}}
{{--                                <div class="mess__item">--}}
{{--                                    <div class="image img-cir img-40">--}}
{{--                                        <img src="{{asset('styleAdmin/images/icon/avatar-06.jpg')}}" alt="Michelle Moreno" />--}}
{{--                                    </div>--}}
{{--                                    <div class="content">--}}
{{--                                        <h6>Michelle Moreno</h6>--}}
{{--                                        <p>Have sent a photo</p>--}}
{{--                                        <span class="time">3 min ago</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mess__item">--}}
{{--                                    <div class="image img-cir img-40">--}}
{{--                                        <img src="{{asset('styleAdmin/images/icon/avatar-04.jpg')}}" alt="Diane Myers" />--}}
{{--                                    </div>--}}
{{--                                    <div class="content">--}}
{{--                                        <h6>Diane Myers</h6>--}}
{{--                                        <p>You are now connected on message</p>--}}
{{--                                        <span class="time">Yesterday</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mess__footer">--}}
{{--                                    <a href="#">View all messages</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="noti__item js-item-menu">--}}
{{--                            <i class="zmdi zmdi-email"></i>--}}
{{--                            <span class="quantity">1</span>--}}
{{--                            <div class="email-dropdown js-dropdown">--}}
{{--                                <div class="email__title">--}}
{{--                                    <p>You have 3 New Emails</p>--}}
{{--                                </div>--}}
{{--                                <div class="email__item">--}}
{{--                                    <div class="image img-cir img-40">--}}
{{--                                        <img src="{{asset('styleAdmin/images/icon/avatar-06.jpg')}}" alt="Cynthia Harvey" />--}}
{{--                                    </div>--}}
{{--                                    <div class="content">--}}
{{--                                        <p>Meeting about new dashboard...</p>--}}
{{--                                        <span>Cynthia Harvey, 3 min ago</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="email__item">--}}
{{--                                    <div class="image img-cir img-40">--}}
{{--                                        <img src="{{asset('styleAdmin/images/icon/avatar-05.jpg')}}" alt="Cynthia Harvey" />--}}
{{--                                    </div>--}}
{{--                                    <div class="content">--}}
{{--                                        <p>Meeting about new dashboard...</p>--}}
{{--                                        <span>Cynthia Harvey, Yesterday</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="email__item">--}}
{{--                                    <div class="image img-cir img-40">--}}
{{--                                        <img src="{{asset('styleAdmin/images/icon/avatar-04.jpg')}}" alt="Cynthia Harvey" />--}}
{{--                                    </div>--}}
{{--                                    <div class="content">--}}
{{--                                        <p>Meeting about new dashboard...</p>--}}
{{--                                        <span>Cynthia Harvey, April 12,,2018</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="email__footer">--}}
{{--                                    <a href="#">See all emails</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="noti__item js-item-menu">--}}
{{--                            <i class="zmdi zmdi-notifications"></i>--}}
{{--                            <span class="quantity">3</span>--}}
{{--                            <div class="notifi-dropdown js-dropdown">--}}
{{--                                <div class="notifi__title">--}}
{{--                                    <p>You have 3 Notifications</p>--}}
{{--                                </div>--}}
{{--                                <div class="notifi__item">--}}
{{--                                    <div class="bg-c1 img-cir img-40">--}}
{{--                                        <i class="zmdi zmdi-email-open"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="content">--}}
{{--                                        <p>You got a email notification</p>--}}
{{--                                        <span class="date">April 12, 2018 06:50</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="notifi__item">--}}
{{--                                    <div class="bg-c2 img-cir img-40">--}}
{{--                                        <i class="zmdi zmdi-account-box"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="content">--}}
{{--                                        <p>Your account has been blocked</p>--}}
{{--                                        <span class="date">April 12, 2018 06:50</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="notifi__item">--}}
{{--                                    <div class="bg-c3 img-cir img-40">--}}
{{--                                        <i class="zmdi zmdi-file-text"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="content">--}}
{{--                                        <p>You got a new file</p>--}}
{{--                                        <span class="date">April 12, 2018 06:50</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="notifi__footer">--}}
{{--                                    <a href="#">All notifications</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="account-wrap">--}}
{{--                        <div class="account-item clearfix js-item-menu">--}}
{{--                            <div class="image">--}}
{{--                                <img src="{{asset('styleAdmin/images/icon/avatar-01.jpg')}}" alt="John Doe" />--}}
{{--                            </div>--}}
{{--                            <div class="content">--}}
{{--                                <a class="js-acc-btn" href="#">{{$user->name}}</a>--}}
{{--                            </div>--}}
{{--                            <div class="account-dropdown js-dropdown">--}}
{{--                                <div class="info clearfix">--}}
{{--                                    <div class="image">--}}
{{--                                        <a href="#">--}}
{{--                                            <img src="{{asset('styleAdmin/images/icon/avatar-01.jpg')}}" alt="John Doe" />--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="content">--}}
{{--                                        <h5 class="name">--}}
{{--                                            <a href="#">{{$user->name}}</a>--}}
{{--                                        </h5>--}}
{{--                                        <span class="email">{{$user->email}}</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="account-dropdown__body">--}}
{{--                                    <div class="account-dropdown__item">--}}
{{--                                        <a href="#">--}}
{{--                                            <i class="zmdi zmdi-account"></i>Account</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="account-dropdown__item">--}}
{{--                                        <a href="#">--}}
{{--                                            <i class="zmdi zmdi-settings"></i>Setting</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="account-dropdown__item">--}}
{{--                                        <a href="#">--}}
{{--                                            <i class="zmdi zmdi-money-box"></i>Billing</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="account-dropdown__footer">--}}
{{--                                    <a href="{{route('logout')}}" class="btn btn-default btn-flat" onclick="event.preventDefault();--}}
{{--                                        document.getElementById('logout-form').submit();">--}}
{{--                                        Sign out</a>--}}
{{--                                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">--}}
{{--                                        {{csrf_field()}}--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}