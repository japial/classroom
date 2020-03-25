<div class="row">
    <div class="col-md-12 py-3">
        <div class="card">
            <div class="card-header">
                <h4>Create User Group</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <p><?php echo lang('create_group_subheading'); ?></p>

                        <div id="infoMessage"><?php echo $message; ?></div>

                        <?php echo form_open("auth/create_group"); ?>

                        <p>
                            <?php echo lang('create_group_name_label', 'group_name'); ?> <br />
                            <?php echo form_input($group_name); ?>
                        </p>

                        <p>
                            <?php echo lang('create_group_desc_label', 'description'); ?> <br />
                            <?php echo form_input($description); ?>
                        </p>

                        <p><?php echo form_submit('submit', lang('create_group_submit_btn'), 'class="btn btn-success"'); ?></p>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

