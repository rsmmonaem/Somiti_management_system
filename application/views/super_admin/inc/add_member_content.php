<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">সদস্য</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">নতুন সদস্য যোগ করুন</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title">নতুন সদস্য যোগ করুন</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>super_admin/member_list" class="btn btn-primary"><i class="bx bx-left-arrow"></i> সদস্য লিস্ট </a>

                </div>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url();?>super_admin/save_member" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">অফিসার সিলেক্ট করুন <label class="text-danger"> *</label></label>
                                    <select required name="member_officer" class="form-select" id="single-select-field" data-placeholder="অফিসার সিলেক্ট করুন">
                                        <option></option>
                                        <?php foreach ($officer as $row):?>
                                            <option value="<?= $row->officer_id?>"><?= $row->officer_id?> - <?= $row->officer_name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">রেজিষ্ট্রেশন তারিখ <label class="text-danger"> *</label></label>
                                    <input required type="date" class="form-control" id="inputProductTitle" name="member_registration_date">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">সদস্যের নাম <label class="text-danger"> *</label></label>
                                    <input required type="text" name="member_name" class="form-control" id="name" placeholder="Example: Durjay Ghosh">
                                    <span class="text-danger"><?= form_error('member_name'); ?></span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">  ব্যবসায়ের নাম <label class="text-primary"> (Optional)</label></label>
                                    <input type="text" class="form-control" id="business" placeholder="Example: Maa Cloth Store" name="member_business">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label"> পিতার নাম  <label class="text-danger"> *</label></label>
                                    <input type="text" name="member_father_name" class="form-control" id="name" placeholder="Father Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">মাতার নাম  <label class="text-danger"> *</label></label>
                                    <input type="text" name="member_mother_name" class="form-control" id="business" placeholder="Mother Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label"> জন্ম তারিখ <label class="text-danger"> *</label></label>
                                    <input type="date" name="member_dob" class="form-control" id="inputProductTitle" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">এন.আই.ডি/ জন্ম সনদের নাম্বার <label class="text-danger"> *</label></label>
                                    <input type="number" name="member_nid" class="form-control" id="number" placeholder="NID or Birth Registration Number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">লিঙ্গ <label class="text-danger"> *</label></label>
                                    <select name="member_gender" class="form-select" id="inputVendor" required>
                                        <option>Select Gender</option>
                                        <option value="1">পুরুষ</option>
                                        <option value="2">মহিলা</option>
                                        <option value="3">অনন্য</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">ধর্ম <label class="text-danger"> *</label> </label>
                                    <select name="member_religion" class="form-select" id="inputVendor" required>
                                        <option>ধর্ম নির্বাচন করুন</option>
                                        <option value="1">ইসলাম</option>
                                        <option value="2">হিন্দু</option>
                                        <option value="3">খ্রিস্টান</option>
                                        <option value="4">বৌদ্ধ </option>
                                        <option value="5">অনন্য</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">পেশা</label>
                                    <input type="text" name="member_occupation" class="form-control" id="Occupation" placeholder="Occupation">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">ই-মেইল <label class="text-danger"> *</label></label>
                                    <input type="email" name="member_email" class="form-control" id="inputProductTitle" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">মোবাইল নাম্বার <label class="text-danger"> *</label></label>
                                    <input type="tel" name="member_phone" class="form-control" id="phone" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">  <label class="text-danger"> *</label></label>
                                    <input type="number" name="member_amount" class="form-control" id="number" placeholder="Example: 200">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">ঠিকানা<label class="text-danger"> *</label></label>
                                    <input type="text" name="member_address" class="form-control" id="address" placeholder="Majhira, Shajahanpur, Bogura">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">ছবি<label class="text-danger"> *</label></label>
                                    <input type="file" name="member_image" id="" class="form-control">
                                </div>
                            </div>

                            <h6 class="text-success mt-2 mb-0">নমিনি</h6>
                            <hr>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">সম্পর্ক <label class="text-danger"> *</label></label>
                                    <select name="member_nominee_relation" class="form-select" id="inputVendor">
                                        <option>Select</option>
                                        <option value="1">Husband</option>
                                        <option value="2">Wife</option>
                                        <option value="3">Father</option>
                                        <option value="4">Mother</option>
                                        <option value="5">Sister</option>
                                        <option value="6">Brother</option>
                                        <option value="7">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">নমিনির নাম  <label class="text-danger"> *</label></label>
                                    <input type="text" name="member_nominee_name" class="form-control" id="name" placeholder="Example: Durjay Ghosh">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label"> জন্ম তারিখ <label class="text-danger"> *</label></label>
                                    <input type="date" name="member_nominee_dob" class="form-control" id="inputProductTitle">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">এন.আই.ডি/জন্ম সনদের নাম্বার <label class="text-danger"> *</label></label>
                                    <input type="number"  name="member_nominee_nid" class="form-control" id="number" placeholder="NID or Birth Registration Number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">লিঙ্গ <label class="text-danger"> *</label></label>
                                    <select name="member_nominee_gender" class="form-select" id="inputVendor">
                                        <option>Select Gender</option>
                                        <option value="1">পুরুষ</option>
                                        <option value="2">মহিলা</option>
                                        <option value="3">অনন্য</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">যোগাযোগ নাম্বার <label class="text-danger"> *</label></label>
                                    <input type="tel" name="member_nominee_phone" class="form-control" id="phone" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">ঠিকানা  <label class="text-danger"> *</label></label>
                                    <input type="text" name="member_nominee_address" class="form-control" id="phone" placeholder="Majhira, Shajahanpur, Bogura">
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
