<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3><?= $about->pages_title ?></h3>
        </div>
        <div class="card-body">
            <div class="text-center">
                <img src="<?= base_url();?>uploads/about/<?= $about->pages_image ?>" alt=""
                     class="img-fluid text-center" width="50%">
            </div>
            <p class="card-text mt-5"><?= $about->pages_description ?></p>
        </div>
    </div>
</div>
