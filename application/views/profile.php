<div class="row">
    <div class="col-md-12 py-5">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>User Profile</h5>
                    </div>
                    <div class="col-md-6">
                        <?php if ($userData->id == $profile->id) { ?>
                            <a href="<?= base_url() . 'auth/edit_user/' . $userData->id; ?>" 
                               class="btn btn-warning float-right">
                                Edit
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <?php if($profile->image){ ?>
                                <img src="<?= base_url().$profile->image ?>" alt="<?= $profile->first_name ?>" class="img-thumbnail w-100">
                                <?php }else{ ?>
                                <img src="<?= base_url().'assets/profile/noimage.jpg'?>" alt="<?= $profile->first_name ?>" class="img-thumbnail w-100">
                                <?php } ?>
                            </div>
                            <div class="card-footer">
                                <form method="POST" action="<?= base_url().'home/profile_photo' ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" name="pphoto" required>
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-hover">
                            <tr>
                                <td>Name</td>
                                <td>
                                    <strong>
                                    <?= $profile->first_name . ' ' . $profile->last_name ?>
                                    </strong>  
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><strong><?= $profile->email ?></strong></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><strong><?= $profile->phone ?></strong></td>
                            </tr>
                            <?php if ($school) { ?>
                                <tr>
                                    <td>School</td>
                                    <td><strong><?= $school->name ?></strong></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td>Class/ Department</td>
                                <td>
                                    <strong><?= $profile->company != '' ? $profile->company : 'Not Available' ?></strong>
                                </td>
                            </tr>
							<tr>
                                <td>User Role</td>
                                <td>
                                    <strong><?= $profile->role ?></strong>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
