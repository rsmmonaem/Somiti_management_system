<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">এফডিআর ইন্টারেস্ট </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">এফডিআর ইন্টারেস্ট লিস্ট</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?= base_url()?>field_worker/fdr_account" class="btn btn-primary"><i class="bx bx-plus-circle"></i>এফডিআর ইন্টারেস্ট একাউন্ট </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 text-uppercase">এফডিআর ইন্টারেস্ট </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="text-center">
                        <h2><?php //$transdate = date('m-d-Y', time());
                           echo date('F, Y');

                        ?></h2>
                    </div>
                    <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>মেম্বারের নাম</th>
                            <th>একাউন্ট নাম্বার</th>
                            <th>এফ.ডি.আর মূল টাকা</th>

                            <th>রেজিস্টারের তারিখ</th>
                            <th>এফ.ডি.আর সময়সীমা</th>
                            <th>ইন্টারেস্ট আমাউন্ট</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;

                        foreach ($fdr_interest as $row):?>
                        <tr>
                            <td><?= $i++?> </td>
                            <td><?= $row->member_name?> </td>
                            <td><?= $row->fdr_id ?> </td>
                            <td><?= $row->fdr_amount ?> </td>
                            <td><?= $row->fdr_register_date ?> </td>
                            <td><?= $row->fdr_target_year ?> Year </td>
                            <td><?= $row->fdr_interest_amount	 ?> </td>
                            <td><a href="<?= base_url()?>field_worker/interest_generate/<?= $row->fdr_id?>" class="btn btn-success"><i class="lni lni-revenue"></i> Interest</a></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


