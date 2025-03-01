<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6" style="margin-top: px;">
                <!-- <h5 class="text-white mb-4">Newsletter</h5> -->
                <a href="<?= base_url() ?>">
                    <img src="<?= base_url() ?>/assets/img/rounded_logo_brand.png" width="25%" alt="invalid image">
                    <!-- <span class="m-0 text-primary" style="font-size: 20px; font-weight:bold; color:white;" >APARTMENT</span> -->
                    <span class="m-0" style="font-size: 20px; font-weight:bold; color:white;" >APARTMENT</span>
                </a> 
                <!-- <br> <br> -->
                <p>
                We’re a high-standard, African-focused short-let platform connecting landlords with premium renters across Africa. Our mission is to make renting and listing short-lets simple, secure, and accessible for everyone. Whether you’re looking to list your property or find a cozy place to stay, Service Apartment Africa is your trusted partner.

                </p>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Quick Links</h5>
                <a class="btn btn-link text-white-50 <?= (isset($activeMenuItem) && $activeMenuItem == 'home') ? 'active' : '' ?>" href="<?= base_url() ?>">Home</a>
                <a class="btn btn-link text-white-50 <?= (isset($activeMenuItem) && $activeMenuItem == 'about') ? 'active' : '' ?>" href="<?= base_url() ?>about_us">About Us</a>
                <a class="btn btn-link text-white-50 <?= (isset($activeMenuItem) && $activeMenuItem == 'property') ? 'active' : '' ?>" href="<?= base_url() ?>apartment">Apartment</a>
                <a class="btn btn-link text-white-50" href="<?= base_url() ?>contact">Contact</a>
                <!-- <a class="btn btn-link text-white-50" href="">Privacy Policy</a> -->
                <!-- <a class="btn btn-link text-white-50" href="">Terms & Condition</a> -->
            </div>
            <!-- <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Get In Touch</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
               
            </div> -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Get In Touch</h5>
                <!-- <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p> <br> -->
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>
                    Arlington, Texas, USA.
                </p> <br>

                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>
                    Lagos, Nigeria.
                </p> <br>
                <a class="mb-2" href="tel:+234 814 3727933" style="color:#FFFFFF80"><i class="fa fa-phone-alt me-3" style="color:#FFFFFF80"></i>+234 8143 727933</a> <br> <br>
                <a class="mb-2" href="tel:+234 9048 123636" style="color:#FFFFFF80"><i class="fa fa-phone-alt me-3" style="color:#FFFFFF80"></i>+234 9048 123636</a> <br> <br>
                <div>
                <a class="mb-2 d-flex align-items-center" href="mailto:info@serviceapartment.africa" 
                    style="color: #FFFFFF80; padding: px; display: inline-flex; width: auto;">
                    <i class="fa fa-envelope me-2" style="color: #FFFFFF80;"></i>
                    <span>info@serviceapartment.africa</span>
                </a>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Photo Gallery</h5>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="<?= base_url() ?>assets/img/property-1.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="<?= base_url() ?>assets/img/property-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="<?= base_url() ?>assets/img/property-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="<?= base_url() ?>assets/img/property-4.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="<?= base_url() ?>assets/img/property-5.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="<?= base_url() ?>assets/img/property-6.jpg" alt="">
                    </div>
                </div>
            </div> -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Follow Us</h5>
                <p>Stay updated and connected with us on social media for the latest listings and updates.</p>
                <div class="d-flex pt-2">
                    <!-- <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a> -->
                    <a class="btn btn-outline-light btn-social" target="_blank" href="https://www.facebook.com/share/1B9o9cLUMx/?mibextid=LQQJ4d"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank" href="https://www.instagram.com/service_apartmentafrica?igsh=ZWVhb3g2YWNxcWdu&utm_source=qr"><i class="fab fa-instagram"></i></a>
                    <!-- <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a> -->
                    <!-- <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a> -->
                </div>
                <!-- <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div> -->
            </div>

        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <!-- &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. -->
                    Copyrights &copy; <?= date("y") ?> All Rights Reserved by SERVICE APARTMENT.
                </div>
                <!-- <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->