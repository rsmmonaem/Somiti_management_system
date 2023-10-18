
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">সদস্য</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"> সদস্য লিস্ট </li>
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
                <h4 class="mb-0 text-uppercase"> সদস্য লিস্ট </h4>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>field_worker/add_member" class="btn btn-primary"><i class="bx bx-plus-circle"></i> নতুন সদস্য যোগ করুন</a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Member Name</th>
                            <th>NID</th>
                            <th>Gender</th>
                            <th>Phone No.</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($data as $row): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><img class="img-fluid" src="<?= base_url()?>uploads/member/<?= $row->member_image?>" width="150px" height=""></td>
                            <td><?= $row->member_name?></td>
                            <td><?= $row->member_nid?></td>
                            <td>
                            <?php if ($row->member_gender == 1){
                                echo 'Male';
                                }elseif($row->member_gender == 2){
                                echo 'Female';
                                }else{
                                echo 'Others';
                            }?>
                            </td>
                            <td><?= $row->member_phone?></td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="<?= base_url()?>field_worker/edit_member/<?= $row->member_id?>" class="ms-3"><i class="bx bxs-edit"></i></a>
                                    <a href="<?= base_url()?>field_worker/member_profile/<?= $row->member_id?>" class="text-primary ms-3"><i class="lni lni-eye"></i></a>
                                    <a onclick="return confirm('are you sure?')" href="<?= base_url()?>/field_worker/department_delete/<?= $row->member_id?>" class="ms-3"><i class="bx bxs-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                      <?php endforeach;?>

          </tbody>
                    </table>
                </div>
            </div>
        </div>
