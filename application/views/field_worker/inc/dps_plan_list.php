<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ডিপিএস প্লান </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ডিপিএস প্লান  </li>
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
            <div class="card-header d-flex ">
                <h5 class="mb-0 text-uppercase">ডিপিএস একাউন্ট  লিস্ট</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>field_worker/dps_plan" class="btn btn-primary"><i class="bx bx-plus-circle"></i> নতুন ডিপিএস প্লান </a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ডিপিএস প্লানের নাম</th>
                            <th> ছবি </th>
                            <th>মোট কিস্তি </th>
                            <th>টাকার পরিমাণ</th>
                            <th>সুদের হার </th>
                            <th>মুনাফাসহ আসল</th>
                            <th>টাকা প্রদান</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $num = 1;
                        foreach ($dps as $row):?>
                        <tr>
                            <td><?= $num++?></td>
                            <td><img src="<?= base_url()?>uploads/dps_plan/<?=$row->dps_plan_image?>" class="w-50"></td>
                            <td><?= $row->dps_plan_name?></td>
                            <td><?= $row->dps_plan_installment?></td>
                            <td><?= $row->dps_plan_amount?></td>
                            <td><?= $row->dps_plan_interest?> %</td>
                            <td><?= $row->dps_plan_total_amount?></td>
                            <td>
                                <?php if ( $row->dps_plan_pay_type == 1){
                                    echo "সাপ্তাহিক";
                                }elseif ($row->dps_plan_pay_type == 2){
                                    echo "মাসিক";
                                }?>

                            </td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="<?= base_url()?>field_worker/edit_dps_plan/<?= $row->dps_plan_id?>" class="ms-3 border-primary"><i class="bx bxs-edit"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="<?= base_url()?>field_worker/dps_plan_delete/<?= $row->dps_plan_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
