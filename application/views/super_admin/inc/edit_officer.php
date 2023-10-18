<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Officer</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update Officer</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title"><?=$title?></h5>
                <hr/>
                <form action="<?= base_url();?>super_admin/update_officer/" method="post" enctype="multipart/form-data">
				<div class="form-body mt-4">
                        <div class="row border border-1">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">নিবন্ধনের তারিখ</label>
                                    <input type="date" class="form-control" id="inputProductTitle" value="<?=$data->officer_registration_date?>" name="officer_registration_date">
                                </div>
                            </div>
							<input type="hidden" name="officer_id" value="<?=$data->officer_id?>">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">অফিসারের নাম <label class="text-danger"> *</label></label>
                                    <input type="text" value="<?=$data->officer_name?>" name="officer_name" class="form-control" id="name" placeholder="Example: Durjay Ghosh">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">পিতার নাম <label class="text-danger"> *</label></label>
                                    <input type="text" value="<?=$data->officer_father_name?>" name="officer_father_name" class="form-control" id="name" placeholder="Father Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">মাতার নাম <label class="text-danger"> *</label></label>
                                    <input type="text" value="<?=$data->officer_mother_name?>" name="officer_mother_name" class="form-control" id="business" placeholder="Mother Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">জন্ম তারিখ <label class="text-danger"> *</label></label>
                                    <input type="date" value="<?=$data->officer_dob?>" name="officer_dob" class="form-control" id="inputProductTitle">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">এন আই ডি নাম্বার / জন্ম নিবন্ধন নাম্বার  <label class="text-danger"> *</label></label>
                                    <input type="number" value="<?=$data->officer_nid?>"  name="officer_nid" class="form-control" id="number" placeholder="NID or Birth Registration Number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">লিঙ্গ <label class="text-danger"> *</label></label>
                                    <select name="officer_gender" class="form-select" id="inputVendor">
                                        <option>Select Gender</option>
										<option value="1" <?php if ($data->officer_gender == 1){echo 'selected';}?>>Male</option>
                                        <option value="2" <?php if ($data->officer_gender == 2){echo 'selected';}?>>Female</option>
										<option value="3" <?php if ($data->officer_gender == 3){echo 'selected';}?>>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">ধর্ম </label>
                                    <select name="officer_religion" class="form-select" id="inputVendor">
                                        <option>Select Religion</option>
										<option value="1" <?php if ($data->officer_gender == 1){echo 'selected';}?>>Islam</option>
                                        <option value="2" <?php if ($data->officer_gender == 2){echo 'selected';}?>>Hindu</option>
										<option value="3" <?php if ($data->officer_gender == 3){echo 'selected';}?>>Christian</option>
										<option value="4" <?php if ($data->officer_gender == 4){echo 'selected';}?>>Buddhist</option>
                                        <option value="5" <?php if ($data->officer_gender == 5){echo 'selected';}?>>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">ই-মেইল</label>
                                    <input type="email" value="<?=$data->officer_email?>" name="officer_email" class="form-control" id="inputProductTitle" placeholder="Emaill Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">মোবাইল নাম্বার<label class="text-danger"> *</label></label>
                                    <input type="tel"  value="<?=$data->officer_phone?>" name="officer_phone" class="form-control" id="phone" placeholder="017XXXXXXXXX2">
                                </div>
                            </div>

							<div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">ছবি<label class="text-danger"> *</label></label>
                                    <input type="file" name="officer_image" id="" class="form-control">
                                    <input type="hidden" name="old_image" value="<?=$data->officer_image?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Existing Image</label>
                                    <img class="img-thumbnail" style="max-width: 200px;" src="<?= base_url();?>uploads/officer/<?= $data->officer_image?>" alt="" class="img-fluid">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Officer Status<label class="text-danger"> *</label></label>
                                    <select name="officer_status" class="form-select" id="inputVendor">
                                        <option>Select</option>
										<option value="1" <?php if ($data->officer_status == 1){echo 'selected';}?>>Active</option>
                                        <option value="2" <?php if ($data->officer_status == 2){echo 'selected';}?>>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Officer Type<label class="text-danger"> *</label></label>
                                    <select name="officer_type" class="form-select" id="inputVendor">
                                        <option>Select</option>
										<option value="field_worker" <?php if ($data->officer_type == 'field_worker'){echo 'selected';}?>>Field Worker</option>
                                        <option value="branch_manager" <?php if ($data->officer_type == 'branch_manager'){echo 'selected';}?>>Manager</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">ইউজার নাম<label class="text-danger"> *</label></label>
                                    <input type="text" value="<?=$data->officer_username?>" name="officer_username" class="form-control" id="phone" placeholder="ইউজার নাম"  readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">পাসওয়ার্ড<label class="text-danger"> *</label></label>
                                    <input type="text" value="<?=$data->officer_password?>" name="officer_password" class="form-control disabled" id="phone" placeholder="পাসওয়ার্ড">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">ঠিকানা <label class="text-danger"> *</label></label>
                                    <input type="text" value="<?=$data->officer_address?>" name="officer_address" class="form-control" id="address" placeholder="Majhira, Shajahanpur, Bogura">
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
