<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ঋণ</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">নতুন ঋণ একাউন্ট খুলুন</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title">নতুন ঋণ</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>branch_manager/loans_list" class="btn btn-primary"><i class="bx bx-left-arrow"></i> ঋণ লিস্ট </a>

                </div>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url();?>field_worker/save_loans" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
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

                        <input type="hidden" name="loans_branch_id" id="sa_id" value="">

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

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="single-select-field" class="form-label">সদস্য নির্বাচন করুন </label>
                                    <select name="loans_member_id" class="form-select" id="single-select-field" data-placeholder="সদস্য নির্বাচন করুন">
                                        <option></option>
                                        <?php foreach ($member as $row):?>
                                            <option value="<?= $row->member_id?>"><?= $row->member_id?> - <?= $row->member_name?></option>
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
                                            <option value="<?= $row->guarantor_id ?>"><?= $row->guarantor_id ?> - <?= $row->guarantor_name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">মুল টাকা </label>
                                    <input type="number" name="loans_amount" class="form-control" id="main_amount" placeholder="Example: 100000">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label">সুদের হার ( % )</label>
                                    <input type="text" name="loans_profit_rate" class="form-control" id="interest_percentage" placeholder="মুনাফার হার ( % )">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label">ঋণের সময়সীমা </label>
                                    <input type="text" name="loans_pay_date" class="form-control" id="inputVendor" placeholder="উদাঃ ১২ মাস ">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">সুদসহ ফেরত দিতে হবে </label>
                                    <input type="text" name="loans_payment_amount" class="form-control" id="total_interest_money" placeholder="কিস্তির সংখ্যা">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">কিস্তি আদায় </label>
                                    <select name="loans_installment_collection_type" class="form-select" id="installment_data_wise">
                                        <option>সিলেক্ট করুন</option>
                                        <option value="1">সাপ্তাহিক</option>
                                        <option value="2">মাসিক</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label"> কিস্তির পরিমাণ</label>
                                    <input type="text" name="loans_profit_daily_installment" class="form-control" id="main_installment_money"  placeholder="500 BDT">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label">কিস্তির সংখ্যা</label>
                                    <input type="text" name="loans_profit_installments" class="form-control" id="total_installments" placeholder="কিস্তির সংখ্যা">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label">ঋণ গ্রহণের তারিখ </label>
                                    <input type="date" class="form-control" id=" " name="loans_registration_date">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label">ঋণের টাকার ধরণ </label>
                                    <select name="loans_paid_type" class="form-select">
                                        <option>ঋণের টাকার ধরণ</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Check</option>
                                        <option value="3">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for=" " class="form-label">Status </label>
                                    <select name="loans_status" class="form-select">
                                        <option>Select</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
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
        <!--        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
        <!---->
        <!--        <script>-->
        <!--            // Function to calculate interest and update total_interest_money-->
        <!--            function calculateInterest() {-->
        <!--                var mainAmount = parseFloat(document.getElementById("main_amount").value);-->
        <!--                var interestPercentage = parseFloat(document.getElementById("interest_percentage").value);-->
        <!--                var inputVendor = parseFloat(document.getElementById("inputVendor").value);-->
        <!---->
        <!--                // Calculate interest based on percentage and inputVendor-->
        <!--                var interestAmount = (mainAmount * interestPercentage * inputVendor) / 100;-->
        <!---->
        <!--                // Update total_interest_money input field-->
        <!--                document.getElementById("total_interest_money").value = mainAmount + interestAmount;-->
        <!--            }-->
        <!---->
        <!--            // Attach event listeners to the input fields to trigger calculations-->
        <!--            document.getElementById("main_amount").addEventListener("input", calculateInterest);-->
        <!--            document.getElementById("interest_percentage").addEventListener("input", calculateInterest);-->
        <!--            document.getElementById("inputVendor").addEventListener("input", calculateInterest);-->
        <!--        </script>-->
        <!---->
        <!--        <script>-->
        <!--            document.addEventListener("DOMContentLoaded", function () {-->
        <!--                const totalInterestMoneyInput = document.getElementById("total_interest_money");-->
        <!--                const inputVendor = document.getElementById("inputVendor");-->
        <!--                const installmentTypeSelect = document.getElementById("installment_data_wise");-->
        <!--                const mainInstallmentMoneyInput = document.getElementById("main_installment_money");-->
        <!--                const totalInstallmentsInput = document.getElementById("total_installments");-->
        <!---->
        <!--                // Function to calculate and update values-->
        <!--                function updateValues() {-->
        <!--                    const selectedOptionValue = parseInt(installmentTypeSelect.value);-->
        <!--                    const totalInterestMoney = parseFloat(totalInterestMoneyInput.value);-->
        <!--                    const inputVendorValue = parseFloat(inputVendor.value);-->
        <!---->
        <!--                    if (selectedOptionValue === 1) {-->
        <!--                        // Calculate total_installments-->
        <!--                        const totalInstallments = inputVendorValue * 4.34524;-->
        <!--                        totalInstallmentsInput.value = totalInstallments.toFixed(2);-->
        <!---->
        <!--                        // Calculate main_installment_money-->
        <!--                        const mainInstallmentMoney = totalInterestMoney / (inputVendorValue * 4.34524)  ;-->
        <!--                        mainInstallmentMoneyInput.value = mainInstallmentMoney.toFixed(2);-->
        <!--                    } else if (selectedOptionValue === 2) {-->
        <!--                        // Calculate main_installment_money-->
        <!--                        const mainInstallmentMoney = totalInterestMoney / inputVendorValue;-->
        <!--                        mainInstallmentMoneyInput.value = mainInstallmentMoney.toFixed(2);-->
        <!---->
        <!--                        // Reset total_installments-->
        <!--                        totalInstallmentsInput.value = inputVendorValue;-->
        <!--                    } else {-->
        <!--                        // Reset both fields if the option is not 1 or 2-->
        <!--                        mainInstallmentMoneyInput.value = "";-->
        <!--                        totalInstallmentsInput.value = "";-->
        <!--                    }-->
        <!--                }-->
        <!---->
        <!--                // Add event listener to the select element-->
        <!--                installmentTypeSelect.addEventListener("change", updateValues);-->
        <!---->
        <!--                // Initial call to set values based on default select option-->
        <!--                updateValues();-->
        <!--            });-->
        <!--        </script>-->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // Function to calculate interest percentage and update the percentage input field
            function calculatePercentage() {
                var mainAmount = parseFloat(document.getElementById("main_amount").value);
                var totalAmount = parseFloat(document.getElementById("total_interest_money").value);
                var inputVendor = parseFloat(document.getElementById("inputVendor").value);

                // Calculate interest percentage
                var interestPercentage = ((totalAmount - mainAmount) / (mainAmount * inputVendor)) * 100;

                // Update the interest percentage input field
                document.getElementById("interest_percentage").value = interestPercentage.toFixed(2);
            }

            // Function to calculate interest and update related fields
            function calculateAndUpdateFields() {
                var mainAmount = parseFloat(document.getElementById("main_amount").value);
                var interestPercentage = parseFloat(document.getElementById("interest_percentage").value);
                var inputVendor = parseFloat(document.getElementById("inputVendor").value);

                // Calculate interest based on percentage and inputVendor
                var interestAmount = (mainAmount * interestPercentage * inputVendor) / 100;

                // Calculate the total amount to be paid (principal + interest)
                var totalAmount = mainAmount + interestAmount;

                // Update the "সুদসহ ফেরত দিতে হবে" field
                document.getElementById("total_interest_money").value = totalAmount;

                // You can update other fields here if needed
                // For example, you can update a field showing the total interest alone.
                // document.getElementById("total_interest_only").value = interestAmount;
            }

            // Attach event listeners to the input fields to trigger calculations
            document.getElementById("main_amount").addEventListener("input", calculateAndUpdateFields);
            document.getElementById("interest_percentage").addEventListener("input", calculateAndUpdateFields);
            document.getElementById("inputVendor").addEventListener("input", calculateAndUpdateFields);
            document.getElementById("total_interest_money").addEventListener("input", calculatePercentage);

            // Initial calculation when the page loads
            calculateAndUpdateFields();
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const totalInterestMoneyInput = document.getElementById("total_interest_money");
                const inputVendor = document.getElementById("inputVendor");
                const installmentTypeSelect = document.getElementById("installment_data_wise");
                const mainInstallmentMoneyInput = document.getElementById("main_installment_money");
                const totalInstallmentsInput = document.getElementById("total_installments");

                // Function to calculate main_installment_money based on total_installments
                function updateMainInstallmentMoney() {
                    const totalInterestMoney = parseFloat(totalInterestMoneyInput.value);
                    const totalInstallments = parseFloat(totalInstallmentsInput.value);

                    if (totalInstallments > 0) {
                        const mainInstallmentMoney = totalInterestMoney / totalInstallments;
                        mainInstallmentMoneyInput.value = mainInstallmentMoney.toFixed(2);
                    } else {
                        // Reset main_installment_money if total_installments is not a positive number
                        mainInstallmentMoneyInput.value = "";
                    }
                }

                // Function to calculate and update values
                function updateValues() {
                    const selectedOptionValue = parseInt(installmentTypeSelect.value);
                    const inputVendorValue = parseFloat(inputVendor.value);

                    if (selectedOptionValue === 1) {
                        // Calculate total_installments
                        const totalInstallments = inputVendorValue * 4.34524;
                        totalInstallmentsInput.value = totalInstallments.toFixed(2);
                    } else if (selectedOptionValue === 2) {
                        // Reset total_installments
                        totalInstallmentsInput.value = inputVendorValue;
                    } else {
                        // Reset both fields if the option is not 1 or 2
                        totalInstallmentsInput.value = "";
                        mainInstallmentMoneyInput.value = "";
                        return; // Exit the function early to prevent further calculations
                    }

                    // Calculate main_installment_money based on the updated total_installments
                    updateMainInstallmentMoney();
                }

                // Add event listeners to the select and total_installments elements
                installmentTypeSelect.addEventListener("change", updateValues);
                totalInstallmentsInput.addEventListener("input", updateMainInstallmentMoney);

                // Initial call to set values based on default select option
                updateValues();
            });
        </script>




