<div class="row">
    <div class="col-md-12 py-5">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>User Profile</h5>
                    </div>
                    <div class="col-md-6">
                        <?php if($userData->id == $profile->id){ ?>
                            <a href="<?= base_url() . 'auth/edit_user/' . $userData->id ?>" 
                               class="btn btn-warning float-right">
                                Edit
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <tr>
                        <td>Name</td>
                        <td><?= $profile->first_name.' '.$profile->last_name ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $profile->email ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><?= $profile->phone ?></td>
                    </tr>
                    <?php if($school){ ?>
                    <tr>
                        <td>School</td>
                        <td><?= $school->name ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td>Class/ Department</td>
                        <td><?= $profile->company != '' ? $profile->company : 'Not Available'?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
