
<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3><?= $news->news_title?></h3>
        </div>
        <div class="card-body">
            <div class="text-center">
                <img src="<?= base_url();?>uploads/news/<?= $news->news_image?>" alt="<?= $news->news_title?>" class="img-fluid text-center" width="50%">
            </div>
            <p><?= $news->news_description?></p>
        </div>
    </div>
</div>
