<?php defined('ALTUMCODE') || die() ?>

<!-- <div class="index-container">
    <div class="container">
        <?php display_notifications() ?>

        <div class="row">
            <div class="col">
                <div class="text-left">
                    <h1 class="index-header mb-4" data-aos="fade-down"><?= $this->language->index->header ?></h1>
                    <p class="index-subheader mb-5" data-aos="fade-down" data-aos-delay="300"><?= $this->language->index->subheader ?></p>

                    <div data-aos="fade-down" data-aos-delay="500">
                        <a href="<?= url('register') ?>" class="btn btn-primary index-button"><?= $this->language->index->sign_up ?></a>
                    </div>
                </div>
            </div>

            <div class="d-none d-lg-block col">
                <img src="<?= url(ASSETS_URL_PATH . 'images/illustration.svg') ?>" class="index-image" />
            </div>
        </div>
    </div>
</div> -->

<!-- header -->
    <header id="home" class="home" data-style="default">
        <?php display_notifications() ?>

      <div class="header-hero d-flex align-items-center text-light">
        <div class="container position-relative zi-1">
          <div class="row align-items-center">
            <div class="col-12 position-relative text-center zi-4 mb-8 mb-lg-10">
              <h1 class="display-md-4 display-xl-3 fw-600 lh-2 pt-11 mb-7 mb-lg-8">
                <!-- <span class="d-block">Take your business&nbsp;</span>
                <span class="d-block">to the next level.&nbsp;</span> -->
                <span class="d-block"><?= $this->language->index->header ?></span>
              </h1>
              <!-- <span class="d-block fw-500 lead-md-1 o-70 mb-7 mb-lg-8">No more hard ways to make marketing the right way.</span> -->
              <span class="d-block fw-500 lead-md-1 o-70 mb-7 mb-lg-8"><?= $this->language->index->subheader ?></span>
              <div>
                <a href="<?= url('register') ?>" class="btn-download btn btn-lg btn-sm-block btn-theme">
                  <div class="d-flex align-items-center py-2">
                    <div class="mr-4">
                      <div class="d-flex lead-5"><i class="fab fa-angellist"></i></div>
                    </div>
                    <div class="text-left lh-6 fw-500">
                      <span class="d-none d-lg-block"><?= $this->language->index->sign_up ?></span>
                      <strong class="fw-700">Powerpages</strong>
                    </div>
                  </div>
                </a>
                <a href="<?= url('login') ?>" class="btn-download btn btn-lg btn-sm-block btn-theme">
                  <div class="d-flex align-items-center py-2">
                    <div class="mr-4">
                      <div class="d-flex lead-5"><i class="fab fa-keycdn"></i></div>
                    </div>
                    <div class="text-left lh-6 fw-500">
                      <span class="d-none d-lg-block"><?= $this->language->index->login ?></span>
                      <strong class="fw-700">Account HERE</strong>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div id="how-it-works" class="col-10 m-auto">
              <div class="theme-box">
                <img src="<?= url(ASSETS_URL_PATH . 'images/device-hero.jpg') ?>" alt="Device">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- overlay -->
      <div class="pe-n overlay fadeIn ad-100ms zi-0" style="top: 25%">
        <div class="grid-wrapper">
          <div class="grid grid-ibf">
            <div class="grid-fade"></div>
          </div>
          <div class="grid">
            <div class="grid-lines"></div>
          </div>  
        </div>
      </div>
      <!-- /.overlay -->
    </header>
    <!-- /.header -->

<!-- <div class="container margin-top-9">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= url(THEME_URL_PATH . 'assets/images/presentation.png') ?>" class="img-fluid" style="max-height: 580px;" />
        </div>

        <div class="col-md-6 d-flex align-items-center">
            <div>
                <span class="fa-stack fa-2x">
                  <i class="fas fa-circle fa-stack-2x text-primary-100"></i>
                  <i class="fas fa-globe fa-stack-1x text-primary"></i>
                </span>

                <h2 class="mt-3"><?= $this->language->index->presentation->header ?></h2>

                <p class="mt-3"><?= $this->language->index->presentation->subheader ?></p>
            </div>
        </div>
    </div>
