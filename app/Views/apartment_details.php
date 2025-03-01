<!-- <!DOCTYPE html>
<head> -->
<?= $this->extend('default_view') ?>
<?= $this->section('content') ?>


<!-- Basic Page Needs
================================================== -->
<title><?= $page->title?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="<?= base_url() ?>asset1/css/style.css">
<link rel="stylesheet" href="<?= base_url() ?>asset1/css/main-color.css" id="colors">

<script>
document.addEventListener('DOMContentLoaded', function() {
    const pricePerDay = <?= $apartment['price'] ?>; // Price per day from the property data
    const checkInInput = document.getElementById('check_in');
    const checkOutInput = document.getElementById('check_out');
    const totalPriceDisplay = document.getElementById('total_price');

    // Initialize Flatpickr for date inputs
    flatpickr(checkInInput, {
        minDate: 'today',
        onChange: calculateTotalPrice,
    });

    flatpickr(checkOutInput, {
        minDate: 'today',
        onChange: calculateTotalPrice,
    });

    // Function to calculate the total price
    function calculateTotalPrice() {
        const checkInDate = new Date(checkInInput.value);
        const checkOutDate = new Date(checkOutInput.value);

        if (checkInDate && checkOutDate && checkOutDate > checkInDate) {
            const timeDifference = checkOutDate - checkInDate;
            const numberOfDays = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));
            const totalPrice = numberOfDays * pricePerDay;
            totalPriceDisplay.textContent = `Total Price: $${totalPrice.toFixed(2)}`;
        } else {
            totalPriceDisplay.textContent = 'Total Price: $0.00';
        }
    }
});
</script>
</head>

<body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header Container
================================================== -->

        <div class="clearfix"></div>
        <!-- Header Container / End -->


        <!-- Gradient-->
        <div class="single-listing-page-titlebar"></div>


        <!-- Slider
================================================== -->
        <div class="listing-slider mfp-gallery-container margin-bottom-0">
            <?php 
$images = explode(',', $apartment['images']); // Convert images string into an array
?>

            <?php foreach ($images as $image): ?>
            <?php if (!empty($image)): ?>
            <a href="<?= base_url($image) ?>" data-background-image="<?= base_url($image) ?>" class="item mfp-gallery"
                title="Service Apartment - <?= esc($apartment['title']) ?>">
            </a> <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <!-- Content
================================================== -->

        <!-- Content
================================================== -->
        <div class="container">
            <div class="row sticky-wrapper">
                <div class="col-lg-8 col-md-8 padding-right-30">

                    <!-- Titlebar -->
                    <div id="titlebar" class="listing-titlebar">
                        <div class="listing-titlebar-title">
                            <h2><?=  $apartment['title']?><span class="listing-tag">Apartments</span></h2>
                            <span>
                                <a class="listing-address">
                                    <i class="fa fa-map-marker"></i>
                                    <?=  $apartment['location']?>
                                </a>
                            </span>
                            <div class="star-rating" data-rating="5">
                                <div class="rating-counter"><a href="#listing-reviews">( Excellent )</a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Listing Nav -->
                    <div id="listing-nav" class="listing-nav-container">
                        <ul class="listing-nav">
                            <li><a href="#listing-overview" class="active">Overview</a></li>
                            <li><a href="#listing-gallery">Gallery</a></li>
                            <li><a href="#listing-location">Location</a></li>
                            <!-- <li><a href="#listing-reviews">Reviews</a></li>
					<li><a href="#add-review">Add Review</a></li> -->
                        </ul>
                    </div>

                    <!-- Overview -->
                    <div id="listing-overview" class="listing-section">

                        <!-- Apartment Description -->
                        <ul class="apartment-details">
                            <li><?=  $apartment['bedrooms']?> Bedrooms </li>
                            <li> <?= $apartment['toilets']?> Toilets</li>
                            <li><?=  $apartment['bathrooms']?> Bathrooms </li>
                            <li> &#8358;<?= number_format($apartment['price'], 2, '.', ',') ?> Price </li>
                        </ul>

                        <!-- Description -->

                        <!-- Amenities -->
                        <h3 class="listing-desc-headline">About this apartment.
                        </h3>
                        <p>
                            <?=  nl2br($apartment['description'])?></p>


                        <!-- Listing Contacts -->
                        <div class="listing-links-container">

                            <ul class="listing-links contact-links">
                                <li><a href="tel:12-345-678" class="listing-links"><i
                                            class="fa fa-phone"></i><?=  $settingsData['phone']?></a></li>
                                <li><a href="mailto:mail@example.com" class="listing-links"><i
                                            class="fa fa-envelope-o"></i><?=  $settingsData['email']?></a>
                                </li>
                                <li><a href="#" target="_blank" class="listing-links"><i class="fa fa-link"></i>
                                        <?=  $settingsData['address']?></a></li>
                            </ul>

                            <div class="clearfix"></div>

                        </div>
                        <div class="clearfix"></div>


                        <!-- Amenities -->
                        <h3 class="listing-desc-headline">Amenities</h3>
                        <ul class="listing-features checkboxes">
                            <?php 
						$features = explode(',', $apartment['features']); // Convert comma-separated features into an array 
						?>
                            <ul class="property-features">
                                <li>24/7 Security</li>
                                <li>24/7 Power Supply</li>
                                <li>Fully Furnished</li>
                                <li>Parking Space</li>



                            </ul>

                        </ul>

                        <!-- Amenities -->
                        <h3 class="listing-desc-headline">Facilities</h3>
                        <ul class="listing-features checkboxes">
                            <?php 
