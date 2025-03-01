<!-- Navbar Start -->
<!-- <div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4" style="height:vh">
        <a href="<?= base_url() ?>" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="<?= base_url() ?>assets/img/logo_test.png" alt="Icon" style="width: 55px; height: 55px;">
            </div>
            <h1 class="m-0 text-primary"></h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                

                <a href="<?= base_url() ?>" class="nav-item nav-link <?= (isset($activeMenuItem) && $activeMenuItem == 'home') ? 'active' : '' ?>">Home</a>
                <a href="<?= base_url() ?>about_us" class="nav-item nav-link <?= (isset($activeMenuItem) && $activeMenuItem == 'about') ? 'active' : '' ?>">About</a>
                <a href="<?= base_url() ?>apartment" class="nav-item nav-link <?= (isset($activeMenuItem) && $activeMenuItem == 'property') ? 'active' : '' ?>">Apartment</a>
                

                <a href="<?= base_url() ?>contact" class="nav-item nav-link <?= (isset($activeMenuItem) && $activeMenuItem == 'contact') ? 'active' : '' ?>">Contact</a>

            </div>
            <a href="#open-modal" class="btn btn-primary px-3 d-none d-lg-flex ">Join Us Today</a>
        </div>
    </nav>
</div> -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="<?= base_url() ?>" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="<?= base_url() ?>assets/img/logo_test.png" alt="Icon" style="width: 55px; height: 55px;">
            </div>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="<?= base_url() ?>" class="nav-item nav-link <?= (isset($activeMenuItem) && $activeMenuItem == 'home') ? 'active' : '' ?>">Home</a>
                <a href="<?= base_url() ?>about_us" class="nav-item nav-link <?= (isset($activeMenuItem) && $activeMenuItem == 'about') ? 'active' : '' ?>">About</a>
                <a href="<?= base_url() ?>apartment" class="nav-item nav-link <?= (isset($activeMenuItem) && $activeMenuItem == 'property') ? 'active' : '' ?>">Apartment</a>
                <a href="<?= base_url() ?>contact" class="nav-item nav-link <?= (isset($activeMenuItem) && $activeMenuItem == 'contact') ? 'active' : '' ?>">Contact</a>
            </div>

            <?php if (session()->has('user_id')): ?>
                <?php $user_role = session()->get('user_role'); ?>
                <!-- Avatar Dropdown -->
                <div class="dropdown ms-3">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown">
                        <img src="<?= base_url(session()->get('user_avatar') ?? 'assets/img/logo_test.png') ?>" alt="User Avatar" class="rounded-circle" width="40" height="40">
                        <span class="ms-2"><?= esc(session()->get('username')) ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                       
                        <?php if ($user_role == 'admin'): ?>
                            <li><a class="dropdown-item" href="<?= base_url() ?>admin/profiledash">Admin Dashboard</a></li>
                            <li><a class="dropdown-item" href="<?= base_url() ?>admin/settings">Manage Account</a></li>
                        <?php elseif ($user_role == 'agent'): ?>
                            <li><a class="dropdown-item" href="<?= base_url() ?>agent/profiledash">Profile</a></li>
                            <li><a class="dropdown-item" href="<?= base_url() ?>agent/apartments">My Listings</a></li>
                            <li><a class="dropdown-item" href="<?= base_url() ?>add_property">Add Property</a></li>
                        <?php elseif ($user_role == 'user'): ?>
                            <li><a class="dropdown-item" href="<?= base_url() ?>user/profile">Profile</a></li>
                            <li><a class="dropdown-item" href="<?= base_url() ?>user/settings">Profile Settings</a></li>
                            <li><a class="dropdown-item" href="<?= base_url() ?>agent/booking-history">My Bookings</a></li>
                        <?php endif; ?>

                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="<?= base_url() ?>logout">Logout</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <a href="<?= base_url()?>user-signup" class="btn btn-primary px-3 d-none d-lg-flex">Join Us Today</a>
            <?php endif; ?>
        </div>
    </nav>
</div>

<!-- Navbar End -->



<!-- <script>
    $(document).ready(function() {
        $('.nav-item .nav-link ').removeClass('active');
    });
</script> -->