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

				<h2>Booking Processed</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Booking Processed</li>
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
		<div class="col-md-12">

			<div class="booking-confirmation-page">
				<i class="fa fa-check-circle"></i>
				<h2 class="margin-top-30">Thanks for your booking!</h2>
				<!-- <p>You'll receive a confirmation email at mail@example.com</p> -->
				<!-- <a href="dashboard-invoice.html" class="button margin-top-30">View Invoice</a> -->
			</div>

		</div>
	</div>
</div>
<!-- Container / End -->
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