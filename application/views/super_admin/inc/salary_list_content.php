<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">বেতন</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">বেতন লিস্ট</li>
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
                <h6 class="mb-0 text-uppercase">বেতন লিস্ট</h6>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>super_admin/add_salary" class="btn btn-primary"><i class="bx bx-plus-circle"></i> বেতন প্রদান করুন </a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>অফিসারের নাম</th>
                            <th>প্রদানের তারিখ</th>
                            <th>পরিশোধের পদ্ধতি</th>
                            <th>মাসের নাম </th>
                            <th>বোনাস</th>
                            <th>মূল বেতন</th>
                            <th>মোট বেতন</th>
                            <th>Action</th>
                        </tr>
                        </thead>

						<tbody>
                        <?php
                        $i = 1;
                        foreach ($salary as $row):?>
                        <tr>
							<td> <?= $i++; ?></td>
                            <td> 
								<?php
									$result = $this->db->get_where('officer', ['officer_id' => $row->salary_officer_id])->row();
									if ($result) {
										echo $result->officer_name;									
									} else {
										echo "guarantor not found";
									}
								?>
								
							</td>
                            <td><?= $row->salary_date ?></td>
                            <td>
							<?php if ($row->salary_paid_type == 1){
                                            echo "ক্যাশ";
                                        }elseif($row->salary_paid_type == 2){
                                            echo "চেক";
                                        }else{
                                            echo "অন্যন্য";
                                        }

                            ?>
							</td>
                            <td> <?= date("F", strtotime($row->salary_month)) ?></td>
							<td> <?= $row->salary_bonus ?></td>
							<td> <?= $row->salary_amount ?></td>
                            <td><?= $row->total_salary ?></td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="<?= base_url()?>super_admin/edit_member/" class="ms-3 border-primary"><i class="bx bxs-edit"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="<?= base_url()?>/super_admin/salary_delete/<?= $row->salary_id?>" class="ms-3 border-primary"><i class="bx bxs-trash"></i></a>
                                </div>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
