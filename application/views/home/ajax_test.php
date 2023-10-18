<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<table class="container">

    <!-- City -->
    <tr>
        <td>Institute</td>
        <td>
            <select id='sel_city'>
                <option>-- Select institute --</option>
                <?php foreach($institutes as $row):?>
                <option value="<?= $row->inst_id?>"><?= $row->inst_name?></option>
                <?php endforeach;?>
            </select>
        </td>
    </tr>

    <!-- Department -->
    <tr>
        <td>Department</td>
        <td>
            <select id='sel_depart'>
                <option>-- Select deparment --</option>
            </select>
        </td>
    </tr>

    <!-- User -->
</table>

<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

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



</body>
</html>
