<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3>সকল ডিপার্টমেন্ট</h3>
        </div>
        <div class="card-body">
            <?php foreach ($this->adm->get_department() as $row):?>
                <div class="row mb-2">
                    <div class="col-md-6"><a href="<?= base_url();?>home/course_details/<?= $row->dept_id ?>">
                            <img src="<?= base_url();?>uploads/departments/<?= $row->dept_image ?>"
                                 class="card-img-top img-fluid" alt="<?= $row->dept_name?>"> </a> </div>
                    <div class="col-md-6">
                        <p class="card-text"><a href="<?= base_url();?>home/course_details/<?= $row->dept_id ?>"><i class="bi bi-arrow-right-circle"></i> <?= $row->dept_name?></a></p>
                        <p><?= character_limiter($row->dept_info, 150) ?></p>
                    </div>
                </div>
            <?php endforeach;  ?>
        </div>
    </div>
</div>
