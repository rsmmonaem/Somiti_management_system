<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3><?= $history2->trainee_name?></h3>
        </div>
        <div class="card-body">
            <div class="text-center">

                <img src="<?= base_url();?>uploads/trainees/<?= $history2->trainee_image?>" alt="" class="img-fluid text-center" width="50%">

            </div>
            <h2>Certificate List</h2>
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Course Status</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($history1 as $row):?>
                <tr>
                    <td><?= $row->dept_name?></td>
                    <td><?= $row->certificate_status?></td>

                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$row->trainee_id  ?>">
                            <i class="fa fa-qrcode"></i> Certificate
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?=$row->trainee_id  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Certificate</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body text-center">
                                            <img src="<?= base_url() ?><?= $row->trainee_qr_code_file ?>" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                </tr>
                <?php endforeach; ?>
                </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>
