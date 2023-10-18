<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ইনভেস্ট</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
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
                <h5 class="card-title"><?=$title?></h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>field_worker/invest_list" class="btn btn-primary"><i class="bx bx-left-arrow"></i> ইনভেস্ট লিস্ট </a>

                </div>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url();?>field_worker/update_invest/<?= $data->invest_id?>" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">ইনভেস্টের ধরন<label class="text-danger"> *</label></label>
                                    <input type="text" name="invest_type" class="form-control" id="name" placeholder="ইনভেস্ট ধরন" value="<?= $data->invest_type?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">ইনভেস্টের পরিমাণ <label class="text-danger"> *</label></label>
                                    <input type="number" name="invest_amount" class="form-control" id="amount" placeholder="১০০০" value="<?= $data->invest_amount?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">তারিখ</label>
                                    <input type="date" name="invest_date" class="form-control" id="name" placeholder="ইনভেস্ট তারিখ" value="<?= $data->invest_date?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">পেমেন্টের বিষয়</label>
                                    <select name="invest_payment_type" id="" class="form-control">
                                        <option class="form-control">Select Option</option>
                                        <option value="1" class="form-control" <?php if ($data->invest_payment_type==1){echo "selected";}?> >Cash</option>
                                        <option value="2" class="form-control" <?php if ($data->invest_payment_type==2){echo "selected";}?> >Check</option>
                                        <option value="3" class="form-control" <?php if ($data->invest_payment_type==3){echo "selected";}?> >Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label"> সংশ্লিষ্ট ব্যক্তির নাম <label class="text-danger"> *</label></label>
                                    <input type="text" name="invest_person_name" class="form-control" id="name" placeholder="রহিম মিয়া" value="<?= $data->invest_person_name?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label"> সংশ্লিষ্ট ব্যক্তির জাতীয় পরিচয় পত্রের নাম্বার <label class="text-danger"> *</label></label>
                                    <input type="text" name="invest_person_id" class="form-control" id="name" placeholder="088******" value="<?= $data->invest_person_id?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label"> সংশ্লিষ্ট ব্যক্তির মোবাইল নাম্বার <label class="text-danger"> *</label></label>
                                    <input type="text" name="invest_person_number" class="form-control" id="name" placeholder="01*******" value="<?= $data->invest_person_number?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label"> সংশ্লিষ্ট ব্যক্তির ঠিকানা <label class="text-danger"> *</label></label>
                                    <textarea name="invest_person_address" id="" class="form-control" cols="2" rows="2"><?= $data->invest_person_address?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">ইনভেস্টের বর্ণনা </label>
                                    <textarea name="invest_description" id="" class="form-control" cols="2" rows="2"><?= $data->invest_description?></textarea>
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
