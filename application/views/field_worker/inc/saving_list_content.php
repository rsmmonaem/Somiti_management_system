<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">সঞ্চয় একাউন্ট </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">সঞ্চয় একাউন্ট লিস্ট</li>
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
                <h4 class="mb-0 text-uppercase">সঞ্চয় একাউন্ট লিস্ট</h4>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>field_worker/add_saving_account" class="btn btn-primary"><i class="bx bx-plus-circle"></i> নতুন সঞ্চয় হিসাব </a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>সদস্যের <br> নাম </th>
                            <th>এন আই ডি</th>
                            <th>সেভিং প্লান</th>
                            <th>সেভিং <br> টার্গেট</th>
                            <th>মোট <br> টাকা জমা </th>
                            <th>মোট কিস্তি</th>
                            <th>একাউন্ট <br>
                                রেজিস্টারের <br> তারিখ</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($data as $row):?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->member_name ?></td>
                            <td><?= $row->member_nid ?></td>
                            <td><?= $row->saving_plan_name ?></td>
                            <td><?= $row->sa_total_target ?></td>
                            <td><?= $row->sa_money_saving ?></td>
                            <td><?= $row->sa_total_installments ?></td>
                            <td><?= $row->sa_opening_date ?></td>
							<td>
                                    <div class="d-flex order-actions">
                                        <a href="<?=base_url()?>field_worker/edit_saving_account/<?=$row->sa_id?>" class="ms-3 border-primary"><i class="bx bxs-edit"></i></a>
                                        <a onclick="return confirm('are you sure?')" href="<?=base_url()?>field_worker/delete_saving_account/<?=$row->sa_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                    </div>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
