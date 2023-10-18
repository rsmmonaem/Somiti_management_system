<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ইন্টারেস্ট প্রদান করুন </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ইন্টারেস্ট প্রদান করুন</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?= base_url()?>account_admin/fdr_interest" class="btn btn-primary"><i class="bx bx-arrow-back"></i>এফ ডি আর ইন্টারেস্ট </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">ইন্টারেস্ট
                </h5>
                <hr/>
                <form action="<?= base_url();?>account_admin/save_interest_generate" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="fdr_id" value="<?= $data->fdr_id?>">

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="single-select-field" class="form-label">সদস্য নির্বাচন করুন </label>
                                    <select name="fdr_member_id" class="form-select"  data-placeholder="সদস্য নির্বাচন করুন" disabled="true">
                                        <option></option>
                                        <?php foreach ($member as $row):?>
                                            <option value="<?= $row->member_id?>" <?php if ($row->member_id == $data->fdr_member_id){echo "selected";}?>  ><?= $row->member_id?> - <?= $row->member_name?></option>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">আসল টাকা </label>
                                    <input type="number" name="" class="form-control" id="main_amount"  placeholder="Example: 100000" value="<?= $data->fdr_amount?>" readonly="readonly">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label"> মাসিক ইন্টারেস্ট </label>
                                    <input type="number" name="fdr_interest_amount" class="form-control" id="main_amount"  placeholder="Example: 100000" value="<?= $data->fdr_monthly_interest ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label"> মাস </label>
                                    <input type="month" name="fdr_interest_date_given" class="form-control" id="main_amount"  placeholder="Example: 100000" value="<?= date('Y-m') ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label"> তারিখ </label>
                                    <input type="date" name="fdr_int_date" class="form-control" id="main_amount"  placeholder="Example: 100000" value="<?= date('Y-m-d') ?>">
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="col-md-6">
                            <div class=" mb-3">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div>

                        <!--end row-->
                    </div>
                </form>

            </div>
        </div>