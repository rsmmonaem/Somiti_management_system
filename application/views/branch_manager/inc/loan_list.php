<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ঋণ </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ঋণ গ্রহীতার তালিকা </li>
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
                <h6 class="mb-0 text-uppercase">ঋণ গ্রহীতা </h6>
                <div class="dropdown ms-auto">

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ঋণ <br/>গ্রহীতার নাম</th>
                            <th>ঋণের <br/>টাকার পরিমাণ</th>
                            <th>জমিনদার</th>
                            <th>সুদের<br/>হার</th>
                            <td>সুদসহ <br/> টাকার পরিমাণ</td>
                            <td>কিস্তি</td>
                            <td>রেজিস্টারের তারিখ</td>
                            <td>টাকা <br> পরিশোধের  মাধ্যম</td>
                            <td>Status</td>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $i = 1;
                        foreach ($loans_list as $row): ?>

                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row->member_name?></td>
                                <td><?= $row->loans_amount?></td>
                                <td><?= $row->guarantor_name?></td>
                                <td><?= $row->loans_profit_rate?> % </td>
                                <td>
                                    <div class="small">
                                        <p>সুদসহ <?= $row->loans_payment_amount?> টাকা</p>
                                        <p class="text-primary">টাকা পরিশোধ করেছে <?= $row->loan_amount_collection?> টাকা</p>
                                        <p class="text-primary">টাকা বাকি আছে  <?= $row->loans_payment_amount - $row->loan_amount_collection?> টাকা</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="small">
                                        <p>মোট কিস্তি <?= $row->loans_profit_installments?>  টা</p>
                                        <p class="text-primary">কিস্তি প্রদান করেছে <?= $row->loans_total_installment?> টা</p>
                                        <p class="text-primary">কিস্তি বাকি আছে <?= $row->loans_profit_installments- $row->loans_total_installment   ?> টা</p>
                                    </div>


                                </td>
                                <td><?= $row->loans_registration_date?></td>
                                <td><?php if ( $row->loans_paid_type==1){
                                    echo "Cash";
                                    }elseif ($row->loans_paid_type==2){
                                    echo "Check";
                                    }elseif ($row->loans_paid_type==3){
                                    echo "Others";
                                    }
                                    ?>
                                </td>
                                <td><?php if ( $row->loans_status == 1){
                                    echo "Active";
                                    }elseif ($row->loans_status == 2){
                                    echo "Inactive";
                                    }
                                    ?></td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?= base_url()?>branch_manager/edit_loans/<?= $row->loans_id?>" class="ms-3 border-warning"><i class="bx bxs-edit"></i></a>
                                        <a onclick="return confirm('are you sure?')" href="<?= base_url()?>branch_manager/loans_delete/<?= $row->loans_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>




