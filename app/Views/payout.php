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

<style>
.listing-item-container {

    height: 36% !important;

}
</style>
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


        <!-- Titlebar
================================================== -->
        <div id="titlebar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h2>Booking</h2>

                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Payout</li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>


        <!-- Content
================================================== -->

        <!-- Container -->
        <div class="container">
            <div class="row">

                <!-- Content
		================================================== -->
                <div class="col-lg-8 col-md-8 padding-right-30">

                    <h3 class="margin-top-0 margin-bottom-30">Personal Details</h3>

                    <div class="row">

                        <div class="col-md-12">
                            <label>Full Name</label>
                            <input type="text" readonly value="<?= $booking['name'] ?>">
                        </div>

                        <div class="col-md-6">
                            <div class="input-with-icon medium-icons">
                                <label>E-Mail Address</label>
                                <input type="text" readonly value="<?= $user['email'] ?>">
                                <i class="im im-icon-Mail"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-with-icon medium-icons">
                                <label>Phone</label>
                                <input type="text" readonly value="<?= $user['phone'] ?>">
                                <i class="im im-icon-Phone-2"></i>
                            </div>
                        </div>

                    </div>


                    <h3 class="margin-top-55 margin-bottom-30">Payment Method</h3>

                    <!-- Payment Methods Accordion -->
                    <div class="payment">

                        <div class="payment-tab payment-tab-active">
                            <div class="payment-tab-trigger">
                                <input checked id="paystack" name="cardType" type="radio" value="paystack">
                                <label for="paystack">Paystack</label>
                                <img height="400px" class="payment-logo payments"
                                    src="<?= base_url()?>/asset1/images/pay.png" alt="">
                            </div>

                            <div class="payment-tab-content">
                                <p>You will be redirected to payments to complete payment.</p>
                            </div>
                        </div>


                        <div class="payment-tab">
                            <div class="payment-tab-trigger">
                                <!-- <input type="radio" name="cardType" id="creditCart" value="creditCard"> -->
                                <label for="creditCart">Credit / Debit Card / Bank Payment / Transfers</label>
                                <img class="payment-logo" src="https://i.imgur.com/IHEKLgm.png" alt="">
                            </div>

                            <div class="payment-tab-content">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="card-label">
                                            <label for="nameOnCard">Name on Card</label>
                                            <input id="nameOnCard" name="nameOnCard" required type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card-label">
                                            <label for="cardNumber">Card Number</label>
                                            <input id="cardNumber" name="cardNumber"
                                                placeholder="1234  5678  9876  5432" required type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card-label">
                                            <label for="expirynDate">Expiry Month</label>
                                            <input id="expiryDate" placeholder="MM" required type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card-label">
                                            <label for="expiryDate">Expiry Year</label>
                                            <input id="expirynDate" placeholder="YY" required type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card-label">
                                            <label for="cvv">CVV</label>
                                            <input id="cvv" required type="text">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Payment Methods Accordion / End -->

                    <a href="#" data-bs-toggle="modal"
					data-bs-target="#kt_modal_create_app"  class="button booking-confirmation-btn margin-top-40 margin-bottom-65">Confirm and Pay</a>
                </div>

                
                <!-- Sidebar
		================================================== -->
                <div class="col-lg-4 col-md-4 margin-top-0 margin-bottom-60">

                    <!-- Booking Summary -->
                    <div class="listing-item-container compact order-summary-widget">
                        <div class="listing-item">
                            <img src="<?= base_url()?><?= $booking['thumbnail'] ?>" alt="">

                            <div class="listing-item-content">
                                <div class="numerical-rating" data-rating="5.0"></div>
                                <h3><?= $booking['title'] ?></h3>
                                <span><span style="font-weight: bold; color: green;">₦</span><?= !empty($booking['total_price']) ? number_format($booking['total_price'], 2) : '' ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="boxed-widget opening-hours summary margin-top-0">
                        <h3><i class="fa fa-calendar-check-o"></i> Booking Summary</h3>
                        <ul>
                            <li>Booking Date <span><?= $booking['created_at'] ?></span></li>
                            <li>Check In <span><?= $booking['check_in'] ?></span></li>
                            <li>Check Out <span><?= $booking['check_out'] ?></span></li>
                            <!-- <li>Guests <span>2 Adults</span></li> -->
                            <li class="total-costs">Total Cost<span style="font-weight: bold; color: green;">₦</span> <span><?= !empty($booking['total_price']) ? number_format($booking['total_price'], 2) : '' ?></span></li>
                        </ul>
						

                    </div>
                    <!-- Booking Summary / End -->

                </div>

            </div>
        </div>
        <!-- Container / End -->
		<div class="d-flex align-items-center gap-2 gap-lg-3">
            
			<!-- <div class="modal fade" id="paystackModal" tabindex="-1" aria-labelledby="paystackModalLabel" aria-hidden="true"> -->
			<div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-labelledby="paystackModalLabel"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="paystackModalLabel">Pay with Paystack</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal"
								aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<!-- Paystack Payment Form -->
							<form id="paymentForm" method="POST">
								<div class="mb-3">
									<label for="email" class="form-label">Email Address:</label>
									<input type="email" id="email" value="<?= $user['email'] ?>" name="email" class="form-control"
										placeholder="Enter your email" required>
								</div>
								<div class="mb-3">
									<label for="phone" class="form-label">Phone Number:</label>
									<input style="font-size:17px" type="tel" value="<?= $user['phone'] ?>" id="phone" name="phone" class="form-control"
										placeholder="Enter your phone number" required pattern="[0-9]{11}">
								</div>
								
								<div class="mb-3">
                                                <label for="amount" class="form-label">Amount (NGN):</label>
                                                <input type="number" id="amount" name="amount" class="form-control"
                                                    readonly placeholder="Enter amount" value="<?= $booking['total_price'] ?>" min="<?= $booking['total_price'] ?>"
                                                    step="<?= $booking['total_price'] ?>" required>
                                            </div>
								<div class="modal-footer">
									<button style="padding:10px 30px ; font-size:17px" type="button" class="btn btn-secondary"
										data-bs-dismiss="modal">Close</button>
									<button style="padding:10px 30px; font-size:17px" type="button" class="btn btn-primary" onclick="validateAndPay()">Pay
										Now</button>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
			<!--end::Primary button-->
		</div>
    </div>
    <!-- Wrapper / End -->



    <!-- Scripts
