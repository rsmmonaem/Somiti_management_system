<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3>আপনি ইতিপূর্বে যে কোর্সে আবেদন করেছিলেন </h3>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-2 mt-2">
                                <a href="<?= base_url(); ?>home/add_another_course/<?= $histry2->trainee_nid ?>" class="btn btn-success text-white">Apply Another Course</a>
                            </div>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Nid</th>
                                    <th>Institute</th>
                                    <th>Course</th>
                                    <th>Status</th>
                                    <th>Image </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1;
                                foreach ($histry1 as $row) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $row->trainee_name ?></td>
                                        <td><?= $row->trainee_nid  ?></td>
                                        <td><?= $row->inst_name  ?></td>
                                        <td><?= $row->dept_name  ?></td>
                                        <td><?= $row->trainee_status  ?></td>
                                        <td>

                                            <img style="width: 80px;" src="<?= base_url() ?>uploads/trainees/<?= $row->trainee_image ?>">

                                        </td>
                                        
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>
</div>
