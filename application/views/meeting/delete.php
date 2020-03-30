<div class="row">
    <div class="col-md-12 py-3">
        <div class="card">
            <div class="card-header">
                Delete Meeting
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <form action="<?= base_url().'meeting/destroy/'.$meeting->id ?>" method="post">
                            <h3>Do you want to delete <strong><?=$meeting->name ?></strong> ?</h3>
                            <div class="form-group">
                                <button class="btn btn-danger mt-2" type="submit">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url().'home' ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>
