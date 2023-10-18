<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3>সকল নোটিশ </h3>
        </div>
        <div class="card-body">
            <?php foreach ($this->anm->get_notice() as $row):?>
                <div class="row mb-2">
                    <div class="col-md-6"><a href="<?= base_url();?>home/notice/<?= $row->not_id ?>">
                            <img src="<?= base_url();?>uploads/notice/<?= $row->not_thumbnail ?>"
                                 class="card-img-top img-fluid" alt="<?= $row->not_title?>"> </a> </div>
                    <div class="col-md-6">
                        <p class="card-text"><a href="<?= base_url();?>home/notice/<?= $row->not_id?>"><i class="bi bi-arrow-right-circle"></i> <?= $row->not_title?></a></p>
                        <p><?= character_limiter($row->not_description, 150) ?></p>
                    </div>
                </div>
            <?php endforeach;  ?>
        </div>
    </div>
</div>
