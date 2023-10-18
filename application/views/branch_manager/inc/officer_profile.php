

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">অফিসার প্রোফাইল </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">অফিসার </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?= base_url()?>branch_manager/add_officer" class="btn btn-primary"><i class="bx bx-plus-circle"></i> অফিসার যোগ করুন </a>
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
                                    <img src="<?= base_url()?>uploads/officer/<?= $data->officer_image?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="250px">
                                    <div class="mt-3">
                                        <h4><?= $data->officer_name?></h4>
                                        <p class="text-secondary mb-1"><?= $data->officer_phone?></p>
                                        <p class="text-secondary mb-1"><?= $data->officer_email?></p>
                                        <p class="text-muted font-size-sm"><?= $data->officer_address?></p>
										<p class="text-muted font-size-sm"><?= $data->officer_salary?></p>
                                        <a href="<?= base_url()?>branch_manager/edit_officer/<?= $data->officer_id?>" class="btn btn-warning "> এডিট করুন</a>
                                        <a href="<?= base_url()?>branch_manager/add_officer/" class="btn btn-primary">নতুন যোগ করুন</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>অফিসারের তথ্য</h3>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">অফিসারের নাম</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control disabled" value="<?= $data->officer_name?>"  readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">জাতীয় পরিচয়পত্রের নাম্বার </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control disabled" value="<?= $data->officer_nid?>"  readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"> অফিসারের রেজিস্ট্রেশন তারিখ </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control disabled" value="<?= $data->officer_registration_date?>"  readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">পিতার নাম</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->officer_father_name?>" readonly="readonly"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">মাতার নাম</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->officer_father_name?>" readonly="readonly"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">জন্ম তারিখ</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->officer_dob?>" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">লিঙ্গ</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="officer_gender" class="form-select" id="inputVendor" disabled>
                                            <option>Select Gender</option>
                                            <option value="1" <?php if ($data->officer_gender == 1){echo 'selected';}?>>Male</option>
                                            <option value="2" <?php if ($data->officer_gender == 2){echo 'selected';}?>>Female</option>
                                            <option value="3" <?php if ($data->officer_gender == 3){echo 'selected';}?>>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">ইমেল</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->officer_email?>" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">ফোন নাম্বার</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->officer_phone?>" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">ধর্ম</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="officer_religion" class="form-select" id="inputVendor" disabled>
                                            <option>Select Religion</option>
                                            <option value="1" <?php if ($data->officer_religion == 1){echo 'selected';}?>>Islam</option>
                                            <option value="2" <?php if ($data->officer_religion == 2){echo 'selected';}?>>Hindu</option>
                                            <option value="3" <?php if ($data->officer_religion == 3){echo 'selected';}?>>Christian</option>
                                            <option value="4" <?php if ($data->officer_religion == 4){echo 'selected';}?>>Buddhist</option>
                                            <option value="5" <?php if ($data->officer_religion == 5){echo 'selected';}?>>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">ঠিকানা</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="<?= $data->officer_address?>" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <a href="<?= base_url()?>branch_manager/edit_officer/<?= $data->officer_id?>" class="btn btn-warning px-4"> এডিট করুন</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