</div> -->

      <!-- new -->
      <section class="wn__section pb-9 pb-lg-10 pb-xl-11 pt-8 pt-lg-9 pt-xl-10">
        <div class="container">
          <div class="row gutters-y">
            <div class="col-sm-8 col-md-6 col-lg-4 mx-auto mb-4 mb-md-7 mb-lg-0">
              <div class="px-2 px-lg-3">
                <div class="wn__icon mb-6">
                  <img src="<?= url(THEME_URL_PATH . 'assets/images/icon/01.png') ?>" alt="Icon">
                </div>
                <h6 class="wn__title">Share it everywhere</h6>
                <p>Copy and paste your Power Page anywhere to promote it and catch tons of leads straight to your dashboard.</p>
              </div>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4 mx-auto mb-4 mb-md-7 mb-lg-0">
              <div class="px-2 px-lg-3">
                <div class="wn__icon mb-6">
                  <img src="<?= url(THEME_URL_PATH . 'assets/images/icon/03.png') ?>" alt="Icon">
                </div>
                <h6 class="wn__title">Get the whole metrics&nbsp;</h6>
                <p>As soon people visit your powerpage you collect great marketing information from your potential customers right away.</p>
              </div>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4 mx-auto">
              <div class="px-2 px-lg-3">
                <div class="wn__icon mb-6">
                  <img src="<?= url(THEME_URL_PATH . 'assets/images/icon/02.png') ?>" alt="Icon">
                </div>
                <h6 class="wn__title">Easy to set it up</h6>
                <p>In less than 5 mins. add your profile picture, links, intro video and your contact number, to start interacting with your leads.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.new -->

      <!-- overlay -->
      <div class="p-relative pe-n">
        <div class="overlay fadeIn ad-100ms zi-0">
          <img src="<?= url(THEME_URL_PATH . 'assets/images/bg/bg-c-01.png') ?>" class="ovry-2 p-absolute l--6" alt="fx">
        </div>
      </div>
      <!-- /.overlay -->

<!-- <div class="container margin-top-9">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center">
            <div>
                <span class="fa-stack fa-2x">
                  <i class="fas fa-circle fa-stack-2x text-primary-100"></i>
                  <i class="fas fa-users fa-stack-1x text-primary"></i>
                </span>

                <h2 class="mt-3"><?= $this->language->index->presentation2->header ?></h2>

                <p class="mt-3"><?= $this->language->index->presentation2->subheader ?></p>
            </div>
        </div>

        <div class="col-md-6">
            <img src="<?= url(THEME_URL_PATH . 'assets/images/presentation2.png') ?>" class="img-fluid" style="max-height: 580px;" />
        </div>
    </div>
</div> -->

<!-- features -->
      <section id="features" class="content-section text-center">
        <div class="container">
          <div class="row mb-6 mb-lg-9">
            <div class="col-12">
              <div>
                <h5 class="text-secondary lead-lg-4">This is a digital business card with the power to convert leads into clients</h5>
                <h2 class="display-lg-4 mb-5 mb-md-6 mb-lg-7">Power Page is designed as a side hustle marketing tool</h2>
              </div>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-12">
              <img src="<?= url(THEME_URL_PATH . 'assets/images/app/app-1.png') ?>" alt="App" class="mb-2">
            </div>
          </div>
        </div>
      </section>
      <!-- /.features -->

<!-- <div class="container margin-top-9">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= url(THEME_URL_PATH . 'assets/images/presentation3.png') ?>" class="img-fluid" style="max-height: 580px;" />
        </div>

        <div class="col-md-6 d-flex align-items-center">
            <div>
                <span class="fa-stack fa-2x">
                  <i class="fas fa-circle fa-stack-2x text-primary-100"></i>
                  <i class="fas fa-link fa-stack-1x text-primary"></i>
                </span>

                <h2 class="mt-3"><?= $this->language->index->presentation3->header ?></h2>

                <p class="mt-3"><?= $this->language->index->presentation3->subheader ?></p>
            </div>
        </div>
    </div>
</div> -->

<!-- about -->
      <section id="about" class="content-section p-relative">
        <!-- overlay -->
        <img src="<?= url(THEME_URL_PATH . 'assets/images/bg/bg-c-02.png') ?>" class="ovry-1 zi-0 p-absolute r-0 pe-n" alt="fx">
        <!-- /.overlay -->
        <div class="pb-8 pb-lg-9 pb-xl-12">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6 mb-8 mb-lg-0 ml-auto order-lg-2">
                <div class="p-relative pl-lg-6">
                  <div class="theme-box-ote w-fit-content ml-7 ml-lg-8">
                    <img src="<?= url(THEME_URL_PATH . 'assets/images/content/f_01.jpg') ?>" alt="Photo">
                  </div>
                  <div class="p-relative zi-4 mt--11">
                    <img src="<?= url(THEME_URL_PATH . 'assets/images/content/f_01-1.jpg') ?>" class="img-sm border-2 border-white" alt="Photo">
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="pr-lg-8">
                  <h5 class="text-secondary">The first business card that holds exclusively power</h5>
                  <h2 class="display-lg-5 mb-5 mb-md-6 mb-lg-7">Network that sell you everywhere.</h2>
                  <p class="lead-md-2 fw-500 mb-0">
                    The real power of your Power Page is the hability to copy and paste your Facebook and Google Pixel code. To retarget anyone who opened your link.
                  </p>
                  <hr class="border-2 border-secondary w-15 ml-0 mr-auto mt-7 mb-4 mt-lg-9 mb-lg-6">
                  <blockquote class="blockquote small-1 fw-500 px-4 px-lg-0">
                    <p class="mb-0">In other words, you can show the right ADvertising to anyone who opened your Power P. Meaning more chances to close the sale</p>
                  </blockquote>
                  <div class="text-right">
                    <a class="yellow" href="#">
                      <span class="fw-600 text-underline">BUY IT NOW FOR LIFETIME AND SAVE MORE THAN $290USD</span><i class="fas fa-long-arrow-alt-right ml-2"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="pt-7">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6 mb-8 mb-lg-0 mr-auto">
                <div>
                  <div class="d-flex p-relative">
                    <div class="p-absolute zi-4 b-7 b-md-8 b-lg-10">
                      <img src="<?= url(THEME_URL_PATH . 'assets/images/content/satis.png') ?>" class="img-sm border-2 border-white" alt="Photo">
                    </div>
                    <div class="p-relative mr-3 ml-7 ml-lg-9 mr-lg-0">
                      <div class="rds"></div>
                      <img src="<?= url(THEME_URL_PATH . 'assets/images/content/f_02-1.jpg') ?>" class="img-md p-relative" alt="Photo">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="pl-lg-8">
                  <div class="">
                    <div class="">
                      <h5 class="text-secondary">Shorten links that succeds</h5>
                      <h2 class="display-lg-5 mb-5">Keep track of your business growth.&nbsp;</h2>
                      <p class="lead-md-2 fw-500 mb-0">
                      As a second feature we include the Power link shortened. You´ll be able to copy and measure any kind of web link, similar to bit.ly</p>
                      <hr class="border-2 border-secondary w-15 ml-0 mr-auto mt-7 mb-4 mt-lg-9 mb-lg-6">
                      <blockquote class="blockquote small-1 fw-500 px-4 px-lg-0">
                        <p class="mb-0">Like a zoom meeting link, or an online URL document, web page or any kinda link. This is a BONUS inside your Power Page Platform.</p>
                      </blockquote>
                      <div class="text-right">
                        <a class="yellow" href="#">
                          <span class="fw-600 text-underline">BUY IT NOW FOR LIFETIME AND SAVE MORE THAN $290USD</span><i class="fas fa-long-arrow-alt-right ml-2"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.about -->

