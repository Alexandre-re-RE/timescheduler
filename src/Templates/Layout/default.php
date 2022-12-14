<?php
require_once('./bootstrap.php');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'App' ?> - Timescheluder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <style>
        body {
            font-size: .875rem;
        }

        .feather {
            width: 16px;
            height: 16px;
            vertical-align: text-bottom;
        }

        /*
         * Sidebar
         */

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100; /* Behind the navbar */
            padding: 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 48px; /* Height of navbar */
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link .feather {
            margin-right: 4px;
            color: #999;
        }

        .sidebar .nav-link.active {
            color: #007bff;
        }

        .sidebar .nav-link:hover .feather,
        .sidebar .nav-link.active .feather {
            color: inherit;
        }

        .sidebar-heading {
            font-size: .75rem;
            text-transform: uppercase;
        }

        /*
         * Navbar
         */

        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: 1rem;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .form-control {
            padding: .75rem 1rem;
            border-width: 0;
            border-radius: 0;
        }

        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
            border-color: transparent;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }

        /*
         * Utilities
         */

        .border-top { border-top: 1px solid #e5e5e5; }
        .border-bottom { border-bottom: 1px solid #e5e5e5; }
    </style>
</head>

<body>

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Time Scheduler</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Logout</a>
        </li>
    </ul>
</nav>

<div class="container">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column mb-2">
                    <li class="nav-item mt-5">
                        <a class="nav-link" href="<?= APP_DIR . 'clients' ?>">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 20H4C2.93052 20.032 2.03642 19.1933 2 18.124V5.875C2.03641 4.80581 2.93068 3.96743 4 4H20C21.0693 3.96743 21.9636 4.80581 22 5.875V18.125C21.963 19.1939 21.0691 20.032 20 20ZM4 6V17.989L20 18V6.011L4 6ZM13.43 16H6C6.07353 15.1721 6.46534 14.4049 7.093 13.86C7.79183 13.1667 8.73081 12.7692 9.715 12.75C10.6992 12.7692 11.6382 13.1667 12.337 13.86C12.9645 14.4051 13.3563 15.1721 13.43 16ZM18 15H15V13H18V15ZM9.715 12C9.17907 12.0186 8.65947 11.8139 8.28029 11.4347C7.9011 11.0555 7.69638 10.5359 7.715 10C7.69668 9.46416 7.9015 8.94474 8.28062 8.56562C8.65974 8.1865 9.17916 7.98168 9.715 8C10.2508 7.98168 10.7703 8.1865 11.1494 8.56562C11.5285 8.94474 11.7333 9.46416 11.715 10C11.7336 10.5359 11.5289 11.0555 11.1497 11.4347C10.7705 11.8139 10.2509 12.0186 9.715 12ZM18 11H14V9H18V11Z" fill="#2E3A59"></path>
                            </svg>

                            Clients
                        </a>

                        <a class="nav-link" href="<?= APP_DIR . 'roles' ?>">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 17H13V15H22V17ZM11 17H2V15H11V17ZM15 13H2V11H15V13ZM15 9H2V7H15V9Z" fill="#2E3A59"></path>
                            </svg>

                            Roles
                        </a>

                        <a class="nav-link" href="<?= APP_DIR . 'projects' ?>">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 22H6L12 16L18 22ZM7 19H3C1.89543 19 1 18.1046 1 17V5C1 3.89543 1.89543 3 3 3H21C22.1046 3 23 3.89543 23 5V17C23 18.1046 22.1046 19 21 19H17V17H21V5H3V17H7V19Z" fill="#2E3A59"></path>
                            </svg>

                            Projects
                        </a>

                        <a class="nav-link" href="<?= APP_DIR . 'status' ?>">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.5 21.5C5.95411 21.4935 4.59326 20.4795 4.145 19H2V17H4.145C4.6599 15.273 6.40204 14.2192 8.1707 14.565C9.93936 14.9108 11.1563 16.5431 10.9828 18.3369C10.8094 20.1307 9.30215 21.4995 7.5 21.5ZM7.5 16.5C6.67157 16.5 6 17.1716 6 18C6 18.8284 6.67157 19.5 7.5 19.5C8.32843 19.5 9 18.8284 9 18C9 17.1716 8.32843 16.5 7.5 16.5ZM22 19H12V17H22V19ZM16.5 15.5C14.6979 15.4995 13.1906 14.1307 13.0172 12.3369C12.8437 10.5431 14.0606 8.91084 15.8293 8.56503C17.598 8.21923 19.3401 9.27297 19.855 11H22V13H19.855C19.4067 14.4795 18.0459 15.4935 16.5 15.5ZM16.5 10.5C15.6716 10.5 15 11.1716 15 12C15 12.8284 15.6716 13.5 16.5 13.5C17.3284 13.5 18 12.8284 18 12C18 11.1716 17.3284 10.5 16.5 10.5ZM12 13H2V11H12V13ZM9.5 9.49999C7.69785 9.49953 6.19063 8.1307 6.01715 6.33692C5.84367 4.54314 7.06064 2.91084 8.8293 2.56503C10.598 2.21923 12.3401 3.27297 12.855 4.99999H22V6.99999H12.855C12.4065 8.47928 11.0458 9.4932 9.5 9.49999ZM9.5 4.49999C8.68198 4.5011 8.01568 5.15742 8.00223 5.97534C7.98878 6.79325 8.63315 7.47112 9.45069 7.49911C10.2682 7.52711 10.9575 6.89491 11 6.07799V6.36799V5.99999C11 5.17157 10.3284 4.49999 9.5 4.49999ZM5 6.99999H2V4.99999H5V6.99999Z" fill="#2E3A59"></path>
                            </svg>
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            Status
                        </a>

                        <a class="nav-link" href="<?= APP_DIR . 'tasks' ?>">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 21H4C2.89543 21 2 20.1046 2 19V5C2 3.89543 2.89543 3 4 3H20C21.1046 3 22 3.89543 22 5V19C22 20.1046 21.1046 21 20 21ZM4 7V19H20V7H4ZM14.707 16.707L13.294 15.294L15.586 13L13.293 10.707L14.707 9.293L18.414 13L14.708 16.706L14.707 16.707ZM9.293 16.707L5.586 13L9.293 9.293L10.707 10.707L8.414 13L10.706 15.293L9.293 16.706V16.707Z" fill="#2E3A59"></path>
                            </svg>
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            Tasks
                        </a>

                        <a class="nav-link" href="<?= APP_DIR . 'users' ?>">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 3C6.23858 3 4 5.23858 4 8C4 10.7614 6.23858 13 9 13C11.7614 13 14 10.7614 14 8C14 5.23858 11.7614 3 9 3ZM6 8C6 6.34315 7.34315 5 9 5C10.6569 5 12 6.34315 12 8C12 9.65685 10.6569 11 9 11C7.34315 11 6 9.65685 6 8Z" fill="#2E3A59"></path>
                                <path d="M16.9084 8.21828C16.6271 8.07484 16.3158 8.00006 16 8.00006V6.00006C16.6316 6.00006 17.2542 6.14956 17.8169 6.43645C17.8789 6.46805 17.9399 6.50121 18 6.5359C18.4854 6.81614 18.9072 7.19569 19.2373 7.65055C19.6083 8.16172 19.8529 8.75347 19.9512 9.37737C20.0496 10.0013 19.9987 10.6396 19.8029 11.2401C19.6071 11.8405 19.2719 12.3861 18.8247 12.8321C18.3775 13.2782 17.8311 13.6119 17.2301 13.8062C16.6953 13.979 16.1308 14.037 15.5735 13.9772C15.5046 13.9698 15.4357 13.9606 15.367 13.9496C14.7438 13.8497 14.1531 13.6038 13.6431 13.2319L13.6421 13.2311L14.821 11.6156C15.0761 11.8017 15.3717 11.9248 15.6835 11.9747C15.9953 12.0247 16.3145 12.0001 16.615 11.903C16.9155 11.8059 17.1887 11.639 17.4123 11.416C17.6359 11.193 17.8035 10.9202 17.9014 10.62C17.9993 10.3198 18.0247 10.0006 17.9756 9.68869C17.9264 9.37675 17.8041 9.08089 17.6186 8.82531C17.4331 8.56974 17.1898 8.36172 16.9084 8.21828Z" fill="#2E3A59"></path>
                                <path d="M19.9981 21C19.9981 20.475 19.8947 19.9551 19.6938 19.47C19.4928 18.9849 19.1983 18.5442 18.8271 18.1729C18.4558 17.8017 18.0151 17.5072 17.53 17.3062C17.0449 17.1053 16.525 17.0019 16 17.0019V15C16.6821 15 17.3584 15.1163 18 15.3431C18.0996 15.3783 18.1983 15.4162 18.2961 15.4567C19.0241 15.7583 19.6855 16.2002 20.2426 16.7574C20.7998 17.3145 21.2417 17.9759 21.5433 18.7039C21.5838 18.8017 21.6217 18.9004 21.6569 19C21.8837 19.6416 22 20.3179 22 21H19.9981Z" fill="#2E3A59"></path>
                                <path d="M16 21H14C14 18.2386 11.7614 16 9 16C6.23858 16 4 18.2386 4 21H2C2 17.134 5.13401 14 9 14C12.866 14 16 17.134 16 21Z" fill="#2E3A59"></path>
                            </svg>
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            Users
                        </a>

                    </li>

                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-5 mx-5 mt-5">
            <div class="ml-4 d-flex flex-row justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
                <?= $content ?>
            </div>
        </main>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>



