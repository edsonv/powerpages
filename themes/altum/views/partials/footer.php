<?php defined('ALTUMCODE') || die() ?>

<!-- <footer class="footer <?= \Altum\Routing\Router::$controller_key == 'index' ? 'm-0' : null ?>">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <a class="navbar-brand" href="<?= url() ?>">
            <?php if($this->settings->logo != ''): ?>
              <img src="<?= url(UPLOADS_URL_PATH . 'logo/' . $this->settings->logo) ?>" class="footer-logo" alt="<?= $this->language->global->accessibility->logo_alt ?>" />
              <?php else: ?>
                <?= $this->settings->title ?>
              <?php endif ?>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col text-center">
          <div>
            <div><?= 'Copyright &copy; ' . date('Y') . ' ' . $this->settings->title . '.' ?></div>
          </div>

          <div class="mt-3">
              <?php
              if(!empty($this->settings->socials->facebook))
                  echo '<span class="fa-stack mx-1"><a target="_blank" href="https://facebook.com/' . $this->settings->socials->facebook . '" class="icon icon-facebook"><i class="fab fa-facebook"></i></a></span>';

              if(!empty($this->settings->socials->twitter))
                  echo '<span class="fa-stack mx-1"><a target="_blank" href="https://twitter.com/' . $this->settings->socials->twitter . '" class="icon icon-twitter"><i class="fab fa-twitter"></i></a></span>';

              if(!empty($this->settings->socials->instagram))
                  echo '<span class="fa-stack mx-1"><a target="_blank" href="https://instagram.com/' . $this->settings->socials->instagram . '" class="icon icon-instagram"><i class="fab fa-instagram"></i></a></span>';

              if(!empty($this->settings->socials->youtube))
                  echo '<span class="fa-stack mx-1"><a target="_blank" href="https://youtube.com/' . $this->settings->socials->youtube . '" class="icon icon-youtube"><i class="fab fa-youtube"></i></a></span>';
              ?>
          </div>
        </div>
      </div> -->

<!-- 
        <div class="row">

            <div class="row col">
                <div class="col-md-4">
                    <a class="navbar-brand" href="<?= url() ?>">
                        <?php if($this->settings->logo != ''): ?>
                            <img src="<?= url(UPLOADS_URL_PATH . 'logo/' . $this->settings->logo) ?>" class="footer-logo" alt="<?= $this->language->global->accessibility->logo_alt ?>" />
                        <?php else: ?>
                            <?= $this->settings->title ?>
                        <?php endif ?>
                    </a>
                </div>

                <div class="col-md-8 mt-3 mt-md-0">

                    <div>
                        <div><?= 'Copyright &copy; ' . date('Y') . ' ' . $this->settings->title . '.' ?></div>
                    </div>

                    <div class="mt-3">
                        <?php
                        if(!empty($this->settings->socials->facebook))
                            echo '<span class="fa-stack mx-1"><a target="_blank" href="https://facebook.com/' . $this->settings->socials->facebook . '" class="icon icon-facebook"><i class="fab fa-facebook"></i></a></span>';

                        if(!empty($this->settings->socials->twitter))
                            echo '<span class="fa-stack mx-1"><a target="_blank" href="https://twitter.com/' . $this->settings->socials->twitter . '" class="icon icon-twitter"><i class="fab fa-twitter"></i></a></span>';

                        if(!empty($this->settings->socials->instagram))
                            echo '<span class="fa-stack mx-1"><a target="_blank" href="https://instagram.com/' . $this->settings->socials->instagram . '" class="icon icon-instagram"><i class="fab fa-instagram"></i></a></span>';

                        if(!empty($this->settings->socials->youtube))
                            echo '<span class="fa-stack mx-1"><a target="_blank" href="https://youtube.com/' . $this->settings->socials->youtube . '" class="icon icon-youtube"><i class="fab fa-youtube"></i></a></span>';
                        ?>
                    </div>

                </div>
            </div>

            <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                <?php foreach($data->pages as $data): ?>
                    <a href="<?= $data->url ?>" target="<?= $data->target ?>"><?= $data->title ?></a><br />
                <?php endforeach ?>

                <?php if(count(\Altum\Language::$languages) > 1): ?>
                    <div class="dropdown">
                        <a class="dropdown-toggle clickable" id="language_switch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-language text-muted"></i> <?= $this->language->global->language ?></a>

                        <div class="dropdown-menu" aria-labelledby="language_switch">
                            <h6 class="dropdown-header"><?= $this->language->global->choose_language ?></h6>
                            <?php foreach(\Altum\Language::$languages as $language_name): ?>
                                <a class="dropdown-item" href="<?= url((\Altum\Routing\Router::$controller_key == 'index' ? 'index' : $_GET['altum']) . '?language=' . $language_name) ?>">
                                    <?php if($language_name == \Altum\Language::$language): ?>
                                        <i class="fa fa-check text-success"></i>&nbsp;
                                    <?php else: ?>
                                        <i class="far fa-sm fa-circle text-muted"></i>&nbsp;
                                    <?php endif ?>

                                    <?= $language_name ?>
                                </a>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endif ?>
            </div>
 -->
        <!-- </div>
    </div>
</footer> -->

<!-- footer -->
    <footer class="footer <?= \Altum\Routing\Router::$controller_key == 'index' ? 'm-0' : null ?>">
      <img class="f-shape p-absolute r-0 b--10 pe-n" src="<?= url(UPLOADS_URL_PATH . 'backgrounds/' . $this->settings->footer_background) ?>" alt="FX">
      <div class="container">
        <div class="row gutters-y my-6 my-md-9 mb-xl-10">
          <div class="col-12 col-lg-3 mr-auto">
            <a href="<?= url() ?>" class="app_icon-wrapper d-inline-block p-lg-4">
              <!-- <img src="assets/img/app-logo.png" alt="Logo" class="logo-light"> -->
              <?php if($this->settings->big_logo != ''): ?>
              <img src="<?= url(UPLOADS_URL_PATH . 'logo/' . $this->settings->big_logo) ?>" class="footer-logo" alt="<?= $this->language->global->accessibility->logo_alt ?>" />
              <?php else: ?>
                <?= $this->settings->title ?>
              <?php endif ?>
            </a>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <h6 class="nav-title mb-4"><?= $this->language->index->title?>&nbsp;</h6>
            <div class="nav flex-column">
              <a class="nav-link" href="#">Pricing&nbsp;</a>
              <a class="nav-link" href="#">Register&nbsp; &nbsp;</a>
              <a class="nav-link" href="#">About us&nbsp;</a>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <h6 class="nav-title mb-4">About</h6>
            <div class="nav flex-column">
              <a class="nav-link" href="#">Blog/News</a>
              <a class="nav-link" href="#">Terms and Conditions</a>
              <a class="nav-link" href="#">Privacy Policy</a>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <h6 class="nav-title mb-4">Support</h6>
            <div class="nav flex-column">
              <a class="nav-link" href="#">Help Center</a>
              <a class="nav-link" href="#">Facebook&nbsp;</a>
              <a class="nav-link" href="#">Instagram&nbsp;</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <span class="fw-500"><?= '&copy;Copyright ' . date('Y') . ' ' . $this->language->index->title . ', All Rights Reserved.' ?></span>
          </div>
        </div>
      </div>
    </footer>
