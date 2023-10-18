<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ঋণ</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ঋণ একাউন্ট আপডেট করুন </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title">ঋণ একাউন্ট আপডেট করুণ</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>super_admin/loan_list" class="btn btn-primary"><i class="bx bx-left-arrow"></i> ঋণ একাউন্ট  লিস্ট </a>

                </div>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url();?>super_admin/update_loans" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="loans_id" value="<?=$data->loans_id ?>">


                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="single-select-field" class="form-label">সদস্য নির্বাচন করুন </label>
                                    <select name="loans_member_id" class="form-select" id="single-select-field" data-placeholder="সদস্য নির্বাচন করুন">
                                        <option></option>
                                        <?php foreach ($member as $row):?>
                                            <option value="<?= $row->member_id?>" <?php if ($data->loans_member_id ==  $row->member_id){echo 'selected';}?> ><?= $row->member_id?> - <?= $row->member_name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="single-select-field-b" class="form-label">জামিনদার নির্বাচন করুন </label>
                                    <select class="form-select" id="single-select-field-b" data-placeholder="জামিনদার নির্বাচন করুন" name="loans_guarantor_id">
                                        <option></option>
                                        <?php foreach ($guarantor as $row):?>
                                            <option value="<?= $row->guarantor_id ?>" <?php if ($data->loans_guarantor_id ==  $row->guarantor_id){echo 'selected';}?> ><?= $row->guarantor_id ?> - <?= $row->guarantor_name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">মুল টাকা </label>
                                    <input type="number" name="loans_amount" class="form-control" id="main_amount" placeholder="Example: 100000" value="<?= $data->loans_amount?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label">সুদের হার ( % )</label>
                                    <input type="text" name="loans_profit_rate" class="form-control" id="interest_percentage" placeholder="মুনাফার হার ( % )" value="<?= $data->loans_profit_rate?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label">ঋণের সময়সীমা </label>
                                    <input type="text" name="loans_pay_date" class="form-control" id="inputVendor" placeholder="উদাঃ ১২ মাস " value="<?= $data->loans_pay_date?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">সুদসহ ফেরত দিতে হবে </label>
                                    <input type="text" name="loans_payment_amount" class="form-control" id="total_interest_money" placeholder="কিস্তির সংখ্যা" value="<?= $data->loans_payment_amount?>" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">কিস্তি আদায় </label>
                                    <select name="loans_installment_collection_type" class="form-select" id="installment_data_wise">
                                        <option>সিলেক্ট করুন</option>
                                        <option value="1" <?php if ($data->loans_installment_collection_type == 1){echo "selected";}?>>সাপ্তাহিক</option>
                                        <option value="2" <?php if ($data->loans_installment_collection_type == 2){echo "selected";}?>>মাসিক</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label"> কিস্তির পরিমাণ</label>
                                    <input type="text" name="loans_profit_daily_installment" class="form-control" id="main_installment_money" value="<?=$data->loans_profit_daily_installment?>"  placeholder="500 BDT">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label">কিস্তির সংখ্যা</label>
                                    <input type="text" name="loans_profit_installments" class="form-control" value="<?=$data->loans_profit_installments?>" id="total_installments" placeholder="কিস্তির সংখ্যা">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label">ঋণ গ্রহণের তারিখ </label>
                                    <input type="date" class="form-control" id=" " name="loans_registration_date" value="<?=$data->loans_registration_date?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label">ঋণের টাকার ধরণ </label>
                                    <select name="loans_paid_type" class="form-select">
                                        <option>ঋণের টাকার ধরণ</option>
                                        <option value="1" <?php if ($data->loans_paid_type == 1){echo "selected";}?>>Cash</option>
                                        <option value="2" <?php if ($data->loans_paid_type == 2){echo "selected";}?>>Check</option>
                                        <option value="3" <?php if ($data->loans_paid_type == 3){echo "selected";}?>>Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label">Status </label>
                                    <select name="loans_status" class="form-select">
                                        <option>Select</option>
                                        <option value="1" <?php if ($data->loans_status == 1){echo "selected";}?>>Active</option>
                                        <option value="2" <?php if ($data->loans_status == 2){echo "selected";}?>>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mt-2 mb-3">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>

                </form>

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            // Function to calculate interest and update total_interest_money
            function calculateInterest() {
                var mainAmount = parseFloat(document.getElementById("main_amount").value);
                var interestPercentage = parseFloat(document.getElementById("interest_percentage").value);
                var inputVendor = parseFloat(document.getElementById("inputVendor").value);

                // Calculate interest based on percentage and inputVendor
                var interestAmount = (mainAmount * interestPercentage * inputVendor) / 100;

                // Update total_interest_money input field
                document.getElementById("total_interest_money").value = mainAmount + interestAmount;
            }

            // Attach event listeners to the input fields to trigger calculations
            document.getElementById("main_amount").addEventListener("input", calculateInterest);
            document.getElementById("interest_percentage").addEventListener("input", calculateInterest);
            document.getElementById("inputVendor").addEventListener("input", calculateInterest);
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const totalInterestMoneyInput = document.getElementById("total_interest_money");
                const inputVendor = document.getElementById("inputVendor");
                const installmentTypeSelect = document.getElementById("installment_data_wise");
                const mainInstallmentMoneyInput = document.getElementById("main_installment_money");
                const totalInstallmentsInput = document.getElementById("total_installments");

                // Function to calculate and update values
                function updateValues() {
                    const selectedOptionValue = parseInt(installmentTypeSelect.value);
                    const totalInterestMoney = parseFloat(totalInterestMoneyInput.value);
                    const inputVendorValue = parseFloat(inputVendor.value);

                    if (selectedOptionValue === 1) {
                        // Calculate total_installments
                        const totalInstallments = inputVendorValue * 4.34524;
                        totalInstallmentsInput.value = totalInstallments.toFixed(2);

                        // Calculate main_installment_money
                        const mainInstallmentMoney = totalInterestMoney / (inputVendorValue * 4.34524)  ;
                        mainInstallmentMoneyInput.value = mainInstallmentMoney.toFixed(2);
                    } else if (selectedOptionValue === 2) {
                        // Calculate main_installment_money
                        const mainInstallmentMoney = totalInterestMoney / inputVendorValue;
                        mainInstallmentMoneyInput.value = mainInstallmentMoney.toFixed(2);

                        // Reset total_installments
                        totalInstallmentsInput.value = inputVendorValue;
                    } else {
                        // Reset both fields if the option is not 1 or 2
                        mainInstallmentMoneyInput.value = "";
                        totalInstallmentsInput.value = "";
                    }
                }

                // Add event listener to the select element
                installmentTypeSelect.addEventListener("change", updateValues);

                // Initial call to set values based on default select option
                updateValues();
            });
        </script>
