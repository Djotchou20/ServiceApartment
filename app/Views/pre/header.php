<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4" style="height:vh">
        <a href="<?= base_url() ?>" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <!-- <img class="img-fluid" src="</?= base_url() ?>assets/img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;"> -->
                <img class="img-fluid" src="<?= base_url() ?>assets/img/logo_test.png" alt="Icon" style="width: 55px; height: 55px;">
            </div>
            <!-- <h1 class="m-0 text-primary">Makaan</h1> -->
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
</div>
<!-- Navbar End -->



<!-- <script>
    $(document).ready(function() {
        $('.nav-item .nav-link ').removeClass('active');
    });
</script> -->