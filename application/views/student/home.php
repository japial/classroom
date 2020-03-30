<?php if ($userSchool) { ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h6 class="text-center"><?= $userSchool->name ?></h6>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="col-md-6 mx-auto py-2">
        <div class="card">
            <div class="card-header">
                Join in a meeting
            </div>
            <div class="card-body">
                <form class="form" action="<?= base_url().'bigblue/join' ?>" method="post">
                   <div class="form-group">
                       <select name="meeting" class="form-control" id="meeting">
                            <option value="mc">Molecular Chemistry</option>
                            <option value="it">Information Theory</option>
                            <option value="pm">Project Management</option>
                        </select>
                        <label for="meeting">Course</label>
                    </div>

                   <div class="form-group">
                        <input type="checkbox" class="form-check-input ml-1" name="html5" id="html5"/>
                        <label for="html5" class="ml-4">Use HTML5</label>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Join"/>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
