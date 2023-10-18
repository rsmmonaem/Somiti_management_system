<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">সমিতি আপডেট করুন</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title?></li>
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
                <h5 class="card-title">আপডেট করুন</h5>
                <div class="dropdown ms-auto">

                </div>
            </div>
            <?php
            $this->db->from('setting');
            $this->db->where('setting_id', 1);
            $setting = $this->db->get()->row();
            ?>

            <div class="card-body p-4">
                <form action="<?= base_url();?>super_admin/save_setting" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="setting_id" value="<?=$setting->setting_id?>" id="">
                    <div class="row form-body mt-4">

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label"> নাম <label class="text-danger"> *</label></label>
                                <input type="text" name="setting_title" class="form-control" id="name" placeholder=" নাম " value="<?=$setting->setting_title?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label"> টাগলাইন </label>
                                <input type="text" name="setting_tagline" class="form-control" id="name" placeholder=" নাম " value="<?=$setting->setting_tagline?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label"> ফেভ আইকন </label>
                                        <br>
                                        <input type="file" name="setting_favicon" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label"> বর্তমান ফেভ আইকন </label>
                                        <br>
                                        <img class="img-fluid" src="<?= base_url();?>uploads/setting/<?=$setting->setting_favicon?>" alt="" width="150px" height="80px">
                                        <input type="hidden" name="old_image_favicon" value="<?=$setting->setting_favicon?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label"> লগো </label>
                                        <br>
                                        <input type="file" name="setting_logo" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label"> বর্তমান লগো </label>
                                        <br>
                                        <img class="img-fluid" src="<?= base_url();?>uploads/setting/<?=$setting->setting_logo?>" alt="" width="250px" height="250px">
                                        <input type="hidden" name="old_image_logo" value="<?=$setting->setting_logo?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label"> ফোন নাম্বার </label>
                                <input type="text" name="setting_phone" class="form-control" id="name" placeholder=" ফোন নাম্বার " value="<?=$setting->setting_phone?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label"> টেলিফোন নাম্বার </label>
                                <input type="text" name="setting_telephone" class="form-control" id="name" placeholder=" টেলিফোন নাম্বার " value="<?=$setting->setting_telephone?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label"> ঠিকানা </label>
                                <input type="text" name="setting_location" class="form-control" id="name" placeholder=" Majhira, Bogura" value="<?=$setting->setting_telephone?>">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mt-2 mb-3">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>








