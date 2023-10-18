<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">অফিসার</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">নতুন অফিসার</li>
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
                <h5 class="card-title">নতুন অফিসার নিবন্ধন করুন</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>branch_manager/officer_list" class="btn btn-primary"><i class="bx bx-arrow-back"></i> অফিসার লিস্ট দেখুন </a>

                </div>
            </div>
            <div class="card-body p-4">

                <form action="<?= base_url();?>branch_manager/save_officer" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">নিবন্ধনের তারিখ</label>
                                    <input type="date" class="form-control" id="inputProductTitle" name="officer_registration_date">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">অফিসারের নাম <label class="text-danger"> *</label></label>
                                    <input type="text" name="officer_name" class="form-control" id="name" placeholder="Example: Durjay Ghosh" required="required">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">পিতার নাম <label class="text-danger"> *</label></label>
                                    <input type="text" name="officer_father_name" class="form-control" id="name" placeholder="Father Name" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">মাতার নাম <label class="text-danger"> *</label></label>
                                    <input type="text" name="officer_mother_name" class="form-control" id="business" placeholder="Mother Name" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">জন্ম তারিখ <label class="text-danger"> *</label></label>
                                    <input type="date" name="officer_dob" class="form-control" id="inputProductTitle" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">এন আই ডি নাম্বার / জন্ম নিবন্ধন নাম্বার  <label class="text-danger"> *</label></label>
                                    <input type="number" name="officer_nid" class="form-control" id="number" placeholder="NID or Birth Registration Number" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">লিঙ্গ <label class="text-danger"> *</label></label>
                                    <select name="officer_gender" class="form-select" id="inputVendor" required="required">
                                        <option>Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">ধর্ম </label>
                                    <select name="officer_religion" class="form-select" id="inputVendor" required="required">
                                        <option>Select Religion</option>
                                        <option value="1">Islam</option>
                                        <option value="2">Hindu</option>
                                        <option value="3">Christian</option>
                                        <option value="4">Buddhist</option>
                                        <option value="5">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">ই-মেইল</label>
                                    <input type="email" name="officer_email" class="form-control" id="inputProductTitle" placeholder="Emaill Address" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">মোবাইল নাম্বার<label class="text-danger"> *</label></label>
                                    <input type="tel" name="officer_phone" class="form-control" id="phone" placeholder="017XXXXXXXXX2" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">ছবি <label class="text-danger"> *</label></label>
                                    <input type="file" name="officer_image" id="" class="form-control" required="required">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Officer Status<label class="text-danger"> *</label></label>
                                    <select name="officer_status" class="form-select" id="inputVendor"  required="required">
                                        <option>Select</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Officer Type<label class="text-danger"> *</label></label>
                                    <select name="officer_type" class="form-select" id="inputVendor"  required="required">
                                        <option>Select</option>
                                        <option value="field_worker">Field Worker</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">ইউজার নাম<label class="text-danger"> *</label></label>
                                    <input type="text" name="officer_username" class="form-control" id="phone" placeholder="ইউজার নাম" value="<?= random_int(100000, 999999); ?>"  readonly="readonly">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">পাসওয়ার্ড<label class="text-danger"> *</label></label>
                                    <input type="text" name="officer_password" class="form-control disabled" id="phone" placeholder="পাসওয়ার্ড" value="<?= random_int(100000, 999999); ?>"  readonly="readonly">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">বেতন <label class="text-danger"> *</label></label>
                                    <input type="text" name="officer_salary" class="form-control" id="name" placeholder="Example: 10000"  required="required">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">ঠিকানা <label class="text-danger"> *</label></label>
                                    <input type="text" name="officer_address" class="form-control" id="address" placeholder="Majhira, Shajahanpur, Bogura" required="required">
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
