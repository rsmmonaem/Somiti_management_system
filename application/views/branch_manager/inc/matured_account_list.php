<style>
	.card-body{
		text-align: center;
	}
</style>

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
                    <a href="<?=base_url()?>branch_manager/add_saving_account" class="btn btn-primary">নতুন সঞ্চয় একাউন্ট করুন</a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>নাম </th>
                            <th>এন.আই.ডি</th>
                            <th>সঞ্চয় প্ল্যান</th>
                            <th>দৈনিক টার্গেট</th>
                            <th> একাউন্ট খোলার তারিখ</th>
							<th>স্ট্যাটাস</th>
                            <th>একশন</th>
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
                                <td><?= $row->sa_opening_date ?></td>
								<td>
								<?php
									if ($row->sa_status == 'Active') {
										echo "<a href='" . base_url() . "branch_manager/matured_now/" . $row->sa_id . "' class='btn btn-success'>পরিপক্ক করুন</a>";
									} elseif ($row->sa_status == 'matured') {
										echo "<a href='" . base_url() . "branch_manager/active_now/" . $row->sa_id . "' class='btn btn-danger'>সক্রিয় করুন</a>";
									}
								?>

								</td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?=base_url()?>branch_manager/edit_saving_account/<?=$row->sa_id?>" class="ms-3 border-primary"><i class="bx bxs-edit"></i></a>
                                        <a onclick="return confirm('are you sure?')" href="<?=base_url()?>branch_manager/delete_saving_account/<?=$row->sa_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>

          </tbody>
                    </table>
                </div>
            </div>
        </div>
