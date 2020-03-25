<div class="row">
    <div class="col-md-12 py-3">
        <div class="card">
            <div class="card-header">
                <h4><?php echo lang('deactivate_heading'); ?></h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mx-auto">

                        <h5><?php echo sprintf(lang('deactivate_subheading'), $user->username); ?></h5>

                        <?php echo form_open("auth/deactivate/" . $user->id); ?>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="confirm" value="yes" checked="checked" /> 
                             <label class="form-check-label">
                                 <?php echo lang('deactivate_confirm_y_label', 'confirm'); ?>
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="confirm" value="no" />
                             <label class="form-check-label">
                            <?php echo lang('deactivate_confirm_n_label', 'confirm'); ?>
                            </label>
                        </div>

                        <?php echo form_hidden($csrf); ?>
                        <?php echo form_hidden(['id' => $user->id]); ?>

                        <div class="form-group mt-2">
                            <?php echo form_submit('submit', lang('deactivate_submit_btn'), 'class="btn btn-success"'); ?>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>