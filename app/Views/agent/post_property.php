<!--begin::Main-->
<?= $this->extend('agent/user_default') ?>
<?= $this->section('content') ?>
<!--begin::Wrapper-->
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

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
                            Post Property</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="index.html" class="text-muted text-hover-primary">User</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Post</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->

                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Navbar-->

                    <!--end::Navbar-->
                    <!--begin::Basic info-->
                    <div class="card mb-5 mb-xl-10">
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                            data-bs-target="#kt_account_profile_details" aria-expanded="true"
                            aria-controls="kt_account_profile_details">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Post Details</h3>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card header-->
                        <!--begin::Content-->
                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <!--begin::Form-->
                            <?php if (session()->has('errors')): ?>
                            <div class="alert alert-danger">
                                <?php foreach (session('errors') as $error): ?>
                                <p><?= esc($error) ?></p>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <form action="<?= site_url('properties/store') ?>" method="post"
                                enctype="multipart/form-data" class="form">
                                <div class="card-body border-top p-9">
                                    <!-- <input type="text" name="user_id " value=""> -->
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Title</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="title" required
                                                class="form-control form-control-lg form-control-solid">
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label
                                            class="col-lg-4 col-form-label required fw-semibold fs-6">Description</label>
                                        <div class="col-lg-8">
                                            <textarea name="description" required
                                                class="form-control form-control-lg form-control-solid"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label
                                            class="col-lg-4 col-form-label required fw-semibold fs-6">Category</label>
                                        <div class="col-lg-8">
                                            <select name="category_id" required
                                                class="form-select form-select-solid form-select-lg fw-semibold">
                                                <option value="">Select Category</option>
                                                <?php foreach ($categories as $category): ?>
                                                <option value="<?= $category['id'] ?>"><?= esc($category['name']) ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label
                                            class="col-lg-4 col-form-label required fw-semibold fs-6">Location</label>
                                        <div class="col-lg-8">
                                            <select name="location_id" required
                                                class="form-select form-select-solid form-select-lg fw-semibold">
                                                <option value="">Select Location</option>
                                                <?php foreach ($locations as $location): ?>
                                                <option value="<?= $location['id'] ?>"><?= esc($location['city']) ?>,
                                                    <?= esc($location['state']) ?>, <?= esc($location['country']) ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Price</label>
                                        <div class="col-lg-8">
                                            <input type="number" name="price" required
                                                class="form-control form-control-lg form-control-solid">
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label
                                            class="col-lg-4 col-form-label required fw-semibold fs-6">Bedrooms</label>
                                        <div class="col-lg-8">
                                            <input type="number" name="bedrooms" required
                                                class="form-control form-control-lg form-control-solid">
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label
                                            class="col-lg-4 col-form-label required fw-semibold fs-6">Bathrooms</label>
                                        <div class="col-lg-8">
                                            <input type="number" name="bathrooms" required
                                                class="form-control form-control-lg form-control-solid">
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Area
                                            (sqm)</label>
                                        <div class="col-lg-8">
                                            <input type="number" name="area" required
                                                class="form-control form-control-lg form-control-solid">
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Status</label>
                                        <div class="col-lg-8">
                                            <select name="status" required
                                                class="form-select form-select-solid form-select-lg fw-semibold">
                                                <option value="available">Available</option>
                                                <option value="sold">Sold</option>
                                                <option value="rented">Rented</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Upload
                                            Images</label>
                                        <div class="col-lg-8">
                                            <input type="file" name="images[]" multiple
                                                class="form-control form-control-lg form-control-solid">
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Features</label>
                                        <div class="col-lg-8">
                                            <select name="features[]" multiple
                                                class="form-select form-select-solid form-select-lg fw-semibold">
                                                <?php foreach ($features as $feature): ?>
                                                <option value="<?= $feature['id'] ?>"><?= esc($feature['name']) ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="form-text">Select multiple features if applicable.</div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset"
                                        class="btn btn-light btn-active-light-primary me-2">Reset</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Basic info-->

                    <!--end::Content-->


                    <div class="d-flex justify-content-start">
                        <!--begin::Button-->
                        <a href="<?= base_url() ?>profile/student/details" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-primary me-5">Back to profile</a>
                        <!--end::Button-->

                    </div>
                    <!--end::Sign-in Method-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->
</div>
<!--end::Wrapper-->
<!-- </?= view('/pre/footer_script') ?> -->
<!--begin::Custom Javascript(used for this page only)-->
<script src="<?= base_url() ?>assetss/js/custom/account/settings/signin-methods.js"></script>
<script src="<?= base_url() ?>assetss/js/custom/account/settings/profile-details.js"></script>
<script src="<?= base_url() ?>assetss/js/custom/account/settings/deactivate-account.js"></script>
<script src="<?= base_url() ?>assetss/js/custom/pages/user-profile/general.js"></script>
<script src="<?= base_url() ?>assetss/js/widgets.bundle.js"></script>
<script src="<?= base_url() ?>assetss/js/custom/widgets.js"></script>
<script src="<?= base_url() ?>assetss/js/custom/apps/chat/chat.js"></script>
<script src="<?= base_url() ?>assetss/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="<?= base_url() ?>assetss/js/custom/utilities/modals/create-app.js"></script>
<script src="<?= base_url() ?>assetss/js/custom/utilities/modals/offer-a-deal/type.js"></script>
<script src="<?= base_url() ?>assetss/js/custom/utilities/modals/offer-a-deal/details.js"></script>
<script src="<?= base_url() ?>assetss/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
<script src="<?= base_url() ?>assetss/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
<script src="<?= base_url() ?>assetss/js/custom/utilities/modals/offer-a-deal/main.js"></script>
<script src="<?= base_url() ?>assetss/js/custom/utilities/modals/two-factor-authentication.js"></script>
<script src="<?= base_url() ?>assetss/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<script>
document.querySelector('form').addEventListener('submit', function(event) {
    const dobInput = document.getElementById('dob').value;
    if (!dobInput) {
        alert('Please enter your Date of Birth.');
        event.preventDefault();
        return;
    }

    const dob = new Date(dobInput);
    const today = new Date();
    const age = today.getFullYear() - dob.getFullYear();
    const monthDiff = today.getMonth() - dob.getMonth();
    const dayDiff = today.getDate() - dob.getDate();

    if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
        age--;
    }

    if (age < 18) {
        alert('You must be at least 18 years old.');
        event.preventDefault();
    }
});
</script>
<script>
new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_localization"), {
    localization: {
        locale: "en",
        startOfTheWeek: 1,
        format: "dd/MM/yyyy"
    }
});
</script>
<?= $this->endSection() ?>