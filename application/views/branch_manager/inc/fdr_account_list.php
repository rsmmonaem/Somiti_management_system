<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">এফডিআর একাউন্ট </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">এফডিআর একাউন্ট লিস্ট</li>
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
            <div class="card-header">
                <h4 class="mb-0 text-uppercase">এফডিআর একাউন্ট লিস্ট</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>মেম্বারের নাম</th>
                            <th>এফ.ডি.আর মূল টাকা</th>
                            <th>রেজিস্টারের তারিখ</th>
                            <th>এফ.ডি.আর সময়সীমা</th>
                            <th>ইন্টারেস্ট</th>
                            <th>ইন্টারেস্টের পরিমাণ</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($fdrList as $row):?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row->member_name ?></td>
                                <td><?= $row->fdr_amount ?></td>
                                <td><?= $row->fdr_register_date ?></td>
                                <td><?= $row->fdr_target_year ?> বছর</td>
                                <td><?= $row->fdr_interest ?>%</td>
                                <td><?= $row->fdr_interest_amount ?></td>
                                <td><?php if ($row->fdr_status == 1){echo "Active";}elseif ($row->fdr_status == 2){echo "Inactive";} ?></td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?= base_url()?>branch_manager/edit_fdr/<?= $row->fdr_id?>" class="ms-3 border-primary"><i class="bx bxs-edit"></i></a>
                                        <a onclick="return confirm('are you sure?')" href="<?= base_url()?>branch_manager/fdr_delete/<?= $row->fdr_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


