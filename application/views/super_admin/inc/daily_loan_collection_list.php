<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ঋণ সংগ্রহ লিস্ট</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">প্রতিদিনের ঋণ সংগ্রহ লিস্ট</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>ঋণ সংগ্রহ লিস্ট</h4>
                        <div class="dropdown ms-auto">
                            <a href="<?= base_url()?>super_admin/daily_loan_collection" class="btn btn-primary"><i class="bx bx-plus-circle"></i> নতুন ঋণ সংগ্রহ </a>

                        </div>
                    </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>নাম</th>
                                <th>তারিখ</th>
                                <th>টাকা পরিশোধের করেছেন</th>
                                <th>পরিশোধের মাধ্যম</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($loan_product as $row):?>
                                <tr>
                                    <td><?= $i++;?></td>
                                    <td><?= $row->member_name?></td>
                                    <td><?= $row->dlc_date?></td>
                                    <td><?= $row->dlc_amount?></td>
                                    <td><?php if ($row->dlc_amount_type == 1){
                                            echo "Cash";
                                        }elseif($row->dlc_amount_type == 2){
                                            echo "Check";
                                        }else{
                                            echo "Others";
                                        }

                                        ?></td>
                                    <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?= base_url()?>super_admin/edit_daily_loan/<?= $row->dlc_id?>" class="ms-3 border-warning"><i class="bx bxs-edit"></i></a>
                                        <a onclick="return confirm('are you sure?')" href="<?= base_url()?>super_admin/delete_daily_loan/<?= $row->dlc_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                    </div>
									</td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
