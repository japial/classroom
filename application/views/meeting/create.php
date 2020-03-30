<div class="row">
    <div class="col-md-12 py-3">
        <div class="card">
            <div class="card-header">
                Create Meeting
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <form action="<?= base_url() . 'meeting/store' ?>" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Moderator Password</label>
                                <input type="text" name="moderator" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Attendee Password</label>
                                <input type="text" name="attendee" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url() . 'home' ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>
