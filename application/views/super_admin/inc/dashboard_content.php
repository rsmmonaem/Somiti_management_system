<!--start page wrapper -->
	<div class="page-wrapper">
		<div class="page-content">
            <?php

            $query = $this->db->select_sum('loans_amount')->get('loans');
            $result = $query->row();
            $total_loan = $result->loans_amount;

			$query = $this->db->select_sum('income_amount')->get('income');
            $result = $query->row();
            $total_income = $result->income_amount;

			$query = $this->db->select_sum('expense_amount')->get('expense');
            $result = $query->row();
            $total_expense = $result->expense_amount;

			$query = $this->db->select_sum('assets_buying_price')->get('assets');
            $result = $query->row();
            $total_assets = $result->assets_buying_price;

			$query = $this->db->select_sum('total_salary')->get('salary');
            $result = $query->row();
            $total_salary_paid = $result->total_salary;

            $this->db->from("loans");
            $loan_account = $this->db->count_all("loans");

			$this->db->from("member");
            $member = $this->db->count_all("member");


            ?>

            <?php

            //======== Loan Account ===========


            $query = $this->db->select_sum('loans_amount')->get('loans');
            $result = $query->row();
            $total_loan = $result->loans_amount;


            $this->db->from("loans");
            $loan_account = $this->db->count_all_results();

            //============ Saving Account ==========


            $query = $this->db->select_sum('sa_money_saving')->get('saving_account');
            $result = $query->row();
            $saving_account = $result->sa_money_saving;


            $this->db->from("saving_account");
            $total_account = $this->db->count_all_results();


            //============ DPS Account =============


            $query = $this->db->select_sum('dps_acc_main_amount')->get('dps_account');
            $result = $query->row();
            $dps_account = $result->dps_acc_main_amount;


            $this->db->from("dps_account");
            $total_dps_account = $this->db->count_all_results();


            //============ FDR Account ================

            $query = $this->db->select_sum('fdr_amount')->get('fdr_account');
            $result = $query->row();
            $fdr_account = $result->fdr_amount;


            $this->db->from("fdr_account");
            $total_fdr_account = $this->db->count_all_results();


            //============ Officer List ================
            //  $user_id = $this->session->userdata('user_id');
            //  $this->db->where("officer_branch_id", $user_id);
            //  $query = $this->db->select_sum('officer')->get('officer');
            //  $result = $query->row();
            //  $fdr_account = $result->fdr_amount;

