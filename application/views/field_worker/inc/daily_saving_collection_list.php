
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">প্রতিদিনের সঞ্চয় জমা লিস্ট </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">প্রতিদিনের সঞ্চয় জমা লিস্ট</li>
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
                <h4 class="mb-0 text-uppercase">সঞ্চয় জমা লিস্ট</h4>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>field_worker/daily_saving_collection" class="btn btn-primary"><i class="bx bx-plus-circle"></i> সঞ্চয় জমা করুন </a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> সঞ্চয় আইডি</th>
                            <th>সদস্য নাম</th>
                            <th>সঞ্চয় প্লেন</th>
                            <th>সঞ্চয় পরিশোধের পদ্ধতি</th>
                            <th>পরিমাণ</th>
                            <th>তারিখ</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($data as $row):?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td>
									<?= $row->dsc_saving_id ?>
								</td>
                                <td>
								<?php
										$result = $this->db->get_where('member', ['member_id' => $row->dsc_member_id])->row();
										if ($result) {
											echo $result->member_name;									
										} else {
											echo "member not found";
										}
								?>
								</td>
                                <td>
								<?php
										$result = $this->db->get_where('saving_plan', ['saving_plan_id ' => $row->sa_plan_id])->row();
										if ($result) {
											echo $result->saving_plan_name;									
										} else {
											echo " not found";
										}
								?>

								</td>
								<td>

								<?php if ($row->dsc_payment_type == 1) {
                                        echo 'ক্যাশ';
                                    }elseif($row->dsc_payment_type == 2){
                                        echo 'চেক';
                                    }else{
                                        echo 'অন্যান্য';
                                    }
                                ?>
								</td>
                                <td><?= $row->dsc_amount ?></td>
								<td><?= $row->dsc_collect_date ?></td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?= base_url()?>field_worker/edit_ds_collection/<?= $row->dsc_id?>" class="ms-3 border-primary"><i class="bx bxs-edit"></i></a>
                                        <a onclick="return confirm('are you sure?')" href="<?= base_url()?>field_worker/ds_collection_delete/<?= $row->dsc_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