$features = explode(',', $apartment['features']); // Convert comma-separated features into an array 
?>
                            <ul class="property-features">
                                <?php foreach ($features as $feature): ?>
                                <?php if (!empty($feature)): ?>
                                <li><?= esc($feature); ?></li>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>


                        </ul>
                    </div>


                    <!-- Slider -->
                    <!-- Slider -->
                    <div id="listing-gallery" class="listing-section">
                        <h3 class="listing-desc-headline margin-top-70">Gallery</h3>
                        <div class="listing-slider-small mfp-gallery-container margin-bottom-0">

                            <?php foreach ($images as $image): ?>
                            <?php if (!empty($image)): ?>
                            <a href="<?= base_url($image) ?>" data-background-image="<?= base_url($image) ?>"
                                class="item mfp-gallery" title="Service Apartment - <?= esc($apartment['title']) ?>">
                            </a> <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Location -->
                    <div id="listing-location" class="listing-section">
                        <h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Location</h3>

                        <div id="singleListingMap-container">
                            <div id="singleListingMap" data-latitude="40.70437865245596"
                                data-longitude="-73.98674011230469" data-map-icon="im im-icon-Hamburger"></div>
                            <a href="#" id="streetView">Street View</a>
                        </div>
                    </div>

                    <!-- Reviews -->


                </div>


                <!-- Sidebar
		================================================== -->
                <div class="col-lg-4 col-md-4 margin-top-75 sticky">


                    <!-- Verified Badge -->
                    <div class="verified-badge with-tip"
                        data-tip-content="Listing has been verified and belongs the business owner or manager.">
                        <i class="sl sl-icon-check"></i> Verified Listing
                    </div>
                    <!-- Book Now -->
                    <form action="<?= base_url() ?>user/bookings/create" method="POST">
                        <div id="booking-widget-anchor" class="boxed-widget booking-widget margin-top-35">
                            <h3><i class="fa fa-calendar-check-o "></i> Booking at
                                <strong>&#8358;<?= number_format($apartment['price'], 2, '.', ',') ?>/ daily</strong>
                            </h3>
                            <div class="row with-forms  margin-top-0">
                                <input type="hidden" name="property_id" value="<?= $apartment['id'] ?>">
                                <input type="hidden" name="price" value="<?= $apartment['price'] ?>">
                                <!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
                                <div lass="col-lg-12">
                                    <label for="check_in">Check-In Date:</label>
                                    <input type="date" name="check_in" id="check_in" required>
                                </div>

                                <div lass="col-lg-12">
                                    <label for="check_out">Check-Out Date:</label>
                                    <input type="date" name="check_out" id="check_out" required>
                                </div>

                                <div lass="col-lg-12">
                                    <label for="payment_method">Payment Method:</label>
                                    <select name="payment_method" id="payment_method" required>
                                        <option value="card">Card</option>
                                        <option value="bank_transfer">Bank Transfer</option>
                                        <option value="cash">Cash</option>
                                    </select>
                                </div>


                                <div class="booking-estimated-cost" id="total_price"
                                    style="font-weight: bold; margin: 10px 0;">
                                    <strong>Total Cost</strong>
                                    <span>0.00</span>

                                </div>
                                <!-- Panel Dropdown -->
                                <div class="col-lg-12">
                                    <div class="panel-dropdown">
                                        <a href="#">Guests <span class="qtyTotal" name="qtyTotal">1</span></a>
                                        <div class="panel-dropdown-content">

                                            <!-- Quantity Buttons -->
                                            <div class="qtyButtons">
                                                <div class="qtyTitle">Adults</div>
                                                <input type="text" name="qtyInput" value="1">
                                            </div>

                                            <div class="qtyButtons">
                                                <div class="qtyTitle">Childrens</div>
                                                <input type="text" name="qtyInput" value="0">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Book Now -->
                            <a href="pages-booking.html" class="button book-now fullwidth margin-top-5">Request To
                                Book</a>

                            <!-- Estimated Cost -->

                        </div>
                        <!-- Book Now / End -->
                        </form>
                        <!-- Contact -->
                        <div class="boxed-widget margin-top-35">
                            <div class="hosted-by-title">
                                <h4><span>Hosted by</span> <a
                                        href="pages-user-profile.html"><?=  $settingsData['company_name']?></a></h4>
                                <a href="pages-user-profile.html" class="hosted-by-avatar"><img
                                        src="<?= base_url() ?>uploads/settings/image/<?=  $settingsData['photo']?>"
                                        alt=" Service Apartment Logo"></a>
                            </div>
                            <ul class="listing-details-sidebar">
                                <li><i class="sl sl-icon-phone"></i> <?=  $settingsData['phone']?></li>
                                <!-- <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> -->
                                <li><i class="fa fa-envelope-o"></i> <a href="#"><?=  $settingsData['email']?></a></li>
                            </ul>

                            <ul class="listing-details-sidebar social-profiles">
                                <li><a href="<?=  $settingsData['facebook']?>" class="facebook-profile"><i
                                            class="fa fa-facebook-square"></i> Facebook</a></li>
                                <li><a href="<?=  $settingsData['twitter']?>" class="twitter-profile"><i
                                            class="fa fa-twitter"></i> Twitter</a></li>
                                <li><a href="<?=  $settingsData['instagram']?>" class="gplus-profile"><i
                                            class="fa fa-instagram"></i> Instagram</a></li>
                                <!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
                            </ul>

                            <!-- Reply to review popup -->
                            <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                                <div class="small-dialog-header">
                                    <h3>Send Message</h3>
                                </div>
                                <div class="message-reply margin-top-0">
                                    <textarea cols="40" rows="3" placeholder="Your message to Tom"></textarea>
                                    <button class="button">Send Message</button>
                                </div>
                            </div>

                            <a href="#small-dialog" class="send-message-to-owner button popup-with-zoom-anim"><i
                                    class="sl sl-icon-envelope-open"></i> Send Message</a>
                        </div>
                        <!-- Contact / End-->


                        <!-- Share / Like -->
                        <div class="listing-share margin-top-40 margin-bottom-40 no-border">
                            <!-- <button class="like-button"><span class="like-icon"></span> Bookmark this listing</button> 
				<span>159 people bookmarked this place</span> -->

                            <!-- Share Buttons -->
                            <ul class="share-buttons margin-top-40 margin-bottom-0">
                                <li><a class="fb-share"
                                        href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>"
                                        target="_blank"><i class="fa fa-facebook"></i> Share</a></li>
                                <li><a class="twitter-share"
                                        href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()) ?>&text=Check+out+this+amazing+content!"
                                        target="_blank"><i class="fa fa-twitter"></i> Tweet</a></li>
                                <li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                </div>
                <!-- Sidebar / End -->

            </div>
        </div>


        <!-- Footer
