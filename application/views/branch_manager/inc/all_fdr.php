<?php

$query = $this->db->select_sum('fdr_amount')->get('fdr_account');
$result = $query->row();
$total_fdr_amount = $result->fdr_amount;

$query = $this->db->select_sum('fdr_yearly_interest')->get('fdr_account');
$result = $query->row();
$total_fdr_yearly_interest = $result->fdr_yearly_interest;



$query = $this->db->get('fdr_account');
$rows = $query->result();

// Initialize a variable to store the total interest
$total_interest_with_fdr = 0;
$total_interest_amount = 0;
foreach ($rows as $row) {
    $fdr_amount = $row->fdr_amount;
    $fdr_yearly_interest = $row->fdr_yearly_interest;
    $fdr_target_year = $row->fdr_target_year;

    // Calculate the total interest for the current row
    $total_interest = $fdr_amount + ($fdr_yearly_interest * $fdr_target_year);
	$interest_amount = $fdr_yearly_interest * $fdr_target_year;

    // Add the total interest for the current row to the overall total

    $total_interest_with_fdr += $total_interest;
	$total_interest_amount += $interest_amount;
}

$this->db->from("fdr_account");
$total_fdr_account = $this->db->count_all("fdr_account");



?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"><?=$title?></div>
        </div>
		<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
				<div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">মোট এফডিআর এমাউন্ট</p>
									<h4 class="my-1 text-info"><?=$total_fdr_amount ?></h4>
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class="bx bxs-dollar-circle"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-danger">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">মোট এফডিআর গ্রাহক</p>
									<h4 class="my-1 text-danger"><?=$total_fdr_account?></h4>
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class="bx bxs-wallet"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-success">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">মোট মুনাফা-আসলে এফডিআর </p>
									<h4 class="my-1 text-success"><?=$total_interest_with_fdr?></h4>
									<!-- <p class="mb-0 font-13">-4.5% from last week</p> -->
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="bx bxs-dollar-circle"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-warning">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">মোট ইন্টারেস্ট এমাউন্ট</p>
									<h4 class="my-1 text-warning"><?=$total_interest_amount?></h4>
									<!-- <p class="mb-0 font-13">+8.4% from last week</p> -->
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class="bx bxs-group"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">তারিখ অনুযায়ী রিপোর্ট খুজুন</h5>
                <hr/>
                <form action="<?= base_url();?>branch_manager/fdr_report" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label"> তারিখ থেকে  </label>
                                    <input type="date" class="form-control" id="startDate" name="startDate" required  >
                                </div>
                            </div>

							<div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label"> তারিখ পর্যন্ত  </label>
                                    <input type="date" class="form-control" id="endDate" name="endDate" required >
                                </div>
                            </div>
                            <!-- <div id="incomeResults">

                            </div> -->


                            <div class="col-md-6">
                                <div class="mt-2 mb-3">
                                    <input type="submit" value="খুজুন" class="btn btn-primary">
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>

            </div>
        </div>



