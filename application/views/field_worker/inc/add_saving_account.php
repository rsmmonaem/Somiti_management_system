<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">সঞ্চয় হিসাব</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">নতুন সঞ্চয় হিসাব
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title">নতুন সঞ্চয় হিসাব</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>field_worker/saving_account_list" class="btn btn-primary">
                        <i class="bx bx-arrow-back"></i> সঞ্চয় হিসাব লিস্ট </a>
                </div>
            </div>
            <div class="card-body p-4">

                <form action="<?= (!isset($data) ? base_url() . 'field_worker/save_account' : base_url() . 'field_worker/update_saving_account') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">

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

                            <input type="hidden" name="sa_branch_id" id="sa_id" value="">

                            <script>
                                $(document).ready(function () {
                                    // When the page loads, set the initial value of sa_id
                                    var selectedLoanId = $("option:selected", "#single-select-disabled-field").data("branch");
                                    $("#sa_id").val(selectedLoanId);

                                    // When an option is selected from the dropdown
                                    $("#single-select-disabled-field").change(function () {
                                        // Get the selected option's loan ID data attribute
                                        var selectedLoanId = $("option:selected", this).data("branch");
                                        $("#sa_id").val(selectedLoanId);
                                    });
                                });
                            </script>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label"> সদস্য নির্বাচন <label class="text-danger"> *</label></label>
                                    <select name="sa_member_id" class="form-select" id="single-select-field" data-placeholder="সদস্য নির্বাচন করুন">
                                        <option></option>
                                        <?php foreach ($member as $row):?>
                                            <option value="<?= $row->member_id?>"

											<?php
											if (isset($data->sa_member_id)) {
												if ($data->sa_member_id==$row->member_id) {
													echo "selected";
												}

											}
											?>
											>
											<?= $row->member_id?> - <?= $row->member_name?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">সঞ্চয়ের ধরন নির্বাচন করুন<label class="text-danger"> *</label></label>
                                    <select name="sa_plan_id" class="form-select" id="single-select-field-a" data-placeholder="সঞ্চয়ের স্কিম প্লান নির্বাচন করুন">
                                        <option></option>
                                        <?php foreach ($plan as $row):?>
                                            <option value="<?= $row->saving_plan_id ?>"

											<?php
											if (isset($data->sa_plan_id)) {

												if ($data->sa_plan_id==$row->saving_plan_id) {
													echo "selected";



												}
											}
											?>

											><?= $row->saving_plan_id?> - <?= $row->saving_plan_name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
<?php
							if(isset($data->sa_id)){

								echo "<input type='hidden' name='sa_id' value='" . $data->sa_id . "'>";
							}
?>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">কিস্তির সময়সূচী <label class="text-danger"> *</label></label>
                                    <select name="sa_time_daywise" id="" class="form-select">
                                        <option>সিলেক্ট করুন</option>
                                        <option value="1">দিনভিত্তিক</option>
                                        <option value="2">সাপ্তাহিক</option>
                                        <option value="3 ">মাসিক</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">মোট সময় ( সঞ্চয় মেয়াদ )<label class="text-danger"> *</label></label>
                                    <select name="sa_total_year" id="" class="form-control">
                                        <option  class="form-control">সিলেক্ট করুন</option>
                                        <option value="1" class="form-control" <?php if (isset($data->sa_total_year)) {if ($data->sa_total_year==1) {echo "selected";}}?>>১ বছর </option>
                                        <option value="2" class="form-control" <?php if (isset($data->sa_total_year)) {if ($data->sa_total_year==2) {echo "selected";}}?>>২ বছর </option>
                                        <option value="3" class="form-control" <?php if (isset($data->sa_total_year)) {if ($data->sa_total_year==3) {echo "selected";}}?>>৩ বছর </option>
                                        <option value="4" class="form-control" <?php if (isset($data->sa_total_year)) {if ($data->sa_total_year==4) {echo "selected";}}?>>৪ বছর </option>
                                        <option value="5" class="form-control" <?php if (isset($data->sa_total_year)) {if ($data->sa_total_year==5) {echo "selected";}}?>>৫ বছর </option>
                                        <option value="6" class="form-control" <?php if (isset($data->sa_total_year)) {if ($data->sa_total_year==6) {echo "selected";}}?>>৬ বছর </option>
                                        <option value="7" class="form-control" <?php if (isset($data->sa_total_year)) {if ($data->sa_total_year==7) {echo "selected";}}?>>৭ বছর </option>
                                        <option value="8" class="form-control" <?php if (isset($data->sa_total_year)) {if ($data->sa_total_year==8) {echo "selected";}}?>>৮ বছর </option>
                                        <option value="9" class="form-control" <?php if (isset($data->sa_total_year)) {if ($data->sa_total_year==9) {echo "selected";}}?>>৯ বছর </option>
                                        <option value="10" class="form-control"<?php if (isset($data->sa_total_year)) {if ($data->sa_total_year==10) {echo "selected";}}?>>১০ বছর </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">নিয়মিত সঞ্চয়ের লক্ষ্য<label class="text-danger"> *</label></label>
                                    <input type="number" name="sa_total_target" value="<?php if(isset($data->sa_total_target)){echo $data->sa_total_target;} ?>" class="form-control" placeholder="যেমনঃ ২০০ টাকা" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">সঞ্চয় খোলার তারিখ <label class="text-danger"> *</label></label>
                                    <input type="date" name="sa_opening_date"  value="<?php if(isset($data->sa_opening_date)){echo $data->sa_opening_date;} ?>"  class="form-control"  required >
                                </div>
                            </div>
<!--                            <div class="col-md-12">-->
<!--                                <div class="mb-3">-->
<!--                                    <label for="" class="form-label">সঞ্চয় পণ্য সম্পর্কে <label class="text-danger"> *</label></label>-->
<!--                                    <textarea name="sa_description"  value="--><?php //if(isset($data->sa_description)){echo $data->sa_description;} ?><!--" id="" cols="5" rows="5" class="form-control" placeholder="Write here details"></textarea>-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="mt-2 mb-3">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div><!--end row-->
                    </div>
                </form>

            </div>
        </div>
