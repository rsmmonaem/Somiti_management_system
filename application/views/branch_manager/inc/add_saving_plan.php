<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">স্কিম প্ল্যান</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?php
						if (isset($plane)) {
							echo "আপডেট স্কিম প্ল্যান";
						}else{
							echo "নতুন স্কিম প্ল্যান";
						}

						?></li>
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
                <h5 class="card-title"><?php
                    if (isset($plane)) {
                        echo "আপডেট স্কিম প্ল্যান";
                    }else{
                        echo "নতুন স্কিম প্ল্যান";
                    }

                    ?></h5>

                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>branch_manager/scheme_list" class="btn btn-primary"><i class="bx bx-arrow-back"></i> স্কিম লিস্ট </a>

                </div>
            </div>

            <div class="card-body p-4">

                <form action="<?= (!isset($plane) ? base_url() . 'branch_manager/save_saving_plan' : base_url() . 'branch_manager/update_saving_plan') ?>" method="post" enctype="multipart/form-data">
                    <?php
					if (isset($plane)) {
						echo "<input type='hidden' name='saving_plan_id' value='" . $plane->saving_plan_id  . "'>";
					}
					?>


					<div class="form-body mt-4">
                        <div class="row border border-1">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label"> নাম <label class="text-danger"> *</label></label>
                                    <input type="text" value="<?php if(isset($plane->saving_plan_name)){echo $plane->saving_plan_name;}?>" name="saving_plan_name" class="form-control" placeholder="স্কিম প্ল্যান নাম">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">সর্বনিম্ন টাকা<label class="text-danger"> *</label></label>
                                    <input type="number" value="<?php if(isset($plane->saving_plan_amount)){echo $plane->saving_plan_amount;}?>" name="saving_plan_amount" class="form-control" placeholder="100">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">মুনাফার হার ( % )<label class="text-danger"> *</label></label>
                                    <input type="number" value="<?php if(isset($plane->saving_plan_interest)){echo $plane->saving_plan_interest;}?>" name="saving_plan_interest" class="form-control" placeholder="10 %">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">মুনাফা প্রদান <label class="text-danger"> *</label></label>
                                    <select name="saving_plan_interest_give" id="" class="form-control">
                                        <option  class="form-control">সিলেক্ট করুন</option>
                                        <option value="1" class="form-control" <?php if(isset($plane)){if($plane->saving_plan_interest_give==1){echo "selected";}}?>>মাসিক</option>
                                        <option value="2" class="form-control" <?php if(isset($plane)){if($plane->saving_plan_interest_give==2){echo "selected";}}?>>বাৎসরিক</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">সঞ্চয় পণ্য সম্পর্কে <label class="text-danger"> *</label></label>
                                    <textarea name="saving_plan_description" id="" cols="5" rows="5" class="form-control" placeholder="Write here details"><?php if(isset($plane->saving_plan_description)){echo $plane->saving_plan_description;}?></textarea>
                                </div>
                            </div>

                                <div class="mt-2 mb-3">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                        </div><!--end row-->
                    </div>
                </form>

            </div>
        </div>
