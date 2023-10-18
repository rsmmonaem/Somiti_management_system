<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">প্রোফাইল আপডেট করুন</div>
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
                <h5 class="card-title">প্রোফাইল</h5>
                <div class="dropdown ms-auto">

                </div>
            </div>
            <?php
            $this->db->select('admin_user.*');
            $user_id = $this->session->userdata('user_id');
            $this->db->from('admin_user');
            $this->db->where('user_id', $user_id);
            $user_info = $this->db->get()->row();
            ?>

            <div class="card-body p-4">
                <form action="<?= base_url();?>super_admin/save_update_profile" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="u_id" value="<?=$user_info->u_id?>" id="">
                    <div class="row form-body mt-4">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label"> নাম <label class="text-danger"> *</label></label>
                                <input type="text" name="full_name" class="form-control" id="name" placeholder=" নাম " value="<?=$user_info->full_name?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">ইউজারনেম<label class="text-danger"> *</label></label>
                                <input type="text" name="user_name" class="form-control" placeholder=" ইউজারনেম" value="<?= $user_info->user_name?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label"> পাসওয়ার্ড <label class="text-danger"> * </label></label>
                                <input type="text" name="pass_word" class="form-control" placeholder="পাসওয়ার্ড" value="<?= $user_info->pass_word?>">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">প্রোফাইল ইমেজ</label>
                                <input type="file" name="profile_image" class="form-control">
                                <input type="hidden" name="old_image" class="form-control" value="<?= $user_info->profile_image?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">প্রোফাইল ইমেজ</label>
                                <br>
                                <img src="<?= base_url()?>uploads/admin/<?= $user_info->profile_image?>" alt="" class="img-fluid" width="200px">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">User Type </label>
                                <select name="user_type" id="" class="form-select">
                                    <option>সিলেক্ট করুন</option>
                                    <option value="super_admin" <?php if ($user_info->user_type == "super_admin"){echo "selected";}?> >Super Admin</option>
                                    <option value="field_worker" <?php if ($user_info->user_type == "field_worker"){echo "selected";}?>>Field Worker</option>
                                    <option value="field_worker" <?php if ($user_info->user_type == "branch_manager"){echo "selected";}?>>Branch Manager</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label>
                                <select name="status" id="" class="form-select">
                                    <option class="form-control">Select</option>
                                    <option value="ENABLE"  <?php if ($user_info->status == "ENABLE"){echo "selected";}?> class="form-control">Active</option>
                                    <option value="DISABLE"  <?php if ($user_info->status == "DISABLE"){echo "selected";}?> class="form-control">Draft/Inactive</option>
                                </select>
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








