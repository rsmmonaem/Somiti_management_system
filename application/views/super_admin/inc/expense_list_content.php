<style>
	.card-body{
		text-align: center;
	}
</style>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ব্যয় লিস্ট </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ব্যয় লিস্টের তালিকা </li>
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
                <h4 class="mb-0 text-uppercase">ব্যয় লিস্ট  </h4>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>super_admin/add_expense" type="button" class="btn btn-primary"><i class="bx bx-plus-circle"></i> নতুন ব্যয় জোগ করুন</a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ব্যায়ের ধরন</th>
                            <th>নাম</th>
                            <th>ব্যায়ের পরিমাণ</th>
                            <th>তারিখ</th>
                            <th>পেমেন্টের বিষয়</th>
                            <th>ব্যায়ের বিষয়ে বর্ণনা</th>
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
                                <td><?= $row->expense_type?></td>
                                <td><?= $row->expense_name?></td>
                                <td><?= $row->expense_amount?></td>
                                <td><?= $row->expense_date?></td>
                                <td>
                                    <?php if ($row->expense_payment_type == 1) {
                                        echo 'Cash';
                                    }elseif($row->expense_payment_type == 2){
                                        echo 'Check';
                                    }else{
                                        echo 'Other';
                                    }
                                    ?>
                                </td>
                                <td><?= character_limiter($row->expense_description, 15)?></td>
                                <td><a href="<?= base_url()?>super_admin/expense_print/<?= $row->expense_id?>" class="btn btn-success"><i class="lni lni-printer"></i> Print</a></td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?= base_url()?>super_admin/edit_expense/<?= $row->expense_id?>" class="ms-3 border-warning"><i class="bx bxs-edit"></i></a>

                                        <a onclick="return confirm('are you sure?')" href="<?= base_url()?>super_admin/expense_delete/<?= $row->expense_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