================================================== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
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


<script>
    function validateAndPay() {
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var amount = document.getElementById('amount').value * 100; // Convert to kobo

        // Validate phone number length
        if (phone.length !== 11) {
            document.getElementById('phoneError').textContent = "Phone number must be exactly 11 digits";
            return;
        }

        // Validate phone number format (digits only)
        var phoneRegex = /^[0-9]+$/;
        if (!phoneRegex.test(phone)) {
            document.getElementById('phoneError').textContent = "Invalid phone number";
            return;
        }

        var handler = PaystackPop.setup({
            key: 'pk_test_faa8396a1e3ce90b576ce8e6eb25af226eacff34', // Replace with your actual Paystack public key
            email: email,
            amount: amount,
            phone: phone,
            currency: 'NGN',
            ref: '' + Math.floor((Math.random() * 1000000000) + 1), // Unique reference
            metadata: {
                custom_fields: [{
                    display_name: "Mobile Number",
                    variable_name: "mobile_number",
                    value: phone // Pass the phone number entered by the user
                }]
            },
            callback: function(response) {
                alert('Payment complete! Reference: ' + response.reference);
                // Store payment status in local storage
                localStorage.setItem('paymentStatus', 'success');
                // Reload the page
				window.location.href = '<?= base_url()?>payment/success';
                // location.reload();
            },
            onClose: function() {
                alert('Transaction was not completed, window closed.');
            }
        });
        handler.openIframe();
    }
// PaymentController
    // Check payment status on page load
    window.onload = function() {
        if (localStorage.getItem('paymentStatus') === 'success') {
            // Hide the marquee
            document.getElementById('marqueeContainer').style.display = 'none';
            // Optionally, you can remove the item from local storage if you want this to be a one-time check
            localStorage.removeItem('paymentStatus');
        }
    }
    </script>
    <!-- Style Switcher
================================================== -->
    <script src="<?= base_url() ?>asset1/scripts/switcher.js"></script>


</body>
<?= $this->endSection() ?>