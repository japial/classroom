<?php if ($userSchool) { ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h6 class="text-center"><?= $userSchool->name ?></h6>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="col-md-12 py-2">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        Meetings
                    </div>
                    <div class="col-md-6">
                        <a href="<?= base_url().'meeting/create' ?>" class="btn btn-dark float-right">Create New</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Moderator Password</th>
                            <th class="text-center">Attendee Password</th>
                            <th class="text-center">Join</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($meetings as $meeting){ ?>
                        <tr>
                            <td class="text-center"><?= $meeting->name ?></td>
                            <td class="text-center"><?= $meeting->moderator ?></td>
                            <td class="text-center"><?= $meeting->attendee ?></td>
                            <td class="text-center">
                                <a href="<?= base_url().'bigblue/create/'. $meeting->id ?>" class="btn btn-success">Join</a>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url().'meeting/edit/'.$meeting->id ?>" class="btn btn-warning">Edit</a>
                                <a href="<?= base_url().'meeting/delete/'.$meeting->id ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
