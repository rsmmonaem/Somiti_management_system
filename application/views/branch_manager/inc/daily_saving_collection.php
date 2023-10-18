
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">সঞ্চয় জমা করুন</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">প্রতিদিনের সঞ্চয় সংগ্রহ</li>
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

                </div>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url();?>branch_manager/save_saving_collection" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">
<!--                            <div class="d-none">-->
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

<!--                                </div>-->
                            </div>

                            <input type="text" name="dsc_branch_id" id="sa_id" value="">

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
                    <div class="mb-4">
                        <label for="single-select-field" class="form-label">সদস্য নির্বাচন করুন </label>
                        <select name="dsc_member_id" class="form-select" id="single-select-field" data-placeholder="সদস্য নির্বাচন করুন" required>
                            <option></option>
                            <?php foreach ($member as $row):?>
                                <option value="<?= $row->member_id?>" data-target="<?= $row->sa_total_target ?>" data-loanid="<?= $row->sa_id ?>" data-sa_pl_id="<?= $row->sa_plan_id ?>">
                                    <?= "সঞ্চয় একাউন্ট আইডি -> " . $row->sa_id . " || Member Name -> " . $row->member_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

            <input type="hidden" class="form-control" id="sa_id" name="dsc_saving_id" placeholder="Savings Account ID" required value="">

            <input type="hidden" class="form-control" id="sa_plan_id" name="sa_plan_id" placeholder="Savings Plane ID" required value="">



                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">সঞ্চয় জমা করার তারিখ </label>
                                    <input type="date" class="form-control" id="inputProductTitle" name="dsc_collect_date" required value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">সঞ্চয় জমা পদ্ধতি<label class="text-danger"> *</label></label>
                                    <select class="form-select" name="dsc_payment_type" required>
                                        <option>সিলেক্ট করুন</option>
                                        <option value="1">ক্যাশ</option>
                                        <option value="2">চেক</option>
                                        <option value="3">অন্যান্য</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">পরিমাণ </label>
                                    <input type="number" class="form-control" id="sa_targetMoney" placeholder="১০০০" name="dsc_amount" value="">
                                </div>
                            </div>
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

        <script>
            $(document).ready(function () {
                // When an option is selected from the dropdown
                $("#single-select-field").change(function () {
                    // Get the selected option's loan ID data attribute
                    var selectedLoanId = $("option:selected", this).data("loanid");
                    $("#sa_id").val(selectedLoanId);

                    var selectedsa_pl_id = $("option:selected", this).data("sa_pl_id");
                    $("#sa_plan_id").val(selectedsa_pl_id);

                    var selectedmoney = $("option:selected", this).data("target");
                    $("#sa_targetMoney").val(selectedmoney)
                });
            });
        </script>

        <?php if ($this->session->flashdata('error')): ?>
            <script>
                iziToast.error({
                    title: 'Error',
                    position:'topRight',
                    message: '<?php echo $this->session->flashdata('error'); ?>',
                });
            </script>
        <?php endif; ?>


        <?php if (isset($_SESSION['success'])): ?>
        <script>
            iziToast.success({
                title: 'Success',
                position:'topRight',
                message: ' <?php echo $_SESSION['success']; ?>',
            });
        </script>

        <?php unset($_SESSION['success']); ?>

<?php endif; ?>
