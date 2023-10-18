<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3><?= $institute->inst_name?></h3>
        </div>
        <div class="card-body">
            <div class="text-center">

                <img src="<?= base_url();?>uploads/institute/<?= $institute->inst_logo?>" alt="<?= $institute->inst_name?>" class="img-fluid text-center" width="50%">

            </div>
            <h2>Training On Process</h2>
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Status</th>
                </tr>
                <tbody>
                <?php foreach ($department as $row):?>
                <tr>
                    <td><?= $row->dept_name?></td>
                    <td><?= $row->dept_code?></td>
                    <td><?= $row->dept_status?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
