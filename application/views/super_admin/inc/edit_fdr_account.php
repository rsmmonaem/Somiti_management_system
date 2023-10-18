<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">এফডিআর একাউন্ট </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">আপডেট এফডিআর একাউন্ট</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?= base_url()?>account_admin/fdr_account_list" class="btn btn-primary"><i class="bx bx-arrow-back"></i>এফডিআর একাউন্ট লিস্ট </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">আপডেট এফডিআর একাউন্ট
                </h5>
                <hr/>
                <form action="<?= base_url();?>account_admin/update_fdr/<?= $data->fdr_id?>" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row">
                            <input type="hidden" name="fdr_id" value="<?= $data->fdr_id?>">

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="single-select-field" class="form-label">সদস্য নির্বাচন করুন </label>
                                    <select name="fdr_member_id" class="form-select" id="single-select-field" data-placeholder="সদস্য নির্বাচন করুন">
                                        <option></option>
                                        <?php foreach ($member as $row):?>
                                            <option value="<?= $row->member_id?>" <?php if ($row->member_id == $data->fdr_member_id){echo "selected";}?>><?= $row->member_id?> - <?= $row->member_name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">এফডিআর রেজিস্টারের তারিখ </label>
                                    <input type="date" class="form-control" id="" name="fdr_register_date" value="<?= $data->fdr_register_date?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">মোট সময় </label>
                                    <select name="fdr_target_year" id="" class="form-select">
                                        <option class="form-control">সিলেক্ট করুন</option>
                                        <option <?php if ($data->fdr_target_year == 1){echo "selected";}?> value="1" class="form-control">১ বছর</option>
                                        <option <?php if ($data->fdr_target_year == 2){echo "selected";}?> value="2" class="form-control">২ বছর</option>
                                        <option <?php if ($data->fdr_target_year == 3){echo "selected";}?> value="3" class="form-control">৩ বছর</option>
                                        <option <?php if ($data->fdr_target_year == 4){echo "selected";}?> value="4" class="form-control">৪ বছর</option>
                                        <option <?php if ($data->fdr_target_year == 5){echo "selected";}?> value="5" class="form-control">৫ বছর</option>
                                        <option <?php if ($data->fdr_target_year == 6){echo "selected";}?> value="6" class="form-control">৬ বছর</option>
                                        <option <?php if ($data->fdr_target_year == 7){echo "selected";}?> value="7" class="form-control">৭ বছর</option>
                                        <option <?php if ($data->fdr_target_year == 8){echo "selected";}?> value="8" class="form-control">৮ বছর</option>
                                        <option <?php if ($data->fdr_target_year == 9){echo "selected";}?> value="9" class="form-control">৯ বছর</option>
                                        <option <?php if ($data->fdr_target_year == 10){echo "selected";}?> value="10" class="form-control">১০ বছর</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">মুল টাকা </label>
                                    <input type="number" name="fdr_amount" class="form-control" id="amount" value="<?= $data->fdr_amount ?>" placeholder="Example: 100000" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">ইন্টারেস্ট </label>
                                    <input type="text" name="fdr_interest" class="form-control" id="interest" value="<?= $data->fdr_interest ?>" placeholder="৮.৮০ %">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Status</label>
                                    <select name="fdr_status" id="" class="form-select">
                                        <option class="form-select">Select</option>
                                        <option value="1" class="form-control" <?php if ($data->fdr_status == 1){echo "selected";}?>>Active</option>
                                        <option value="2" class="form-control" <?php if ($data->fdr_status == 2){echo "selected";}?>>Inactive</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div id="result" class="text-success"></div>

                        <input type="hidden" id="fdr_interest_amount" name="fdr_interest_amount" >


                        <div class="col-md-6">
                            <div class=" mb-3">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </div>

                        <!--end row-->
                    </div>
                </form>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function () {
                // Function to calculate amount and interest
                function calculate() {
                    // Get the values from input fields
                    var principal = parseFloat($("#amount").val());
                    var interestRate = parseFloat($("#interest").val().replace(/[^0-9.]/g, '')) / 100; // Remove non-numeric characters and convert to percentage

                    // Perform the calculation
                    var interest = principal * interestRate;
                    var totalAmount = principal ;

                    // Calculate annual interest by multiplying monthly interest by 12
                    var annualInterest = (interest * 12).toFixed(2);

                    // Update the result
                    $("#result").html("<h5 class='text-success'>মোট টাকা: " + totalAmount + " টাকা</h5><h5 class='text-success'>মাসিক ইন্টারেস্ট: " + interest.toFixed(2) + " টাকা</h5><h5 class='text-success'>বাৎসরিক ইন্টারেস্ট: " + annualInterest + " টাকা</h5>");

                    // Update the hidden input fields with the calculated values
                    $("#fdr_interest_amount").val(interest.toFixed(2));
                    $("#fdr_total_amount").val(totalAmount.toFixed(2));
                }

                // Listen for changes in input fields
                $("#amount, #interest").on("input", function () {
                    calculate(); // Recalculate when the input changes
                });

                // Initial calculation when the page loads
                calculate();
            });
        </script>


