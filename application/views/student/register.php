<div class="row">
    <div class="col-md-6 mx-auto py-4">
        <div class="card">
            <div class="card-header text-center">
                <h4>Student Registration</h4>
            </div>
            <div class="card-body">
                <div id="infoMessage"><?php echo $message; ?></div>

                <?php echo form_open("student/register"); ?>

                <div class="form-group">
                    <?php echo lang('create_user_fname_label', 'first_name'); ?> <br />
                    <?php echo form_input($first_name); ?>
                </div>

                <div class="form-group">
                    <?php echo lang('create_user_lname_label', 'last_name'); ?> <br />
                    <?php echo form_input($last_name); ?>
                </div>

                <?php
                if ($identity_column !== 'email') {
                    echo '<div class="form-group">';
                    echo lang('create_user_identity_label', 'identity');
                    echo '<br />';
                    echo form_error('identity');
                    echo form_input($identity);
                    echo '</div>';
                }
                ?>
                <div class="form-group">
                    <?php echo lang('create_user_email_label', 'email'); ?> <br />
                    <?php echo form_input($email); ?>
                </div>

                <div class="form-group">
                    <?php echo lang('create_user_phone_label', 'phone'); ?> <br />
                    <?php echo form_input($phone); ?>
                </div>

                <div class="form-group">
                    <?php echo lang('create_user_password_label', 'password'); ?> <br />
                    <?php echo form_input($password); ?>
                </div>

                <div class="form-group">
                    <?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?> <br />
                    <?php echo form_input($password_confirm); ?>
                </div>
                <div class="form-group">
                    <label>School</label>
                    <select name="school_id" class="form-control">
                        <?php foreach ($schools as $school) { ?>
                        <option value="<?= $school->id ?>"><?= $school->name ?></option>         
                         <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Class</label>
                    <?php echo form_input($company); ?>
                </div>


                <div class="form-group">
                    <?php echo form_submit('submit', 'Register', 'class="btn btn-success"'); ?>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>




