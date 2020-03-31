<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="registration_form_area animated  bounceInDown" id="registration_panel">
                    <div class="l_register_header text-center">
                        <img src="<?= base_url() ?>assets/theme/img/logo.png">
                    </div>
                    <div id="infoMessage"><?php echo $message; ?></div>
                    <?php echo form_open("auth/login"); ?>

                    <div class="row text-center form_control ml-0 mr-0">
                        <div class="col-md-2 pr-0 pl-0 level">
                            <img src="<?= base_url() ?>assets/theme/img/Iconmaterial-email@2x.png">
                        </div>
                        <div class="col-md-10 pr-0 pl-0">
                            <?php echo form_input($identity); ?>
                        </div>
                    </div>

                    <div class="row text-center form_control ml-0 mr-0">
                        <div class="col-md-2 pr-0 pl-0 level">
                            <img src="<?= base_url() ?>assets/theme/img/ic_vpn_key1@2x.png">
                        </div>
                        <div class="col-md-10 pr-0 pl-0">
                            <?php echo form_input($password); ?>
                        </div>
                    </div>

                    <div class="row text-center ml-0 mr-0 mt-4">
                        <div class="col-md-6 pl-0">
                            <p class="l_forgot"><a href="<?= base_url() . 'auth/forgot_password' ?>">Forgot password?</a></p>
                        </div>
                        <div class="col-md-6 pr-0 pl-0 text-right">
                            <button class="l_login_button" type="submit">Login</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="l_register animated  bounceInDown">
                    <p>Don't have an account?<span><a href="<?= base_url() . 'student/register' ?>">Register now</a></span></p>
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




