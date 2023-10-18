<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>
                অনলাইনে আবেদন করুন </h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url() ?>home/save_trainee" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-3 col-xs-12">
                                <div class="item form-group mt-3">
                                    <label for="phone">Institute</label>
                                    <select class="form-control col-md-12 col-xs-12" name="inst_name" id="sel_city">
                                        <option value="">--Select--</option>
                                        <?php

                                        foreach ($dataa as $row) : ?>

                                            <option value="<?=$row->inst_id?>" ><?=$row->inst_name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-3 col-xs-12">
                                <div class="item form-group mt-3">
                                    <label for="phone">Course</label>
                                    <select class="form-control col-md-12 col-xs-12" name="dept_name" id="sel_depart">
                                        <option value="">--Select--</option>

                                    </select>
                                    <div class="help-block"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="field-1" class="control-label">Trainee Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="field-1" name="trainee_name" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="field-1" class="control-label">Trainee Name (English) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="field-1" name="trainee_name_eng" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mt-3">
                                    <label for="field-1" class="control-label mt-2">Father Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="field-1" name="trainee_father_name" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mt-3">
                                    <label for="field-1" class="control-label mt-2">Father Name (English) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="field-1" name="trainee_father_name_eng" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mt-3">
                                    <label for="field-1" class="control-label mt-2">Mother Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="field-1" name="trainee_mother_name" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mt-3">
                                    <label for="field-1" class="control-label mt-2">Mother Name (English) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="field-1" name="trainee_mother_name_eng" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mt-3">
                                    <label for="dob">Date Of Birth <span class="text-danger">*</span></label>
                                    <input class="form-control col-md-12 col-xs-12" name="trainee_dob" id="dob" value="" placeholder="Birth Date" type="date" autocomplete="off" required="required">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mt-3">
                                    <label for="field-1" class="control-label">Current Age <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="field-1" name="trainee_current_age" required="" placeholder="20 Years">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="field-1" class="control-label">NID Number <span class="text-danger">*</span></label>
                                    <input type="number" value="<?= $nid ?>"  class="form-control" aria-label="readonly input"  id="field-1" name="trainee_nid" readonly="readonly">
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group mt-3">
                                    <label for="gender">Gender <span class="text-danger">*</span></label>
                                    <select class="form-control col-md-12 col-xs-12" name="trainee_gender" id="gender" required="required">
                                        <option value="">--Select--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <div class="help-block"></div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group mt-3">
                                    <label for="religion">Religion </label>
                                    <select class="form-control col-md-12 col-xs-12" name="trainee_religion" id="add_religion" required="">
                                        <option value="">--Select--</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Christian">Christian</option>
                                        <option value="Buddha">Buddha</option>
                                    </select>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group mt-3">
                                    <label for="phone">Phone Number<span class="text-danger">*</span></label>
                                    <input class="form-control col-md-12 col-xs-12" name="trainee_phone" id="number" required="required" type="number" autocomplete="off">
                                    <div class="help-block"></div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="item form-group mt-3">
                                    <label for="phone">Alternate Phone Number<span class="text-danger">*</span></label>
                                    <input class="form-control col-md-12 col-xs-12" name="trainee_alternate_phone" id="number" required="required" type="number" autocomplete="off">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-3 col-xs-12">
                                <div class="item form-group mt-3">
                                    <label for="phone">Educational Qualification (Year)<span class="text-danger">*</span></label>
                                    <input class="form-control col-md-12 col-xs-12" name="trainee_education" id="phone" value="" placeholder="Educational Qualification (Year)" required="required" type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-3 col-xs-12">
                                <div class="item form-group mt-3">
                                    <label for="phone">Past Training Info (Optional)</label>
                                    <input class="form-control col-md-12 col-xs-12" name="trainee_past_training" id="phone" value=""  type="text" autocomplete="off">
                                    <div class="help-block"></div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group mt-3">
                                    <label for="field-6" class="control-label">Trainee Image</label>
                                    <input type="file" class="form-control" id="field-6" name="trainee_image" required="">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group mt-3 mt-5">
                                    <label for="field-6" class="control-label">Trainee Username</label>
                                    <input class="form-control col-md-12 col-xs-12" value="<?= random_int(100000, 999999); ?>" name="trainee_username"  type="text" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-3 mt-5">
                                    <label for="field-6" class="control-label">Trainee Password</label>
                                    <input class="form-control col-md-12 col-xs-12"  value="<?= random_int(100000, 999999); ?>" name="trainee_password" type="text" readonly="readonly" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="field-6" class="control-label">Present Address</label>
                                    <textarea name="trainee_present_address" id="" class="form-control" cols="10" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="field-6" class="control-label">Permanent Address</label>
                                    <textarea name="trainee_permanent_address" id="" class="form-control" cols="10" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-3">
                                    <label for="field-6" class="control-label">Future Plan/Reason of taking This Training</label>
                                    <textarea name="trainee_training_reason" id="" class="form-control" cols="5" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-raised btn-danger m-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-success m-2">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript'>
    // baseURL variable
    var baseURL= "<?php echo base_url();?>";

    $(document).ready(function(){

        // City change
        $('#sel_city').change(function(){
            var inst_id = $(this).val();

            // AJAX request
            $.ajax({
                url:'<?=base_url()?>home/get_department_data',
                method: 'post',
                data: {inst_rel_id: inst_id},
                dataType: 'json',
                success: function(response){

                    // Remove options
                    $('#sel_depart').find('option').not(':first').remove();

                    // Add options
                    $.each(response,function(index,data){
                        $('#sel_depart').append('<option value="'+data['dept_id']+'">'+data['dept_name']+'</option>');
                    });
                }
            });
        });


    });
</script>