================================================== -->

        <!-- Footer / End -->


        <!-- Back To Top Button -->
        <!-- <div id="backtotop"><a href="#"></a></div> -->

        <!-- Booking Sticky Footer -->
        <div class="booking-sticky-footer">
            <div class="container">
                <div class="bsf-left">
                    <h4>Starting from $29</h4>
                    <div class="star-rating" data-rating="5">
                        <div class="rating-counter"></div>
                    </div>
                </div>
                <div class="bsf-right">
                    <a href="#booking-widget-anchor" class="button">Book Now</a>
                </div>
            </div>
        </div>


    </div>
    <!-- Wrapper / End -->



    <!-- Scripts
================================================== -->
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/jquery-migrate-3.3.2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/mmenu.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/chosen.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/slick.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/rangeslider.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/magnific-popup.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/waypoints.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/counterup.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/tooltips.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/custom.js"></script>

    <!-- Maps -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/infobox.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/markerclusterer.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset1/scripts/maps.js"></script>

    <!-- Booking Widget - Quantity Buttons -->
    <script src="<?= base_url() ?>asset1/scripts/quantityButtons.js"></script>

    <!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
    <script src="<?= base_url() ?>asset1/scripts/moment.min.js"></script>
    <script src="<?= base_url() ?>asset1/scripts/daterangepicker.js"></script>
    <script>
    // Calendar Init
    $(function() {
        $('#date-picker').daterangepicker({
            "opens": "left",
            // singleDatePicker: true,

            // Disabling Date Ranges
            isInvalidDate: function(date) {
                // Disabling Date Range
                var disabled_start = moment('09/02/2018', 'MM/DD/YYYY');
                var disabled_end = moment('09/06/2018', 'MM/DD/YYYY');
                return date.isAfter(disabled_start) && date.isBefore(disabled_end);

                // Disabling Single Day
                // if (date.format('MM/DD/YYYY') == '08/08/2018') {
                //     return true; 
                // }
            }
        });
    });

    // Calendar animation
    $('#date-picker').on('showCalendar.daterangepicker', function(ev, picker) {
        $('.daterangepicker').addClass('calendar-animated');
    });
    $('#date-picker').on('show.daterangepicker', function(ev, picker) {
        $('.daterangepicker').addClass('calendar-visible');
        $('.daterangepicker').removeClass('calendar-hidden');
    });
    $('#date-picker').on('hide.daterangepicker', function(ev, picker) {
        $('.daterangepicker').removeClass('calendar-visible');
        $('.daterangepicker').addClass('calendar-hidden');
    });
    </script>



    <!-- Style Switcher
