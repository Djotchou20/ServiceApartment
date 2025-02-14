<?= $this->extend('default_view') ?>
<?= $this->section('content') ?>

<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">About Us</h1>
            <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                    <li class="breadcrumb-item text-body active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 animated fadeIn">
            <img class="img-fluid" src="<?= base_url() ?>assets/img/header.jpg" alt="">
        </div>
    </div>
</div>

<!-- </?= view('pre/search_bar') ?> -->
<!-- Header End -->
<br>
<br>
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="<?= base_url() ?>assets/img/about.jpg">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <!-- <h1 class="mb-4">#1 Place To Find The Perfect Apartment</h1> -->
                <h1 class="mb-4">About Service Apartment</h1>
                <p class="mb-4">
                    <!-- Discover your ideal home with Service Apartment, 
                    where exceptional options meet unparalleled amenities, comfort, and convenience, 
                    perfectly tailored to suit your unique lifestyle and preferences. 
                    Experience the best in apartment living. -->
                    At Service Apartment Africa, we are committed to transforming the short-term rental experience across Africa. 
                    We’re a high-standard, reliable platform designed to help property owners list their apartments and earn passive income, 
                    while providing renters with a wide selection of verified, top-quality accommodations.
                    <br> <br>
                    Our mission is to make the process of finding and renting short-lets as seamless, secure, 
                    and efficient as possible. Whether you’re a landlord looking to showcase your property or a 
                    guest seeking a perfect short-term stay, we provide a trusted marketplace that puts your needs 
                    first. We believe in providing exceptional service, ensuring both renters and landlords experience a smooth, 
                    stress-free journey from start to finish.
                    <br> <br>
                    With a focus on customer satisfaction, we work tirelessly to maintain the highest standards of quality, security, and 
                    convenience—so you can trust us to take care of your short-let needs, every time.

                    
                </p>
                <!-- <p><i class="fa fa-check text-primary me-3"></i>Discover Luxury Living with Service Apartment</p>
                <p><i class="fa fa-check text-primary me-3"></i>Perfectly Tailored to Your Unique Lifestyle</p>
                <p><i class="fa fa-check text-primary me-3"></i>Unmatched Comfort and Convenience Awaits You</p> -->
                <!-- <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a> -->
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<?= view('pre/houses') ?>

<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Meet Our Team</h1>
            <!-- <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p> -->
            <p>
            We’re a passionate group of professionals dedicated to making your rental experience smooth and reliable. Get to know the people behind Service Apartment Africa

            </p>
        </div>
        <div class="row g-4">
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="<?= base_url() ?>assets/img/gabriel.jpg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Gabriel Benjamin</h5>
                        <small>Co-founder</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="<?= base_url() ?>assets/img/team-1.jpg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Eniola Aluko</h5>
                        <small>Customer Support Lead</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="<?= base_url() ?>assets/img/lawyer.jpg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Sulyman Nasir</h5>
                        <small>Lawyer</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="<?= base_url() ?>assets/img/team-3.jpg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Full Name</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- Team End -->

<?= view('customer_service') ?>




<?= $this->endSection() ?>