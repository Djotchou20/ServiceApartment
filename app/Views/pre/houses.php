<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
.property-item {
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 15px;
}

/* .property-item-wrapper {
            transition: opacity 0.9s ease-in-out;
        }

        .hidden {
            opacity: 0;
            height: 0;
            padding: 0;
            margin: 0;
            overflow: hidden;
        } */
</style>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Apartment Listing</h1>
                    <p>Explore our diverse range of apartment options in our listings,
                        tailored to your preferences and lifestyle.
                        Find your perfect home with Service Apartment today.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <li class="nav-item me-2">
                        <button class="btn btn-outline-primary active" data-type="featured">Featured</button>
                    </li>
                    <!-- <li class="nav-item me-2">
                            <button class="btn btn-outline-primary" data-type="rent">For Rent</button>
                        </li>
                        <li class="nav-item me-0">
                            <button class="btn btn-outline-primary" data-type="lease">For Lease</button>
                        </li> -->
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4" id="apartment-list">
                    <?php if (!empty($apartment)) : ?>
                    <?php foreach ($apartment as $apartments) : ?>
                    <?php if ($apartments['visibility'] === 'visible' && $apartments['agent_paid'] === 'PAID') : ?>
                    <div class="col-lg-4 col-md-6 property-item-wrapper"
                        data-type="<?= strtolower($apartments['type']) ?>">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <?php if (!empty($apartments['thumbnail'])) : ?>
                                <a href="<?= base_url() ?>view/apartment/<?= $apartments['prop_url']?> "><img
                                        class="img-fluid" src="<?= base_url() ?><?= $apartments['thumbnail']?> "
                                        alt="invalid image"></a>
                                <?php else : ?>
                                <p>No image available</p>
                                <?php endif; ?>
                                <?php if (!empty($apartments['type'])) : ?>
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    <?= $apartments['type'] ?></div>
                                <?php else : ?>
                                <p>No type available</p>
                                <?php endif; ?>
                                <?php if (!empty($apartments['status'])) : ?>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"
                                    style="font-weight: bold;"><?= $apartments['status'] ?></div>
                                <?php else : ?>
                                <p>No status available</p>
                                <?php endif; ?>
                            </div>
                            <div class="p-4 pb-0">
                                <?php if (!empty($apartments['price'])) : ?>
                                <h5 class="text-primary mb-3">
                                    &#8358;<?= number_format($apartments['price'], 2, '.', ',') ?></h5>
                                <?php endif; ?>
                                <?php if (!empty($apartments['title'])) : ?>
                                <a class="d-block h5 mb-2"
                                    href="<?= base_url() ?>view/apartment/<?= $apartments['prop_url']?> "><?= $apartments['title'] ?></a>
                                <?php endif; ?>
                                <?php if (!empty($apartments['location'])) : ?>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?= $apartments['location'] ?>
                                </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php else : ?>
                    <!-- <p></p> -->
                    <div class="col-12 text-center">
    <a class="btn btn-primary py-3 px-5" href="<?php echo base_url()?>apartment">No Apartments Available. Click To Browse More Apartment</a>
</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    // Initial filter to show all apartments
    filterApartments('featured');

    $('.nav-pills button').on('click', function() {
        $('.nav-pills button').removeClass('active');
        $(this).addClass('active');
        var type = $(this).data('type');
        filterApartments(type);
    });

    function filterApartments(type) {
        $('#apartment-list .property-item-wrapper').each(function() {
            var apartmentType = $(this).data('type');
            if (type === 'featured') {
                $(this).show();
            } else if (apartmentType === type) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
});
</script>