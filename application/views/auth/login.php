<div class="row">
    <div class="col-md-6 mx-auto py-4">
        <div class="card">
            <div class="card-header text-center">
                <h4><?php echo lang('login_heading'); ?></h4>
                <small><?php echo lang('login_subheading'); ?></small>
            </div>
            <div class="card-body">
                <div id="infoMessage"><?php echo $message; ?></div>
                <?php echo form_open("auth/login"); ?>

                <div class="form-group">
                    <label><?php echo lang('login_identity_label', 'identity'); ?></label>
                    <?php echo form_input($identity); ?>
                </div>

                <div class="form-group">
                    <label><?php echo lang('login_password_label', 'password'); ?></label>
                    <?php echo form_input($password, 'class="form-control"'); ?>
                </div>

                <div class="form-group">
                    <label><?php echo lang('login_remember_label', 'remember'); ?>
                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?></label>
                </div>


                <div class="form-group">
                    <?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn btn-success"'); ?>
                </div>

                <?php echo form_close(); ?>

                <p><a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a></p>
            </div>
        </div>
    </div>
</div>




