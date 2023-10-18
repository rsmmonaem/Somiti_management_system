
<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3>সকল ইন্সটিটিউট</h3>
        </div>
        <div class="card-body">
            <?php foreach ($this->aim->get_institute_home() as $row):?>

                <p><a href="<?= base_url();?>home/institute_details/<?= $row->inst_id?>"><i class="bi bi-arrow-right-circle"></i> <?= $row->inst_name?></a>

                </p>
            <?php endforeach;  ?>

        </div>
    </div>
</div>
