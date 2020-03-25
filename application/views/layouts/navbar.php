<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php if ($this->ion_auth->logged_in()) { ?>
        <a class="navbar-brand" href="<?= base_url() ?>home">ClassRoom</a>
    <?php } else { ?>
        <a class="navbar-brand" href="<?= base_url() ?>">ClassRoom</a>
    <?php } ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>auth">Users</a>
                </li>
            <?php } ?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php
            if ($this->ion_auth->logged_in()) {
                $userinfo = $this->ion_auth->user()->row();
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $userinfo->username ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url() . 'home/profile/' . $userinfo->user_id ?>">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url() ?>auth/logout">Logout</a>
                    </div>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>student/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>auth/login">Login</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>