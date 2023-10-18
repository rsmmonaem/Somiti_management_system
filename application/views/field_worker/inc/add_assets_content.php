<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">সম্পত্তি</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">নতুন সম্পত্তি</li>
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
                <h5 class="card-title">নতুন সম্পত্তি</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>field_worker/assets_list" class="btn btn-primary"><i class="bx bx-left-arrow"></i> সম্পত্তি লিস্ট </a>

                </div>
            </div>
            <div class="card-body p-4">

                <form action="<?= base_url();?>field_worker/save_assets" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">সম্পত্তির নাম <label class="text-danger"> *</label></label>
                                    <input type="text" name="assets_name" class="form-control" id="name" placeholder="চেয়ার টেবিল">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">বর্তমান মূল্য <label class="text-danger"> *</label></label>
                                    <input type="number" name="assets_price" class="form-control" id="name" placeholder="বর্তমান মূল্য">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">তারিখ</label>
                                    <input type="date" name="assets_created_at" class="form-control" id="name" placeholder="বর্তমান মূল্য">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">ক্রয় মূল্য</label>
                                    <input type="number" name="assets_buying_price" class="form-control" id="name" placeholder="ক্রয় মূল্য">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">ক্রয়ের তারিখ</label>
                                    <input type="date" name="assets_buying_date" class="form-control" id="name" placeholder="ক্রয়ের তারিখ">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">সম্পত্তির বিষয়ে বর্ণনা </label>
                                    <textarea name="assets_description" id="" class="form-control" cols="5" rows="5"></textarea>
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
