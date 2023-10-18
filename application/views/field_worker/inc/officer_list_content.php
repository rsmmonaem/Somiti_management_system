<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">অফিসার</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">অফিসার লিস্ট</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?= base_url()?>field_worker/add_officer" class="btn btn-primary"><i class="bx bx-plus-circle"></i> অফিসার নিব্ধন করুন </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">অফিসার লিস্ট</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Officer Name</th>
                            <th>NID</th>
                            <th>Gender</th>
                            <th>Phone No.</th>
                            <th>Officer</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($data as $row): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><img class="img-fluid" src="<?= base_url()?>uploads/officer/<?= $row->officer_image?>" width="100px" height="100px"></td>
                                <td><?= $row->officer_name?></td>
                                <td><?= $row->officer_nid?></td>
                                <td>
                                    <?php if ($row->officer_gender == 1){
                                        echo 'Male';
                                    }elseif($row->officer_gender == 2){
                                        echo 'Female';
                                    }else{
                                        echo 'Others';
                                    }?>
                                </td>
                                <td><?= $row->officer_phone?></td>
                                <td><?= $row->officer_phone?></td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?= base_url()?>field_worker/edit_officer/<?= $row->officer_id?>" class="ms-3 border-primary"><i class="bx bxs-edit"></i></a>
                                        <a href="<?= base_url()?>field_worker/officer_profile/<?= $row->officer_id?>" class="text-primary ms-3 border-primary"><i class="lni lni-eye"></i></a>
                                        <a onclick="return confirm('are you sure?')" href="<?= base_url()?>/field_worker/officer_delete/<?= $row->officer_id?>" class="ms-3 border-primary"><i class="bx bxs-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
