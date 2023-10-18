<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ডিপিএস একাউন্ট</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ডিপিএস একাউন্ট</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?= base_url()?>account_admin/dps_plan" class="btn btn-primary"><i class="bx bx-plus-circle"></i> ডিপিএস প্লান  </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-header text-center">
                <h6>নতুন ডিপিএস একাউন্ট খুলুন</h6>
            </div>
        </div>
                <div class="row product-grid">
                    <?php foreach($this->dam->get_dps_plan() as $row):?>

                    <div class="col-md-4">
                        <div class="card">
                            <img src="<?= base_url()?>uploads/dps_plan/<?= $row->dps_plan_image?>" class="img-fluid card-img-top" width="20px" height="10px">
                            <div class="">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class=""></span></div>
                            </div>
                            <div class="card-body text-center">
                                <h4 class="card-title"><?= $row->dps_plan_name?></h4>
                                <hr>
                                <h6 class="card-title">মোট কিস্তি <?= $row->dps_plan_installment?> টা</h6>
                                <hr>
                                <h6 class="card-title">প্রতি কিস্তিতে টাকার পরিমাণ <?= $row->dps_plan_amount?> টাকা </h6>
                                <hr>
                                <h6 class="card-title">মোট জমার সুদের হার <?= $row->dps_plan_interest?> %</h6>
                                <hr>
                                <h6 class="card-title"> <?php if($row->dps_plan_pay_type == 1){
                                    echo "মাসিক";
                                    }elseif ($row->dps_plan_pay_type == 2){
                                    echo "সাপ্তাহিক";
                                    }
                                    ?> কিস্তি</h6>
                                <hr>
                                <h6 class="card-title ">ডিপিএস মোট টাকা পাবে <?= $row->dps_plan_total_amount?></h6>
                                <hr>
                                <a href="<?= base_url(); ?>account_admin/new_dps_account" class="btn btn-primary">Choose Plan </a>
                            </div>

                        </div>
                    </div>
                    <?php endforeach;?>

                </div><!--end row-->


