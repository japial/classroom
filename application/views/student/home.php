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
                Meetings
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Join</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($meetings as $meeting){ ?>
                        <tr>
                            <td class="text-center"><?= $meeting->name ?></td>
                            <td class="text-center">
                                <form action="<?= base_url().'bigblue/join' ?>" method="post">
                                    <input type="hidden" name="meeting_id" value="<?= $meeting->id ?>">
                                    <input type="hidden" name="attendee" value="<?= $meeting->attendee ?>">
                                    <button class="btn btn-success" type="submit">Join</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
