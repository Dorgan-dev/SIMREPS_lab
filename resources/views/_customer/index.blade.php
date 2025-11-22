<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('_customer/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('_customer/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('_customer/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('_customer/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('_customer/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('_customer/css/darkmode.css') }}">

    <link rel="shortcut icon" href="{{ asset('_customer/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('_customer/images/logo/logo.png') }}" alt="Logo"
                                    srcset=""></a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                    style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Components</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="component-alert.html">Alert</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-badge.html">Badge</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-breadcrumb.html">Breadcrumb</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-button.html">Button</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-card.html">Card</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-carousel.html">Carousel</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-dropdown.html">Dropdown</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-list-group.html">List Group</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-modal.html">Modal</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-navs.html">Navs</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-pagination.html">Pagination</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-progress.html">Progress</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-spinner.html">Spinner</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-tooltip.html">Tooltip</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Extra Components</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="extra-component-avatar.html">Avatar</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="extra-component-sweetalert.html">Sweet Alert</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="extra-component-toastify.html">Toastify</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="extra-component-rating.html">Rating</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="extra-component-divider.html">Divider</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Layouts</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="layout-default.html">Default Layout</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-vertical-1-column.html">1 Column</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-vertical-navbar.html">Vertical with Navbar</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-horizontal.html">Horizontal Menu</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Forms &amp; Tables</li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-hexagon-fill"></i>
                                <span>Form Elements</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="form-element-input.html">Input</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-element-input-group.html">Input Group</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-element-select.html">Select</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-element-radio.html">Radio</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-element-checkbox.html">Checkbox</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-element-textarea.html">Textarea</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Form Layout</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Form Editor</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="form-editor-quill.html">Quill</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-editor-ckeditor.html">CKEditor</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-editor-summernote.html">Summernote</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="form-editor-tinymce.html">TinyMCE</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="table.html" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Table</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="table-datatable.html" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Datatable</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Extra UI</li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-pentagon-fill"></i>
                                <span>Widgets</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="ui-widgets-chatbox.html">Chatbox</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ui-widgets-pricing.html">Pricing</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ui-widgets-todolist.html">To-do List</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-egg-fill"></i>
                                <span>Icons</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="ui-icons-bootstrap-icons.html">Bootstrap Icons </a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ui-icons-fontawesome.html">Fontawesome</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ui-icons-dripicons.html">Dripicons</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-bar-chart-fill"></i>
                                <span>Charts</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="ui-chart-chartjs.html">ChartJS</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ui-chart-apexcharts.html">Apexcharts</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="ui-file-uploader.html" class='sidebar-link'>
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                                <span>File Uploader</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-map-fill"></i>
                                <span>Maps</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="ui-map-google-map.html">Google Map</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ui-map-jsvectormap.html">JS Vector Map</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Pages</li>

                        <li class="sidebar-item  ">
                            <a href="application-email.html" class='sidebar-link'>
                                <i class="bi bi-envelope-fill"></i>
                                <span>Email Application</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="application-chat.html" class='sidebar-link'>
                                <i class="bi bi-chat-dots-fill"></i>
                                <span>Chat Application</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="application-gallery.html" class='sidebar-link'>
                                <i class="bi bi-image-fill"></i>
                                <span>Photo Gallery</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="application-checkout.html" class='sidebar-link'>
                                <i class="bi bi-basket-fill"></i>
                                <span>Checkout Page</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Authentication</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="auth-login.html">Login</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="auth-register.html">Register</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="auth-forgot-password.html">Forgot Password</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-x-octagon-fill"></i>
                                <span>Errors</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="error-403.html">403</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="error-404.html">404</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="error-500.html">500</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Raise Support</li>

                        <li class="sidebar-item  ">
                            <a href="https://zuramai.github.io/mazer/docs" class='sidebar-link'>
                                <i class="bi bi-life-preserver"></i>
                                <span>Documentation</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                                <i class="bi bi-puzzle"></i>
                                <span>Contribute</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="https://github.com/zuramai/mazer#donate" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Donate</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Profile Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon purple mb-2">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Profile Views</h6>
                                                <h6 class="font-extrabold mb-0">112.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon blue mb-2">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Followers</h6>
                                                <h6 class="font-extrabold mb-0">183.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon green mb-2">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Following</h6>
                                                <h6 class="font-extrabold mb-0">80.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon red mb-2">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Saved Post</h6>
                                                <h6 class="font-extrabold mb-0">112</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit" style="min-height: 315px;">
                                            <div id="apexchartsstsiit9a"
                                                class="apexcharts-canvas apexchartsstsiit9a apexcharts-theme-light"
                                                style="width: 814px; height: 300px;"><svg id="SvgjsSvg9587"
                                                    width="814" height="300" xmlns="http://www.w3.org/2000/svg"
                                                    version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                    xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                    style="background: transparent;">
                                                    <foreignObject x="0" y="0" width="814" height="300">
                                                        <div class="apexcharts-legend"
                                                            xmlns="http://www.w3.org/1999/xhtml"
                                                            style="max-height: 150px;"></div>
                                                    </foreignObject>
                                                    <g id="SvgjsG9695" class="apexcharts-yaxis" rel="0"
                                                        transform="translate(9.51767635345459, 0)">
                                                        <g id="SvgjsG9696" class="apexcharts-yaxis-texts-g"><text
                                                                id="SvgjsText9698"
                                                                font-family="Helvetica, Arial, sans-serif" x="20"
                                                                y="31.6" text-anchor="end" dominant-baseline="auto"
                                                                font-size="11px" font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan9699">30</tspan>
                                                                <title>30</title>
                                                            </text><text id="SvgjsText9701"
                                                                font-family="Helvetica, Arial, sans-serif" x="20"
                                                                y="70.43253323046366" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan9702">25</tspan>
                                                                <title>25</title>
                                                            </text><text id="SvgjsText9704"
                                                                font-family="Helvetica, Arial, sans-serif" x="20"
                                                                y="109.26506646092733" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan9705">20</tspan>
                                                                <title>20</title>
                                                            </text><text id="SvgjsText9707"
                                                                font-family="Helvetica, Arial, sans-serif" x="20"
                                                                y="148.097599691391" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan9708">15</tspan>
                                                                <title>15</title>
                                                            </text><text id="SvgjsText9710"
                                                                font-family="Helvetica, Arial, sans-serif" x="20"
                                                                y="186.93013292185466" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan9711">10</tspan>
                                                                <title>10</title>
                                                            </text><text id="SvgjsText9713"
                                                                font-family="Helvetica, Arial, sans-serif" x="20"
                                                                y="225.76266615231833" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan9714">5</tspan>
                                                                <title>5</title>
                                                            </text><text id="SvgjsText9716"
                                                                font-family="Helvetica, Arial, sans-serif" x="20"
                                                                y="264.595199382782" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan9717">0</tspan>
                                                                <title>0</title>
                                                            </text></g>
                                                    </g>
                                                    <g id="SvgjsG9589" class="apexcharts-inner apexcharts-graphical"
                                                        transform="translate(39.51767635345459, 30)">
                                                        <defs id="SvgjsDefs9588">
                                                            <linearGradient id="SvgjsLinearGradient9592"
                                                                x1="0" y1="0" x2="0"
                                                                y2="1">
                                                                <stop id="SvgjsStop9593" stop-opacity="0.4"
                                                                    stop-color="rgba(216,227,240,0.4)" offset="0">
                                                                </stop>
                                                                <stop id="SvgjsStop9594" stop-opacity="0.5"
                                                                    stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                </stop>
                                                                <stop id="SvgjsStop9595" stop-opacity="0.5"
                                                                    stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                </stop>
                                                            </linearGradient>
                                                            <clipPath id="gridRectMaskstsiit9a">
                                                                <rect id="SvgjsRect9597" width="768.4823236465454"
                                                                    height="236.99519938278195" x="-2" y="-2"
                                                                    rx="0" ry="0" opacity="1"
                                                                    stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fff"></rect>
                                                            </clipPath>
                                                            <clipPath id="forecastMaskstsiit9a"></clipPath>
                                                            <clipPath id="nonForecastMaskstsiit9a"></clipPath>
                                                            <clipPath id="gridRectMarkerMaskstsiit9a">
                                                                <rect id="SvgjsRect9598" width="768.4823236465454"
                                                                    height="236.99519938278195" x="-2" y="-2"
                                                                    rx="0" ry="0" opacity="1"
                                                                    stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fff"></rect>
                                                            </clipPath>
                                                        </defs>
                                                        <rect id="SvgjsRect9596" width="44.59480221271515"
                                                            height="232.99519938278195" x="327.29312666654585" y="0"
                                                            rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke-dasharray="3"
                                                            fill="url(#SvgjsLinearGradient9592)"
                                                            class="apexcharts-xcrosshairs" y2="232.99519938278195"
                                                            filter="none" fill-opacity="0.9" x1="327.29312666654585"
                                                            x2="327.29312666654585"></rect>
                                                        <line id="SvgjsLine9632" x1="0"
                                                            y1="233.99519938278195" x2="0"
                                                            y2="239.99519938278195" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine9633" x1="63.706860303878784"
                                                            y1="233.99519938278195" x2="63.706860303878784"
                                                            y2="239.99519938278195" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine9634" x1="127.41372060775757"
                                                            y1="233.99519938278195" x2="127.41372060775757"
                                                            y2="239.99519938278195" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine9635" x1="191.12058091163635"
                                                            y1="233.99519938278195" x2="191.12058091163635"
                                                            y2="239.99519938278195" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine9636" x1="254.82744121551514"
                                                            y1="233.99519938278195" x2="254.82744121551514"
                                                            y2="239.99519938278195" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine9637" x1="318.5343015193939"
                                                            y1="233.99519938278195" x2="318.5343015193939"
                                                            y2="239.99519938278195" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine9638" x1="382.2411618232727"
                                                            y1="233.99519938278195" x2="382.2411618232727"
                                                            y2="239.99519938278195" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine9639" x1="445.9480221271515"
                                                            y1="233.99519938278195" x2="445.9480221271515"
                                                            y2="239.99519938278195" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine9640" x1="509.6548824310303"
                                                            y1="233.99519938278195" x2="509.6548824310303"
                                                            y2="239.99519938278195" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine9641" x1="573.3617427349091"
                                                            y1="233.99519938278195" x2="573.3617427349091"
                                                            y2="239.99519938278195" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine9642" x1="637.0686030387878"
                                                            y1="233.99519938278195" x2="637.0686030387878"
                                                            y2="239.99519938278195" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine9643" x1="700.7754633426666"
                                                            y1="233.99519938278195" x2="700.7754633426666"
                                                            y2="239.99519938278195" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine9644" x1="764.4823236465454"
                                                            y1="233.99519938278195" x2="764.4823236465454"
                                                            y2="239.99519938278195" stroke="#e0e0e0"
                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                            class="apexcharts-xaxis-tick"></line>
                                                        <g id="SvgjsG9628" class="apexcharts-grid">
                                                            <g id="SvgjsG9629"
                                                                class="apexcharts-gridlines-horizontal">
                                                                <line id="SvgjsLine9646" x1="0"
                                                                    y1="38.83253323046366" x2="764.4823236465454"
                                                                    y2="38.83253323046366" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine9647" x1="0"
                                                                    y1="77.66506646092732" x2="764.4823236465454"
                                                                    y2="77.66506646092732" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine9648" x1="0"
                                                                    y1="116.49759969139097" x2="764.4823236465454"
                                                                    y2="116.49759969139097" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine9649" x1="0"
                                                                    y1="155.33013292185464" x2="764.4823236465454"
                                                                    y2="155.33013292185464" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine9650" x1="0"
                                                                    y1="194.1626661523183" x2="764.4823236465454"
                                                                    y2="194.1626661523183" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine9651" x1="0"
                                                                    y1="232.99519938278198" x2="764.4823236465454"
                                                                    y2="232.99519938278198" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                            </g>
                                                            <g id="SvgjsG9630" class="apexcharts-gridlines-vertical">
                                                            </g>
                                                            <line id="SvgjsLine9653" x1="0"
                                                                y1="232.99519938278195" x2="764.4823236465454"
                                                                y2="232.99519938278195" stroke="transparent"
                                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            <line id="SvgjsLine9652" x1="0" y1="1"
                                                                x2="0" y2="232.99519938278195"
                                                                stroke="transparent" stroke-dasharray="0"
                                                                stroke-linecap="butt"></line>
                                                        </g>
                                                        <g id="SvgjsG9631" class="apexcharts-grid-borders">
                                                            <line id="SvgjsLine9645" x1="0" y1="0"
                                                                x2="764.4823236465454" y2="0"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                            </line>
                                                            <line id="SvgjsLine9694" x1="0"
                                                                y1="233.99519938278195" x2="764.4823236465454"
                                                                y2="233.99519938278195" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt"></line>
                                                        </g>
                                                        <g id="SvgjsG9599"
                                                            class="apexcharts-bar-series apexcharts-plot-series">
                                                            <g id="SvgjsG9600" class="apexcharts-series"
                                                                rel="1" seriesName="sales" data:realIndex="0">
                                                                <path id="SvgjsPath9605"
                                                                    d="M 9.556029045581816 232.99619938278195 L 9.556029045581816 163.09763956794737 L 54.15083125829697 163.09763956794737 L 54.15083125829697 232.99619938278195 Z"
                                                                    fill="rgba(67,94,190,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectMaskstsiit9a)"
                                                                    pathTo="M 9.556029045581816 232.99619938278195 L 9.556029045581816 163.09763956794737 L 54.15083125829697 163.09763956794737 L 54.15083125829697 232.99619938278195 Z"
                                                                    pathFrom="M 9.556029045581816 232.99619938278195 L 9.556029045581816 232.99619938278195 L 54.15083125829697 232.99619938278195 L 54.15083125829697 232.99619938278195 L 54.15083125829697 232.99619938278195 L 54.15083125829697 232.99619938278195 L 54.15083125829697 232.99619938278195 L 9.556029045581816 232.99619938278195 Z"
                                                                    cy="163.09663956794736" cx="73.26288934946061"
                                                                    j="0" val="9" barHeight="69.89855981483458"
                                                                    barWidth="44.59480221271515"></path>
                                                                <path id="SvgjsPath9607"
                                                                    d="M 73.26288934946061 232.99619938278195 L 73.26288934946061 77.66606646092734 L 117.85769156217576 77.66606646092734 L 117.85769156217576 232.99619938278195 Z"
                                                                    fill="rgba(67,94,190,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectMaskstsiit9a)"
                                                                    pathTo="M 73.26288934946061 232.99619938278195 L 73.26288934946061 77.66606646092734 L 117.85769156217576 77.66606646092734 L 117.85769156217576 232.99619938278195 Z"
                                                                    pathFrom="M 73.26288934946061 232.99619938278195 L 73.26288934946061 232.99619938278195 L 117.85769156217576 232.99619938278195 L 117.85769156217576 232.99619938278195 L 117.85769156217576 232.99619938278195 L 117.85769156217576 232.99619938278195 L 117.85769156217576 232.99619938278195 L 73.26288934946061 232.99619938278195 Z"
                                                                    cy="77.66506646092733" cx="136.9697496533394"
                                                                    j="1" val="20" barHeight="155.3301329218546"
                                                                    barWidth="44.59480221271515"></path>
                                                                <path id="SvgjsPath9609"
                                                                    d="M 136.9697496533394 232.99619938278195 L 136.9697496533394 0.0010000000000284217 L 181.56455186605456 0.0010000000000284217 L 181.56455186605456 232.99619938278195 Z"
                                                                    fill="rgba(67,94,190,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectMaskstsiit9a)"
                                                                    pathTo="M 136.9697496533394 232.99619938278195 L 136.9697496533394 0.0010000000000284217 L 181.56455186605456 0.0010000000000284217 L 181.56455186605456 232.99619938278195 Z"
                                                                    pathFrom="M 136.9697496533394 232.99619938278195 L 136.9697496533394 232.99619938278195 L 181.56455186605456 232.99619938278195 L 181.56455186605456 232.99619938278195 L 181.56455186605456 232.99619938278195 L 181.56455186605456 232.99619938278195 L 181.56455186605456 232.99619938278195 L 136.9697496533394 232.99619938278195 Z"
                                                                    cy="2.842170943040401e-14" cx="200.67660995721818"
                                                                    j="2" val="30"
                                                                    barHeight="232.99519938278192"
                                                                    barWidth="44.59480221271515"></path>
                                                                <path id="SvgjsPath9611"
                                                                    d="M 200.67660995721818 232.99619938278195 L 200.67660995721818 77.66606646092734 L 245.27141216993334 77.66606646092734 L 245.27141216993334 232.99619938278195 Z"
                                                                    fill="rgba(67,94,190,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectMaskstsiit9a)"
                                                                    pathTo="M 200.67660995721818 232.99619938278195 L 200.67660995721818 77.66606646092734 L 245.27141216993334 77.66606646092734 L 245.27141216993334 232.99619938278195 Z"
                                                                    pathFrom="M 200.67660995721818 232.99619938278195 L 200.67660995721818 232.99619938278195 L 245.27141216993334 232.99619938278195 L 245.27141216993334 232.99619938278195 L 245.27141216993334 232.99619938278195 L 245.27141216993334 232.99619938278195 L 245.27141216993334 232.99619938278195 L 200.67660995721818 232.99619938278195 Z"
                                                                    cy="77.66506646092733" cx="264.38347026109693"
                                                                    j="3" val="20" barHeight="155.3301329218546"
                                                                    barWidth="44.59480221271515"></path>
                                                                <path id="SvgjsPath9613"
                                                                    d="M 264.38347026109693 232.99619938278195 L 264.38347026109693 155.33113292185465 L 308.97827247381207 155.33113292185465 L 308.97827247381207 232.99619938278195 Z"
                                                                    fill="rgba(67,94,190,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectMaskstsiit9a)"
                                                                    pathTo="M 264.38347026109693 232.99619938278195 L 264.38347026109693 155.33113292185465 L 308.97827247381207 155.33113292185465 L 308.97827247381207 232.99619938278195 Z"
                                                                    pathFrom="M 264.38347026109693 232.99619938278195 L 264.38347026109693 232.99619938278195 L 308.97827247381207 232.99619938278195 L 308.97827247381207 232.99619938278195 L 308.97827247381207 232.99619938278195 L 308.97827247381207 232.99619938278195 L 308.97827247381207 232.99619938278195 L 264.38347026109693 232.99619938278195 Z"
                                                                    cy="155.33013292185464" cx="328.0903305649757"
                                                                    j="4" val="10" barHeight="77.6650664609273"
                                                                    barWidth="44.59480221271515"></path>
                                                                <path id="SvgjsPath9615"
                                                                    d="M 328.0903305649757 232.99619938278195 L 328.0903305649757 77.66606646092734 L 372.68513277769085 77.66606646092734 L 372.68513277769085 232.99619938278195 Z"
                                                                    fill="rgba(67,94,190,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectMaskstsiit9a)"
                                                                    pathTo="M 328.0903305649757 232.99619938278195 L 328.0903305649757 77.66606646092734 L 372.68513277769085 77.66606646092734 L 372.68513277769085 232.99619938278195 Z"
                                                                    pathFrom="M 328.0903305649757 232.99619938278195 L 328.0903305649757 232.99619938278195 L 372.68513277769085 232.99619938278195 L 372.68513277769085 232.99619938278195 L 372.68513277769085 232.99619938278195 L 372.68513277769085 232.99619938278195 L 372.68513277769085 232.99619938278195 L 328.0903305649757 232.99619938278195 Z"
                                                                    cy="77.66506646092733" cx="391.7971908688545"
                                                                    j="5" val="20" barHeight="155.3301329218546"
                                                                    barWidth="44.59480221271515"></path>
                                                                <path id="SvgjsPath9617"
                                                                    d="M 391.7971908688545 232.99619938278195 L 391.7971908688545 0.0010000000000284217 L 436.39199308156964 0.0010000000000284217 L 436.39199308156964 232.99619938278195 Z"
                                                                    fill="rgba(67,94,190,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectMaskstsiit9a)"
                                                                    pathTo="M 391.7971908688545 232.99619938278195 L 391.7971908688545 0.0010000000000284217 L 436.39199308156964 0.0010000000000284217 L 436.39199308156964 232.99619938278195 Z"
                                                                    pathFrom="M 391.7971908688545 232.99619938278195 L 391.7971908688545 232.99619938278195 L 436.39199308156964 232.99619938278195 L 436.39199308156964 232.99619938278195 L 436.39199308156964 232.99619938278195 L 436.39199308156964 232.99619938278195 L 436.39199308156964 232.99619938278195 L 391.7971908688545 232.99619938278195 Z"
                                                                    cy="2.842170943040401e-14" cx="455.5040511727333"
                                                                    j="6" val="30"
                                                                    barHeight="232.99519938278192"
                                                                    barWidth="44.59480221271515"></path>
                                                                <path id="SvgjsPath9619"
                                                                    d="M 455.5040511727333 232.99619938278195 L 455.5040511727333 77.66606646092734 L 500.0988533854484 77.66606646092734 L 500.0988533854484 232.99619938278195 Z"
                                                                    fill="rgba(67,94,190,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectMaskstsiit9a)"
                                                                    pathTo="M 455.5040511727333 232.99619938278195 L 455.5040511727333 77.66606646092734 L 500.0988533854484 77.66606646092734 L 500.0988533854484 232.99619938278195 Z"
                                                                    pathFrom="M 455.5040511727333 232.99619938278195 L 455.5040511727333 232.99619938278195 L 500.0988533854484 232.99619938278195 L 500.0988533854484 232.99619938278195 L 500.0988533854484 232.99619938278195 L 500.0988533854484 232.99619938278195 L 500.0988533854484 232.99619938278195 L 455.5040511727333 232.99619938278195 Z"
                                                                    cy="77.66506646092733" cx="519.2109114766121"
                                                                    j="7" val="20" barHeight="155.3301329218546"
                                                                    barWidth="44.59480221271515"></path>
                                                                <path id="SvgjsPath9621"
                                                                    d="M 519.2109114766121 232.99619938278195 L 519.2109114766121 155.33113292185465 L 563.8057136893273 155.33113292185465 L 563.8057136893273 232.99619938278195 Z"
                                                                    fill="rgba(67,94,190,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectMaskstsiit9a)"
                                                                    pathTo="M 519.2109114766121 232.99619938278195 L 519.2109114766121 155.33113292185465 L 563.8057136893273 155.33113292185465 L 563.8057136893273 232.99619938278195 Z"
                                                                    pathFrom="M 519.2109114766121 232.99619938278195 L 519.2109114766121 232.99619938278195 L 563.8057136893273 232.99619938278195 L 563.8057136893273 232.99619938278195 L 563.8057136893273 232.99619938278195 L 563.8057136893273 232.99619938278195 L 563.8057136893273 232.99619938278195 L 519.2109114766121 232.99619938278195 Z"
                                                                    cy="155.33013292185464" cx="582.9177717804909"
                                                                    j="8" val="10" barHeight="77.6650664609273"
                                                                    barWidth="44.59480221271515"></path>
                                                                <path id="SvgjsPath9623"
                                                                    d="M 582.9177717804909 232.99619938278195 L 582.9177717804909 77.66606646092734 L 627.512573993206 77.66606646092734 L 627.512573993206 232.99619938278195 Z"
                                                                    fill="rgba(67,94,190,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectMaskstsiit9a)"
                                                                    pathTo="M 582.9177717804909 232.99619938278195 L 582.9177717804909 77.66606646092734 L 627.512573993206 77.66606646092734 L 627.512573993206 232.99619938278195 Z"
                                                                    pathFrom="M 582.9177717804909 232.99619938278195 L 582.9177717804909 232.99619938278195 L 627.512573993206 232.99619938278195 L 627.512573993206 232.99619938278195 L 627.512573993206 232.99619938278195 L 627.512573993206 232.99619938278195 L 627.512573993206 232.99619938278195 L 582.9177717804909 232.99619938278195 Z"
                                                                    cy="77.66506646092733" cx="646.6246320843696"
                                                                    j="9" val="20" barHeight="155.3301329218546"
                                                                    barWidth="44.59480221271515"></path>
                                                                <path id="SvgjsPath9625"
                                                                    d="M 646.6246320843696 232.99619938278195 L 646.6246320843696 0.0010000000000284217 L 691.2194342970848 0.0010000000000284217 L 691.2194342970848 232.99619938278195 Z"
                                                                    fill="rgba(67,94,190,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectMaskstsiit9a)"
                                                                    pathTo="M 646.6246320843696 232.99619938278195 L 646.6246320843696 0.0010000000000284217 L 691.2194342970848 0.0010000000000284217 L 691.2194342970848 232.99619938278195 Z"
                                                                    pathFrom="M 646.6246320843696 232.99619938278195 L 646.6246320843696 232.99619938278195 L 691.2194342970848 232.99619938278195 L 691.2194342970848 232.99619938278195 L 691.2194342970848 232.99619938278195 L 691.2194342970848 232.99619938278195 L 691.2194342970848 232.99619938278195 L 646.6246320843696 232.99619938278195 Z"
                                                                    cy="2.842170943040401e-14" cx="710.3314923882484"
                                                                    j="10" val="30"
                                                                    barHeight="232.99519938278192"
                                                                    barWidth="44.59480221271515"></path>
                                                                <path id="SvgjsPath9627"
                                                                    d="M 710.3314923882484 232.99619938278195 L 710.3314923882484 77.66606646092734 L 754.9262946009636 77.66606646092734 L 754.9262946009636 232.99619938278195 Z"
                                                                    fill="rgba(67,94,190,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectMaskstsiit9a)"
                                                                    pathTo="M 710.3314923882484 232.99619938278195 L 710.3314923882484 77.66606646092734 L 754.9262946009636 77.66606646092734 L 754.9262946009636 232.99619938278195 Z"
                                                                    pathFrom="M 710.3314923882484 232.99619938278195 L 710.3314923882484 232.99619938278195 L 754.9262946009636 232.99619938278195 L 754.9262946009636 232.99619938278195 L 754.9262946009636 232.99619938278195 L 754.9262946009636 232.99619938278195 L 754.9262946009636 232.99619938278195 L 710.3314923882484 232.99619938278195 Z"
                                                                    cy="77.66506646092733" cx="774.0383526921272"
                                                                    j="11" val="20"
                                                                    barHeight="155.3301329218546"
                                                                    barWidth="44.59480221271515"></path>
                                                                <g id="SvgjsG9602"
                                                                    class="apexcharts-bar-goals-markers">
                                                                    <g id="SvgjsG9604"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskstsiit9a)">
                                                                    </g>
                                                                    <g id="SvgjsG9606"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskstsiit9a)">
                                                                    </g>
                                                                    <g id="SvgjsG9608"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskstsiit9a)">
                                                                    </g>
                                                                    <g id="SvgjsG9610"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskstsiit9a)">
                                                                    </g>
                                                                    <g id="SvgjsG9612"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskstsiit9a)">
                                                                    </g>
                                                                    <g id="SvgjsG9614"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskstsiit9a)">
                                                                    </g>
                                                                    <g id="SvgjsG9616"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskstsiit9a)">
                                                                    </g>
                                                                    <g id="SvgjsG9618"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskstsiit9a)">
                                                                    </g>
                                                                    <g id="SvgjsG9620"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskstsiit9a)">
                                                                    </g>
                                                                    <g id="SvgjsG9622"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskstsiit9a)">
                                                                    </g>
                                                                    <g id="SvgjsG9624"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskstsiit9a)">
                                                                    </g>
                                                                    <g id="SvgjsG9626"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskstsiit9a)">
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG9603"
                                                                    class="apexcharts-bar-shadows apexcharts-hidden-element-shown">
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG9601"
                                                                class="apexcharts-datalabels apexcharts-hidden-element-shown"
                                                                data:realIndex="0"></g>
                                                        </g>
                                                        <line id="SvgjsLine9654" x1="0" y1="0"
                                                            x2="764.4823236465454" y2="0" stroke="#b6b6b6"
                                                            stroke-dasharray="0" stroke-width="1"
                                                            stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                        </line>
                                                        <line id="SvgjsLine9655" x1="0" y1="0"
                                                            x2="764.4823236465454" y2="0"
                                                            stroke-dasharray="0" stroke-width="0"
                                                            stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs-hidden"></line>
                                                        <g id="SvgjsG9656" class="apexcharts-xaxis"
                                                            transform="translate(0, 0)">
                                                            <g id="SvgjsG9657" class="apexcharts-xaxis-texts-g"
                                                                transform="translate(0, -4)"><text id="SvgjsText9659"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="31.853430151939392" y="261.99519938278195"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan9660">Jan</tspan>
                                                                    <title>Jan</title>
                                                                </text><text id="SvgjsText9662"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="95.56029045581818" y="261.99519938278195"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan9663">Feb</tspan>
                                                                    <title>Feb</title>
                                                                </text><text id="SvgjsText9665"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="159.26715075969696" y="261.99519938278195"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan9666">Mar</tspan>
                                                                    <title>Mar</title>
                                                                </text><text id="SvgjsText9668"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="222.97401106357574" y="261.99519938278195"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan9669">Apr</tspan>
                                                                    <title>Apr</title>
                                                                </text><text id="SvgjsText9671"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="286.68087136745453" y="261.99519938278195"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan9672">May</tspan>
                                                                    <title>May</title>
                                                                </text><text id="SvgjsText9674"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="350.3877316713333" y="261.99519938278195"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan9675">Jun</tspan>
                                                                    <title>Jun</title>
                                                                </text><text id="SvgjsText9677"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="414.0945919752121" y="261.99519938278195"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan9678">Jul</tspan>
                                                                    <title>Jul</title>
                                                                </text><text id="SvgjsText9680"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="477.8014522790909" y="261.99519938278195"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan9681">Aug</tspan>
                                                                    <title>Aug</title>
                                                                </text><text id="SvgjsText9683"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="541.5083125829697" y="261.99519938278195"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan9684">Sep</tspan>
                                                                    <title>Sep</title>
                                                                </text><text id="SvgjsText9686"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="605.2151728868484" y="261.99519938278195"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan9687">Oct</tspan>
                                                                    <title>Oct</title>
                                                                </text><text id="SvgjsText9689"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="668.9220331907272" y="261.99519938278195"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan9690">Nov</tspan>
                                                                    <title>Nov</title>
                                                                </text><text id="SvgjsText9692"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="732.628893494606" y="261.99519938278195"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan9693">Dec</tspan>
                                                                    <title>Dec</title>
                                                                </text></g>
                                                        </g>
                                                        <g id="SvgjsG9718" class="apexcharts-yaxis-annotations"></g>
                                                        <g id="SvgjsG9719" class="apexcharts-xaxis-annotations"></g>
                                                        <g id="SvgjsG9720" class="apexcharts-point-annotations"></g>
                                                    </g>
                                                </svg>
                                                <div class="apexcharts-tooltip apexcharts-theme-light"
                                                    style="left: 389.108px; top: 72.3px;">
                                                    <div class="apexcharts-tooltip-title"
                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        Jun</div>
                                                    <div class="apexcharts-tooltip-series-group apexcharts-active"
                                                        style="order: 1; display: flex;"><span
                                                            class="apexcharts-tooltip-marker"
                                                            style="background-color: rgb(67, 94, 190);"></span>
                                                        <div class="apexcharts-tooltip-text"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label">sales:
                                                                </span><span
                                                                    class="apexcharts-tooltip-text-y-value">20</span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                    <div class="apexcharts-yaxistooltip-text"></div>
                                                </div>
                                                <div class="apexcharts-toolbar" style="top: 0px; right: 3px;">
                                                    <div class="apexcharts-menu-icon" title="Menu"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24">
                                                            <path fill="none" d="M0 0h24v24H0V0z"></path>
                                                            <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z">
                                                            </path>
                                                        </svg></div>
                                                    <div class="apexcharts-menu">
                                                        <div class="apexcharts-menu-item exportSVG"
                                                            title="Download SVG">Download SVG</div>
                                                        <div class="apexcharts-menu-item exportPNG"
                                                            title="Download PNG">Download PNG</div>
                                                        <div class="apexcharts-menu-item exportCSV"
                                                            title="Download CSV">Download CSV</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-primary" width="32" height="32"
                                                        fill="blue" style="width:10px">
                                                        <use
                                                            xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill">
                                                        </use>
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">Europe</h5>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <h5 class="mb-0 text-end">862</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-europe" style="min-height: 95px;">
                                                    <div id="apexchartsmb0ac8lv"
                                                        class="apexcharts-canvas apexchartsmb0ac8lv apexcharts-theme-light"
                                                        style="width: 223px; height: 80px;"><svg id="SvgjsSvg9540"
                                                            width="223" height="80"
                                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns:svgjs="http://svgjs.dev"
                                                            class="apexcharts-svg apexcharts-zoomable"
                                                            xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                            style="background: transparent;">
                                                            <foreignObject x="0" y="0" width="223"
                                                                height="80">
                                                                <div class="apexcharts-legend"
                                                                    xmlns="http://www.w3.org/1999/xhtml"
                                                                    style="max-height: 40px;"></div>
                                                            </foreignObject>
                                                            <rect id="SvgjsRect9547" width="0" height="0"
                                                                x="0" y="0" rx="0" ry="0"
                                                                opacity="1" stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fefefe"></rect>
                                                            <g id="SvgjsG9579" class="apexcharts-yaxis"
                                                                rel="0" transform="translate(-8, 0)">
                                                                <g id="SvgjsG9580" class="apexcharts-yaxis-texts-g">
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG9542"
                                                                class="apexcharts-inner apexcharts-graphical"
                                                                transform="translate(22, 30)">
                                                                <defs id="SvgjsDefs9541">
                                                                    <clipPath id="gridRectMaskmb0ac8lv">
                                                                        <rect id="SvgjsRect9551" width="197"
                                                                            height="41" x="-3" y="-3"
                                                                            rx="0" ry="0"
                                                                            opacity="1" stroke-width="0"
                                                                            stroke="none" stroke-dasharray="0"
                                                                            fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <clipPath id="forecastMaskmb0ac8lv"></clipPath>
                                                                    <clipPath id="nonForecastMaskmb0ac8lv"></clipPath>
                                                                    <clipPath id="gridRectMarkerMaskmb0ac8lv">
                                                                        <rect id="SvgjsRect9552" width="195"
                                                                            height="39" x="-2" y="-2"
                                                                            rx="0" ry="0"
                                                                            opacity="1" stroke-width="0"
                                                                            stroke="none" stroke-dasharray="0"
                                                                            fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <linearGradient id="SvgjsLinearGradient9557"
                                                                        x1="0" y1="0"
                                                                        x2="0" y2="1">
                                                                        <stop id="SvgjsStop9558" stop-opacity="0.65"
                                                                            stop-color="rgba(83,80,233,0.65)"
                                                                            offset="0"></stop>
                                                                        <stop id="SvgjsStop9559" stop-opacity="0.5"
                                                                            stop-color="rgba(169,168,244,0.5)"
                                                                            offset="1"></stop>
                                                                        <stop id="SvgjsStop9560" stop-opacity="0.5"
                                                                            stop-color="rgba(169,168,244,0.5)"
                                                                            offset="1"></stop>
                                                                    </linearGradient>
                                                                </defs>
                                                                <line id="SvgjsLine9548" x1="0"
                                                                    y1="0" x2="0" y2="18"
                                                                    stroke="#b6b6b6" stroke-dasharray="3"
                                                                    stroke-linecap="butt"
                                                                    class="apexcharts-xcrosshairs" x="0" y="0"
                                                                    width="1" height="18" fill="#b1b9c4"
                                                                    filter="none" fill-opacity="0.9"
                                                                    stroke-width="1"></line>
                                                                <g id="SvgjsG9563" class="apexcharts-grid">
                                                                    <g id="SvgjsG9564"
                                                                        class="apexcharts-gridlines-horizontal"
                                                                        style="display: none;">
                                                                        <line id="SvgjsLine9567" x1="0"
                                                                            y1="0" x2="191"
                                                                            y2="0" stroke="#e0e0e0"
                                                                            stroke-dasharray="0"
                                                                            stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line id="SvgjsLine9568" x1="0"
                                                                            y1="35" x2="191"
                                                                            y2="35" stroke="#e0e0e0"
                                                                            stroke-dasharray="0"
                                                                            stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                    </g>
                                                                    <g id="SvgjsG9565"
                                                                        class="apexcharts-gridlines-vertical"
                                                                        style="display: none;"></g>
                                                                    <line id="SvgjsLine9570" x1="0"
                                                                        y1="35" x2="191"
                                                                        y2="35" stroke="transparent"
                                                                        stroke-dasharray="0" stroke-linecap="butt">
                                                                    </line>
                                                                    <line id="SvgjsLine9569" x1="0"
                                                                        y1="1" x2="0"
                                                                        y2="35" stroke="transparent"
                                                                        stroke-dasharray="0" stroke-linecap="butt">
                                                                    </line>
                                                                </g>
                                                                <g id="SvgjsG9566" class="apexcharts-grid-borders"
                                                                    style="display: none;"></g>
                                                                <g id="SvgjsG9553"
                                                                    class="apexcharts-area-series apexcharts-plot-series">
                                                                    <g id="SvgjsG9554" class="apexcharts-series"
                                                                        zIndex="0" seriesName="series1"
                                                                        data:longestSeries="true" rel="1"
                                                                        data:realIndex="0">
                                                                        <path id="SvgjsPath9561"
                                                                            d="M 0 35 L 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093C 191 15.590909090909093 191 15.590909090909093 191 35M 191 15.590909090909093z"
                                                                            fill="url(#SvgjsLinearGradient9557)"
                                                                            fill-opacity="1" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-area" index="0"
                                                                            clip-path="url(#gridRectMaskmb0ac8lv)"
                                                                            pathTo="M 0 35 L 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093C 191 15.590909090909093 191 15.590909090909093 191 35M 191 15.590909090909093z"
                                                                            pathFrom="M -1 54.09090909090909 L -1 54.09090909090909 L 24.913043478260867 54.09090909090909 L 41.52173913043478 54.09090909090909 L 58.130434782608695 54.09090909090909 L 74.73913043478261 54.09090909090909 L 91.34782608695652 54.09090909090909 L 107.95652173913044 54.09090909090909 L 124.56521739130434 54.09090909090909 L 141.17391304347825 54.09090909090909 L 157.78260869565216 54.09090909090909 L 174.3913043478261 54.09090909090909 L 191 54.09090909090909">
                                                                        </path>
                                                                        <path id="SvgjsPath9562"
                                                                            d="M 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093"
                                                                            fill="none" fill-opacity="1"
                                                                            stroke="#5350e9" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="2"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-area" index="0"
                                                                            clip-path="url(#gridRectMaskmb0ac8lv)"
                                                                            pathTo="M 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093"
                                                                            pathFrom="M -1 54.09090909090909 L -1 54.09090909090909 L 24.913043478260867 54.09090909090909 L 41.52173913043478 54.09090909090909 L 58.130434782608695 54.09090909090909 L 74.73913043478261 54.09090909090909 L 91.34782608695652 54.09090909090909 L 107.95652173913044 54.09090909090909 L 124.56521739130434 54.09090909090909 L 141.17391304347825 54.09090909090909 L 157.78260869565216 54.09090909090909 L 174.3913043478261 54.09090909090909 L 191 54.09090909090909"
                                                                            fill-rule="evenodd"></path>
                                                                        <g id="SvgjsG9555"
                                                                            class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                            data:realIndex="0">
                                                                            <g class="apexcharts-series-markers">
                                                                                <circle id="SvgjsCircle9584" r="0"
                                                                                    cx="0" cy="0"
                                                                                    class="apexcharts-marker wkmobch36j no-pointer-events"
                                                                                    stroke="#ffffff" fill="#5350e9"
                                                                                    fill-opacity="1"
                                                                                    stroke-width="2"
                                                                                    stroke-opacity="0.9"
                                                                                    default-marker-size="0"></circle>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g id="SvgjsG9556" class="apexcharts-datalabels"
                                                                        data:realIndex="0"></g>
                                                                </g>
                                                                <line id="SvgjsLine9571" x1="0"
                                                                    y1="0" x2="191" y2="0"
                                                                    stroke="#b6b6b6" stroke-dasharray="0"
                                                                    stroke-width="1" stroke-linecap="butt"
                                                                    class="apexcharts-ycrosshairs"></line>
                                                                <line id="SvgjsLine9572" x1="0"
                                                                    y1="0" x2="191" y2="0"
                                                                    stroke-dasharray="0" stroke-width="0"
                                                                    stroke-linecap="butt"
                                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                                                <g id="SvgjsG9573" class="apexcharts-xaxis"
                                                                    transform="translate(0, 0)">
                                                                    <g id="SvgjsG9574"
                                                                        class="apexcharts-xaxis-texts-g"
                                                                        transform="translate(0, -4)"></g>
                                                                </g>
                                                                <g id="SvgjsG9581"
                                                                    class="apexcharts-yaxis-annotations"></g>
                                                                <g id="SvgjsG9582"
                                                                    class="apexcharts-xaxis-annotations"></g>
                                                                <g id="SvgjsG9583"
                                                                    class="apexcharts-point-annotations"></g>
                                                                <rect id="SvgjsRect9585" width="0"
                                                                    height="0" x="0" y="0" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0"
                                                                    fill="#fefefe" class="apexcharts-zoom-rect">
                                                                </rect>
                                                                <rect id="SvgjsRect9586" width="0"
                                                                    height="0" x="0" y="0" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0"
                                                                    fill="#fefefe"
                                                                    class="apexcharts-selection-rect"></rect>
                                                            </g>
                                                        </svg>
                                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                                            <div class="apexcharts-tooltip-title"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            </div>
                                                            <div class="apexcharts-tooltip-series-group"
                                                                style="order: 1;"><span
                                                                    class="apexcharts-tooltip-marker"
                                                                    style="background-color: rgb(83, 80, 233);"></span>
                                                                <div class="apexcharts-tooltip-text"
                                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                    <div class="apexcharts-tooltip-y-group"><span
                                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                                            class="apexcharts-tooltip-text-y-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                                            class="apexcharts-tooltip-text-goals-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-z-group"><span
                                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                                            class="apexcharts-tooltip-text-z-value"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                                            <div class="apexcharts-xaxistooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                            <div class="apexcharts-yaxistooltip-text"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-success" width="32" height="32"
                                                        fill="blue" style="width:10px">
                                                        <use
                                                            xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill">
                                                        </use>
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">America</h5>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <h5 class="mb-0 text-end">375</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-america" style="min-height: 95px;">
                                                    <div id="apexchartsirjd9dcv"
                                                        class="apexcharts-canvas apexchartsirjd9dcv apexcharts-theme-light"
                                                        style="width: 223px; height: 80px;"><svg id="SvgjsSvg9444"
                                                            width="223" height="80"
                                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns:svgjs="http://svgjs.dev"
                                                            class="apexcharts-svg apexcharts-zoomable"
                                                            xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                            style="background: transparent;">
                                                            <foreignObject x="0" y="0" width="223"
                                                                height="80">
                                                                <div class="apexcharts-legend"
                                                                    xmlns="http://www.w3.org/1999/xhtml"
                                                                    style="max-height: 40px;"></div>
                                                            </foreignObject>
                                                            <rect id="SvgjsRect9451" width="0" height="0"
                                                                x="0" y="0" rx="0" ry="0"
                                                                opacity="1" stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fefefe"></rect>
                                                            <g id="SvgjsG9483" class="apexcharts-yaxis"
                                                                rel="0" transform="translate(-8, 0)">
                                                                <g id="SvgjsG9484" class="apexcharts-yaxis-texts-g">
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG9446"
                                                                class="apexcharts-inner apexcharts-graphical"
                                                                transform="translate(22, 30)">
                                                                <defs id="SvgjsDefs9445">
                                                                    <clipPath id="gridRectMaskirjd9dcv">
                                                                        <rect id="SvgjsRect9455" width="197"
                                                                            height="41" x="-3" y="-3"
                                                                            rx="0" ry="0"
                                                                            opacity="1" stroke-width="0"
                                                                            stroke="none" stroke-dasharray="0"
                                                                            fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <clipPath id="forecastMaskirjd9dcv"></clipPath>
                                                                    <clipPath id="nonForecastMaskirjd9dcv"></clipPath>
                                                                    <clipPath id="gridRectMarkerMaskirjd9dcv">
                                                                        <rect id="SvgjsRect9456" width="195"
                                                                            height="39" x="-2" y="-2"
                                                                            rx="0" ry="0"
                                                                            opacity="1" stroke-width="0"
                                                                            stroke="none" stroke-dasharray="0"
                                                                            fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <linearGradient id="SvgjsLinearGradient9461"
                                                                        x1="0" y1="0"
                                                                        x2="0" y2="1">
                                                                        <stop id="SvgjsStop9462" stop-opacity="0.65"
                                                                            stop-color="rgba(0,139,117,0.65)"
                                                                            offset="0"></stop>
                                                                        <stop id="SvgjsStop9463" stop-opacity="0.5"
                                                                            stop-color="rgba(128,197,186,0.5)"
                                                                            offset="1"></stop>
                                                                        <stop id="SvgjsStop9464" stop-opacity="0.5"
                                                                            stop-color="rgba(128,197,186,0.5)"
                                                                            offset="1"></stop>
                                                                    </linearGradient>
                                                                </defs>
                                                                <line id="SvgjsLine9452" x1="0"
                                                                    y1="0" x2="0" y2="18"
                                                                    stroke="#b6b6b6" stroke-dasharray="3"
                                                                    stroke-linecap="butt"
                                                                    class="apexcharts-xcrosshairs" x="0" y="0"
                                                                    width="1" height="18" fill="#b1b9c4"
                                                                    filter="none" fill-opacity="0.9"
                                                                    stroke-width="1"></line>
                                                                <g id="SvgjsG9467" class="apexcharts-grid">
                                                                    <g id="SvgjsG9468"
                                                                        class="apexcharts-gridlines-horizontal"
                                                                        style="display: none;">
                                                                        <line id="SvgjsLine9471" x1="0"
                                                                            y1="0" x2="191"
                                                                            y2="0" stroke="#e0e0e0"
                                                                            stroke-dasharray="0"
                                                                            stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line id="SvgjsLine9472" x1="0"
                                                                            y1="35" x2="191"
                                                                            y2="35" stroke="#e0e0e0"
                                                                            stroke-dasharray="0"
                                                                            stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                    </g>
                                                                    <g id="SvgjsG9469"
                                                                        class="apexcharts-gridlines-vertical"
                                                                        style="display: none;"></g>
                                                                    <line id="SvgjsLine9474" x1="0"
                                                                        y1="35" x2="191"
                                                                        y2="35" stroke="transparent"
                                                                        stroke-dasharray="0" stroke-linecap="butt">
                                                                    </line>
                                                                    <line id="SvgjsLine9473" x1="0"
                                                                        y1="1" x2="0"
                                                                        y2="35" stroke="transparent"
                                                                        stroke-dasharray="0" stroke-linecap="butt">
                                                                    </line>
                                                                </g>
                                                                <g id="SvgjsG9470" class="apexcharts-grid-borders"
                                                                    style="display: none;"></g>
                                                                <g id="SvgjsG9457"
                                                                    class="apexcharts-area-series apexcharts-plot-series">
                                                                    <g id="SvgjsG9458" class="apexcharts-series"
                                                                        zIndex="0" seriesName="series1"
                                                                        data:longestSeries="true" rel="1"
                                                                        data:realIndex="0">
                                                                        <path id="SvgjsPath9465"
                                                                            d="M 0 35 L 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093C 191 15.590909090909093 191 15.590909090909093 191 35M 191 15.590909090909093z"
                                                                            fill="url(#SvgjsLinearGradient9461)"
                                                                            fill-opacity="1" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-area" index="0"
                                                                            clip-path="url(#gridRectMaskirjd9dcv)"
                                                                            pathTo="M 0 35 L 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093C 191 15.590909090909093 191 15.590909090909093 191 35M 191 15.590909090909093z"
                                                                            pathFrom="M -1 54.09090909090909 L -1 54.09090909090909 L 24.913043478260867 54.09090909090909 L 41.52173913043478 54.09090909090909 L 58.130434782608695 54.09090909090909 L 74.73913043478261 54.09090909090909 L 91.34782608695652 54.09090909090909 L 107.95652173913044 54.09090909090909 L 124.56521739130434 54.09090909090909 L 141.17391304347825 54.09090909090909 L 157.78260869565216 54.09090909090909 L 174.3913043478261 54.09090909090909 L 191 54.09090909090909">
                                                                        </path>
                                                                        <path id="SvgjsPath9466"
                                                                            d="M 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093"
                                                                            fill="none" fill-opacity="1"
                                                                            stroke="#008b75" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="2"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-area" index="0"
                                                                            clip-path="url(#gridRectMaskirjd9dcv)"
                                                                            pathTo="M 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093"
                                                                            pathFrom="M -1 54.09090909090909 L -1 54.09090909090909 L 24.913043478260867 54.09090909090909 L 41.52173913043478 54.09090909090909 L 58.130434782608695 54.09090909090909 L 74.73913043478261 54.09090909090909 L 91.34782608695652 54.09090909090909 L 107.95652173913044 54.09090909090909 L 124.56521739130434 54.09090909090909 L 141.17391304347825 54.09090909090909 L 157.78260869565216 54.09090909090909 L 174.3913043478261 54.09090909090909 L 191 54.09090909090909"
                                                                            fill-rule="evenodd"></path>
                                                                        <g id="SvgjsG9459"
                                                                            class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                            data:realIndex="0">
                                                                            <g class="apexcharts-series-markers">
                                                                                <circle id="SvgjsCircle9488" r="0"
                                                                                    cx="0" cy="0"
                                                                                    class="apexcharts-marker woeqdmds4 no-pointer-events"
                                                                                    stroke="#ffffff" fill="#008b75"
                                                                                    fill-opacity="1"
                                                                                    stroke-width="2"
                                                                                    stroke-opacity="0.9"
                                                                                    default-marker-size="0"></circle>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g id="SvgjsG9460" class="apexcharts-datalabels"
                                                                        data:realIndex="0"></g>
                                                                </g>
                                                                <line id="SvgjsLine9475" x1="0"
                                                                    y1="0" x2="191" y2="0"
                                                                    stroke="#b6b6b6" stroke-dasharray="0"
                                                                    stroke-width="1" stroke-linecap="butt"
                                                                    class="apexcharts-ycrosshairs"></line>
                                                                <line id="SvgjsLine9476" x1="0"
                                                                    y1="0" x2="191" y2="0"
                                                                    stroke-dasharray="0" stroke-width="0"
                                                                    stroke-linecap="butt"
                                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                                                <g id="SvgjsG9477" class="apexcharts-xaxis"
                                                                    transform="translate(0, 0)">
                                                                    <g id="SvgjsG9478"
                                                                        class="apexcharts-xaxis-texts-g"
                                                                        transform="translate(0, -4)"></g>
                                                                </g>
                                                                <g id="SvgjsG9485"
                                                                    class="apexcharts-yaxis-annotations"></g>
                                                                <g id="SvgjsG9486"
                                                                    class="apexcharts-xaxis-annotations"></g>
                                                                <g id="SvgjsG9487"
                                                                    class="apexcharts-point-annotations"></g>
                                                                <rect id="SvgjsRect9489" width="0"
                                                                    height="0" x="0" y="0" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0"
                                                                    fill="#fefefe" class="apexcharts-zoom-rect">
                                                                </rect>
                                                                <rect id="SvgjsRect9490" width="0"
                                                                    height="0" x="0" y="0" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0"
                                                                    fill="#fefefe"
                                                                    class="apexcharts-selection-rect"></rect>
                                                            </g>
                                                        </svg>
                                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                                            <div class="apexcharts-tooltip-title"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            </div>
                                                            <div class="apexcharts-tooltip-series-group"
                                                                style="order: 1;"><span
                                                                    class="apexcharts-tooltip-marker"
                                                                    style="background-color: rgb(0, 139, 117);"></span>
                                                                <div class="apexcharts-tooltip-text"
                                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                    <div class="apexcharts-tooltip-y-group"><span
                                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                                            class="apexcharts-tooltip-text-y-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                                            class="apexcharts-tooltip-text-goals-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-z-group"><span
                                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                                            class="apexcharts-tooltip-text-z-value"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                                            <div class="apexcharts-xaxistooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                            <div class="apexcharts-yaxistooltip-text"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-success" width="32" height="32"
                                                        fill="blue" style="width:10px">
                                                        <use
                                                            xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill">
                                                        </use>
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">India</h5>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <h5 class="mb-0 text-end">625</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-india" style="min-height: 95px;">
                                                    <div id="apexchartsqlnkf3ag"
                                                        class="apexcharts-canvas apexchartsqlnkf3ag apexcharts-theme-light"
                                                        style="width: 223px; height: 80px;"><svg id="SvgjsSvg9492"
                                                            width="223" height="80"
                                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns:svgjs="http://svgjs.dev"
                                                            class="apexcharts-svg apexcharts-zoomable"
                                                            xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                            style="background: transparent;">
                                                            <foreignObject x="0" y="0" width="223"
                                                                height="80">
                                                                <div class="apexcharts-legend"
                                                                    xmlns="http://www.w3.org/1999/xhtml"
                                                                    style="max-height: 40px;"></div>
                                                            </foreignObject>
                                                            <rect id="SvgjsRect9499" width="0" height="0"
                                                                x="0" y="0" rx="0" ry="0"
                                                                opacity="1" stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fefefe"></rect>
                                                            <g id="SvgjsG9531" class="apexcharts-yaxis"
                                                                rel="0" transform="translate(-8, 0)">
                                                                <g id="SvgjsG9532" class="apexcharts-yaxis-texts-g">
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG9494"
                                                                class="apexcharts-inner apexcharts-graphical"
                                                                transform="translate(22, 30)">
                                                                <defs id="SvgjsDefs9493">
                                                                    <clipPath id="gridRectMaskqlnkf3ag">
                                                                        <rect id="SvgjsRect9503" width="197"
                                                                            height="41" x="-3" y="-3"
                                                                            rx="0" ry="0"
                                                                            opacity="1" stroke-width="0"
                                                                            stroke="none" stroke-dasharray="0"
                                                                            fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <clipPath id="forecastMaskqlnkf3ag"></clipPath>
                                                                    <clipPath id="nonForecastMaskqlnkf3ag"></clipPath>
                                                                    <clipPath id="gridRectMarkerMaskqlnkf3ag">
                                                                        <rect id="SvgjsRect9504" width="195"
                                                                            height="39" x="-2" y="-2"
                                                                            rx="0" ry="0"
                                                                            opacity="1" stroke-width="0"
                                                                            stroke="none" stroke-dasharray="0"
                                                                            fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <linearGradient id="SvgjsLinearGradient9509"
                                                                        x1="0" y1="0"
                                                                        x2="0" y2="1">
                                                                        <stop id="SvgjsStop9510" stop-opacity="0.65"
                                                                            stop-color="rgba(255,196,52,0.65)"
                                                                            offset="0"></stop>
                                                                        <stop id="SvgjsStop9511" stop-opacity="0.5"
                                                                            stop-color="rgba(255,226,154,0.5)"
                                                                            offset="1"></stop>
                                                                        <stop id="SvgjsStop9512" stop-opacity="0.5"
                                                                            stop-color="rgba(255,226,154,0.5)"
                                                                            offset="1"></stop>
                                                                    </linearGradient>
                                                                </defs>
                                                                <line id="SvgjsLine9500" x1="0"
                                                                    y1="0" x2="0" y2="18"
                                                                    stroke="#b6b6b6" stroke-dasharray="3"
                                                                    stroke-linecap="butt"
                                                                    class="apexcharts-xcrosshairs" x="0" y="0"
                                                                    width="1" height="18" fill="#b1b9c4"
                                                                    filter="none" fill-opacity="0.9"
                                                                    stroke-width="1"></line>
                                                                <g id="SvgjsG9515" class="apexcharts-grid">
                                                                    <g id="SvgjsG9516"
                                                                        class="apexcharts-gridlines-horizontal"
                                                                        style="display: none;">
                                                                        <line id="SvgjsLine9519" x1="0"
                                                                            y1="0" x2="191"
                                                                            y2="0" stroke="#e0e0e0"
                                                                            stroke-dasharray="0"
                                                                            stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line id="SvgjsLine9520" x1="0"
                                                                            y1="35" x2="191"
                                                                            y2="35" stroke="#e0e0e0"
                                                                            stroke-dasharray="0"
                                                                            stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                    </g>
                                                                    <g id="SvgjsG9517"
                                                                        class="apexcharts-gridlines-vertical"
                                                                        style="display: none;"></g>
                                                                    <line id="SvgjsLine9522" x1="0"
                                                                        y1="35" x2="191"
                                                                        y2="35" stroke="transparent"
                                                                        stroke-dasharray="0" stroke-linecap="butt">
                                                                    </line>
                                                                    <line id="SvgjsLine9521" x1="0"
                                                                        y1="1" x2="0"
                                                                        y2="35" stroke="transparent"
                                                                        stroke-dasharray="0" stroke-linecap="butt">
                                                                    </line>
                                                                </g>
                                                                <g id="SvgjsG9518" class="apexcharts-grid-borders"
                                                                    style="display: none;"></g>
                                                                <g id="SvgjsG9505"
                                                                    class="apexcharts-area-series apexcharts-plot-series">
                                                                    <g id="SvgjsG9506" class="apexcharts-series"
                                                                        zIndex="0" seriesName="series1"
                                                                        data:longestSeries="true" rel="1"
                                                                        data:realIndex="0">
                                                                        <path id="SvgjsPath9513"
                                                                            d="M 0 35 L 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093C 191 15.590909090909093 191 15.590909090909093 191 35M 191 15.590909090909093z"
                                                                            fill="url(#SvgjsLinearGradient9509)"
                                                                            fill-opacity="1" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-area" index="0"
                                                                            clip-path="url(#gridRectMaskqlnkf3ag)"
                                                                            pathTo="M 0 35 L 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093C 191 15.590909090909093 191 15.590909090909093 191 35M 191 15.590909090909093z"
                                                                            pathFrom="M -1 54.09090909090909 L -1 54.09090909090909 L 24.913043478260867 54.09090909090909 L 41.52173913043478 54.09090909090909 L 58.130434782608695 54.09090909090909 L 74.73913043478261 54.09090909090909 L 91.34782608695652 54.09090909090909 L 107.95652173913044 54.09090909090909 L 124.56521739130434 54.09090909090909 L 141.17391304347825 54.09090909090909 L 157.78260869565216 54.09090909090909 L 174.3913043478261 54.09090909090909 L 191 54.09090909090909">
                                                                        </path>
                                                                        <path id="SvgjsPath9514"
                                                                            d="M 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093"
                                                                            fill="none" fill-opacity="1"
                                                                            stroke="#ffc434" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="2"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-area" index="0"
                                                                            clip-path="url(#gridRectMaskqlnkf3ag)"
                                                                            pathTo="M 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093"
                                                                            pathFrom="M -1 54.09090909090909 L -1 54.09090909090909 L 24.913043478260867 54.09090909090909 L 41.52173913043478 54.09090909090909 L 58.130434782608695 54.09090909090909 L 74.73913043478261 54.09090909090909 L 91.34782608695652 54.09090909090909 L 107.95652173913044 54.09090909090909 L 124.56521739130434 54.09090909090909 L 141.17391304347825 54.09090909090909 L 157.78260869565216 54.09090909090909 L 174.3913043478261 54.09090909090909 L 191 54.09090909090909"
                                                                            fill-rule="evenodd"></path>
                                                                        <g id="SvgjsG9507"
                                                                            class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                            data:realIndex="0">
                                                                            <g class="apexcharts-series-markers">
                                                                                <circle id="SvgjsCircle9536" r="0"
                                                                                    cx="0" cy="0"
                                                                                    class="apexcharts-marker wiu2lnnzo no-pointer-events"
                                                                                    stroke="#ffffff" fill="#ffc434"
                                                                                    fill-opacity="1"
                                                                                    stroke-width="2"
                                                                                    stroke-opacity="0.9"
                                                                                    default-marker-size="0"></circle>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g id="SvgjsG9508" class="apexcharts-datalabels"
                                                                        data:realIndex="0"></g>
                                                                </g>
                                                                <line id="SvgjsLine9523" x1="0"
                                                                    y1="0" x2="191" y2="0"
                                                                    stroke="#b6b6b6" stroke-dasharray="0"
                                                                    stroke-width="1" stroke-linecap="butt"
                                                                    class="apexcharts-ycrosshairs"></line>
                                                                <line id="SvgjsLine9524" x1="0"
                                                                    y1="0" x2="191" y2="0"
                                                                    stroke-dasharray="0" stroke-width="0"
                                                                    stroke-linecap="butt"
                                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                                                <g id="SvgjsG9525" class="apexcharts-xaxis"
                                                                    transform="translate(0, 0)">
                                                                    <g id="SvgjsG9526"
                                                                        class="apexcharts-xaxis-texts-g"
                                                                        transform="translate(0, -4)"></g>
                                                                </g>
                                                                <g id="SvgjsG9533"
                                                                    class="apexcharts-yaxis-annotations"></g>
                                                                <g id="SvgjsG9534"
                                                                    class="apexcharts-xaxis-annotations"></g>
                                                                <g id="SvgjsG9535"
                                                                    class="apexcharts-point-annotations"></g>
                                                                <rect id="SvgjsRect9537" width="0"
                                                                    height="0" x="0" y="0" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0"
                                                                    fill="#fefefe" class="apexcharts-zoom-rect">
                                                                </rect>
                                                                <rect id="SvgjsRect9538" width="0"
                                                                    height="0" x="0" y="0" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0"
                                                                    fill="#fefefe"
                                                                    class="apexcharts-selection-rect"></rect>
                                                            </g>
                                                        </svg>
                                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                                            <div class="apexcharts-tooltip-title"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            </div>
                                                            <div class="apexcharts-tooltip-series-group"
                                                                style="order: 1;"><span
                                                                    class="apexcharts-tooltip-marker"
                                                                    style="background-color: rgb(255, 196, 52);"></span>
                                                                <div class="apexcharts-tooltip-text"
                                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                    <div class="apexcharts-tooltip-y-group"><span
                                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                                            class="apexcharts-tooltip-text-y-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                                            class="apexcharts-tooltip-text-goals-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-z-group"><span
                                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                                            class="apexcharts-tooltip-text-z-value"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                                            <div class="apexcharts-xaxistooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                            <div class="apexcharts-yaxistooltip-text"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-danger" width="32" height="32"
                                                        fill="blue" style="width:10px">
                                                        <use
                                                            xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill">
                                                        </use>
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">Indonesia</h5>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <h5 class="mb-0 text-end">1025</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-indonesia" style="min-height: 95px;">
                                                    <div id="apexcharts9iphk2bd"
                                                        class="apexcharts-canvas apexcharts9iphk2bd apexcharts-theme-light"
                                                        style="width: 223px; height: 80px;"><svg id="SvgjsSvg9396"
                                                            width="223" height="80"
                                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns:svgjs="http://svgjs.dev"
                                                            class="apexcharts-svg apexcharts-zoomable"
                                                            xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                            style="background: transparent;">
                                                            <foreignObject x="0" y="0" width="223"
                                                                height="80">
                                                                <div class="apexcharts-legend"
                                                                    xmlns="http://www.w3.org/1999/xhtml"
                                                                    style="max-height: 40px;"></div>
                                                            </foreignObject>
                                                            <rect id="SvgjsRect9403" width="0" height="0"
                                                                x="0" y="0" rx="0" ry="0"
                                                                opacity="1" stroke-width="0" stroke="none"
                                                                stroke-dasharray="0" fill="#fefefe"></rect>
                                                            <g id="SvgjsG9435" class="apexcharts-yaxis"
                                                                rel="0" transform="translate(-8, 0)">
                                                                <g id="SvgjsG9436" class="apexcharts-yaxis-texts-g">
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG9398"
                                                                class="apexcharts-inner apexcharts-graphical"
                                                                transform="translate(22, 30)">
                                                                <defs id="SvgjsDefs9397">
                                                                    <clipPath id="gridRectMask9iphk2bd">
                                                                        <rect id="SvgjsRect9407" width="197"
                                                                            height="41" x="-3" y="-3"
                                                                            rx="0" ry="0"
                                                                            opacity="1" stroke-width="0"
                                                                            stroke="none" stroke-dasharray="0"
                                                                            fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <clipPath id="forecastMask9iphk2bd"></clipPath>
                                                                    <clipPath id="nonForecastMask9iphk2bd"></clipPath>
                                                                    <clipPath id="gridRectMarkerMask9iphk2bd">
                                                                        <rect id="SvgjsRect9408" width="195"
                                                                            height="39" x="-2" y="-2"
                                                                            rx="0" ry="0"
                                                                            opacity="1" stroke-width="0"
                                                                            stroke="none" stroke-dasharray="0"
                                                                            fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <linearGradient id="SvgjsLinearGradient9413"
                                                                        x1="0" y1="0"
                                                                        x2="0" y2="1">
                                                                        <stop id="SvgjsStop9414" stop-opacity="0.65"
                                                                            stop-color="rgba(220,53,69,0.65)"
                                                                            offset="0"></stop>
                                                                        <stop id="SvgjsStop9415" stop-opacity="0.5"
                                                                            stop-color="rgba(238,154,162,0.5)"
                                                                            offset="1"></stop>
                                                                        <stop id="SvgjsStop9416" stop-opacity="0.5"
                                                                            stop-color="rgba(238,154,162,0.5)"
                                                                            offset="1"></stop>
                                                                    </linearGradient>
                                                                </defs>
                                                                <line id="SvgjsLine9404" x1="0"
                                                                    y1="0" x2="0" y2="18"
                                                                    stroke="#b6b6b6" stroke-dasharray="3"
                                                                    stroke-linecap="butt"
                                                                    class="apexcharts-xcrosshairs" x="0" y="0"
                                                                    width="1" height="18" fill="#b1b9c4"
                                                                    filter="none" fill-opacity="0.9"
                                                                    stroke-width="1"></line>
                                                                <g id="SvgjsG9419" class="apexcharts-grid">
                                                                    <g id="SvgjsG9420"
                                                                        class="apexcharts-gridlines-horizontal"
                                                                        style="display: none;">
                                                                        <line id="SvgjsLine9423" x1="0"
                                                                            y1="0" x2="191"
                                                                            y2="0" stroke="#e0e0e0"
                                                                            stroke-dasharray="0"
                                                                            stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line id="SvgjsLine9424" x1="0"
                                                                            y1="35" x2="191"
                                                                            y2="35" stroke="#e0e0e0"
                                                                            stroke-dasharray="0"
                                                                            stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                    </g>
                                                                    <g id="SvgjsG9421"
                                                                        class="apexcharts-gridlines-vertical"
                                                                        style="display: none;"></g>
                                                                    <line id="SvgjsLine9426" x1="0"
                                                                        y1="35" x2="191"
                                                                        y2="35" stroke="transparent"
                                                                        stroke-dasharray="0" stroke-linecap="butt">
                                                                    </line>
                                                                    <line id="SvgjsLine9425" x1="0"
                                                                        y1="1" x2="0"
                                                                        y2="35" stroke="transparent"
                                                                        stroke-dasharray="0" stroke-linecap="butt">
                                                                    </line>
                                                                </g>
                                                                <g id="SvgjsG9422" class="apexcharts-grid-borders"
                                                                    style="display: none;"></g>
                                                                <g id="SvgjsG9409"
                                                                    class="apexcharts-area-series apexcharts-plot-series">
                                                                    <g id="SvgjsG9410" class="apexcharts-series"
                                                                        zIndex="0" seriesName="series1"
                                                                        data:longestSeries="true" rel="1"
                                                                        data:realIndex="0">
                                                                        <path id="SvgjsPath9417"
                                                                            d="M 0 35 L 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093C 191 15.590909090909093 191 15.590909090909093 191 35M 191 15.590909090909093z"
                                                                            fill="url(#SvgjsLinearGradient9413)"
                                                                            fill-opacity="1" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-area" index="0"
                                                                            clip-path="url(#gridRectMask9iphk2bd)"
                                                                            pathTo="M 0 35 L 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093C 191 15.590909090909093 191 15.590909090909093 191 35M 191 15.590909090909093z"
                                                                            pathFrom="M -1 54.09090909090909 L -1 54.09090909090909 L 24.913043478260867 54.09090909090909 L 41.52173913043478 54.09090909090909 L 58.130434782608695 54.09090909090909 L 74.73913043478261 54.09090909090909 L 91.34782608695652 54.09090909090909 L 107.95652173913044 54.09090909090909 L 124.56521739130434 54.09090909090909 L 141.17391304347825 54.09090909090909 L 157.78260869565216 54.09090909090909 L 174.3913043478261 54.09090909090909 L 191 54.09090909090909">
                                                                        </path>
                                                                        <path id="SvgjsPath9418"
                                                                            d="M 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093"
                                                                            fill="none" fill-opacity="1"
                                                                            stroke="#dc3545" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="2"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-area" index="0"
                                                                            clip-path="url(#gridRectMask9iphk2bd)"
                                                                            pathTo="M 0 34.36363636363637C 8.719565217391303 34.36363636363637 16.193478260869565 3.18181818181818 24.913043478260867 3.18181818181818C 30.726086956521737 3.18181818181818 35.708695652173915 15.909090909090907 41.52173913043478 15.909090909090907C 47.33478260869565 15.909090909090907 52.31739130434782 26.72727272727273 58.130434782608695 26.72727272727273C 63.94347826086957 26.72727272727273 68.92608695652174 19.727272727272727 74.73913043478261 19.727272727272727C 80.55217391304348 19.727272727272727 85.53478260869565 32.45454545454545 91.34782608695652 32.45454545454545C 97.16086956521738 32.45454545454545 102.14347826086957 15.590909090909093 107.95652173913044 15.590909090909093C 113.7695652173913 15.590909090909093 118.75217391304348 2.863636363636367 124.56521739130434 2.863636363636367C 130.37826086956522 2.863636363636367 135.36086956521737 26.72727272727273 141.17391304347825 26.72727272727273C 146.98695652173913 26.72727272727273 151.96956521739128 19.727272727272727 157.78260869565216 19.727272727272727C 163.59565217391304 19.727272727272727 168.5782608695652 32.45454545454545 174.3913043478261 32.45454545454545C 180.20434782608697 32.45454545454545 185.18695652173912 15.590909090909093 191 15.590909090909093"
                                                                            pathFrom="M -1 54.09090909090909 L -1 54.09090909090909 L 24.913043478260867 54.09090909090909 L 41.52173913043478 54.09090909090909 L 58.130434782608695 54.09090909090909 L 74.73913043478261 54.09090909090909 L 91.34782608695652 54.09090909090909 L 107.95652173913044 54.09090909090909 L 124.56521739130434 54.09090909090909 L 141.17391304347825 54.09090909090909 L 157.78260869565216 54.09090909090909 L 174.3913043478261 54.09090909090909 L 191 54.09090909090909"
                                                                            fill-rule="evenodd"></path>
                                                                        <g id="SvgjsG9411"
                                                                            class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                            data:realIndex="0">
                                                                            <g class="apexcharts-series-markers">
                                                                                <circle id="SvgjsCircle9440" r="0"
                                                                                    cx="0" cy="0"
                                                                                    class="apexcharts-marker wkxbcs3cb no-pointer-events"
                                                                                    stroke="#ffffff" fill="#dc3545"
                                                                                    fill-opacity="1"
                                                                                    stroke-width="2"
                                                                                    stroke-opacity="0.9"
                                                                                    default-marker-size="0"></circle>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g id="SvgjsG9412" class="apexcharts-datalabels"
                                                                        data:realIndex="0"></g>
                                                                </g>
                                                                <line id="SvgjsLine9427" x1="0"
                                                                    y1="0" x2="191" y2="0"
                                                                    stroke="#b6b6b6" stroke-dasharray="0"
                                                                    stroke-width="1" stroke-linecap="butt"
                                                                    class="apexcharts-ycrosshairs"></line>
                                                                <line id="SvgjsLine9428" x1="0"
                                                                    y1="0" x2="191" y2="0"
                                                                    stroke-dasharray="0" stroke-width="0"
                                                                    stroke-linecap="butt"
                                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                                                <g id="SvgjsG9429" class="apexcharts-xaxis"
                                                                    transform="translate(0, 0)">
                                                                    <g id="SvgjsG9430"
                                                                        class="apexcharts-xaxis-texts-g"
                                                                        transform="translate(0, -4)"></g>
                                                                </g>
                                                                <g id="SvgjsG9437"
                                                                    class="apexcharts-yaxis-annotations"></g>
                                                                <g id="SvgjsG9438"
                                                                    class="apexcharts-xaxis-annotations"></g>
                                                                <g id="SvgjsG9439"
                                                                    class="apexcharts-point-annotations"></g>
                                                                <rect id="SvgjsRect9441" width="0"
                                                                    height="0" x="0" y="0" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0"
                                                                    fill="#fefefe" class="apexcharts-zoom-rect">
                                                                </rect>
                                                                <rect id="SvgjsRect9442" width="0"
                                                                    height="0" x="0" y="0" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0"
                                                                    fill="#fefefe"
                                                                    class="apexcharts-selection-rect"></rect>
                                                            </g>
                                                        </svg>
                                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                                            <div class="apexcharts-tooltip-title"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            </div>
                                                            <div class="apexcharts-tooltip-series-group"
                                                                style="order: 1;"><span
                                                                    class="apexcharts-tooltip-marker"
                                                                    style="background-color: rgb(220, 53, 69);"></span>
                                                                <div class="apexcharts-tooltip-text"
                                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                    <div class="apexcharts-tooltip-y-group"><span
                                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                                            class="apexcharts-tooltip-text-y-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                                            class="apexcharts-tooltip-text-goals-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-z-group"><span
                                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                                            class="apexcharts-tooltip-text-z-value"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                                            <div class="apexcharts-xaxistooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                            <div class="apexcharts-yaxistooltip-text"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Latest Comments</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Comment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="./assets/compiled/jpg/5.jpg">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">Congratulations on your graduation!</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="./assets/compiled/jpg/2.jpg">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">Wow amazing design! Can you make another
                                                                tutorial for
                                                                this design?</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="./assets/compiled/jpg/8.jpg">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">Singh Eknoor</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">What a stunning design! You are so
                                                                talented and creative!</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="./assets/compiled/jpg/3.jpg">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">Rani Jhadav</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">I love your design! It’s so beautiful
                                                                and unique! How did you learn to do this?</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="./assets/compiled/jpg/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">John Duck</h5>
                                        <h6 class="text-muted mb-0">@johnducky</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Recent Messages</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="./assets/compiled/jpg/4.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Hank Schrader</h5>
                                        <h6 class="text-muted mb-0">@johnducky</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="./assets/compiled/jpg/5.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Dean Winchester</h5>
                                        <h6 class="text-muted mb-0">@imdean</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="./assets/compiled/jpg/1.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">John Dodol</h5>
                                        <h6 class="text-muted mb-0">@dodoljohn</h6>
                                    </div>
                                </div>
                                <div class="px-4">
                                    <button class="btn btn-block btn-xl btn-outline-primary font-bold mt-3">Start
                                        Conversation</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Visitors Profile</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile" style="min-height: 231.3px;">
                                    <div id="apexchartsu8eyit0o"
                                        class="apexcharts-canvas apexchartsu8eyit0o apexcharts-theme-light"
                                        style="width: 223px; height: 231.3px;"><svg id="SvgjsSvg9721"
                                            width="223" height="231.30000038146974"
                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                            xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                            style="background: transparent;">
                                            <foreignObject x="0" y="0" width="223" height="231.30000038146974">
                                                <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                                    xmlns="http://www.w3.org/1999/xhtml"
                                                    style="inset: auto 0px 1px; position: absolute; max-height: 175px;">
                                                    <div class="apexcharts-legend-series" rel="1"
                                                        seriesname="Male" data:collapsed="false"
                                                        style="margin: 2px 5px;"><span
                                                            class="apexcharts-legend-marker" rel="1"
                                                            data:collapsed="false"
                                                            style="background: rgb(67, 94, 190) !important; color: rgb(67, 94, 190); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                            class="apexcharts-legend-text" rel="1" i="0"
                                                            data:default-text="Male" data:collapsed="false"
                                                            style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Male</span>
                                                    </div>
                                                    <div class="apexcharts-legend-series" rel="2"
                                                        seriesname="Female" data:collapsed="false"
                                                        style="margin: 2px 5px;"><span
                                                            class="apexcharts-legend-marker" rel="2"
                                                            data:collapsed="false"
                                                            style="background: rgb(85, 198, 232) !important; color: rgb(85, 198, 232); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                            class="apexcharts-legend-text" rel="2" i="1"
                                                            data:default-text="Female" data:collapsed="false"
                                                            style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Female</span>
                                                    </div>
                                                </div>
                                                <style type="text/css">
                                                    .apexcharts-legend {
                                                        display: flex;
                                                        overflow: auto;
                                                        padding: 0 10px;
                                                    }

                                                    .apexcharts-legend.apx-legend-position-bottom,
                                                    .apexcharts-legend.apx-legend-position-top {
                                                        flex-wrap: wrap
                                                    }

                                                    .apexcharts-legend.apx-legend-position-right,
                                                    .apexcharts-legend.apx-legend-position-left {
                                                        flex-direction: column;
                                                        bottom: 0;
                                                    }

                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                    .apexcharts-legend.apx-legend-position-right,
                                                    .apexcharts-legend.apx-legend-position-left {
                                                        justify-content: flex-start;
                                                    }

                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                        justify-content: center;
                                                    }

                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                        justify-content: flex-end;
                                                    }

                                                    .apexcharts-legend-series {
                                                        cursor: pointer;
                                                        line-height: normal;
                                                    }

                                                    .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                                                    .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                                        display: flex;
                                                        align-items: center;
                                                    }

                                                    .apexcharts-legend-text {
                                                        position: relative;
                                                        font-size: 14px;
                                                    }

                                                    .apexcharts-legend-text *,
                                                    .apexcharts-legend-marker * {
                                                        pointer-events: none;
                                                    }

                                                    .apexcharts-legend-marker {
                                                        position: relative;
                                                        display: inline-block;
                                                        cursor: pointer;
                                                        margin-right: 3px;
                                                        border-style: solid;
                                                    }

                                                    .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                                    .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                                        display: inline-block;
                                                    }

                                                    .apexcharts-legend-series.apexcharts-no-click {
                                                        cursor: auto;
                                                    }

                                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                                        display: none !important;
                                                    }

                                                    .apexcharts-inactive-legend {
                                                        opacity: 0.45;
                                                    }
                                                </style>
                                            </foreignObject>
                                            <g id="SvgjsG9723" class="apexcharts-inner apexcharts-graphical"
                                                transform="translate(12, 0)">
                                                <defs id="SvgjsDefs9722">
                                                    <clipPath id="gridRectMasku8eyit0o">
                                                        <rect id="SvgjsRect9724" width="207" height="293"
                                                            x="-3" y="-3" rx="0" ry="0"
                                                            opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMasku8eyit0o"></clipPath>
                                                    <clipPath id="nonForecastMasku8eyit0o"></clipPath>
                                                    <clipPath id="gridRectMarkerMasku8eyit0o">
                                                        <rect id="SvgjsRect9725" width="205" height="291"
                                                            x="-2" y="-2" rx="0" ry="0"
                                                            opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <filter id="SvgjsFilter9734" filterUnits="userSpaceOnUse"
                                                        width="200%" height="200%" x="-50%" y="-50%">
                                                        <feFlood id="SvgjsFeFlood9735" flood-color="#000000"
                                                            flood-opacity="0.45" result="SvgjsFeFlood9735Out"
                                                            in="SourceGraphic"></feFlood>
                                                        <feComposite id="SvgjsFeComposite9736"
                                                            in="SvgjsFeFlood9735Out" in2="SourceAlpha"
                                                            operator="in" result="SvgjsFeComposite9736Out">
                                                        </feComposite>
                                                        <feOffset id="SvgjsFeOffset9737" dx="1"
                                                            dy="1" result="SvgjsFeOffset9737Out"
                                                            in="SvgjsFeComposite9736Out"></feOffset>
                                                        <feGaussianBlur id="SvgjsFeGaussianBlur9738"
                                                            stdDeviation="1 " result="SvgjsFeGaussianBlur9738Out"
                                                            in="SvgjsFeOffset9737Out"></feGaussianBlur>
                                                        <feMerge id="SvgjsFeMerge9739" result="SvgjsFeMerge9739Out"
                                                            in="SourceGraphic">
                                                            <feMergeNode id="SvgjsFeMergeNode9740"
                                                                in="SvgjsFeGaussianBlur9738Out"></feMergeNode>
                                                            <feMergeNode id="SvgjsFeMergeNode9741"
                                                                in="[object Arguments]"></feMergeNode>
                                                        </feMerge>
                                                        <feBlend id="SvgjsFeBlend9742" in="SourceGraphic"
                                                            in2="SvgjsFeMerge9739Out" mode="normal"
                                                            result="SvgjsFeBlend9742Out"></feBlend>
                                                    </filter>
                                                    <filter id="SvgjsFilter9747" filterUnits="userSpaceOnUse"
                                                        width="200%" height="200%" x="-50%" y="-50%">
                                                        <feFlood id="SvgjsFeFlood9748" flood-color="#000000"
                                                            flood-opacity="0.45" result="SvgjsFeFlood9748Out"
                                                            in="SourceGraphic"></feFlood>
                                                        <feComposite id="SvgjsFeComposite9749"
                                                            in="SvgjsFeFlood9748Out" in2="SourceAlpha"
                                                            operator="in" result="SvgjsFeComposite9749Out">
                                                        </feComposite>
                                                        <feOffset id="SvgjsFeOffset9750" dx="1"
                                                            dy="1" result="SvgjsFeOffset9750Out"
                                                            in="SvgjsFeComposite9749Out"></feOffset>
                                                        <feGaussianBlur id="SvgjsFeGaussianBlur9751"
                                                            stdDeviation="1 " result="SvgjsFeGaussianBlur9751Out"
                                                            in="SvgjsFeOffset9750Out"></feGaussianBlur>
                                                        <feMerge id="SvgjsFeMerge9752" result="SvgjsFeMerge9752Out"
                                                            in="SourceGraphic">
                                                            <feMergeNode id="SvgjsFeMergeNode9753"
                                                                in="SvgjsFeGaussianBlur9751Out"></feMergeNode>
                                                            <feMergeNode id="SvgjsFeMergeNode9754"
                                                                in="[object Arguments]"></feMergeNode>
                                                        </feMerge>
                                                        <feBlend id="SvgjsFeBlend9755" in="SourceGraphic"
                                                            in2="SvgjsFeMerge9752Out" mode="normal"
                                                            result="SvgjsFeBlend9755Out"></feBlend>
                                                    </filter>
                                                </defs>
                                                <g id="SvgjsG9726" class="apexcharts-pie">
                                                    <g id="SvgjsG9727" transform="translate(0, 0) scale(1)">
                                                        <circle id="SvgjsCircle9728" r="27.61463414634147"
                                                            cx="100.5" cy="100.5" fill="transparent">
                                                        </circle>
                                                        <g id="SvgjsG9729" class="apexcharts-slices">
                                                            <g id="SvgjsG9730"
                                                                class="apexcharts-series apexcharts-pie-series"
                                                                seriesName="Male" rel="1"
                                                                data:realIndex="0">
                                                                <path id="SvgjsPath9731"
                                                                    d="M 100.5 8.45121951219511 A 92.04878048780489 92.04878048780489 0 1 1 12.956407500050972 128.94463748222077 L 74.23692225001528 109.03339124466623 A 27.61463414634147 27.61463414634147 0 1 0 100.5 72.88536585365853 L 100.5 8.45121951219511 z "
                                                                    fill="rgba(67,94,190,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="butt"
                                                                    stroke-width="2" stroke-dasharray="0"
                                                                    class="apexcharts-pie-area apexcharts-donut-slice-0"
                                                                    index="0" j="0" data:angle="252"
                                                                    data:startAngle="0" data:strokeWidth="2"
                                                                    data:value="70"
                                                                    data:pathOrig="M 100.5 8.45121951219511 A 92.04878048780489 92.04878048780489 0 1 1 12.956407500050972 128.94463748222077 L 74.23692225001528 109.03339124466623 A 27.61463414634147 27.61463414634147 0 1 0 100.5 72.88536585365853 L 100.5 8.45121951219511 z "
                                                                    stroke="#ffffff"></path>
                                                            </g>
                                                            <g id="SvgjsG9743"
                                                                class="apexcharts-series apexcharts-pie-series"
                                                                seriesName="Female" rel="2"
                                                                data:realIndex="1">
                                                                <path id="SvgjsPath9744"
                                                                    d="M 12.956407500050972 128.94463748222077 A 92.04878048780489 92.04878048780489 0 0 1 100.48393445716196 8.451220914178208 L 100.4951803371486 72.88536627425346 A 27.61463414634147 27.61463414634147 0 0 0 74.23692225001528 109.03339124466623 L 12.956407500050972 128.94463748222077 z "
                                                                    fill="rgba(85,198,232,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="butt"
                                                                    stroke-width="2" stroke-dasharray="0"
                                                                    class="apexcharts-pie-area apexcharts-donut-slice-1"
                                                                    index="0" j="1" data:angle="108"
                                                                    data:startAngle="252" data:strokeWidth="2"
                                                                    data:value="30"
                                                                    data:pathOrig="M 12.956407500050972 128.94463748222077 A 92.04878048780489 92.04878048780489 0 0 1 100.48393445716196 8.451220914178208 L 100.4951803371486 72.88536627425346 A 27.61463414634147 27.61463414634147 0 0 0 74.23692225001528 109.03339124466623 L 12.956407500050972 128.94463748222077 z "
                                                                    stroke="#ffffff"></path>
                                                            </g>
                                                            <g id="SvgjsG9732" class="apexcharts-datalabels"><text
                                                                    id="SvgjsText9733"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="148.9048680219801" y="135.66819518045526"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="600"
                                                                    fill="#ffffff"
                                                                    class="apexcharts-text apexcharts-pie-label"
                                                                    filter="url(#SvgjsFilter9734)"
                                                                    style="font-family: Helvetica, Arial, sans-serif;">70.0%</text>
                                                            </g>
                                                            <g id="SvgjsG9745" class="apexcharts-datalabels"><text
                                                                    id="SvgjsText9746"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="52.0951319780199" y="65.33180481954474"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="600"
                                                                    fill="#ffffff"
                                                                    class="apexcharts-text apexcharts-pie-label"
                                                                    filter="url(#SvgjsFilter9747)"
                                                                    style="font-family: Helvetica, Arial, sans-serif;">30.0%</text>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                                <line id="SvgjsLine9756" x1="0" y1="0"
                                                    x2="201" y2="0" stroke="#b6b6b6"
                                                    stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine9757" x1="0" y1="0"
                                                    x2="201" y2="0" stroke-dasharray="0"
                                                    stroke-width="0" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                            </g>
                                        </svg>
                                        <div class="apexcharts-tooltip apexcharts-theme-dark">
                                            <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(67, 94, 190);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                            class="apexcharts-tooltip-text-y-value"></span></div>
                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                                </div>
                                            </div>
                                            <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(85, 198, 232);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                            class="apexcharts-tooltip-text-y-value"></span></div>
                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 © Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('_customer/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('_customer/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('_customer/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('_customer/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('_customer/js/main.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggle = document.getElementById("toggle-dark");
            const body = document.body;

            // Load tema sebelumnya dari localStorage
            if (localStorage.getItem("theme") === "dark") {
                body.classList.add("dark-mode");
                toggle.checked = true;
            }

            // Event toggle
            toggle.addEventListener("change", () => {
                body.classList.toggle("dark-mode");

                // Simpan status di localStorage
                if (body.classList.contains("dark-mode")) {
                    localStorage.setItem("theme", "dark");
                } else {
                    localStorage.setItem("theme", "light");
                }
            });
        });
    </script>

</body>

</html>
