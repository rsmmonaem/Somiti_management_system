<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"><?=$title?></div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ইনভেস্ট সমূহ</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?= base_url()?>field_worker/add_invest" class="btn btn-primary"><i class="bx bx-plus-circle"></i> নতুন ইনভেস্ট নিব্ধন করুন </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase"><?=$title?></h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Invest type</th>
                            <th>Invest Amount</th>
                            <th>Invest Date</th>
                            <th>Invest Payment type</th>
                            <th>Invest Person name</th>
                            <th>Invest Person id</th>
							<th>Invest Person number</th>
                            <th>Invest Person address</th>
                            <th>Invest Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($data as $row): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row->invest_type?></td>
                                <td><?= $row->invest_amount?></td>
								<td><?= $row->invest_date?></td>
                                <td>
                                    <?php if ($row->invest_payment_type == 1){
                                        echo 'Cash';
                                    }elseif($row->invest_payment_type == 2){
                                        echo 'Check';
                                    }else{
                                        echo 'Others';
                                    }?>
                                </td>
                                <td><?= $row->invest_person_name?></td>
                                <td><?= $row->invest_person_id?></td>
								<td><?= $row->invest_person_number?></td>
								<td><?= $row->invest_person_address?></td>
								<td><?= $row->invest_person_id?></td>
								<td><?= $row->invest_description?></td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?= base_url()?>field_worker/edit_invest/<?= $row->invest_id?>" class="ms-3 border-primary"><i class="bx bxs-edit"></i></a>
                                        <a onclick="return confirm('are you sure?')" href="<?= base_url()?>/field_worker/invest_delete/<?= $row->invest_id ?>" class="ms-3 border-primary"><i class="bx bxs-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
