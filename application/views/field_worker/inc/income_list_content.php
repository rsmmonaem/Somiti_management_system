<style>
	.card-body{
		text-align: center;
	}
</style>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">আয় লিস্ট </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">আয় লিস্টের তালিকা </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?= base_url()?>field_worker/add_income" type="button" class="btn btn-primary"><i class="bx bx-plus-circle"></i> নতুন আয় জোগ করুন</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 text-uppercase">আয় লিস্ট  </h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>আয়ের ধরন</th>
                            <th>নাম</th>
                            <th>আয়ের পরিমাণ</th>
                            <th>তারিখ</th>
                            <th>পেমেন্টের বিষয়</th>
                            <th>আয়ের বিষয়ে বর্ণনা</th>
                            <th>প্রিন্ট</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($data as $row): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row->income_type?></td>
                                <td><?= $row->income_name?></td>
                                <td><?= $row->income_amount?></td>
                                <td><?= $row->income_date?></td>
                                <td>
                                    <?php if ($row->income_payment_type == 1) {
                                        echo 'Cash';
                                    }elseif($row->income_payment_type == 2){
                                        echo 'Check';
                                    }else{
                                        echo 'Other';
                                    }
                                    ?>
                                </td>
                                <td><?= character_limiter($row->income_description, 15)?></td>
                                <td><a href="<?= base_url()?>field_worker/income_print/<?= $row->income_id?>" class="btn btn-success"><i class="lni lni-printer"></i> Print</a></td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?= base_url()?>field_worker/edit_income/<?= $row->income_id?>" class="ms-3 border-warning"><i class="bx bxs-edit"></i></a>

                                        <a onclick="return confirm('are you sure?')" href="<?= base_url()?>field_worker/income_delete/<?= $row->income_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
