<div class="row">
    <div class="col-md-12 py-3">
        <div class="card">
            <div class="card-header">
                <h4>User Profile</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        
                        <div id="infoMessage"><?php echo $message; ?></div>

                        <?php echo form_open(uri_string()); ?>

                        <div class="form-group">
                            <?php echo lang('edit_user_fname_label', 'first_name'); ?> <br />
                            <?php echo form_input($first_name); ?>
                        <div>

                        <div class="form-group mt-2">
                            <?php echo lang('edit_user_lname_label', 'last_name'); ?> <br />
                            <?php echo form_input($last_name); ?>
                        <div>

                        <div class="form-group mt-2">
                            <label>Class/Department</label>
                            <?php echo form_input($company); ?>
                        <div>

                        <div class="form-group mt-2">
                            <?php echo lang('edit_user_phone_label', 'phone'); ?> <br />
                            <?php echo form_input($phone); ?>
                        <div>

                        <div class="form-group mt-2">
                            <?php echo lang('edit_user_password_label', 'password'); ?> <br />
                            <?php echo form_input($password); ?>
                        <div>

                        <div class="form-group mt-2">
                            <?php echo lang('edit_user_password_confirm_label', 'password_confirm'); ?><br />
                            <?php echo form_input($password_confirm); ?>
                        <div>

                        <?php if ($this->ion_auth->is_admin()): ?>

                            <h6 class="mt-2">User Roles</h6>
                            <?php foreach ($groups as $group): ?>
                                <label class="checkbox">
                                    <?php
                                    $gID = $group['id'];
                                    $checked = null;
                                    $item = null;
                                    foreach ($currentGroups as $grp) {
                                        if ($gID == $grp->id) {
                                            $checked = ' checked="checked"';
                                            break;
                                        }
                                    }
                                    ?>
                                    <input type="radio" name="groups[]" value="<?php echo $group['id']; ?>"<?php echo $checked; ?>>
                                    <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                </label>
                            <?php endforeach ?>

                        <?php endif ?>

                        <?php echo form_hidden('id', $user->id); ?>
                        <?php echo form_hidden($csrf); ?>

                        <div class="form-group mt-2">
                            <?php echo form_submit('submit', 'Save', 'class="btn btn-success"'); ?>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
