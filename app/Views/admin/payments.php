<!--begin::Main-->
<?= $this->extend('agent/user_default') ?>
<?= $this->section('content') ?>
<!--begin::Wrapper-->
<title> - Portal</title>

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
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
                            Payment History</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <!--end::Item-->
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Payment History</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->

                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Products-->
                    <div class="card card-flush">
                        <!--begin::Card header-->
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" data-kt-ecommerce-product-filter="search"
                                        class="form-control form-control-solid w-250px ps-12"
                                        placeholder="Search History" />
                                </div>
                                <!--end::Search-->
                            </div>

                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5"
                                id="kt_ecommerce_products_table">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">

                                        <!-- <th class="min-w-20px">ID</th> -->
                                        <th class="min-w-120px">Payment Date</th>
                                        <th class="text-start min-w-100px">Agent Name</th>
                                        <th class="text-start min-w-100px">email</th>
                                        <th class="text-start min-w-100px">Channel</th>
                                        <th class="text-start min-w-110px"> Amount</th>
                                        <th class="text-start min-w-120px"> Payment ref</th>
                                        <th class="text-start min-w-50px"> Status</th>
                                        <!-- <th class="text-start min-w-70px"> Expiration</th> -->
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    <?php if (isset($payments) && is_array($payments)) : ?>
                                    <?php foreach ($payments as $data) : ?>
                                    <tr>

                                        <td class="text-start pe-0">
                                            <span class="fw-bold">
                                                <?= isset($data['payment_date']) ? $data['payment_date'] : ''  ?>
                                            </span>
                                        </td>
                                        <td class="text-start pe-0">
                                            <span class="fw-bold">
                                                <?= isset($data['name']) ? $data['name'] : ''  ?>

                                            </span>
                                        </td>
                                        <td class="text-start pe-0">
                                            <span class="fw-bold">
                                                <?= isset($data['email']) ? $data['email'] : ''  ?>
                                            </span>
                                        </td>
                                        <td class="text-start pe-0">
                                            <span class="fw-bold">
                                                <?= isset($data['gateway']) ? $data['gateway'] : ''  ?>
                                            </span>
                                        </td>
                                        <td class="text-start pe-0">
                                            <span class="fw-bold">
                                                <?= isset($data['amount']) ? number_format($data['amount'], 2) : ''  ?>
                                            </span>
                                        </td>
                                        <td class="text-start pe-0">
                                            <span class="fw-bold">
                                                <?= isset($data['payment_reference']) ? $data['payment_reference'] : ''  ?>
                                            </span>
                                        </td>
                                 
                                        <td class="text-start pe-0">
                                            <span class="badge badge-success fw-bold">
                                                <?= isset($data['status']) ? $data['status'] : ''  ?>
                                            </span>
                                        </td>
                                    
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Products-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->

    </div>
</div>
<!--end::Wrapper-->
<?= $this->endSection() ?>