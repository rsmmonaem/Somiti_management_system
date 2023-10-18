
<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3>সকল খবর</h3>
        </div>
        <div class="card-body">
            <?php foreach ($this->amn->get_news() as $row):?>
            <div class="row mb-2">
                <div class="col-md-6"><a href="<?= base_url();?>home/news/<?= $row->news_id?>">
                        <img src="<?= base_url();?>uploads/news/<?= $row->news_image ?>"
                             class="card-img-top img-fluid" alt="<?= $row->news_title?>"> </a> </div>
                <div class="col-md-6">
                    <p class="card-text"><a href="<?= base_url();?>home/news/<?= $row->news_id?>"><i class="bi bi-arrow-right-circle"></i> <?= $row->news_title?></a></p>
                    <p><?= character_limiter($row->news_description, 150) ?></p>
                </div>
            </div>
            <?php endforeach;  ?>
        </div>
    </div>
</div>
