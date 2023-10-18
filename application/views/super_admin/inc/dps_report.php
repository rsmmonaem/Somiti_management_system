<div class="page-wrapper">
    <?php

    $query = $this->db->select_sum('dps_acc_main_amount')->get('dps_account');
    $result = $query->row();
    $dps_acc_main_amount = $result->dps_acc_main_amount;

    $query = $this->db->select_sum('dps_acc_amount_collected')->get('dps_account');
    $result = $query->row();
    $dps_acc_amount_collected = $result->dps_acc_amount_collected;

    $this->db->from("dps_account");
    $dps_acc_id = $this->db->count_all("dps_account");

    ?>
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"><?=$title?></div>
        </div>
        <div class="row ">
            <div class="col-md-4">
                <div class="card radius-10 border-start border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">মোট ডিপিএস এমাউন্ট</p>
                                <h4 class="my-1 text-info"><?= $dps_acc_main_amount ?></h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class="bx bxs-dollar-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card radius-10 border-start border-0 border-4 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">মোট ডিপিএস গ্রাহক</p>
                                <h4 class="my-1 text-danger"><?= $dps_acc_id ?></h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class="bx bxs-wallet"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card radius-10 border-start border-0 border-4 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">মোট ডিপিএস টাকা সংগ্রহ</p>
                                <h4 class="my-1 text-success"><?= $dps_acc_amount_collected ?></h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-success text-white ms-auto"><i class="bx bxs-wallet"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="col">-->
<!--                <div class="card radius-10 border-start border-0 border-4 border-success">-->
<!--                    <div class="card-body">-->
<!--                        <div class="d-flex align-items-center">-->
<!--                            <div>-->
<!--                                <p class="mb-0 text-secondary">মোট মুনাফা-আসলে এফডিআর </p>-->
<!--                                <h4 class="my-1 text-success">5000</h4>-->
<!--                            </div>-->
<!--                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="bx bxs-dollar-circle"></i>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col">-->
<!--                <div class="card radius-10 border-start border-0 border-4 border-warning">-->
<!--                    <div class="card-body">-->
<!--                        <div class="d-flex align-items-center">-->
<!--                            <div>-->
<!--                                <p class="mb-0 text-secondary">মোট ইন্টারেস্ট এমাউন্ট</p>-->
<!--                                <h4 class="my-1 text-warning">5000</h4>-->
<!--                            </div>-->
<!--                            <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class="bx bxs-group"></i>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">তারিখ অনুযায়ী রিপোর্ট খুজুন</h5>
                <hr/>
                <form action="<?= base_url();?>account_admin/dps_report_list" method="post" enctype="multipart/form-data">
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
                            <div class="col-md-6">
                                <div class="mt-2 mb-3">
                                    <input type="submit" value="খুজুন" class="btn btn-primary">
                                </div>
                            </div>
                        </div> <!--end row-->
                    </div>
                </form>

            </div>
        </div>
