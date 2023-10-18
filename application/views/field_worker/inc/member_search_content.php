<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">সদস্য</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">সদস্য খুজুন</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-md-12 mx-auto">

                <h6 class="mb-0 text-uppercase">সদস্য খুজুন</h6>
                <hr/>
                <div class="card">
                    <div class="card-body">

                        <div class="mb-4">
                            <label for="single-select-field" class="form-label">মেম্বার খুজুন</label>
                            <select class="form-select" id="single-select-field" data-placeholder="সদস্য সিলেক্ট করুন">
                                <option></option>
                                <?php foreach ($data as $row):?>
                                    <option value="<?= base_url()?>field_worker/member_profile/<?= $row->member_id?>"><?= $row->member_name?> - <?= $row->member_phone?></option>

                                <?php endforeach; ?>
                            </select>
                            <input type="submit" value="খুজুন" id="goButton" class="btn btn-success mt-2">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script>
            // Get the select element and the button
            const linkSelect = document.getElementById("single-select-field");
            const goButton = document.getElementById("goButton");

            // Add an event listener to the button
            goButton.addEventListener("click", function () {
                // Get the selected option's value
                const selectedValue = linkSelect.value;

                // Check if a link has been selected (value is not empty)
                if (selectedValue) {
                    // Navigate to the selected link
                    window.location.href = selectedValue;
                }
            });
        </script>

