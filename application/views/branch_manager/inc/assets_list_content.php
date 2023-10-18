<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">অফিস সম্পত্তি</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">সম্পত্তি লিস্ট</li>
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
                <h6 class="mb-0 text-uppercase">সম্পত্তি লিস্ট</h6>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>branch_manager/assets" class="btn btn-primary"><i class="bx bx-plus-circle"></i> নতুন সম্পত্তি যোগ করুন </a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>নাম</th>
                            <th>বর্তমান মূল্য</th>
                            <th>তারিখ</th>
                            <th>ক্রয় মূল্য</th>
                            <th>ক্রয়ের তারিখ</th>
                            <th>সম্পত্তির বিষয়ে বর্ণনা</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($data as $row): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row->assets_name?></td>
                                <td><?= $row->assets_price?></td>
                                <td><?= $row->assets_created_at?></td>
                                <td><?= $row->assets_buying_price?></td>
                                <td><?= $row->assets_buying_date?></td>
                                <td><?= character_limiter($row->assets_description, 20)  ?></td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?= base_url()?>branch_manager/edit_assets/<?= $row->assets_id?>" class="ms-3 border-primary"><i class="bx bxs-edit"></i></a>
                                        <!-- Button trigger modal -->
                                        <a href="" class="ms-3 border-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$row->assets_id?>">
                                            <i class="bx bxs-show text-black"></i>
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?=$row->assets_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-fullscreen-sm-down">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$row->assets_name?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mb-0">
                                                                <thead>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td width="30%"> নাম</td>
                                                                    <td><?= $row->assets_name ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">বর্তমান মূল্য</td>
                                                                    <td><?= $row->assets_price ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">তারিখ</td>
                                                                    <td><?= $row->assets_created_at ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">ক্রয় মূল্য</td>
                                                                    <td><?= $row->assets_buying_price ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">ক্রয়ের তারিখ</td>
                                                                    <td><?= $row->assets_buying_date ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">সম্পত্তির বিষয়ে বর্ণনা</td>
                                                                    <td><p><?= $row->assets_description ?></p></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <a onclick="return confirm('are you sure?')" href="<?= base_url()?>/branch_manager/assets_delete/<?= $row->assets_id?>" class="ms-3 border-primary"><i class="bx bxs-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
