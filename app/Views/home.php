<?php echo $this->extend('default_view')?>
<?php echo $this->section('content')?>


<!-- Header Start -->
<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <!-- <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Home</span> To Live With Your Family</h1> -->
            <h1 class="display-5 animated fadeIn mb-4">List. <span class="text-primary">Book.</span> Stay</h1>
            <p class="animated fadeIn mb-4 pb-2">Bringing top-quality short-let apartments to renters while helping landlords maximize their earnings
            </p>
            <a href="<?php echo base_url()?>register-as-agent" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>
        </div>
        <div class="col-md-6 animated fadeIn">
            <div class="owl-carousel header-carousel">
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="<?php echo base_url()?>assets/img/service_1.jpg" alt="">
                </div>
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="<?php echo base_url()?>assets/img/carousel-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<br> <br> <br>
<!-- Header End -->


<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class=" position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="<?php echo base_url()?>assets/img/service_2.jpg">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <!-- <h1 class="mb-4">#1 Place To Find The Perfect Apartment</h1> -->
                <h1 class="mb-3">Why Choose Us</h1>
                <div class="flex-column justify-content-between gap-5">
                    <p style="text-align: left;">
                        <span style="font-size:20px; color: #0e2e50; font-weight: bold;">For Renters:</span> <br>
                            Find luxurious and affordable short-lets across Africa.
                            Only the best, vetted listings for your peace of mind.
                            Simple process with secure payments and instant confirmations.

                    </p>

                    <p style="text-align: left;">
                        <span style="font-size:20px; color: #0e2e50; font-weight: bold;">For House Owners:</span> <br>
                        Start earning by listing your property in just a few clicks.
                        Attract verified guests looking for short-term stays.
                        Pay a simple monthly fee to have your property showcased.
                        Guaranteed payouts with hassle-free processing.

                    </p>
                </div>
                
                <!-- <p><i class="fa fa-check text-primary me-3"></i>Agents create profiles and detailed listings.</p>
                <p><i class="fa fa-check text-primary me-3"></i>Clients book apartments with one click.</p>
                <p><i class="fa fa-check text-primary me-3"></i>Secure and seamless online payment process.</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="<?php echo base_url()?>about_us">Read More</a> -->
            </div>
        </div>
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Apartment Types</h1>
            <p>
                From cozy studios to spacious penthouses, our apartment types cater to diverse lifestyles,
                ensuring comfort and convenience for every resident.
            </p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="<?php echo base_url()?>assets/img/icon-apartment.png" alt="Icon">
                        </div>
                        <h6>Duplex</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="<?php echo base_url()?>assets/img/icon-villa.png" alt="Icon">
                        </div>
                        <h6>Terrace</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="<?php echo base_url()?>assets/img/icon-house.png" alt="Icon">
                        </div>
                        <h6>Bungalow</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="<?php echo base_url()?>assets/img/icon-housing.png" alt="Icon">
                        </div>
                        <h6>Penthouse</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="<?php echo base_url()?>assets/img/icon-building.png" alt="Icon">
                        </div>
                        <h6>Mini-flats</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="<?php echo base_url()?>assets/img/icon-neighborhood.png" alt="Icon">
                        </div>
                        <h6>Two-Bedroom</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="<?php echo base_url()?>assets/img/icon-condominium.png" alt="Icon">
                        </div>
                        <h6>Three-Bedroom</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="<?php echo base_url()?>assets/img/icon-luxury.png" alt="Icon">
                        </div>
                        <h6>Self-contained</h6>
                        <span>123 Properties</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Category End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="<?php echo base_url()?>assets/img/about.jpg">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <!-- <h1 class="mb-4">#1 Place To Find The Perfect Apartment</h1> -->
                <h1 class="mb-4">About Us</h1>
                <p class="mb-4">
                    <!-- Discover your ideal home with Service Apartment,
                    where exceptional options meet unparalleled amenities, comfort, and convenience,
                    perfectly tailored to suit your unique lifestyle and preferences.
                    Experience the best in apartment living. -->

                    At Service Apartment Africa, we simplify short-term rentals across Africa. We provide a platform where property owners can easily list their apartments, and guests can find trusted, quality short-let options. Our mission is to offer a seamless experience for both landlords and renters, ensuring convenience, security, and top-tier service. We are committed to maintaining the highest standards and providing a platform that works for everyone involved.
                </p>
                <p><i class="fa fa-check text-primary me-3"></i>Agents create profiles and detailed listings.</p>
                <p><i class="fa fa-check text-primary me-3"></i>Clients book apartments with one click.</p>
                <p><i class="fa fa-check text-primary me-3"></i>Secure and seamless online payment process.</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="<?php echo base_url()?>about_us">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
<br> <br>
<?php echo view('pre/search_bar')?>

<!-- Property List Start -->
<?php echo view('pre/houses')?>
<div class="col-12 text-center">
    <a class="btn btn-primary py-3 px-5" href="<?php echo base_url()?>apartment">Browse More Apartment</a>
</div>
<!-- Property List End -->


<?php echo view('customer_service')?>


<!-- Team Start -->
<!-- <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Property Agents</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="<?php echo base_url()?>assets/img/team-1.jpg" alt="">
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
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="<?php echo base_url()?>assets/img/team-2.jpg" alt="">
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
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="<?php echo base_url()?>assets/img/team-3.jpg" alt="">
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
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="<?php echo base_url()?>assets/img/team-4.jpg" alt="">
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
</div> -->
<!-- Team End -->


<!-- Testimonial Start -->
<!-- <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">What Makes Us Stand Out
            Hear From Our Clients</h1>
            <p>Here are some testimonies from our clients that you can go through and see how we have delivered great and unique services to our clients at large.</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="<?php echo base_url()?>assets/img/testimonial-1.jpg" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="<?php echo base_url()?>assets/img/testimonial-2.jpg" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="<?php echo base_url()?>assets/img/testimonial-3.jpg" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->


<script>
$(document).ready(function() {
    $('#mySelect').select2();
});
</script>


<?php echo $this->endSection()?>