<div class="row">
    <div class="col-md-12 py-3">
        <div class="card">
            <div class="card-header">
                <h4><?php echo lang('forgot_password_heading'); ?></h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label); ?></p>

                        <div id="infoMessage"><?php echo $message; ?></div>

                        <?php echo form_open("auth/forgot_password"); ?>

                        <p>
                            <label for="identity"><?php echo (($type == 'email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label)); ?></label> <br />
                            <?php echo form_input($identity); ?>
                        </p>

                        <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'), 'class="btn btn-success"'); ?></p>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
