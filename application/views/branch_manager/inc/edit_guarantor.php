<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">জামিনদার</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">আপডেট</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title">আপডেট জামিনদার</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>branch_manager/guarantor_list" class="btn btn-primary"><i class="bx bx-left-arrow"></i>  জামিনদার লিস্ট </a>

                </div>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url();?>branch_manager/update_guarantor/<?= $data->guarantor_id ?> ?>" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">
                            <input type="hidden" name="guarantor_id" value="<?= $data->guarantor_id?>">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">জামিনদারের নাম <label class="text-danger"> *</label></label>
                                    <input type="text" name="guarantor_name" class="form-control" id="name" placeholder="Example: Durjay Ghosh" value="<?= $data->guarantor_name?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">পেশা </label>
                                    <input type="text" class="form-control" id="business" placeholder="Example: Maa Cloth Store" name="guarantor_occu"  value="<?= $data->guarantor_occu?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for=" " class="form-label">ইমেল এড্রেস </label>
                                    <input type="email" name="guarantor_email" class="form-control" id=" " placeholder="Email Address"  value="<?= $data->guarantor_email?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">মোবাইল নাম্বার <label class="text-danger"> *</label></label>
                                    <input type="tel" name="guarantor_phone" class="form-control" id="phone" placeholder="017xxxxxxx2"  value="<?= $data->guarantor_phone?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">ঠিকানা <label class="text-danger"> *</label></label>
                                    <input type="text" name="guarantor_address" class="form-control" id="address" placeholder="Address"  value="<?= $data->guarantor_address?>">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">জামিনদার সম্পর্কে </label>
                                    <textarea name="guarantor_related" id="" class="form-control" cols="5" rows="5"><?= $data->guarantor_related?></textarea>
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
