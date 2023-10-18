<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">জামিনদার </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">জামিনদার লিস্টের তালিকা </li>
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
                <h5 class="card-title">জামিনদার লিস্ট</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>field_worker/add_guarantor" class="btn btn-primary"><i class="bx bx-plus-circle"></i> নতুন জামিনদার </a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>নাম</th>
                            <th>পেশা</th>
                            <th>ফোন</th>
                            <th>ইমেইল</th>
                            <th>ঠিকানা</th>
                            <th>রিলেশন</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($grnt as $row):?>
                        <tr>
                            <td><?= $i++?></td>
                            <td><?= $row->guarantor_name?></td>
                            <td><?= $row->guarantor_occu?></td>
                            <td><?= $row->guarantor_phone?></td>
                            <td><?= $row->guarantor_email?></td>
                            <td><?= $row->guarantor_address?></td>
                            <td><?= $row->guarantor_related?></td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="<?= base_url()?>field_worker/edit_guarantor/<?= $row->guarantor_id?>" class="ms-3 border-primary"><i class="bx bxs-edit"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="<?= base_url()?>field_worker/delete_guarantor/<?= $row->guarantor_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