;
            $this->db->from("officer");
            $total_officer = $this->db->count_all_results();


            ?>



            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">মোট ঋণ প্রদান</p>
                                    <h4 class="my-1 text-info">৳ <?= $total_loan  ?></h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-dollar-circle'></i>
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
                                    <p class="mb-0 text-secondary">মোট ঋণ গ্রাহক</p>
                                    <h4 class="my-1 text-danger"><?= $loan_account?> </h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-group'></i>
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
                                    <p class="mb-0 text-secondary">মোট সঞ্চয় </p>
                                    <h4 class="my-1 text-success"><?=$saving_account ?></h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-dollar-circle' ></i>
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
                                    <p class="mb-0 text-secondary">মোট সঞ্চয় গ্রাহক</p>
                                    <h4 class="my-1 text-warning"><?= $total_account ?></h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">মোট ডি.পি.এস</p>
                                    <h4 class="my-1 text-info">৳ <?= $dps_account  ?></h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-dollar-circle'></i>
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
                                    <p class="mb-0 text-secondary">মোট ডি.পি.এস গ্রাহক</p>
                                    <h4 class="my-1 text-danger"><?= $total_dps_account?></h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-group'></i>
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
                                    <p class="mb-0 text-secondary">মোট এফ.ডি.আর </p>
                                    <h4 class="my-1 text-success"><?=$fdr_account ?></h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-dollar-circle' ></i>
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
                                    <p class="mb-0 text-secondary"> এফ.ডি.আর গ্রাহক</p>
                                    <h4 class="my-1 text-warning"><?= $total_fdr_account ?></h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
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
                                    <p class="mb-0 text-secondary"> ফিল্ড ওয়ার্কার </p>
                                    <h4 class="my-1 text-warning"><?= $total_officer ?></h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
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
                                    <p class="mb-0 text-secondary">মোট বেতন প্রদান</p>
                                    <h4 class="my-1 text-success"><?=$total_salary_paid ?></h4>
                                    <!-- <p class="mb-0 font-13">-4.5% from last week</p> -->
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-dollar-circle' ></i>
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
                                    <p class="mb-0 text-secondary">মোট সদস্য</p>
                                    <h4 class="my-1 text-warning"><?= $member ?></h4>
                                    <!-- <p class="mb-0 font-13">+8.4% from last week</p> -->
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->




			<div class="row">
				<div class="col-12 col-lg-8 d-flex">
					<div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">বাৎসরিক আয় ব্যয় সমূহ</h6>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="d-flex align-items-center ms-auto font-13 gap-2 mb-3">
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>ব্যয় সমূহ</span>
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ffc107"></i>আয় সমূহ</span>
							</div>
							<div class="chart-container-1">
								<canvas id="chart1"></canvas>
							</div>
						</div>

                        <?php
                        $query = $this->db->select_sum('income_amount')
                            ->where('YEAR(income_date)', date('Y')) // Filter by the current year
                            ->get('income');

                        $result = $query->row();
                        $total_yearly_sale = $result->income_amount;

                        $test = $this->db->select_sum('expense_amount')
                            ->where('YEAR(expense_date)', date('Y')) // Filter by the current year
                            ->get('expense');

                        $result = $test->row();
                        $total_yearly_expense = $result->expense_amount;

                        ?>

						<div class="row row-cols-1 g-0 row-group text-center border-top">
							<div class="col-md-6">
								<div class="p-3">
									<h5 class="mb-0"><?= $total_yearly_sale ?> BDT</h5>
									<p class="mb-0">মোট বাৎসরিক আয়</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="p-3">
									<h5 class="mb-0"><?= $total_yearly_expense ?> BDT</h5>
									<p class="mb-0">মোট বাৎসরিক  ব্যয়</p>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="col-12 col-lg-4 d-flex">
					<div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">মোট সম্পদ
                                    </h6>
								</div>
								<div class="dropdown ms-auto">

								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="chart-container-2">
								<canvas id="chart2"></canvas>

							</div>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center"> মোট আয় <span class="badge bg-success rounded-pill"><?=$total_income?></span>
							</li>
							<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top"> মোট ঋণ <span class="badge bg-danger rounded-pill"><?=$total_loan?></span>
							</li>

							<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center"> মোট ব্যায় <span class="badge bg-primary rounded-pill"><?=$total_expense?></span>
							</li>
							<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center"> মোট সম্পদ <span class="badge bg-warning text-dark rounded-pill"><?=$total_assets?></span>
							</li>
						</ul>
					</div>
				</div>
			</div><!--end row-->

			<div class="card radius-10">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<div>
							<h6 class="mb-0">ঋণের টাকা কালেকশন</h6>
						</div>
						<div class="dropdown ms-auto">

						</div>
					</div>
				</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table align-middle mb-0">
							<thead class="table-light">
							<tr>
								<th>একাউন্ট</th>
								<th>মেম্বারের নাম</th>
								<th>ছবি</th>
								<th>মোট <br>
                                    ঋনের পরিমাণ</th>
								<th>নতুন <br>কালেকশন</th>
								<th>মোট <br> কালেকশনের পরিমাণ</th>
								<th>অবশিষ্ট <br>টাকার পরিমাণ</th>
								<th>তারিখ</th>
								<th>অগ্রগতি </th>
							</tr>
							</thead>
							<tbody>
                            <?php foreach ($this->alm->get_member_loans_collections() as $row):?>
                            <tr>
								<td><?= $row->loans_id ?></td>
								<td><?= $row->member_name?></td>
								<td><img src="<?= base_url()?>uploads/member/<?=$row->member_image?>" class="product-img-2" alt="product img"></td>
								<td><?= $row->loans_amount?></td>
								<td><?= $row->dlc_amount?></td>
                                <td><?= $row->loan_amount_collection?></td>
								<td><?php
                                    $collection = $row->loan_amount_collection;
                                    $main_amount = $row->loans_amount;
                                    echo $main_amount - $collection;


                                    ?></td>
								<td><?= $row->dlc_date?></td>


								<td>

                                    <div class="text-center text-black">



                                    <div class="progress" >

                                        <?php
                                        $totalLoan = $row->loans_amount;
                                        $paymentPerDay = $row->loan_amount_collection;
                                        $remainingPercentage = ( $paymentPerDay/$totalLoan) * 100;
                                        $remainingPercentage = intval($remainingPercentage);

                                        ?>


                                            <div class="progress-bar" role="progressbar" style="width: <?= $remainingPercentage?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">

                                            </div>



                                        </div>
                                        <?= $remainingPercentage?>%

                                    </div>
									</div>
                                </td>
							</tr>
                            <?php endforeach;?>


							</tbody>
						</table>
					</div>
				</div>

			</div>



            <script src="<?= base_url()?>assets/admin/plugins/chartjs/js/chart.js"></script>

            <script>
                // chart 2

                var ctx = document.getElementById("chart2").getContext('2d');

                var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke1.addColorStop(0, '#15ca20 ');
                gradientStroke1.addColorStop(1, '#15ca20 ');

                var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke2.addColorStop(0, '#dc3545');
                gradientStroke2.addColorStop(1, '#dc3545');


                var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke3.addColorStop(0, '#0d6efd');
                gradientStroke3.addColorStop(1, '#0d6efd');

                var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke4.addColorStop(0, '#ffc107');
                gradientStroke4.addColorStop(1, '#ffc107');

                var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [" মোট আয় ", " মোট ঋন ", " মোট ব্যায় ", " মোট সম্পদ "],
                        datasets: [{
                            backgroundColor: [
                                gradientStroke1,
                                gradientStroke2,
                                gradientStroke3,
                                gradientStroke4
                            ],
                            hoverBackgroundColor: [
                                gradientStroke1,
                                gradientStroke2,
                                gradientStroke3,
                                gradientStroke4
                            ],
                            data: [<?= $total_income?>, <?=$total_loan?>, <?=$total_expense?>, <?=$total_assets?>],
                            borderWidth: [1, 1, 1, 1]
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        cutout: 82,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        }

                    }
                });

            </script>


            <script>

                var ctx = document.getElementById('chart3a').getContext('2d');

                var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke1.addColorStop(0, '#00b09b');
                gradientStroke1.addColorStop(1, '#96c93d');

                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                        datasets: [{
                            label: 'Facebook',
                            data: [50,10 , 20,60,50,40,10],
                            backgroundColor: [
                                gradientStroke1
                            ],
                            fill: {
                                target: 'origin',
                                above: 'rgb(21 202 32 / 15%)',   // Area will be red above the origin
                                //below: 'rgb(21 202 32 / 100%)'   // And blue below the origin
                            },
                            tension: 0.4,
                            borderColor: [
                                gradientStroke1
                            ],
                            borderWidth: 3
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                var ctx = document.getElementById("chart4").getContext('2d');

                var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke1.addColorStop(0, '#ee0979');
                gradientStroke1.addColorStop(1, '#ff6a00');

                var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke2.addColorStop(0, '#283c86');
                gradientStroke2.addColorStop(1, '#39bd3c');

                var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke3.addColorStop(0, '#7f00ff');
                gradientStroke3.addColorStop(1, '#e100ff');

                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ["Completed", "Pending", "Process"],
                        datasets: [{
                            backgroundColor: [
                                gradientStroke1,
                                gradientStroke2,
                                gradientStroke3
                            ],

                            hoverBackgroundColor: [
                                gradientStroke1,
                                gradientStroke2,
                                gradientStroke3
                            ],

                            data: [50, 50, 50],
                            borderWidth: [1, 1, 1]
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        cutout: 95,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        }

                    }
                });





                // chart 5

                var ctx = document.getElementById("chart5").getContext('2d');

                var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke1.addColorStop(0, '#f54ea2');
                gradientStroke1.addColorStop(1, '#ff7676');

                var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke2.addColorStop(0, '#42e695');
                gradientStroke2.addColorStop(1, '#3bb2b8');

                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [1, 2, 3, 4, 5],
                        datasets: [{
                            label: 'Clothing',
                            data: [40, 30, 60, 35, 60],
                            borderColor: gradientStroke1,
                            backgroundColor: gradientStroke1,
                            hoverBackgroundColor: gradientStroke1,
                            pointRadius: 0,
                            fill: false,
                            borderWidth: 1
                        }, {
                            label: 'Electronic',
                            data: [50, 60, 40, 70, 35],
                            borderColor: gradientStroke2,
                            backgroundColor: gradientStroke2,
                            hoverBackgroundColor: gradientStroke2,
                            pointRadius: 0,
                            fill: false,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        barPercentage: 0.5,
                        categoryPercentage: 0.8,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });


            </script>

            <?php


            $monthly_expenses = array(); // Initialize an array to hold monthly expenses

            for ($month = 1; $month <= 12; $month++) {
                $query = $this->db->select_sum('expense_amount')
                    ->where('MONTH(expense_date)', $month) // Filter by the current month
                    ->get('expense');

                $result = $query->row();
                $monthly_expenses[$month] = $result->expense_amount;
            }

            $monthly_income = array();

            for ($month = 1; $month <= 12; $month++) {
                $query = $this->db->select_sum('income_amount')
                    ->where('MONTH(income_date)', $month)
                    ->get('income');

                $result = $query->row();
                $monthly_income[$month] = $result->income_amount;
            }




            ?>

            <script>
                // chart 1
                var ctx = document.getElementById("chart1").getContext('2d');

                var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke1.addColorStop(0, '#6078ea');
                gradientStroke1.addColorStop(1, '#17c5ea');

                var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke2.addColorStop(0, '#ff8359');
                gradientStroke2.addColorStop(1, '#ffdf40');

                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'ব্যয় সমূহ',
                            data: [<?= $monthly_expenses[1] ?>, <?= $monthly_expenses[2] ?>, <?= $monthly_expenses[3] ?>, <?= $monthly_expenses[4] ?>,<?= $monthly_expenses[5] ?>, <?= $monthly_expenses[6] ?>, <?= $monthly_expenses[7] ?>, <?= $monthly_expenses[8] ?>,<?= $monthly_expenses[9] ?>, <?= $monthly_expenses[10] ?>, <?= $monthly_expenses[11] ?>,<?= $monthly_expenses[12] ?>],
                            borderColor: gradientStroke1,
                            backgroundColor: gradientStroke1,
                            hoverBackgroundColor: gradientStroke1,
                            pointRadius: 0,
                            fill: false,
                            borderRadius: 20,
                            borderWidth: 0
                        }, {
                            label: 'আয় সমূহ',
                            data: [<?= $monthly_income[1] ?>, <?= $monthly_income[2] ?>, <?= $monthly_income[3] ?>, <?= $monthly_income[4] ?>,<?= $monthly_income[5] ?>, <?= $monthly_income[6] ?>, <?= $monthly_income[7] ?>, <?= $monthly_income[8] ?>,<?= $monthly_income[9] ?>, <?= $monthly_income[10] ?>,<?= $monthly_income[11] ?>, <?= $monthly_income[12] ?>],
                            borderColor: gradientStroke2,
                            backgroundColor: gradientStroke2,
                            hoverBackgroundColor: gradientStroke2,
                            pointRadius: 0,
                            fill: false,
                            borderRadius: 20,
                            borderWidth: 0
                        }]
                    },

                    options: {
                        maintainAspectRatio: false,
                        barPercentage: 0.5,
                        categoryPercentage: 0.8,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

            </script>
