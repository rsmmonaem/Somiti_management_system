

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <div class="text-center">
                    <img src="<?= base_url()?>assets/admin/images/logo-icon.png" alt="" class="img-fluid" width="150px">
                </div>
            </div>
            <div class="col-md-5">
                <div class="text-center">
                    <h5>ডেমো ক্ষুদ্র ব্যবসায়ী সমবায় সমিতি লি:</h5>
                    <h6>Majhira, Bogura</h6>
                    <h6>017123456789</h6>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-1 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">রশিদ নংঃ</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="staticEmail" value="0 <?= $data->income_id?>" readonly disabled>
                    </div>
                </div>
                <div class="mb-1 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">আয়ঃ</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="staticEmail" value="<?=$data->income_date?>" readonly disabled>
                    </div>
                </div>
                <div class="mb-1 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">প্রিন্টের তারিখঃ </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="staticEmail" value="<?= date("F j, Y, g:i a");?>" readonly disabled>
                    </div>
                </div>

            </div>
        </div>
        <div class="row mt-5">
            <hr>
            <h2 class="text-center">আয়ের রশিদ
            </h2>
            <hr>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-3 col-form-label">ব্যায়ের ধরনঃ</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="staticEmail" value="<?= $data->income_type ?>" readonly disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-3 col-form-label">আয়ের পরিমাণঃ</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="staticEmail" value="<?= $data->income_amount ?>" readonly disabled>
                </div>
            </div>

            <div class="mb-3 row">
                <table width="100%">


                    <tbody>
                    <tr>
                        <td width="20%"> <label class="col-sm-12 control" for="">ক্যাশঃ </label>  </td>
                        <td width="30%"> <input id="checkbox2" type="checkbox"> </td>

                        <td width="20%" align=" "> <label class="col-sm-12 control" for="">তারিখঃ </label>  </td>
                        <td width="30%">
                            <input name="name" type="text" class="form-control">
                        </td>

                    </tr>


                    <tr>
                        <td width="20%"> <label class="col-sm-12 control" for="">চেকঃ </label>  </td>
                        <td width="30%"> <input id="checkbox2" type="checkbox"> </td>

                        <td width="20%" align=" "> <label class="col-sm-12 control" for="">চেক নংঃ</label>  </td>
                        <td width="30%">
                            <input name="name" type="text" class="form-control">
                        </td>

                    </tr>

                    <tr>
                        <td width="20%"> <label class="col-sm-12 control" for="">অন্যান্যঃ </label>  </td>
                        <td width="30%"> <input id="checkbox2" type="checkbox"> </td>

                        <td width="20%" align=" "> <label class="col-sm-12 control" for="">তথ্যঃ</label>  </td>
                        <td width="30%">
                            <input name="name" type="text" class="form-control">
                        </td>

                    </tr>

                    </tbody>
                </table>


            </div>
            <div class="row">
                <div class="col-md-6">
                        <div class="text-start">
                            <u>
                                <h6 style="margin-top: 10px;">অনুমোদনকারীর স্বাক্ষর</h6>
                            </u>

                        </div>
                </div>
                <div class="col-md-6">
                    <div class="text-end">
                        <u>
                            <h6 style="margin-top: 10px;">প্রদানকারীর স্বাক্ষর</h6>

                        </u>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>
<div class="text-center">
    <button type="button" class="btn btn-primary" onclick="window.print();">Print</button>
</div>
