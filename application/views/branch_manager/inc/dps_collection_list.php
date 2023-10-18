<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ডিপিএস কালেকশন </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> <?= $title;?> </li>
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
                <h6 class="mb-0 text-uppercase">ডিপিএস কালেকশন   লিস্ট</h6>

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
                            <th>ডিপিএস কালেকশনের তারিখ</th>
                            <th>টাকার পরিমাণ</th>
                            <th>টাকার পরিশোধের মাধ্যম</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                        foreach ($dps_col as $row):?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row->member_name?></td>
                            <td><?= $row->dps_col_collect_date?></td>
                            <td><?= $row->dps_col_amount?></td>
                            <td><?php
                                if($row->dps_col_payment_type == 1){
                                    echo "Cash";
                                }elseif ($row->dps_col_payment_type== 2){
                                    echo "Check";
                                }elseif ($row->dps_col_payment_type == 3){
                                    echo "Others";
                                }
                                ?></td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="<?= base_url()?>branch_manager/edit_dps_collection/<?= $row->dps_col_id?>" class="ms-3 border-primary"><i class="bx bxs-edit"></i></a>

                                    <a onclick="return confirm('are you sure?')" href="<?= base_url()?>branch_manager/delete_dps_collection/<?= $row->dps_col_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
