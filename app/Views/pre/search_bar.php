<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- application/Views/search_bar.php -->
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <form action="<?= base_url('properties/search') ?>" method="GET">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" name="bedrooms" class="form-control border-0 py-3" placeholder="Number of Bedrooms">
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0 py-3" name="type">
                                <option value="">Type</option>
                                <option value="Shortlet">Shortlet</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="location" class="form-control border-0 py-3" placeholder="Location">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark border-0 w-100 py-3">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Include Select2 Library -->
<script>
    $(document).ready(function() {
        $('#propertyType').select2({
            placeholder: "Select a Property Type",
            allowClear: true
        });
        $('#location').select2({
            placeholder: "Select a Location",
            allowClear: true
        });
    });
</script>