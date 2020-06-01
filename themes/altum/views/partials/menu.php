<?php defined('ALTUMCODE') || die() ?>

<!-- <nav class="navbar navbar-main <?= \Altum\Routing\Router::$controller_settings['menu_no_margin'] ? null : 'margin-bottom-6'?> navbar-expand-lg navbar-light <?= \Altum\Routing\Router::$controller_key == 'index' ? 'navbar-absolute navbar-dark' : null ?>">
    <div class="container">
        <a class="navbar-brand" href="<?= url() ?>">
            <?php if($this->settings->logo != ''): ?>
                <img src="<?= url(UPLOADS_URL_PATH . 'logo/' . $this->settings->logo) ?>" class="img-fluid navbar-logo" alt="<?= $this->language->global->accessibility->logo_alt ?>" />
            <?php else: ?>
                <?= $this->settings->title ?>
            <?php endif ?>
        </a>

        <button class="btn navbar-custom-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#main_navbar" aria-controls="main_navbar" aria-expanded="false" aria-label="<?= $this->language->global->accessibility->toggle_navigation ?>">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="main_navbar">
            <ul class="navbar-nav">

                <?php foreach($data->pages as $data): ?>
                <li class="nav-item"><a class="nav-link" href="<?= $data->url ?>" target="<?= $data->target ?>"><?= $data->title ?></a></li>
                <?php endforeach ?>


                <?php if(\Altum\Middlewares\Authentication::check()): ?>

                    <li class="nav-item"><a class="nav-link" href="<?= url('dashboard') ?>"> <?= $this->language->dashboard->menu ?></a></li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                            <img src="<?= get_gravatar($this->user->email) ?>" class="navbar-avatar" />
                            <?= $this->user->name ?> <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php if(\Altum\Middlewares\Authentication::is_admin()): ?>
                                <a class="dropdown-item" href="<?= url('admin') ?>"><i class="fa fa-sm fa-user-shield fa-fw mr-1"></i> <?= $this->language->global->menu->admin ?></a>
                            <?php endif ?>
                            <a class="dropdown-item" href="<?= url('account') ?>"><i class="fa fa-sm fa-wrench fa-fw mr-1"></i> <?= $this->language->account->menu ?></a>
                            <a class="dropdown-item" href="<?= url('account-package') ?>"><i class="fa fa-sm fa-box-open fa-fw mr-1"></i> <?= $this->language->account_package->menu ?></a>
                            <a class="dropdown-item" href="<?= url('account-payments') ?>"><i class="fa fa-sm fa-dollar-sign fa-fw mr-1"></i> <?= $this->language->account_payments->menu ?></a>
                            <a class="dropdown-item" href="<?= url('account-logs') ?>"><i class="fa fa-sm fa-scroll fa-fw mr-1"></i> <?= $this->language->account_logs->menu ?></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= url('logout') ?>"><i class="fa fa-sm fa-sign-out-alt fa-fw mr-1"></i> <?= $this->language->global->menu->logout ?></a>
                        </div>
                    </li>

                <?php else: ?>

                    <li class="nav-item active"><a class="nav-link" href="<?= url('login') ?>"><i class="fa fa-sm fa-sign-in-alt fa-fw mr-1"></i> <?= $this->language->login->menu ?></a></li>

                    <?php if($this->settings->register_is_enabled): ?>
                    <li class="nav-item active"><a class="nav-link" href="<?= url('register') ?>"><i class="fa fa-sm fa-plus fa-fw mr-1"></i> <?= $this->language->register->menu ?></a></li>
                    <?php endif ?>

                <?php endif ?>

            </ul>
        </div>
    </div>
