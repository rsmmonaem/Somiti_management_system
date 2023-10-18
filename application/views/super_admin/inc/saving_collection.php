<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"><?=$title?></div>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">তারিখ অনুযায়ী রিপোর্ট খুজুন</h5>
                <hr/>
                <form action="<?= base_url();?>super_admin/saving_collection_report" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label"> তারিখ থেকে  </label>
                                    <input type="date" class="form-control" id="startDate" name="startDate" required  >
                                </div>
                            </div>

							<div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label"> তারিখ পর্যন্ত  </label>
                                    <input type="date" class="form-control" id="endDate" name="endDate" required >
                                </div>
                            </div>
                            <!-- <div id="incomeResults">
        
                            </div> -->


                            <div class="col-md-6">
                                <div class="mt-2 mb-3">
                                    <input type="submit" value="খুজুন" class="btn btn-primary">
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>

            </div>
        </div>



