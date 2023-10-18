<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ডিপিএস একাউন্ট </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">নতুন ডিপিএস একাউন্ট খুলুন</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title">নতুন ডিপিএস একাউন্ট খুলুন</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>field_worker/dps_account_list" class="btn btn-primary"><i class="bx bx-arrow-back"></i>ডিপিএস একাউন্ট লিস্ট </a>

                </div>
            </div>
            <div class="card-body p-4">

                <form action="<?= base_url();?>field_worker/save_dps_account" method="post" enctype="multipart/form-data">
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

                            <input type="hidden" name="dps_acc_branch_id" id="sa_id_branch" value="">

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
                                    <select name="dps_acc_member_id" class="form-select" id="single-select-field" data-placeholder="সদস্য নির্বাচন করুন">
                                        <option></option>
                                        <?php foreach ($member as $row):?>
                                            <option value="<?= $row->member_id?>"><?= $row->member_id?> - <?= $row->member_name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="single-select-field-a" class="form-label">ডিপিএস প্লান সিলেক্ট করুন</label>
                                    <select class="form-select" id="single-select-field-a" data-placeholder="ডিপিএস প্লান সিলেক্ট করুন" name="dps_acc_plan_id">
                                        <option></option>
                                        <?php foreach ($dps as $row):?>
                                            <option value="<?= $row->dps_plan_id ?>"><?= $row->dps_plan_name?>
                                                - <?= $row->dps_plan_installment ?> টা কিস্তি (<?= $row->dps_plan_amount ?> টাকা
                                                <?php if ($row->dps_plan_pay_type == 1 ){echo "মাসিক";}elseif ($row->dps_plan_pay_type == 2){echo "সাপ্তাহিক";}?>)
                                            </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">আসল টাকা </label>
                                    <input type="number" name="dps_acc_amount" class="form-control" id="main_amount" value="" placeholder="Example: 100000">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label"> মোট জমার পরিমাণ </label>
                                    <input type="number" name="dps_acc_main_amount" class="form-control" id="main_amount_give" value="" placeholder="Example: 100000">
                                </div>
                            </div>

							<div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">মুনাফা সহ আসল টাকা </label>
                                    <input type="number" name="dps_acc_total_amount" class="form-control" id="interest_with_main_amount" value="" placeholder="Example: 100000">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="form-label"> মোট কিস্তি</label>
                                    <input type="number" name="dps_acc_installment" class="form-control" id="dps_acc_installment" value="" placeholder="Example: 12">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label">ডিপিএস রেজিস্টারের তারিখ </label>
                                    <input type="date" class="form-control" id=" " name="dps_acc_reg_date">
                                </div>
                            </div>

<!--                            <div class="col-md-3">-->
<!--                                <div class="mb-3">-->
<!--                                    <label for="" class="form-label">কিস্তি আদায়ের তারিখ </label>-->
<!--                                    <input type="date" class="form-control" id="" name="dps_acc_pmt_date">-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">Status</label>
                                    <select name="dps_acc_status" id="" class="form-select">
                                        <option class="form-control">Select</option>
                                        <option value="1" class="form-control">Active</option>
                                        <option value="2" class="form-control">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                            <br>
                            <div class="col-md-6">
                                <div class=" mb-3">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </div>

                      <!--end row-->
                    </div>
                </form>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Handle change event of the dropdown
                $('#single-select-field-a').change(function() {
                    // Get the selected DPS plan ID
                    var dpsPlanId = $(this).val();
                    // Perform an AJAX request to fetch the DPS plan amount
                    $.ajax({
                        url: '<?= base_url()?>field_worker/get_dps_plan_amount', // Update with your controller method URL
                        type: 'POST',
                        data: {dps_plan_id: dpsPlanId},
                        dataType: 'json',
                        success: function(response) {
                            // Update the main_amount input field with the received amount
                            $('#interest_with_main_amount').val(response.dps_plan_total_amount);
							$('#main_amount').val(response.dps_plan_amount);
							$('#main_amount_give').val(response.dps_plan_main_amount);
							$('#dps_acc_installment').val(response.dps_plan_installment);
                        },
                        error: function() {
                            // Handle error if necessary
                        }
                    });
                });
            });

        </script>