<!-- <div class="container margin-top-9">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center">
            <div>
                <span class="fa-stack fa-2x">
                  <i class="fas fa-circle fa-stack-2x text-primary-100"></i>
                  <i class="fas fa-paint-brush fa-stack-1x text-primary"></i>
                </span>

                <h2 class="mt-3"><?= $this->language->index->presentation4->header ?></h2>

                <p class="mt-3"><?= $this->language->index->presentation4->subheader ?></p>
            </div>
        </div>

        <div class="col-md-6">
            <img src="<?= url(THEME_URL_PATH . 'assets/images/presentation4.png') ?>" class="img-fluid" style="max-height: 580px;" />
        </div>
    </div>
</div> -->

<div class="text-center px-4 px-md-7 px-lg-8">
        <div class="content-section p-relative bp-c br-n bs-c" style="background: url(<?= url(THEME_URL_PATH . 'assets/images/bg/bg-1.jpg') ?>)">
          <div class="overlay bg-dark o-95"></div>
          <div class="container">
            <div class="row">
              <div class="col-lg-9 col-xl-8 py-md-8 py-lg-10 mx-auto">
                <div>
                  <h2 class="display-lg-4 mb-6">Create your Power Page NOW FOR FREE!</h2>
                  <span class="d-block text-light mb-8 lead-md-1">Fully functional, make your <strong>Upgrade anytime</strong> — NO <strong>TRICKS</strong></span>
                </div>
                <div class="mb-8">
                  <a href="#" class="btn-download"><img src="<?= url(THEME_URL_PATH . 'assets/images/app/app_store-badge.png') ?>" alt="App Store"></a>
                  <a href="<?= url('register') ?>" class="btn-download"><img src="<?= url(THEME_URL_PATH . 'assets/images/app/google_play-badge.png') ?>" alt="App Store"></a>
                </div>
                <div class="px-4 px-lg-8 px-xl-10">
                  <span class="small-2 text-light">For limited time only get the LIFETIME OFFER one time payment of $97 USD <strong>FREE</strong> updates <strong>INCLUDED</strong>.</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.download -->

<!-- <div class="container margin-top-9">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= url(THEME_URL_PATH . 'assets/images/presentation5.png') ?>" class="img-fluid" style="max-height: 580px;" />
        </div>

        <div class="col-md-6 d-flex align-items-center">
            <div>
                <span class="fa-stack fa-2x">
                  <i class="fas fa-circle fa-stack-2x text-primary-100"></i>
                  <i class="fas fa-chart-bar fa-stack-1x text-primary"></i>
                </span>

                <h2 class="mt-3"><?= $this->language->index->presentation5->header ?></h2>

                <p class="mt-3"><?= $this->language->index->presentation5->subheader ?></p>
            </div>
        </div>
    </div>
</div>

<div class="container margin-top-12">
    <div class="text-center margin-bottom-6">
        <h2><?= $this->language->index->pricing->header ?></h2>

        <p class="text-muted"><?= $this->language->index->pricing->subheader ?></p>
    </div>

    <?= $this->views['packages'] ?>
</div> -->


<?php ob_start() ?>
<script src="<?= url(ASSETS_URL_PATH . 'js/libraries/lozad.min.js') ?>"></script>

<script>

    /* Lazy loading */
    const observer = lozad(); observer.observe();
</script>
<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>

