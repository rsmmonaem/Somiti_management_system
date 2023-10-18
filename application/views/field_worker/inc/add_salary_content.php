<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">বেতন</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">বেতন প্রদান করুন</li>
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
                <h5 class="card-title">বেতন প্রদান করুন</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>field_worker/salary_list" class="btn btn-primary">
                        <i class="bx bx-arrow-back"></i> বেতন লিস্ট দেখুন </a>
                </div>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url();?>field_worker/save_salary" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">
                            <div class="col-md-6">
								<div class="mb-4">
									<label for="single-select-field" class="form-label">অফিসার নির্বাচন করুন </label>
									<select name="salary_officer_id" class="form-select" id="single-select-field" data-placeholder="অফিসার নির্বাচন করুন" required>
										<option></option>
										<?php foreach ($data as $row):?>
											<option value="<?= $row->officer_id?>"><?= $row->officer_id?> - <?= $row->officer_name?></option>
										<?php endforeach; ?>
									</select>
									
<!-- Hidden input to store selected officer's name -->
									<input type="hidden" name="selected_officer_name" id="selected-officer-name" value="">
								</div>

<script>
    // JavaScript code to update hidden input when officer is selected
    const selectField = document.getElementById('single-select-field');
    const hiddenInput = document.getElementById('selected-officer-name');
    
    selectField.addEventListener('change', function() {
        const selectedOption = selectField.options[selectField.selectedIndex];
        hiddenInput.value = selectedOption.text.split(' - ')[1]; // Extract officer name
    });
</script>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">বেতন প্রদানের তারিখ </label>
                                    <input type="date" class="form-control" id="inputProductTitle" name="salary_date" required value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">বেতন পরিশোধের পদ্ধতি<label class="text-danger"> *</label></label>
                                    <select class="form-select" name="salary_paid_type" required>
                                        <option>Select</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Check</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">মাসের নাম <label class="text-danger"> *</label></label>
                                    <input type="month" name="salary_month" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">বোনাস</label>
                                    <input type="number" class="form-control a2" id="bonus" placeholder="২০০০" name="salary_bonus" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">মূল বেতন</label>
                                    <input type="number" class="form-control b2" id="salary" placeholder="১০০০০" name="salary_amount" required>
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label"> প্রভিডেন্ট %  </label>
                                    <input type="number" class="form-control provident_fund" id="provident_fund" placeholder="১০%" name="provident_percent" required>
                                </div>
                            </div>

							<div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">প্রভিডেন্ট ফান্ড (PF)</label>
                                    <input type="number" class="form-control totalpf" id="totalpf" placeholder="১২০.০০" name="totalpf" value="" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">মোট বেতনের পরিমাণ</label>
                                    <input type="number" class="form-control c2" id="totalSalary" placeholder="১২০০০.০০" name="total_salary" value="" readonly>
                                </div>
                            </div>

                                <div class="mt-2 mb-3">
                                    <input type="submit" value="সেভ করুন" class="btn btn-primary">
                                </div>
                        </div><!--end row-->
                    </div>
                </form>

            </div>
        </div>
        <script>
				const pfInput = document.getElementById("provident_fund");
				const bonusInput = document.querySelector(".a2");
				const salaryInput = document.querySelector(".b2");
				const totalSalaryInput = document.querySelector(".c2");
				const totalpfInput = document.querySelector(".totalpf");


				bonusInput.addEventListener("input", updateTotalSalary);
				salaryInput.addEventListener("input", updateTotalSalary);
				pfInput.addEventListener("input", updateTotalSalary);

				function updateTotalSalary() {
					const bonus = parseFloat(bonusInput.value) || 0;
					const salary = parseFloat(salaryInput.value) || 0;
					const pf = parseFloat(pfInput.value) || 0;
					const AmountPF = (salary * pf) / 100;
					const MainSalary = salary - AmountPF;
					const totalSalary = bonus + MainSalary;
					totalpfInput.value = AmountPF.toFixed(2);
					totalSalaryInput.value = totalSalary.toFixed(2);
				}

        </script>

