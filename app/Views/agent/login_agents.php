<?= view('pre/toast_view') ?>

<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title><?= $page->title ?></title>
    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - The World's #1 Selling Bootstrap Admin Template by KeenThemes" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Metronic by Keenthemes" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="<?= base_url() ?>assetss/media/logos/rounded_logo_brand.png" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="<?= base_url() ?>assetss/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assetss/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
    // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank">
    <!--begin::Theme mode setup on page load-->
    <script>
    var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Logo-->
            <a href="index.html" class="d-block d-lg-none mx-auto py-20">
                <img alt="Logo" src="<?= base_url() ?>assetss/media/logos/default.svg"
                    class="theme-light-show h-25px" />
                <img alt="Logo" src="<?= base_url() ?>assetss/media/logos/default-dark.svg"
                    class="theme-dark-show h-25px" />
            </a>
            <!--end::Logo-->
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
                <!--begin::Wrapper-->
                <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                    <!--begin::Header-->
                    <div class="d-flex flex-stack py-2">
                        <!--begin::Back link-->
                        <div class="me-2">
                            <!-- <a href="authentication/layouts/fancy/sign-in.html" class="btn btn-icon bg-light rounded-circle">
                                <i class="ki-duotone ki-black-left fs-2 text-gray-800"></i>
                            </a> -->
                        </div>
                        <!--end::Back link-->
                        <!--begin::Sign Up link-->
                        <div class="m-0">
                            <!-- <span class="text-gray-500 fw-bold fs-5 me-2" data-kt-translate="sign-up-head-desc">Already a member ?</span> -->
                            <!-- <a href="authentication/layouts/fancy/sign-in.html" class="link-primary fw-bold fs-5" data-kt-translate="sign-up-head-link">Sign In</a> -->
                        </div>
                        <!--end::Sign Up link=-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="py-20">
                        <!--begin::Form-->
                        <form class="form w-100" action="<?= base_url('agent-auth') ?>" method="POST">
                            <div class="text-start mb-10">
                                <h1 class="text-gray-900 mb-3 fs-3x" data-kt-translate="sign-up-title">Sign in as member
                                </h1>
                                <div class="text-gray-500 fw-semibold fs-6" data-kt-translate="general-desc">Get
                                    unlimited access & earn money</div>
                            </div>

                            <!-- Display validation errors if any -->
                            <?php if (session()->has('errors')) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach (session('errors') as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <?php endif ?>

                            <!-- Display success message if any -->
                            <?php if (session()->has('success')) : ?>
                            <div class="alert alert-success"><?= session('success') ?></div>
                            <?php endif ?>

                            <!-- <div class="fv-row mb-10">
                                <input class="form-control form-control-lg form-control-solid" type="email" placeholder="Email" name="email" autocomplete="off" value="</?= old('email') ?>" />
                            </div> -->

                            <!-- <div class="fv-row mb-10">
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Password" name="password" autocomplete="off" />
                            </div> -->

                            <div class="fv-row mb-10">
                                <input class="form-control form-control-lg form-control-solid" type="email"
                                    placeholder="Email" name="email" value="<?= old('email') ?>" autocomplete="off" />
                                <?php if (isset(session('errors')['email'])) : ?>
                                <div class="text-danger"><?= session('errors')['email'] ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="fv-row mb-10">
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    placeholder="Password" name="password" autocomplete="off" />
                                <?php if (isset(session('errors')['password'])) : ?>
                                <div class="text-danger"><?= session('errors')['password'] ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="d-flex flex-stack">
                                <button id="kt_sign_up_submit" class="btn btn-primary"
                                    data-kt-translate="sign-up-submit">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <!-- <div class="m-0">
                        
                        <button class="btn btn-flex btn-link rotate" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
								<img data-kt-element="current-lang-flag" class="w-25px h-25px rounded-circle me-3" src="<?= base_url() ?>assetss/media/flags/united-states.svg" alt="" />
								<span data-kt-element="current-lang-name" class="me-2">English</span>
								<i class="ki-duotone ki-down fs-2 text-muted rotate-180 m-0"></i>
							</button>
                        
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4" data-kt-menu="true" id="kt_auth_lang_menu">
                            
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link d-flex px-5" data-kt-lang="English">
                                    <span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="<?= base_url() ?>assetss/media/flags/united-states.svg" alt="" />
										</span>
                                    <span data-kt-element="lang-name">English</span>
                                </a>
                            </div>
                            
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link d-flex px-5" data-kt-lang="Spanish">
                                    <span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="<?= base_url() ?>assetss/media/flags/spain.svg" alt="" />
										</span>
                                    <span data-kt-element="lang-name">Spanish</span>
                                </a>
                            </div>
                            
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link d-flex px-5" data-kt-lang="German">
                                    <span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="<?= base_url() ?>assetss/media/flags/germany.svg" alt="" />
										</span>
                                    <span data-kt-element="lang-name">German</span>
                                </a>
                            </div>
                            
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link d-flex px-5" data-kt-lang="Japanese">
                                    <span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="<?= base_url() ?>assetss/media/flags/japan.svg" alt="" />
										</span>
                                    <span data-kt-element="lang-name">Japanese</span>
                                </a>
                            </div>
                            
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link d-flex px-5" data-kt-lang="French">
                                    <span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="<?= base_url() ?>assetss/media/flags/france.svg" alt="" />
										</span>
                                    <span data-kt-element="lang-name">French</span>
                                </a>
                            </div>
                            
                        </div>
                        
                    </div> -->
                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat"
                style="background-image: url(<?= base_url() ?>assetss/media/auth/7.png)"></div>
            <!--begin::Body-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
    var hostUrl = "<?= base_url() ?>assetss/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <!-- <script src="<?= base_url() ?>assetss/plugins/global/plugins.bundle.js"></script> -->
    <!-- <script src="<?= base_url() ?>assetss/js/scripts.bundle.js"></script> -->
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    <!-- <script src="<?= base_url() ?>assetss/js/custom/authentication/sign-up/general.js"></script> -->
    <!-- <script src="<?= base_url() ?>assetss/js/custom/authentication/sign-in/i18n.js"></script> -->
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>