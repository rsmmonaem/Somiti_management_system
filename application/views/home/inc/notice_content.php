
<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3><?= $notice->not_title?></h3>
        </div>
        <div class="card-body">
            <div class="text-center">

                <img src="<?= base_url();?>uploads/notice/<?= $notice->not_thumbnail?>" alt="<?= $notice->not_title?>" class="img-fluid text-center" width="50%">

            </div>
            <p>Notice Category: <?= $notice->not_category?></p>
            <p><?= $notice->not_description?></p>
        </div>
    </div>
</div>