</nav> -->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-affix affix">
      <div class="container">
        <div class="row">
          <div class="col-auto col-lg-6 d-lg-none">
            <button class="btn navbar-custom-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#main_navbar" aria-controls="main_navbar" aria-expanded="false" aria-label="<?= $this->language->global->accessibility->toggle_navigation ?>">
              <!-- <img src="assets/img/menu-dark.svg" class="menu__btn menu-dark" alt="Menu">
              <img src="assets/img/menu-light.svg" class="menu__btn menu-light" alt="Menu"> -->
              <i class="fa fa-bars fa-2x"></i>
            </button>
          </div>
          <div class="col-auto col-sm-auto text-lg-left ml-auto ml-lg-0">
            <a class="navbar-brand logo" href="<?= url() ?>">
              <!-- <img src="assets/img/app-logo.png" alt="Logo" class="app-logo logo-light">
              <img src="assets/img/logo.png" class="logo-fl" alt="Logo"> -->
              <?php if($this->settings->logo != ''): ?>
                <img src="<?= url(UPLOADS_URL_PATH . 'logo/' . $this->settings->logo) ?>" class="img-fluid app-logo" alt="<?= $this->language->global->accessibility->logo_alt ?>" />
            <?php else: ?>
                <?= $this->settings->title ?>
            <?php endif ?>
            </a>
          </div>
          <!-- <div class="col-12 col-lg-auto ml-lg-auto">
            <div id="offcanvas-left" class="offcanvas-md" data-animation="slideLeft">
              <button type="button" class="close fw-100 d-lg-none" data-toggle="offcanvas-close" aria-label="Close">
                <img src="assets/img/close-dark.svg" class="menu__btn closeMenu__btn menu-dark" alt="Close">
                <img src="assets/img/close-light.svg" class="menu__btn closeMenu__btn menu-light" alt="Close">
              </button>
              <ul class="nav navbar-nav mr-6 mr-lg-0">
                <li class="nav-item">
                  <a href="blog.html" class="nav-link">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="pricing.html" class="nav-link">Pricing</a>
                </li>
                <li class="nav-item">
                  <a href="help-center.html" class="nav-link">Help Center</a>
                </li>
              </ul>
            </div>
          </div> -->
          <div class="collapse navbar-collapse justify-content-end" id="main_navbar">
            <ul class="nav navbar-nav ml-8 ml-lg-0">

                <?php foreach($data->pages as $data): ?>
                <li class="nav-item"><a class="nav-link" href="<?= $data->url ?>" target="<?= $data->target ?>"><?= $data->title ?></a></li>
                <?php endforeach ?>


                <?php if(\Altum\Middlewares\Authentication::check()): ?>

                    <li class="nav-item"><a class="nav-link" href="<?= url('dashboard') ?>"> <?= $this->language->dashboard->menu ?></a></li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                            <img src="<?= get_gravatar($this->user->email) ?>" class="navbar-avatar" />
                            <?= $this->user->name ?> <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php if(\Altum\Middlewares\Authentication::is_admin()): ?>
                                <a class="dropdown-item" href="<?= url('admin') ?>"><i class="fa fa-sm fa-user-shield fa-fw mr-1"></i> <?= $this->language->global->menu->admin ?></a>
                            <?php endif ?>
                            <a class="dropdown-item" href="<?= url('account') ?>"><i class="fa fa-sm fa-wrench fa-fw mr-1"></i> <?= $this->language->account->menu ?></a>
                            <a class="dropdown-item" href="<?= url('account-package') ?>"><i class="fa fa-sm fa-box-open fa-fw mr-1"></i> <?= $this->language->account_package->menu ?></a>
                            <a class="dropdown-item" href="<?= url('account-payments') ?>"><i class="fa fa-sm fa-dollar-sign fa-fw mr-1"></i> <?= $this->language->account_payments->menu ?></a>
                            <a class="dropdown-item" href="<?= url('account-logs') ?>"><i class="fa fa-sm fa-scroll fa-fw mr-1"></i> <?= $this->language->account_logs->menu ?></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= url('logout') ?>"><i class="fa fa-sm fa-sign-out-alt fa-fw mr-1"></i> <?= $this->language->global->menu->logout ?></a>
                        </div>
                    </li>

                <?php else: ?>

                    <!-- <li class="nav-item active"><a class="nav-link" href="<?= url('login') ?>"><i class="fa fa-sm fa-sign-in-alt fa-fw mr-1"></i> <?= $this->language->login->menu ?></a></li>

                    <?php if($this->settings->register_is_enabled): ?>
                    <li class="nav-item active"><a class="nav-link" href="<?= url('register') ?>"><i class="fa fa-sm fa-plus fa-fw mr-1"></i> <?= $this->language->register->menu ?></a></li>
                    <?php endif ?> -->

                    <li class="nav-item">
                  <a href="<?= url('blog') ?>" class="nav-link">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="pricing.html" class="nav-link">Pricing</a>
                </li>
                <li class="nav-item">
                  <a href="help-center.html" class="nav-link">Help Center</a>
                </li>

                <?php endif ?>

            </ul>
        </div>
        </div>
      </div>
    </nav>