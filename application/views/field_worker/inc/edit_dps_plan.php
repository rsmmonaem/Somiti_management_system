<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ডিপিএস প্লান</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">আপডেট ডিপিএস প্লান</li>
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
                <h5 class="card-title">নতুন ডিপিএস প্লান</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>field_worker/dps_plan_list" class="btn btn-primary"><i class="bx bx-left-arrow"></i>  ডিপিএস প্লান লিস্ট </a>

                </div>
            </div>
            <div class="card-body p-4">
                <hr/>
                <form action="<?= base_url()?>field_worker/update_dps_plan" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="dps_plan_id" value="<?= $data->dps_plan_id?>">
                    <div class="row form-body mt-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label"> ডিপিএস প্লানের নাম <label class="text-danger"> *</label></label>
                                <input type="text" name="dps_plan_name" class="form-control" id="name" placeholder=" ডিপিএস প্লানের নাম " value="<?= $data->dps_plan_name?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label"> মোট কিস্তি <label class="text-danger"> *</label></label>
                                <input type="number" name="dps_plan_installment" value="<?= $data->dps_plan_installment?>" class="form-control" id="per_installment" placeholder=" মোট কিস্তি ">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label"> টাকার পরিমাণ <label class="text-danger"> * </label></label>
                                <input type="number" name="dps_plan_amount" class="form-control" id="total_installment" placeholder="৫০০" value="<?= $data->dps_plan_amount?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label"> সুদের হার %</label>
                                <input type="number" name="dps_plan_interest" class="form-control" id="interest_rate" placeholder=" ৭ %" value="<?= $data->dps_plan_interest?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label"> মোট পরিমান:</label>
                                <input type="text" id="total_amount_hidden" class="form-control"  name="dps_plan_total_amount" value="<?= $data->dps_plan_total_amount?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">ছবি</label>
                                        <input type="file" name="dps_plan_image" class="form-control" id="interest_rate">
                                        <input type="hidden" name="old_image" value="<?=$data->dps_plan_image?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">ছবি</label>
                                        <br>
                                        <img src="<?= base_url()?>uploads/dps_plan/<?=$data->dps_plan_image?>" alt="" width="200px">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="" class="form-label">টাকা প্রদান </label>
                                <select name="dps_plan_pay_type" id="" class="form-select">
                                    <option>সিলেক্ট করুন</option>
                                    <option value="1" <?php if ($data->dps_plan_pay_type == 1){echo "selected";}?> >মাসিক</option>
                                    <option value="2" <?php if ($data->dps_plan_pay_type == 2){echo "selected";}?>>সাপ্তাহিক</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label>
                                <select name="dps_plan_status" id="" class="form-select">
                                    <option class="form-control">Select</option>
                                    <option value="1" class="form-control" <?php if ($data->dps_plan_status == 1){echo "selected";}?>>Active</option>
                                    <option value="2" class="form-control" <?php if ($data->dps_plan_status == 2){echo "selected";}?>>Draft/Inactive</option>
                                </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="deposit-amount">

                                    <h2 class="text-center text-success">
                                        <input type="hidden" name="" value="print also value here">
                                        মোট পরিমান: <span></span>

                                    </h2>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mt-2 mb-3">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            (function ($) {
                "use strict";

                $('#per_installment, #total_installment, #interest_rate').on('input', (e) => {
                    let perInstallment      = Number($('#per_installment').val());
                    let totalInstallment    = Number($('#total_installment').val());
                    let interestRate        = Number($('#interest_rate').val());

                    let totalAmount         = perInstallment * totalInstallment;
                    let interest            = totalAmount * interestRate / 100;

                    if(perInstallment && totalInstallment && interestRate){
                        $('.deposit-amount span').text(totalAmount + interest);
                        $('#total_amount_hidden').val(totalAmount + interest); // Update the hidden input
                        $('.deposit-amount').removeClass('d-none');
                    }
                });

            })(jQuery);
        </script>
