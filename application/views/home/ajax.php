<!DOCTYPE html>
<html>
<head>
    <title>Codeigniter Dependent Dropdown Example with demo</title>
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>


<body>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Select State and get bellow Related City</div>
        <div class="panel-body">


            <div class="form-group">
                <label for="title">Select State:</label>
                <select name="state" class="form-control" style="width:350px">
                    <option value="">--- Select State ---</option>
                    <?php
                    foreach ($institute_content as  $value) {
                        echo "<option value='".$value->inst_id."'>".$value->inst_name."</option>";
                    }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="title">Select City:</label>
                <select name="city" class="form-control" style="width:350px">
                </select>
            </div>


        </div>
    </div>
</div>


<script type="text/javascript">


    $(document).ready(function() {
        $('select[name="state"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/myform/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });
</script>


</body>
</html>