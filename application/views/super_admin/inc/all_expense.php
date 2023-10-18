<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"><?=$title?></div>

            <!-- <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?= base_url()?>account_admin/daily_loan_collection_list" class="btn btn-primary"><i class="bx bx-left-arrow"></i> ঋণ সংগ্রহ লিস্ট </a>
                </div>
            </div> -->
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title">তারিখ অনুযায়ী রিপোর্ট খুজুন</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>super_admin/expense_list" class="btn btn-primary"><i class="bx bx-arrow-back"></i> স্কিম লিস্ট </a>

                </div>
            </div>
            <div class="card-body p-4">
                <h5 class="card-title">তারিখ অনুযায়ী রিপোর্ট খুজুন</h5>
                <hr/>
                <form action="<?= base_url();?>super_admin/all_expense_report" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label"> তারিখ থেকে </label>
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
