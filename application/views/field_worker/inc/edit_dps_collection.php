<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ডিপিএস কালেকশন</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">আপডেট ডিপিএস সংগ্রহ</li>
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
                <h5 class="card-title">নতুন জমা করুন</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>field_worker/dps_collection_list" class="btn btn-primary"><i class="bx bx-left-arrow"></i> ডিপিএস কালেকশন লিস্ট </a>

                </div>
            </div>
            <div class="card-body p-4">

                <form action="<?= base_url();?>field_worker/update_dps_collection/<?= $data->dps_col_id?>" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="single-select-field" class="form-label">সদস্য নির্বাচন করুন</label>
                                    <select name="dps_col_account_id" class="form-select" id="single-select-field" data-placeholder="সদস্য নির্বাচন করুন" required>
                                        <option></option>
                                        <?php foreach ($fdr_account as $row): ?>
                                            <option value="<?= $row->dps_acc_id ?>" data-amount="<?= $row->dps_acc_amount ?>" data-member="<?= $row->member_id ?>"
                                                <?php if ($data->dps_col_account_id == $row->dps_acc_id){echo "selected"; }?> > <?= $row->dps_acc_id ?> - <?= $row->member_name ?> </option>

                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="dps_col_member_id" id="member_id" value="<?php echo $data->dps_col_member_id ?>">


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">সঞ্চয় জমা করার তারিখ </label>
                                    <input type="date" class="form-control" id="inputProductTitle" name="dps_col_collect_date" required value="<?php echo $data->dps_col_collect_date ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">সঞ্চয় জমা পদ্ধতি<label class="text-danger"> *</label></label>
                                    <select class="form-select" name="dps_col_payment_type" required>
                                        <option>সিলেক্ট করুন</option>
                                        <option value="1" <?php if ($data->dps_col_payment_type == 1){echo "selected";}?>>ক্যাশ</option>
                                        <option value="2" <?php if ($data->dps_col_payment_type == 2){echo "selected";}?>>চেক</option>
                                        <option value="3" <?php if ($data->dps_col_payment_type == 3){echo "selected";}?>>অন্যান্য</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">পরিমাণ </label>
                                    <input type="number" class="form-control" id="dps_amount" placeholder="১০০০" name="dps_col_amount" required value="<?=$data->dps_col_amount?>">
                                <small>Before amount is 500BDT and new updated amount is 300, So please give Updated amount is 800BDT Taka</small>
                                </div>
                            </div>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function () {
                                    // Listen for the change event on the dropdown
                                    $('#single-select-field').change(function () {
                                        // Get the selected option's data-amount attribute
                                        var selectedOption = $(this).find(':selected');
                                        var amount = selectedOption.data('amount');
                                        var member = selectedOption.data('member');

                                        // Set the amount in the input field
                                        $('#dps_amount').val(amount);
                                        $('#member_id').val(member);
                                    });
                                });
                            </script>


                            <div class="col-md-6">
                                <div class="mt-2 mb-3">
                                    <input type="submit" value="সেভ করুন" class="btn btn-primary">
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>

            </div>
        </div>

