<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="registration_form_area animated  bounceInUp" id="registration_panel">
                    <div class="l_register_header text-center">
                        <img src="<?= base_url() ?>assets/theme/img/logo.png">
                    </div>
                    <div id="infoMessage"><?php echo $message; ?></div>

                    <?php echo form_open("student/register"); ?>

                    <div class="row text-center form_control ml-0">
                        <div class="col-md-2 pr-0 pl-0 level">
                            <img src="<?= base_url() ?>assets/theme/img/ic_account_circle1@2x.png">
                        </div>
                        <div class="col-md-10 pr-0 pl-0">
                            <?php echo form_input($first_name); ?>
                        </div>
                    </div>  
                    <div class="row text-center form_control ml-0">
                        <div class="col-md-2 pr-0 pl-0 level">
                            <img src="<?= base_url() ?>assets/theme/img/ic_account_circle1@2x.png">
                        </div>
                        <div class="col-md-10 pr-0 pl-0">
                            <?php echo form_input($last_name); ?>
                        </div>
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
                    <div class="row text-center form_control ml-0">
                        <div class="col-md-2 pr-0 pl-0 level">
                            <img src="<?= base_url() ?>assets/theme/img/Iconmaterial-email@2x.png">
                        </div>
                        <div class="col-md-10 pr-0 pl-0">
                            <?php echo form_input($email); ?>
                        </div>
                    </div>
                    <div class="row text-center form_control ml-0">
                        <div class="col-md-2 pr-0 pl-0 level">
                            <img src="<?= base_url() ?>assets/theme/img/Iconawesome-phone-alt@2x.png">
                        </div>
                        <div class="col-md-10 pr-0 pl-0">
                            <?php echo form_input($phone); ?>
                        </div>
                    </div>

                    <div class="row text-center form_control ml-0">
                        <div class="col-md-2 pr-0 pl-0 level">
                            <img src="<?= base_url() ?>assets/theme/img/Iconawesome-school@2x.png">
                        </div>
                        <div class="col-md-10 pr-0 pl-0">
                            <select name="school_id" class="l_school">
                                <?php foreach ($schools as $school) { ?>
                                    <option value="<?= $school->id ?>"><?= $school->name ?></option>         
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row text-center form_control ml-0">
                        <div class="col-md-2 pr-0 pl-0 level l_class">
                            <img src="<?= base_url() ?>assets/theme/img/Iconmaterial-class.png">
                        </div>
                        <div class="col-md-10 pr-0 pl-0">
                            <?php echo form_input($company); ?>
                        </div>
                    </div>

                    <div class="row text-center form_control ml-0">
                        <div class="col-md-2 pr-0 pl-0 level">
                            <img src="<?= base_url() ?>assets/theme/img/ic_vpn_key1@2x.png">
                        </div>
                        <div class="col-md-10 pr-0 pl-0">
                            <?php echo form_input($password); ?>
                        </div>
                    </div>

                    <div class="row text-center form_control ml-0">
                        <div class="col-md-2 pr-0 pl-0 level">
                            <img src="<?= base_url() ?>assets/theme/img/ic_vpn_key1@2x.png">
                        </div>
                        <div class="col-md-10 pr-0 pl-0">
                            <?php echo form_input($password_confirm); ?>
                        </div>
                    </div>

                    <div class="row text-center ml-0">
                        <div class="col-md-12 pr-0 pl-0">
                            <button type="submit" class="l_button">Register</button>
                        </div>
                    </div>

                    <?php echo form_close(); ?>
                </div>
                <div class="l_already text-center animated  bounceInUp">
                    <p>Already have an account?
                        <span>
                            <a href="<?= base_url() . 'auth/login' ?>">Login</a>
                        </span>
                    </p>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <div class="col-md-6 text-center">
        <div class="banner_area animated  bounceInUp">
            <img class="l_banner" src="<?= base_url() ?>assets/theme/img/UgUwLFjlYy@2x.png">
        </div>
    </div>
</div>




