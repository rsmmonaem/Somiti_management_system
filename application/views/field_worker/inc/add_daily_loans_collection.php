<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ঋণ সংগ্রহ </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">প্রতিদিনের ঋণ সংগ্রহ</li>
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
                <h5 class="card-title"><?php if(isset($loan_product)){echo"নতুন জমা আপডেট করুন";}else{echo"নতুন জমা করুন";}?></h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>field_worker/daily_loan_collection_list" class="btn btn-primary"><i class="bx bx-left-arrow"></i> ঋণ সংগ্রহ </a>

                </div>
            </div>
            <div class="card-body">

                <form action="<?= base_url() . (isset($loan_product) ? 'field_worker/update_daily_loan' : 'field_worker/save_daily_loan') ?>" method="post" enctype="multipart/form-data">
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

                            <input type="hidden" name="dlc_branch_id" id="sa_id" value="">

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
            <select name="dlc_member_id" class="form-select" id="single-select-field" data-placeholder="সদস্য নির্বাচন করুন" required>
                <option></option>
                <?php foreach ($member as $row):?>
                    <option value="<?= $row->member_id?>" data-money="<?= $row->loans_profit_daily_installment ?>" data-loanid="<?= $row->loans_id ?>"<?php if (isset($loan_product->dlc_loans_id)) {if ($loan_product->dlc_loans_id==$row->loans_id) {echo "selected";}}?>>
                        <?= "Loan ID -> " . $row->loans_id . " || Member Name -> " . $row->member_name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

            <input type="hidden" class="form-control" id="loan_id" value="<?php if(isset($loan_product->dlc_loans_id)){echo $loan_product->dlc_loans_id;}?>" name="loans_id" placeholder="ঋণ আইডি" readonly="readonly">

    <script>
        $(document).ready(function () {
            // When an option is selected from the dropdown
            $("#single-select-field").change(function () {
                // Get the selected option's loan ID data attribute
                var selectedLoanId = $("option:selected", this).data("loanid");
                var selectedMoney = $("option:selected", this).data("money");

                // Set the value of the loan_id input field
                $("#loan_id").val(selectedLoanId);
                $("#money").val(selectedMoney);
            });
        });
    </script>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">ঋণ পরিশোধের তারিখ </label>
                                    <input type="date" class="form-control" id="inputProductTitle" name="dlc_date" required value="<?php if(isset($loan_product->dlc_amount)){echo $loan_product->dlc_date;}else{echo date('Y-m-d');}?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">ঋণ পরিশোধের পদ্ধতি<label class="text-danger"> *</label></label>
                                    <select class="form-select" name="dlc_amount_type" required>
                                        <option>সিলেক্ট করুন</option>
                                        <option value="1" <?php if (isset($loan_product->dlc_amount_type)) {if ($loan_product->dlc_amount_type==1) {echo "selected";}}?>>ক্যাশ</option>
                                        <option value="2" <?php if (isset($loan_product->dlc_amount_type)) {if ($loan_product->dlc_amount_type==2) {echo "selected";}}?>>চেক</option>
                                        <option value="3"<?php if (isset($loan_product->dlc_amount_type)) {if ($loan_product->dlc_amount_type==3) {echo "selected";}}?>>অন্যান্য</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
							<div class="mb-3">
								<label for="inputProductTitle" class="form-label">পরিমাণ </label>
								<input type="text" class="form-control" id="money" placeholder="১০০০" name="dlc_amount" value="<?php if(isset($loan_product->dlc_amount)){echo $loan_product->dlc_amount;}?>" required>
							</div>
                            </div>
                            <div class="col-md-6">
								<div class="mt-2 mb-3">
									<input type="submit" value="<?php if(isset($loan_product->dlc_amount)){echo "আপডেট করুন";}else{echo "সেভ করুন";}?>" class="btn btn-primary" id="submitBtn">
								</div>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>

            </div>
        </div>

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
<script>
    var businessInput = document.getElementById("business");

    var submitButton = document.getElementById("submitBtn");

    businessInput.addEventListener("input", function () {
        if (businessInput.value <= 0) {
            submitButton.style.display = "none";
			businessInput.addEventListener("input", function(){
				if(businessInput.value <= 0){
					businessInput.placeholder="সঠিক তথ্য দিন";
					businessInput.value="সঠিক তথ্য দিন";
				}
			})
        } else {
            submitButton.style.display = "block";
        }
    });
</script>
