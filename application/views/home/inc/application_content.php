<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h3>অনলাইনে আবেদন করুন</h3>
        </div>
            <div class="card-body">
                <form action="<?= base_url() ?>home/nid_check" method="post" enctype="multipart/form-data">
                    <div id="logins-part" class="content active dstepper-block" role="tabpanel" aria-labelledby="logins-part-trigger">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="mt-2 mb-2 h3">NID/Birth Registration Number</label>
                            <input type="number" name="nid" class="form-control" id="exampleInputEmail1" placeholder="Enter NID/Birth Registration Number" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Next</button>
                    </div>
                </form>
            </div>
    </div>
</div>
