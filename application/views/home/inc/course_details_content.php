<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3><?= $course->dept_name?></h3>
        </div>
        <div class="card-body">
            <div class="text-center">

                <img src="<?= base_url();?>uploads/departments/<?= $course->dept_image?>" alt="<?= $course->dept_name?>"
                     class="img-fluid text-center" width="50%">

            </div>
            <p>Code: <?= $course->dept_code?></p>
            <p>Information: <?= $course->dept_info?></p>

        </div>
    </div>
</div>
