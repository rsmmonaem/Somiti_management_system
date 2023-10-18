<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ব্যয়</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">নতুন ব্যয়</li>
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
                <h5 class="card-title">নতুন ব্যয়</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>field_worker/expense_list" class="btn btn-primary"><i class="bx bx-left-arrow"></i> ব্যয় লিস্ট </a>

                </div>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url();?>field_worker/save_expense" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">ব্যায়ের ধরন<label class="text-danger"> *</label></label>
                                    <input type="text" name="expense_type" class="form-control" id="name" placeholder="যেমনঃ ইন্টারনেট বিল">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label"> নাম <label class="text-danger"> *</label></label>
                                    <input type="text" name="expense_name" class="form-control" id="name" placeholder="রহিম মিয়া">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">ব্যায়ের পরিমাণ <label class="text-danger"> *</label></label>
                                    <input type="number" name="expense_amount" class="form-control" id="name" placeholder="১০০০">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">তারিখ</label>
                                    <input type="date" name="expense_date" class="form-control" id="name" placeholder="ব্যায়ের তারিখ">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="" class="form-label">পেমেন্টের বিষয়</label>
                                    <select name="expense_payment_type" id="" class="form-control">
                                        <option class="form-control">Select Option</option>
                                        <option value="1" class="form-control">Cash</option>
                                        <option value="2" class="form-control">Check</option>
                                        <option value="3" class="form-control">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">ব্যায়ের বিষয়ে বর্ণনা </label>
                                    <textarea name="expense_description" id="" class="form-control" cols="5" rows="5"></textarea>
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
