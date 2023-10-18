<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Member</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update Member</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Update Member</h5>
                <hr/>
                <form action="<?= base_url();?>field_worker/update_member/" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Member Officer</label>

                                    <select name="member_officer" class="form-select" id="single-select-field" data-placeholder="অফিসার সিলেক্ট করুন">
                                        <option></option>
                                        <?php foreach ($officer as $row):?>
                                            <option value="<?= $row->officer_id?>" <?php if ($data->member_officer == $row->officer_id){echo 'selected';}?>><?= $row->officer_id?> - <?= $row->officer_name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Registration Date</label>
                                    <input type="date" class="form-control" id="inputProductTitle" name="member_registration_date" value="<?= $data->member_registration_date?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Member Name <label class="text-danger"> *</label></label>
                                    <input type="text" name="member_name" class="form-control" id="name" placeholder="Example: Durjay Ghosh" value="<?= $data->member_name?>">
                                    <input type="hidden" name="member_id" value="<?=$data->member_id?>">
                                    <span class="text-danger"><?= form_error('member_name'); ?></span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Business Name <label class="text-primary"> (Optional)</label></label>
                                    <input type="text" class="form-control" id="business" placeholder="Example: Maa Cloth Store" name="member_business" value="<?= $data->member_business?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Father Name <label class="text-danger"> *</label></label>
                                    <input type="text" name="member_father_name" class="form-control" id="name" placeholder="Father Name" value="<?= $data->member_father_name?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Mother Name <label class="text-danger"> *</label></label>
                                    <input type="text" name="member_mother_name" class="form-control" id="business" placeholder="Mother Name" value="<?= $data->member_mother_name?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Date Of Birth <label class="text-danger"> *</label></label>
                                    <input type="date" name="member_dob" class="form-control" id="inputProductTitle" value="<?= $data->member_dob?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">NID / Birth Registration Number <label class="text-danger"> *</label></label>
                                    <input type="number" name="member_nid" class="form-control" id="number" placeholder="NID or Birth Registration Number" value="<?= $data->member_nid?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Gender <label class="text-danger"> *</label></label>
                                    <select name="member_gender" class="form-select" id="inputVendor" >
                                        <option>Select Gender</option>
                                        <option value="1" <?php if ($data->member_gender == 1){echo 'selected';}?>>Male</option>
                                        <option value="2" <?php if ($data->member_gender == 2){echo 'selected';}?>>Female</option>
                                        <option value="3" <?php if ($data->member_gender == 3){echo 'selected';}?>>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Religion </label>
                                    <select name="member_religion" class="form-select" id="inputVendor">
                                        <option>Select Religion</option>
                                        <option value="1" <?php if ($data->member_religion == 1){echo 'selected';}?>>Islam</option>
                                        <option value="2" <?php if ($data->member_religion == 2){echo 'selected';}?>>Hindu</option>
                                        <option value="3" <?php if ($data->member_religion == 3){echo 'selected';}?>>Christian</option>
                                        <option value="4" <?php if ($data->member_religion == 4){echo 'selected';}?>>Buddhist</option>
                                        <option value="5" <?php if ($data->member_religion == 5){echo 'selected';}?>>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Occupation</label>
                                    <input type="text" name="member_occupation" class="form-control" id="Occupation" placeholder="Occupation" value="<?= $data->member_occupation?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">E-mail Address</label>
                                    <input type="email" name="member_email" class="form-control" id="inputProductTitle" placeholder="Emaill Address" value="<?= $data->member_email?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number <label class="text-danger"> *</label></label>
                                    <input type="tel" name="member_phone" class="form-control" id="phone" placeholder="Email Address" value="<?= $data->member_phone?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Address<label class="text-danger"> *</label></label>
                                    <input type="text" name="member_address" class="form-control" id="address" placeholder="Majhira, Shajahanpur, Bogura" value="<?= $data->member_address?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Member Image<label class="text-danger"> *</label></label>
                                    <input type="file" name="member_image" id="" class="form-control">
                                    <input type="hidden" name="old_image" value="<?=$data->member_image?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Existing Image</label>
                                    <img class="img-thumbnail" style="max-width: 200px;" src="<?= base_url();?>uploads/member/<?= $data->member_image?>" alt="">
                                </div>
                            </div>

                            <h6 class="text-success mt-2 mb-0">Nominee Details</h6>
                            <hr>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Relationship with Nominee <label class="text-danger"> *</label></label>
                                    <select name="member_nominee_relation" class="form-select" id="inputVendor">
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
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Nominee Name <label class="text-danger"> *</label></label>
                                    <input type="text" name="member_nominee_name" class="form-control" id="name" placeholder="Example: Durjay Ghosh" value="<?= $data->member_nominee_name?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Date Of Birth <label class="text-danger"> *</label></label>
                                    <input type="date" name="member_nominee_dob" class="form-control" id="inputProductTitle" value="<?= $data->member_nominee_dob?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">NID / Birth Registration Number <label class="text-danger"> *</label></label>
                                    <input type="number"  name="member_nominee_nid" class="form-control" id="number" placeholder="NID or Birth Registration Number" value="<?= $data->member_nominee_nid?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Gender <label class="text-danger"> *</label></label>
                                    <select name="member_nominee_gender" class="form-select" id="inputVendor">
                                        <option>Select Gender</option>
                                        <option value="1" <?php if ($data->member_nominee_gender == 1){echo 'selected';}?>>Male</option>
                                        <option value="2" <?php if ($data->member_nominee_gender == 2){echo 'selected';}?>>Female</option>
                                        <option value="3" <?php if ($data->member_nominee_gender == 3){echo 'selected';}?>>Others</option>
                                        </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Contact Number <label class="text-danger"> *</label></label>
                                    <input type="tel" name="member_nominee_phone" class="form-control" id="phone" placeholder="Phone Number" value="<?= $data->member_nominee_phone?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Address  <label class="text-danger"> *</label></label>
                                    <input type="text" name="member_nominee_address" class="form-control" id="phone" placeholder="Majhira, Shajahanpur, Bogura" value="<?= $data->member_nominee_address?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-2 mb-3">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>

            </div>
        </div>

        <?php if ($this->session->flashdata('error')): ?>
            <script>
                iziToast.error({
                    title: 'Error',
                    position:'topRight',
                    message: '<?php echo $this->session->flashdata('error'); ?>',
                });
            </script>
        <?php endif; ?>


        <?php if (isset($_SESSION['success'])): ?>
        <script>
            iziToast.success({
                title: 'Success',
                position:'topRight',
                message: ' <?php echo $_SESSION['success']; ?>',
            });
        </script>

        <?php unset($_SESSION['success']); ?>

<?php endif; ?>
