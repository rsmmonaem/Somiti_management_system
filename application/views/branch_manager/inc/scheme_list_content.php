<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">সঞ্চয় স্কিম প্ল্যান </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">সঞ্চয় স্কিম প্ল্যান</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4 class="mb-0 text-uppercase">সঞ্চয় স্কিম প্ল্যান</h4>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>branch_manager/add_saving_plan" class="btn btn-primary"><i class="bx bx-left-arrow"></i> নতুন স্কিম প্ল্যান </a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>স্কিম প্ল্যান</th>
                            <th>সর্বনিম্ন টাকা</th>
                            <th>মুনাফার হার</th>
                            <th>মুনাফা প্রদান</th>
                            <th>সঞ্চয় পণ্য সম্পর্কে</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($scheme as $row):?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row->saving_plan_name ?></td>
                                <td><?= $row->saving_plan_amount ?></td>
                                <td><?= $row->saving_plan_interest ?></td>
                                <td><?= $row->saving_plan_interest_give ?></td>
                                <td><?= $row->saving_plan_description ?></td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?=base_url()?>branch_manager/edit_saving_plan/<?=$row->saving_plan_id?>" class="ms-3 border-primary"><i class="bx bxs-edit"></i></a>
                                        <a onclick="return confirm('are you sure?')" href="<?=base_url()?>branch_manager/delete_saving_plan/<?=$row->saving_plan_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
