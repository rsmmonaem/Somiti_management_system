<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>অনলাইনে আবেদন করুন</h3>
        </div>
        <div class="card-body">
            <div class="row">

                <form action="<?= base_url() ?>home/save_another_course" method="post" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
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
                                                <input type="text" class="form-control" id="field-1" value="<?= $trainee->trainee_name ?>" readonly="readonly" name="trainee_name" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-3">
                                                <label for="field-1" class="control-label">Trainee Name (English) <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="field-1" value="<?= $trainee->trainee_name_eng ?>" readonly="readonly" name="trainee_name_eng" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mt-3">
                                                <label for="field-1" class="control-label">Father Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="field-1" value="<?= $trainee->trainee_father_name ?>" name="trainee_father_name" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mt-3">
                                                <label for="field-1" class="control-label">Father Name (English) <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="field-1" value="<?= $trainee->trainee_father_name_eng ?>" name="trainee_father_name_eng" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mt-3">
                                                <label for="field-1" class="control-label">Mother Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="field-1" value="<?= $trainee->trainee_mother_name ?>" name="trainee_mother_name" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mt-3">
                                                <label for="field-1" class="control-label">Mother Name (English) <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="field-1" value="<?= $trainee->trainee_mother_name_eng ?>" name="trainee_mother_name_eng" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mt-3">
                                                <label for="dob">Date Of Birth <span class="text-danger">*</span></label>
                                                <input class="form-control col-md-12 col-xs-12" name="trainee_dob" id="dob" value="<?= $trainee->trainee_dob ?>" placeholder="Birth Date" type="date" autocomplete="off" required="required" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mt-3">
                                                <label for="field-1" class="control-label">Current Age <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="field-1" value="<?= $trainee->trainee_current_age ?>" readonly="readonly"  name="trainee_current_age" required="" placeholder="20 Years">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mt-3">
                                                <label for="field-1" class="control-label">NID Number <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="field-1" value="<?= $trainee->trainee_nid ?>" readonly="readonly"  name="trainee_nid" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group mt-3">
                                                <label for="gender">Gender <span class="text-danger">*</span></label>
                                                <select class="form-control col-md-12 col-xs-12" name="trainee_gender" id="gender" required="required" readonly="readonly">
                                                    <option value="">--Select--</option>
                                                    <option value="Male" <?php if ($trainee->trainee_gender == 'Male'){ echo 'selected';}?>>Male</option>
                                                    <option value="Female" <?php if ($trainee->trainee_gender == 'Female'){ echo 'selected';}?>>Female</option>
                                                </select>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group mt-3">
                                                <label for="religion">Religion </label>
                                                <select class="form-control col-md-12 col-xs-12" name="trainee_religion" id="add_religion" readonly="readonly">
                                                    <option value=""  >--Select--</option>
                                                    <option value="Islam" <?php if ($trainee->trainee_religion == 'Islam'){ echo 'selected';}?> >Islam</option>
                                                    <option value="Hindu" <?php if ($trainee->trainee_religion == 'Hindu'){ echo 'selected';}?>>Hindu</option>
                                                    <option value="Christian" <?php if ($trainee->trainee_religion == 'Christian'){ echo 'selected';}?>>Christian</option>
                                                    <option value="Buddha" <?php if ($trainee->trainee_religion == 'Buddha'){ echo 'selected';}?>>Buddha</option>
                                                </select>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group mt-3">
                                                <label for="phone">Phone Number<span class="text-danger">*</span></label>
                                                <input class="form-control col-md-12 col-xs-12" value="<?= $trainee->trainee_phone ?>" readonly="readonly"  name="trainee_phone" id="number" required="required" type="number" autocomplete="off">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="item form-group mt-3">
                                                <label for="phone">Alternate Phone Number<span class="text-danger">*</span></label>
                                                <input class="form-control col-md-12 col-xs-12" value="<?= $trainee->trainee_alternate_phone ?>" readonly="readonly"  name="trainee_alternate_phone" id="number" required="required" type="number" autocomplete="off">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-3 col-xs-12">
                                            <div class="item form-group mt-3">
                                                <label for="phone">Educational Qualification (Year)<span class="text-danger">*</span></label>
                                                <input class="form-control col-md-12 col-xs-12" value="<?= $trainee->trainee_education ?>"  name="trainee_education" id="phone"  placeholder="Educational Qualification (Year)" required="required" type="text" autocomplete="off">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-3 col-xs-12">
                                            <div class="item form-group mt-3">
                                                <label for="phone">Past Training Info (Optional)</label>
                                                <input class="form-control col-md-12 col-xs-12" value="<?= $trainee->trainee_past_training ?>"  name="trainee_past_training" id="phone"  type="text" autocomplete="off">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group mt-3">
                                                <label for="field-6" class="control-label">Trainee Image</label>
                                                <input type="hidden" name="old_image" value="<?= $trainee->trainee_image ?>">
                                                <img style="width:150px; height:150px;"  class="control-label" src="<?= base_url() ?>uploads/trainees/<?= $trainee->trainee_image ?>" alt="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mt-3">
                                                <label for="field-6" class="control-label">Trainee Username</label>
                                                <input class="form-control col-md-12 col-xs-12" value="<?= $trainee->trainee_username ?>" name="trainee_username"  type="text" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-3">
                                                <label for="field-6" class="control-label">Trainee Password</label>
                                                <input class="form-control col-md-12 col-xs-12"  value="<?= $trainee->trainee_password ?>" name="trainee_password" type="text" readonly="readonly" >
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mt-3">
                                                <label for="field-6" class="control-label">Present Address</label>
                                                <textarea name="trainee_present_address" id="" class="form-control" cols="10" rows="5" ><?= $trainee->trainee_present_address ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-3">
                                                <label for="field-6" class="control-label">Permanent Address</label>
                                                <textarea name="trainee_permanent_address" id="" class="form-control" cols="10" rows="5" readonly="readonly"><?= $trainee->trainee_permanent_address ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mt-3">
                                                <label for="field-6" class="control-label">Future Plan/Reason of taking This Training</label>
                                                <textarea name="trainee_training_reason" id="" class="form-control" cols="5" rows="5" ><?= $trainee->trainee_training_reason ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-raised btn-danger m-2" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success btn-success m-2">Save</button>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
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
