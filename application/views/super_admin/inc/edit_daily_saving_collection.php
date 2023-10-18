
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">সঞ্চয় জমা করুন</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">প্রতিদিনের সঞ্চয় সংগ্রহ</li>
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
                <h5 class="card-title"> জমা আপডেট করুন</h5>
                <div class="dropdown ms-auto">
                    <a href="<?= base_url()?>super_admin/daily_saving_collection_list" class="btn btn-primary"><i class="bx bx-left-arrow"></i> সঞ্চয় সংগ্রহ লিস্ট </a>

                </div>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url();?>super_admin/update_saving_collection/<?=$data->dsc_id?>" method="post" enctype="multipart/form-data">
                    <div class="form-body mt-4">
                        <div class="row border border-1">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="single-select-field" class="form-label">সদস্য নির্বাচন করুন </label>
                                    <select name="dsc_member_id" class="form-select" id="single-select-field" data-placeholder="সদস্য নির্বাচন করুন" required>
                                        <option></option>
                                        <?php foreach ($member as $row):?>
                                            <option value="<?= $row->member_id?>" data-loanid="<?= $row->sa_id ?>" data-sa_pl_id="<?= $row->sa_plan_id ?>" <?php if ($row->member_id == $data->dsc_member_id ){echo "selected";}?>>
                                                <?= "সঞ্চয় একাউন্ট আইডি -> " . $row->sa_id . " || Member Name -> " . $row->member_name ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>


                                    <input type="hidden" class="form-control" id="sa_id" name="dsc_saving_id" placeholder="Savings Account ID" required value="<?=$data->dsc_saving_id?>">


                            <script>
                                $(document).ready(function () {
                                    // When an option is selected from the dropdown
                                    $("#single-select-field").change(function () {
                                        // Get the selected option's loan ID data attribute
                                        var selectedLoanId = $("option:selected", this).data("loanid");
                                        $("#sa_id").val(selectedLoanId);

                                        var selectedsa_pl_id = $("option:selected", this).data("sa_pl_id");
                                        $("#sa_plan_id").val(selectedsa_pl_id)
                                    });
                                });
                            </script>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">সঞ্চয় জমা করার তারিখ </label>
                                    <input type="date" class="form-control" id="inputProductTitle" name="dsc_collect_date" required value="<?=$data->dsc_collect_date?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">সঞ্চয় জমা পদ্ধতি<label class="text-danger"> *</label></label>
                                    <select class="form-select" name="dsc_payment_type" required>
                                        <option>সিলেক্ট করুন</option>
                                        <option value="1" <?php if ($data->dsc_payment_type == 1){echo "selected";}?>>ক্যাশ</option>
                                        <option value="2" <?php if ($data->dsc_payment_type == 2){echo "selected";}?>>চেক</option>
                                        <option value="3" <?php if ($data->dsc_payment_type == 3){echo "selected";}?>>অন্যান্য</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">পরিমাণ </label>
                                    <input type="number" class="form-control" id="business" placeholder="১০০০" name="dsc_amount" value="<?= $data->dsc_amount ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <input type="submit" value="সেভ করুন" class="btn btn-primary">
                                </div>
                            </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>

            </div>
        </div>
