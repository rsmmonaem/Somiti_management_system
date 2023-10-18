<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">মেম্বার প্রোফাইল </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">সাধারণ মেম্বার </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="<?= base_url()?>uploads/member/<?= $data->member_image?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="250px">
                                    <div class="mt-3">
                                        <h4><?= $data->member_name?></h4>
                                        <p class="text-secondary mb-1"><?= $data->member_phone?></p>
                                        <p class="text-secondary mb-1"><?= $data->member_email?></p>
                                        <p class="text-muted font-size-sm"><?= $data->member_address?></p>
                                        <p class="text-muted font-size-sm">একাউন্ট খোলার ডেটঃ <?= $data->member_registration_date?></p>
                                        <a href="<?= base_url()?>branch_manager/edit_member/<?= $data->member_id?>" class="btn btn-warning ">  এডিট করুন</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>সদস্যের তথ্য</h3>
                            </div>
                            <div class="card-body">

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">সদস্যের নাম</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control disabled" value="<?= $data->member_name?>"  readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">জাতীয় পরিচয়পত্রের নাম্বার </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control disabled" value="<?= $data->member_nid?>"  readonly="readonly"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">পিতার নাম</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->member_father_name?>" readonly="readonly"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">মাতার নাম</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->member_father_name?>" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">ব্যাবসা প্রতিষ্ঠানের নাম</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->member_business?>" readonly="readonly"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">জন্ম তারিখ</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->member_dob?>" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">লিঙ্গ</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="member_gender" class="form-select" id="inputVendor" disabled>
                                            <option>Select Gender</option>
                                            <option value="1" <?php if ($data->member_gender == 1){echo 'selected';}?>>Male</option>
                                            <option value="2" <?php if ($data->member_gender == 2){echo 'selected';}?>>Female</option>
                                            <option value="3" <?php if ($data->member_gender == 3){echo 'selected';}?>>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">ইমেল</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->member_email?>" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">ফোন নাম্বার</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->member_phone?>" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">পেশা</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->member_occupation?>" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">ধর্ম</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="member_religion" class="form-select" id="inputVendor" disabled>
                                            <option>Select Religion</option>
                                            <option value="1" <?php if ($data->member_religion == 1){echo 'selected';}?>>Islam</option>
                                            <option value="2" <?php if ($data->member_religion == 2){echo 'selected';}?>>Hindu</option>
                                            <option value="3" <?php if ($data->member_religion == 3){echo 'selected';}?>>Christian</option>
                                            <option value="4" <?php if ($data->member_religion == 4){echo 'selected';}?>>Buddhist</option>
                                            <option value="5" <?php if ($data->member_religion == 5){echo 'selected';}?>>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">ঠিকানা</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->member_address?>" readonly="readonly"/>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="text-success mb-1 text-center">নমিনির তথ্য</h5>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">সদস্যের নমিনির নাম</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control disabled" value="<?= $data->member_nominee_name?>"  readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">জাতীয় পরিচয়পত্রের নাম্বার </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control disabled" value="<?= $data->member_nominee_nid?>"  readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">সদস্যের নমিনির সম্পর্ক </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="member_nominee_relation" class="form-select" id="inputVendor" disabled>
                                            <option>Select</option>
                                            <option value="1" <?php if ($data->member_nominee_relation == 1){echo 'selected';}?>>Husband</option>
                                            <option value="2" <?php if ($data->member_nominee_relation == 2){echo 'selected';}?>>Wife</option>
                                            <option value="3" <?php if ($data->member_nominee_relation == 3){echo 'selected';}?>>Father</option>
                                            <option value="4" <?php if ($data->member_nominee_relation == 4){echo 'selected';}?>>Mother</option>
                                            <option value="5" <?php if ($data->member_nominee_relation == 5){echo 'selected';}?>>Sister</option>
                                            <option value="6" <?php if ($data->member_nominee_relation == 6){echo 'selected';}?>>Brother</option>
                                            <option value="7" <?php if ($data->member_nominee_relation == 7){echo 'selected';}?>>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">জন্ম তারিখ</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->member_nominee_dob?>" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">লিঙ্গ</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="member_gender" class="form-select" id="inputVendor" disabled>
                                            <option>Select Gender</option>
                                            <option value="1" <?php if ($data->member_nominee_gender == 1){echo 'selected';}?>>Male</option>
                                            <option value="2" <?php if ($data->member_nominee_gender == 2){echo 'selected';}?>>Female</option>
                                            <option value="3" <?php if ($data->member_nominee_gender == 3){echo 'selected';}?>>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">ফোন নাম্বার</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->member_nominee_phone?>" readonly="readonly"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">ঠিকানা</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->member_nominee_address?>" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <a href="<?= base_url()?>branch_manager/edit_member/<?= $data->member_id?>" class="btn btn-warning px-4"> এডিট করুন</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?php if (!empty($dps_account)) : ?>
                        <div class="card radius-10">
                            <div class="card-header bg-transparent">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">ডি পি এস আকাউন্ট</h6>
                                    </div>
                                    <div class="dropdown ms-auto">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example2" class="table align-middle mb-0">
                                        <thead class="table-light">
                                        <tr>
                                            <th>ছবি</th>
                                            <th>সদস্য</th>
                                            <th>ডি.পি.এস আকাউন্ট</th>
                                            <th>ডিপিএস প্লানের নাম</th>
                                            <th>রেজিস্টারের তারিখ</th>
                                            <th>কিস্তির টাকার পরিমাণ</th>
                                            <th>মুনাফাসহ আসল</th>
                                            <th>মুনাফা হার</th>
                                            <th>কিস্তির পরিমাণ</th>
                                            <th>টাকা কালেকশন</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($dps_account as $row):?>
                                            <tr>
                                                <td>
                                                    <img src="<?= base_url()?>uploads/member/<?= $row->member_image ?>" class="product-img-2" alt="product img">
                                                </td>
                                                <td><?= $row->member_name ?></td>
                                                <td><?= $row->dps_acc_id ?></td>
                                                <td><?= $row->dps_plan_name ?></td>
                                                <td><?= $row->dps_acc_reg_date?></td>
                                                <td><?= $row->dps_plan_amount?></td>
                                                <td><?= $row->dps_plan_total_amount?></td>
                                                <td><?= $row->dps_plan_interest?> %</td>
                                                <td><span class="small ">মোট কিস্তি <?= $row->dps_plan_installment?> টা</span>
                                                    <p class="small ">আর কিস্তি বাকি আছে <?= $row->dps_acc_installment?> টা</p>
                                                </td>
                                                <td><?= $row->dps_acc_amount_collected?></td>
                                            </tr>
                                        <?php endforeach;?>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php else : ?>

                        <?php endif; ?>

                        <?php if (!empty($dps_collection)) : ?>

                        <div class="card radius-10">
                            <div class="card-header bg-transparent">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">ডি পি এস কালেকশন </h6>
                                    </div>
                                    <div class="dropdown ms-auto">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>সদস্য</th>

                                            <th>ডিপিএস একাউন্ট</th>
                                            <th>ডিপিএস কালেকশনের তারিখ</th>
                                            <th>টাকার পরিমাণ</th>
                                            <th>টাকার পরিশোধের মাধ্যম</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($dps_collection as $row):?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $row->member_name?></td>
                                                <td><?= $row->dps_col_account_id?></td>

                                                <td><?= $row->dps_col_collect_date?></td>
                                                <td><?= $row->dps_col_amount?></td>
                                                <td><?php
                                                    if($row->dps_col_payment_type == 1){
                                                        echo "Cash";
                                                    }elseif ($row->dps_col_payment_type== 2){
                                                        echo "Check";
                                                    }elseif ($row->dps_col_payment_type == 3){
                                                        echo "Others";
                                                    }
                                                    ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <?php else : ?>

                        <?php endif; ?>


                        <?php if (!empty($loan_account)) : ?>
                        <div class="card radius-10">
                            <div class="card-header bg-transparent">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">ঋণ আকাউন্ট</h6>
                                    </div>
                                    <div class="dropdown ms-auto">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ঋণ <br/>গ্রহীতার নাম</th>
                                            <th>ঋণ একাউন্ট</th>
                                            <th>ঋণের <br/>টাকার পরিমাণ</th>
                                            <th>জমিনদার</th>
                                            <th>সুদের<br/>হার</th>
                                            <td>সুদসহ <br/> টাকার পরিমাণ</td>
                                            <td>কিস্তি</td>
                                            <td>রেজিস্টারের তারিখ</td>
                                            <td>টাকা <br> পরিশোধের  মাধ্যম</td>
                                            <td>Status</td>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php

                                        $i = 1;
                                        foreach ($loan_account as $row): ?>

                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $row->member_name?></td>
                                                <td><?= $row->loans_id?></td>
                                                <td><?= $row->loans_amount?></td>
                                                <td><?= $row->guarantor_name?></td>
                                                <td><?= $row->loans_profit_rate?> % </td>
                                                <td>
                                                    <div class="small">
                                                        <p>সুদসহ <?= $row->loans_payment_amount?> টাকা</p>
                                                        <p class="text-primary">টাকা পরিশোধ করেছে <?= $row->loan_amount_collection?> টাকা</p>
                                                        <p class="text-primary">টাকা বাকি আছে  <?= $row->loans_payment_amount - $row->loan_amount_collection?> টাকা</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="small">
                                                        <p>মোট কিস্তি <?= $row->loans_profit_installments?>  টা</p>
                                                        <p class="text-primary">কিস্তি প্রদান করেছে <?= $row->loans_total_installment?> টা</p>
                                                        <p class="text-primary">কিস্তি বাকি আছে <?= $row->loans_profit_installments- $row->loans_total_installment   ?> টা</p>
                                                    </div>


                                                </td>
                                                <td><?= $row->loans_registration_date?></td>
                                                <td><?php if ( $row->loans_paid_type==1){
                                                        echo "Cash";
                                                    }elseif ($row->loans_paid_type==2){
                                                        echo "Check";
                                                    }elseif ($row->loans_paid_type==3){
                                                        echo "Others";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php if ( $row->loans_status == 1){
                                                        echo "Active";
                                                    }elseif ($row->loans_status == 2){
                                                        echo "Inactive";
                                                    }
                                                    ?></td>
                                                <td>
                                                    <div class="d-flex order-actions">
                                                        <a href="<?= base_url()?>branch_manager/edit_loans/<?= $row->loans_id?>" class="ms-3 border-warning"><i class="bx bxs-edit"></i></a>
                                                        <a onclick="return confirm('are you sure?')" href="<?= base_url()?>branch_manager/loans_delete/<?= $row->loans_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php else : ?>

                        <?php endif; ?>


                        <?php if (!empty($loan_collection)) : ?>
                        <div class="card radius-10">
                            <div class="card-header bg-transparent">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">ঋণ কালেকশন </h6>
                                    </div>
                                    <div class="dropdown ms-auto">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>নাম</th>
                                            <th>ঋণ একাউন্ট নাম্বার</th>
                                            <th>তারিখ</th>
                                            <th>টাকা জমা করেছেন</th>
                                            <th>পরিশোধের মাধ্যম</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($loan_collection as $row):?>
                                            <tr>
                                                <td><?= $i++;?></td>
                                                <td><?= $row->member_name?></td>
                                                <td><?= $row->dlc_loans_id?></td>
                                                <td><?= $row->dlc_date?></td>
                                                <td><?= $row->dlc_amount?></td>
                                                <td><?php if ($row->dlc_amount_type == 1){
                                                        echo "Cash";
                                                    }elseif($row->dlc_amount_type == 2){
                                                        echo "Check";
                                                    }else{
                                                        echo "Others";
                                                    }

                                                    ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <?php else : ?>

                        <?php endif; ?>


                        <?php if (!empty($saving_account)) : ?>
                        <div class="card radius-10">
                            <div class="card-header bg-transparent">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">সঞ্চয় একাউন্ট</h6>
                                    </div>
                                    <div class="dropdown ms-auto">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>সদস্যের <br> নাম </th>
                                            <th>একাউন্ট নাম্বার</th>
                                            <th>এন আই ডি</th>
                                            <th>সেভিং প্লান</th>
                                            <th>সেভিং <br> টার্গেট</th>
                                            <th>মোট <br> টাকা জমা </th>
                                            <th>মোট কিস্তি</th>
                                            <th>একাউন্ট <br>
                                                রেজিস্টারের <br> তারিখ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($saving_account as $row):?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $row->member_name ?></td>
                                                <td><?= $row->sa_id ?></td>
                                                <td><?= $row->member_nid ?></td>
                                                <td><?= $row->saving_plan_name ?></td>
                                                <td><?= $row->sa_total_target ?></td>
                                                <td><?= $row->sa_money_saving ?></td>
                                                <td><?= $row->sa_total_installments ?></td>
                                                <td><?= $row->sa_opening_date ?></td>

                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <?php else : ?>

                        <?php endif; ?>

                        <?php if (!empty($fdr_account)) : ?>
                        <div class="card radius-10">
                            <div class="card-header bg-transparent">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">সঞ্চয় একাউন্ট</h6>
                                    </div>
                                    <div class="dropdown ms-auto">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>মেম্বারের নাম</th>
                                            <th>এফ.ডি.আর মূল টাকা</th>
                                            <th>রেজিস্টারের তারিখ</th>
                                            <th>এফ.ডি.আর সময়সীমা</th>
                                            <th>ইন্টারেস্ট</th>
                                            <th>ইন্টারেস্টের পরিমাণ</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($fdr_account as $row):?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $row->member_name ?></td>
                                                <td><?= $row->fdr_amount ?></td>
                                                <td><?= $row->fdr_register_date ?></td>
                                                <td><?= $row->fdr_target_year ?> বছর</td>
                                                <td><?= $row->fdr_interest ?>%</td>
                                                <td><?= $row->fdr_interest_amount ?></td>
                                                <td><?php if ($row->fdr_status == 1){echo "Active";}elseif ($row->fdr_status == 2){echo "Inactive";} ?></td>
                                                <td>
                                                    <div class="d-flex order-actions">
                                                        <a href="<?= base_url()?>branch_manager/edit_fdr/<?= $row->fdr_id?>" class="ms-3 border-primary"><i class="bx bxs-edit"></i></a>
                                                        <a onclick="return confirm('are you sure?')" href="<?= base_url()?>branch_manager/fdr_delete/<?= $row->fdr_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                                    </div>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <?php else : ?>

                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </div>
