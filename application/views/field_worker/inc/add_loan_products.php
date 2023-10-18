 <div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">পণ্য</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">নতুন ঋণের পন্য</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title">নতুন ঋণের পন্য</h5>
                <div class="dropdown ms-auto">

                </div>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url();?>field_worker/save_loan_products" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label"> পন্যের নাম <label class="text-danger"> *</label></label>
                                    <input type="text" name="loan_products_name" class="form-control" id="name" placeholder="Example: Durjay Ghosh">
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
