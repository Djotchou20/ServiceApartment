<?= $this->extend('default_view') ?>
<?= $this->section('content') ?>

<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Apartment Lists</h1>
            <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                    <li class="breadcrumb-item text-body active" aria-current="page">Apartment Lists</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 animated fadeIn">
            <img class="img-fluid" src="<?= base_url() ?>assets/img/header.jpg" alt="">
        </div>
    </div>
</div>

<?= view('pre/search_bar') ?>

<?= view('pre/houses') ?>

<?= $this->endSection() ?>