================================================== -->
    <script src="<?= base_url() ?>asset1/scripts/switcher.js"></script>

    <div id="style-switcher">
        <h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>

        <div>
            <ul class="colors" id="color1">
                <li><a href="#" class="main" title="Main"></a></li>
                <li><a href="#" class="blue" title="Blue"></a></li>
                <li><a href="#" class="green" title="Green"></a></li>
                <li><a href="#" class="orange" title="Orange"></a></li>
                <li><a href="#" class="navy" title="Navy"></a></li>
                <li><a href="#" class="yellow" title="Yellow"></a></li>
                <li><a href="#" class="peach" title="Peach"></a></li>
                <li><a href="#" class="beige" title="Beige"></a></li>
                <li><a href="#" class="purple" title="Purple"></a></li>
                <li><a href="#" class="celadon" title="Celadon"></a></li>
                <li><a href="#" class="red" title="Red"></a></li>
                <li><a href="#" class="brown" title="Brown"></a></li>
                <li><a href="#" class="cherry" title="Cherry"></a></li>
                <li><a href="#" class="cyan" title="Cyan"></a></li>
                <li><a href="#" class="gray" title="Gray"></a></li>
                <li><a href="#" class="olive" title="Olive"></a></li>
            </ul>
        </div>

    </div>
    <!-- Style Switcher / End -->

</body>
<?= $this->endSection() ?>