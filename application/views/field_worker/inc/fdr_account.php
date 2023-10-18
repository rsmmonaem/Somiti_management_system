<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">এফডিআর একাউন্ট </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">নতুন এফডিআর একাউন্ট খুলুন</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?= base_url()?>field_worker/fdr_account_list" class="btn btn-primary"><i class="bx bx-arrow-back"></i>এফডিআর একাউন্ট লিস্ট </a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">নতুন এফডিআর একাউন্ট খুলুন
                </h5>
                <hr/>
                <form action="<?= base_url();?>field_worker/save_fdr_account" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row">

                            <div class="d-none">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">অফিসার সিলেক্ট করুন</label>

                                        <select name="" class="form-select single-select-disabled-field readonly-select" id="single-select-disabled-field" data-placeholder="অফিসার সিলেক্ট করুন">
                                            <option></option>
                                            <?php

                                            $user_id = $this->session->userdata('user_id');
                                            ?>
                                            <?php foreach ($officer as $row):?>
                                                <option value="<?= $row->officer_id?>" data-branch="<?= $row->officer_branch_id ?>" <?php if ($row->officer_user_id == $user_id){echo "selected";} ?>><?= $row->officer_id?> - <?= $row->officer_name?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="fdr_branch_id" id="sa_id_branch" value="">

                            <script>
                                $(document).ready(function () {
                                    // When the page loads, set the initial value of sa_id
                                    var selectedLoanId = $("option:selected", "#single-select-disabled-field").data("branch");
                                    $("#sa_id_branch").val(selectedLoanId);

                                    // When an option is selected from the dropdown
                                    $("#single-select-disabled-field").change(function () {
                                        // Get the selected option's loan ID data attribute
                                        var selectedLoanId = $("option:selected", this).data("branch");
                                        $("#sa_id_branch").val(selectedLoanId);
                                    });
                                });
                            </script>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="single-select-field" class="form-label">সদস্য নির্বাচন করুন </label>
                                    <select name="fdr_member_id" class="form-select" id="single-select-field" data-placeholder="সদস্য নির্বাচন করুন">
                                        <option></option>
                                        <?php foreach ($member as $row):?>
                                            <option value="<?= $row->member_id?>"><?= $row->member_id?> - <?= $row->member_name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">এফডিআর রেজিস্টারের তারিখ </label>
                                    <input type="date" class="form-control" id="" name="fdr_register_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">মোট সময় </label>
                                    <select name="fdr_target_year" id="" class="form-select">
                                        <option class="form-control">সিলেক্ট করুন</option>
                                        <option value="1" class="form-control">১ বছর</option>
                                        <option value="2" class="form-control">২ বছর</option>
                                        <option value="3" class="form-control">৩ বছর</option>
                                        <option value="4" class="form-control">৪ বছর</option>
                                        <option value="5" class="form-control">৫ বছর</option>
                                        <option value="6" class="form-control">৬ বছর</option>
                                        <option value="7" class="form-control">৭ বছর</option>
                                        <option value="8" class="form-control">৮ বছর</option>
                                        <option value="9" class="form-control">৯ বছর</option>
                                        <option value="10" class="form-control">১০ বছর</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">মুল টাকা </label>
                                    <input type="number" name="fdr_amount" class="form-control" id="amount" value="" placeholder="Example: 100000">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">ইন্টারেস্ট </label>
                                    <input type="text" name="fdr_interest" class="form-control" id="interest" placeholder="৮.৮০ %">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Status</label>
                                    <select name="fdr_status" id="" class="form-select">
                                        <option class="form-select">Select</option>
                                        <option value="1" class="form-control">Active</option>
                                        <option value="2" class="form-control">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="result" class="text-success"></div>
                        <input type="hidden" id="fdr_interest_amount" name="fdr_interest_amount">
                        <div class="col-md-6">
                            <div class=" mb-3">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

<input type="hidden" name="fdr_total_amount" id="fdr_total_amount">
<input type="hidden" name="fdr_monthly_interest" id="fdr_monthly_interest">
<input type="hidden" name="fdr_yearly_interest" id="fdr_yearly_interest">



















        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--        <script>-->
<!--            $(document).ready(function () {-->
<!--                function calculate() {-->
<!--                    var principal = parseFloat($("#amount").val());-->
<!--                    var interestRate = parseFloat($("#interest").val().replace(/[^0-9.]/g, '')) / 100; // Remove non-numeric characters and convert to percentage-->
<!--                    var interest = principal * interestRate;-->
<!--                    var totalAmount = principal ;-->
<!--                    var annualInterest = (interest * 12).toFixed(2);-->
<!--                    $("#result").html("<h5 class='text-success'>মোট টাকা: " + totalAmount + " টাকা</h5><h5 class='text-success'>মাসিক ইন্টারেস্ট: " + interest.toFixed(2) + " টাকা</h5><h5 class='text-success'>বাৎসরিক ইন্টারেস্ট: " + annualInterest + " টাকা</h5>");-->
<!--                    $("#fdr_interest_amount").val(interest.toFixed(2));-->
<!--                    $("#fdr_total_amount").val(totalAmount.toFixed(2));-->
<!--                }-->
<!--                $("#amount, #interest").on("input", function () {-->
<!--                    calculate(); -->
<!--                });-->
<!--                calculate();-->
<!--            });-->
<!--        </script>-->
        <script>
            $(document).ready(function () {
                function calculate() {
                    var principal = parseFloat($("#amount").val());
                    var interestRate = parseFloat($("#interest").val().replace(/[^0-9.]/g, '')) / 100;
                    var interest = principal * interestRate;

                    // Check for NaN and replace with 0
                    if (isNaN(principal)) {
                        principal = 0;
                    }
                    if (isNaN(interest)) {
                        interest = 0;
                    }

                    var totalAmount = principal;
                    var annualInterest = (interest * 12).toFixed(2);
                    $("#result").html("<h5 class='text-success'>মোট টাকা: " + totalAmount.toFixed(2) + " টাকা</h5><h5 class='text-success'>মাসিক ইন্টারেস্ট: " + interest.toFixed(2) + " টাকা</h5><h5 class='text-success'>বাৎসরিক ইন্টারেস্ট: " + annualInterest + " টাকা</h5>");
                    $("#fdr_interest_amount").val(interest.toFixed(2));
                    $("#fdr_total_amount").val(totalAmount.toFixed(2));
                }
                $("#amount, #interest").on("input", function () {
                    calculate();
                });
                calculate();
            });
        </script>








