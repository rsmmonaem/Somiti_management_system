<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">এফ.ডি.আর ইন্টারেস্ট লিস্ট </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">এফ.ডি.আর ইন্টারেস্ট লিস্ট</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?= base_url()?>branch_manager/fdr_account" class="btn btn-primary"><i class="bx bx-plus-circle"></i>এফডিআর একাউন্ট </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 text-uppercase">এফ.ডি.আর ইন্টারেস্ট লিস্ট</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>মেম্বারের নাম</th>
                            <th>মাস </th>
                            <th>টাকার পরিমাণ </th>
                            <th>ইন্টারেস্ট প্রদানের তারিখ</th>
                            <th>এফ.ডি.আর সময়সীমা</th>
                            <th>ইন্টারেস্ট আমাউন্ট</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;

                        foreach ($fdrInterestList as $row):?>
                            <tr>
                                <td><?= $i++?> </td>
                                <td><?= $row->member_name?> </td>
                                <td><?= $row->fdr_int_month ?> </td>
                                <td><?= $row->fdr_int_amount ?> </td>
                                <td><?= $row->fdr_int_date ?> </td>
                                <td><?= $row->fdr_target_year ?> Year </td>
                                <td><?= $row->fdr_interest_amount	 ?> </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


