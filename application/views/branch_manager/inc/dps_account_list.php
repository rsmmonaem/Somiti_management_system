<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ডিপিএস একাউন্ট </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> ডিপিএস একাউন্ট </li>
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
                <h6 class="mb-0 text-uppercase">ডিপিএস একাউন্ট  লিস্ট</h6>
                <div class="dropdown ms-auto">

                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>সদস্য</th>
                            <th>ডিপিএস প্লানের নাম</th>
                            <th>রেজিস্টারের তারিখ</th>
                            <th>কিস্তির টাকার পরিমাণ</th>
                            <th>মুনাফাসহ আসল</th>
							<th>মুনাফা হার</th>
                            <th>কিস্তির পরিমাণ</th>
                            <th>টাকা কালেকশন</th>
                             <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($account as $row):?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row->member_name ?></td>
                                <td><?= $row->dps_plan_name ?></td>
                                <td><?= $row->dps_acc_reg_date?></td>
                                <td><?= $row->dps_plan_amount?></td>
                                <td><?= $row->dps_plan_total_amount?></td>
								<td><?= $row->dps_plan_interest?> %</td>
								<td><span class="small ">মোট কিস্তি <?= $row->dps_plan_installment?> টা</span>
                                    <p class="small ">আর কিস্তি বাকি আছে <?= $row->dps_acc_installment?> টা</p>
                                </td>
                                <td><?= $row->dps_acc_amount_collected?></td>
                                <td>
                                    <a href="<?= base_url()?>branch_manager/edit_dps_account/<?= $row->dps_acc_id?>" class="btn btn-primary ms-3"><i class="bx bxs-edit"></i></a>

                                    <a onclick="return confirm('are you sure?')" href="<?= base_url()?>branch_manager/dps_delete/<?= $row->dps_acc_id?>" class="btn btn-danger"><i class="bx bxs-trash"></i></a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
