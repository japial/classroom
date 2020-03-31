<div id="header_area">
    <div class="row">
        <div class="col-md-3">
            <div class="header_logo">
                <a href="<?= base_url() ?>">
                    <img src="<?= base_url() ?>assets/theme/img/logo.png">
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="header_menu">
                <nav>
                    <ul>
                        <?php if ($this->ion_auth->logged_in()) { ?>
                            <li><a href="<?= base_url() ?>home">Home</a></li>
                            <li><a href="<?= base_url() . 'home/profile/' ?>">Profile</a></li>
                        <?php } ?>
                           
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-md-3">
            <?php
            if ($this->ion_auth->logged_in()) {
                $userinfo = $this->ion_auth->user()->row();
                $userImage = $this->db->get_where('user_image', array('user_id' => $userinfo->user_id))->row();
                ?>

                <div class="logout_button">
                    <p>
                        <?php if ($userImage) { ?>
                            <img src="<?= base_url() . $userImage->image ?>" alt="<?= $userinfo->username ?>" />
                        <?php } else { ?>
                            <img src="<?= base_url() . 'assets/profile/noimage.jpg' ?>" alt="<?= $userinfo->username ?>" />
                        <?php } ?>
                        <a href="<?= base_url() ?>auth/logout">
                            <span>Logout</span>
                        </a>
                    </p>
                </div>
            <?php } else { ?>
                <div class="logout_button">
                    <a href="<?= base_url() ?>auth/logout">
                        <p><span>Login</span></p>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>