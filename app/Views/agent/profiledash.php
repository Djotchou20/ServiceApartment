<?= $this->extend('agent/user_default') ?>
<?= $this->section('content') ?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script> -->

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <!--begin::Sidebar-->

    <!--end::Sidebar-->
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1
                            class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                            Dashboard</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="<?= base_url() ?>user/profiledash"
                                    class="text-muted text-hover-primary">Home</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Dashboard</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->

                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <?php if (isset($AgentData['paid']) && $AgentData['paid'] !== 'PAID'): ?>
    <div id="marqueeContainer" style="width:70%; text-align:center;">
        <marquee behavior="scroll" scrollamount="4" direction="ltr" style="color:red; font-size:16px;">
            Please make your payment, so you can start posting properties
        </marquee>
    </div>
<?php endif; ?>

                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <?php if (isset($AgentData['paid']) && $AgentData['paid'] !== 'PAID'): ?>
                        <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_create_app">Pay Now!</a>
                            <?php endif; ?>
                        <!-- Modal -->
                        <!-- <div class="modal fade" id="paystackModal" tabindex="-1" aria-labelledby="paystackModalLabel" aria-hidden="true"> -->
                        <div class="modal fade" id="kt_modal_create_app" tabindex="-1"
                            aria-labelledby="paystackModalLabel" aria-hidden="true">
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
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="Enter your email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number:</label>
                                                <input type="tel" id="phone" name="phone" class="form-control"
                                                    placeholder="Enter your phone number" required pattern="[0-9]{11}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="amount" class="form-label">Amount (NGN):</label>
                                                <input type="number" id="amount" name="amount" class="form-control"
                                                    readonly placeholder="Enter amount" value="50000" min="50000"
                                                    step="50000" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="validateAndPay()">Pay Now</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--end::Primary button-->
                    </div>
                    <!--end::Actions-->
                </div>

                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Navbar-->
                    <div class="card mb-6">
                        <div class="card-body pt-9 pb-0">
                            <!--begin::Details-->
                            <div class="d-flex flex-wrap flex-sm-nowrap">
                                <!--begin: Pic-->
                                <div class="me-7 mb-4">
                                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                        <img src="<?= base_url() . 'uploads/agent/image/' . ($AgentData['photo'] ?? 'default.jpg') ?>"
                                            alt="<?= isset($AgentData['name']) ? ucfirst($AgentData['name']) : 'No Name' ?>" />

                                        <div
                                            class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                                        </div>
                                    </div>

                                </div>
                                <!--end::Pic-->
                                <!--begin::Info-->
                                <div class="flex-grow-1">
                                    <!--begin::Title-->
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                        <!--begin::User-->
                                        <div class="d-flex flex-column">
                                            <!--begin::Name-->
                                            <div class="d-flex align-items-center mb-2">
                                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                                    <?= isset($AgentData['name']) ? ucfirst($AgentData['name']) : "No Name" ?>
                                                </a>


                                                <a href="#">
                                                    <i class="ki-duotone ki-verify fs-1 text-primary">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </a>
                                            </div>
                                            <!--end::Name-->
                                            <!--begin::Info-->
                                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                                <a
                                                    class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                                    <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <!-- </i>Developer</a> -->
                                                    </i>
                                                    <?= isset($AgentData['phone']) ? lcfirst($AgentData['phone']) : "No phone" ?>
                                                    <a
                                                        class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                                        <i class="ki-duotone ki-geolocation fs-4 me-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <?= isset($AgentData['address']) ? lcfirst($AgentData['address']) : "No address" ?>
                                                        </i></a>
                                                    <a
                                                        class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                                        <i class="ki-duotone ki-sms fs-4 me-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <?= isset($AgentData['email']) ? lcfirst($AgentData['email']) : "No Email" ?>
                                                    </a>
                                            </div>

                                        </div>

                                        
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap flex-stack">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column flex-grow-1 pe-8">
                                            <!--begin::Stats-->
                                            <div class="d-flex flex-wrap">
                                                <!-- Agents Count -->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                    <div class="d-flex align-items-center">
                                                        <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"></i>
                                                        <div class="fs-2 fw-bold" data-kt-countup="true"
                                                            data-kt-countup-value="<?= $bookings; ?>">0</div>
                                                    </div>
                                                    <div class="fw-semibold fs-6 text-gray-500">Your Apartment Bookings</div>
                                                </div>

                                                <!-- Users Count -->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                    <div class="d-flex align-items-center">
                                                        <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"></i>
                                                        <div class="fs-2 fw-bold" data-kt-countup="true"
                                                            data-kt-countup-value="<?= $Agentprop; ?>">0</div>
                                                    </div>
                                                    <div class="fw-semibold fs-6 text-gray-500">Properties</div>
                                                </div>

                                                <!-- Properties Count -->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                    <div class="d-flex align-items-center">
                                                        <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"></i>
                                                        <div class="fs-2 fw-bold" 
                                                            ><?= isset($AgentData['paid']) ? $AgentData['paid'] : "" ?></div>
                                                    </div>
                                                    <div class="fw-semibold fs-6 text-gray-500">Payment Status</div>
                                                </div>
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Progress-->
                                        <!-- <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                            <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                                <span class="fw-semibold fs-6 text-gray-500">Profile Compleation</span>
                                                <span class="fw-bold fs-6">50%</span>
                                            </div>
                                            <div class="h-5px mx-3 w-100 bg-light mb-3">
                                                <div class="bg-success rounded h-5px" role="progressbar"
                                                    style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div> -->
                                        <!--end::Progress-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Details-->
                        <br>
                        <br>
                        </div>
                    </div>
                    <!--end::Navbar-->
                    <!--begin::Toolbar-->
                    <div class="tab-content " id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">
                            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                                <!--begin::Card header-->
                                <div class="card-header cursor-pointer">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">Profile Details</h3>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Action-->
                                    <a href="<?= base_url() . 'agent/settings' ?>"
                                        class="btn btn-sm btn-primary align-self-center">Edit Profile</a>
                                    <!--end::Action-->
                                </div>
                                <!--begin::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body p-9">
                                    <!--begin::Row-->
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <span
                                                class="fw-bold fs-6 text-gray-800"><?= isset($AgentData['name']) ? $AgentData['name'] : "" ?>
                                            </span>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Input group-->
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-semibold text-muted">Company</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <span
                                                class="fw-semibold text-gray-800 fs-6"><?= isset($AgentData['company_name']) ? $AgentData['company_name'] : "" ?></span>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-semibold text-muted">Contact Phone
                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Phone number must be active">
                                                <i class="ki-duotone ki-information fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span></label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <span
                                                class="fw-bold fs-6 text-gray-800 me-2"><?= isset($AgentData['phone']) ? $AgentData['phone'] : "" ?></span>

                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-semibold text-muted">Email
                                            <span class="ms-1" data-bs-toggle="tooltip" title=" address must be active">
                                                <i class="ki-duotone ki-information fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span></label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <span
                                                class="fw-bold fs-6 text-gray-800 me-2"><?= isset($AgentData['email']) ? $AgentData['email'] : "" ?></span>
                                            <span class="badge badge-success">Verified</span>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-semibold text-muted">Address
                                            <span class="ms-1" data-bs-toggle="tooltip" title=" address must be active">
                                                <i class="ki-duotone ki-information fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span></label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <span
                                                class="fw-bold fs-6 text-gray-800 me-2"><?= isset($AgentData['address']) ? $AgentData['address'] : "" ?></span>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <!-- <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Course</label>
                                        
                                        <div class="col-lg-8">
                                            <a href="#"
                                                class="fw-semibold fs-6 text-gray-800 text-hover-primary"></?= isset($AgentData['course']) ? $AgentData['course'] : "" ?></a>
                                        </div>
                                    </div> -->
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-semibold text-muted">Country of origin
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                                <i class="ki-duotone ki-information fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span></label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <span
                                                class="fw-bold fs-6 text-gray-800"><?= isset($AgentData['country']) ? $AgentData['country'] : "" ?></span>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                   


                                    <!--end::Notice-->
                                </div>
                                <!--end::Card body-->
                            </div>
                        </div>
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->

            </div>
            <!--end::Modal dialog-->
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>

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
                location.reload();
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

    <?= $this->endSection() ?>